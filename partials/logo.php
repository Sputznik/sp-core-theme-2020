<?php
	global $sp_customize;

	$option = $sp_customize->get_option();

	if( isset( $option['logo'] ) && $option['logo'] ){

		$img_alt = isset( $option['logo']['alt'] ) ? $option['logo']['alt'] : "";

		$sp_logo_url = apply_filters( 'sp_logo_url', get_bloginfo('url') );

		/* CONTAINER */
		_e('<div class="logo logo-normal"><a class="navbar-brand" href="'.$sp_logo_url.'">');

		/*DESKTOP LOGO*/
		if( isset( $option['logo']['desktop'] ) && $option['logo']['desktop'] ){

			$img_desktop_class = isset( $option['logo']['mobile'] ) ? 'hidden-xs desktop-logo' : 'desktop-logo';

			$img_desktop_src = esc_url( $option['logo']['desktop'] );

			_e('<img class="'.$img_desktop_class.'" src="'.$img_desktop_src.'" alt="'.$img_alt.'">');
		}

		/* MOBILE LOGO */
	 	if( isset( $option['logo']['mobile'] ) && $option['logo']['mobile'] ){

	 		$img_mobile_class = 'visible-xs';

	 		$img_mobile_src = ( isset( $option['logo']['mobile'] ) && $option['logo']['mobile'] ) ? esc_url( $option['logo']['mobile'] ) : esc_url( $option['logo']['desktop'] );

	 		_e('<img class="'.$img_mobile_class.'" src="'.$img_mobile_src.'" alt="'.$img_alt.'">');

	 	}

		// END OF CONTAINER
		_e('</a></div>');
	}
