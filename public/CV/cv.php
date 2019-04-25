<?php
/**
 * Created by PhpStorm.
 * User: ivasko
 * Date: 06/12/2018
 * Time: 02:05
 */

if(!empty($_GET['fileName'])){
    $fileName = basename($_GET['fileName']);
    $filePath = 'file/'.$fileName;

    if(!empty($fileName) && file_exists($filePath)){
        //Define headers.
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");

        //Read the file
        readfile($filePath);
        exit;
    }
}