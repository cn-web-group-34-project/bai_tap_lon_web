<?php
namespace app\models;
use app\core\Model;

class ProductType extends Model{
    public int $ProductTypeID;
    public string $ProductTypeName = "";
    public string $CategoryID = "";

    public function tableName(): string
    {
        return 'producttype';
    }

    public function attributes(): array
    {   
        return ['ProductTypeName', 'CategoryID'];
    }

    public function getIdName(){
        return 'ProductTypeID';
    }
}

?>