<?php
/*
Template Name: Page with Sidebar
*/
?>

<?php
	get_header();
?>

<div id="primary" class="site-content span7">
	<div id="content" role="main">
		<div class="blog-posts row">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
								<header class="entry-header">
									<h1 class="entry-title"><?php the_title(); ?></h1>
								</header>
								<!-- end .entry-header -->
								
								<div class="entry-content">
									<?php
										the_content();
									?>
									
									<?php
										wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
									?>
								</div>
								<!-- end .entry-content -->
							</article>
							<!-- end .hentry -->
						<?php
					endwhile;
				endif;
				wp_reset_query();
			?>
			
			<?php
				comments_template( "", true );
			?>
		</div>
		<!-- end .blog-posts -->
	</div>
	<!-- #content -->
</div>
<!-- end #primary -->

<?php
	get_sidebar();
?>

<?php
	get_footer();
?>