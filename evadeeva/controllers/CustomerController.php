<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Customer;
use PDO;

class CustomerController extends Controller{
    public Customer $model;
    public function __construct()
    {
        $this->model = new Customer();
    }
    public function get_all_customers(){
        $result = $this->model->select();
        if ($result->rowCount()>0){
            $arrays = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                array_push($arrays, $row);
            }
        }
        return json_encode($arrays);
    }

    public function get_customer_by_id(Request $request){
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

    public function insert_customer(Request $request){
        if ($request->isPost()){
            $this->model->loadData($request->getBody());
            return $this->model->insert();
        }
    }

    public function update_customer(Request $request){
        if ($request->isPut()){
            $id[$this->model->getIdName()]=$request->getBody()[$this->model->getIdName()];
            $this->model->loadData($request->getBody());
            return $this->model->update($id);
        }
    }

    public function delete_customer(Request $request){
        if ($request->isDelete()){
            $data = $request->getBody();
            return $this->model->delete($data);
        }
    }
}
?>