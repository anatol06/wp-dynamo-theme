<?php 

// Theme Support
function dynamo_theme_setup() {
    // Featured Images Support
    add_theme_support('post-thumbnails');

    // Nav Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu')
    ));
}

add_action('after_setup_theme', 'dynamo_theme_setup');

// Widget Locations
function init_widgets() {
   register_sidebar(array(
      'name' => 'Sidebar',
      'id'   => 'sidebar',
      'before_widget'   => '<div class="sidebar-widget">',
      'after_widget'    => '</div>',
      'before_title'    => '<h3>',
      'after_title'     => '</h3>'
   ));
}

add_action('widgets_init', 'init_widgets');

// Add Customizer functionality
require get_template_directory().'/inc/customizer.php';