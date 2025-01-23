<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Sales extends Yros{

        public function __construct() {
            parent::__construct();
            $YROS = &Yros::get_instance();
            //Add initial codes here...
        }


        function index(){
            echo 'Hello Yros user. This is Sales controller';
        }

        function addTransaction(){
           $data = post_data();
           $data['date'] = date("y-m-d H:i:s");
           $transaction = db_insert("tbl_transaction",$data);

           $trans_id = $transaction['insert_id'];
           
           $sql = "update tbl_pos set status = ? where status = 0";
           $param = [$trans_id];
           $cart = db_set_query($sql, $param);
           //display($_POST);
           back_to_previous_page();
        }

        function updateQty(){
            $type = get("type");
            $current_qty = get("qty");
            $id = get("id");
            $update = [];
            if($type==1){
                if($current_qty <= 1){
                    back_to_previous_page();
                }else{
                    $update['qty'] = $current_qty - 1;
                }

            }else{
                $update['qty'] = $current_qty + 1;
            }
            $where['pos_id'] = $id;
            $res = db_update("tbl_pos",$update, $where);
            back_to_previous_page();
        }
        function saleslist_p(){
            view_page('saleslist.php');
        }
        function dashboard(){
            checklogin();
            $data['report'] = db_set_query("select sum(p.qty) 'sold' ,sum(d.Price) 'income',sum(d.Price) * p.qty 'sales', p.datetime from tbl_transaction t, tbl_pos p, tbl_products d where t.id = p.status and p.product_id = d.id group by p.datetime")['data'];
            view_page('dashboard.php', $data);
        }


        function delete_transaction(){
            $where["id"] = get("ry_id");
            $result = db_delete("tbl_transaction", $where);
            json_response($result);
        }


        
    }
?>