<?php
/*** Child Theme Function  ***/
function coolair_enqueue_child_theme_styles() {
    wp_enqueue_style('coolair-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('coolair-style'));
}
add_action('wp_enqueue_scripts', 'coolair_enqueue_child_theme_styles'); ?>