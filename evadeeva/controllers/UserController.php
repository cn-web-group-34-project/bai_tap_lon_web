<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\User;
use PDO;

class UserController extends Controller{
    public User $model;
    public function __construct()
    {
        $this->model = new User();
    }

    public function login(Request $request){
        if ($request->isPost()){
            $data = $request->getBody();
            $email['Email']= $request->getBody()['Email'];
            $result = $this->model->select_by_id($email);
            if ($result->rowCount()>0){
                $arrays = [];
                while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    if ($data['PassWord'] == $row['PassWord']){
                        array_push($arrays, $row);
                        return json_encode($arrays);
                    }
                    else{
                        $error['error'] = 1;
                        return json_encode($error);
                    }
                }
            }
            else {
                $error['error'] = 0;
                return json_encode($error);
            }
        }
    }

    public function register(Request $request){
        if ($request->isPost()){
            $data['Email']= $request->getBody()['Email'];
            $result = $this->model->select_by_id($data);
            if ($result->rowCount()>0){
                $error = 'Email đã tồn tại';
                return $error;
            }
            else {
                $this->model->loadData($request->getBody());
                $this->model->insert();
                $email['Email']= $request->getBody()['Email'];
                $result = $this->model->select_by_id($email);
                if ($result->rowCount()>0){
                    $arrays = [];
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                        array_push($arrays, $row);
                    }
                }
                return json_encode($arrays);
            }
        }
    }

    public function get_all_users(){
        $result = $this->model->select();
        if ($result->rowCount()>0){
            $arrays = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                array_push($arrays, $row);
            }
        }
        return json_encode($arrays);
    }

    public function get_user_by_id(Request $request){
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

    public function insert_user(Request $request){
        if ($request->isPost()){
            $this->model->loadData($request->getBody());
            return $this->model->insert();
        }
    }

    public function update_user(Request $request){
        if ($request->isPut()){
            $id[$this->model->getIdName()]=$request->getBody()[$this->model->getIdName()];
            $this->model->loadData($request->getBody());
            return $this->model->update($id);
        }
    }

    public function delete_user(Request $request){
        if ($request->isDelete()){
            $data = $request->getBody();
            return $this->model->delete($data);
        }
    }
}
?>