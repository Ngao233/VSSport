<?php 
//include_once "models/Category.php";
include_once "model/cart.php";
// include_once "models/contact.php";
switch ($action) {
    case 'giohang':
        include "admin/HeaderAdmin.php";
        include "views/giohang.php";
        include "admin/FooterAdmin.php";
        break; 
    }