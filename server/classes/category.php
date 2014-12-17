<?php
class Category
{
    public $table_name = 'categories';
    public $rel_table_name = 'category_rel';
    
    public function __construct(){}
    
    public function get_category_name($category_id) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT category_id, category_name
            FROM categories 
            WHERE (category_id = '$category_id') 
                AND (active = '1');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        return $result -> fetch_row();
    }
    
    public function get_categories_list($db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT category_id, category_name
            FROM categories 
            WHERE active = 1;
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($output, $row);
        }
        
        return $output;
    }
    
    public function add_category($category_name, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            INSERT INTO categories (category_name) 
            VALUES('$category_name');
        ";
        
        $result = mysqli_query($db -> connection, $query);
        
        
        return $result;
    }
    
    public function set_category_active($category_id, $isActive, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            UPDATE categories
            SET active = '$isActive'
            WHERE category_id = '$category_id';
        ";
        
        $result = mysqli_query($db -> connection, $query);
        return $result;
    }
    
    //public function edit_user($user_name, $user_password, $user_password_new, $user_image, $user_email, $db) {
    //    if (!mysqli_select_db($db -> connection, "photos_db")) {
    //        echo mysqli_error();
    //        die();
    //    }

    //    $query = "
    //        UPDATE users
    //        SET user_role = '$user_image', user_role = '$user_email', user_password = '$user_password_new'
    //        WHERE user_name = '$user_name' AND user_password = '$user_password';
    //    ";
        
    //    $result = mysqli_query($db -> connection, $query);
    //    return $result;
    //}
    
    //public function set_user_role($user_name, $user_password, $role, $db) {
    //    if (!mysqli_select_db($db -> connection, "photos_db")) {
    //        echo mysqli_error();
    //        die();
    //    }

    //    $query = "
    //        UPDATE users
    //        SET user_role = '$role'
    //        WHERE user_name = '$user_name' AND user_password = '$user_password';
    //    ";
        
    //    $result = mysqli_query($db -> connection, $query);
    //    return $result;
    //}
}