<?php
	get_header();
?>

<div id="primary" class="site-content">
	<div id="content" role="main">
		<div class="blog-masonry">
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
		</div>
		<!-- end .blog-masonry -->
		
		<?php
			get_template_part( 'part', 'pagination' );
		?>
	</div>
	<!-- end #content -->
</div>
<!-- end #primary -->

<?php
	get_footer();
?>