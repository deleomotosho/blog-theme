<?php
/*
Template Name: Archive
*/
?>

<?php
	get_header();
?>
                <!-- #primary -->
                <div id="primary" class="site-content">
                    <!-- #content -->
                    <div id="content" role="main">
						<!-- .row -->
						<div class="row-fluid page">
							<!-- .hentry -->
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
								<!-- .entry-header -->
								<header class="entry-header">
									<h1 class="entry-title"><?php single_post_title(); ?></h1>
								</header>
								<!-- .entry-header -->
								<!-- .entry-content -->
								<div class="entry-content">
									<!-- .row-fluid -->
									<div class="row-fluid archives">
										<!-- .span3 -->
										<div class="span3">
											<h3><?php echo __( 'Post Archives', 'read' ); ?></h3>
											<ul class="icons icon-plus-list">
												<?php
													wp_get_archives( array( 'show_post_count' => 0 ) );
												?>
											</ul>
										</div>
										<!-- .span3 -->
										<!-- .span3 -->
										<div class="span3">
											<h3><?php echo __( 'Pages', 'read' ); ?></h3>
											<ul class="icons icon-plus-list">
												<?php
													wp_list_pages( 'title_li=' );
												?>
											</ul>
										</div>
										<!-- .span3 -->
										<!-- .span3 -->
										<div class="span3">
											<h3><?php echo __( 'Categories', 'read' ); ?></h3>
											<ul class="icons icon-plus-list">
												<?php
													wp_list_categories( array( 'title_li' => "", 'show_count' => 0 ) );
												?>
											</ul>
										</div>
										<!-- .span3 -->
										<!-- .span3 -->
										<div class="span3">
											<h3><?php echo __( 'Gallery', 'read' ); ?></h3>
											<ul class="icons icon-plus-list">
												<?php
													global $post;
													$args = array( 'post_type' => 'gallery', 'numberposts' => -1 );
													$galleries = get_posts( $args );
													
													foreach ( $galleries as $post ) :	setup_postdata( $post );
														?>
															<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
														<?php
													endforeach;
												?>
											</ul>
										</div>
										<!-- .span3 -->
									</div>
									<!-- .row-fluid -->
									<!-- page content -->
									<div>
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
									<!-- end page content -->
								</div>
								<!-- .entry-content -->
							</article>
							<!-- .hentry -->
							<?php
								comments_template( "", true );
							?>
						</div>
						<!-- .row -->
                    </div>
                    <!-- #content -->
                </div>
                <!-- #primary -->
<?php
	get_footer();
?>