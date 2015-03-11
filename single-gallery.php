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
															
															
															// for ( $i = 0; $i < $gl_images_count; $i++ )
															
															for ( $i = $gl_images_count; $i >= 0; $i-- )
															{
																$gl_image = stripcslashes( get_option( $post->ID . 'gl_image' . $i, "" ) );
																
																
																if ( $gl_image != "" )
																{
																	$gl_image_title = stripcslashes( get_option( $post->ID . 'gl_image_title' . $i, "" ) );
																	
																	list( $width, $height, $type, $attr ) = getimagesize( $gl_image );
																	
																	global $wpdb;
																	
																	$attachment_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE guid = '$gl_image'" );
																	
																	?>
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
																	<?php
																}
															}
														?>
													</ul>
													
													<div class="gamma-overlay"></div>
												</div>
											<?php
										}
										else
										{
											$gl_item_per_page_single = get_option( 'gl_item_per_page_single', '5' );
											
											?>
												<div id="gamma-container" class="gamma-container gamma-loading">
													<ul class="gamma-gallery" data-itemPerPage="<?php echo $gl_item_per_page_single; ?>" data-slideshowInterval="<?php echo $gl_slideshow_interval_single; ?>" data-circular="<?php echo $gl_circular_single; ?>" data-nextOnClickImage="<?php echo $gl_next_on_click_image_single; ?>">
													
													</ul>
													
													<div class="gamma-overlay"></div>
													
													<a id="loadmore" class="loadmore" href="?gl_ajax_single"><?php echo __( 'MORE IMAGES', 'read' ); ?></a>
												</div>
											<?php
										}
									?>
									
									<div>
										<?php
											the_content();
										?>
										
										<?php
											wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
										?>
									</div>
								</div>
							</article>
							
							
							<nav class="nav-single row-fluid">
								<div class="nav-previous span6">
									<?php
										previous_post_link( '<h4>' . __( 'PREVIOUS GALLERY', 'read' ) . '</h4>%link', '<span class="meta-nav">&#8592;</span> %title' );
									?>
								</div>
								
								<div class="nav-next span6">
									<?php
										next_post_link( '<h4>' . __( 'NEXT GALLERY', 'read' ) . '</h4>%link', '%title <span class="meta-nav">&#8594;</span>' );
									?>
								</div>
							</nav>
							
							
							<?php
								comments_template( "", true );
							?>
						<?php
					endwhile;
				endif;
				wp_reset_query();
			?>
		</div>
	</div>
</div>


<?php
	get_footer();
?>