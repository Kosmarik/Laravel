<?php
    require_once  '/var/www/html/laravelioProjektas/public/MVC/libs/Controller.php';

    class ErrorController extends Controller{

    public function showErrorPage(){
        $this->view->error = '404 ERORR !!!';
        $this->view->msg = 'Your destination not found';
        $this->view->render('/var/www/html/laravelioProjektas/public/MVC/view/error/index.phtml');
    }

}