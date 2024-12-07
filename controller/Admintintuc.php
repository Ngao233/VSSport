<?php 
//include_once "models/Category.php";
include_once "model/tintuc.php";
include_once "model/comment.php";


// include_once "models/contact.php";
switch ($action) {
    case 'tintucAdmin':
        $tintuc = getTinTuc();
        include "admin/HeaderAdmin.php";
        include "admin/tintuc/HomeTinTuc.php";
        include "admin/FooterAdmin.php";
        break;

    case 'edittintuc':
        $id = $_GET["id"] ?? "";  
        $tintuc = getTinTucid($id);
        include "admin/tintuc/edit.php";
        break;
        //update tin tuc//
            
    case "updatetintuc":
        $id = $_GET["id"] ?? "";
        $tintuc = getTinTucid($id); 

        $TieuDe=trim($_POST["TieuDe"])??"";
                
        $NgayDang=trim($_POST["NgayDang"]) ?? "";

        $HinhAnh = trim($_POST["HinhAnh"] ?? "");

        $NoiDung = trim($_POST["NoiDung"] ?? "");  

        $id=$_GET["id"]??"";    
        $tintuc = getTinTucid($id);
        include "admin/tintuc/edit.php";
        updateTinTuc($id,$TieuDe,$NgayDang,$HinhAnh,$NoiDung);
            header("Location: $base_url/tintucAdmin");
            exit;

    case 'addtintuc':
        include "admin/tintuc/add.php";
        break;

                
            //ghi ra tin tuc//
    case "posttintuc":
        $tintuc = getTinTucid($id); 

        $TieuDe=trim($_POST["TieuDe"])??"";
                
        $NgayDang=trim($_POST["NgayDang"]) ?? "";

        $HinhAnh = trim($_POST["HinhAnh"] ?? "");

        $NoiDung = trim($_POST["NoiDung"] ?? "");
        include "admin/tintuc/add.php";
            addTinTuc($id,$TieuDe,$NgayDang,$HinhAnh, $NoiDung);
            header("Location: $base_url/tintucAdmin");    
        break; 

                
        case 'searchtintuc':  
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $search = trim($_POST["search"] ?? ""); // Nhận từ khóa tìm kiếm  
                    
                if ($search != "") {  
                           
                    $tintuc = searchTinTuc($search);
                    if ($product) {  
                                
                        include "admin/tintuc/search.php";
                                
                        } else {  
                            $errors[] = "Không có kết quả nào được tìm thấy.";  
                                
                        }  
                        
                    }  
                }  
            break; 
        case "deletetintuc":
            $id=$_GET["id"]??"";
            deleteTinTuc($id);
            header("Location: $base_url");
            break;
        case 'tonghoptt':  
            include_once "views/header.php";
            include_once "views/tonghoptt.php"; 
            include_once "views/footer.php";
            break;
        case 'tintuc': 
            $id = $_GET["id"] ?? "";  
            $tintuc = getTinTucid($id);
            include_once "views/header.php";
            include "views/tintuc.php"; 
            $binhluan= getComment($id);
            include_once "views/footer.php";

            break;  
        
                        
}