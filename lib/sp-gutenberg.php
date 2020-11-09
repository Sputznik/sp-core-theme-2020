<?php

function sp_gutenberg_default_setup(){
  add_theme_support( 'custom-units', 'px', 'rem', 'em', 'vh', 'vw' );
  add_theme_support( 'wp-block-styles' );
  add_theme_support( 'align-wide' );
  add_theme_support( 'custom-line-height' );
  add_theme_support( 'custom-spacing' );
}
add_action( 'after_setup_theme', 'sp_gutenberg_default_setup' );
