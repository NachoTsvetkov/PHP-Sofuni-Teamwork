<?php  require 'aside.php';
?>
<main>


    <section class="grid">
        <?php
        foreach ($pictures as $key=>$value) {
                echo "<article>
            <a href=\"img/picture.jpg\" data-lightbox=\"image-1\" data-title=\"dadattata\"><img src=\"img/picture.jpg\" class='pictures'></a>
        </article>";
            }
        ?>

    </section>
</main>