<?php
	get_header();
?>

<div id="primary" class="site-content span7">
	<div id="content" role="main">
		<div class="post-archive blog-posts row">
			<header class="page-header">
				<h1 class="page-title">
					<?php
						echo __( 'Date Archives', 'read' );
					?>
					
					<span class="on"><?php echo __( '&#8594;', 'read' ); ?></span>
					
					<span>
						<?php
							if ( is_day() ) :
							
								printf( get_the_date() );
							
							elseif ( is_month() ) :
							
								printf( get_the_date( _x( 'F Y', 'monthly archives date format', 'read' ) ) );
							
							elseif ( is_year() ) :
							
								printf( get_the_date( _x( 'Y', 'yearly archives date format', 'read' ) ) );
							
							else :
							
								_e( 'Archives', 'read' );
							
							endif;
						?>
					</span>
				</h1>
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