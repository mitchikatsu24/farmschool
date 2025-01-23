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
            checklogin();
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
                $_SESSION['login'] =1;
                set_session("userid", $result['id']);
                redirect("sales/dashboard");
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
        function logout(){
            $_SESSION['login'] = 0;
            view_page('login.php');
        }
        function messages(){
            view_page('messages.php');
        }
        
        


        
    }
?>