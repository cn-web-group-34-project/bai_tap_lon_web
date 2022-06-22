<?php
class DModel{
    protected $db;
    public function __construct()
    {
        $connect = 'mysql:dbname=evadeeva; host=localhost';
        $user = 'root';
        $password = '';
        $this->db=new Database($connect, $user, $password);
    }
}