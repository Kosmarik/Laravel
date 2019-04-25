<?php
require_once  '/var/www/html/laravelioProjektas/public/MVC/model/CommentModel.php';

class Comments
{

    public function index()
    {   $noTabsUsername = $_POST['usrname'];
        $noTabsComment = $_POST['comment'];

        $beTarpuComentarai = preg_replace('/\s+/', '', $noTabsComment);
        $beTArpuUseris = preg_replace('/\s+/', '', $noTabsUsername);

        if(!empty($beTarpuComentarai) || !empty($beTArpuUseris)){

            $data = array();
            $data['name'] = $_POST['usrname'];
            $data['id'] = $_POST['id'];
            $data['comment'] = $_POST['comment'];

            $model = new CommentModel();
            $model->insertNewComment($data);
            header('Location: http://185.80.130.158/MVC/index.php/products');

        }else {

            echo 'Comment or username field is empty!!!';

        }
    }
}