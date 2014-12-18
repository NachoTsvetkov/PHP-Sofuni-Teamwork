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
            $tag = [
                '<img src="data:image/' . $row['image_format'] . ';base64,'.base64_encode($row['image_data']).'" alt="photo" width="500px" id="img_' . $row['image_id'] . '">', 
                'data:image/' . $row['image_format'] . ';base64,'.base64_encode($row['image_data']),
                'download'. $row['image_format'],
                $row['image_title']
            ];
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
    
    public function like ($image_id, $user_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            IF EXISTS (SELECT 1 FROM likes WHERE image_id = '$image_id' AND user_id = '$user_id')
            BEGIN
                UPDATE likes
                SET active = 1
                WHERE image_id = '$image_id' AND user_id = '$user_id';
            END
            ELSE
                INSERT INTO likes (image_id, user_id, active) 
                VALUES('$image_id', '$user_id', 1);
            END
        ";
        
        $result = mysqli_query($db -> connection, $query);
        
        return $result;
    }
    
    public function get_image_comments($image_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT u.user_name, c.comment_content, c.comment_date
            FROM comments c INNER JOIN users u ON c.user_id = u.user_id
            WHERE (c.active = 1) AND (image_id = '$image_id');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($output, $row);
        }
        
        return $output;
    }
    
    public function comment ($image_id, $user_id, $comment_content, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }
        
        $query = "
            INSERT INTO comments (image_id, user_id, comment_content, active) 
            VALUES('$image_id', '$user_id', '$comment_content', 1);
        ";
        $result = mysqli_query($db -> connection, $query);    
        
        return $result;
    }
}
?>