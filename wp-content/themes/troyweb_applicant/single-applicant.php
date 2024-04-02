<?php 
get_header();

if (have_posts()) : 
    while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1> <!-- Display the post title -->
        <h2><?php the_field('species'); ?></h2> <!-- Displays the 'species' field -->
        <p><?php the_field('details'); ?></p> <!-- Displays the 'detail' field -->
        <?php the_content(); ?> <!-- Display the main content of the post -->
    <?php endwhile;
else :
    // Optional: add a message for "No posts found".
endif;

get_footer();
?>
