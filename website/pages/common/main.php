<main>
    <aside class="categories">
        <h4>Categories</h4>
        <ul>
            <?php
            $categories = [
                '1'=>"fun",
                '2'=>"health",
                '3'=>"others",
                '3'=>"sample",
                '5'=>"sample"
            ];
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
            foreach ($categories as $key=>$value) {
                echo "<li><a href='category.php/$key'>$value</a></li>";
            }



            ?>

        </ul>
    </aside>
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