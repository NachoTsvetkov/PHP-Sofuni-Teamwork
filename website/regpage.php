<?php 
session_write_close();

require '../server/config.php';
require 'header.php';
require 'aside.php';

?>
<main>

	<?php 

	require 'login.php';
	require 'registration.php';

	?>

</main>
<?php 

require 'footer.php'; 

?>