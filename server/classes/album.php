<?php
class Album {

	public $table_name = 'albums';

	public function __construct(){}

	public function get_album($album_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT album_name, album_image, user_id
            FROM albums 
            WHERE (album_id = '$album_id') 
                AND (active = '1');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        return $result -> fetch_row();
    }

	public function get_album_list($user_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT album_id, album_name, album_image, user_id
            FROM albums
            WHERE (user_id = '$user_id')
            	AND (active = '1');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($output, $row);
        }
        
        return $output;
    }

    public function add_album($album_name, $album_image, $user_id, $db) {
    	if (!mysqli_select_db($db -> connection, "photos_db")) {
    		echo mysqli_error();
    		die();
    	}

    	$query = "
	    	INSERT INTO albums (album_name, album_image, user_id)
	    	VALUES('$album_name','$album_image','$user_id');
    	";
    	
    	$result = mysqli_query($db -> connection, $query);
    	
    	return $result;
    }

    public function set_album_active($album_id, $isActive, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            UPDATE albums
            SET active = '$isActive'
            WHERE (album_id = '$album_id');
        ";
        
        $result = mysqli_query($db -> connection, $query);
        return $result;
    }
}

echo "album.php Loaded!";