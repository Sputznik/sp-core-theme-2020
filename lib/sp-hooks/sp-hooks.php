<?php

define( 'SP_THEME_PATH', get_template_directory() );

/* ADD HEADER */
add_action('sp_header', function(){

  global $sp_customize;

  $header_type = $sp_customize->get_header_type();

  $header_template = apply_filters( 'sp_'.$header_type.'_template', SP_THEME_PATH.'/partials/headers/'.$sp_customize->get_header_type().'.php' );

  require_once( $header_template );

});

/* HEADER MENU */
add_action('sp_nav_menu', function(){

  $sp_nav_menu_options = apply_filters( 'sp_nav_menu_options', array(
    'menu'              => 'primary',
    'theme_location'    => 'primary',
    'depth'             => 2,
    'container'         => 'div',
    'container_class'   => 'nav-list-wrapper',
    'menu_class'        => 'nav-list'
  ));

  wp_nav_menu( $sp_nav_menu_options );

});

/* PRINT LOGOS TO THE HEADER */
add_action('sp_logo', function(){

  $template = apply_filters('sp_logo_template', SP_THEME_PATH.'/partials/logo.php');

  include( $template );

}, 1);


/* PRINT LOGOS TO THE HEADER */
add_action('sp_sticky_logo', function(){

  $template = apply_filters('sp_sticky_logo_template', SP_THEME_PATH.'/partials/logo_sticky.php');

  include( $template );

}, 1);


function sp_is_sticky_nav_transparent(){
    global $post, $sp_customize;

    if( is_search() ){
      return 0;
    }

    $option = $sp_customize->get_option();

    if ( isset($option['header_type']) && $option['header_type'] === 'header1' ) {

      $val = get_post_meta( $post->ID, $key = 'sticky_transparent', true );

      return isset($val) ? (bool)$val : 0;
    }


    return 0;
}
