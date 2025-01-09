<?php 
/**
 * This is autorun file, where system automatically runs this scrips for every page
 */

function checklogin(){
    $login = $_SESSION['login'];
    if($login == 1){
        view_page('dashboard.php');
    }
else{
    view_page('login.php');
}
exit;
}


?>