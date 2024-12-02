
<?php  
include 'views/header.php';  
// Gọi hàm xử lý đăng ký  
?>  
<div class="khung">
      <div class="background-image"></div>
      <div class="left-box">
        <div class="profile-container">
          <div class="avatar">
            <i class="fas fa-camera"></i>
          </div>
          <div class="user-info">
            <div class="user-name">Cao Tuấn Vỹ</div>
            <button class="edit-profile"><i class="fas fa-pen"></i>Sửa hồ sơ</button>
          </div>
        </div>
        <div class="profile-list">
            <li class="fa fa-user"></li><a href="#">Tài khoảng của tôi</a><br>
            <a href="#" class="little">Hồ sơ</a><br>
            <a href="#" class="little">Địa chỉ</a><br>
            <a href="#" class="little">Đổi mật khẩu</a><br>
            <li class="fa fa-book"></li><a href="#">Lịch sử mua</a><br>
            <li class="fa fa-heart"></li><a href="#">Sản phẩm yêu thích</a><br>
            <a href="#">Đăng xuất</a><br>

          </ul>
        </div>
      </div>
      <div class="right-box">
        <div class="leftin-box">
          <h2>Hồ sơ của tôi</h2>
          <div class="little-input">
            <h3>Tên đăng nhập</h3><input type="text" id="username" placeholder="Nhập tên tài khoảng">
          </div>
          <div class="little-input">
            <h3>Mật khẩu </h3><input type="password" id="password" placeholder="Nhập mật khẩu">
          </div>
          <div class="little-input">
            <h3>Email </h3><input type="password" id="repassword" placeholder="Nhập lại mật khẩu">
          </div>
          <div class="little-input">
            <h3>Số điện thoại</h3><input type="text" id="age" placeholder="Nhập số điện thoại">
          </div>
          <div class="little-input">
            <h3>Giới tính</h3><input type="text" id="age" placeholder="Nhập ">
          </div>
          <div class="little-input">
            <h3>Ngày sinh</h3><input type="text" id="age" placeholder="Nhập tuổi">
          </div>
          <br>
          <button onclick="editProfile()"><i class="fas fa-sign-in-alt"></i> Đăng ký</button>

        </div>
        <div class="rightin-box">
          <div class="image-profile">
            <i class="fas fa-camera"></i>
          </div>
          <div class="fixbutton">
            <br>
            <button class="edit-profile"><i class="fas fa-pen"></i>Sửa ảnh</button>
            

          </div>
        </div>
  
      </div>
    </div>
    <?php  
include 'views/footer.php';  
// Gọi hàm xử lý đăng ký  
?>  