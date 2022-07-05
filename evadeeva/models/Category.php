<?php
namespace app\models;
use app\core\Model;

class Category extends Model{
    public int $CategoryID;
    public string $CategoryName = "";
    public string $Image = "";

    public function tableName(): string
    {
        return 'category';
    }

    public function attributes(): array
    {   
        return ['CategoryName', 'Image'];
    }

    public function getIdName(){
        return 'CategoryID';
    }
}

?>