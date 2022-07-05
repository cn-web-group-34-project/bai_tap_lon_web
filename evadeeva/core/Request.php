<?php
namespace app\core;
class Request{
    public function getPath(){
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false){
            
            return $path;
        }
        $path = substr($path, 0, $position);
        return $path;
    }

    public function method(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(){
        return $this->method() === 'get';
    }

    public function isPost(){
        return $this->method() === 'post';
    }

    public function isPut(){
        return $this->method() === 'put';
    }

    public function isDelete(){
        return $this->method() === 'delete';
    }
    public function getBody(){
        $body = [];
        if ($this->method()==='get'){
            foreach ($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->method()==='post' || $this->method() === 'put' || $this->method() === 'delete'){
            $body = (array)json_decode(file_get_contents("php://input"));
        }

        return $body;
    }
}
?>