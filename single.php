<?php
	$post_sidebar = get_option( 'post_sidebar', 'Yes' );
	
	if ( $post_sidebar == 'No' )
	{
		get_template_part( 'post', 'nosidebar' );
	}
	else
	{
		get_template_part( 'post', 'sidebar' );
	}
?>