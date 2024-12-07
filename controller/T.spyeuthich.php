<?php   
include_once "model/category.php";  
include_once "model/product.php";  
switch ($action) {  
    case 'spyeuthich':  
        include_once "views/header.php"; 
        include "views/spyeuthich.php";  
        include_once "views/footer.php";
    break;
    
}