
<?php 
require '../server/config.php';
require 'header.php';
require 'aside.php';
 ?>

<main>
	
 	<h2><?php $_SESSION['errorMsg'] ?></h2>
 	<?= $_SESSION['errorMsg'] = '' ?>

</main>

<?php  
require 'footer.php';
         
