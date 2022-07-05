<?php
namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\User;
use app\core\Application;
use app\core\Response;
use app\models\LoginForm;

class AuthController extends Controller{
    public function login(Request $request, Response $response){
        $loginForm = new LoginForm();
        if ($request->isPost()){
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()){
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login');
    }
    public function register(Request $request){
        $user = new User();

        if ($request->isPost()){
            $user->loadData($request->getBody()); 

            if ($user->validate() && $user->insert()){
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }

            $this->setLayout('auth');
            return $this->render('register',[
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register',[
            'model' => $user
        ]);
    }
}
?>