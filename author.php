<?php
	$blog_type = get_option( 'blog_type', 'Sidebar' );
	
	if ( $blog_type == 'No Sidebar' )
	{
		get_template_part( 'aut', 'nosidebar' );
	}
	elseif ( $blog_type == 'Masonry' )
	{
		get_template_part( 'aut', 'masonry' );
	}
	else
	{
		get_template_part( 'aut', 'sidebar' );
	}
?>