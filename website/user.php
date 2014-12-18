<?php  

require 'header.php';
require 'aside.php';

$db = new DbConnection($_SESSION['isDev']);
$user = new User();
$result = $user -> get_user_row($_SESSION['user_id'], $db);
var_dump($result);

?>
<main>
    <script>

    var static = document.getElementById('static');
    var editable = document.getElementById('editable');

    function setEditable(){
        editable.style.display="inline-block";
        static.style.display="none";
    }

    function setStatic(){
        editable.style.display="none";
        static.style.display="inline-block";
    }


    </script>

        <form onload="setStatic()" id="static" action="">

            <figure id="profilePic">
                <a href="#"><?php echo $result['user_image_tag'][0]; ?></a>
            </figure>

            <label for="">Email:</label>
            <label><?php echo $_SESSION['user_email']; ?></label>

            <label for="">Name:</label>
            <label><?php echo $_SESSION['user_name']; ?></label>

            <a href="#" class="btn btn-primary btn-xs" id="editButton" onclick="setEditable()">Edit profile</a>
        </form>

        <form id="editable" method="POST" action="<?php echo $_SERVER[PHP_SELF]; ?>">

            <figure id="profilePic">
                <a href="#"><?php echo $result['user_image_tag'][0]; ?></a>
            </figure>

            <label for="">Email:</label>
            <input type="text" value="<?php echo $_SESSION['user_email']; ?>" />

            <label for="">Name:</label>
            <input type="text" value="<?php echo $_SESSION['user_name']; ?>" />

            <label for="profilePic">Upload new profile picture</label>
            <input id="profilePic" type="file" />

            <a href="#" class="btn btn-primary btn-xs" id="editButton" onclick="setStatic()">Cancel</a>
            <input type="submit" />
        </form>

    <div id="albums">

    </div>

</main>

<?php

var_dump($_POST);

 require 'footer.php';
?>