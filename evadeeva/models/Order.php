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
    public string $Time = "";
    public int $Discount = 0;
    public string $Status = "";

    public function tableName(): string
    {
        return '`order`';//???
    }

    public function attributes(): array
    {   
        return ['CustomerID', 'ProductID','Price', 'Size','Quantity','Time','Discount', 'Status'];
    }

    public function getIdName(){
        return 'OrderID';
    }

    public function get_order_by_id($params, $offset, $count){
        foreach ($params as $key => $value){
            $cond = "$key='$value'";
        };
        $query = "SELECT * FROM product, `order` WHERE product.ProductID = order.ProductID AND order.$cond LIMIT $offset, $count";
        $statement = self::prepare($query);
        $statement->execute();
        return $statement;
    }

    public function get_all_orders(){
        $query = "SELECT * FROM product, `order` WHERE product.ProductID = order.ProductID";
        $statement = self::prepare($query);
        $statement->execute();
        return $statement;
    }

    public function get_limit_orders($offset, $count){
        $query = "SELECT * FROM product, `order` WHERE product.ProductID = order.ProductID LIMIT $offset, $count";
        $statement = self::prepare($query);
        $statement->execute();
        return $statement;
    }

}

?>