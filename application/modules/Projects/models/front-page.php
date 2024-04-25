<?php get_header() ?>
        
<main>

    <div class="wrapper">

        <article>

            <?php the_content();

            wp_block('how-we-do-it'); ?>

        </article>

    </div>

</main>

<?php get_footer();
