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
        include 'views/lichsudonhang.php';
        break;
    case 'chitiet':
        include 'views/chitietdonhang.php';
        break;
}

?>
