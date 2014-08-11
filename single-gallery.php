<?php
	get_header();
?>

<div id="primary" class="site-content">
	<div id="content" role="main">
		<div class="row-fluid page">
			<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
								<header class="entry-header">
									<h1 class="entry-title"><?php the_title(); ?></h1>
									
									<?php
										$gl_share_links_single = get_option( 'gl_share_links_single', 'No' );
										
										if ( $gl_share_links_single == 'Yes' )
										{
											get_template_part( 'part', 'share' );
										}
									?>
								</header>
								<!-- end .entry-header -->
								
								<div class="entry-content">
									<?php
										$gl_slideshow_interval_single = get_option( 'gl_slideshow_interval_single', '3000' );
										$gl_circular_single = get_option( 'gl_circular_single', 'true' );
										$gl_next_on_click_image_single = get_option( 'gl_next_on_click_image_single', 'true' );
										
										$gl_ajax_single = get_option( 'gl_ajax_single', 'Yes' );
										
										if ( ( $gl_ajax_single == 'No' ) || ( isset( $_GET['gl_ajax_single'] ) ) )
										{
											?>
												<div id="gamma-container" class="gamma-container gamma-loading">
													<ul class="gamma-gallery" data-slideshowInterval="<?php echo $gl_slideshow_interval_single; ?>" data-circular="<?php echo $gl_circular_single; ?>" data-nextOnClickImage="<?php echo $gl_next_on_click_image_single; ?>">
														<?php
															$gl_images_count =  get_option( $post->ID . 'gl_images_count', '0' );
															
															for ( $i = 0; $i < $gl_images_count; $i++ )
															{
																$gl_image = stripcslashes( get_option( $post->ID . 'gl_image' . $i, "" ) );
																
																if ( $gl_image != "" )
																{
																	$gl_image_title = stripcslashes( get_option( $post->ID . 'gl_image_title' . $i, "" ) );
																	
																	list( $width, $height, $type, $attr ) = getimagesize( $gl_image );
																	
																	global $wpdb;
																	
																	$attachment_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE guid = '$gl_image'" );
																	
																	?>
																		<!-- image -->
																		<li>
																			<div data-alt="<?php echo $gl_image_title; ?>" data-description="<h3><?php echo $gl_image_title; ?></h3>" data-max-width="<?php echo $width; ?>" data-max-height="<?php echo $height; ?>">
																				
																				<div data-src="<?php echo $gl_image; ?>" data-min-width="1200"></div>
																				
																				<?php
																					$image_attributes = wp_get_attachment_image_src( $attachment_id, 'gallery_image_1200' );
																				?>
																				<div data-min-width="800" data-src="<?php echo $image_attributes[0]; ?>"></div>
																				
																				<?php
																					$image_attributes = wp_get_attachment_image_src( $attachment_id, 'gallery_image_800' );
																				?>
																				<div data-min-width="400" data-src="<?php echo $image_attributes[0]; ?>"></div>
																				
																				<?php
																					$image_attributes = wp_get_attachment_image_src( $attachment_id, 'gallery_image_400' );
																				?>
																				<div data-min-width="200" data-src="<?php echo $image_attributes[0]; ?>"></div>
																				
																				<?php
																					$image_attributes = wp_get_attachment_image_src( $attachment_id, 'gallery_image_200' );
																				?>
																				<div data-src="<?php echo $image_attributes[0]; ?>"></div>
																				
																				<noscript>
																					<?php
																						echo wp_get_attachment_image( $attachment_id, 'gallery_image_200' );
																					?>
																				</noscript>
																			</div>
																		</li>
																		<!-- end image -->
																	<?php
																}
																// end if
															}
															// end for
														?>
													</ul>
													<!-- end .gamma-gallery -->
													
													<div class="gamma-overlay"></div>
												</div>
												<!-- end .gamma-container -->
											<?php
										}
										else
										{
											$gl_item_per_page_single = get_option( 'gl_item_per_page_single', '5' );
											
											?>
												<div id="gamma-container" class="gamma-container gamma-loading">
													<ul class="gamma-gallery" data-itemPerPage="<?php echo $gl_item_per_page_single; ?>" data-slideshowInterval="<?php echo $gl_slideshow_interval_single; ?>" data-circular="<?php echo $gl_circular_single; ?>" data-nextOnClickImage="<?php echo $gl_next_on_click_image_single; ?>">
													
													</ul>
													<!-- end .gamma-gallery -->
													
													<div class="gamma-overlay"></div>
													
													<a id="loadmore" class="loadmore" href="?gl_ajax_single"><?php echo __( 'MORE IMAGES', 'read' ); ?></a>
												</div>
												<!-- end .gamma-container -->
											<?php
										}
										// end if
									?>
									
									<!-- content editor -->
									<div>
										<?php
											the_content();
										?>
										
										<?php
											wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
										?>
									</div>
									<!-- end content editor -->
								</div>
								<!-- end .entry-content -->
							</article>
							<!-- end .hentry -->
							
							<?php
								comments_template( "", true );
							?>
						<?php
					endwhile;
				endif;
				wp_reset_query();
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