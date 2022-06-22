<?php
class Database extends PDO{
    public function __construct($connect, $user, $password)
    {
        parent::__construct($connect, $user, $password);
    }

    public function select($table){
        $query = "SELECT * FROM $table";
        $statement = $this->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function insert($table, $data){
        $keys = implode(',', array_keys($data));
        $values = '\''.implode('\',\'',array_values($data)).'\'';
        $query = "INSERT INTO $table ($keys) VALUES ($values)";
        $statement = $this->prepare($query);
        return $statement->execute();
    }

    public function update($table, $data, $cond){
        $set="";
        foreach ($data as $key => $value){
            $set = $set."$key='$value',";
        }
        $set = rtrim($set, ',');
        $query = "UPDATE $table SET $set WHERE $cond";
        $statement = $this->prepare($query);
        return $statement->execute();
    }

    public function delete($table, $id){
        $cond = ucfirst($table).'Id'."=$id";
        $query = "DELETE FROM $table WHERE $cond";
        $statement = $this->prepare($query);
        return $statement->execute();
    }
}