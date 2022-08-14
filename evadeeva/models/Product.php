<?php
namespace app\models;
use app\core\Model;

class Product extends Model{
    public int $ProductID;
    public string $ProductName = "";
    public string $Description = "";
    public string $Image = "";
    public int $Price = 0;
    public int $ProductTypeID = 0;
    public int $NewProduct = 0;
    public int $SizeM = 0;
    public int $SizeS = 0;
    public int $SizeL = 0;
    public int $SizeXL = 0;
    public string $Material = "";
    public string $Color = "";
    public string  $ModificationDate = "";

    public function tableName(): string
    {
        return 'product';
    }

    public function attributes(): array
    {   
        return ['ProductName', 'Description','Image', 'Price','ProductTypeID', 'NewProduct', 'SizeM','SizeS', 'SizeL', 'SizeXL', 'Material', 'Color', 'ModificationDate'];
    }

    public function getIdName(){
        return 'ProductID';
    }

    public function get_product_by_categoryID($param){
        foreach ($param as $key => $value){
            $cond = "$key = '$value'";
        }
        $query = "SELECT * FROM category, producttype, product WHERE category.CategoryID = producttype.CategoryID AND producttype.ProductTypeID = product.ProductTypeID AND category.$cond";
        $statement = self::prepare($query);
        $statement->execute();
        return $statement;
    }

    public function get_products_limit_by_id($param, $offset, $count){
        foreach ($param as $key => $value){
            $cond = "$key = '$value'";
        }
        $query = "SELECT * FROM category, producttype, product WHERE category.CategoryID = producttype.CategoryID AND producttype.ProductTypeID = product.ProductTypeID AND producttype.$cond LIMIT $offset, $count";
        $statement = self::prepare($query);
        $statement->execute();
        return $statement;
    }
}
