<?php

$custom_part_name = get_sub_field( 'custom_part_name' );

if ( $custom_part_name && $custom_part_name != '' ) :
	$partpath = 'parts/' . $custom_part_name;
	get_template_part($partpath);
endif;

?>