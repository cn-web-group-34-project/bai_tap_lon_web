<?php
require_once __DIR__.'/../vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use app\controllers\SiteController;
use app\controllers\AuthController;
use app\controllers\CategoryController;
use app\controllers\CustomerController;
use app\controllers\OrderController;
use app\controllers\ProductController;
use app\controllers\ProductDetailController;
use app\controllers\ProductTypeController;
use app\core\Application;

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

$app->router->post('/insert_customer',[CustomerController::class,'insert_customer']);
$app->router->get('/get_all_customers',[CustomerController::class,'get_all_customers']);
$app->router->get('/get_customer_by_id',[CustomerController::class,'get_customer_by_id']);
$app->router->put('/update_customer',[CustomerController::class,'update_customer']);
$app->router->delete('/delete_customer',[CustomerController::class,'delete_customer']);

$app->router->post('/insert_product',[ProductController::class,'insert_product']);
$app->router->get('/get_all_products',[ProductController::class,'get_all_products']);
$app->router->get('/get_products_limit_by_id',[ProductController::class,'get_products_limit_by_id']);
$app->router->get('/get_product_by_id',[ProductController::class,'get_product_by_id']);
$app->router->put('/update_product',[ProductController::class,'update_product']);
$app->router->delete('/delete_product',[ProductController::class,'delete_product']);

$app->router->post('/update_order',[OrderController::class,'update_order']);
$app->router->get('/get_all_orders',[OrderController::class,'get_all_orders']);
$app->router->get('/get_order_by_id',[OrderController::class,'get_order_by_id']);
$app->router->put('/update_product',[OrderController::class,'update_product']);
$app->router->delete('/delete_order',[OrderController::class,'delete_order']);

$app->router->post('/insert_product_detail',[ProductDetailController::class,'insert_product_detail']);
$app->router->get('/get_product_detail_by_id',[ProductDetailController::class,'get_product_detail_by_id']);
$app->router->put('/update_product_detail',[ProductDetailController::class,'update_product_detail']);
$app->router->delete('/delete_product_detail',[ProductDetailController::class,'delete_product_detail']);


$app->run();
?>
