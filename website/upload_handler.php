<?php
require '../server/config.php';

if (session_status() == PHP_SESSION_NONE) {
    @session_start();
}

//var_dump($_SESSION['isDev']);
$db = new DbConnection($_SESSION['isDev']);

$image = new Image();
$image_data = mysql_escape_string(file_get_contents($_FILES['image_data']['tmp_name']));

$image_title = $_POST['image_title'];
$user_id = $_SESSION['user_id'];
$image_format = $_FILES['image_data']['type'];

//var_dump($user_id);

$result = $image -> add_image($image_data, $image_title, $user_id, $image_format, $db);

//var_dump($result);

session_write_close();

echo "
	<script type='text/javascript'>
		window.location = '/add_img';
	</script>
	";

?>