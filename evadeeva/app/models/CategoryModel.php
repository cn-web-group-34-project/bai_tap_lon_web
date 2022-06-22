<?php

class CategoryModel extends DModel{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAll(){
        return $this->db->select('category');
    }
    public function insert($data){
        return $this->db->insert('category',$data);
    }
    public function update($data, $cond){
        return $this->db->update('category',$data, $cond);
    }
    public function delete($cond){
        return $this->db->delete('category', $cond);
    }
}
?>