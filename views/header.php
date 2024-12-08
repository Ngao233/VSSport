<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="public/css/style1.css">
    <link rel="stylesheet" href="public/css/search.css">
     <!-- <link rel="stylesheet" href="public/css/dangky.css"> -->
     <!-- <link rel="stylesheet" href="public/css/dangnhap.css"> -->
     <!-- <link rel="stylesheet" href="public/css/diachi.css"> -->
     <!-- <link rel="stylesheet" href="public/css/doimatkhau.css"> -->
     <!-- <link rel="stylesheet" href="public/css/hoso.css"> -->

     <link rel="stylesheet" href="public/css/sanpham.css">
     <link rel="stylesheet" href="public/css/styleAdmin.css">
     <!-- <link rel="stylesheet" href="public/css/thanhtoan.css"> -->
     <link rel="stylesheet" href="public/css/tintuc.css">
    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang Chủ</title>

        <link
            href="https://fonts.googleapis.com/css2?family=Poppins&family=Montserrat&family=Raleway&family=Lato&family=Rubik&display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto&family=Nunito&family=Source+Sans+Pro&family=Josefin+Sans&display=swap"
            rel="stylesheet">
        <script src="https://kit.fontawesome.com/d4c9783f89.js" crossorigin="anonymous"></script>
        <style>
            body h2 {
                font-family: 'Montserrat', sans-serif;
                margin-left: 10%;
                margin-top: 60px;
            }
            .formhome input{
                display:none;
            }
        </style>
        <style>
    .formSearchhome{
    position: absolute;
    right: 180px;
    top: 35px;
     }
    .searchhome {
    padding: 8px !important;
    border: none;
    border-radius: 5px;
    width: 180px;
    display: none;
    transition: transform 1s ease;
    transform: translateX(100%);
     }
    .searchhome.show {  
    display: block; 
    transform: translateX(0);  
     }
    </style>


    </head>

<body>
    <header>
        <!-- menu phu -->
        <nav class="menu-one">
            <ul>
                <li><a href="home">VSSport.vn</a></li>
                <div>
                    <li><a href="#">Giúp đỡ</a></li>
                    <li><a href="#">Ngôn ngữ</a></li>
                </div>
            </ul>
        </nav>
        <!-- menu chinh -->
        <nav class="menu-two">
            <a href="home"><img src="public/image/logo.png" alt="" style="width: 155px ;"></a>
            <ul>
                <li><a href="home">TRANG CHỦ</a></li>
                <li><a href="tonghoptt">THÔNG TIN</a></li>
                <li><a href="dangky">ĐĂNG KÝ</a></li>
                <li><a href="dangnhap">ĐĂNG NHẬP</a></li>
            </ul>
            <!-- icon bao gom "shoping" "user" "seach" -->
            <div class="icon">
            <i id="search" style="color: white; font-size: 20px;" class="fa-solid fa-magnifying-glass"></i>
                <a href="giohang"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="hoso"><i class="fa-solid fa-user"></i></a>
                
            </div>
            <form action="searchome" class="formSearchhome" method="post">
                <input type="search" class="searchhome" name = "search" id="searchInput" placeholder="Tìm Kiếm Sản Phẩm">
            </form>

        </nav>

        <img src="" alt="">
        </section>
        