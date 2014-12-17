<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    session_write_close();
    
	require '../server/config.php';

    require 'header.php';
    require 'main.php';
    require 'footer.php';
?>