<?php  

require '../server/config.php';
require 'header.php';
require 'aside.php';

?>

<main>
     <form action="add_img" method="POST" enctype="multipart/form-data">
     	File:
    	<input type="file" name ="image"/><input type="submit" value="Upload"/>
    </form>
 </main>

<?php


?>

