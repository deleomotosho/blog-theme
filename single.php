<?php
	if ( get_post_type() == 'post' )
	{
		get_template_part( 'single', 'post' );
	}
	elseif ( get_post_type() == 'portfolio' )
	{
		get_template_part( 'single', 'portfolio' );
	}
	elseif ( get_post_type() == 'gallery' )
	{
		get_template_part( 'single', 'gallery' );
	}
?>