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
<main>
<form action="<?php echo $upload_url?>" enctype="multipart/form-data"  method="post" id="imgUpload">
   <label for="impFile">Image to upload<input type="file" id="impFile" name="image_data" size="40"></label><br />
   <label for="txtImgTitle">Image Title<br/><input type="text" id="txtImgTitle" name="image_title" size="40"></label><br />
   <input type="submit" value="Upload" id="submitUpload" class="btn btn-primary">
</form>
</main>

<?php

require 'footer.php';

?>