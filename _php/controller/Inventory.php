<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Inventory extends Yros{

        public function __construct() {
            parent::__construct();
            $YROS = &Yros::get_instance();
            //Add initial codes here...
        }


        function index(){
            echo 'Hello Yros user. This is Inventory controller';
        }

        function addinventory(){
            view_page('addinventory.php');
        }
        function insertinventory(){
            $data = post_data();
            $upload = upload_file("image",auto_rename);
            $picturename = $upload['filename'];
            $data['image'] = $picturename;
            $result = db_insert("tbl_inventory",$data);
            
            //display($picturename);
            back_to_previous_page();
        }
        function inventorylist(){
            view_page('inventory_list.php');
        }
        function updateinventory(){
            view_page('update_inventory');
        }
        function update(){
            if(isset($_FILES['image']) && $_FILES['image']['error'] !=4){
                $data = post_data();
                $upload = upload_file("image", auto_rename);
                $data['image'] = $upload['filename'];
                $id['inventory_id'] = get('id');
                $result = db_update('tbl_inventory',$data,$id);
                //display($_FILES);
            }else{
                $data = post_data();
                $id['inventory_id'] = get('id');
                //display($data);
                db_update('tbl_inventory',$data,$id);
            }
            redirect('inventory/inventorylist');
        }
        function delete(){
            $id = get("inventory_id");
            $delete['inventory_id']=$id;        
            $result = db_delete('tbl_inventory',$delete);
            set_flash_data("status","deleted succesfully");
            back_to_previous_page();
        }

        
    }
?>