<?php
require '../server/config.php';

// if (session_status() == PHP_SESSION_NONE) {
//     @session_start();
// }

$db = new DbConnection($_SESSION['isDev']);

$user = new User();
$image_data = mysql_escape_string(file_get_contents($_FILES['user_new_image']['tmp_name']));

$result = $user ->get_user_row($_SESSION['user_id'], $db);

$user_name;
$user_email;
$image_data;

    if ($_POST['user_name'] == null) {
        $user_name = mysqli_real_escape_string($db -> connection, $result['user_name']);
    }else{
        $user_name = mysqli_real_escape_string($db -> connection, $_POST['user_name']);
    }

    if ($_POST['user_email'] == null) {
        $user_email = mysqli_real_escape_string($db -> connection, $result['user_email']);
    }else{
        $user_email = mysqli_real_escape_string($db -> connection, $_POST['user_email']);
    }

    if ($_FILES['user_new_image'] != null) {
        $image_data = mysql_escape_string(file_get_contents($_FILES['user_new_image']['tmp_name']));
    }else{
        $image_data = $result['image_data'];
    }

$result = $user -> edit_user($_SESSION['user_id'], $user_name, $image_data, $user_email, $db);
var_dump($result);

// session_write_close();

// echo "
// 	<script type='text/javascript'>
// 		window.location = '/user';
// 	</script>
// 	";

?>