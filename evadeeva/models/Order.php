<?php
namespace app\models;
use app\core\Model;

class Order extends Model{
    public int $OrderID;
    public int $CustomerID = 0; 
    public int $ProductID = 0;
    public int $Price = 0;
    public string $Size = "";
    public int $Quantity = 0;
    public int $Discount = 0;
    public string $Status = "";

    public function tableName(): string
    {
        return '`order`';//???
    }

    public function attributes(): array
    {   
        return ['CustomerID', 'ProductID','Price', 'Size','Quantity','Discount', 'Status'];
    }

    public function getIdName(){
        return 'OrderID';
    }
}

?>