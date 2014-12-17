<?php

$db = new DbConnection($_SESSION['isDev']);
$image = new Image();
$imageTags = $image -> get_random_image_tags(10, $db);

foreach ($imageTags as $image) {
    echo "<article>
            <a href=\"img/$image\" data-lightbox=\"image-1\" data-title=\"dadattata\"><img src=\"img/picture.jpg\" class='pictures'></a>
        </article>";
}
?>