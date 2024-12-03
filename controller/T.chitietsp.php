<?php
switch ($action) {   
    case 'chitietsp':
        $product = getProduct();  
        include "views/chitietsp.php";  
        break;  
        
}