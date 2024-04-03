<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Oldenburg&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="masthead" class="site-header">
    <div class="container">
        <a class="site-branding" href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tw-logo-header.png" alt="<?php bloginfo('name'); ?>">
        </a>
        <button class="menu-toggle">
            <span class="menu-icon">&#9776;</span> <!-- Hamburger icon -->
            <span class="close-icon" style="display:none;">&times;</span> <!-- Close icon -->
        </button>
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
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNavigation = document.querySelector('.main-navigation');
    const menuIcon = document.querySelector('.menu-icon');
    const closeIcon = document.querySelector('.close-icon');
    function showNavigationForDesktop() {
        if (window.innerWidth > 760) {
            mainNavigation.style.display = 'flex';
        } else {
            mainNavigation.style.display = '';
        }
    }
    showNavigationForDesktop();
    window.addEventListener('resize', showNavigationForDesktop);
    menuToggle.addEventListener('click', function() {
        const isDisplayed = mainNavigation.style.display === 'block';
        mainNavigation.style.display = isDisplayed ? 'none' : 'block';
        // Toggle icons based on menu state
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

