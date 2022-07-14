<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\ProductDetail;
use PDO;

class ProductDetailController extends Controller{
    public ProductDetail $model;
    public function __construct()
    {
        $this->model = new ProductDetail();
    }

    public function get_product_detail_by_id(Request $request){
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

    public function get_product_detail_by_categoryID(Request $request){
        if ($request->isGet()){
            $data = $request->getBody();
            $result = $this->model->get_product_detail_by_categoryID($data);
        if ($result->rowCount()>0){
            $arrays = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                array_push($arrays,$row);
            }
        }
        return json_encode($arrays);
        }
    }

    public function insert_product_detail(Request $request){
        if ($request->isPost()){
            $this->model->loadData($request->getBody());
            return $this->model->insert();
        }
    }

    public function update_product_detail(Request $request){
        if ($request->isPut()){
            $id[$this->model->getIdName()]=$request->getBody()[$this->model->getIdName()];
            $this->model->loadData($request->getBody());
            return $this->model->update($id);
        }
    }

    public function delete_product_detail(Request $request){
        if ($request->isDelete()){
            $data = $request->getBody();
            return $this->model->delete($data);
        }
    }
}
?>