<?php  

require 'header.php';
require 'aside.php';

$db = new DbConnection($_SESSION['isDev']);
$user = new User();
$user  


?>
<main>
    <script>



    </script>

        <form action="">

            <figure id="profilePic">
                <a href="#"><img width="200" height="200" src="img/random.jpg"></a>
            </figure>

            <label for="">Email:</label>
            <input type="text" value="tupooooo@abv.bg" disabled/>

            <label for="">Name:</label>
            <input type="text" value="noname" disabled/>

            <label for="profilePic">Upload new profile picture</label>
            <input id="profilePic" type="file" class="disabled"  disabled/>

            <a href="#" class="btn btn-primary btn-xs" id="editButton">edit profile</a>
            <input type="submit" disabled />
        </form>

        <form action="">

            <figure id="profilePic">
                <a href="#"><img width="200" height="200" src="img/random.jpg"></a>
            </figure>

            <label for="">Email:</label>
            <input type="text" value="<?= echo $_SESSION['user_email'] ?>" disabled/>

            <label for="">Name:</label>
            <input type="text" value="<?= echo $_SESSION['user_name'] ?>" disabled/>

            <label for="profilePic">Upload new profile picture</label>
            <input id="profilePic" type="file" class="disabled"  disabled/>

            <a href="#" class="btn btn-primary btn-xs" id="editButton">edit profile</a>
            <input type="submit" disabled />
        </form>

    <div id="albums">

    </div>


</main>
<?php require 'footer.php';
?>