<?php 
//include_once "models/Category.php";
include_once "model/product.php";
include_once "model/oder.php";
include_once "model/user.php";
include_once "model/category.php";
// include_once "models/contact.php";
switch ($action) {
    case 'admin':
        
        $product = getProduct();
        include "admin/HeaderAdmin.php";
        include "admin/product/HomeAdmin.php";
        include "admin/FooterAdmin.php";
        break; 
    case 'editproduct':
        $id = $_GET["id"] ?? "";  
        $product = getProductid($id);
        $categories = getAllCategories();
        include "admin/product/edit.php";
        break;
        case "updateproduct":  
            $id = $_GET["id"] ?? "";  
            $product = getProductid($id);  
        
            $TenSanPham = trim($_POST["TenSanPham"] ?? "");  
            $MoTa = trim($_POST["MoTa"] ?? "");  
            $Gia = trim($_POST["Gia"] ?? "");  
            $SoLuong = trim($_POST["SoLuong"] ?? "");  
            $HinhAnh = trim($_POST["HinhAnh"] ?? "");  
            $KichThuoc = trim($_POST["KichThuoc"] ?? "");  
            $MauSac = trim($_POST["MauSac"] ?? "");  
            $id_DanhMuc = $_POST["id_DanhMuc"] ?? "";  
        
            updateProduct($id, $TenSanPham, $MoTa, $Gia, $SoLuong, $HinhAnh, $KichThuoc, $MauSac, $id_DanhMuc);  
            header("Location: $base_url");  
            exit;
    case 'addproduct':
            include "admin/product/add.php";
        break;
    case "postproduct":
        $TenSanPham=trim($_POST["TenSanPham"]) ?? "";
        $MoTa=trim($_POST["MoTa"]) ?? "";
        $Gia=trim($_POST["Gia"]) ?? "";
        $SoLuong=trim($_POST["SoLuong"]) ?? "";
        $HinhAnh=trim($_POST["HinhAnh"]) ?? "";
        $KichThuoc=trim($_POST["KichThuoc"]) ?? "";
        $MauSac=trim($_POST["MauSac"]) ?? "";
        include "admin/product/add.php";
            addProduct($TenSanPham,$MoTa,$Gia,$SoLuong,$HinhAnh,$KichThuoc,$MauSac);
            header("Location: $base_url");    
        break;   
        
        case 'searchproduct':  
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $search = trim($_POST["search"] ?? ""); // Nhận từ khóa tìm kiếm  
            
                if ($search != "") {  
                   
                    $product = searchProduct($search);
                    if ($product) {  
                        
                        include "admin/product/search.php";
                        
                    } else {  
                        $errors[] = "Không có kết quả nào được tìm thấy.";  
                        
                    }  
                
                }  
            }  
            break; 
            case "deleteproduct":
                $id=$_GET["id"]??"";
                deleteProduct($id);
                header("Location: $base_url");
                break;
    case 'oderAdmin':
        $oder = getOder();
        include "admin/HeaderAdmin.php";
        include "admin/oder/HomeOder.php";
        include "admin/FooterAdmin.php";
        break;
    case 'usersAdmin':
        $user = getUser();
        include "admin/HeaderAdmin.php";
        include "admin/user/homeUser.php";
        include "admin/FooterAdmin.php";
        break;
    case 'editoder':
            $id = $_GET["id"] ?? "";  
            $oder = getOderid($id);
            include "admin/oder/edit.php";
            break;
    
            case "updateoder":
                $NgayDatHang=trim($_POST["NgayDatHang"])??"";
                
                 $TrangThai=trim($_POST["TrangThai"]) ?? "";

                $id=$_GET["id"]??"";
                $oder = getOderid($id);
                include "admin/oder/edit.php";
                updateOder($id,$NgayDatHang,$TrangThai);
                    header("Location: $base_url/oderAdmin");
     
                break;
                case "deleteoder":
                    $id=$_GET["id"]??"";
                    deleteOder($id);
                    header("Location: $base_url/oderAdmin");
                    break;
}
    
            