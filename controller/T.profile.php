<?php  
switch ($action) {  
    case 'profile':
        include "views/profile.php";
        include_once "views/footer.php";
        break;
        }


include_once "model/product.php";  
include_once "model/login.php";  

switch ($action) {   
 

        case 'profile':
            include "views/profile.php"; 
            break;
        case 'logout':
        break;
        
}