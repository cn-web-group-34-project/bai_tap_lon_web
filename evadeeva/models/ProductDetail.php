<?php
namespace app\models;
use app\core\Model;

class ProductDetail extends Model{
    public int $ProductDetailID;
    public int $ProductID = 0;
    public int $SizeM = 0;
    public int $SizeS = 0;
    public int $SizeL = 0;
    public int $SizeXL = 0;
    public string $Material = "";
    public string $Color = "";

    public function tableName(): string
    {
        return 'productdetail';
    }

    public function attributes(): array
    {   
        return ['ProductID', 'SizeM','SizeS', 'SizeL', 'SizeXL', 'Material', 'Color'];
    }

    public function getIdName(){
        return 'ProductDetailID';
    }
}

?>