<?php
include_once "model/chitietsp.php";
include_once "model/product.php";
include_once "views/addtocart.php";  

switch ($action) {   
  
    case 'cac':
        $id = $_GET["id"] ?? "";  
        $productdetail = getProductDetail($id);
        $product1 = getProductWithDiscount();
        $product = getProductid($id);
        
        include "views/chitietsp1.php";
        
        break;     
}   