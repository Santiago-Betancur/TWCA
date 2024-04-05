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
                        <h1>Troy Web Applicant:</h1>
                        <h1 class="applicant-name"><?php the_title(); ?></h1> <!-- Display the post title -->
                    </div>
                    <div class="right-container-content-2">
                        <div class="applicant-species">
                            <h3>Species:</h3>
                            <p> <?php the_field('species'); ?></p>
                        </div>
                        <div class="applicant-skills">
                            <h3>Skills: </h3>
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
                <p class="applicant-detail"><?php the_field('detail'); ?></p> <!-- Displays the 'detail' field -->
            </div>
        </div>

        <?php the_content(); ?> <!-- Display the main content of the post -->

<?php endwhile;
else :
    echo '<p>No posts found.</p>';
endif;

get_footer();
?>