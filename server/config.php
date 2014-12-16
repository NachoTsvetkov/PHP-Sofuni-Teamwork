<?php
include_once "classes/album.php";
include_once "classes/category.php";
include_once "classes/image.php";
include_once "classes/user.php";
include_once "classes/dbconnection.php";

$isDevServer = true;

$db = new DbConnection($isDevServer);

$user = new User();
$user_result = $user -> get_user('Rumen', 'qkolud', $db);
$user_list_result = $user -> get_user_list($db);
