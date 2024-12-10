<?php 

include_once "model/oder.php";


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
            if (isset($_GET['id'])) {
                $orderId = intval($_GET['id']); 
            

                $sql = "UPDATE donhang SET TrangThai = 'Đã xử lý' WHERE id_DonHang = :orderId";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
            
                if ($stmt->execute()) {

                    header("Location: {$base_url}/oderAdmin");
                    exit();
                } else {
                    echo "Có lỗi xảy ra khi cập nhật trạng thái đơn hàng.";
                }
            }

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
            case 'addoder':
                include "admin/HeaderAdmin.php";
                include "admin/oder/add.php";
            break;
        case 'searchoder':  
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $search = trim($_POST["search"] ?? ""); 
            
                if ($search != "") {  
                    
                    $oder = searchOder($search);
                    if ($oder) {  
                        
                        include "admin/product/search.php";
                        
                    } else {  
                        $errors[] = "Không có kết quả nào được tìm thấy.";  
                        
                    }  
                
                }  
            }  
       
            
    case 'statistics':

        include "admin/HeaderAdmin.php";
        include "admin/statistics.php";

        include "admin/FooterAdmin.php";
        break;
}