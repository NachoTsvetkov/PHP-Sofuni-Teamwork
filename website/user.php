<?php  

require '../server/config.php';
require 'header.php';
require 'aside.php';

if (session_status() == PHP_SESSION_NONE) {
        @session_start();
    }

?>

<main>

 <figure id="profilePic">
     <a href="#"><img width="200" height="200" src="img/picture.jpg"></a>
 </figure>

    <fieldset id="userDetails">
    <form action=""></form>
    <legend>Email</legend>
    <p>tupooooo@abv.bg</p>
    <legend>Name</legend>
    <p>noname nofamily</p>
    </fieldset>

</main>

<?php

 require 'footer.php';

?>