<div class="item">
    <a href="<?php the_permalink() ?>" class="permalink"></a>
    <figure><?php the_post_thumbnail('blog-grid') ?></figure>
    <h3><?php the_title() ?></h3>
    <?php get_template_part('templates/author') ?>
    <a class="arrow"></a>
</div>