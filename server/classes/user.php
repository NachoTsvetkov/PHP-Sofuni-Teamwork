<?php
class User
{
    public $table_name = 'users';
    
    public function __construct(){}
    
    public function get_user($user_email, $user_password, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT user_id, user_name, user_password, user_role, user_image, user_email
            FROM users 
            WHERE (user_email = '$user_email') 
                AND (user_password = '$user_password')
                AND (active = '1');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        return $result -> fetch_assoc();
    }
    
    public function get_user_row($user_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT user_id, user_name, user_password, user_role, user_image, user_email
            FROM users 
            WHERE (user_id = '$user_id') 
                AND (active = '1');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $row = $result -> fetch_assoc();
        $tag = [
                '<img src="data:image/png/jpg/jpeg/gif;base64,'.base64_encode($row['user_image']).'" alt="photo" width="500px" id="usr_' . $row['user_id'] . '">', 
                'data:image/png/jpg/jpeg/gif;base64,'.base64_encode($row['user_image']),
                $row['user_name']
        ];
        
        $row['user_image_tag'] = $tag;
        
        return $row;
    }
    
    public function check_user($user_email, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT user_id
            FROM users 
            WHERE (user_email = '$user_email')
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = false;      
        if($result -> fetch_assoc()) {
            $output = true;
        }
        
        return $output;
    }
    
    public function get_user_list($db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT user_id, user_name, user_password, user_role, user_image, user_email
            FROM users 
            WHERE active = 1;
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($output, $row);
        }
        
        return $output;
    }
    
    public function add_user($user_name, $user_password, $user_email, $user_image, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            INSERT INTO users (user_name, user_password, user_email, user_image) 
            VALUES('$user_name','$user_password','$user_email', '$user_image');
        ";
        
        $result = mysqli_query($db -> connection, $query);
        
        
        return $result;
    }
    
    public function edit_user($user_name, $user_password, $user_password_new, $user_image, $user_email, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            UPDATE users
            SET user_role = '$user_image', user_role = '$user_email', user_password = '$user_password_new'
            WHERE user_name = '$user_name' AND user_password = '$user_password';
        ";
        
        $result = mysqli_query($db -> connection, $query);
        return $result;
    }
    
    public function set_user_role($user_id, $role, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            UPDATE users
            SET user_role = '$role'
            WHERE user_id = '$user_id';
        ";
        
        $result = mysqli_query($db -> connection, $query);
        return $result;
    }
        
    public function set_user_active($user_id, $isActive, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            UPDATE users
            SET active = '$isActive'
        ";
        
        $result = mysqli_query($db -> connection, $query);
        return $result;
    }
    
    public function get_uesr_albums($user_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT album_id, album_name, album_image, user_id
            FROM albums 
            WHERE (active = 1) AND (user_id = '$user_id');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($output, $row);
        }
        
        return $output;
    }
    
    public function get_uesr_album_tags($user_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT album_id, album_name, album_image, user_id
            FROM albums 
            WHERE (active = 1) AND (user_id = '$user_id');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            $tag = '<img src="data:image/png/jpg/jpeg/gif;base64,'.base64_encode($row[2]).'" alt="photo" width="500px"><br>';
            array_push($output, $tag);
        }
        
        return $output;
    }
    
    public function get_uesr_images($user_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT image_id, image_data, image_title, image_date, image_format
            FROM images 
            WHERE (active = 1) AND (user_id = '$user_id');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($output, $row);
        }
        
        return $output;
    }
    
    public function get_uesr_image_tags($user_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT image_id, image_data, image_title, image_date, image_format
            FROM images 
            WHERE (active = 1) AND (user_id = '$user_id');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            $tag = '<img src="data:image/png/jpg/jpeg/gif;base64,'.base64_encode($row[1]).'" alt="photo" width="500px"><br>';
            array_push($output, $tag);
        }
        
        return $output;
    }
    
    public function get_uesr_likes($user_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT likes_id, image_id
            FROM likes 
            WHERE (active = 1) AND (user_id = '$user_id');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($output, $row);
        }
        
        return $output;
    }
}