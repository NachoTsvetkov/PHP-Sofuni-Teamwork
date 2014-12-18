<?php  

require '../server/config.php';
require 'header.php';
require 'aside.php';

require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;

$options = [ 'gs_bucket_name' => 'php-teamwork-softuni' ];
$upload_url = CloudStorageTools::createUploadUrl('/upload_handler', $options);
var_dump($upload_url);

?>

<form action="<?php echo $upload_url?>" enctype="multipart/form-data" method="post">
    Files to upload: <br>
   <input type="file" name="uploaded_files" size="40">
   <input type="submit" value="Send">
</form>

<?php

require 'footer.php';

?>

