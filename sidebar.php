<?php
	if ( get_post_type() == 'page' )
	{
		?>
			<div id="secondary" class="widget-area span5" role="complementary">
				<?php
					$my_sidebar = get_option( $post->ID . 'my_sidebar', 'page_sidebar' );
					
					if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( $my_sidebar ) ) :
					endif;
				?>
			</div>
		<?php
	}
	else
	{
		?>
			<div id="secondary" class="widget-area span5" role="complementary">
				<?php
					if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'blog_sidebar' ) ) :
					endif;
				?>
			</div>
		<?php
	}
?>