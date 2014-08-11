<?php
	get_header();
?>

<div id="primary" class="site-content span7">
	<div id="content" role="main">
		<div class="post-archive blog-posts row">
			<header class="page-header">
				<h1 class="page-title"><?php echo __( 'Author Archives', 'read' ); ?> <span class="on"><?php echo __( '&#8594;', 'read' ); ?></span> <span class="arshive-author"></span></h1>
			</header>
			<!-- end .page-header -->
			
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
						
						echo '<input type="hidden" name="post_author" class="post-author" value="' . get_the_author() . '">';
						
					endwhile;
				else :
					?>
						<div class="not-found">
							<h2><?php echo __( 'Nothing Found', 'read' ); ?></h2>
							
							<p><?php echo __( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'read' ); ?></p>
							
							<?php
								get_search_form();
							?>
						</div>
					<?php
				endif;
				wp_reset_query();
			?>
			
			<?php
				get_template_part( 'part', 'pagination' );
			?>
			
			<script>
				jQuery(document).ready(function($)
				{
					var post_author = jQuery( '.post-author' ).val();
					
					jQuery( '.arshive-author' ).html( post_author );
				});
			</script>
		</div>
		<!-- end .search-results -->
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