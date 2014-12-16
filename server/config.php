<?php
//Include DAL classes;

require_once "classes/album.php"; 
require_once "classes/category.php"; 
require_once "classes/image.php";
require_once "classes/user.php";
require_once "classes/dbconnection.php";

// $host = "173.194.224.99:3306";
$host = "/cloudsql/php-teamwork-softuni:storage";

$user = "root";
$password = "";
$database = "photos_db";
$table = "users";

$db = new DbConnection($host, $user, $password, $database);
