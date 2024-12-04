<?php

include_once "model/chitietsp.php";
switch ($action) {   
    case 'chitietsp': 
        $id = $_GET["id"] ?? "";  
        $product = getProductid($id);
        include "views/chitietsp.php";  
        break;  
        
}