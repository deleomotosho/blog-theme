<?php

/* ============================================================================================================================================ */

	function create_tabs( $current = 'general' )
	{
		$tabs = array(  'general' => 'General',
						'style' => 'Style',
						'blog' => 'Blog',
						'portfolio' => 'Portfolio',
						'gallery' => 'Gallery',
						'sidebar' => 'Sidebar',
						'seo' => 'SEO',
						'contact' => 'Contact' );
		?>
			<h2 class="nav-tab-wrapper">
				<div id="icon-themes" class="icon32"></div>
				
				<div>
					<h2>Theme Options</h2>
				</div>
				
				<?php
					foreach ( $tabs as $tab => $name )
					{
						$class = ( $tab == $current ) ? ' nav-tab-active' : "";
						
						echo "<a class='nav-tab$class' href='?page=theme-options&tab=$tab'>$name</a>";
					}
				?>
			</h2>
			<!-- end .nav-tab-wrapper -->
		<?php
	}
	// end create_tabs

/* ============================================================================================================================================ */

	function theme_options_page()
	{
		global $pagenow;
		
		?>
			<div class="wrap wrap2">
				<script src="<?php echo get_template_directory_uri(); ?>/admin/colorpicker/colorpicker.js"></script>
				
				<div class="status">
					<img height="16" width="16" alt="..." src="<?php echo get_template_directory_uri(); ?>/admin/ajax-loader.gif">
					
					<strong></strong>
				</div>
				<!-- end .status -->
				
				<script>
					jQuery(document).ready( function( $ )
					{
					// -------------------------------------------------------------------------
					
						var uploadID = '',
							uploadImg = '';

						jQuery( '.upload-button' ).click(function()
						{
							uploadID = jQuery(this).prev( 'input' );
							uploadImg = jQuery(this).next( 'img' );
							formfield = jQuery( '.upload' ).attr( 'name' );
							tb_show( "", 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true' );
							return false;
						});
						
						window.send_to_editor = function( html )
						{
							imgurl = jQuery( 'img', html ).attr( 'src' );
							uploadID.val( imgurl );
							uploadImg.attr('src', imgurl);
							tb_remove();
						}
					
					// -------------------------------------------------------------------------
					
						$( ".alert-success p" ).click(function()
						{
							$(this).fadeOut( "slow", function()
							{
								$( ".alert-success" ).slideUp( "slow" );
							});
						});
					
					// -------------------------------------------------------------------------
						
						$( '.color-selector' ).each( function()
						{
							var cp = $( this );
							
							cp.ColorPicker(
							{
								color: '#ffffff',
								
								onBeforeShow: function ()
								{
									var myColor = $( this ).next( 'input' ).val();
									
									if ( myColor != "" )
									{
										$(this).ColorPickerSetColor( myColor );
										// cp.find( 'div' ).css( 'backgroundColor', '#' + myColor );
									}
								},
								onChange: function ( hsb, hex, rgb )
								{
									cp.find( 'div' ).css( 'backgroundColor', '#' + hex );
									cp.next( 'input' ).val( hex );
								},
								onSubmit: function( hsb, hex, rgb, el )
								{
									$( el ).val( hex );
									$( el ).ColorPickerHide();
								}
							});
						});
						
						
						$( '.color' ).change( function()
						{
							var myColor = $( this ).val();
							
							$( this ).prev( 'div' ).find( 'div' ).css( 'backgroundColor', '#' + myColor );
						});
						
						
						$( '.color' ).keypress( function()
						{
							var myColor = $( this ).val();
							
							$( this ).prev( 'div' ).find( 'div' ).css( 'backgroundColor', '#' + myColor );
						});
					
					// -------------------------------------------------------------------------
					
						$( 'form.ajax-form' ).submit(function()
						{
							$.ajax(
							{
								data : $(this).serialize(),
								type: "POST",
								beforeSend: function()
								{
									$('.status img').show();
									$('.status strong').html('Saving...');
									$('.status').fadeIn();
								},
								success: function(data)
								{
									$('.status img').hide();
									$('.status strong').html('Done.');
									$('.status').delay(1000).fadeOut();
								}
							});
							
							return false;
						});
					
					// -------------------------------------------------------------------------

						
					
					// -------------------------------------------------------------------------
					
						/*
						
						var calcHeight = function()
						{
							$( "#preview-frame" ).height($(window).height() - 100);
						}

						$(document).ready(function()
						{
							calcHeight();
						});

						$(window).resize(function()
						{
							calcHeight();
							
						}).load(function()
						{
							calcHeight();
						});
						
						*/
					
					// -------------------------------------------------------------------------
					
					});
				</script>
				
				<?php
					
					if ( isset( $_GET['tab'] ) )
					{
						create_tabs( $_GET['tab'] );
					}	
					else
					{
						create_tabs( 'general' );
					}
					
				?>

				<div id="poststuff">
					<?php
					
						// theme options page
						if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-options' )
						{
							// tab from url
							if ( isset( $_GET['tab'] ) )
							{
								$tab = $_GET['tab'];
							}
							else
							{
								$tab = 'general'; 
							}
							
							
							switch ( $tab )
							{
								case 'general' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form method="post" class="ajax-form" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Logo Type</h4>
																
																<?php
																	$logo_type = get_option( 'logo_type', 'Text Logo' );
																?>
																<select id="logo_type" name="logo_type" style="width: 100%;">
																	<option <?php if ( $logo_type == 'Text Logo' ) { echo 'selected="selected"'; } ?>>Text Logo</option>
																	
																	<option <?php if ( $logo_type == 'Image Logo' ) { echo 'selected="selected"'; } ?>>Image Logo</option>
																</select>
															</td>
															
															<td class="option-right">
																Select.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Text Logo</h4>
																
																<?php
																	$select_text_logo = get_option( 'select_text_logo', 'WordPress Site Title' );
																?>
																<select id="select_text_logo" name="select_text_logo" style="width: 100%;">
																	<option <?php if ( $select_text_logo == 'WordPress Site Title' ) { echo 'selected="selected"'; } ?>>WordPress Site Title</option>
																	
																	<option <?php if ( $select_text_logo == 'Theme Site Title' ) { echo 'selected="selected"'; } ?>>Theme Site Title</option>
																</select>
																
																<h4>Theme Site Title</h4>
																
																<?php
																	$theme_site_title = stripcslashes( get_option( 'theme_site_title', "" ) );
																?>
																<textarea id="theme_site_title" name="theme_site_title" rows="1" cols="50"><?php echo $theme_site_title; ?></textarea>
															</td>
															
															<td class="option-right">
																Select.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Image Logo</h4>
																
																<?php
																	$logo_image = get_option( 'logo_image' );
																?>
																<input type="text" id="logo_image" name="logo_image" class="upload code2" style="width: 100%;" value="<?php echo $logo_image; ?>">
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $logo_image; ?>">
															</td>
															
															<td class="option-right">
																Upload a logo or specify an image address of your online logo.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Tagline</h4>
																
																<?php
																	$select_tagline = get_option( 'select_tagline', 'WordPress Tagline' );
																?>
																<select id="select_tagline" name="select_tagline" style="width: 100%;">
																	<option <?php if ( $select_tagline == 'WordPress Tagline' ) { echo 'selected="selected"'; } ?>>WordPress Tagline</option>
																	
																	<option <?php if ( $select_tagline == 'Theme Tagline' ) { echo 'selected="selected"'; } ?>>Theme Tagline</option>
																</select>
																
																<h4>Theme Tagline</h4>
																
																<?php
																	$theme_tagline = stripcslashes( get_option( 'theme_tagline', "" ) );
																?>
																<textarea id="theme_tagline" name="theme_tagline" rows="2" cols="50"><?php echo $theme_tagline; ?></textarea>
															</td>
															
															<td class="option-right">
																Select.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Login Logo</h4>
																
																<?php
																	$logo_login = get_option( 'logo_login' );
																?>
																<input type="text" id="logo_login" name="logo_login" class="upload code2" style="width: 100%;" value="<?php echo $logo_login; ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $logo_login; ?>">
																
																<br>
																
																<?php
																	$logo_login_hide = get_option( 'logo_login_hide', false );
																?>
																<label><input type="checkbox" id="logo_login_hide" name="logo_login_hide" <?php if ( $logo_login_hide ) { echo 'checked="checked"'; } ?>> Hide Login Logo Module</label>
															</td>
															
															<td class="option-right">
																(274x63)px PNG image.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Favicon</h4>
																
																<?php
																	$favicon = get_option( 'favicon', "" );
																?>
																<input type="text" id="favicon" name="favicon" class="upload code2" style="width: 100%;" value="<?php echo $favicon; ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 16px;" align="right" alt="" src="<?php echo $favicon; ?>">
															</td>
															
															<td class="option-right">
																(16x16)px ICO, PNG or GIF format.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Apple Touch Icon</h4>
																
																<?php
																	$apple_touch_icon = get_option( 'apple_touch_icon', "" );
																?>
																<input type="text" id="apple_touch_icon" name="apple_touch_icon" class="upload code2" style="width: 100%;" value="<?php echo $apple_touch_icon; ?>">
																
																<input type="button" class="button upload-button" style="margin-top: 10px;" value="Browse">
																
																<img style="margin-top: 10px; max-height: 50px;" align="right" alt="" src="<?php echo $apple_touch_icon; ?>">
															</td>
															
															<td class="option-right">
																Minimum (145x145)px PNG image that will represent your website's favicon for Apple devices such as the iPod Touch, iPhone and iPad, as well as some Android devices.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Copyright Text</h4>
																
																<?php
																	$copyright_text = stripcslashes( get_option( 'copyright_text' ) );
																?>
																<textarea id="copyright_text" name="copyright_text" rows="5" cols="50"><?php echo $copyright_text; ?></textarea>
															</td>
															
															<td class="option-right">
																Copyright text in the footer.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																<img src="http://oi44.tinypic.com/im8qwk.jpg">
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
									
								case 'style' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Fonts and Colors</h4>
																
																<?php
																	echo '<a href="' . admin_url( 'customize.php' ) . '">Customize</a>';
																?>
															</td>
															
															<td class="option-right">
																Select from theme customizer.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Character Sets</h4>
																
																<label><input type="checkbox" id="char_set_latin" name="char_set_latin" <?php if ( get_option( 'char_set_latin', true ) ) { echo 'checked="checked"'; } ?>> Latin</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_latin_ext" name="char_set_latin_ext" <?php if ( get_option( 'char_set_latin_ext' ) ) { echo 'checked="checked"'; } ?>> Latin Extended</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_cyrillic" name="char_set_cyrillic" <?php if ( get_option( 'char_set_cyrillic' ) ) { echo 'checked="checked"'; } ?>> Cyrillic</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_cyrillic_ext" name="char_set_cyrillic_ext" <?php if ( get_option( 'char_set_cyrillic_ext' ) ) { echo 'checked="checked"'; } ?>> Cyrillic Extended</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_greek" name="char_set_greek" <?php if ( get_option( 'char_set_greek' ) ) { echo 'checked="checked"'; } ?>> Greek</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_greek_ext" name="char_set_greek_ext" <?php if ( get_option( 'char_set_greek_ext' ) ) { echo 'checked="checked"'; } ?>> Greek Extended</label>
																
																<br>
																
																<label><input type="checkbox" id="char_set_vietnamese" name="char_set_vietnamese" <?php if ( get_option( 'char_set_vietnamese' ) ) { echo 'checked="checked"'; } ?>> Vietnamese</label>
															</td>
															
															<td class="option-right">
																Select any of them to include to the Google Fonts if the selected fonts have ones of them in their family.
																<br>
																<br>
																To see the supported character sets visit Google Fonts online.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Font Styles</h4>
																
																<?php
																	$extra_font_styles = get_option( 'extra_font_styles', 'No' );
																?>
																<select id="extra_font_styles" name="extra_font_styles" style="width: 100%;">
																	<option <?php if ( $extra_font_styles == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $extra_font_styles == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Bold and italic styles.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Menu Search</h4>
																
																<?php
																	$nav_menu_search = get_option( 'nav_menu_search', 'No' );
																?>
																<select id="nav_menu_search" name="nav_menu_search" style="width: 100%;">
																	<option <?php if ( $nav_menu_search == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $nav_menu_search == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Show/hide.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Footer Widget Locations</h4>
																
																<?php
																	$footer_widget_locations = get_option( 'footer_widget_locations', 'No' );
																?>
																<select id="footer_widget_locations" name="footer_widget_locations" style="width: 100%;">
																	<option <?php if ( $footer_widget_locations == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $footer_widget_locations == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Footer Widget Columns</h4>
																
																<?php
																	$footer_widget_columns = get_option( 'footer_widget_columns', '4 Columns' );
																?>
																<select id="footer_widget_columns" name="footer_widget_columns" style="width: 100%;">
																	<option <?php if ( $footer_widget_columns == '3 Columns' ) { echo 'selected="selected"'; } ?>>3 Columns</option>
																	
																	<option <?php if ( $footer_widget_columns == '4 Columns' ) { echo 'selected="selected"'; } ?>>4 Columns</option>
																</select>
															</td>
															
															<td class="option-right">
																Select.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Mobile Zoom</h4>
																
																<?php
																	$mobile_zoom = get_option( 'mobile_zoom', 'No' );
																?>
																<select id="mobile_zoom" name="mobile_zoom" style="width: 100%;">
																	<option <?php if ( $mobile_zoom == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $mobile_zoom == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Custom CSS</h4>
																
																<?php
																	$custom_css = stripcslashes( get_option( 'custom_css', "" ) );
																?>
																<textarea id="custom_css" name="custom_css" class="code2" rows="8" cols="50"><?php echo $custom_css; ?></textarea>
															</td>
															
															<td class="option-right">
																Quickly add custom css.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>External CSS</h4>
																
																<?php
																	$external_css = stripcslashes( get_option( 'external_css', "" ) );
																?>
																<textarea id="external_css" name="external_css" class="code2" rows="8" cols="50"><?php echo $external_css; ?></textarea>
															</td>
															
															<td class="option-right">
																Add your custom external (.css) file.
																<br>
																<br>
																Sample (.css):
																<br>
																<br>
																<span class="code2">&lt;link rel="stylesheet" type="text/css" href="yourstyle.css"&gt;</span>
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>External JS</h4>
																
																<?php
																	$external_js = stripcslashes( get_option( 'external_js', "" ) );
																?>
																<textarea id="external_js" name="external_js" class="code2" rows="8" cols="50"><?php echo $external_js; ?></textarea>
															</td>
															
															<td class="option-right">
																Add your custom external (.js) file.
																<br>
																<br>
																Sample (.js):
																<br>
																<br>
																<span class="code2">&lt;script src="yourscript.js"&gt;&lt;/script&gt;</span>
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								
								break;
								
								case 'blog' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( 'settings-page' );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Blog Type</h4>
																
																<?php
																	$blog_type = get_option( 'blog_type', 'Sidebar' );
																?>
																<select id="blog_type" name="blog_type" style="width: 100%;">
																	<option <?php if ( $blog_type == 'Sidebar' ) { echo 'selected="selected"'; } ?>>Sidebar</option>
																	
																	<option <?php if ( $blog_type == 'No Sidebar' ) { echo 'selected="selected"'; } ?>>No Sidebar</option>
																	
																	<option <?php if ( $blog_type == 'Masonry' ) { echo 'selected="selected"'; } ?>>Masonry</option>
																</select>
															</td>
															
															<td class="option-right">
																Select blog layout.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Post Sidebar</h4>
																
																<?php
																	$post_sidebar = get_option( 'post_sidebar', 'Yes' );
																?>
																<select id="post_sidebar" name="post_sidebar" style="width: 100%;">
																	<option <?php if ( $post_sidebar == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $post_sidebar == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Enable/disable.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Excerpt</h4>
																
																<?php
																	$theme_excerpt = get_option( 'theme_excerpt', 'No' );
																?>
																<select id="theme_excerpt" name="theme_excerpt" style="width: 100%;">
																	<option <?php if ( $theme_excerpt == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $theme_excerpt == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																	
																	<option <?php if ( $theme_excerpt == 'standard' ) { echo 'selected="selected"'; } ?> value="standard">Only for standard format</option>
																</select>
															</td>
															
															<td class="option-right">
																Activate/deactivate.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Numbered Pagination</h4>
																
																<?php
																	$pagination = get_option( 'pagination', 'No' );
																?>
																<select id="pagination" name="pagination" style="width: 100%;">
																	<option <?php if ( $pagination == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $pagination == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Activate the numbered pagination or deactivate to use Older-Newer links.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>About The Author Module</h4>
																
																<?php
																	$about_the_author_module = get_option( 'about_the_author_module', 'Yes' );
																?>
																<select id="about_the_author_module" name="about_the_author_module" style="width: 100%;">
																	<option <?php if ( $about_the_author_module == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $about_the_author_module == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Activate/deactivate.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Share Links (on Single)</h4>
																
																<?php
																	$post_share_links_single = get_option( 'post_share_links_single', 'Yes' );
																?>
																<select id="post_share_links_single" name="post_share_links_single" style="width: 100%;">
																	<option <?php if ( $post_share_links_single == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $post_share_links_single == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Activate/deactivate.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>All Post Formats on Homepage</h4>
																
																<?php
																	$all_formats_homepage = get_option( 'all_formats_homepage', 'No' );
																?>
																<select id="all_formats_homepage" name="all_formats_homepage" style="width: 100%;">
																	<option <?php if ( $all_formats_homepage == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $all_formats_homepage == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Show all post formats or just standard.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
								
								case 'portfolio' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( 'settings-page' );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Ajax</h4>
																
																<?php
																	$pf_ajax = get_option( 'pf_ajax', 'No' );
																?>
																<select id="pf_ajax" name="pf_ajax" style="width: 100%;">
																	<option <?php if ( $pf_ajax == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $pf_ajax == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Activate or deactivate the ajax functionality.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Items Per Page</h4>
																
																<?php
																	$pf_item_per_page = get_option( 'pf_item_per_page', '5' );
																?>
																<input type="text" id="pf_item_per_page" name="pf_item_per_page" size="6" maxlength="6" value="<?php echo $pf_item_per_page; ?>">
															</td>
															
															<td class="option-right">
																Define number of items to show each request.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Content Editor</h4>
																
																<?php
																	$pf_content_editor = get_option( 'pf_content_editor', 'Bottom' );
																?>
																<select id="pf_content_editor" name="pf_content_editor" style="width: 100%;">
																	<option <?php if ( $pf_content_editor == 'Top' ) { echo 'selected="selected"'; } ?>>Top</option>
																	<option <?php if ( $pf_content_editor == 'Bottom' ) { echo 'selected="selected"'; } ?>>Bottom</option>
																</select>
															</td>
															
															<td class="option-right">
																Before / after position.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Share Links (on Single)</h4>
																
																<?php
																	$pf_share_links_single = get_option( 'pf_share_links_single', 'Yes' );
																?>
																<select id="pf_share_links_single" name="pf_share_links_single" style="width: 100%;">
																	<option <?php if ( $pf_share_links_single == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	<option <?php if ( $pf_share_links_single == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Activate or deactivate.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
								
								case 'gallery' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( 'settings-page' );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Ajax</h4>
																
																<?php
																	$gl_ajax = get_option( 'gl_ajax', 'No' );
																?>
																<select id="gl_ajax" name="gl_ajax" style="width: 100%;">
																	<option <?php if ( $gl_ajax == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $gl_ajax == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Activate or deactivate the ajax functionality.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Items Per Page</h4>
																<?php
																	$gl_item_per_page = get_option( 'gl_item_per_page', '5' );
																?>
																<input type="text" id="gl_item_per_page" name="gl_item_per_page" size="6" maxlength="6" value="<?php echo $gl_item_per_page; ?>">
															</td>
															<td class="option-right">
																Define number of items to show each request.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Ajax (on Single)</h4>
																<?php
																	$gl_ajax_single = get_option( 'gl_ajax_single', 'Yes' );
																?>
																<select id="gl_ajax_single" name="gl_ajax_single" style="width: 100%;">
																	<option <?php if ( $gl_ajax_single == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	<option <?php if ( $gl_ajax_single == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															<td class="option-right">
																Activate or deactivate the ajax functionality on gallery single page.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Items Per Page (on Single)</h4>
																<?php
																	$gl_item_per_page_single = get_option( 'gl_item_per_page_single', '5' );
																?>
																<input type="text" id="gl_item_per_page_single" name="gl_item_per_page_single" size="6" maxlength="6" value="<?php echo $gl_item_per_page_single; ?>">
															</td>
															<td class="option-right">
																Define number of items to show each request on gallery single page.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>SlideShow Interval (on Single)</h4>
																<?php
																	$gl_slideshow_interval_single = get_option( 'gl_slideshow_interval_single', '3000' );
																?>
																<input type="text" id="gl_slideshow_interval_single" name="gl_slideshow_interval_single" size="6" maxlength="6" value="<?php echo $gl_slideshow_interval_single; ?>">
															</td>
															<td class="option-right">
																Miliseconds. Default: 3000
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Circular (on Single)</h4>
																<?php
																	$gl_circular_single = get_option( 'gl_circular_single', 'true' );
																?>
																<select id="gl_circular_single" name="gl_circular_single" style="width: 100%;">
																	<option <?php if ( $gl_circular_single == 'true' ) { echo 'selected="selected"'; } ?> value="true">Yes</option>
																	<option <?php if ( $gl_circular_single == 'false' ) { echo 'selected="selected"'; } ?> value="false">No</option>
																</select>
															</td>
															<td class="option-right">
																Circular movement or not.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Next On Click Image (on Single)</h4>
																<?php
																	$gl_next_on_click_image_single = get_option( 'gl_next_on_click_image_single', 'true' );
																?>
																<select id="gl_next_on_click_image_single" name="gl_next_on_click_image_single" style="width: 100%;">
																	<option <?php if ( $gl_next_on_click_image_single == 'true' ) { echo 'selected="selected"'; } ?> value="true">Yes</option>
																	<option <?php if ( $gl_next_on_click_image_single == 'false' ) { echo 'selected="selected"'; } ?> value="false">No</option>
																</select>
															</td>
															<td class="option-right">
																Go to the next image on clicking.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Content Editor</h4>
																
																<?php
																	$gl_content_editor = get_option( 'gl_content_editor', 'Bottom' );
																?>
																<select id="gl_content_editor" name="gl_content_editor" style="width: 100%;">
																	<option <?php if ( $gl_content_editor == 'Top' ) { echo 'selected="selected"'; } ?>>Top</option>
																	<option <?php if ( $gl_content_editor == 'Bottom' ) { echo 'selected="selected"'; } ?>>Bottom</option>
																</select>
															</td>
															
															<td class="option-right">
																Before / after position.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Share Links (on Single)</h4>
																
																<?php
																	$gl_share_links_single = get_option( 'gl_share_links_single', 'No' );
																?>
																<select id="gl_share_links_single" name="gl_share_links_single" style="width: 100%;">
																	<option <?php if ( $gl_share_links_single == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	<option <?php if ( $gl_share_links_single == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Activate or deactivate.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
								
								case 'sidebar' :
								
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										$no_sidebar_name = get_option( 'no_sidebar_name' );
										
										if ( $no_sidebar_name == "" )
										{
											echo '<div class="alert-success" title="Click to close"><p><strong>Enter a text for new sidebar name.</strong></p></div>';
										}
										else
										{
											echo '<div class="alert-success" title="Click to close"><p><strong>Created.</strong></p></div>';
										}
										// end if
									}
									elseif ( esc_attr( @$_GET['deleted'] ) == 'true' )
									{
										delete_option( 'sidebars_with_commas' );
										
										echo '<div class="alert-success" title="Click to close"><p><strong>Deleted.</strong></p></div>';
									}
									// end if
									
									?>
										<div class="postbox">
											<div class="inside">
												<?php
													$wp_admin_url = admin_url( 'themes.php?page=theme-options&tab=sidebar' );
												?>
												
												<form method="post" action="<?php echo $wp_admin_url; ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>New Sidebar</h4>
																
																<input type="text" id="new_sidebar_name" name="new_sidebar_name" required="required" style="width: 100%;" value="">
															</td>
															
															<td class="option-right">
																Enter a text for a new sidebar name.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Create">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															
															<td class="option-right">
																Create new sidebar.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Sidebars</h4>
																
																<select id="sidebars" name="sidebars" style="width: 100%;" size="10" disabled="disabled">
																	<?php
																		$sidebars_with_commas = get_option( 'sidebars_with_commas' );
																	
																		$sidebars = preg_split("/[\s]*[,][\s]*/", $sidebars_with_commas);

																		foreach ( $sidebars as $sidebar_name )
																		{
																			echo '<option>' . $sidebar_name . '</option>';
																		}
																	?>
																</select>
															</td>
															
															<td class="option-right">
																New sidebar name must be different from created sidebar names.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<?php
																	$wp_admin_url = admin_url( 'themes.php?page=theme-options&tab=sidebar&deleted=true' );
																?>
																<a href="<?php echo $wp_admin_url; ?>" class="button button-primary button-large" style="margin-top: 20px;">Delete</a>
															</td>
															
															<td class="option-right">
																Remove.
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
								
								case 'seo' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													<table>
														<tr>
															<td class="option-left">
																<h4>Open Graph Protocol</h4>
																
																<?php
																	$theme_og_protocol = stripcslashes( get_option( 'theme_og_protocol', 'No' ) );
																?>
																<select id="theme_og_protocol" name="theme_og_protocol" style="width: 100%;">
																	<option <?php if ( $theme_og_protocol == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	<option <?php if ( $theme_og_protocol == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															<td class="option-right">
																Enable or disable built-in open graph functionality.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Theme SEO Fields</h4>
																
																<?php
																	$theme_seo_fields = stripcslashes( get_option( 'theme_seo_fields', 'No' ) );
																?>
																<select id="theme_seo_fields" name="theme_seo_fields" style="width: 100%;">
																	<option <?php if ( $theme_seo_fields == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	<option <?php if ( $theme_seo_fields == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															<td class="option-right">
																Enable or disable built-in seo fields.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Description</h4>
																<?php
																	$site_description = stripcslashes( get_option( 'site_description', "" ) );
																?>
																<textarea id="site_description" name="site_description" style="outline: none; width: 100%;" rows="3" cols="50"><?php echo $site_description; ?></textarea>
															</td>
															<td class="option-right">
																Used in front page.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Keywords</h4>
																<?php
																	$site_keywords = stripcslashes( get_option( 'site_keywords', "" ) );
																?>
																<textarea id="site_keywords" name="site_keywords" style="outline: none; width: 100%;" rows="3" cols="50"><?php echo $site_keywords; ?></textarea>
															</td>
															<td class="option-right">
																Separate keywords with commas.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Tracking Code (/head)</h4>
																<?php
																	$tracking_code_head = stripcslashes( get_option( 'tracking_code_head' ) );
																?>
																<textarea id="tracking_code_head" name="tracking_code_head" class="code2" rows="8" cols="50"><?php echo $tracking_code_head; ?></textarea>
															</td>
															<td class="option-right">
																Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing head tag.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<h4>Tracking Code (/body)</h4>
																<?php
																	$tracking_code = stripcslashes( get_option( 'tracking_code' ) );
																?>
																<textarea id="tracking_code" name="tracking_code" class="code2" rows="8" cols="50"><?php echo $tracking_code; ?></textarea>
															</td>
															<td class="option-right">
																Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag.
															</td>
														</tr>
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
								
								case 'contact' :
									
									if ( esc_attr( @$_GET['saved'] ) == 'true' )
									{
										echo '<div class="alert-success" title="Click to close"><p><strong>Saved.</strong></p></div>';
									}
									
									?>
										<div class="postbox">
											<div class="inside">
												<form class="ajax-form" method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
													<?php
														wp_nonce_field( "settings-page" );
													?>
													
													<table>
														<tr>
															<td class="option-left">
																<h4>Contact Form Email Address</h4>
																
																<?php
																	$contact_form_email = stripcslashes( get_option( 'contact_form_email', "" ) );
																?>
																<input type="text" id="contact_form_email" name="contact_form_email" style="width: 100%;" value="<?php echo $contact_form_email; ?>">
															</td>
															
															<td class="option-right">
																Enter which email address will be sent from contact form.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Disable Contact Form</h4>
																
																<?php
																	$disable_contact_form = get_option( 'disable_contact_form', 'No' );
																?>
																<select id="disable_contact_form" name="disable_contact_form" style="width: 100%;">
																	<option <?php if ( $disable_contact_form == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $disable_contact_form == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Deactivate the contact form.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Captcha</h4>
																
																<?php
																	$contact_form_captcha = get_option( 'contact_form_captcha', 'No' );
																?>
																<select id="contact_form_captcha" name="contact_form_captcha" style="width: 100%;">
																	<option <?php if ( $contact_form_captcha == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	<option <?php if ( $contact_form_captcha == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
															</td>
															
															<td class="option-right">
																Activate.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<h4>Show Map</h4>
																
																<?php
																	$enable_map = stripcslashes( get_option( 'enable_map', 'No' ) );
																?>
																<select id="enable_map" name="enable_map" style="width: 100%;">
																	<option <?php if ( $enable_map == 'Yes' ) { echo 'selected="selected"'; } ?>>Yes</option>
																	
																	<option <?php if ( $enable_map == 'No' ) { echo 'selected="selected"'; } ?>>No</option>
																</select>
																
																<h4>Map Embed Code</h4>
																
																<?php
																	$map_embed_code = stripcslashes( get_option( 'map_embed_code', "" ) );
																?>
																<textarea id="map_embed_code" name="map_embed_code" class="code2" rows="7" cols="50"><?php echo $map_embed_code; ?></textarea>
															</td>
															
															<td class="option-right">
																ifarme code.
															</td>
														</tr>
														
														<tr>
															<td class="option-left">
																<input type="submit" name="submit" class="button button-primary button-large" value="Save Changes">
																
																<input type="hidden" name="settings-submit" value="Y">
															</td>
															<td class="option-right">
																
															</td>
														</tr>
													</table>
												</form>
											</div>
											<!-- end .inside -->
										</div>
										<!-- end .postbox -->
									<?php
								break;
							}
							// end tab content
						}
						// end settings page
					?>
				</div>
				<!-- end #poststuff -->
			</div>
			<!-- end .wrap2 -->
		<?php
	}
	// end theme_options_page
	
/* ============================================================================================================================================ */
	
	function theme_save_settings()
	{
		global $pagenow;
		
		if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-options' )
		{
			if ( isset ( $_GET['tab'] ) )
			{
				$tab = $_GET['tab'];
			}
			else
			{
				$tab = 'general';
			}
			
			
			switch ( $tab )
			{
				case 'general' :
					
					update_option( 'logo_type', $_POST['logo_type'] );
					update_option( 'select_text_logo', $_POST['select_text_logo'] );
					update_option( 'theme_site_title', $_POST['theme_site_title'] );
					update_option( 'logo_image', $_POST['logo_image'] );
					update_option( 'select_tagline', $_POST['select_tagline'] );
					update_option( 'theme_tagline', $_POST['theme_tagline'] );
					update_option( 'logo_login', $_POST['logo_login'] );
					update_option( 'logo_login_hide', $_POST['logo_login_hide'] );
					update_option( 'favicon', $_POST['favicon'] );
					update_option( 'apple_touch_icon', $_POST['apple_touch_icon'] );
					update_option( 'copyright_text', $_POST['copyright_text'] );
					
				break;
				
				case 'style' :
					
					update_option( 'char_set_latin', $_POST['char_set_latin'] );
					update_option( 'char_set_latin_ext', $_POST['char_set_latin_ext'] );
					update_option( 'char_set_cyrillic', $_POST['char_set_cyrillic'] );
					update_option( 'char_set_cyrillic_ext', $_POST['char_set_cyrillic_ext'] );
					update_option( 'char_set_greek', $_POST['char_set_greek'] );
					update_option( 'char_set_greek_ext', $_POST['char_set_greek_ext'] );
					update_option( 'char_set_vietnamese', $_POST['char_set_vietnamese'] );
					
					update_option( 'nav_menu_search', $_POST['nav_menu_search'] );
					update_option( 'extra_font_styles', $_POST['extra_font_styles'] );
					update_option( 'footer_widget_locations', $_POST['footer_widget_locations'] );
					update_option( 'footer_widget_columns', $_POST['footer_widget_columns'] );
					update_option( 'mobile_zoom', $_POST['mobile_zoom'] );
					update_option( 'custom_css', $_POST['custom_css'] );
					update_option( 'external_css', $_POST['external_css'] );
					update_option( 'external_js', $_POST['external_js'] );
					
				break;
				
				case 'blog' :
					
					update_option( 'blog_type', $_POST['blog_type'] );
					update_option( 'post_sidebar', $_POST['post_sidebar'] );
					update_option( 'theme_excerpt', $_POST['theme_excerpt'] );
					update_option( 'pagination', $_POST['pagination'] );
					update_option( 'all_formats_homepage', $_POST['all_formats_homepage'] );
					update_option( 'about_the_author_module', $_POST['about_the_author_module'] );
					update_option( 'post_share_links_single', $_POST['post_share_links_single'] );
					
				break;
				
				case 'portfolio' :
					
					update_option( 'pf_ajax', $_POST['pf_ajax'] );
					update_option( 'pf_item_per_page', $_POST['pf_item_per_page'] );
					update_option( 'pf_content_editor', $_POST['pf_content_editor'] );
					update_option( 'pf_share_links_single', $_POST['pf_share_links_single'] );
					
				break;
				
				case 'gallery' :
					
					update_option( 'gl_ajax', $_POST['gl_ajax'] );
					update_option( 'gl_item_per_page', $_POST['gl_item_per_page'] );
					update_option( 'gl_ajax_single', $_POST['gl_ajax_single'] );
					update_option( 'gl_item_per_page_single', $_POST['gl_item_per_page_single'] );
					update_option( 'gl_slideshow_interval_single', $_POST['gl_slideshow_interval_single'] );
					update_option( 'gl_circular_single', $_POST['gl_circular_single'] );
					update_option( 'gl_next_on_click_image_single', $_POST['gl_next_on_click_image_single'] );
					update_option( 'gl_content_editor', $_POST['gl_content_editor'] );
					update_option( 'gl_share_links_single', $_POST['gl_share_links_single'] );
					
				break;
				
				case 'sidebar' :
				
					update_option( 'no_sidebar_name', esc_attr( $_POST['new_sidebar_name'] ) );
					
					if ( esc_attr( $_POST['new_sidebar_name'] ) != "" )
					{
						if ( get_option( 'sidebars_with_commas' ) == "" )
						{
							update_option( 'sidebars_with_commas', esc_attr( $_POST['new_sidebar_name'] ) );
						}
						else
						{
							update_option( 'sidebars_with_commas', get_option( 'sidebars_with_commas' ) . ',' . esc_attr( $_POST['new_sidebar_name'] ) );
						}
					}
				
				break;
				
				case 'seo' :
					
					update_option( 'theme_og_protocol', $_POST['theme_og_protocol'] );
					update_option( 'theme_seo_fields', $_POST['theme_seo_fields'] );
					update_option( 'site_description', $_POST['site_description'] );
					update_option( 'site_keywords', $_POST['site_keywords'] );
					update_option( 'tracking_code_head', $_POST['tracking_code_head'] );
					update_option( 'tracking_code', $_POST['tracking_code'] );
					
				break;
				
				case 'contact' :
					
					update_option( 'map_embed_code', $_POST['map_embed_code'] );
					update_option( 'enable_map', $_POST['enable_map'] );
					update_option( 'contact_form_email', $_POST['contact_form_email'] );
					update_option( 'contact_form_captcha', $_POST['contact_form_captcha'] );
					update_option( 'disable_contact_form', $_POST['disable_contact_form'] );
					
				break;
			}
			// end switch
		}
		// end if
	}
	// end theme_save_settings

/* ============================================================================================================================================ */

	function load_settings_page()
	{
		if ( isset( $_POST["settings-submit"] ) == 'Y' )
		{
			check_admin_referer( "settings-page" );
			
			theme_save_settings();
			
			$url_parameters = isset( $_GET['tab'] ) ? 'tab=' . $_GET['tab'] . '&saved=true' : 'saved=true';
			
			wp_redirect( admin_url( 'themes.php?page=theme-options&' . $url_parameters ) );
			
			exit;
		}
		// end if
	}
	// end load_settings_page

/* ============================================================================================================================================ */

	function my_theme_menu()
	{
		$settings_page = add_theme_page('Theme Options',
										'Theme Options',
										'edit_theme_options',
										'theme-options',
										'theme_options_page' );
		
		add_action( "load-{$settings_page}", 'load_settings_page' );
	}
	
	add_action( 'admin_menu', 'my_theme_menu' );

/* ============================================================================================================================================ */

?>