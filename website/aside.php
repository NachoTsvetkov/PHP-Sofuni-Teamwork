<?php require '../server/config.php'; ?>

<aside class="categories">
    <h4>Categories</h4>
    <ul>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            @session_start();
        }
        
        $db = new DbConnection($_SESSION['isDev']);
        $category = new Category();
        $categories = $category ->  get_categories_list($db);
        
        foreach ($categories as $key => $value) {
            $category_id = $value['category_id'];
            $category_name = $value['category_name'];
            echo "<li><a href='category_list?$category_id'>$category_name</a></li>";
        }

        ?>

    </ul>
    </aside>