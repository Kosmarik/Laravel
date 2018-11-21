<?php

    require_once '/var/www/html/laravelioProjektas/public/MVC/libs/Controller.php';
    require_once  '/var/www/html/laravelioProjektas/public/MVC/model/ProductModel.php';
    require_once  '/var/www/html/laravelioProjektas/public/MVC/model/CommentModel.php';


class Products extends Controller {

        public  function index(){
//            if($this->isLogin()){
//                die('laba');
//            }
            $model = new ProductModel();
            $this->view->products = $model->getAllProducts();
            $this->view->render('/var/www/html/laravelioProjektas/public/MVC/view/allProducts.phtml');
        }

       public function product($id){
            // sita naudoju , kad gauti produkto masyva Product.phtml faile;
           $model = new ProductModel();
           $this->view->product = $model->getProductById($id);
            // sitas , kad gauti comentaru masyva Product.phtml faile;
           $comments = new CommentModel();
           $this->view->comment = $comments->getAllProductComents($id);

           $this->view->render('/var/www/html/laravelioProjektas/public/MVC/view/Product.phtml');
       }

       public function comments($id){
            if(!isset($_SESSION['userName'])){
                require_once 'view/logIn/logIn.php';
            }else {
                $commentarai = new CommentModel();

                $this->view->commentarai = $commentarai->getAllProductComents($id);

                $this->view->render('/var/www/html/laravelioProjektas/public/MVC/view/allProductComments.phtml');
            }
       }
    }