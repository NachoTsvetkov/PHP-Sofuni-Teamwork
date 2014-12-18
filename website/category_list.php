<?php
require '../server/config.php';
require 'header.php';
require 'aside.php';


echo "<main><section class='grid'>";

$db = new DbConnection($_SESSION['isDev']);
$image = new Image();
$imageTags = $category -> get_category_image_tags($_SERVER['QUERY_STRING'], $db);
foreach ($imageTags as $image) {
    $img = $image[0];
    $link = $image[1];
    $download = $image[2];
    $title = $image[3];
    echo "<article>
            <a href='$link' data-lightbox='image-1' data-title='$title' download='$download'>$img</a>
        </article>";
}

echo "</section></main>";

require 'footer.php';
?>