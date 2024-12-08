<?php
include_once "model/payment.php";
// include_once "model/product.php";
// include_once "model/user.php";

// Kiểm tra action
switch ($action) {
    
    case 'thanhtoan':
        
        include "views/thanhtoan.php";
        include "views/footer.php";
        break;
    case 'hoadon':
        
        include 'views/hoadon.php';
        break;
    case 'lichsu':
        include "views/Header.php";
        include "views/lichsudonhang.php";
        include "views/Footer.php";
        break;
    case 'chitiet':
        include "views/Header.php";
        include "views/chitietdonhang.php";
        include "views/Footer.php";
        break;
}

?>
