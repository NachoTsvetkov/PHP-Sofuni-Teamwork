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
        
        return $result -> fetch_assoc();
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
    
    public function get_category_images($category_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT image_id
            FROM category_rel 
            WHERE (active = 1) AND (category_id = '$category_id');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($output, $row);
        }
        
        return $output;
    }
    
    public function get_category_image_tags($category_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT i.image_id
            FROM images i INNER JOIN category_rel cr ON i.image_id = cr.image_id
            WHERE (i.active = 1) AND (cr.active = 1) AND (cr.category_id = $category_id);
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            $tag = '<img src="data:image/png/jpg/jpeg/gif;base64,'.base64_encode($row[0]).'" alt="photo" width="500px"><br>';
            array_push($output, $tag);
        }
        
        return $output;
    }
    
    public function add_image_to_category($category_id, $image_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            IF EXISTS (SELECT 1 FROM category_rel WHERE category_id = '$category_id' AND image_id = '$image_id')
            BEGIN
                UPDATE category_rel
                SET active = 1
                WHERE category_id = '$category_id' AND image_id = '$image_id';
            END
            ELSE
                INSERT INTO category_rel (category_id, image_id, active) 
                VALUES('$category_id', '$image_id', 1);
            END
        ";
        
        $result = mysqli_query($db -> connection, $query);
        
        
        return $result;
    }
    
    public function remove_image_from_category($category_id, $image_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            UPDATE category_rel
            SET active = 0
            WHERE category_id = '$category_id' AND image_id = '$image_id';
        ";
        
        $result = mysqli_query($db -> connection, $query);
        return $result;
    }
    
    public function get_category_albums($category_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            SELECT album_id
            FROM cat_al_rel 
            WHERE (active = 1) AND (category_id = '$category_id');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            array_push($output, $row);
        }
        
        return $output;
    }
    
    public function get_category_album_tags($category_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
        
            SELECT i.image_id
            FROM images i INNER JOIN cat_al_rel car ON i.image_id = car.image_id
            WHERE (i.active = 1) AND (cr.active = 1) AND (cr.category_id = $category_id);
            
            SELECT album_id
            FROM cat_al_rel 
            WHERE (active = 1) AND (category_id = '$category_id');
            ";
        
        $result = mysqli_query($db -> connection, $query);
        
        $output = array();
        while ($row = $result -> fetch_assoc()) {
            $tag = '<img src="data:image/png/jpg/jpeg/gif;base64,'.base64_encode($row[0]).'" alt="photo" width="500px"><br>';
            array_push($output, $tag);
        }
        
        return $output;
    }
    
    public function add_album_to_category($category_id, $album_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            IF EXISTS (SELECT 1 FROM cat_al_rel WHERE category_id = '$category_id' AND album_id = '$album_id')
            BEGIN
                UPDATE cat_al_rel
                SET active = 1
                WHERE category_id = '$category_id' AND album_id = '$album_id';
            END
            ELSE
                INSERT INTO cat_al_rel (category_id, album_id, active) 
                VALUES('$category_id', '$album_id', 1);
            END
        ";
        
        $result = mysqli_query($db -> connection, $query);
        
        
        return $result;
    }
    
    public function remove_album_from_category($category_id, $album_id, $db) {
        if (!mysqli_select_db($db -> connection, "photos_db")) {
            echo mysqli_error();
            die();
        }

        $query = "
            UPDATE category_rel
            SET active = 0
            WHERE category_id = '$category_id' AND album_id = '$album_id';
        ";
        
        $result = mysqli_query($db -> connection, $query);
        return $result;
    }
}