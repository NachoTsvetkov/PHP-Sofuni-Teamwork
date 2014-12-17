<?php require '../server/config.php'; ?>

<aside class="categories">
    <h4>Categories</h4>
    <ul>
        <?php
        $db = new DbConnection($_SESSION['isDev']);
        $category = new Category();
        $categories = $category ->  get_categories_list($db);
        
        $pictures = ['1'=>"img/picture1.jpg",
            '2'=>"img/picture2.jpg",
            '3'=>"img/picture3.jpg",
            '4'=>"img/picture4.jpg",
            '5'=>"img/picture5.jpg",
            '6'=>"img/picture6.jpg",
            '7'=>"img/picture7.jpg",
            '8'=>"img/picture8.jpg",
            '9'=>"img/picture9.jpg",
            '10'=>"img/picture10.jpg",
            '11'=>"img/picture11.jpg",
            '12'=>"img/picture12.jpg",
            '13'=>"img/picture13.jpg"];
        
        foreach ($categories as $key => $value) {
            $category_id = $value['category_id'];
            $category_name = $value['category_name'];
            echo "<li><a href='category.php?$category_id'>$category_name</a></li>";
        }

        ?>

    </ul>
    </aside>