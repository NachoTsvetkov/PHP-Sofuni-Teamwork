<?php

class DbConnection extends MySQLi
{
	public $host,$user,$password,$database,$connection;

    public function __construct($isDevServer)
    {
        $this -> connect_me($isDevServer);
    }

    private function connect_me($isDevServer)
    {   
        var_dump($isDevServer);
        if  ($isDevServer == true) {
            $this -> connection = new mysqli(
              '173.194.224.99:3306',
              'root',
              'softuni',
              'photos_db'
            );
        } 
        else 
        {
            $this -> connection = new mysqli(
                  null,
                  'root', // username
                  '',     // password
                  'photos_db',
                  null,
                  '/cloudsql/php-teamwork-softuni:storage'
            );
        }
        
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


