<?php

$inc_files = array(
	'class-sp-customize.php',
	'logo.php',
);

	foreach($inc_files as $inc_file){
		require_once( $inc_file );
	}
