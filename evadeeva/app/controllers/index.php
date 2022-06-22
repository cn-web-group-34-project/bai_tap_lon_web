<?php
class IndexController extends Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $this->home();
    }
    public function home(){
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }
}

?>