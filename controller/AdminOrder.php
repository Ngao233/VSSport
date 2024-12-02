<?php 
//include_once "models/Category.php";
include_once "model/order.php";

// include_once "models/contact.php";
switch ($action) {
    case '':
        $order = getOrder();
        include "admin/HeaderAdmin.php";
        include "admin/order/Homeorder.php";
        include "admin/FooterAdmin.php";
        break;
    case 'editorder':
            $id = $_GET["id"] ?? "";  
            $order = getorderid($id);
            include "admin/order/edit.php";
            break;
    
            case "updateorder":
                $NgayDatHang=trim($_POST["NgayDatHang"])??"";
                
                 $TrangThai=trim($_POST["TrangThai"]) ?? "";

                $id=$_GET["id"]??"";
                $order = getorderid($id);
                include "admin/order/edit.php";
                updateorder($id,$NgayDatHang,$TrangThai);
                    header("Location: $base_url/orderAdmin");
     
                break; 
                case "deleteorder":
                    $id=$_GET["id"]??"";
                    deleteorder($id);
                    header("Location: $base_url/orderAdmin");
                    break;
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                    if (isset($_POST['approve'])) {  
                        $orderId = $_POST['order_id'];  
                        updateOrderStatus($orderId, 'approved'); // Đánh dấu đơn hàng là đã duyệt  
                        header("Location: ../admin/Homeorder.php");  
                        exit;  
                    }  
                
                    if (isset($_POST['delete'])) {  
                        $orderId = $_POST['order_id'];  
                        $currentStatus = getOrderStatusById($orderId);  
                        if ($currentStatus === 'pending') {  
                            deleteOrder($orderId); // Chỉ xóa nếu trạng thái là 'pending'  
                            header("Location: ../admin/Homeorder.php");  
                            exit;  
                        } else {  
                            echo "Không thể xóa đơn hàng đã được duyệt.";  
                        }  
                    }  
                }
                ?>