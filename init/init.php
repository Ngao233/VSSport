<?php
include "config.php";

$base_url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
$action = $_GET['action']??"";
include "controller/controlles.php";