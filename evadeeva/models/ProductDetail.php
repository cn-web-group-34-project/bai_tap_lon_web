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

    public function get_product_detail_by_categoryID($param){
        foreach ($param as $key => $value){
            $cond = "$key = '$value'";
        }
        $query = "SELECT * FROM category, producttype, products, productdetail WHERE category.CategoryID = producttype.CategoryID AND producttype.ProductTypeID = products.ProductTypeID AND productdetail.ProductID = products.ProductID AND category.$cond";
        $statement = self::prepare($query);
        $statement->execute();
        return $statement;
    }
}

?>