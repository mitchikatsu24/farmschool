<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Accounts extends Yros{

        public function __construct() {
            parent::__construct();
            $YROS = &Yros::get_instance();
            //Add initial codes here...
        }


        function index(){
            echo 'Hello Yros user. This is Accounts controller';
        }
        function login(){
            view_page('login.php');
        }

        function acclogin(){
            $username = post('username');
            $password = post("password");

            $query = "select * from users where username = ? and password = ?";
            $parameters = [$username, $password];
            $result = db_set_query($query, $parameters)['single'];
            if(empty($result)){
                back_to_previous_page();
            }else{
                redirect("products/addproducts");
            }

        }
        function signup(){
            view_page("signup.php");
        }
        function createacc(){
            $data = post_data();
            db_insert('users',$data);
            back_to_previous_page();

        }
        


        
    }
?>