<?php
include_once "model/payment.php";

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
        include "views/chitietdonhang.php";

        break;
}

?>
