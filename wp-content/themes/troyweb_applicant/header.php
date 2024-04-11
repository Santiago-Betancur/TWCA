<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Oldenburg&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header id="masthead" class="site-header">
        <div class="header-container">
            <!-- Site branding/logo, linking back to the home page. -->
            <a class="site-branding" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tw-logo-header.png" alt="<?php bloginfo('name'); ?>">
            </a>
             <!-- Mobile menu toggle button. -->
            <button class="menu-toggle">
                <span class="menu-icon">&#9776;</span>
                <span class="close-icon" style="display:none;">&times;</span>
            </button>
            <!-- Navigation menu. -->
            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                ));
                ?>
            </nav>
        </div>
    </header>
    <script>
         // JavaScript for toggling the navigation menu on mobile
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const mainNavigation = document.querySelector('.main-navigation');
            const menuIcon = document.querySelector('.menu-icon');
            const closeIcon = document.querySelector('.close-icon');
            // Function to display navigation for desktop sizes
            function showNavigationForDesktop() {
                if (window.innerWidth > 814) {
                    mainNavigation.style.display = 'flex';
                } else {
                    mainNavigation.style.display = '';
                }
            }
            showNavigationForDesktop();
            window.addEventListener('resize', showNavigationForDesktop);
            // Event listener for toggle button click
            menuToggle.addEventListener('click', function() {
                const isDisplayed = mainNavigation.style.display === 'block';
                mainNavigation.style.display = isDisplayed ? 'none' : 'block';
                if (isDisplayed) {
                    closeIcon.style.display = 'none';
                    menuIcon.style.display = 'block';
                } else {
                    closeIcon.style.display = 'block';
                    menuIcon.style.display = 'none';
                }
            });
        });
    </script>
</body>