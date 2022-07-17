<?php
require_once __DIR__.'/../vendor/autoload.php';

use app\controllers\SiteController;
use app\controllers\AuthController;
use app\controllers\CategoryController;
use app\controllers\CustomerController;
use app\controllers\OrderController;
use app\controllers\ProductController;
use app\controllers\ProductDetailController;
use app\controllers\ProductTypeController;
use app\controllers\UserController;
use app\core\Application;


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        // may also be using PUT, PATCH, HEAD etc
        header("Access-Control-Allow-Methods: GET, DELETE ,POST, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

$config = [
    'db'=>[
        'dsn'=>'mysql:host=localhost;port=3306;dbname=evadeeva',
        'user'=>'root',
        'password'=>''
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/',[SiteController::class,'home']);
$app->router->get('/contact',[SiteController::class,'handleContact']);
$app->router->get('/contact',[SiteController::class,'contact']);
$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);
$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);

$app->router->get('/get_all_categories',[CategoryController::class,'get_all_categories']);
$app->router->get('/get_categories_limit',[CategoryController::class,'get_categories_limit']);
$app->router->get('/get_categories_by_id',[CategoryController::class,'get_categories_by_id']);
$app->router->post('/insert_category',[CategoryController::class,'insert_category']);
$app->router->put('/update_category',[CategoryController::class,'update_category']);
$app->router->delete('/delete_category',[CategoryController::class,'delete_category']);

$app->router->post('/insert_product_type',[ProductTypeController::class,'insert_product_type']);
$app->router->get('/get_all_product_types',[ProductTypeController::class,'get_all_product_types']);
$app->router->get('/get_product_types_by_id',[ProductTypeController::class,'get_product_types_by_id']);
$app->router->put('/update_product_type',[ProductTypeController::class,'update_product_type']);
$app->router->delete('/delete_product_type',[ProductTypeController::class,'delete_product_type']);

$app->router->post('/insert_user',[UserController::class,'insert_user']);
$app->router->post('/register',[UserController::class,'register']);
$app->router->get('/get_all_users',[UserController::class,'get_all_users']);
$app->router->get('/get_user_by_id',[UserController::class,'get_user_by_id']);
$app->router->put('/update_user',[UserController::class,'update_user']);
$app->router->delete('/delete_user',[UserController::class,'delete_user']);

$app->router->post('/insert_product',[ProductController::class,'insert_product']);
$app->router->get('/get_all_products',[ProductController::class,'get_all_products']);
$app->router->get('/get_product_by_categoryID',[ProductController::class,'get_product_by_categoryID']);
$app->router->get('/get_products_limit_by_id',[ProductController::class,'get_products_limit_by_id']);
$app->router->get('/get_product_by_id',[ProductController::class,'get_product_by_id']);
$app->router->put('/update_product',[ProductController::class,'update_product']);
$app->router->delete('/delete_product',[ProductController::class,'delete_product']);

$app->router->post('/update_order',[OrderController::class,'update_order']);
$app->router->get('/get_all_orders',[OrderController::class,'get_all_orders']);
$app->router->get('/get_order_by_id',[OrderController::class,'get_order_by_id']);
$app->router->put('/update_order',[OrderController::class,'update_order']);
$app->router->delete('/delete_order',[OrderController::class,'delete_order']);

$app->run();
?>
