<?php
namespace app\core;


abstract class Model{

    public function loadData($data){
        foreach ($data as $key => $value){
            if (property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
    }

    abstract public function tableName(): string;
    abstract public function attributes(): array;


    public function insert(){
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr)=>":$attr",$attributes);
        $statement = self::prepare("INSERT INTO $tableName(".implode(',', $attributes).") VALUES(".implode(',', $params).")");
        foreach ($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        return $statement->execute();
    }

    public function select(){
        $tableName = $this->tableName();
        $statement = self::prepare("SELECT * FROM $tableName");
        $statement->execute();
        return $statement;
    }

    public function select_limit($offset, $count){
        $tableName = $this->tableName();
        $statement = self::prepare("SELECT * FROM $tableName LIMIT $offset, $count");
        $statement->execute();
        return $statement;
    }

    public function select_by_id($params){
        $tableName = $this->tableName();
        foreach ($params as $key => $value){
            $cond = "$key='$value'";
        }
        $statement = self::prepare("SELECT * FROM $tableName WHERE $cond");
        $statement->execute();
        return $statement;
    }

    public function select_limit_by_id($id, $offset, $count){
        $tableName = $this->tableName();
        foreach ($id as $key => $value){
            $cond = "$key='$value'";
        }
        $statement = self::prepare("SELECT * FROM $tableName WHERE $cond LIMIT $offset, $count");
        $statement->execute();
        return $statement;
    }

    public function update($id){
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        foreach ($id as $key => $value){
            $cond = "$key='$value'";
        }
        $params = array_map(fn($attr)=>"$attr=:$attr",$attributes);
        $statement = self::prepare("UPDATE $tableName SET ".implode(',', $params)." WHERE $cond");
        foreach ($attributes as $attribute){
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        return $statement->execute();
    }

    public function delete($params){
        $tableName = $this->tableName();
        foreach ($params as $key => $value){
            $cond = "$key='$value'";
        }
        $statement = self::prepare("DELETE FROM $tableName WHERE $cond");
        return $statement->execute();
    }


    public static function prepare($sql){
        return Application::$app->db->pdo->prepare($sql);
    }
}
?>