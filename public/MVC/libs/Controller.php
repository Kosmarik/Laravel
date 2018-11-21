<?php

require 'View.php';

class Controller{

    public function __construct(){
        $this->view = new View;
    }

//    public function isLogin(){
//        if(isset($_SESSION['userStatus'])){
//            return true;
//        }
//        return false;
//
//    }
}

?>