<?php  

require 'header.php';
require 'aside.php';

?>

<main>
    <figure>
        <img src="img/random.jpg" width="300" height="300">
    </figure>
    <form action="" method="get" id="uploadPic">
        <span id="fileUpload" class="btn btn-default btn-file">
            Browse <input type="file" class="inputFile">
        </span>

        <input type="submit" id="submitPic" class="btn btn-info"/>
    </form>
</main>

<?php 

require 'footer.php'; 

?>