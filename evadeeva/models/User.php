<?php
namespace app\models;
use app\core\Model;

class User extends Model{
    public string $Email = "";
    public string $PassWord = "";
    public string $Name = "";
    public string $PhoneNumber = "";
    public int $Point = 0;
    public string $Address = "";
    public int $Role = 0;

    public function tableName(): string
    {
        return 'user';
    }

    public function attributes(): array
    {   
        return ['Email', 'PassWord', 'Name', 'PhoneNumber', 'Point', 'Address', 'Role'];
    }

    public function getIdName(){
        return 'UserID';
    }
    
    // public function insert(){
    //     $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    //     return parent::insert();
    // }


}

?>