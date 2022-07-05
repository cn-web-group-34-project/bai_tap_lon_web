<?php
namespace app\models;
use app\core\Model;

class User extends Model{
    public string $email = "";
    public string $password = "";
    public string $confirmPassword = "";

    public function tableName(): string
    {
        return 'users';
    }

    public function attributes(): array
    {   
        return [];
    }
    
    public function insert(){
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::insert();
    }


}

?>