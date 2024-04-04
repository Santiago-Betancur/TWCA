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
                        <div class="image-circle"></div> <!-- Circle container -->
                        <?php 
                        if (has_post_thumbnail()) {
                            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Retrieve image URL
                            echo '<div class="robot-image"><img src="' . esc_url($image_url) . '" alt="Robot Image" /></div>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Right side container for Applicant Info -->
                <div class="right-container">
                    <h1 class="applicant-name"><?php the_title(); ?></h1> <!-- Display the post title -->
                    <div class="applicant-species">
                        <h3>Species:</h3>
                        <p><?php the_field('species'); ?></p>
                    </div> <!-- Displays the 'species' field -->
                    <div class="applicant-skills">
                        <h3>Skills:</h3>
                        <?php 
                        $skills_terms = get_the_terms(get_the_ID(), 'skills');
                        if ($skills_terms && !is_wp_error($skills_terms)) : ?>
                            <ul>
                                <?php foreach ($skills_terms as $term) : ?>
                                    <li><?php echo esc_html($term->name); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <p class="applicant-detail"><?php the_field('detail'); ?></p> <!-- Displays the 'detail' field -->
                </div>

            </div>
        </div>
        
        <?php the_content(); ?> <!-- Display the main content of the post -->
        
    <?php endwhile;
else :
    echo '<p>No posts found.</p>';
endif;

get_footer();
?>
