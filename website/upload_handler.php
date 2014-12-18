<?php
require '../server/config.php';

if (session_status() == PHP_SESSION_NONE) {
    @session_start();
}

$db = new DbConnection($_SESSION['isDev']);
$image = new Image();
$image_data = file_get_contents($_FILES['image_data']['tmp_name']);
$image_title = $_POST['image_title'];
$user_id = $_SESSION['user_id'];
$image_format = $_FILES['image_data']['type'];

var_dump($_POST);
var_dump($_FILES);

$image -> add_image($image_data, $image_title, $user_id, $image_format, $db);

session_write_close();

// echo '<img src="data:image/png/jpg/jpeg/gif;base64,'. base64_encode($image) .'" alt="photo" width="500px"><br>';

?>