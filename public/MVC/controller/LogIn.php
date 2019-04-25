<?php
/**
 * Created by PhpStorm.
 * User: ivasko
 * Date: 30/08/2018
 * Time: 18:15
 */

require_once '/var/www/html/laravelioProjektas/public/MVC/libs/Controller.php';
require_once '/var/www/html/laravelioProjektas/public/MVC/model/UsersData.php';


class LogIn extends UsersData
{
    public function index() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
//
                $userName = $_POST['userName'];
                $password = $_POST['password'];

                $userArray = new UsersData();
                $user = $userArray->getUserArray($userName);

                $userPassword = $user[2];

                if($password === $userPassword){
                    //session start
                    $this->loginUser($user);

                }else{
                    echo 'Wrong Password';
                    }
            }else{
                require_once 'view/logIn/logIn.php';
            }
    }

    public function loginUser($userArr){
        $_SESSION['userName'] = $userArr[1];
        $_SESSION['userId'] = $userArr[0];
        $_SESSION['userStatus'] = $userArr[3];
        if(isset($_SESSION['userStatus'])) {
            header('Location: http://185.80.130.158/MVC/index.php/products');
        }else{
            echo 'no session';
        }
    }

    public function logout(){
        session_unset();
        session_destroy();

    }

    public function isLogin(){

    }
}

