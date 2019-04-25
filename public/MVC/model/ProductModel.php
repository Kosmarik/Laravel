<?php

    require_once '/var/www/html/MVC/libs/dbConnect.php';

    class ProductModel extends dbConnect {

        public function getAllProducts(){
            $sql = "SELECT * FROM myShop";
            $result = $this->conn->query($sql);
            $products = mysqli_fetch_all($result);
            return $products;
        }

        public function getProductById($id){
            $sql = "SELECT * FROM myShop WHERE id = $id";
            $result = $this->conn->query($sql);
            $products = mysqli_fetch_all($result);
            return $products;
        }

        public function insertNewProduct($productArray){
            $image = $productArray['image'];
            $name = $productArray['name'];
            $price = $productArray['price'];
            $sql = "INSERT INTO myShop (`image`, `name`, `price`) VALUES ('$image', '$name', '$price')";
            if(!$this->conn->query($sql)){
                die($this->conn->error);
            }
        }

    }