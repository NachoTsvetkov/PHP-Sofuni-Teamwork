<?php


var_dump($_FILES);

$image = file_get_contents($_FILES['uploaded_files']['tmp_name']);

echo '<img src="data:image/png/jpg/jpeg/gif;base64,'. base64_encode($image) .'" alt="photo" width="500px"><br>';

?>