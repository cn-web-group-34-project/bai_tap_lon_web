<?php
    class ProductController extends Controller{
        function __construct()
        {
            parent::__construct();
            echo "This is ProductController".'<br>';
        }
        function productdetail(){
            echo "This is productdetail".'<br>';
        }
    }
?>