<?php $wpQuery = new WP_Query([
    'post_type' => 'customer-story',
    'posts_per_page' => 10
]);

if ( $wpQuery -> have_posts() ) : ?>

<div class="related-insights">

    <div class="title">

        <h2><?= get_theme_mod('customer-stories', 'Customer Stories') ?></h2>

        <div class="arrows">
            <a class="left"></a>
            <a class="right"></a>
        </div>

    </div>

    <div class="insights">

        <?php while ( $wpQuery -> have_posts() ) : $wpQuery -> the_post();

            get_template_part('templates/item-insights');

        endwhile; wp_reset_postdata(); ?>

    </div>

</div>

<?php endif;