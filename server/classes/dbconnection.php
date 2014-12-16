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
        $this -> connection = $this -> connect($this -> host, $this -> user, $this -> password, $this -> database);
        if( $this -> connect_error )

        	// ERROR CLASS TO BE IMPLEMENTED!

        die($this -> connect_error);
    }

}


