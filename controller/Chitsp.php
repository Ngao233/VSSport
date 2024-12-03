<?php 
//include_once "models/Category.php";
include_once "model/product_detail.php";
include_once "model/product.php";

// include_once "models/contact.php";
switch ($action) {
    case 'chitiepsp':
        $oder = getOder();
        include "views/header.php";
        include "views/chitietsanpham.php";
        include "views/ footer.php";
        break;
    }