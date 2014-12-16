<?php

class DbConnection extends MySQLi
{
	public $host,$user,$password,$database,$connection;

    public function __construct($host, $user, $password, $database)
    {
        $this -> host = $host;
        $this -> user = $user;
        $this -> password = $password;
        $this -> database = $database;

        $this -> connect_me();
    }

    private function connect_me()
    {
        $this -> connection = new mysqli(null, $this -> user, $this -> password, $this -> database,null , $this-> host);
        if( $this -> connect_error ){
        	// ERROR CLASS TO BE IMPLEMENTED!
        	die($this -> connect_error);
    	}else{
    		if (!mysqli_select_db($this -> connection, "photos_db")) {
    			echo "Unable to select users: " . mysqli_error();
    			exit;
    		}

    		$query = "SELECT user_name, user_password FROM users;";
    		$result = mysqli_query($this -> connection, $query);

    		while ($row = $result -> fetch_row()) {
    			echo "<br >";
    			var_dump($row);
    			echo "<br >";
    		}
    	}

    }

}


