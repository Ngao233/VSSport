<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="views/assets/styles/styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
    }

    /* Main Menu */
    .main-menu {
        display: flex;
        justify-content: space-around;
        align-items: center;
        border-bottom: 2px solid #ddd;
        position: relative;
    }

    .main-menu a {
        text-decoration: none;
        color: #333;
        font-size: 14px;
        padding: 10px 20px;
        position: relative;
    }

    .main-menu a:hover {
        color: #007BFF;
    }

    /* Hover Submenu */
    .submenu {
        display: none;
        /* Initially hidden */
        position: absolute;
        top: 40px;
        left: 0;
        width: 100%;
        padding: 20px 50px;
        background-color: #ffffff;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border-top: 1px solid #ddd;
    }

    .submenu-column {
        width: 150px;
        display: inline-block;
        vertical-align: top;
    }

    .submenu-column h3 {
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .submenu-column ul {
        list-style-type: none;
    }

    .submenu-column li {
        margin-bottom: 5px;
        font-size: 13px;
        color: #333;
        margin-left: -30px;
    }

    .submenu-column li:hover {
        color: #007BFF;
        cursor: pointer;
    }

    /* Show submenu on hover */
    .main-menu-item:hover .submenu {
        display: flex;
        justify-content: space-between;
        z-index: 1000;
    }



    .main-menu {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 95px;
        justify-content: flex-start;
        padding-left: 195px;
    }

    .main-menu a {
        text-decoration: none;
        color: #333;
        font-weight: 500;
        line-height: 35px;

        padding: 5px 10px;
    }

    .main-menu>a:first-child {
        margin-top: 0;
    }

    /* For submenu styling */
    .submenu {
        display: none;
        position: absolute;
        background-color: white;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        padding: 10px;
        z-index: 100;
        padding-left: 40px;
    }

    .main-menu-item:hover .submenu {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .submenu-column {
        min-width: 100px;
        margin-right: 20px;
    }
    </style>
</head>

<body>
    <!-- Top Header -->
    <div class="container-fluid bg-white top-header">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="index.php">DỰ ÁN 1</a>
            <div class="d-flex align-items-center">
                <!-- Search Input + Icon -->
                <div class="search-input-wrapper me-3">
                    <input type="text" class="form-control search-input rounded-pill" placeholder="Search...">
                    <i class="fas fa-search search-icon"></i>
                </div>
                <div class="top-icons d-flex">
                    <?php if(isset($_SESSION['user'])){
                        echo '<a href="index.php?pages=profile" title="User">'.$_SESSION['user']['email'].'</i></a>';
                        echo '<a href="index.php?pages=logout" title="Logout"><i class="fa-solid fa-sign-out-alt"></i></a>';
                    }else{
                        echo '<a href="index.php?pages=login" title="User"><i class="fa-regular fa-user"></i></a>';
                    } ?>
                    <a href="#" title="Wishlist"><i class="fa-regular fa-heart"></i></a>
                    <a href="#" title="Cart"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Divider Line -->
    <div class="container-fluid divider main-menu"></div>

    <!-- Main Menu -->
    <div class="main-menu">
        <a href="index.php?pages=products">Tất cả sản phẩm</a>
        <div class="main-menu-item">
            <a href="#">Danh mục ▼</a>
            <div class="submenu">
                <div style="max-width: 100px" class="submenu-column">
                    <h3>NHẪN</h3>
                    <img style="width: 100%;" src="/DUAN1/views/assets/img/catalog/anh.png" alt="">
                </div>

                <!-- <div class="submenu-column">
                    <h3>VÒNG TAY</h3>
                    <ul>
                        <li>Vòng mềm</li>
                        <li>Vòng dây da</li>
                        <li>Vòng kẽm</li>
                        <li>Vòng kiểu đặc biệt</li>
                        <li>Vòng kiểu đặc biệt</li>
                    </ul>
                </div>
                <div class="submenu-column">
                    <h3>NHẪN</h3>
                    <ul>
                        <li>Bạc</li>
                        <li>Mạ Vàng 14K</li>
                        <li>Mạ Vàng Hồng 14K</li>
                        <li>Hướng dẫn chọn size</li>
                    </ul>
                </div>
                <div class="submenu-column">
                    <h3>HOA TAI</h3>
                    <ul>
                        <li>Kiểu tròn</li>
                        <li>Kiểu rơi</li>
                        <li>Ngọc trai</li>
                        <li>Chui dây</li>
                    </ul>
                </div>
                <div class="submenu-column">
                    <h3>DÂY CHUYỀN</h3>
                    <ul>
                        <li>Bạc</li>
                        <li>Mạ Vàng 14K</li>
                        <li>Mạ Vàng Hồng 14K</li>
                        <li>Hướng dẫn chọn size</li>
                    </ul>
                </div>
                <div class="submenu-column">
                    <h3>COLLABORATIONS</h3>
                    <ul>
                        <li>Stranger Things</li>
                        <li>Disney</li>
                        <li>Marvel</li>
                        <li>Game Of Thrones</li>
                        <li>UNICEF</li>
                    </ul>
                </div> -->
                <!-- <div class="submenu-column">
                    <h3>PHỤ KIỆN</h3>
                    <ul>
                        <li>Móc khóa</li>
                    </ul>
                </div>
                <div class="submenu-column">
                    <h3>BỘ QUÀ MÙA LỄ HỘI</h3>
                </div> -->
            </div>
        </div>
        <div class="main-menu-item">
            <a href="#">Trang sức ▼</a>
            <div class="submenu">
                <div class="submenu-column">
                    <h3>CHARMS</h3>
                    <ul>
                        <li>Charm chọn</li>
                        <li>Charm chọn</li>
                        <li>Charm chọn</li>
                        <li>Charm chọn</li>
                    </ul>
                </div>
                <div class="submenu-column">
                    <h3>VÒNG TAY</h3>
                    <ul>
                        <li>Vòng mềm</li>
                        <li>Vòng dây da</li>
                        <li>Vòng kẽm</li>
                        <li>Vòng kiểu đặc biệt</li>
                        <li>Vòng kiểu đặc biệt</li>
                    </ul>
                </div>
                <div class="submenu-column">
                    <h3>NHẪN</h3>
                    <ul>
                        <li>Bạc</li>
                        <li>Mạ Vàng 14K</li>
                        <li>Mạ Vàng Hồng 14K</li>
                        <li>Hướng dẫn chọn size</li>
                    </ul>
                </div>
                <div class="submenu-column">
                    <h3>HOA TAI</h3>
                    <ul>
                        <li>Kiểu tròn</li>
                        <li>Kiểu rơi</li>
                        <li>Ngọc trai</li>
                        <li>Chui dây</li>
                    </ul>
                </div>
                <div class="submenu-column">
                    <h3>DÂY CHUYỀN</h3>
                    <ul>
                        <li>Bạc</li>
                        <li>Mạ Vàng 14K</li>
                        <li>Mạ Vàng Hồng 14K</li>
                        <li>Hướng dẫn chọn size</li>
                    </ul>
                </div>
                <div class="submenu-column">
                    <h3>COLLABORATIONS</h3>
                    <ul>
                        <li>Stranger Things</li>
                        <li>Disney</li>
                        <li>Marvel</li>
                        <li>Game Of Thrones</li>
                        <li>UNICEF</li>
                    </ul>
                </div>
                <div class="submenu-column">
                    <h3>PHỤ KIỆN</h3>
                    <ul>
                        <li>Móc khóa</li>
                    </ul>
                </div>
            </div>
        </div>
        <a href="#">Khuyến mãi 50%</a>
        <a href="#">Sản phẩm bán chạy</a>
        <a href="#">Blogs</a>
    </div>