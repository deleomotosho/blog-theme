<?php
	get_header();
?>

<div id="primary" class="site-content">
	<div id="content" role="main">
		<div class="readable-content blog-single">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
								<header class="entry-header">
									<?php
										$hide_post_title = get_option( $post->ID . 'hide_post_title', false );
										
										if ( $hide_post_title )
										{
											$hide_post_title_out = 'style="display: none;"';
										}
										else
										{
											$hide_post_title_out = "";
										}
									?>
									<h1 class="entry-title" <?php echo $hide_post_title_out; ?>><?php the_title(); ?></h1>
								</header>
								<!-- end .entry-header -->
								
								<div class="entry-meta">
									<span class="post-category">
										<?php
											echo __( 'posted in', 'read' );
											
											echo ' ';
											
											the_category( ', ' );
										?>
									</span>
									<!-- end .post-category -->
									
									<span class="post-date">
										<?php echo __( 'on', 'read' ); ?> <a rel="bookmark" title="<?php the_time(); ?>" href="<?php the_permalink(); ?>"><time class="entry-date" datetime="2012-11-09T23:15:57+00:00"><?php echo get_the_date(); ?></time></a>
									</span>
									<!-- end .post-date -->
									
									<span class="by-author"> <?php echo __( 'by', 'read' ); ?>
										<span class="author vcard">
											<a class="url fn n" rel="author" title="<?php echo __( 'View all posts by ', 'read' ) . get_the_author(); ?>" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
										</span>
										<!-- end .author -->
									</span>
									<!-- end .by-author -->
									
									<?php
										$post_share_links_single = get_option( 'post_share_links_single', 'Yes' );
										
										if ( $post_share_links_single == 'Yes' )
										{
											get_template_part( 'part', 'share' );
										}
									?>
									
									<?php
										edit_post_link( __( 'Edit', 'read' ), '<span class="edit-link" style="margin-top: 8px;">', '</span>' );
									?>
								</div>
								<!-- end .entry-meta -->
								
								<?php
									if ( has_post_thumbnail() )
									{
										?>
											<div class="featured-image">
												<?php
													the_post_thumbnail( 'full', array( 'alt' => get_the_title(), 'title' => "" ) );
												?>
											</div>
											<!-- end .featured-image -->
										<?php
									}
									// end if
								?>
								
								<div class="entry-content clearfix">
									<?php
										the_content();
									?>
									
									<?php
										wp_link_pages( array( 'before' => '<div class="page-links clearfix">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
									?>
								</div>
								<!-- end .entry-content -->
								
								<?php
									if ( get_the_tags() != "" )
									{
										?>
											<footer class="entry-meta post-tags">
												<?php
													the_tags( "", ', ', "" );
												?>
											</footer>
											<!-- end .entry-meta -->
										<?php
									}
									// end if
								?>
							</article>
							<!-- end .hentry -->
							
							<?php
								$about_the_author_module = get_option( 'about_the_author_module', 'Yes' );
								
								if ( $about_the_author_module == 'Yes' )
								{
									get_template_part( 'about', 'author' );
								}
							?>
							
							<nav class="row-fluid nav-single">
								<div class="span6 nav-previous">
									<?php
										previous_post_link( '<h4>' . __( 'PREVIOUS POST', 'read' ) . '</h4>%link', '<span class="meta-nav">&#8592;</span> %title' );
									?>
								</div>
								<!-- end .nav-previous -->
								
								<div class="span6 nav-next">
									<?php
										next_post_link( '<h4>' . __( 'NEXT POST', 'read' ) . '</h4>%link', '%title <span class="meta-nav">&#8594;</span>' );
									?>
								</div>
								<!-- end .nav-next -->
							</nav>
							<!-- end .nav-single -->
							
							<?php
								comments_template( "", true );
							?>
						<?php
					endwhile;
				endif;
				wp_reset_query();
			?>
		</div>
		<!-- end .blog-single -->
	</div>
	<!-- end #content -->
</div>
<!-- end #primary -->

<?php
	get_footer();
?>