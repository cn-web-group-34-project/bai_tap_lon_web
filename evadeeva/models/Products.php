<?php
namespace app\models;
use app\core\Model;

class Products extends Model{
    public int $ProductID;
    public string $ProductName = "";
    public string $Description = "";
    public string $Image = "";
    public int $Price = 0;
    public int $ProductTypeID = 0;
    public int $NewProduct = 0;


    public function tableName(): string
    {
        return 'products';
    }

    public function attributes(): array
    {   
        return ['ProductName', 'Description','Image', 'Price','ProductTypeID', 'NewProduct'];
    }

    public function getIdName(){
        return 'ProductID';
    }
}

?>