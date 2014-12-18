<?php  
if (session_status() == PHP_SESSION_NONE) {
    @session_start();
}

require '../server/config.php';
require 'header.php';
require 'aside.php';

require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;

$options = ['gs_bucket_name' => 'php-teamwork-softuni'];

$upload_url = CloudStorageTools::createUploadUrl('/upload_handler', $options);

?>

<form action="<?php echo $upload_url?>" enctype="multipart/form-data" method="post">
   <label for="impFile">Image to upload:</label><input type="file" id="impFile" name="image_data" size="40"><br />
   <label for="txtImgTitle">Image Title:</label><input type="text" id="txtImgTitle" name="image_title" size="40"><br />
   <input type="submit" value="Send">
</form>

<?php

require 'footer.php';

?>