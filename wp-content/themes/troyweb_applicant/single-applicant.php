<?php
get_header();

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <!-- Section container -->
        <div class="applicant-profile-section">
            <div class="container"> <!-- Main content container -->
                <!-- Split content into left and right containers -->
                <div class="left-container">
                    <!-- Container for the circle and the robot image -->
                    <div class="image-circle-container">
                        <div class="image-circle">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="robot-image">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                            <?php endif; ?>
                        </div> <!-- Circle container -->
                    </div>
                </div>
                <!-- Right side container for Applicant Info -->
                <div class="right-container">
                    <div class="right-container-content-1">
                        <h1>Troy Web Developers:</h1>
                        <h1 class="applicant-name"><?php the_title(); ?></h1> <!-- Display the post title -->
                    </div>
                    <div class="right-container-content-2">
                        <div class="applicant-species">
                            <h2>Species:</h2>
                            <p> <?php the_field('species'); ?></p>
                        </div>
                        <div class="applicant-skills">
                            <h2>Skills: </h2>
                            <p>
                                <?php
                                $skills_terms = get_the_terms(get_the_ID(), 'skills');
                                if ($skills_terms && !is_wp_error($skills_terms)) {
                                    $skills_list = wp_list_pluck($skills_terms, 'name');
                                    echo implode(', ', $skills_list);
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Me Section -->
        <div class="about-me-section">
            <div class="container">
                <div class="about-me-heading">
                    <h2>About Me: </h2>
                </div>
                <div class="about-me-detail">
                    <p><?php echo get_field('detail'); ?></p> <!-- Make sure to echo the field -->
                </div>
            </div>
        </div>
        <?php
        //   Core Values Section  
        // Fetch the core values terms from the 'core_values' taxonomy
        // Fetch core values
        $core_values = new WP_Query(array(
            'post_type'      => 'core-value',
            'posts_per_page' => -1, // Retrieve all core values
            'orderby'        => 'title', // Order by the title or any other parameter
            'order'          => 'ASC', // Order in ascending or descending order
        ));

        if ($core_values->have_posts()) : ?>
            <div class="core-values-section">
                <div class="container">
                    <h2>Core Values:</h2>
                    <div class="core-values-wrapper">
                        <?php while ($core_values->have_posts()) : $core_values->the_post(); ?>
                            <div class="core-value-item">
                                <div class="core-value-image">
                                    <?php the_post_thumbnail(); // Assumes each core value has a featured image 
                                    ?>
                                </div>
                                <h3 class="core-value-title"><?php the_title(); ?></h3>
                                <div class="core-value-description">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php the_content(); ?> <!-- Display the main content of the post -->

<?php endwhile;
else :
    echo '<p>No posts found.</p>';
endif;

get_footer();
?>