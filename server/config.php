<?php
include_once "classes/album.php";
include_once "classes/category.php";
include_once "classes/image.php";
include_once "classes/user.php";
include_once "classes/dbconnection.php";

if (session_status() == PHP_SESSION_NONE) {
    @session_start();
}

$_SESSION['isDev'] = false;
session_write_close();

?>