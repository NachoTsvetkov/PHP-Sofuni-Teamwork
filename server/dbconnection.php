<?php
class DbConnection extends MySQLi
{
	public $host,$user,$password,$database,$connection;

    public function __construct($isDevServer)
    {
        $this -> connect_me($isDevServer);
        $this -> connection -> set_charset("utf8");
    }

    private function connect_me($isDevServer)
    {   
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
    	}
    }

}


