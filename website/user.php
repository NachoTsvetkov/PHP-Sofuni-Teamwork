<?php  

if (session_status() == PHP_SESSION_NONE) {
    @session_start();
}

require '../server/config.php';
require 'header.php';
require 'aside.php';

$db = new DbConnection($_SESSION['isDev']);
$user = new User();

$result = $user -> get_user_row($_SESSION['user_id'], $db);

require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;

$options = ['gs_bucket_name' => 'php-teamwork-softuni'];

$upload_url = CloudStorageTools::createUploadUrl('/upload_handler_user', $options);

?>
<main>

        <form id="static" action="">

            <figure id="profilePicStatic">
                <a href="#"><?php echo $result['user_image_tag'][0]; ?></a>
            </figure>
            <div id="profileInfoStatic">
            <label for="">Email:</label>
            <label><?php echo $_SESSION['user_email']; ?></label>

            <label for="">Name:</label>
            <label><?php echo $_SESSION['user_name']; ?></label>

            <a href="#" class="btn btn-primary btn-xs" id="editButton" onclick="setEditable()">Edit profile</a>
            </div>
             </form>

       <form id="editable" action="<?php echo $upload_url?>" enctype="multipart/form-data"  method="post" >

            <figure id="profilePicEditable">
                <a href="#"><?php echo $result['user_image_tag'][0]; ?></a>
            </figure>
            <div id="profileInfoEditable">
            <label for="">Email:</label>
            <input type="text" name="user_email" value="<?php echo $_SESSION['user_email']; ?>" />

            <label for="">Name:</label>
            <input type="text" name="user_name" value="<?php echo $_SESSION['user_name']; ?>" />

            <label for="profilePic">Upload new profile picture</label>
            <input id="profilePic" name="user_new_image" type="file" />

             <a href="#" class="btn btn-primary btn-xs" id="editButton" onclick="setStatic()">Cancel</a>
            <input type="submit" name="submit"/>
             </div>

        </form>

    <div id="albums">

    </div>

</main>

    <script>
        var st, ed;

        st = document.getElementById('static');
        ed = document.getElementById('editable');

        function setEditable() {
            ed.style.display = "inline-block";
            st.style.display = "none";
        }

        function setStatic() {
            ed.style.display = "none";
            st.style.display = "inline-block";
        }
        console.log(ed);
        console.log(st);

        setStatic();
    </script>

<?php

 require 'footer.php';
?>