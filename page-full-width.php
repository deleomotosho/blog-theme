<?php
/*
Template Name: Full width Page
*/
?>

<?php
	get_header();
?>

<div id="primary" class="site-content">
	<div id="content" role="main">
		<div class="row-fluid page">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php single_post_title(); ?></h1>
				</header>
				<!-- end .entry-header -->
				
				<div class="entry-content clearfix">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								
								the_content();
								
								wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
								
							endwhile;
						endif;
						wp_reset_query();
					?>
				</div>
				<!-- end .entry-content -->
			</article>
			<!-- end .post -->
			
			<?php
				comments_template( "", true );
			?>
		</div>
		<!-- end .row -->
	</div>
	<!-- end #content -->
</div>
<!-- end #primary -->

<?php
	get_footer();
?>