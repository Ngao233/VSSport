<?php 
//include_once "models/Category.php";
include_once "model/oder.php";

// include_once "models/contact.php";
switch ($action) {
    case 'chitiepsp':
        $oder = getOder();
        include "admin/HeaderAdmin.php";
        include "admin/oder/HomeOder.php";
        include "admin/FooterAdmin.php";
        break;
    }