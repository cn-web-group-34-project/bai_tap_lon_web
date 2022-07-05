<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Category;
use PDO;

class CategoryController extends Controller{
    public Category $model;
    public function __construct()
    {
        $this->model = new Category();
    }
    public function get_all_categories(){
        $result = $this->model->select();
        if ($result->rowCount()>0){
            $arrays = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                array_push($arrays, $row);
            }
        }
        return json_encode($arrays);
    }

    public function get_categories_limit(Request $request){
        if ($request->isGet()){
            $data = $request->getBody();
            $result = $this->model->select_limit($data['offset'], $data['count']);
            if ($result->rowCount()>0){
                $arrays = [];
                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    array_push($arrays,$row);
                }
            }
            return json_encode($arrays);
        }
        
    }

    public function get_categories_by_id(Request $request){
        if ($request->isGet()){
            $data = $request->getBody();
        }
        $result = $this->model->select_by_id($data);
        if ($result->rowCount()>0){
            $arrays = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                array_push($arrays,$row);
            }
        }
        return json_encode($arrays);
    }

    public function insert_category(Request $request){
        if ($request->isPost()){
            $this->model->loadData($request->getBody());
            return $this->model->insert();
        }
    }

    public function update_category(Request $request){
        if ($request->isPut()){
            $id[$this->model->getIdName()]=$request->getBody()[$this->model->getIdName()];
            $this->model->loadData($request->getBody());
            return $this->model->update($id);
        }
    }

    public function delete_category(Request $request){
        if ($request->isDelete()){
            $data = $request->getBody();
            return $this->model->delete($data);
        }
    }
}
?>