<?php


	class SP_THEME{

		var $admin;

		function __construct(){

			// LOAD THE ADMIN CLASS THAT HAS ALL CUSTOM META BOXES WITH THIER RESPECTIVE FIELDS
			require_once('class-sp-theme-admin.php');
			$this->admin = new SP_THEME_ADMIN;

			/* LOAD ASSETS */
			add_action('wp_enqueue_scripts', array( $this, 'assets' ) );

		}


		function assets(){
			/* ENQUEUE STYLES AND SCRIPTS */
			wp_enqueue_style( 'sp-2020-styles', get_template_directory_uri() .'/assets/css/main.css', array(), SPUTZNIK_2020_THEME_VERSION );
			wp_enqueue_script( 'sp-2020-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), SPUTZNIK_2020_THEME_VERSION, true );

		}


	}

	global $sp_theme;

	$sp_theme = new SP_THEME;
