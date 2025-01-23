<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Chats extends Yros{

        public function __construct() {
            parent::__construct();
            $YROS = &Yros::get_instance();
            //Add initial codes here...
        }


        function index(){
            echo 'Hello Yros user. This is Chats controller';
        }


        function sendMessage(){
            $data['message'] = get("msg");
            $data['user_id'] = get("uid");
            $data['date_time'] = date('Y-m-d H:i:s');
            $data['type'] = "A";
            $data['from_id'] = get_session_data("userid");

            $result = db_insert("tbl_inqueries", $data);
            json_response($result);
        }

        function getMessages(){
            $id = get("userid");
            $result = db_set_query("select * from tbl_inqueries where user_id = $id");
            $result['query'] = db_last_query();
            json_response($result);
        }

        function getUserChats(){
            $result = db_set_query("select u.id, u.fullname, u.username, i.inquire_id from tbl_inqueries i, users u where u.id = i.user_id group by i.user_id;");
            json_response($result);
        }

        
    }
?>