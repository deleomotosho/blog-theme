<?php
	get_header();
?>

<div id="primary" class="site-content span7">
	<div id="content" role="main">
		<div class="blog-posts row">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						
						$format = get_post_format();
						
						if ( $format != false )
						{
							get_template_part( 'format', $format );
						}
						else
						{
							get_template_part( 'format', 'standard' );
						}
					
					endwhile;
				else :
				
					get_template_part( 'no', 'posts' );
					
				endif;
				wp_reset_query();
			?>
			
			<?php
				get_template_part( 'part', 'pagination' );
			?>
		</div>
		<!-- end .blog-posts -->
	</div>
	<!-- end #content -->
</div>
<!-- end #primary -->

<!-- #secondary -->
<?php
	get_sidebar();
?>
<!-- end #secondary -->

<?php
	get_footer();
?>