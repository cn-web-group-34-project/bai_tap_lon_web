<?php
namespace app\models;
use app\core\Model;

class Customer extends Model{
    public int $CustomerID;
    public string $Email = "";
    public string $Name = "";
    public string $PhoneNumber = "";
    public int $Point = 0;
    public string $Address = "";


    public function tableName(): string
    {
        return 'customer';
    }

    public function attributes(): array
    {   
        return ['Email', 'Name', 'PhoneNumber', 'Point', 'Address'];
    }

    public function getIdName(){
        return 'CustomerID';
    }
}

?>