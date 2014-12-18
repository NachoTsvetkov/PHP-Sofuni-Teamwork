<?php  

require '../server/config.php';
require 'header.php';
require 'aside.php';

require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;

$options = [ 'gs_bucket_name' => 'my_bucket' ];
$upload_url = CloudStorageTools::createUploadUrl('/upload_handler.php', $options);

?>

<main>
     <form action="add_img" method="POST" enctype="multipart/form-data">
     	File:
    	<input type="file" name="image"/>
        <input type="submit" value="Upload"/>
    </form>
 </main>

<?php

var_dump($_POST['image']);

require 'footer.php';
?>

