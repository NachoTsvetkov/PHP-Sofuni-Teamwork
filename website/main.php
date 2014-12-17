<?php  require 'aside.php';
?>
<main>


    <section class="grid">
        <?php
        foreach ($pictures as $key=>$value) {
                echo "<article>
            <a href=\"img/random.jpg\" data-lightbox=\"image-1\" data-title=\"dadattata\"><img src=\"img/random.jpg \"></a>
        </article>";
            }
        ?>

    </section>
</main>