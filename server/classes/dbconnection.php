<?php

class DbConnection
{
	public function __contruct(){

		$this->user = "root";
		$this->password = "";

		$this->host = "/cloudsql/php-teamwork-softuni:storage";

		$this->database = "photos_db";

		$this->connection = new mysqli($this->host, $this->user, $this->password, $this->database);

		if (!$this->connection) {
			echo mysqli_error($this->connection);
		}
	}
}
