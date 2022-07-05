<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Products;
use PDO;

class ProductController extends Controller{
    public Products $model;
    public function __construct()
    {
        $this->model = new Products();
    }
    public function get_all_products(){
        $result = $this->model->select();
        if ($result->rowCount()>0){
            $arrays = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                array_push($arrays, $row);
            }
        }
        return json_encode($arrays);
    }

    public function get_products_limit_by_id(Request $request){
        if ($request->isGet()){
            $data = $request->getBody();
            $id[array_keys($data)[0]]=array_values($data)[0];
            $result = $this->model->select_limit_by_id($id, $data['offset'], $data['count']);
            if ($result->rowCount()>0){
                $arrays = [];
                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    array_push($arrays,$row);
                }
            }
            return json_encode($arrays);
        }
    }

    public function get_product_by_id(Request $request){
        if ($request->isGet()){
            $data = $request->getBody();
            $result = $this->model->select_by_id($data);
            if ($result->rowCount()>0){
                $arrays = [];
                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    array_push($arrays,$row);
                }
            }
            return json_encode($arrays);
        }
    }

    public function insert_product(Request $request){
        if ($request->isPost()){
            $this->model->loadData($request->getBody());
            return $this->model->insert();
        }
    }

    public function update_product(Request $request){
        if ($request->isPut()){
            $id[$this->model->getIdName()]=$request->getBody()[$this->model->getIdName()];
            $this->model->loadData($request->getBody());
            return $this->model->update($id);
        }
    }

    public function delete_product(Request $request){
        if ($request->isDelete()){
            $data = $request->getBody();
            return $this->model->delete($data);
        }
    }
}
?>