<?php 
//include_once "models/Category.php";
include_once "model/oder.php";

// include_once "models/contact.php";
switch ($action) {
    case 'oderAdmin':
        $oder = getOder();
        include "admin/HeaderAdmin.php";
        include "admin/oder/HomeOder.php";
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