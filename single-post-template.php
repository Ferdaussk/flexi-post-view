<?php
get_header(); // Load the header
while (have_posts()) : the_post(); // Start the loop
echo  'Ferdaus from single page';

    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php echo get_the_post_thumbnail(); ?>
        <h1><?php the_title(); ?></h1>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </article>
    <?php

endwhile;

get_footer();

