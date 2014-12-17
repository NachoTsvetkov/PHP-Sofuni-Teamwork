<?php 

class Image {
	public $table_name = 'images';

	public function __construct(){}

	public function get_image($image_id, $db) {
		if (!mysqli_select_db($db -> connection, "photos_db")) {
			echo mysqli_error();
			die();
		}

		$query = "
			SELECT image_id, image_data, image_title, user_id, image_date, image_format, active
			FROM images
			WHERE (image_id = '$image_id')
			AND (active = 1);
		";
		
		$result = mysqli_query($db -> connection, $query);
		
		return $result -> fetch_assoc();
	}
    
    public function get_image_tag($image_id, $db) {
		if (!mysqli_select_db($db -> connection, "photos_db")) {
			echo mysqli_error();
			die();
		}

		$query = "
			SELECT image_id, image_data, image_title, user_id, image_date, image_format, active
			FROM images
			WHERE (image_id = '$image_id')
			AND (active = 1);
		";
		
		$result = mysqli_query($db -> connection, $query);
        
        $row = $result -> fetch_assoc();
        
        $tag = null;
        if ($row) {
            $tag = '<img src="data:image/png/jpg/jpeg/gif;base64,'.base64_encode($row[1]).'" alt="photo" width="500px"><br>';
        }
		
		return $tag;
    }

    public function get_random_images($qty, $db) {
    	if (!mysqli_select_db($db -> connection, "photos_db")) {
    		echo mysqli_error();
    		die();
    	}

    	$query = "
	    	SELECT image_id, image_data, image_title, user_id, image_date, image_format, active
            FROM images
            ORDER BY RAND()
            LIMIT $qty
    	";
    	
    	$result = mysqli_query($db -> connection, $query);
    	
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($output, $row);
        }
        
        return $output;
    }

    public function get_random_image_tags($qty, $db) {
    	if (!mysqli_select_db($db -> connection, "photos_db")) {
    		echo mysqli_error();
    		die();
    	}

    	$query = "
	    	SELECT image_id, image_data, image_title, user_id, image_date, image_format, active
            FROM images
            ORDER BY RAND()
            LIMIT $qty
    	";
    	
    	$result = mysqli_query($db -> connection, $query);
    	
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            $tag = '<img src="data:image/png/jpg/jpeg/gif;base64,'.base64_encode($row[1]).'" alt="photo" width="500px"><br>';
            array_push($output, $tag);
        }
        
        return $output;
    }

    public function add_image($image_data, $image_title, $user_id, $image_format, $db) {
    	if (!mysqli_select_db($db -> connection, "photos_db")) {
    		echo mysqli_error();
    		die();
    	}

    	$query = "
	    	INSERT INTO images (image_data, image_title, user_id, image_format)
	    	VALUES('$image_data','$image_title','$user_id', '$image_format');
    	";
    	
    	$result = mysqli_query($db -> connection, $query);
    	
    	return $result;
    }

    public function set_image_active($image_id, $isActive, $db) {
    	if (!mysqli_select_db($db -> connection, "photos_db")) {
    		echo mysqli_error();
    		die();
    	}

    	$query = "
	    	UPDATE images
	    	SET active = '$isActive'
	    	WHERE (imageid = '$imageid');
    	";
    	
    	$result = mysqli_query($db -> connection, $query);
    	return $result;
    }
    
    public function get_image_likes($image_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT likes_id, user_id
            FROM likes 
            WHERE (active = 1) AND (image_id = '$image_id');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($output, $row);
        }
        
        return $output;
    }
}
?>