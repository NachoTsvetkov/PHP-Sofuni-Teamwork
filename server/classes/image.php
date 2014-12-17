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
			SELECT image_data, image_title, user_id, image_date, image_format, active
			FROM images
			WHERE (image_id = '$image_id')
			AND (active = 1);
		";
		
		$result = mysqli_query($db -> connection, $query);
		
		return $result -> fetch_row();
	}

    public function get_list_image($length, $db) {			//FIGURE OUT IF LENGTH IS NEEDED
    	if (!mysqli_select_db($db -> connection, "photos_db")) {
    		echo mysqli_error();
    		die();
    	}

    	$query = "
	    	SELECT image_id, image_data, image_title, user_id, image_date, image_format
	    	FROM images;
	    	WHERE (active = '1')
	    	LIMIT $length;
    	";
    	
    	$result = mysqli_query($db -> connection, $query);
    	
    	return $result -> fetch_row();
    }

    public function add_image($image_data, $image_title, $user_id, $image_format, $db) {
    	if (!mysqli_select_db($db -> connection, "photos_db")) {
    		echo mysqli_error();
    		die();
    	}

    	$query = "
	    	INSERT INTO images (image_data, image_title, user_id, $image_format)
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
}
?>