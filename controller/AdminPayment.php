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
        case 'paymentpost':  
            include 'views/lồn.php';
            break;
}

?>
