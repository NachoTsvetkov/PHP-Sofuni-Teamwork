<?php

$db = new DbConnection($_SESSION['isDev']);
$image = new Image();
$imageTags = $image -> get_random_image_tags(10, $db);

foreach ($imageTags as $image) {
    echo "<article>
            <a href='image' data-lightbox='image-1' data-title='dadattata'>$image</a>
        </article>";
}
?>