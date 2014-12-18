<?php
if (session_status() == PHP_SESSION_NONE) {
        @session_start();
    }
session_destroy();

echo "
	<script type='text/javascript'>
		window.location = '/index';
	</script>
	";

?>