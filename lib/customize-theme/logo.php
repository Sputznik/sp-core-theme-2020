<?php

	add_action('customize_register', function( $wp_customize ){

		global $sp_customize;

		$sp_customize->panel( $wp_customize, 'sp_theme_panel', 'Theme Options' );

		$sp_customize->section( $wp_customize, 'sp_theme_panel', 'sp_logo_section', 'Logo & Header Type', 'Upload your logo');

		/** LOGO IMAGE */
		$sp_customize->image( $wp_customize, 'sp_logo_section', '[logo][desktop]', 'Logo', '');


		/** LOGO MOBILE IMAGE */
		$sp_customize->image( $wp_customize, 'sp_logo_section', '[logo][mobile]', 'Mobile Logo', '');

		/** Sticky Image **/
		$sp_customize->image( $wp_customize, 'sp_logo_section', '[logo][sticky]', 'Sticky Logo', '');

		/** Mobile Sticky Image **/
		$sp_customize->image( $wp_customize, 'sp_logo_section', '[logo][mobile_sticky]', 'Mobile Sticky Logo', '');

		/**Logo Alt text**/
		$sp_customize->textarea( $wp_customize, 'sp_logo_section', '[logo][alt]', 'Alt Text', '' );


		/** HEADER TYPE */
		$headers_arr = apply_filters( 'sp_headers_options', array(
			'header1' => 'Sticky Transparent Menu'
		));

  	$sp_customize->dropdown( $wp_customize, 'sp_logo_section', '[header_type]', 'Header Type', 'header1', $headers_arr);

	});
