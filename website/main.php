<?php  require 'aside.php';
?>
<main>


    <section class="grid">
        <?php
        foreach ($pictures as $key=>$value) {
                echo "<article>
            <div id=\"demoLightbox\" class=\"lightbox hide fade\"  tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
                <div class='lightbox-content'>
                    <img src=\"img/$value\">
                    <div class=\"lightbox-caption\"><p>Your caption here</p></div>
                </div>
            </div>
            <a data-toggle=\"lightbox\" href=\"#demoLightbox\" >
            <img src=\"img/random.jpg\" />
            </a>
        </article>";
            }

        ?>




    </section>
</main>