<?php
require '../server/config.php';

$db = new DbConnection($_SESSION['isDev']);
$image = new Image();
$result = $image -> get_image_comments ($_POST['id'], $db);

header('Content-Type: application/json');
echo json_encode($result);
?>
