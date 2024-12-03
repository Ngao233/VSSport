<?php   
include_once "model/category.php";  
include_once "model/product.php";  


switch ($action) {  
    case '':  
        $product = getProduct(); 
        include_once "views/header.php"; 
        include "views/home.php";  
        include_once "views/footer.php";
<<<<<<< HEAD
        break;
        case 'statistics':
            include "admin/statistics.php";
            break;
        case 'home':  
            $product = getProduct(); 
            include_once "views/header.php"; 
            include "views/home.php";  
            include_once "views/footer.php";
            break;
               
=======
        break;  
>>>>>>> 83cddcf9fc95eb14b763bed4cc3f09dfec9561a5
        }
        