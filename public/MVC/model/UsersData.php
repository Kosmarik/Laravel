<?php
/**
 * Created by PhpStorm.
 * User: ivasko
 * Date: 31/08/2018
 * Time: 18:34
 */

require_once '/var/www/html/MVC/libs/dbConnect.php';

class UsersData extends dbConnect
{

    public function getUserArray($userName) {
        $sql = "SELECT * FROM users WHERE nickname = '$userName'";
        $result = $this->conn->query($sql);
        $userArr = mysqli_fetch_all($result);
        $arr = $userArr[0];
//        $password = $arr[2];
        return $arr;
    }
}



