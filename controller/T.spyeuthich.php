<?php   
include_once "model/category.php";  
include_once "model/product.php";
  
switch ($action) {  
    case 'themspyt':  
        $id=$_GET["id"]??"";
        include_once "views/header.php"; 
        include "views/spyeuthich.php";  
        include_once "views/footer.php";
    break;
    
}