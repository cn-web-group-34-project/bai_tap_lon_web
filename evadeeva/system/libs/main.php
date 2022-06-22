<?php
class Main{
    public $url;
    public $class = 'index';
    public $className = 'IndexController';
    public $method = 'index';
    public $path = 'app/controllers/'; 
    public $controller;
    
    public function __construct()
    {
        echo "This is main";
    }

    public function getUrl(){
        if (isset($_GET['url'])){
            $this->url =$_GET('url');
            $this->url = rtrim($this->url, '/');
            $this->url = explode('/',$this->url);
        }
        else {
            unset($this->url);
        }
    }

    public function loadController(){
        if (!isset($url[0])){
            include_once $this->path.$this->class.'.php';
            $this->controller = new $this->className();
        }
        else {
            $this->class = $url[0];
            $this->className = ucfirst($url[0]).'Controller';
            $file_name = $this->$path.$this->class.'.php';
            if (file_exists($file_name)){
                include $file_name;
                if (class_exists($this->className)){
                    $this->controller = new $this->className;
                }
                else {

                }
            }
            else{

            }

        }
    }

    public function callMethod(){
        if (!isset($url[1])){
            
        }
    }
}
?>