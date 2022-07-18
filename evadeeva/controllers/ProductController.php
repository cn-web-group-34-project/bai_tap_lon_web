<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Product;
use PDO;

class ProductController extends Controller{
    public Product $model;
    public function __construct()
    {
        $this->model = new Product();
    }
    public function get_all_products(){
        $result = $this->model->select();
        if ($result->rowCount()>0){
            $arrays = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                $row['Image'] = explode(",",$row['Image']);
                array_push($arrays, $row);
            }
        }
        return json_encode($arrays);
    }

    public function get_num_product(){
        $result = $this->model->select();
        if ($result->rowCount()>0){
            return json_encode($result->rowCount());
        }
    }

    public function get_limit_products(Request $request){
        if ($request->isGet()){
            $data = $request->getBody();
            $result = $this->model->select_limit($data['offset'], $data['count']);
            if ($result->rowCount()>0){
                $arrays = [];
                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $row['Image'] = explode(",",$row['Image']);
                    array_push($arrays, $row);
                }
            }
            return json_encode($arrays);
        }
    }

    public function get_product_by_categoryID(Request $request){
        if ($request->isGet()){
            $data = $request->getBody();
            $result = $this->model->get_product_by_categoryID($data);
            if ($result->rowCount()>0){
                $arrays = [];
                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $row['Image'] = explode(",",$row['Image']);
                    array_push($arrays,$row);
                }
                return json_encode($arrays);
            }
        }
    }

    public function get_num_product_by_CategoryID(Request $request){
        if ($request->isGet()){
            $data = $request->getBody();
            $result = $this->model->get_product_by_categoryID($data);
            if ($result->rowCount()>0){
                return json_encode($result->rowCount());
            }
        }
    }

    public function get_num_product_by_ProductTypeID(Request $request){
        if ($request->isGet()){
            $data = $request->getBody();
            $result = $this->model->select_by_id($data);
            if ($result->rowCount()>0){
                return $result->rowCount();
            }
        }
    }

    public function get_products_limit_by_id(Request $request){
        if ($request->isGet()){
            $data = $request->getBody();
            $id[array_keys($data)[0]]=array_values($data)[0];
            $result = $this->model->get_products_limit_by_id($id, $data['offset'], $data['count']);
            if ($result->rowCount()>0){
                $arrays = [];
                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $row['Image'] = explode(",",$row['Image']);
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
                    $row['Image'] = explode(",",$row['Image']);
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