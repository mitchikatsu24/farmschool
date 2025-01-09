<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Bulletin extends Yros{

        public function __construct() {
            parent::__construct();
            $YROS = &Yros::get_instance();
            //Add initial codes here...
        }


        function index(){
            echo 'Hello Yros user. This is Bulletin controller';
        }
        function bulletin(){
            view_page('bulliten.php');
        }
        function postbulletin(){
            $data = post_data();
            $data["post_date_time"]=date("Y-m-d H:i:s");
            $data["images"]=upload_file("image",auto_rename)['filename'];
            $result = db_insert("tbl_bulletin",$data);
            redirect_to("bulletin/bulletindisplay");
        }
        function bulletindisplay(){
            view_page('bulletinlist.php');
        }

        
    }
?>