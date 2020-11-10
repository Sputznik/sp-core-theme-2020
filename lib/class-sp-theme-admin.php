<?php

	class SP_THEME_ADMIN{

		var $meta_boxes;


		function __construct(){

      add_action( 'init', array( $this, 'create') );			// THEME INITIALIZATION

			$this->set_meta_boxes();

			/* SAVE POST - FOR SAVING META FIELDS */
			add_action( 'save_post', array( $this, 'save_meta_fields' ), 10, 2 );

		}

		function set_meta_boxes(){

			$this->meta_boxes = array(
				'settings_box'	=> array(
					'title'		=> 'Page Settings',
					'fields'	=> array(
						'sticky_transparent' => array(
							'label'		=> 'Transparent Header',
							'desc'		=> 'Only works for Sticky Transparent Menu',
							'type'		=> 'boolean',
							'default'	=> false
						),
					),
          'post_type' =>  $this->get_registered_post_types(),
					'context'	=> 'side',
					'priority'	=> 'default'
				),
			);

		}

		function get_registered_post_types(){

			$allTypes = array();

			$get_types = get_post_types( array( 'public' => true ), 'names' );

			 // Gets orbit bundle post types
			$args = array(
				'post_type'       => 'orbit-types',
				'posts_per_page'  =>  -1
			);
			 $query = new WP_Query( $args );

			foreach ( $query->posts as $key => $value) { $get_types[$value->post_name] = $value->post_title; }

			$allTypes = array_keys( $get_types );
			unset( $allTypes[2] );

			return $allTypes;
		}

		function get_meta_boxes(){ return $this->meta_boxes; }

    function create(){

			/* META BOXES */
			add_action( 'admin_init', function(){

				foreach( $this->get_meta_boxes() as $slug => $metabox ){

					$metabox['context'] = $metabox['context'] ? $metabox['context'] :  'normal';

					$metabox['priority'] = $metabox['priority'] ? $metabox['priority'] :  'default';

					/* ADD META BOX */
					add_meta_box( $slug, $metabox[ 'title' ], array( $this, 'meta_box' ), $metabox['post_type'], $metabox['context'], $metabox['priority']);
				}
			});

		}

		/* META BOXES */
		function meta_box( $post, $metabox ) {

			// GET THE METABOX ID, IF NOT THEN RETURN
			if( !is_array( $metabox ) || !isset( $metabox['id'] ) ){ return; }
			$slug = $metabox['id'];

			// GET THE REGISTERED META BOX FIELDS
			$metaboxes = $this->get_meta_boxes();
			if( !is_array( $metaboxes ) || !isset( $metaboxes[ $slug ] ) ){ return ;}
			$fields = $metaboxes[ $slug ][ 'fields' ];

			// ITERATING THROUGH EACH FIELD
			foreach( $fields as $slug => $field ){

				// GETTING VALUE FROM THE DB
				$value = esc_html( get_post_meta( $post->ID, $slug, true ) );

				// CHECKING IF THE FIELDS IS AN ARRAY OR NEEDS TO INVOKE THE LEGACY CODE
				if( is_array( $field ) && isset( $field[ 'type' ] ) ){
					$template_file = false;
					switch( $field[ 'type' ] ){
						case 'boolean':
							$template_file = "metafield_boolean.php";
							break;
					}

          // INCLUDES THE TEMPLATE BASED ON THE FIELD TYPE
					if( $template_file ){
						include "templates/".$template_file;
					}

				}

			} // LOOP ENDS

		}

		/* SAVE META BOXES */
		function save_meta_fields( $post_id, $post ){

			$metaboxes = $this->get_meta_boxes();

			foreach( $metaboxes as $metabox ){

				$flag = false;

				// CHECK IF THIS METABOX IS VALID FOR THE CURRENT SCREEN
				if( is_array( $metabox['post_type'] ) ){

					// Iterate through all the post types in the metabox['post_type'] array
					foreach ( $metabox['post_type'] as $slug ) {

						if( ( is_array( $metabox['post_type'] ) && in_array( $slug,  array( $post->post_type )  ) ) || ( $metabox['post_type'] == $post->post_type ) ){

							$flag = true;

						}

					} // LOOP ENDS

				}

				if( $flag ){

					$fields = $metabox['fields'];

					foreach( $fields as $slug => $field ){									/* ITERATE THROUGH THE FIELDS */

						if ( isset( $_POST[ $slug ] ) ) {

							update_post_meta( $post_id, $slug, $_POST[ $slug ] );			/* Store data in post meta table if present in post data */
						}

						if( !isset( $_POST[ $slug ] ) && is_array( $field ) && isset( $field['type'] ) && $field['type'] == 'boolean' ){
							delete_post_meta( $post_id, $slug );
						}
					}
				}

			}

		} //SAVE META FIELDS END


	}
