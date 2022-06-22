<?php 
    spl_autoload_register(function($class){
        include_once("system/libs/$class.php");
    });
    include_once('app/config/config.php');
    $main = new Main();
    if (isset($_GET['url'])){
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/',$url);

        if ($url[0]){
            include_once('app/controllers/'.$url[0].'.php');
            $class_name = ucfirst($url[0]).'Controller';
            $class = new $class_name();
            if (isset($url[1])){
                $method = $url[1];
                if (isset($url[2])){
                    $class->$method($url[2]);
                }
                else {
                    $class->$method();
                }
            }
        }
        else {
            include_once('app/controllers/index.php');
            $index = new IndexController();
            $index->home();
        }
    }
    else {
        include_once('app/controllers/index.php');
        $index = new IndexController();
        $index->home();
        
    }
?>
