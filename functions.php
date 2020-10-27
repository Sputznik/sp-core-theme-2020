<?php

define('SPUTZNIK_2020_THEME_VERSION', time() );

// INCLUDE THEME FILES
$inc_files = array(
  'lib/class-sp-theme.php'
);

foreach($inc_files as $inc_file){
  require_once( $inc_file );
}

/** REGISTER NAV MENU */
add_action( 'init', function(){
  register_nav_menus( array(
    'primary' 	=> __( 'Primary Menu', 'SPUTZNIK' )
  ) );
});

/* HIDE ADMIN BAR FROM THE FRONTEND */
add_filter('show_admin_bar', '__return_false');
