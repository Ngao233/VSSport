<?php   
include_once "model/category.php";  
include_once "model/product.php";  
include_once "model/tintuc.php";


switch ($action) {  
    case '':  
        $product1 = getProductWithDiscount();
        $product = getProduct();
        $tintuc = getTinTucLimit();
        include_once "views/header.php"; 
        include "views/home.php";  
        include_once "views/footer.php";
    break;
    case 'statistics':
        include "admin/statistics.php";
        break;
    case 'home':  
        $product1 = getProductWithDiscount();
        $product = getProduct();
        $tintuc = getTinTucLimit();
        include_once "views/header.php"; 
        include "views/home.php";  
        include_once "views/footer.php";
        break;
    case 'searchome':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
            $search = trim($_POST["search"] ?? ""); // Nhận từ khóa tìm kiếm  
        
            if ($search != "") {  
               
                $product = searchProduct($search);
                if ($product) {  
                    include "views/search.php";
                } else {  
                    include "views/search1.php";
                }  
            }  
        }  
    break;
    case 'searchgiaythethao':
        include "views/danhmucid1.php";
        break;

}
        