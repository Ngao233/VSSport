<?php  
session_start();   
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!isset($_SESSION['id_KhachHang'])) {
    exit();
} 

$id_KhachHang = $_SESSION['id_KhachHang']; // Lấy id khách hàng từ session

try {
    // Truy vấn id của khách hàng
    $sql = "SELECT * FROM khachhang WHERE id_KhachHang = :id_KhachHang";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_KhachHang', $id_KhachHang, PDO::PARAM_INT);
    $stmt->execute();
    $khach = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$khach) {
        exit('Không tìm thấy khách hàng.');
    }
} catch (PDOException $e) {
    exit('Lỗi kết nối: ' . $e->getMessage());
}
?> 

    <link rel="stylesheet" href="public/css/diachi.css">
<div class="khung">
    <div class="background-image"></div>
    <div class="left-box">
        <div class="profile-container">
            <div class="avatar">
                <i class="fas fa-camera"></i>
            </div>
            <div class="user-info">
                <div class="user-name"><?= htmlspecialchars($khach['Ho'] . ' ' . $khach['Ten']) ?></div>
                <button class="edit-profile"><i class="fas fa-pen"></i>Sửa hồ sơ</button>
            </div>
        </div>
        <div class="profile-list">
            <ul>
              <li class="fa fa-user"></li><a href="hoso">Tài khoảng của tôi</a><br>

              <a href="hoso" class="little">Hồ sơ</a><br>

              <a href="diachi" class="little">Địa chỉ</a><br>

              <a href="doimatkhau" class="little">Đổi mật khẩu</a><br>

              <li class="fa fa-book"></li><a href="#">Lịch sử mua</a><br>

              <li class="fa fa-heart"></li><a href="#">Sản phẩm yêu thích</a><br>

              <a href="#">Đăng xuất</a><br>
            </ul>
        </div>
    </div>
    <div class="right-box">
      <h2>Hồ sơ của tôi</h2>
      <form method="POST" action="save_address">
        <div class="css_select_div">
        <select class="css_select" id="tinh" name="tinh" title="Chọn Tỉnh Thành">
            <option value="0">Tỉnh Thành</option>
        </select> 
        <select class="css_select" id="quan" name="quan" title="Chọn Quận Huyện">
            <option value="0">Quận Huyện</option>
        </select> 
        <select class="css_select" id="phuong" name="phuong" title="Chọn Phường Xã">
            <option value="0">Phường Xã</option>
        </select>
        </div>
          <label>Chi tiết:</label>
          <input type="text" name="address" id="address" placeholder="Nhập địa chỉ chi tiết" required>
          <br>
          <input type="hidden" id="tinh_name" name="tinh_name">
          <input type="hidden" id="quan_name" name="quan_name">
          <input type="hidden" id="phuong_name" name="phuong_name">
          <button type="submit"><i class="fas fa-sign-in-alt"></i> Cập nhật</button>
      </form>
  </div>
  
      </div>
    </div>

    <script src="https://esgoo.net/scripts/jquery.js"></script>
<style type="text/css">
    .css_select_div{ text-align: center;}
    .css_select{ display: inline-table; width: 25%; padding: 5px; margin: 5px 2%; border: solid 1px #686868; border-radius: 5px;}
</style>
<script>
    $(document).ready(function() {
        //Lấy tỉnh thành
        $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm',function(data_tinh){	       
            if(data_tinh.error==0){
               $.each(data_tinh.data, function (key_tinh,val_tinh) {
                  $("#tinh").append('<option value="'+val_tinh.id+'">'+val_tinh.full_name+'</option>');
               });
               $("#tinh").change(function(e) {
                    var idtinh = $(this).val();
                    var selected_tinh_name = $("#tinh option:selected").text();
                    $("#tinh_name").val(selected_tinh_name); // Lưu tên tỉnh vào trường ẩn
                    // Tiếp tục với việc lấy dữ liệu quận huyện và phường xã
                });
               $("#tinh").change(function(e){
                    var idtinh=$(this).val();
                    //Lấy quận huyện
                    $.getJSON('https://esgoo.net/api-tinhthanh/2/'+idtinh+'.htm',function(data_quan){	       
                        if(data_quan.error==0){
                           $("#quan").html('<option value="0">Quận Huyện</option>');  
                           $("#phuong").html('<option value="0">Phường Xã</option>');   
                           $.each(data_quan.data, function (key_quan,val_quan) {
                              $("#quan").append('<option value="'+val_quan.id+'">'+val_quan.full_name+'</option>');
                           });
                           $("#quan").change(function(e) {
                                var idquan = $(this).val();
                                var selected_quan_name = $("#quan option:selected").text();
                                $("#quan_name").val(selected_quan_name); // Lưu tên tỉnh vào trường ẩn
                                // Tiếp tục với việc lấy dữ liệu quận huyện và phường xã
                            });
                           //Lấy phường xã  
                           $("#quan").change(function(e){
                                var idquan=$(this).val();
                                $.getJSON('https://esgoo.net/api-tinhthanh/3/'+idquan+'.htm',function(data_phuong){	       
                                    if(data_phuong.error==0){
                                       $("#phuong").html('<option value="0">Phường Xã</option>');   
                                       $.each(data_phuong.data, function (key_phuong,val_phuong) {
                                          $("#phuong").append('<option value="'+val_phuong.id+'">'+val_phuong.full_name+'</option>');
                                       });
                                       $("#phuong").change(function(e) {
                                            var idphuong = $(this).val();
                                            var selected_phuong_name = $("#phuong option:selected").text();
                                            $("#phuong_name").val(selected_phuong_name); // Lưu tên tỉnh vào trường ẩn
                                            // Tiếp tục với việc lấy dữ liệu quận huyện và phường xã
                                        });
                                    }
                                });
                           });
                            
                        }
                    });
               });   
                
            }
        });
     });	    
 </script>
    
    


