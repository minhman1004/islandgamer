<?php
function simple_tailwind_theme_setup() {
    // Hỗ trợ menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'simple-tailwind-theme' ),
    ) );

    // Hỗ trợ featured image
    add_theme_support( 'post-thumbnails' );

    // Hỗ trợ title tag tự động
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'simple_tailwind_theme_setup' );

function simple_tailwind_theme_enqueue_styles() {
    wp_enqueue_style( 'tailwind-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'simple_tailwind_theme_enqueue_styles' );
?>