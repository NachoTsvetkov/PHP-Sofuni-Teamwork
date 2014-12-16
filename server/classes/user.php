<?php
class User
{
    public $table_name = 'users';
    
    public function __construct()
    {
    }
    
    public function get_user($username, $password, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT user_id, user_name, user_password, user_role, user_image, user_email
            FROM users 
            WHERE (user_name = '$username') 
                AND (user_password = '$password')
                AND (active = '1');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        return $result -> fetch_row();
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
        return $result -> fetch_assoc();
    }
    
    public function add_user($user_name, $user_password, $user_email, $user_image) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            INSERT INTO users (user_name, user_password, user_email, user_image) 
            VALUES('$user_name','$user_password','$user_email', '$user_image');
        ";
        
        $result = mysqli_query($db -> connection, $query);
        return $result -> fetch_assoc();
    }
    
    public function edit_user($user_name, $user_password, $user_image, $user_email) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            UPDATE users
            SET user_role = '$user_image', user_role = '$user_email'
            WHERE user_name = '$user_name' AND user_password = '$user_password';
        ";
        
        $result = mysqli_query($db -> connection, $query);
        return $result;
    }
    
    public function set_user_role($user_name, $user_password, $role) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            UPDATE users
            SET user_role = '$role'
            WHERE user_name = '$user_name' AND user_password = '$user_password';
        ";
        
        $result = mysqli_query($db -> connection, $query);
        return $result;
    }
    
    
    
    public function set_user_active($user_name, $user_password, $isActive) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            UPDATE users
            SET active = '$isActive'
            WHERE user_name = '$user_name' AND user_password = '$user_password';
        ";
        
        $result = mysqli_query($db -> connection, $query);
        return $result;
    }
}