<?php

$db = new DbConnection($_SESSION['isDev']);
$image = new Image();
$imageTags = $image -> get_random_image_tags(10, $db);

foreach ($imageTags as $image) {
    $img = $image[0];
    $link = $image[1];
    echo "<article>
            <a href='$link' data-lightbox='image-1' data-title='dadattata'>$img</a>
        </article>";
}
?>