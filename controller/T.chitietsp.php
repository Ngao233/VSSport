<?php
include_once "model/chitietsp.php";
include_once "model/product.php";  

switch ($action) {   
    case 'chitietsp': 
        $id = $_GET["id"] ?? "";  
        $productdetail = getProductDetail($id);
        $product1 = getProductWithDiscount();
        $product = getProductid($id);
        include "views/chitietsp.php";  
        break;  
    case 'cac':
        $id = $_GET["id"] ?? "";  
        $productdetail = getProductDetail($id);
        $product1 = getProductWithDiscount();
        $product = getProductid($id);
        include "views/cặc.php";
        break;
        
}   