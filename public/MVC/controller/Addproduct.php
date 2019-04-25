<?php
/**
 * Created by PhpStorm.
 * User: ivasko
 * Date: 28/08/2018
 * Time: 15:30
 */
require_once '/var/www/html/laravelioProjektas/public/MVC/libs/Controller.php';
require_once  '/var/www/html/laravelioProjektas/public/MVC/model/ProductModel.php';



class Addproduct extends Controller
{
    public function getNewProduct()
    {
        if(isset($_SESSION['userName']) && $_SESSION['userStatus']==='admin'){
            $productImage = $_POST['productImage'];
            $productName = $_POST['productName'];
            $productPrice = $_POST['productPrice'];

            $newProduct = array();
            if (!empty($productImage) && !empty($productName) && !empty($productPrice)) {
                $newProduct = ['image'=>$productImage, 'name'=>$productName, 'price'=>$productPrice];

                $model = new ProductModel();
                $model->insertNewProduct($newProduct);
                header('Location: http://185.80.130.158/MVC/index.php/products');

            }else{echo 'Error!!! :(' ;}
        }else{
            require_once '../view/logIn/logIn.php';
        }
    }
}

$band = new Addproduct();
$band->getNewProduct();
