<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Products extends Yros{

        public function __construct() {
            parent::__construct();
            $YROS = &Yros::get_instance();
            //Add initial codes here...
        }


        function index(){
            echo 'Hello Yros user. This is Products controller';
        }
        function addproducts(){
            view_page('addprod.php');
        }
        function prodlist(){
            view_page('prodlist.php');
        }
        function insertproduct(){
            $data = post_data();
            $upload = upload_file("Image",auto_rename);
            $picturename = $upload['filename'];
            $data['Image'] = $picturename;
            $result = db_insert("tbl_products",$data);
            
            //display($picturename);
            back_to_previous_page();
        }
        function delete(){
            $id = get("id");
            $delete['id']=$id;        
            $result = db_delete('tbl_products',$delete);
            set_flash_data("status","deleted succesfully");
            back_to_previous_page();
        }
        function edit(){
            view_page('editproduct.php');
        }

        function update(){
            if(isset($_FILES['Image'])){
                $data = post_data();
                $upload = upload_file("Image", auto_rename);
                $data['Image'] = $upload['filename'];
                $id['id'] = get('id');
                db_update('tbl_products',$data,$id);
            }else{
                $data = post_data();
                $id['id'] = get('id');
                db_update('tbl_products',$data,$id);
            }
            redirect('products/prodlist');
        }
         
        function checkout(){
            view_page('checkout.php');
        }
        function category(){
            view_page('categorylist.php');
        }

        function addcategory(){
            view_page('addcategory.php');
        }

        function add_category(){
            $data = post_data();
            $result = db_insert("tbl_category",$data);
            back_to_previous_page();

        }

        function deletecategory(){
            $id = get("id");
            $delete['category_id']=$id;        
            $result = db_delete('tbl_category',$delete);
            set_flash_data("status","deleted succesfully");
            back_to_previous_page();
        }
        
        function updatecategory(){
            $data = post_data();
            $id['category_id'] = get('id');
            $result=db_update('tbl_category',$data,$id);
            //display($result);
            redirect('products/category');
        }
        function categoryupdate(){
            view_page('editcategory.php');
        }
        function addtocart(){
            $pos_id = get('pos_id');
            $insert ['product_id']= $pos_id;
            $insert['datetime'] = date("Y-m-d");
            $result = db_insert('tbl_pos',$insert);
            //display($result);
            back_to_previous_page();

        }

        
    }
?>