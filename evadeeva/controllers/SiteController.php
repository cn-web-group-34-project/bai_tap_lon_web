<?php   

namespace app\controllers;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller{
    public function home(){
        return $this->render('home');
    }
    public function contact(){
        return $this->render('contact');
    }

    public static function handleContact(Request $request){
        $body = $request->getBody();
        print_r($body);
        return "Handling submitted data";
    }
}


?>