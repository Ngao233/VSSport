<?php 

include_once "model/user.php";
include_once "model/login.php";


switch ($action) {
                case 'usersAdmin':
                        $user = getUser();
                        include "admin/HeaderAdmin.php";
                        include "admin/user/homeUser.php";
                        include "admin/FooterAdmin.php";
                        break;
                case 'hoso':
                        $user = getUser();
                        include_once "views/hoso.php";
                        
                        break;
                case 'update_profile':
                        $user = getUser();
                        include_once "model/update_profile.php";
                        break;
                case 'doimatkhau':
                        $user = getUser();
                        include_once "views/header.php";
                        include_once "views/doimatkhau.php";
                        include_once "views/footer.php";

                        break;
                case 'update_password':
                        $user = getUser();
                        include_once "model/update_password.php";
                        break;
                case 'diachi':
                        $user = getUser();
                        include_once "views/header.php";

                        include_once "views/diachi.php";
                        include_once "views/footer.php";
                        break;
                case 'save_address':
                        $user = getUser();
                        include_once "model/save_address.php";
                        break;  

}