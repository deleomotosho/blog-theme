<?php
/*
Template Name: Gallery
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
				
				
				<div class="entry-content">
					<?php
						$gl_content_editor = get_option( 'gl_content_editor', 'Bottom' );
						
						if ( $gl_content_editor == 'Top' )
						{
							?>
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
							<?php
						}
					?>
					
					
					<!-- gallery -->
					<?php
						$gl_ajax = get_option( 'gl_ajax', 'No' );
						
						if ( ( $gl_ajax == 'No' ) || ( isset( $_GET['gl_ajax'] ) ) )
						{
							?>
								<div class="portfolio-items">
									<?php
										$args_gallery = array( 'post_type' => 'gallery', 'posts_per_page' => -1 );
										$loop_gallery = new WP_Query( $args_gallery );
										
										if ( $loop_gallery->have_posts() ) :
											while ( $loop_gallery->have_posts() ) : $loop_gallery->the_post();
												
												$gl_thumb_size = get_option( $post->ID . 'gl_thumb_size' );
												
												?>
													<!-- gallery-item -->
													<div class="hentry image <?php echo $gl_thumb_size; ?>">
														<div class="media-box">
															<?php
																if ( has_post_thumbnail() )
																{
																	if ( $gl_thumb_size == 'x2' )
																	{
																		the_post_thumbnail( 'gallery_image_2x', array( 'alt' => get_the_title(), 'title' => "" ) );
																	}
																	else
																	{
																		the_post_thumbnail( 'gallery_image_1x', array( 'alt' => get_the_title(), 'title' => "" ) );
																	}
																}
															?>
															
															<div class="mask">
																<div class="portfolio-info">
																	<h3><?php the_title(); ?></h3>
																	
																	<?php
																		$gl_short_description = stripcslashes( get_option( $post->ID . 'gl_short_description' ) );
																	?>
																	<p class="category"><?php echo $gl_short_description; ?></p>
																</div>
																
																<a href="<?php the_permalink(); ?>"></a>
															</div>
														</div>
													</div>
												<?php
											endwhile;
										endif;
										wp_reset_query();
									?>
								</div>
							<?php
						}
						else
						{
							$gl_item_per_page = get_option( 'gl_item_per_page', '5' );
							
							?>
								<div class="portfolio-items loading" data-itemPerPage="<?php echo $gl_item_per_page; ?>"></div>
								
								<a id="loadmore" class="loadmore" href="?gl_ajax"><?php echo __( 'MORE ITEMS', 'read' ); ?></a>	
							<?php
						}
					?>
					<!-- end gallery -->
					
					
					<?php
						if ( $gl_content_editor == 'Bottom' )
						{
							?>
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
							<?php
						}
					?>
				</div>
			</article>
			
			
			<?php
				comments_template( "", true );
			?>
		</div>
	</div>
</div>


<?php
	get_footer();
?>