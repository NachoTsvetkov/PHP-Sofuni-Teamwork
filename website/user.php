<?php  

require 'header.php';
require 'aside.php';

$db = new DbConnection($_SESSION['isDev']);
$user = new User();
$result = $user -> get_user_row($_SESSION['user_id'], $db);
//var_dump($result);
?>
<main>

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

//var_dump($_POST);

 require 'footer.php';
?>