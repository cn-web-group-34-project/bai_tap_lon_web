<?php
class Load{
    public function view($file_name, $data = NULL){
        include_once('app/views/'.$file_name.'.php');
    }
    public function model($file_name){
        include_once('app/models/'.$file_name.'.php');
        return new $file_name();
    }
}
?>