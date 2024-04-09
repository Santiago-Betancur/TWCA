<?php
get_header();
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <!-- Section container -->
        <div class="applicant-profile-section">
            <div class="container"> <!-- Main content container --><!-- Split content into left and right containers -->
                <div class="left-container">
                    <div class="image-circle-container">
                        <div class="image-circle">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="robot-image">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                            <?php endif; ?>
                        </div> 
                    </div>
                </div>
                <!-- Right side container for Applicant Info -->
                <div class="right-container">
                    <div class="right-container-content-1">
                        <h1>Troy Web Developers: </h1>
                        <h1 class="applicant-name"><?php the_title(); ?></h1> 
                    </div>
                    <div class="right-container-content-2">
                        <div class="applicant-species">
                            <div class="background-shape"></div>
                             <h2>Species:</h2>
                                <p> <?php the_field('species'); ?></p>
                            </div>
                        <div class="applicant-skills">
                            <div class="background-shape"></div>
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
        <div class="applicant-profile-section-mobile">
    <div class="applicant-intro-container"> <!-- Container for the intro section -->
        <div class="applicant-h1">
            <h1 class="applicant-heading">Troy Web Developers: </h1>
            <h1 class="applicant-title"><?php the_title(); ?></h1> <!-- Display the post title -->
        </div>
        <!-- Image circle container added here -->
        <div class="applicant-image-circle-container">
            <div class="applicant-image-circle">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="applicant-robot-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div> <!-- Image circle container ends here -->
        
    </div> <!-- applicant-intro-container ends here -->

    <div class="applicant-info-container"> <!-- Container for the species and skills info -->
        <div class="applicant-species">
            <h2>Species:</h2>
            <p><?php the_field('species'); ?></p>
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
    </div> <!-- applicant-info-container ends here -->
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
        // Fetch core values
        $args = array(
            'post_type' => 'core-value',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        $core_values_query = new WP_Query($args);
        if ($core_values_query->have_posts()) : ?>
            <div class="core-values-section">
                <div class="container core-values-section-container">
                    <h2>Core Values:</h2>
                    <div class="core-values-container">
                        <?php while ($core_values_query->have_posts()) : $core_values_query->the_post(); ?>
                            <div class="core-value">
                                <div class="core-value-image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full'); ?>
                                    <?php endif; ?>
                                </div>
                                <h3 class="core-value-title"><?php the_title(); ?></h3>
                                <div class="core-value-description">
                                    <?php
                                    the_content();
                                    ?>
                                </div>

                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php wp_reset_postdata();  ?>
        <?php endif; ?>
        <!-- Previous sections above... -->

<!-- Experience Section -->
<div class="experience-section">
    <div class="container experience-section-container">
        <!-- Left side for the Experience title and bullet points -->
        <div class="experience-left">
            <div class="experience-title">
                <h2>Experience:</h2>
            </div>
            <div class="experience-details">
                <!-- Here you will loop through your experience taxonomy and display each item -->
                <ul>
                    <?php
                    // Example code to fetch experience terms and display them
                    $experience_terms = get_terms('experience');
                    foreach ($experience_terms as $term) {
                        echo '<li>' . esc_html($term->name) . '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- Right side for the image -->
        <div class="experience-right">
            <img src="/wp-content/themes/troyweb_applicant/assets/images/code-image.png" alt="Experience Image">
        </div>
    </div>
</div>

<!-- Rest of your content... -->

        <?php the_content(); ?>
<?php endwhile;
else :
    echo '<p>No posts found.</p>';
endif;

get_footer();
?>