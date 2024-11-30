<?php 
//include_once "models/Category.php";
include_once "model/product.php";
// include_once "models/contact.php";
switch ($action) {
    case '':
        $product = getProduct();
        include "admin/HeaderAdmin.php";
        include "admin/HomeAdmin.php";
        include "admin/FooterAdmin.php";
        break; 
    case 'editproduct':
        $id = $_GET["id"] ?? "";  
        $product = getProductid($id);
        include "admin/edit.php";
        break;
    case "updateproduct":
        $errors=[];
        $TenSanPham=trim($_POST["TenSanPham"])??"";
        if($TenSanPham==""){
             array_push($errors, "Vui lòng nhập tên ");
        }
         $MoTa=trim($_POST["MoTa"]) ?? "";
         if($MoTa==""){
            array_push($errors, "Vui lòng nhập hình ảnh");
         }
        $Gia=trim($_POST["Gia"]) ?? "";
        if($Gia==""){
             array_push($errors, "Vui lòng nhập gia");
        }
        $SoLuong=trim($_POST["SoLuong"]) ?? "";
        if($SoLuong==""){
             array_push($errors, "Vui lòng nhập số lượng");
        }
        $HinhAnh=trim($_POST["HinhAnh"]) ?? "";
        if($HinhAnh==""){
            array_push($errors, "Vui lòng nhập ảnh");
        }
        $KichThuoc=trim($_POST["KichThuoc"]) ?? "";
        if($KichThuoc==""){
             array_push($errors, "Vui lòng nhập kích thước");
        }
        $MauSac=trim($_POST["MauSac"]) ?? "";
        if($MauSac==""){
             array_push($errors, "Vui lòng nhập màu sắc");
        }
        
        
        $id=$_GET["id"]??"";
        $product = getProductid($id);
        include "admin/edit.php";
        if(count($errors)==0){
            updateProduct($id,$TenSanPham,$MoTa,$Gia,$SoLuong,$HinhAnh,$KichThuoc,$MauSac);
            header("Location: $base_url");
        }       
        break;
    
}