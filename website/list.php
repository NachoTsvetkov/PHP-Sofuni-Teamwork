<?php

$db = new DbConnection($_SESSION['isDev']);
$image = new Image();
$imageTags = $image -> get_random_image_tags(10, $db);

foreach ($imageTags as $image) {
    echo $image;
}
?>