<?php
//Include DAL classes;

include_once "classes/album.php"; 
include_once "classes/category.php"; 
include_once "classes/image.php";
include_once "classes/user.php";
include_once "classes/dbconnection.php";

$db = new DbConnection();

$sql = "SELECT * FROM users;";

$result = mysqli_query($db->connection, $sql);