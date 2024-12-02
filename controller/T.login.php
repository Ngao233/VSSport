<?php   
include_once "model/category.php";  
include_once "model/product.php";  


switch ($action) {   
        case 'dangnhap':
            include "model/login.php";
            
            include "views/dangnhap.php";  
            
            break;
        
        }
        