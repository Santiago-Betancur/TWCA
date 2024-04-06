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
        <?php the_content(); ?> <!-- Display the main content of the post -->

<?php endwhile;
else :
    echo '<p>No posts found.</p>';
endif;

get_footer();
?>