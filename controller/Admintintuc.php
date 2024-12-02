<?php 
//include_once "models/Category.php";
include_once "model/tintuc.php";

// include_once "models/contact.php";
switch ($action) {
    case 'tintucAdmin':
        $oder = getTinTuc();
        include "admin/HeaderAdmin.php";
        include "admin/tintuc/HomeTinTuc.php";
        include "admin/FooterAdmin.php";
        break;
    case 'edittintuc':
            $id = $_GET["id"] ?? "";  
            $tintuc = getTinTucid($id);
            $tintuc = getTinTuc();
            include "admin/tintuc/edit.php";
            break;
        
            case "updatetintuc":
                $id = $_GET["id"] ?? "";
                $tintuc = getTinTucid($id); 

                $TieuDe=trim($_POST["TieuDe"])??"";
                
                $NgayDang=trim($_POST["NgayDang"]) ?? "";

                $HinhAnh = trim($_POST["HinhAnh"] ?? "");

                $NoiDung = trim($_POST["Noidung"] ?? "");  

                $id=$_GET["id"]??"";
                $tintuc = getTinTucid($id);
                include "admin/tintuc/edit.php";
                updateTinTuc($id,$TieuDe,$NgayDang,$HinhAnh,$NoiDung);
                    header("Location: $base_url/tintucAdmin");
     
                break; 
                case "deleteoder":
                    $id=$_GET["id"]??"";
                    deleteTinTuc($id);
                    header("Location: $base_url/oderAdmin");
                    break;
                }