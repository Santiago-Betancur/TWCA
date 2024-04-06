<?php
// Styles for the "Applicant" custom post type
function troyweb_applicant_scripts()
{
    wp_enqueue_style('troyweb-applicant-style', get_stylesheet_uri());
}

// Menu and navigation
function troyweb_theme_setup() 
{
    register_nav_menus(array(
        'menu-1' => esc_html__('Primary', 'troyweb-applicant'),
    ));
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'troyweb_theme_setup');
//Remove Tags from Images
function filter_ptags_on_images($content)
{
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images', 100);
add_action('after_setup_theme', 'troyweb_theme_setup');
add_action('wp_enqueue_scripts', 'troyweb_applicant_scripts');
// Register the custom post type "Applicant"
function troyweb_register_post_type_applicant()
{
    // Define labels for the "Applicant" custom post type
    $labels = array(
        'name'                  => _x('Applicants', 'Post type general name', 'troyweb-applicant'),
        'singular_name'         => _x('Applicant', 'Post type singular name', 'troyweb-applicant'),
        'menu_name'             => _x('Applicants', 'Admin Menu text', 'troyweb-applicant'),
        'add_new'               => __('Add New Applicant', 'troyweb-applicant'),
        'add_new_item'          => __('Add New Applicant', 'troyweb-applicant'),
        'edit_item'             => __('Edit Applicant', 'troyweb-applicant'),
        'new_item'              => __('New Applicant', 'troyweb-applicant'),
        'view_item'             => __('View Applicant', 'troyweb-applicant'),
        'search_items'          => __('Search Applicants', 'troyweb-applicant'),
        'not_found'             => __('No applicants found', 'troyweb-applicant'),
        'not_found_in_trash'    => __('No applicants found in Trash', 'troyweb-applicant'),
    );
    // Define arguments for the "Applicant" custom post type
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'applicant'),
        'capability_type'    => 'post',
        'supports'           => array('title', 'editor', 'thumbnail'),
    );

    // Register the "Applicant" custom post type with WordPress
    register_post_type('applicant', $args);
}
add_action('init', 'troyweb_register_post_type_applicant');
// Register taxonomies for the "Applicant" custom post type    /////////////////////
function troyweb_register_taxonomies()
{
    // Taxonomy: Skills
    register_taxonomy('skills', 'applicant', array(
        'label'             => __('Skills', 'troyweb-applicant'),
        'rewrite'           => array('slug' => 'skills'),
        'hierarchical'      => false,
        'public'            => true,
        'show_ui'           => true,
    ));
    // Taxonomy: Experience
    register_taxonomy('experience', 'applicant', array(
        'label'             => __('Experience', 'troyweb-applicant'),
        'rewrite'           => array('slug' => 'experience'),
        'hierarchical'      => false,
        'public'            => true,
        'show_ui'           => true,
    ));
}
add_action('init', 'troyweb_register_taxonomies');
// Register the "Core Value" post type
function troyweb_register_post_type_core_value()
{
    // Define labels for the "Core Value" post type
    $labels = array(
        'name'                  => _x('Core Values', 'Post type general name', 'troyweb-applicant'),
        'singular_name'         => _x('Core Value', 'Post type singular name', 'troyweb-applicant'),
        'menu_name'             => _x('Core Values', 'Admin Menu text', 'troyweb-applicant'),
        'add_new'               => __('Add New Core Value', 'troyweb-applicant'),
        'add_new_item'          => __('Add New Core Value', 'troyweb-applicant'),
        'edit_item'             => __('Edit Core Value', 'troyweb-applicant'),
        'new_item'              => __('New Core Value', 'troyweb-applicant'),
        'view_item'             => __('View Core Value', 'troyweb-applicant'),
        'search_items'          => __('Search Core Values', 'troyweb-applicant'),
        'not_found'             => __('No core values found', 'troyweb-applicant'),
        'not_found_in_trash'    => __('No core values found in Trash', 'troyweb-applicant'),
    );
    // Define arguments for the "Core Value" post type
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'core-value'),
        'capability_type'    => 'post',
        'supports'           => array('title', 'editor', 'thumbnail'),
    );
    // Register the "Core Value" post type with WordPress
    register_post_type('core-value', $args);
}
add_action('init', 'troyweb_register_post_type_core_value');
