<?php
// included the header template part.
get_header();
if (have_posts()) :// Check if there are posts to display.
     // Loop through the available posts (should be only one in this case).
    while (have_posts()) : the_post(); ?>
        <!-- Applicant Profile Section: Displays applicant's image and basic info. -->
        <div class="applicant-profile-section">
            <div class="container"> 
                <div class="left-container">
                    <div class="image-circle-container">
                        <div class="image-circle">
                            <!-- Check if the post has a featured image and display it. -->
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="robot-image">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="right-container">
                    <div class="right-container-content-1">
                        <h1 class="applicant-name">Troy Web Developers: <?php the_title(); ?></h1>
                    </div>
                    <div class="right-container-content-2">
                         <!-- Applicant Species: Uses a custom field to display the species. -->
                        <div class="applicant-species">
                            <div class="background-shape"></div>
                            <h2>Species:</h2>
                            <p> <?php the_field('species'); ?></p>
                        </div>
                         <!-- Applicant Skills: Displays skills taxonomy terms associated with the applicant. -->
                        <div class="applicant-skills">
                            <div class="background-shape"></div>
                            <h2>Skills: </h2>
                            <p>
                                <?php
                                // Fetch and display taxonomy terms for 'skills'.
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
        <!-- Mobile version of the Applicant Profile Section with a similar structure but optimized for mobile viewing. -->
        <div class="applicant-profile-section-mobile">
            <div class="applicant-intro-container"> 
                <div class="applicant-h1">
                    <h1 class="applicant-heading">Troy Web Developers: </h1>
                    <h1 class="applicant-title"><?php the_title(); ?></h1> 
                </div>
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
            <div class="applicant-info-container"> 
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
        <!-- About Me Section -->
        <div class="about-me-section">
            <div class="container">
                <div class="about-me-heading">
                    <h2>About Me: </h2>
                </div>
                <div class="about-me-detail">
                    <p><?php echo get_field('detail'); ?></p> 
                </div>
            </div>
        </div>
        <!-- Core Values Section: Displays posts of 'core-value' post type related to the applicant. -->
        <?php
        // Query parameters to fetch 'core-value' posts.
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
        <!-- Experience Section: Showcases the applicant's work experience. -->
        <div class="experience-section">
            <div class="container experience-section-container">
                <div class="experience-left">
                    <div class="experience-title">
                        <h2>Experience:</h2>
                    </div>
                    <div class="experience-details">
                        <ul>
                            <?php
                            $experience_terms = get_terms('experience');
                            foreach ($experience_terms as $term) {
                                echo '<li>' . esc_html($term->name) . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="experience-right">
                    <img src="/wp-content/themes/troyweb_applicant/assets/images/code-image.png" alt="Experience Image">
                </div>
            </div>
        </div>
        <?php the_content(); // Displays the content of the post. Useful for showing additional information about the applicant that's entered in the main WordPress editor.
        ?>
<?php endwhile;
else :
    echo '<p>No posts found.</p>';// Shows a message if no posts found.
endif;

get_footer();// Includes the footer template part.
?>