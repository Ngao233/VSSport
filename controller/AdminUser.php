<?php 
//include_once "models/Category.php";
include_once "model/user.php";
// include_once "models/contact.php";
switch ($action) {
                case 'usersAdmin':
                        $user = getUser();
                        include "admin/HeaderAdmin.php";
                        include "admin/user/homeUser.php";
                        include "admin/FooterAdmin.php";
                        break;
}