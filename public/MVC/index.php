<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

//Getting path
$path = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['REQUEST_URI']);

// Explode our path in array and deliting '/'
$path = explode('/', ltrim($path,'/'));

// The first letter is done by the capital letter
$controller = ucfirst($path[0]);

    if(file_exists('controller/' .$controller. '.php')){
        require_once 'controller/' .$controller. '.php';

        $new = new $controller();

        if(isset($path[1]) && isset($path[2])){
            $method = $path[1];
            $id = $path[2];

            if(method_exists($controller, $method)){
                $new->$method($id);
            }else{
                echo 'method do not exist';
            }

        }elseif (isset($path[1])){
            $method = $path[1];
            if(method_exists($controller, $method)){
                $new->$method();
            }else{
                echo 'Method (' . $method . ')  Do not exist!!!';
            }
        }else{
            $new->index();
        }
    }else{
       echo 'Blogas url adresas';
    }
