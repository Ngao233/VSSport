<?php 
include_once 'model/connect.php';
include 'views/navbar/header.php';
if(isset($_GET['pages']) && $_GET['pages']){
    $page = $_GET['pages'];  
    switch($page) {
        case 'products':
            $title ='Products';
            include 'model/products.php';
            
            $product = new products();
            $prolist=$product ->get_products();
            include 'views/pages/product/products.php';
            
            break;
        case 'detail':
            include 'model/products.php';
            include 'views/navbar/header.php';
            include 'views/pages/product/detail.php';
            include 'views/navbar/footer.php';
            break;
        case 'login':
            include 'model/user.php';
            include 'views/navbar/header.php';
            include 'views/users/login.php';
            include 'views/navbar/footer.php';
            break;
        case 'register':
            include 'model/user.php';
            include 'views/navbar/header.php';
            include 'views/users/register.php';
            include 'views/navbar/footer.php';
            break;
        case 'cart':
            include 'model/user.php';
            include 'views/navbar/header.php';
            include 'views/pages/cart.php';
            include 'views/navbar/footer.php';
            break;
        case 'logout':
            unset($_SESSION['user']);
            header('location:index.php');
            break;
            case 'profile':
                include 'model/user.php';
                include 'views/navbar/header.php';
                include 'views/users/login.php';
                include 'views/navbar/footer.php';
                break;
        default:
        include 'index.php';    
            break;
    }
} else {
        include 'model/products.php';
        include 'views/pages/home.php';
}
include 'views/navbar/footer.php';