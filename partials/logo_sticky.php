<?php

	/*
	*	Originally written by Jayvardhan.
	*	Refactored by Samuel V Thomas.
	*	Template to print sticky logo. If mobile sticky logo exists then keep both the copies.
	*/

	global $sp_customize;

	$option = $sp_customize->get_option();

	/* CONTAINER */
	_e('<div class="logo logo-sticky"><a class="navbar-brand" href="'.get_bloginfo('url').'">');

	if( isset( $option['logo']['sticky'] ) && $option['logo']['sticky'] ){

		$img_alt = isset( $option['logo']['alt'] ) ? $option['logo']['alt'] : "";

		$img_sticky_class =  ( isset( $option['logo']['mobile_sticky'] ) && $option['logo']['mobile_sticky'] )  ? 'hidden-xs sticky-logo' : 'sticky-logo';

		$img_sticky_src = esc_url( $option['logo']['sticky'] );

		_e('<img class="'.$img_sticky_class.'" src="'.$img_sticky_src.'" alt="'.$img_alt.'">');
	}

	/* MOBILE LOGO */
	if( isset( $option['logo']['mobile_sticky'] ) && $option['logo']['mobile_sticky'] ) {

		$img_mobile_class = 'visible-xs';

		$img_mobile_src = ( isset( $option['logo']['mobile_sticky'] ) && $option['logo']['mobile_sticky'] ) ? esc_url( $option['logo']['mobile_sticky'] ) : esc_url( $option['logo']['mobile'] );

		_e('<img class="'.$img_mobile_class.'" src="'.$img_mobile_src.'" alt="'.$img_alt.'">');

	}

	_e('</a></div>');
