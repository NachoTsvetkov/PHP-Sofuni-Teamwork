<?php
include_once "classes/album.php";
include_once "classes/category.php";
include_once "classes/image.php";
include_once "classes/user.php";
include_once "classes/dbconnection.php";

$_SESSION['isDev'] = true;

$db = new DbConnection($_SESSION['isDev']);

$user = new User();
$image = new Image();

//echo $user -> check_user('neshto@gmail.com', $db);
//echo $user -> add_user('Nacho', '123', 'nacho.tsvetkov@gmail.com', null, $db);
//var_dump($user -> get_user('nacho.tsvetkov@gmail.com', '123', $db));

//FETCH USER RESULTS
//$user_result = $user -> get_user('Rumen', 'qkolud', $db);
//var_dump($user_result);
// $user_list_result = $user -> get_user_list($db);

//FETCH IMAGE RESULTS
// $image_result = $image -> get_image(1, $db);

//IMAGE TAG CREATION;
// echo '<img src="data:image/png/jpg/jpeg/gif;base64,'.base64_encode($image_result[0]).'" alt="photo" width="500px"><br>';

?>