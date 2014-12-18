<?php  

require '../server/config.php';
require 'header.php';
require 'aside.php';

$db = new DbConnection($_SESSION['isDev']);
$user = new User();
$result = $user -> get_user_row($_SESSION['user_id'], $db);

require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
use google\appengine\api\cloud_storage\CloudStorageTools;

$options = ['gs_bucket_name' => 'php-teamwork-softuni'];

$upload_url = CloudStorageTools::createUploadUrl('/user', $options);

var_dump($upload_url);
?>
<main>

        <form onload="setStatic()" id="static" action="">

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

       <form action="<?php echo $upload_url?>" enctype="multipart/form-data"  method="post" id="imgUpload">

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

        setStatic();
    </script>

<?php

if (isset($_POST['submit'])) {
    if ($_POST['user_name'] == null) {
        $user_name = mysqli_real_escape_string($db -> connection, $result['user_name']);
    }else{
        $user_name = mysqli_real_escape_string($db -> connection, $_POST['user_name']);
    }

    if ($_POST['user_email'] == null) {
        $user_email = mysqli_real_escape_string($db -> connection, $result['user_email']);
    }else{
        $user_email = mysqli_real_escape_string($db -> connection, $_POST['user_email']);
    }

    if ($_FILES['user_new_image'] != null) {
        $image_data = mysql_escape_string(file_get_contents($_FILES['user_new_image']['tmp_name']));
    }else{
        $image_data = $result['image_data'];
    }

    $user -> edit_user($user_name, $image_data, $user_email, $db);
    var_dump($result);
}


 require 'footer.php';
?>