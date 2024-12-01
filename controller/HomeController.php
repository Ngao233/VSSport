<?php 
//include_once "models/Category.php";
include_once "model/product.php";
// include_once "models/contact.php";
switch ($action) {
    case 'home':
        $product = getProduct();
        include "views/home.php";
        break; 
    case 'register':
        $product = getProduct();
        include "views/register.php";
        break;
    // case 'product':
    //     $product = getProduct();
    //     include "views/layouts/header.php";
    //     include "views/product/product.php";
    //     include "views/layouts/footer.php";
    //     break;
    // case 'contact':
    //     $contact = getContact();
    //     include "views/layouts/header.php";
    //     include "views/product/contact.php";
    //     include "views/layouts/footer.php";
    //     break;
    // case 'dk':
    //     include "views/product/dk.php";
    //     break;
    // case 'login':
    //     include "views/layouts/header.php";
    //     include "views/product/login.php";
    //     include "views/layouts/footer.php";
    //     break;
}