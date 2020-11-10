<?php


	class SP_CUSTOMIZE{

		var $option;
		var $option_slug;

		function __construct(){

			$this->option_slug = 'sp_theme_2020';
			$this->option = get_option( $this->option_slug );

		}

		function get_option(){

			return $this->option;

		}

		function get_option_slug( $id = '' ){
			return $this->option_slug.$id;
		}

		function get_one_option( $slug, $default ){
			$option = $this->get_option();

			if( isset( $option[ $slug ] ) && $option[ $slug ] ){
				return $option[ $slug ];
			}

			return $default;
		}

		function get_header_type(){ return $this->get_one_option( 'header_type', 'header1' ); }

		function panel( $wp_customize, $id, $label){

			$wp_customize->add_panel($id, array(
				'priority' 		=> 30,
				'capability' 	=> 'edit_theme_options',
				'theme_supports'=> '',
				'title' 		=> $label,
				'description' 	=> '',
			));

		}

		function section( $wp_customize, $panel, $id, $label, $desc){

			$wp_customize->add_section( $id , array(
    		'title'       	=> __( $label, 'sp' ),
	    	'priority'    	=> 30,
	    	'description' 	=> $desc,
	    	'panel'			=> $panel
			));

		}



		function color( $wp_customize, $section, $id, $label, $default ){

			$id = $this->get_option_slug( $id );

			$this->add_setting( $wp_customize, $id, $default );

  		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
    		'label' => $label,
    		'section' => $section,
    		'settings' => $id,
  		)));


		}

		function checkbox( $wp_customize, $section, $id, $label ){

			$id = $this->get_option_slug( $id );

			$wp_customize->add_setting($id, array(
				'default' => 0,
  			'capability' => 'edit_theme_options',
  			'type'       => 'option',
  		));

			$wp_customize->add_control($id, array(
  			'settings' 	=> $id,
  			'label'    	=> __($label),
  			'section'  	=> $section,
  			'type'     	=> 'checkbox',
  			'std' 		=> 1
  		));

		}


		function text( $wp_customize, $section, $id, $label, $default){

			$id = $this->get_option_slug( $id );

			$wp_customize->add_setting($id, array(
   			'default' 	=> $default,
   			'capability'=> 'edit_theme_options',
   			'type'      => 'option',
  		));

			$wp_customize->add_control($id, array(
				'settings' 	=> $id,
  			'type' 		=> 'text',
	    	'label' 	=> $label,
    		'section' 	=> $section,
      ));

		}

		function textarea( $wp_customize, $section, $id, $label, $default){

			$id = $this->get_option_slug( $id );

			$wp_customize->add_setting($id, array(
   			'default' 	=> $default,
   			'capability'=> 'edit_theme_options',
   			'type'      => 'option',
  		));

			$wp_customize->add_control($id, array(
				'settings' 	=> $id,
    		'type' 		=> 'textarea',
	    	'label' 	=> $label,
    		'section' 	=> $section,
	    ));

		}

		function dropdown( $wp_customize, $section, $id, $label, $default, $choices){

			$id = $this->get_option_slug( $id );

			$this->add_setting( $wp_customize, $id, $default );

			$wp_customize->add_control( $id, array(
				'type' 		=> 'select',
	    	'label'    	=> $label,
	    	'section'  	=> $section,
	    	'settings' 	=> $id,
	    	'choices' 	=> $choices
			));
		}

		function image( $wp_customize, $section, $id, $label, $default){

			$id = $this->get_option_slug( $id );

			$this->add_setting( $wp_customize, $id, $default );

			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $id, array(
    		'label' 	=> $label,
    		'section' 	=> $section,
    		'settings' 	=> $id,
			)));
		}

		/* wrap add setting function of wp customize */
		function add_setting($wp_customize, $id, $default){

			$wp_customize->add_setting( $id, array(
  			'default' 		=> $default,
  			'transport'   	=> 'refresh',
  			'type'			=> 'option'
      ));

		}

	}

	global $sp_customize;

	$sp_customize = new SP_CUSTOMIZE;
