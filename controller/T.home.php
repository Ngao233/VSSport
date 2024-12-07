<?php   
include_once "model/category.php";  
include_once "model/product.php";  
include_once "model/tintuc.php";


switch ($action) {  
    case '':  
        $product1 = getProductWithDiscount();
        $product = getProduct();
        $tintuc = getTinTucLimit();
        include_once "views/header.php"; 
        include "views/home.php";  
        include_once "views/footer.php";
    break;
    case 'statistics':
        include "admin/statistics.php";
        break;
    case 'home':  
        $product1 = getProductWithDiscount();
        $product = getProduct();
        $tintuc = getTinTucLimit();
        include_once "views/header.php"; 
        include "views/home.php";  
        include_once "views/footer.php";
        break;

}
        