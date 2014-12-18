<?php
require '../server/config.php';

if (session_status() == PHP_SESSION_NONE) {
    @session_start();
}

$db = new DbConnection($_SESSION['isDev']);
$image = new Image();
$result = $image -> comment ($_POST['id'], $_SESSION['user_id'], $_POST['content'], $db);

session_write_close();

header('Content-Type: application/json');
echo json_encode($result);
?>
