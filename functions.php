<?php

/* ENQUEUE STYLES AND SCRIPTS */
add_action('wp_enqueue_scripts',function(){
  wp_enqueue_style( 'main-css', get_template_directory_uri().'/assets/css/main.css', array(), time() );
  wp_enqueue_script( 'main-js', get_template_directory_uri().'/assets/js/main.js', array( 'jquery' ), time(), true );
});

/** REGISTER NAV MENU */
add_action( 'init', function(){
  register_nav_menus( array(
    'primary' 	=> __( 'Primary Menu', 'SPUTZNIK' )
  ) );
});

/* HIDE ADMIN BAR FROM THE FRONTEND */
add_filter('show_admin_bar', '__return_false');
