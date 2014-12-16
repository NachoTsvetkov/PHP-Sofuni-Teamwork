<?php
//Include DAL classes;

include_once "classes/album.php"; 
include_once "classes/category.php"; 
include_once "classes/image.php";
include_once "classes/user.php";
include_once "classes/dbconnection.php";

//$host = "173.194.224.99:3306";
$host = "/cloudsql/php-teamwork-softuni:storage";

$user = "root";
$password = "softuni";
$database = "photos_db";
$table = "users";

$db = new DbConnection($host, $user, $password, $database);