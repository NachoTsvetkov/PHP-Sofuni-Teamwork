<?php

class DbConnection
{
   public $host = "/cloudsql/php-teamwork-softuni:storage";
   public $user = "root";
   public $password = "";
   public $database = "photos_db";

   public $connection = new mysqli(null, $user, $password, $database, null, $host);
}

?>