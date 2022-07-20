<?php
namespace app\core;

class Application{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public static Application $app;
    public Controller $controller;
    public Database $db;


    public function __construct($path, array $config)
    {
        self::$ROOT_DIR = $path;
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->db = new Database($config['db']);
    }
    public function run(){
        echo $this->router->resolve();
    }

    public function getController(){
        return $this->controller;
    }

    public function setController(Controller $controller){
        $this->controller = $controller;
    }
}