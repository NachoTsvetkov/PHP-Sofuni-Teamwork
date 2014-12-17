<?php
class Like
{
    public $table_name = 'likes';
    
    public function __construct(){}
    
    public function get_like($like_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT like_id, user_id, photo_id
            FROM likes 
            WHERE (like_id = '$like_id') 
                AND (active = '1');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        return $result -> fetch_row();
    }
    
    
    //If user_id == null returns all likes
    public function get_likes_list($user_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }
        
        $query = "
            SELECT like_id, user_id, photo_id
            FROM likes
            ";
        
        if ($user_id) {
            $query .= "
            WHERE (user_id = '$user_id') 
                AND (active = '1');
            ";
        }
        else {
            $query .= "
            WHERE (active = '1');
            ";
        }
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($output, $row);
        }
        
        return $output;
    }
    
    public function set_like($image_id, $user_id, $db) {
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
    
    public function unset_like($image_id, $user_id, $db)  {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            IF EXISTS (SELECT 1 FROM likes WHERE image_id = '$image_id' AND user_id = '$user_id')
            BEGIN
                UPDATE likes
                SET active = 0
                WHERE image_id = '$image_id' AND user_id = '$user_id';
            END
            ELSE
                INSERT INTO likes (image_id, user_id, active) 
                VALUES('$image_id', '$user_id', 0);
            END
        ";
        
        $result = mysqli_query($db -> connection, $query);
        
        return $result;
    }
}