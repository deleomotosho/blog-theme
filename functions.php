<?php


/* ============================================================================================================================================= */


	function theme_enqueue_login()
	{
		wp_enqueue_script( 'jquery' );
	}
	
	add_action( 'login_enqueue_scripts', 'theme_enqueue_login' );


/* ============================================================================================================================================= */


	function your_admin_enqueue_scripts()
	{
		wp_enqueue_style( 'adminstyle', get_template_directory_uri() . '/admin/adminstyle.css' );
		wp_enqueue_style( 'colorpicker', get_template_directory_uri() . '/admin/colorpicker/colorpicker.css' );
		wp_enqueue_style( 'thickbox' );
		
		
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_script( 'media-upload' );
	}
	
	add_action( 'admin_enqueue_scripts', 'your_admin_enqueue_scripts' );


/* ============================================================================================================================================= */


	function theme_enqueue()
	{
		$extra_char_set = false;
		
		global $subset;
		
		$subset = '&subset=';
		
		
		if ( get_option( 'char_set_latin', false ) ) { $subset .= 'latin,'; $extra_char_set = true; }
		
		if ( get_option( 'char_set_latin_ext', false ) ) { $subset .= 'latin-ext,'; $extra_char_set = true; }
		
		if ( get_option( 'char_set_cyrillic', false ) ) { $subset .= 'cyrillic,'; $extra_char_set = true; }
		
		if ( get_option( 'char_set_cyrillic_ext', false ) ) { $subset .= 'cyrillic-ext,'; $extra_char_set = true; }
		
		if ( get_option( 'char_set_greek', false ) ) { $subset .= 'greek,'; $extra_char_set = true; }
		
		if ( get_option( 'char_set_greek_ext', false ) ) { $subset .= 'greek-ext,'; $extra_char_set = true; }
		
		if ( get_option( 'char_set_vietnamese', false ) ) { $subset .= 'vietnamese,'; $extra_char_set = true; }
		
		if ( $extra_char_set == false ) { $subset = ""; } else { $subset = substr( $subset, 0, -1 ); }
		
		
		// Enqueue style
		wp_enqueue_style( 'unifrakturmaguntia', 'http://fonts.googleapis.com/css?family=UnifrakturMaguntia' . $subset, null, null );
		wp_enqueue_style( 'coustard', 'http://fonts.googleapis.com/css?family=Coustard' . $subset, null, null );
		wp_enqueue_style( 'lora', 'http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' . $subset, null, null );
		wp_enqueue_style( 'print', get_template_directory_uri() . '/css/print.css', null, null, 'print' );
		wp_enqueue_style( 'grid', get_template_directory_uri() . '/css/grid.css', null, null );
		wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', null, null );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', null, null );
		wp_enqueue_style( 'google-code-prettify', get_template_directory_uri() . '/js/google-code-prettify/prettify.css', null, null );
		wp_enqueue_style( 'uniform', get_template_directory_uri() . '/css/uniform.default.css', null, null );
		wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', null, null );
		// wp_enqueue_style( 'mediaelementplayer', get_template_directory_uri() . '/js/mediaelement/mediaelementplayer.css', null, null );
		wp_enqueue_style( 'gamma-gallery', get_template_directory_uri() . '/css/gamma-gallery.css', null, null );
		wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', null, null );
		wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox-1.3.4.css', null, null );
		wp_enqueue_style( 'wp-fix', get_template_directory_uri() . '/css/wp-fix.css', null, null );
		
		
		// Enqueue script
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'detectmobilebrowser', get_template_directory_uri() . '/js/detectmobilebrowser.js', null, null, true );
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', null, null, true );
		wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/jquery.imagesloaded.min.js', null, null, true );
		wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', null, null, true );
		wp_enqueue_script( 'google-code-prettify', get_template_directory_uri() . '/js/google-code-prettify/prettify.js', null, null, true );
		wp_enqueue_script( 'uniform', get_template_directory_uri() . '/js/jquery.uniform.min.js', null, null, true );
		wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', null, null, true );
		// wp_enqueue_script( 'mediaelement-and-player', get_template_directory_uri() . '/js/mediaelement/mediaelement-and-player.min.js', null, null, true );
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', null, null, true );
		wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox-1.3.4.pack.js', null, null, true );
		wp_deregister_script( 'masonry' );
		wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/jquery.masonry.min.js', null, null, true );
		wp_enqueue_script( 'history', get_template_directory_uri() . '/js/jquery.history.js', null, null, true );
		wp_enqueue_script( 'js-url', get_template_directory_uri() . '/js/js-url.min.js', null, null, true );
		wp_enqueue_script( 'jquerypp-custom', get_template_directory_uri() . '/js/jquerypp.custom.js', null, null, true );
		wp_enqueue_script( 'gamma', get_template_directory_uri() . '/js/gamma.js', null, null, true );
		wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', null, null, true );
		wp_enqueue_script( 'validate', get_template_directory_uri() . '/js/jquery.validate.min.js', null, null, true );
		wp_enqueue_script( 'send-mail', get_template_directory_uri() . '/js/send-mail.js', null, null, true );
	}


/* ============================================================================================================================================= */


	function my_theme_setup()
	{
		add_action( 'wp_enqueue_scripts', 'theme_enqueue' );
		
		$lang_dir = get_template_directory() . '/languages';
		
		load_theme_textdomain( 'read', $lang_dir ); 
		
		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		
		if ( is_readable( $locale_file ) )
		{
			require_once( $locale_file );
		}
	}
	
	add_action( 'after_setup_theme', 'my_theme_setup' );
	
/* ============================================================================================================================================= */

	function theme_style_css()
	{
		?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>">

		<?php
	}
	
	add_action( 'wp_head', 'theme_style_css' );

/* ============================================================================================================================================= */

	function theme_favicons()
	{
		$favicon = get_option( 'favicon', "" );
		
		if ( $favicon != "" )
		{
			?>

<link rel="shortcut icon" href="<?php echo $favicon; ?>">

			<?php
		}
		
		
		$apple_touch_icon = get_option( 'apple_touch_icon', "" );
		
		if ( $apple_touch_icon != "" )
		{
			?>

<link rel="apple-touch-icon-precomposed" href="<?php echo $apple_touch_icon; ?>">

			<?php
		}
	}
	
	add_action( 'wp_head', 'theme_favicons' );
	
	add_action( 'admin_head', 'theme_favicons' );
	
	add_action( 'login_head', 'theme_favicons' );

/* ============================================================================================================================================= */

	function custom_login_logo_url( $url )
	{
		return get_bloginfo( 'url' );
	}
	
	
	function theme_login_logo()
	{
		$logo_login_hide = get_option( 'logo_login_hide', false );
		$logo_login = get_option( 'logo_login', "" );
		
		if ( $logo_login_hide )
		{
			echo '<style type="text/css"> h1 { display: none; } </style>';
		}
		else
		{
			if ( $logo_login != "" )
			{
				add_filter( 'login_headerurl', 'custom_login_logo_url' );
				
				echo '<style type="text/css">
						h1 a
						{
							background-image: url( "' . $logo_login . '" ) !important;
							cursor: default;
						}
					</style>';
				
				echo '<script>
						jQuery(document).ready(function($)
						{
							$( "h1 a" ).removeAttr( "title" );
						});
					</script>';
			}
		}
	}
	
	add_action( 'login_head', 'theme_login_logo' );

/* ============================================================================================================================================= */

	function theme_wp_title( $title, $sep )
	{
		global $paged, $page;

		if ( is_feed() )
		{
			return $title;
		}

		$title .= get_bloginfo( 'name' );
		
		$site_description = get_bloginfo( 'description', 'display' );
		
		if ( $site_description && ( is_home() || is_front_page() ) )
		{
			$title = "$title $sep $site_description";
		}
		
		if ( $paged >= 2 || $page >= 2 )
		{
			$title = "$title $sep " . sprintf( __( 'Page %s', 'read' ), max( $paged, $page ) );
		}
		
		return $title;
	}
	
	add_filter( 'wp_title', 'theme_wp_title', 10, 2 );

/* ============================================================================================================================================= */

	if ( function_exists( 'add_theme_support' ) )
	{
		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
		
		add_theme_support( 'post-thumbnails', array( 'post', 'portfolio', 'gallery' ) );
		
		add_theme_support( 'automatic-feed-links' );
	}

/* ============================================================================================================================================= */

	add_editor_style( 'custom-editor-style.css' );

/* ============================================================================================================================================= */

	if ( ! isset( $content_width ) )
	{
		$content_width = 780;
	}

/* ============================================================================================================================================= */

	if ( function_exists( 'add_image_size' ) )
	{
		add_image_size( 'featured_image', 150 );
		
		add_image_size( 'blog_feat_img', 1200 );
		
		add_image_size( 'portfolio_image_1x', 400 );
		add_image_size( 'portfolio_image_2x', 800 );
		
		add_image_size( 'gallery_image_1x', 400 );
		add_image_size( 'gallery_image_2x', 800 );
		
		add_image_size( 'gallery_image_200', 200 );
		add_image_size( 'gallery_image_400', 400 );
		add_image_size( 'gallery_image_800', 800 );
		add_image_size( 'gallery_image_1200', 1200 );
		
		add_image_size( 'apple_touch_icon_57', 57, 57, true );
		add_image_size( 'apple_touch_icon_72', 72, 72, true );
		add_image_size( 'apple_touch_icon_114', 114, 114, true );
		add_image_size( 'apple_touch_icon_144', 144, 144, true );
	}
	// end if

/* ============================================================================================================================================= */

	function theme_new_post_column_add( $columns )
	{
		return array_merge( $columns, array( 'post_feat_img' => __( 'Featured Image', 'read' ) ) );
	}
	
	add_filter( 'manage_posts_columns' , 'theme_new_post_column_add' );
	
	
	function theme_new_post_column_show( $column, $post_id )
	{
		if ( $column == 'post_feat_img' )
		{
			if ( has_post_thumbnail() )
			{
				the_post_thumbnail( 'thumbnail' );
			}
		}
	}
	
	add_action( 'manage_posts_custom_column' , 'theme_new_post_column_show', 10, 2 );

/* ============================================================================================================================================= */

	if ( function_exists( 'register_nav_menus' ) )
	{
		register_nav_menus( array(  'top_menu' => __( 'Navigation Menu', 'read' ) ) );
	}
	
	
	function wp_page_menu2( $args = array() )
	{
		$defaults = array(  'sort_column' => 'menu_order, post_title',
							'menu_class' => 'menu',
							'echo' => true,
							'link_before' => "",
							'link_after' => "" );
							
		$args = wp_parse_args( $args, $defaults );
		$args = apply_filters( 'wp_page_menu_args', $args );
		
		$menu = "";
		
		$list_args = $args;
		
		// Show Home in the menu
		if ( ! empty( $args['show_home'] ) )
		{
			if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			{
				$text = __( 'Home', 'read' );
			}
			else
			{
				$text = $args['show_home'];
			}
			
			$class = "";
			
			if ( is_front_page() && !is_paged() )
			{
				$class = 'class="current_page_item"';
			}
			
			$menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '" title="' . esc_attr( $text ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
			
			// If the front page is a page, add it to the exclude list
			if ( get_option( 'show_on_front' ) == 'page' )
			{
				if ( ! empty( $list_args['exclude'] ) )
				{
					$list_args['exclude'] .= ',';
				}
				else
				{
					$list_args['exclude'] = '';
				}
				
				$list_args['exclude'] .= get_option('page_on_front');
			}
			// end if
		}
		// end if
		
		$list_args['echo'] = false;
		$list_args['title_li'] = "";
		$menu .= str_replace( array( "\r", "\n", "\t" ), "", wp_list_pages( $list_args ) );
		
		if ( $menu )
		{
			$menu = '<ul class="menu-default">' . $menu . '</ul>';
		}
		
		$menu = $menu . "\n";
		$menu = apply_filters( 'wp_page_menu', $menu, $args );
		
		if ( $args['echo'] )
		{
			echo $menu;
		}
		else
		{
			return $menu;
		}
		// end if
	}
	//end wp_page_menu2


/* ============================================================================================================================================= */


	function theme_excerpt_more( $more )
	{
		return '... <a class="more-link" href="'. get_permalink( get_the_ID() ) . '">' . __( 'Continue reading <span class="meta-nav">&#8594;</span>', 'read' ) . '</a>';
	}
	
	add_filter( 'excerpt_more', 'theme_excerpt_more' );


/* ============================================================================================================================================= */


	if ( function_exists( 'register_sidebar' ) )
	{
		register_sidebar( array('name' => __( 'Blog Sidebar', 'read' ),
								'id' => 'blog_sidebar',
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget' => '</aside>',
								'before_title' => '<h3 class="widget-title">',
								'after_title' => '</h3>' ) );
								
								
		register_sidebar( array('name' => __( 'Page Sidebar', 'read' ),
								'id' => 'page_sidebar',
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget' => '</aside>',
								'before_title' => '<h3 class="widget-title">',
								'after_title' => '</h3>' ) );
								
								
		register_sidebar( array('name' => __( 'Header Social Icons', 'read' ),
								'id' => 'header_sidebar',
								'description'   => 'Use social media shortcodes with the Text widget in this widget location to add icons to your header.',
								'before_widget' => "",
								'after_widget' => "",
								'before_title' => '<span style="display: none;">',
								'after_title' => '</span>' ) );
								
								
		register_sidebar( array('name' => __( 'Footer 1', 'read' ),
								'id' => 'footer_1',
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget' => '</aside>',
								'before_title' => '<h3 class="widget-title">',
								'after_title' => '</h3>' ) );
								
								
		register_sidebar( array('name' => __( 'Footer 2', 'read' ),
								'id' => 'footer_2',
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget' => '</aside>',
								'before_title' => '<h3 class="widget-title">',
								'after_title' => '</h3>' ) );
								
								
		register_sidebar( array('name' => __( 'Footer 3', 'read' ),
								'id' => 'footer_3',
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget' => '</aside>',
								'before_title' => '<h3 class="widget-title">',
								'after_title' => '</h3>' ) );
								
								
		register_sidebar( array('name' => __( 'Footer 4', 'read' ),
								'id' => 'footer_4',
								'before_widget' => '<aside id="%1$s" class="widget %2$s">',
								'after_widget' => '</aside>',
								'before_title' => '<h3 class="widget-title">',
								'after_title' => '</h3>' ) );
								
								
		$sidebars_with_commas = get_option( 'sidebars_with_commas' );

		if ( $sidebars_with_commas != "" )
		{
			$sidebars = preg_split("/[\s]*[,][\s]*/", $sidebars_with_commas);

			foreach ( $sidebars as $sidebar_name )
			{
				register_sidebar(array( 'name' => $sidebar_name,
										'id' => $sidebar_name,
										'before_widget' => '<aside id="%1$s" class="widget %2$s">',
										'after_widget' => '</aside>',
										'before_title' => '<h3 class="widget-title">',
										'after_title' => '</h3>' ) );
			}
		}
	}


/* ============================================================================================================================================= */


	function my_meta_box_sidebar()
	{
		global $post, $post_ID;
		
		?>
			<div class="admin-inside-box">
				<input type="hidden" name="my_meta_box_sidebar_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
				
				
				<h4>Select Sidebar</h4>
				
				<p>
					<?php
						$my_sidebar = get_option( $post->ID . 'my_sidebar', 'page_sidebar' );
					?>
					<select id="my_sidebar" name="my_sidebar" class="widefat">
						<option <?php if ( $my_sidebar == 'page_sidebar' ) { echo 'selected="selected"'; } ?> value="page_sidebar"><?php echo __( 'Page Sidebar', 'read' ); ?></option>
						
						<option <?php if ( $my_sidebar == 'blog_sidebar' ) { echo 'selected="selected"'; } ?> value="blog_sidebar"><?php echo __( 'Blog Sidebar', 'read' ); ?></option>
						
						<?php
							$sidebars_with_commas = get_option( 'sidebars_with_commas' );
							
							if ( $sidebars_with_commas != "" )
							{
								$sidebars = preg_split( "/[\s]*[,][\s]*/", $sidebars_with_commas );

								foreach ( $sidebars as $sidebar_name )
								{
									$selected = "";
									
									if ( $my_sidebar == $sidebar_name )
									{
										$selected = 'selected="selected"';
									}
									
									echo '<option ' . $selected . ' value="' . $sidebar_name . '">' . $sidebar_name . '</option>';
								}
							}
						?>
					</select>
				</p>
				
				
				<p class="howto">
					- Page with Sidebar template must be selected.<br><br>- To create a new sidebar go to:<br>Theme Options > Sidebar.
				</p>
			</div>
		<?php
	}
	
	function my_add_meta_box_sidebar()
	{
		add_meta_box( 'my_meta_box_sidebar_page', __( 'Sidebar', 'read' ), 'my_meta_box_sidebar', 'page', 'side', 'low' );
	}
	
	add_action( 'admin_init', 'my_add_meta_box_sidebar' );
	
	
	function my_save_meta_box_sidebar( $post_id )
	{
		global $post, $post_ID;
		
		if ( ! wp_verify_nonce( @$_POST['my_meta_box_sidebar_nonce'], basename(__FILE__) ) )
		{
			return $post_id;
		}
		
		
		if ( $_POST['post_type'] == 'page' )
		{
			if ( !current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( !current_user_can( 'edit_post', $post_id ) )
			
			return $post_id;
		}
		
		
		if ( $_POST['post_type'] == 'page' )
		{
			update_option( $post->ID . 'my_sidebar', $_POST['my_sidebar'] );
		}
	}
	
	add_action( 'save_post', 'my_save_meta_box_sidebar' );


/* ============================================================================================================================================= */


	function my_meta_box_hide_post_title()
	{
		global $post, $post_ID;
		
		?>
			<div class="admin-inside-box">
				<input type="hidden" name="my_meta_box_hide_post_title_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
				
				<p>
					<?php
						$hide_post_title = get_option( $post->ID . 'hide_post_title', false );
						
						if ( $hide_post_title )
						{
							$hide_post_title_out = 'checked="checked"';
						}
						else
						{
							$hide_post_title_out = "";
						}
						// end if
					?>
					<label for="hide_post_title"><input type="checkbox" id="hide_post_title" name="hide_post_title" <?php echo $hide_post_title_out; ?>> Hide title</label>
				</p>
			</div>
			<!-- end .admin-inside-box -->
		<?php
	}
	// end my_meta_box_hide_post_title
	
	function my_add_meta_box_hide_post_title()
	{
		add_meta_box( 'my_meta_box_hide_post_title', __( 'Title Visibility', 'read' ), 'my_meta_box_hide_post_title', 'post', 'side', 'high' );
	}
	
	add_action( 'admin_init', 'my_add_meta_box_hide_post_title' );
	
	
	function my_save_meta_box_hide_post_title( $post_id )
	{
		global $post, $post_ID;
		
		if ( ! wp_verify_nonce( @$_POST['my_meta_box_hide_post_title_nonce'], basename(__FILE__) ) )
		{
			return $post_id;
		}
		
		
		if ( $_POST['post_type'] == 'post' )
		{
			if ( !current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( !current_user_can( 'edit_post', $post_id ) )
			
			return $post_id;
		}
		
		
		if ( $_POST['post_type'] == 'post' )
		{
			update_option( $post->ID . 'hide_post_title', $_POST['hide_post_title'] );
		}
	}
	// end my_save_meta_box_hide_post_title
	
	add_action( 'save_post', 'my_save_meta_box_hide_post_title' );

/* ============================================================================================================================================= */
	
	$theme_seo_fields = get_option( 'theme_seo_fields', 'No' );
	
	
	function my_meta_box_seo()
	{
		global $post, $post_ID;
		
		?>
			<div class="admin-inside-box">
				<input type="hidden" name="my_meta_box_seo_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
				
				<p>
					<label for="my_seo_description"><?php echo __( 'Description', 'read' ); ?></label>
					
					<?php
						$my_seo_description = stripcslashes( get_option( $post->ID . 'my_seo_description' ) );
					?>
					<textarea id="my_seo_description" name="my_seo_description" rows="4" cols="46" class="widefat"><?php echo $my_seo_description; ?></textarea>
				</p>
				<p>
					<label for="my_seo_keywords"><?php echo __( 'Keywords', 'read' ); ?></label>
					
					<?php
						$my_seo_keywords = stripcslashes( get_option( $post->ID . 'my_seo_keywords' ) );
					?>
					<textarea id="my_seo_keywords" name="my_seo_keywords" rows="4" cols="46" class="widefat"><?php echo $my_seo_keywords; ?></textarea>
				</p>
				
				<p class="howto"><?php echo __( 'Separate keywords with commas', 'read' ); ?></p>
			</div>
			<!-- end .admin-inside-box -->
		<?php
	}
	// end my_meta_box_seo
	
	
	function my_add_meta_box_seo()
	{
		add_meta_box( 'my_meta_box_seo_post', __( 'SEO', 'read' ), 'my_meta_box_seo', 'post', 'side', 'low' );
		add_meta_box( 'my_meta_box_seo_page', __( 'SEO', 'read' ), 'my_meta_box_seo', 'page', 'side', 'low' );
		
		$args = array( '_builtin' => false );
		$post_types = get_post_types( $args ); 
		
		foreach ( $post_types as $post_type )
		{
			add_meta_box( 'my_meta_box_seo_' . $post_type, __( 'SEO', 'read' ), 'my_meta_box_seo', $post_type, 'side', 'low' );
		}
	}
	// end my_add_meta_box_seo
	
	if ( $theme_seo_fields == 'Yes' )
	{
		add_action( 'admin_init', 'my_add_meta_box_seo' );
	}
	
	
	function my_save_meta_box_seo( $post_id )
	{
		global $post, $post_ID;
		
		if ( ! wp_verify_nonce( @$_POST['my_meta_box_seo_nonce'], basename(__FILE__) ) )
		{
			return $post_id;
		}
		
		update_option( $post->ID . 'my_seo_description', $_POST['my_seo_description'] );
		update_option( $post->ID . 'my_seo_keywords', $_POST['my_seo_keywords'] );
	}
	// end my_save_meta_box_seo
	
	if ( $theme_seo_fields == 'Yes' )
	{
		add_action( 'save_post', 'my_save_meta_box_seo' );
	}
	
	
	function my_seo_wp_head()
	{
		global $post, $post_ID;
		
		
		if ( is_singular() )
		{
			$my_seo_description = stripcslashes( get_option( $post->ID . 'my_seo_description', "" ) );
			$my_seo_keywords = stripcslashes( get_option( $post->ID . 'my_seo_keywords', "" ) );
			
			
			if ( $my_seo_description != "" )
			{
				echo "\n" . '<meta name="description" content="' . $my_seo_description . '">' . "\n";
			}
			
			if ( $my_seo_keywords != "" )
			{
				echo '<meta name="keywords" content="' . $my_seo_keywords . '">' . "\n";
			}
		}
		else
		{
			$site_description = stripcslashes( get_option( 'site_description', "" ) );
			$site_keywords = stripcslashes( get_option( 'site_keywords', "" ) );
			
			
			if ( $site_description != "" )
			{
				echo "\n" . '<meta name="description" content="' . $site_description . '">' . "\n";
			}
			
			if ( $site_keywords != "" )
			{
				echo '<meta name="keywords" content="' . $site_keywords . '">' . "\n";
			}
		}
		// end if
	}
	// end my_seo_wp_head
	
	if ( $theme_seo_fields == 'Yes' )
	{
		add_action( 'wp_head', 'my_seo_wp_head' );
	}

/* ============================================================================================================================================= */

	function og_description_max_charlength( $charlength )
	{
		$excerpt = get_post_field( 'post_content', get_the_ID(), 'attribute' );
		$charlength++;
		
		if ( mb_strlen( $excerpt ) > $charlength )
		{
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			
			if ( $excut < 0 )
			{
				return mb_substr( $subex, 0, $excut );
			}
			else
			{
				return $subex;
			}
			
			return '[...]';
		}
		else
		{
			return $excerpt;
		}
	}
	
	
	function theme_open_graph_protocol()
	{
		if ( is_singular() )
		{
			$og_description = og_description_max_charlength( 140 );
			
			$og_title = get_the_title();
			
			$og_image_url = "";
			
			if ( has_post_thumbnail() )
			{
				$og_image_source = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
				
				$og_image_url = $og_image_source[0];
			}
			
			
			if ( $og_image_url != "" )
			{
				echo "\n" . '<meta property="og:image" content="' . $og_image_url . '">' . "\n";
			}
			
			
			if ( $og_title != "" )
			{
				echo '<meta property="og:title" content="' . $og_title . '">' . "\n";
			}
			
			
			if ( $og_description != "" )
			{
				echo '<meta property="og:description" content="' . $og_description . '">' . "\n\n";
			}
		}
	}
	
	
	$theme_og_protocol = get_option( 'theme_og_protocol', 'No' );
	
	if ( $theme_og_protocol == 'Yes' )
	{
		add_action( 'wp_head', 'theme_open_graph_protocol' );
	}

/* ============================================================================================================================================= */

	if ( ! function_exists( 'theme_comments' ) ) :
	
		/*
			Template for comments and pingbacks.
			
			To override this walker in a child theme without modifying the comments template
			simply create your own theme_comments(), and that function will be used instead.
			
			Used as a callback by wp_list_comments() for displaying the comments.
		*/
		
		function theme_comments( $comment, $args, $depth )
		{
			$GLOBALS['comment'] = $comment;
			
			switch ( $comment->comment_type ) :
			
				case 'pingback' :
				
				case 'trackback' :
					
					// Display trackbacks differently than normal comments.
					?>
						<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
							<p>
								<?php
									_e( 'Pingback:', 'read' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'read' ), '<span class="edit-link">', '</span>' );
								?>
							</p>
					<?php
				break;
				
				default :
				
					// Proceed with normal comments.
					global $post;
					
					?>
					
					<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
						<article id="comment-<?php comment_ID(); ?>" class="comment">
							<header class="comment-meta comment-author vcard">
								<?php
									echo get_avatar( $comment, 75 );
									
									printf( '<cite class="fn">%1$s %2$s</cite>',
											get_comment_author_link(),
											// If current post author is also comment author, make it known visually.
											( $comment->user_id === $post->post_author ) ? '<span></span>' : "" );
									
									printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
											esc_url( get_comment_link( $comment->comment_ID ) ),
											get_comment_time( 'c' ),
											/* translators: 1: date, 2: time */
											sprintf( __( '%1$s at %2$s', 'read' ), get_comment_date(), get_comment_time() ) );
								?>
							</header>
							<!-- end .comment-meta -->
							
							<?php
								if ( '0' == $comment->comment_approved ) :
									?>
										<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'read' ); ?></p>
									<?php
								endif;
							?>
							
							<section class="comment-content comment">
								<?php
									comment_text();
								?>
								
								<?php
									edit_comment_link( __( 'Edit', 'read' ), '<p class="edit-link">', '</p>' );
								?>
							</section>
							<!-- end .comment-content -->
							
							<div class="reply">
								<?php
									comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'read' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
								?>
							</div>
							<!-- end .reply -->
						</article>
						<!-- end #comment-## -->
					<?php
				break;
				
			endswitch;
		}
		// end theme_comments
		
	endif;

/* ============================================================================================================================================= */

	function create_post_type_portfolio()
	{
		$labels = array('name' => __( 'Portfolio', 'read' ),
						'singular_name' => __( 'Portfolio Item', 'read' ),
						'add_new' => __( 'Add New', 'read' ),
						'add_new_item' => __( 'Add New', 'read' ),
						'edit_item' => __( 'Edit', 'read' ),
						'new_item' => __( 'New', 'read' ),
						'all_items' => __( 'All', 'read' ),
						'view_item' => __( 'View', 'read' ),
						'search_items' => __( 'Search', 'read' ),
						'not_found' =>  __( 'No Items found', 'read' ),
						'not_found_in_trash' => __( 'No Items found in Trash', 'read' ),
						'parent_item_colon' => '',
						'menu_name' => 'Portfolio' );
		
		$args = array(  'labels' => $labels,
						'public' => true,
						'exclude_from_search' => false,
						'publicly_queryable' => true,
						'show_ui' => true,
						'query_var' => true,
						'show_in_nav_menus' => true,
						'capability_type' => 'post',
						'hierarchical' => false,
						'menu_position' => 5,
						'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
						'rewrite' => array( 'slug' => 'portfolio', 'with_front' => false ));
					
		register_post_type( 'portfolio' , $args );
	}
	// end create_post_type_portfolio
	
	add_action( 'init', 'create_post_type_portfolio' );
	
	
	function portfolio_updated_messages( $messages )
	{
		global $post, $post_ID;
		
		$messages['portfolio'] = array( 0 => "", // Unused. Messages start at index 1.
										1 => sprintf( __( '<strong>Updated.</strong> <a target="_blank" href="%s">View</a>', 'read' ), esc_url( get_permalink( $post_ID) ) ),
										2 => __( 'Custom field updated.', 'read' ),
										3 => __( 'Custom field deleted.', 'read' ),
										4 => __( 'Updated.', 'read' ),
										// translators: %s: date and time of the revision
										5 => isset( $_GET['revision'] ) ? sprintf( __( 'Restored to revision from %s', 'read' ), wp_post_revision_title( ( int ) $_GET['revision'], false ) ) : false,
										6 => sprintf( __( '<strong>Published.</strong> <a target="_blank" href="%s">View</a>', 'read' ), esc_url( get_permalink( $post_ID) ) ),
										7 => __( 'Saved.', 'read' ),
										8 => sprintf( __( 'Submitted. <a target="_blank" href="%s">Preview</a>', 'read' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
										9 => sprintf( __( 'Scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview</a>', 'read' ),
										// translators: Publish box date format, see http://php.net/date
										date_i18n( __( 'M j, Y @ G:i', 'read' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID) ) ),
										10 => sprintf( __( '<strong>Item draft updated.</strong> <a target="_blank" href="%s">Preview</a>', 'read' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID) ) ) ) );
	
		return $messages;
	}
	// end portfolio_updated_messages
	
	add_filter( 'post_updated_messages', 'portfolio_updated_messages' );
	
	
	function portfolio_columns( $pf_columns )
	{
		$pf_columns = array('cb' => '<input type="checkbox">',
							'title' => __( 'Title', 'read' ),
							'pf_featured_image' => __( 'Featured Image', 'read' ),
							'departments' => __( 'Departments', 'read' ),
							'pf_short_description' => __( 'Short Description', 'read' ),
							'portfolio_type' => __( 'Type', 'read' ),
							'comments' => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
							'date' => __( 'Date', 'read' ) );
		
		return $pf_columns;
	}
	// end portfolio_columns
	
	add_filter( 'manage_edit-portfolio_columns', 'portfolio_columns' );
	
	
	function portfolio_custom_columns( $pf_column )
	{
		global $post, $post_ID;
		
		switch ( $pf_column )
		{
			case 'pf_featured_image':
			
				if ( has_post_thumbnail() )
				{
					the_post_thumbnail( 'thumbnail' );
				}
				
			break;
			
			case 'departments':
			
				$taxon = 'department';
				$terms_list = get_the_terms( $post_ID, $taxon );
				
				if ( ! empty( $terms_list ) )
				{
					$out = array();
					
					foreach ( $terms_list as $term_list )
					{
						$out[] = '<a href="edit.php?post_type=portfolio&department=' .$term_list->slug .'">' .$term_list->name .' </a>';
					}
					
					echo join( ', ', $out );
				}
				
			break;
			
			case 'pf_short_description':
			
				$pf_short_description = stripcslashes( get_option( $post->ID . 'pf_short_description', "" ) );
				
				echo $pf_short_description;
				
			break;
			
			case 'portfolio_type':
			
				$pf_type = get_option( $post->ID . 'pf_type', 'Standard' );
				
				if ( $pf_type == 'Lightbox Image' )
				{
					echo 'Lightbox Gallery';
				}
				else
				{
					echo $pf_type;
				}
				
			break;
		}
		// end switch
	}
	// end portfolio_custom_columns
	
	add_action( 'manage_posts_custom_column',  'portfolio_custom_columns' );
	
	
	function portfolio_taxonomy()
	{
		$labels_dep = array('name' => __( 'Departments', 'read' ),
							'singular_name' => __( 'Department', 'read' ),
							'search_items' =>  __( 'Search', 'read' ),
							'all_items' => __( 'All', 'read' ),
							'parent_item' => __( 'Parent Department', 'read' ),
							'parent_item_colon' => __( 'Parent Department:', 'read' ),
							'edit_item' => __( 'Edit', 'read' ),
							'update_item' => __( 'Update', 'read' ),
							'add_new_item' => __( 'Add New', 'read' ),
							'new_item_name' => __( 'New Department Name', 'read' ),
							'menu_name' => __( 'Departments', 'read' ) );

		register_taxonomy(  'department',
							array( 'portfolio' ),
							array( 'hierarchical' => true,
							'labels' => $labels_dep,
							'show_ui' => true,
							'public' => true,
							'query_var' => true,
							'rewrite' => array( 'slug' => 'department' ) ) );
							
							
		$labels_tag = array('name' => __( 'Portfolio Tags', 'read' ),
							'singular_name' => __( 'Portfolio Tag', 'read' ),
							'search_items' =>  __( 'Search', 'read' ),
							'all_items' => __( 'All', 'read' ),
							'parent_item' => __( 'Parent Portfolio Tag', 'read' ),
							'parent_item_colon' => __( 'Parent Portfolio Tag:', 'read' ),
							'edit_item' => __( 'Edit', 'read' ),
							'update_item' => __( 'Update', 'read' ),
							'add_new_item' => __( 'Add New', 'read' ),
							'new_item_name' => __( 'New Portfolio Tag Name', 'read' ),
							'menu_name' => __( 'Portfolio Tags', 'read' ) );

		register_taxonomy(  'portfolio_tags',
							array( 'portfolio' ),
							array( 'hierarchical' => false,
							'labels' => $labels_tag,
							'show_ui' => true,
							'public' => true,
							'query_var' => true,
							'rewrite' => array( 'slug' => 'portfolio_tags' ) ) );
	}
	// end portfolio_taxonomy
	
	add_action( 'init', 'portfolio_taxonomy' );
	
	
	function only_show_departments()
	{
		global $typenow;
		
		if ( $typenow == 'portfolio' )
		{
			$filters = array( 'department' );
			
			foreach ( $filters as $tax_slug )
			{
				$tax_obj = get_taxonomy( $tax_slug );
				$tax_name = $tax_obj->labels->name;
				$terms = get_terms( $tax_slug );
			
				echo '<select name="' .$tax_slug .'" id="' .$tax_slug .'" class="postform">';
				echo '<option value="">' . __( 'Show All', 'read' ) . ' ' .$tax_name .'</option>';
				
				foreach ( $terms as $term )
				{
					echo '<option value='. $term->slug, @$_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
				}
				
				echo '</select>';
			}
			// end foreach
		}
		// end if
	}
	// end only_show_departments

	add_action( 'restrict_manage_posts', 'only_show_departments' );
	
	
	function portfolio_metabox()
	{
		global $post, $post_ID;
		
		?>
			<p>
				<input type="hidden" name="portfolio_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
			</p>
			
			<h4><?php echo __( 'Type', 'read' ); ?></h4>
			
			<p class="pf-type-wrap">
				<?php
					$pf_type = get_option( $post->ID . 'pf_type', 'Standard' );
				?>
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Standard' ) { echo 'checked="checked"'; } ?> value="Standard"> <?php echo __( 'Standard', 'read' ); ?>
				</label>
				<br>
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Featured Image' ) { echo 'checked="checked"'; } ?> value="Lightbox Featured Image"> <?php echo __( 'Lightbox Featured Image', 'read' ); ?>
				</label>
				<br>
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Image' ) { echo 'checked="checked"'; } ?> value="Lightbox Image"> <?php echo __( 'Lightbox Gallery', 'read' ); ?>
				</label>
				<br>
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Video' ) { echo 'checked="checked"'; } ?> value="Lightbox Video"> <?php echo __( 'Lightbox Video', 'read' ); ?>
				</label>
				<br>
				<label style="display: inline-block; margin-bottom: 5px;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Lightbox Audio' ) { echo 'checked="checked"'; } ?> value="Lightbox Audio"> <?php echo __( 'Lightbox Audio', 'read' ); ?>
				</label>
				<br>
				<label style="display: inline-block;">
					<input type="radio" name="pf_type" <?php if ( $pf_type == 'Direct URL' ) { echo 'checked="checked"'; } ?> class="pf-type-direct-url" value="Direct URL"> <?php echo __( 'Direct URL', 'read' ); ?>
				</label>
			</p>
			
			<p class="direct-url-wrap" style="<?php if ( $pf_type == 'Direct URL' ) { echo 'display: block;'; } else { echo 'display: none;'; } ?>">
				<?php
					$pf_direct_url = stripcslashes( get_option( $post->ID . 'pf_direct_url' ) );
					$pf_link_new_tab = get_option( $post->ID . 'pf_link_new_tab', true );
				?>
				<label for="pf_direct_url"><?php echo __( 'Direct URL:', 'read' ); ?></label>
				<input type="text" id="pf_direct_url" name="pf_direct_url" class="widefat code2" placeholder="Link Url" value="<?php echo $pf_direct_url; ?>">
				<label style="display: inline-block; margin-top: 5px;"><input type="checkbox" id="pf_link_new_tab" name="pf_link_new_tab" <?php if ( $pf_link_new_tab ) { echo 'checked="checked"'; } ?>> <?php echo __( 'Open link in new tab', 'read' ); ?></label>
			</p>
			
			<script>
				jQuery(document).ready(function($)
				{
					jQuery( '.pf-type-wrap label' ).click(function()
					{
						if ( jQuery( this ).find( 'input' ).hasClass( 'pf-type-direct-url' ) )
						{
							jQuery( '.direct-url-wrap' ).show();
						}
						else
						{
							jQuery( '.direct-url-wrap' ).hide();
						}
					});
				});
			</script>
			
			<hr>
			
			<h4><?php echo __( 'Thumbnail Size', 'read' ); ?></h4>
			
			<p>
				<?php
					$pf_thumb_size = get_option( $post->ID . 'pf_thumb_size', 'x1' );
				?>
				<label style="display: inline-block; margin-bottom: 5px;"><input type="radio" name="pf_thumb_size" <?php if ( $pf_thumb_size == 'x1' ) { echo 'checked="checked"'; } ?> value="x1"> <?php echo __( '1x', 'read' ); ?></label>
				<br>
				<label style="display: inline-block; margin-bottom: 5px;"><input type="radio" name="pf_thumb_size" <?php if ( $pf_thumb_size == 'x2' ) { echo 'checked="checked"'; } ?> value="x2"> <?php echo __( '2x', 'read' ); ?></label>
			</p>
			
			<hr>
			
			<h4><?php echo __( 'Short Description', 'read' ); ?></h4>
			
			<p>
				<?php
					$pf_short_description = stripcslashes( get_option( $post->ID . 'pf_short_description' ) );
				?>
				<textarea id="pf_short_description" name="pf_short_description" rows="4" cols="46" class="widefat"><?php echo $pf_short_description; ?></textarea>
			</p>
		<?php
	}
	// end portfolio_metabox
	
	
	function add_portfolio_metabox()
	{
		add_meta_box( 'portfolio_metabox', __( 'Details', 'read' ), 'portfolio_metabox', 'portfolio', 'side', 'low' );
	}
	// end add_portfolio_metabox
	
	add_action( 'admin_init', 'add_portfolio_metabox' );
	
	
	function save_portfolio_details( $post_id )
	{
		global $post, $post_ID;
	
		if ( ! wp_verify_nonce( @$_POST['portfolio_nonce'], basename(__FILE__) ) )
		{
			return $post_id;
		}

		
		if ( $_POST['post_type'] == 'portfolio' )
		{
			if ( ! current_user_can( 'edit_page', $post_id ) )
			{
				return $post_id;
			}
		}
		else
		{
			if ( ! current_user_can( 'edit_post', $post_id ) )
			{
				return $post_id;
			}
		}
		
	
		if ( $_POST['post_type'] == 'portfolio' )
		{
			update_option( $post->ID . 'pf_type', $_POST['pf_type'] );
			update_option( $post->ID . 'pf_direct_url', $_POST['pf_direct_url'] );
			update_option( $post->ID . 'pf_link_new_tab', $_POST['pf_link_new_tab'] );
			update_option( $post->ID . 'pf_thumb_size', $_POST['pf_thumb_size'] );
			update_option( $post->ID . 'pf_short_description', $_POST['pf_short_description'] );
		}
		// end if
	}
	// end save_portfolio_details
	
	add_action( 'save_post', 'save_portfolio_details' );

/* ============================================================================================================================================= */

	function create_post_type_gallery()
	{
		$labels = array('name' => __( 'Gallery', 'read' ),
						'singular_name' => __( 'Gallery Item', 'read' ),
						'add_new' => __( 'Add New', 'read' ),
						'add_new_item' => __( 'Add New', 'read' ),
						'edit_item' => __( 'Edit', 'read' ),
						'new_item' => __( 'New', 'read' ),
						'all_items' => __( 'All', 'read' ),
						'view_item' => __( 'View', 'read' ),
						'search_items' => __( 'Search', 'read' ),
						'not_found' =>  __( 'No Items found', 'read' ),
						'not_found_in_trash' => __( 'No Items found in Trash', 'read' ),
						'parent_item_colon' => "",
						'menu_name' => 'Gallery' );
		
		$args = array(  'labels' => $labels,
						'public' => true,
						'exclude_from_search' => false,
						'publicly_queryable' => true,
						'show_ui' => true,
						'query_var' => true,
						'show_in_nav_menus' => true,
						'capability_type' => 'post',
						'hierarchical' => false,
						'menu_position' => 5,
						'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
						'rewrite' => array( 'slug' => 'gallery', 'with_front' => false ));
					
		register_post_type( 'gallery' , $args );
	}
	// end create_post_type_gallery
	
	add_action( 'init', 'create_post_type_gallery' );
	
	
	function updated_messages_gallery( $messages )
	{
		global $post, $post_ID;
		
		$messages['gallery'] = array( 0 => "", // Unused. Messages start at index 1.
										1 => sprintf( __( '<strong>Updated.</strong> <a target="_blank" href="%s">View</a>', 'read' ), esc_url( get_permalink( $post_ID) ) ),
										2 => __( 'Custom field updated.', 'read' ),
										3 => __( 'Custom field deleted.', 'read' ),
										4 => __( 'Updated.', 'read' ),
										// translators: %s: date and time of the revision
										5 => isset( $_GET['revision'] ) ? sprintf( __( 'Restored to revision from %s', 'read' ), wp_post_revision_title( ( int ) $_GET['revision'], false ) ) : false,
										6 => sprintf( __( '<strong>Published.</strong> <a target="_blank" href="%s">View</a>', 'read' ), esc_url( get_permalink( $post_ID) ) ),
										7 => __( 'Saved.', 'read' ),
										8 => sprintf( __( 'Submitted. <a target="_blank" href="%s">Preview</a>', 'read' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
										9 => sprintf( __( 'Scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview</a>', 'read' ),
										// translators: Publish box date format, see http://php.net/date
										date_i18n( __( 'M j, Y @ G:i', 'read' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID) ) ),
										10 => sprintf( __( '<strong>Item draft updated.</strong> <a target="_blank" href="%s">Preview</a>', 'read' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID) ) ) ) );
	
		return $messages;
	}
	// end updated_messages_gallery
	
	add_filter( 'post_updated_messages', 'updated_messages_gallery' );
	
	
	function gallery_columns( $gl_columns )
	{
		$gl_columns = array('cb' => '<input type="checkbox">',
							'title' => __( 'Title', 'read' ),
							'gl_featured_image' => __( 'Featured Image', 'read' ),
							'gl_short_description' => __( 'Short Description', 'read' ),
							'author' => __( 'Author', 'read' ),
							'comments' => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
							'date' => __( 'Date', 'read' ) );
		
		return $gl_columns;
	}
	// end gallery_columns
	
	add_filter( 'manage_edit-gallery_columns', 'gallery_columns' );
	
	
	function gallery_custom_columns( $gl_column )
	{
		global $post, $post_ID;
		
		switch ( $gl_column )
		{
			case 'gl_featured_image':
			
				if ( has_post_thumbnail() )
				{
					the_post_thumbnail( 'thumbnail' );
				}
				
			break;
			
			case 'gl_short_description':
			
				$gl_short_description = stripcslashes( get_option( $post->ID . 'gl_short_description' ) );
				
				echo $gl_short_description;
				
			break;
		}
		// end switch
	}
	// end gallery_custom_columns
	
	add_action( 'manage_posts_custom_column',  'gallery_custom_columns' );
	
	
	function taxonomy_gallery()
	{
		$labels_tag = array('name' => __( 'Gallery Tags', 'read' ),
							'singular_name' => __( 'Gallery Tag', 'read' ),
							'search_items' =>  __( 'Search', 'read' ),
							'all_items' => __( 'All', 'read' ),
							'parent_item' => __( 'Parent Gallery Tag', 'read' ),
							'parent_item_colon' => __( 'Parent Gallery Tag:', 'read' ),
							'edit_item' => __( 'Edit', 'read' ),
							'update_item' => __( 'Update', 'read' ),
							'add_new_item' => __( 'Add New', 'read' ),
							'new_item_name' => __( 'New Gallery Tag Name', 'read' ),
							'menu_name' => __( 'Gallery Tags', 'read' ) );

		register_taxonomy(  'gallery_tags',
							array( 'gallery' ),
							array( 'hierarchical' => false,
							'labels' => $labels_tag,
							'show_ui' => true,
							'public' => true,
							'query_var' => true,
							'rewrite' => array( 'slug' => 'gallery_tags' ) ) );
	}
	// end taxonomy_gallery
	
	add_action( 'init', 'taxonomy_gallery' );
	
	
	function my_meta_box_gallery_details()
	{
		global $post, $post_ID;
		
		?>
			<p>
				<input type="hidden" name="nonce_gallery" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
			</p>
			
			<h4><?php echo __( 'Thumbnail Size', 'read' ); ?></h4>
			<p>
				<?php
					$gl_thumb_size = get_option( $post->ID . 'gl_thumb_size', 'x1' );
				?>
				
				<label style="display: inline-block; margin-bottom: 5px;"><input type="radio" name="gl_thumb_size" <?php if ( $gl_thumb_size == 'x1' ) { echo 'checked="checked"'; } ?> value="x1"> <?php echo __( '1x', 'read' ); ?></label>
				
				<br>
				
				<label style="display: inline-block; margin-bottom: 5px;"><input type="radio" name="gl_thumb_size" <?php if ( $gl_thumb_size == 'x2' ) { echo 'checked="checked"'; } ?> value="x2"> <?php echo __( '2x', 'read' ); ?></label>
			</p>
			
			<hr>
			
			<h4><?php echo __( 'Short Description', 'read' ); ?></h4>
			<p>
				<?php
					$gl_short_description = stripcslashes( get_option( $post->ID . 'gl_short_description' ) );
				?>
				<textarea id="gl_short_description" name="gl_short_description" rows="4" cols="46" class="widefat"><?php echo $gl_short_description; ?></textarea>
			</p>
		<?php
	}
	// end my_meta_box_gallery_details
	
	
	function my_meta_box_gallery_images()
	{
		global $post, $post_ID;
		
		?>
			<p>
				<input type="hidden" name="nonce_gallery" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
			</p>				
			<?php
				$gl_images_count =  get_option( $post->ID . 'gl_images_count', '0' );
				
				for ( $i = 0; $i < $gl_images_count; $i++ )
				{
					$gl_image = stripcslashes( get_option( $post->ID . 'gl_image' . $i, "" ) );
					
					if ( $gl_image != "" )
					{
						$gl_image_title = stripcslashes( get_option( $post->ID . 'gl_image_title' . $i, "" ) );
						
						global $wpdb;
						
						$attachment_id = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE guid = '$gl_image'" );
						
						$image_attributes = wp_get_attachment_image_src( $attachment_id, 'featured_image' );
						
						?>
							<p style="float: left; margin-right: 10px;">
								<img style="display: block; max-width: 150px; margin-bottom: 10px;" alt="" src="<?php echo $image_attributes[0]; ?>">
								<input type="text" name="gl_image_title[]" style="display: block; margin-bottom: 10px;" placeholder="Image Title" value="<?php echo $gl_image_title; ?>">
								<input type="text" name="gl_image[]" class="upload code2" style="display: none; width: 50%;" value="<?php echo $gl_image; ?>">
								<input type="button" class="button upload-button" value="<?php echo __( 'Change', 'read' ); ?>">
								<a style="display: inline-block; margin-left: 10px;" class="gallery-remove-image" href="#"><?php echo __( 'Remove', 'read' ); ?></a>
							</p>
						<?php
					}
					// end if
				}
				// end for
			?>
			<div style="clear: both;"></div>
			<div class="app"></div>
			<p>
				<a id="gallery-add-new-image" href="#"><?php echo __( 'Add New', 'read' ); ?></a>
				<input type="hidden" id="gl_images_count" name="gl_images_count" value="<?php echo $gl_images_count; ?>">
			</p>
			<script>
			
				jQuery(document).ready(function($)
				{
					// image upload
					var uploadID = "";

					jQuery( '.upload-button' ).live( 'click', function()
					{
						window.send_to_editor = function( html )
						{
							imgurl = jQuery( 'img', html ).attr( 'src' );
							uploadID.val( imgurl );
							uploadID.trigger( 'change' );
							tb_remove();
						}
						
						uploadID = jQuery(this).prev( 'input' );
						formfield = jQuery( '.upload' ).attr( 'name' );
						
						tb_show('', 'media-upload.php?post_id=0&amp;type=image&amp;TB_iframe=true');
						return false;
					});
					// end image upload
					
					
					// add new image
					$( '#gallery-add-new-image' ).click( function()
					{
						var str = '<p><input type="text" name="gl_image_title[]" placeholder="Image Title" value=""><input type="text" name="gl_image[]" class="upload code2" style="width: 50%;" placeholder="Image Url" value=""><input type="button" class="button upload-button" value="Browse"></p>';
						
						$( '.app' ).append( str );
						
						var gl_images_count = $( '#gl_images_count' ).val();
						
						gl_images_count++;
						
						$( '#gl_images_count' ).val( gl_images_count );
						
						return false;
					});
					// end add new image
					
					
					// remove image
					$( '.gallery-remove-image' ).click( function()
					{
						$( this ).parent( 'p' ).find( 'input.upload' ).val( "" );
						
						$( this ).parent( 'p' ).hide( 'slow' );
						
						return false;
					});
					// end remove image
					
					
					// change image
					function addImageChange()
					{
					    $( 'input.upload' ).bind( 'change', function()
					    {
							$( this ).prev( 'img' ).attr( 'src', $( this ).val() );
					    });
					} 
					
					addImageChange();
					// end change image
					
				});
				
			</script>
		<?php
	}
	// end my_meta_box_gallery_images
	
	
	function my_add_meta_box_gallery()
	{
		add_meta_box( 'my_meta_box_gallery_details', __( 'Details', 'read' ), 'my_meta_box_gallery_details', 'gallery', 'side', 'low' );
		
		add_meta_box( 'my_meta_box_gallery_images', __( 'Images', 'read' ), 'my_meta_box_gallery_images', 'gallery' );
	}
	// end my_add_meta_box_gallery
	
	add_action( 'admin_init', 'my_add_meta_box_gallery' );
	
	
	function my_save_meta_box_gallery( $post_id )
	{
		global $post, $post_ID;
		
		if ( ! wp_verify_nonce( @$_POST['nonce_gallery'], basename(__FILE__) ) )
		{
			return $post_id;
		}
		
		
		if ( $_POST['post_type'] == 'gallery' )
		{
			update_option( $post->ID . 'gl_thumb_size', $_POST['gl_thumb_size'] );
			update_option( $post->ID . 'gl_short_description', $_POST['gl_short_description'] );
			
			$gl_images_count = $_POST['gl_images_count'];
			
			for ( $i = 0; $i < $gl_images_count; $i++ )
			{
				update_option( $post->ID . 'gl_image' . $i , $_POST['gl_image'][$i] );
				update_option( $post->ID . 'gl_image_title' . $i , esc_attr( $_POST['gl_image_title'][$i] ) );
			}
			
			update_option( $post->ID . 'gl_images_count' , $gl_images_count );
		}
	}
	// end my_save_meta_box_gallery
	
	add_action( 'save_post', 'my_save_meta_box_gallery' );

/* ============================================================================================================================================= */
/* ============================================================================================================================================= */

	// https://github.com/franz-josef-kaiser/Easy-Pagination-Deamon
	// https://github.com/marke123/Easy-Pagination-Deamon
	
	if ( ! class_exists('WP') ) 
	{
		header( 'Status: 403 Forbidden' );
		header( 'HTTP/1.1 403 Forbidden' );
		exit;
	}
	
	/**
	 * TEMPLATE TAG
	 * 
	 * A wrapper/template tag for the pagination builder inside the class.
	 * Write a call for this function with a "range" 
	 * inside your template to display the pagination.
	 * 
	 * @param integer $range
	 */
	
	function oxo_pagination( $args ) 
	{
		return new oxoPagination( $args );
	}
	
	
	if ( ! class_exists( 'oxoPagination' ) ) 
	{
		class oxoPagination 
		{
			/**
			 * Plugin root path
			 * @var unknown_type
			 */
			protected $path;
			
			/**
			 * Plugin version
			 * @var integer
			 */
			protected $version;
			
			/**
			 * Default arguments
			 * @var array
			 */
			protected $defaults = array( 'classes'			=> ""
										,'range'			=> 5
										,'wrapper'			=> 'li' // element in which we wrap the link 
										,'highlight'		=> 'current' // class for the current page
										,'before'			=> ""
										,'after'			=> ""
										,'link_before'		=> ""
										,'link_after'		=> ""
										,'next_or_number'	=> 'number'
										,'nextpagelink'		=> 'Next'
										,'previouspagelink'	=> 'Prev'
										,'pagelink'			=> '%'
										# only for attachment img pagination/navigation
										,'attachment_size'	=> 'thumbnail'
										,'show_attachment'	=> true );

			/**
			 * Input arguments
			 * @var array
			 */
			protected $args;
			
			/**
			 * Constant for the texdomain (i18n)
			 */
			const LANG = 'read';
			
			
			public function __construct( $args ) 
			{
				// Set root path variable
				$this->path = $this->get_root_path();

				// Set version
				# $this->version = get_plugin_data();

				# >>>> defaults & arguments

					// apply the "wp_list_pages_args" wordpress native filter also to the custom "page_links" function.
					$this->defaults = apply_filters( 'wp_link_pages_args', $this->defaults );

					// merge defaults with input arguments
					$this->args = wp_parse_args( $args, $this->defaults );

				# <<<< defaults & arguments

				// Help placing the template tag at the right position (inside/outside loop).
				$this->help();

				// Css
				$this->register_styles();
				// Load stylesheet into the 'wp_head()' hook of your theme.
				add_action( 'wp_head', array( &$this, 'print_styles' ) );

				// RENDER
				$this->render( $this->args );
			}


			/**
			 * Plugin root
			 */
			function get_root_path() 
			{
				$path = trailingslashit( WP_PLUGIN_URL.'/'.str_replace( basename( __FILE__ ), "", plugin_basename( __FILE__ ) ) );
				$path = apply_filters( 'config_pagination_url', $path );

				return $this->path = $path;
			}


			/**
			 * Return plugin comment data
			 * 
			 * @since 0.1.3.3
			 * 
			 * @param $value string | default = 'Version' (Other input values: Name, PluginURI, Version, Description, Author, AuthorURI, TextDomain, DomainPath, Network, Title)
			 * 
			 * @return string
			 */
			private function get_plugin_data( $value = 'Version' )
			{	
				$plugin_data = get_plugin_data( __FILE__ );

				return $plugin_data[ $value ];
			}

			/**
			 * Register styles
			 */
			function register_styles() 
			{
				if ( ! is_admin() )
				{
					// Search for a stylesheet
					$name = '/pagination.css';

					if ( file_exists( get_stylesheet_directory() . $name ) )
					{
						$file = get_stylesheet_directory() . $name;
					}
					elseif ( file_exists( get_template_directory() . $name ) )
					{
						$file = get_template_directory() . $name;
					}
					elseif ( file_exists( $this->path.$name ) )
					{
						$file = $this->path.$name;
					}
					else 
					{
						return;
					}

					// try to avoid caching stylesheets if they changed
					$version = filemtime( $file );
					
					// If no change was found, use the plugins version number
					if ( ! $version )
						$version = $this->version;

					wp_register_style( 'pagination', $file, false, $version, 'screen' );
				}
			}

			/**
			 * Print styles
			 */
			function print_styles() 
			{
				if ( ! is_admin() )
				{
					wp_enqueue_style( 'pagination' );
				}
			}

			/**
			 * Help with placing the template tag right
			 */
			function help() 
			{
				/*
				if ( is_single() && ! in_the_loop() )
				{
					$output = sprintf( __( 'You should place the %1$s template tag inside the loop on singular templates.', self::LANG ), __CLASS__ );
				}
				else

				_doing_it_wrong( 'Class: '.__CLASS__.' function: '.__FUNCTION__, 'error message' );
				*/
				if ( ! is_single() && in_the_loop() )
				{
					$output = sprintf( __( 'You shall not place the %1$s template tag inside the loop on list/archives/search/etc templates.', self::LANG ), __CLASS__ );
				}

				if ( ! isset( $output ) )
					return;

				// error
				$message = new WP_Error( 
					 __CLASS__
					,$output 
				);

				// render
				if ( is_wp_error( $message ) ) 
				{ 
				?>
					<div id="oxo-error-<?php echo $message->get_error_code(); ?>" class="error oxo-error prepend-top clear">
						<strong>
							<?php echo $message->get_error_message(); ?>
						</strong>
					</div>
				<?php 
				}
			}


			/**
			 * Replacement for the native wp_link_page() function
			 * 
			 * @author original version: Thomas Scholz (toscho.de)
			 * @link http://wordpress.stackexchange.com/questions/14406/how-to-style-current-page-number-wp-link-pages/14460#14460
			 * 
			 * @param (mixed) array $args
			 */
			public function page_links( $args )
			{
				global $page, $numpages, $multipage, $more, $pagenow;

				$args = wp_parse_args( $args, $this->defaults );
				extract( $args, EXTR_SKIP );

				if ( ! $multipage )
					return;

				# ============================================== #

				# >>>> css classes wrapper
				$start_classes = isset( $classes ) ? ' class="' : '';
				$end_classes = isset( $classes ) ? '"' : '';
				# <<<< css classes wrapper

				$output  = $before;
				
				switch ( $next_or_number ) 
				{
					case 'next' :
					
						if ( $more ) 
						{
							# >>>> [prev]
							$i = $page - 1;
							if ( $i && $more ) 
							{
								# >>>> <li class="custom-class">
								$output .= '<'.$wrapper.$start_classes.$classes.$end_classes.'>';
									$output .= _wp_link_page( $i ).$link_before.$previouspagelink.$link_after.'</a>';
								$output .= '</'.$wrapper.'>';
								# <<<< </li>
							}
							# <<<< [prev]

							# >>>> [next]
							$i = $page + 1;
							if ( $i <= $numpages && $more ) 
							{
								# >>>> <li class="custom-class">
								$output .= '<'.$wrapper.$start_classes.$classes.$end_classes.'>';
									$output .= _wp_link_page( $i ).$link_before.$nextpagelink.$link_after.'</a>';
								$output .= '</'.$wrapper.'>';
								# <<<< </li>
							}
							# <<<< [next]
						}
						
						break;

					case 'number' :
					
						for ( $i = 1; $i < ( $numpages + 1 ); $i++ )
						{
							$classes = isset( $this->args['classes'] ) ? $this->args['classes'] : '';
							
							if ( $page === $i && isset( $this->args['highlight'] ) )
								 $classes .= ' '.$this->args['highlight'];

							# >>>> <li class="current custom-class">
							$output .= '<'.$wrapper.$start_classes.$classes.$end_classes.'>';

								# >>>> [1] [2] [3] [4]
								$j = str_replace( '%', $i, $pagelink );

								if ( $page !== $i || ( ! $more && $page == true ) )
								{
									$output .= _wp_link_page( $i ).$link_before.$j.$link_after.'</a>';
								}

								// the current page must not have a link to itself
								else
								{
									$output .= $link_before.'<span>'.$j.'</span>'.$link_after;
								}
								# <<<< [next]/[prev] | [1] [2] [3] [4]

							$output .= '</'.$wrapper.'>';
							# <<<< </li>
						}
						
						break;

					default :
					
						// in case you can imagine some funky way to paginate
						do_action( 'hook_pagination_next_or_number', $page_links, $classes );
						break;
				}
				
				$output .= $after;

				return $output;
			}


			/**
			 * Navigation for image attachments
			 * 
			 * @param unknown_type $args
			 */
			public function attachment_links( $args )
			{
				global $post, $page;

				$args = wp_parse_args( $args, $this->defaults );
				extract( $args, EXTR_SKIP );

				# ============================================== #

				$attachments = array_values( get_children( array( 
					 'post_parent'		=> $post->post_parent
					,'post_status'		=> 'inherit'
					,'post_type'		=> 'attachment'
					,'post_mime_type'	=> 'image'
					,'order'			=> 'ASC'
					,'orderby'			=> 'menu_order ID' 
				) ) );

				// setup the keys for our links
				foreach ( $attachments as $key => $attachment ) {
					if ( $attachment->ID == $post->ID )
						break;
				}

				# ============================================== #
				# @todo implement rel="next/prev" for links

				# >>>> css classes wrapper
				$start_classes = isset( $classes ) ? ' class="' : '';
					$classes = isset( $classes ) ? ' '.$classes : '';
				$end_classes = isset( $classes ) ? '"' : '';
				# <<<< css classes wrapper

				$output  = $before;
					# >>>> [prev]
					if ( isset( $attachments[ $key - 1 ] ) )
					{
						$prev_href = get_attachment_link( $attachments[ $key - 1 ]->ID );

						$prev_title = str_replace( "_", " ", $attachments[ $key - 1 ]->post_title );
						$prev_title = str_replace( "-", " ", $prev_title );

						if ( $show_attachment === true )
						{
							if ( ( is_int( $attachment_size ) && $attachment_size != 0 ) || ( is_string( $attachment_size ) && $attachment_size != 'none' ) || $attachment_size != false )
								$prev_img = wp_get_attachment_image( $attachments[ $key - 1 ]->ID, $attachment_size, false );
						}

						# >>>> <li class="custom-class">
						$output .= '<'.$wrapper. $start_classes.$classes.$end_classes .'>';
							$output .= $link_before.'<a href="'.$prev_href.'" title="'.esc_attr( $prev_title ).'" rel="attachment prev">'.$prev_img.$previouspagelink.'</a>'.$link_after;
						$output .= '</'.$wrapper.'>';
						# <<<< </li>
					}
					# <<<< [prev]

					# >>>> [next]
					if ( isset( $attachments[ $key + 1 ] ) )
					{
						$next_href = get_attachment_link( $attachments[ $key + 1 ]->ID );

						$next_title = str_replace( "_", " ", $attachments[ $key + 1 ]->post_title );
						$next_title = str_replace( "-", " ", $next_title );

						if ( $show_attachment === true )
						{
							if ( ( is_int( $attachment_size ) && $attachment_size != 0 ) || ( is_string( $attachment_size ) && $attachment_size != 'none' ) || $attachment_size != false )
								$next_img = wp_get_attachment_image( $attachments[ $key + 1 ]->ID, $attachment_size, false );
						}

						# >>>> <li class="custom-class">
						$output .= '<'.$wrapper. $start_classes.$classes.$end_classes .'>';
							$output .= $link_before.'<a href="'.$next_href.'" title="'.esc_attr( $next_title ).'" rel="attachment prev">'.$next_img.$nextpagelink.'</a>'.$link_after;
						$output .= '</'.$wrapper.'>';
						# <<<< </li>
					}
					# <<<< [next]
				$output .= $after;

				#echo '<pre>';print_r($k);echo '</pre>';
				return $output;
			}


			/**
			 * Wordpress pagination for archives/search/etc.
			 * 
			 * Semantically correct pagination inside an unordered list
			 * 
			 * Displays: [First] [<<] [1] [2] [3] [4] [>>] [Last]
			 *	+ First/Last only appears if not on first/last page
			 *	+ Shows next/previous links [<<]/[>>]
			 * 
			 * Accepts a range attribute (default = 5) to adjust the number
			 * of direct page links that link to the pages above/below the current one.
			 * 
			 * @param (integer) $range
			 */
			function render( $args = array( 'classes', 'range' ) ) 
			{
				// $paged - number of the current page
				global $wp_query, $paged, $numpages;

				extract( $args, EXTR_SKIP );

				# ============================================== #

				// How much pages do we have?
				$max_page = (int) $wp_query->max_num_pages;

				// We need the pagination only if there is more than 1 page
				if ( $max_page > (int) 1 )
					$paged = ! $wp_query->query_vars['paged'] ? (int) 1 : $wp_query->query_vars['paged'];

				$classes = isset( $classes ) ? ' '.$classes : '';
				?>

				<ul class="pagination">

					<?php 
					// *******************************************************
					// To the first / previous page
					// On the first page, don't put the first / prev page link
					// *******************************************************
					if ( $paged !== (int) 1 && $paged !== (int) 0 && ! is_page() ) 
					{
						?>
						<li class="pagination-first <?php echo $classes; ?>">
							<?php
							$first_post_link = get_pagenum_link( 1 ); 
							?>
							<a href=<?php echo $first_post_link; ?> rel="first">
								<?php _e( 'First', 'read' ); ?>
							</a>
						</li>

						<li class="pagination-prev <?php echo $classes; ?>">
							<?php 
								# let's use the native fn instead of the previous_/next_posts_link() alias
								# get_adjacent_post( $in_same_cat = false, $excluded_categories = '', $previous = true )

								// Get the previous post object
								$in_same_cat	= is_category() || is_tag() || is_tax() ? true : false;
								$prev_post_obj	= get_adjacent_post( $in_same_cat );
								// Get the previous posts ID
								$prev_post_ID	= isset( $prev_post_obj->ID ) ? $prev_post_obj->ID : '';

								// Set title & link for the previous post
								if ( is_single() )
								{
									if ( isset( $prev_post_obj ) )
									{
										$prev_post_link		= get_permalink( $prev_post_ID );
										$prev_post_title	= '&laquo;'; // equals "ۢ
										# $prev_post_title	= __( 'Prev', self::LANG ).': '.mb_substr( $prev_post_obj->post_title, 0, 6 );
									}
								}
								else 
								{
									$prev_post_link		= home_url().'/?s='.get_search_query().'&paged='.( $paged-1 );
									$prev_post_title	= '&laquo;'; // equals "ۢ
								}
								?>
							<!-- Render Link to the previous post -->
							<a href="<?php echo $prev_post_link; ?>" rel="prev">
								<?php echo $prev_post_title; ?>
							</a>
							<?php # previous_posts_link(' &laquo; '); // ˠ?>
						</li>
						<?php 
					}

					// Render, as long as there are more posts found, than we display per page
					if ( ! $wp_query->query_vars['posts_per_page'] < $wp_query->found_posts )
					{

						// *******************************************************
						// We need the sliding effect only if there are more pages than is the sliding range
						// *******************************************************
						if ( $max_page > $range ) 
						{
							// When closer to the beginning
							if ( $paged < $range ) 
							{
								for ( $i = 1; $i <= ( $range+1 ); $i++ ) 
								{ 
									$current = '';
									// Apply the css class "current" if it's the current post
									if ( $paged === (int) $i )
									{
										$current = ' current';
										# echo _wp_link_page( $i ).'</a>';
									}
									?>
									<li class="pagination-num<?php echo $classes.$current; ?>">
										<!-- Render page number Link -->
										<a href="<?php echo get_pagenum_link( $i ); ?>">
											<?php echo $i; ?>
										</a>
									</li>
									<?php 
								}
							}
							// When closer to the end
							elseif ( $paged >= ( $max_page - ceil ( $range/2 ) ) ) 
							{
								for ( $i = $max_page - $range; $i <= $max_page; $i++ )
								{ 
									$current = '';
									// Apply the css class "current" if it's the current post
									$current = ( $paged === (int) $i ) ? ' current' : '';

									?>
									<li class="pagination-num<?php echo $classes.$current; ?>">
										<!-- Render page number Link -->
										<a href="<?php echo get_pagenum_link( $i ); ?>">
											<?php echo $i; ?>
										</a>
									</li>
									<?php 
								}
							}
							// Somewhere in the middle
							elseif ( $paged >= $range && $paged < ( $max_page - ceil( $range/2 ) ) ) 
							{
								for ( $i = ( $paged - ceil( $range/2 ) ); $i <= ( $paged + ceil( $range/2 ) ); $i++ ) 
								{
									$current = '';
									// Apply the css class "current" if it's the current post
									$current = ( $paged === (int) $i ) ? ' current' : '';

									?>
									<li class="pagination-num<?php echo $classes.$current; ?>">
										<!-- Render page number Link -->
										<a href="<?php echo get_pagenum_link( $i ); ?>">
											<?php echo $i; ?>
										</a>
									</li>
									<?php 
								}
							}
						}
						// Less pages than the range, no sliding effect needed
						else 
						{
							for ( $i = 1; $i <= $max_page; $i++ ) 
							{
								$current = '';
								// Apply the css class "current" if it's the current post
								$current = ( $paged === (int) $i ) ? ' current' : '';

								?>
								<li class="pagination-num<?php echo $classes.$current; ?>">
									<!-- Render page number Link -->
									<a href="<?php echo get_pagenum_link( $i ); ?>">
										<?php echo $i; ?>
									</a>
								</li>
								<?php 
							}
						} // endif;
					} // endif; there are more posts found, than we display per page 


					// *******************************************************
					// to the last / next page of a paged post
					// This only get's used on posts/pages that use the <!--nextpage--> quicktag
					// *******************************************************
					if ( is_singular() )
					{
						$echo = false;

						if ( wp_attachment_is_image() === true )
						{ 
							echo $this->attachment_links( $this->args );
						}
						elseif ( $numpages > 1 )
						{
							echo $this->page_links( $this->args );
						}
					}


					// *******************************************************
					// to the last / next page
					// On the last page: don't show the link to the last/next page
					// *******************************************************
					if ( $paged !== (int) 0 && $paged !== (int) $max_page && $max_page !== (int) 0 && ! is_page() )
					{
						?>
						<li class="pagination-next<?php echo $classes; ?>">
							<?php 
							# let's use the native fn instead of the previous_/next_posts_link() alias
							# get_adjacent_post( $in_same_cat = false, $excluded_categories = '', $previous = true )

							// Get the next post object
							$in_same_cat	= is_category() || is_tag() || is_tax() ? true : false;
							$next_post_obj	= get_adjacent_post( $in_same_cat, '', false );
							// Get the next posts ID
							$next_post_ID	= isset( $next_post_obj->ID ) ? $next_post_obj->ID : '';

							// Set title & link for the next post
							if ( is_single() )
							{
								if ( isset( $next_post_obj ) )
								{
									# $next_post_link = get_next_posts_link();
									# $next_post_paged_link = get_next_posts_page_link();
									$next_post_link		= get_permalink( $next_post_ID );
									$next_post_title	= '&raquo;'; // equals "ۢ
									# $next_post_title	= __( 'Next', self::LANG ).mb_substr( $next_post_obj->post_title, 0, 6 );
								}
							}
							else 
							{
								$next_post_link		= home_url().'/?s='.get_search_query().'&paged='.( $paged+1 );
								$next_post_title	= '&raquo;'; // equals "ۢ
							}

							if ( isset ( $next_post_obj ) )
							{
								?>
								<!-- Render Link to the next post -->
								<a href="<?php echo $next_post_link; ?>" rel="next">
									<?php echo $next_post_title; ?>
								</a>
								<?php
							} 
							else 
							{
								next_posts_link(' &raquo; '); // ۊ
							}
							?>
						</li>

						<li class="pagination-last<?php echo $classes; ?>">
							<?php
							$last_post_link = get_pagenum_link( $max_page ); 
							?>
							<!-- Render Link to the last post -->
							<a href="<?php echo $last_post_link; ?>" rel="last">
								<?php _e( 'Last', 'read' ); ?>
							</a>
						</li>
						<?php 
					}
					// endif;
				?>
				</ul>
				<?php
			}
		}
		// END Class oxoPagination
	}
	// end if

/* ============================================================================================================================================= */
/* ============================================================================================================================================= */

	/**
	 * This function filters the post content when viewing a post with the "chat" post format.  It formats the 
	 * content with structured HTML markup to make it easy for theme developers to style chat posts.  The 
	 * advantage of this solution is that it allows for more than two speakers (like most solutions).  You can 
	 * have 100s of speakers in your chat post, each with their own, unique classes for styling.
	 *
	 * @author David Chandra
	 * @link http://www.turtlepod.org
	 * @author Justin Tadlock
	 * @link http://justintadlock.com
	 * @copyright Copyright (c) 2012
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
	 * @link http://justintadlock.com/archives/2012/08/21/post-formats-chat
	 *
	 * @global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
	 * @param string $content The content of the post.
	 * @return string $chat_output The formatted content of the post.
	 */
	function my_format_chat_content( $content )
	{
		global $_post_format_chat_ids;

		/* If this is not a 'chat' post, return the content. */
		if ( !has_post_format( 'chat' ) )
			return $content;

		/* Set the global variable of speaker IDs to a new, empty array for this chat. */
		$_post_format_chat_ids = array();

		/* Allow the separator (separator for speaker/text) to be filtered. */
		$separator = apply_filters( 'my_post_format_chat_separator', ':' );

		/* Open the chat transcript div and give it a unique ID based on the post ID. */
		$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript">';

		/* Split the content to get individual chat rows. */
		$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );

		/* Loop through each row and format the output. */
		foreach ( $chat_rows as $chat_row )
		{

			/* If a speaker is found, create a new chat row with speaker and text. */
			if ( strpos( $chat_row, $separator ) )
			{

				/* Split the chat row into author/text. */
				$chat_row_split = explode( $separator, trim( $chat_row ), 2 );

				/* Get the chat author and strip tags. */
				$chat_author = strip_tags( trim( $chat_row_split[0] ) );

				/* Get the chat text. */
				$chat_text = trim( $chat_row_split[1] );

				/* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
				$speaker_id = my_format_chat_row_id( $chat_author );

				/* Open the chat row. */
				$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

				/* Add the chat row author. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><cite class="fn">' . apply_filters( 'my_post_format_chat_author', $chat_author, $speaker_id ) . '</cite>' . $separator . '</div>';

				/* Add the chat row text. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_text, $chat_author, $speaker_id ) ) . '</div>';

				/* Close the chat row. */
				$chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
			}

			/**
			 * If no author is found, assume this is a separate paragraph of text that belongs to the
			 * previous speaker and label it as such, but let's still create a new row.
			 */
			else
			{

				/* Make sure we have text. */
				if ( !empty( $chat_row ) )
				{

					/* Open the chat row. */
					$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

					/* Don't add a chat row author.  The label for the previous row should suffice. */

					/* Add the chat row text. */
					$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_row, $chat_author, $speaker_id ) ) . '</div>';

					/* Close the chat row. */
					$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
				}
			}
		}

		/* Close the chat transcript div. */
		$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";

		/* Return the chat content and apply filters for developers. */
		return apply_filters( 'my_post_format_chat_content', $chat_output );
	}
	// end my_format_chat_content

	/**
	 * This function returns an ID based on the provided chat author name.  It keeps these IDs in a global 
	 * array and makes sure we have a unique set of IDs.  The purpose of this function is to provide an "ID"
	 * that will be used in an HTML class for individual chat rows so they can be styled.  So, speaker "John" 
	 * will always have the same class each time he speaks.  And, speaker "Mary" will have a different class 
	 * from "John" but will have the same class each time she speaks.
	 *
	 * @author David Chandra
	 * @link http://www.turtlepod.org
	 * @author Justin Tadlock
	 * @link http://justintadlock.com
	 * @copyright Copyright (c) 2012
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
	 * @link http://justintadlock.com/archives/2012/08/21/post-formats-chat
	 *
	 * @global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
	 * @param string $chat_author Author of the current chat row.
	 * @return int The ID for the chat row based on the author.
	 */
	
	
	function my_format_chat_row_id( $chat_author )
	{
		global $_post_format_chat_ids;

		/* Let's sanitize the chat author to avoid craziness and differences like "John" and "john". */
		$chat_author = strtolower( strip_tags( $chat_author ) );

		/* Add the chat author to the array. */
		$_post_format_chat_ids[] = $chat_author;

		/* Make sure the array only holds unique values. */
		$_post_format_chat_ids = array_unique( $_post_format_chat_ids );

		/* Return the array key for the chat author and add "1" to avoid an ID of "0". */
		return absint( array_search( $chat_author, $_post_format_chat_ids ) ) + 1;
	}
	// end my_format_chat_row_id
	
	/* Filter the content of chat posts. */
	add_filter( 'the_content', 'my_format_chat_content' );

	/* Auto-add paragraphs to the chat text. */
	add_filter( 'my_post_format_chat_text', 'wpautop' );

/* ============================================================================================================================================= */

	add_filter( 'the_excerpt', 'do_shortcode' );
	add_filter( 'widget_text', 'do_shortcode' );

/* ============================================================================================================================================= */

	// Actual processing of the shortcode happens here
	function my_run_shortcode( $content )
	{
		global $shortcode_tags;
		
		// Backup current registered shortcodes and clear them all out
		$orig_shortcode_tags = $shortcode_tags;
		remove_all_shortcodes();
		
		add_shortcode( 'tabs', 'tabs' );
		add_shortcode( 'tab_head', 'tab_head' );
		add_shortcode( 'tab_title', 'tab_title' );
		add_shortcode( 'tab_content', 'tab_content' );
		add_shortcode( 'tab_pane', 'tab_pane' );
		add_shortcode( 'row', 'row' );
		add_shortcode( 'column', 'column' );
		add_shortcode( 'accordions', 'accordions' );
		add_shortcode( 'accordion', 'accordion' );
		add_shortcode( 'toggles', 'toggles' );
		add_shortcode( 'toggle', 'toggle' );
		add_shortcode( 'tagline', 'tagline' );
		add_shortcode( 'intro', 'intro' );
		add_shortcode( 'label', 'label' );
		add_shortcode( 'inline_media', 'inline_media' );
		add_shortcode( 'call_to_action', 'call_to_action' );
		add_shortcode( 'cta_button_wrap', 'cta_button_wrap' );
		add_shortcode( 'lead_p', 'lead_p' );
		add_shortcode( 'portfolio_text', 'portfolio_text' );
		add_shortcode( 'launch_button', 'launch_button' );
		add_shortcode( 'project_action', 'project_action' );
		add_shortcode( 'view_button', 'view_button' );
		add_shortcode( 'syntax_prettify', 'syntax_prettify' );
		add_shortcode( 'alert', 'alert' );
		add_shortcode( 'lists', 'lists' );
		add_shortcode( 'list_item', 'list_item' );
		add_shortcode( 'social_icons', 'social_icons' );
		add_shortcode( 'social_icon', 'social_icon' );
		add_shortcode( 'button', 'button' );
		add_shortcode( 'inline_slider', 'inline_slider' );
		add_shortcode( 'slide', 'slide' );
		add_shortcode( 'divider', 'divider' );
		add_shortcode( 'lightbox_audio', 'lightbox_audio' );
		add_shortcode( 'lightbox_video', 'lightbox_video' );
		add_shortcode( 'lightbox_image', 'lightbox_image' );
		add_shortcode( 'aside_content', 'aside_content' );
		add_shortcode( 'link_content', 'link_content' );
		add_shortcode( 'inline_lightbox_wrap', 'inline_lightbox_wrap' );
		add_shortcode( 'inline_lightbox_image', 'inline_lightbox_image' );
		add_shortcode( 'inline_lightbox_video', 'inline_lightbox_video' );
		add_shortcode( 'inline_lightbox_audio', 'inline_lightbox_audio' );
		
		// Do the shortcode ( only the one above is registered )
		$content = do_shortcode( $content );
		
		// Put the original shortcodes back
		$shortcode_tags = $orig_shortcode_tags;
		
		return $content;
	}
	// end my_run_shortcode
	
	add_filter( 'the_content', 'my_run_shortcode', 7 );

/* ============================================================================================================================================= */

	function tabs( $atts, $content = "" )
	{
		$tabs = '<div class="tabs">' . do_shortcode( $content ) . '</div>';
		
		return $tabs;
	}
	// end tabs
  
	add_shortcode( 'tabs', 'tabs' );

/* ============================================================================================================================================= */

	function tab_head( $atts, $content = "" )
	{
		$tab_head = '<ul class="tab-titles">' . do_shortcode( $content ) . '</ul>';
		
		return $tab_head;
	}
	// end tab_head
  
	add_shortcode( 'tab_head', 'tab_head' );

/* ============================================================================================================================================= */

	function tab_title( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'active' => "",
										'title' => "" ), $atts ) );
		
		$tab_title = '<li><a class="' . $active . '">' . $title . '</a></li>';
		
		return $tab_title;
	}
	// end tab_title
  
	add_shortcode( 'tab_title', 'tab_title' );

/* ============================================================================================================================================= */

	function tab_content( $atts, $content = "" )
	{
		$tab_content = '<div class="tab-content">' . do_shortcode( $content ) . '</div>';
		
		return $tab_content;
	}
	// end tab_content
  
	add_shortcode( 'tab_content', 'tab_content' );

/* ============================================================================================================================================= */

	function tab_pane( $atts, $content = "" )
	{
		$tab_pane = '<div>' . do_shortcode( $content ) . '</div>';
		
		return $tab_pane;
	}
	// end tab_pane
  
	add_shortcode( 'tab_pane', 'tab_pane' );

/* ============================================================================================================================================= */

	function inline_slider( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'autoplay' => 'false',
										'interval' => '3000',
										'animation' => 'slide',
										'direction' => 'horizontal',
										'animationspeed' => '800',
										'pauseonhover' => 'true' ), $atts ) );
		
		
		$inline_slider = '<div class="flexslider" data-autoplay="' . $autoplay . '" data-interval="' . $interval . '" data-animation="' . $animation . '" data-direction="' . $direction . '" data-animationSpeed="' . $animationspeed . '"  data-pauseOnHover="' . $pauseonhover . '"><ul class="slides">' . do_shortcode( $content ) . '</ul></div>';
	 	
		
		return $inline_slider;
	}
	
	add_shortcode( 'inline_slider', 'inline_slider' );

/* ============================================================================================================================================= */

	function slide( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'alt' => "",
										'src' => "",
										'url' => "" ), $atts ) );
		
		
		if ( $content != "" )
		{
			$content_out = '<p class="flex-title">' . do_shortcode( $content ) . '</p>';
		}
		else
		{
			$content_out = "";
		}
		
		
		if ( $url != "" )
		{
			$url_out = '<a href="' . $url . '"><img alt="' . $alt . '" src="' . $src . '"></a>';
		}
		else
		{
			$url_out = '<img alt="' . $alt . '" src="' . $src . '">';
		}
		
		
		$slide = '<li>' . $url_out . $content_out . '</li>';
	 	
		
		return $slide;
	}
	
	add_shortcode( 'slide', 'slide' );

/* ============================================================================================================================================= */

	function inline_media( $atts, $content = "" )
	{
		$inline_media = '<div class="media-wrap">' . do_shortcode( $content ) . '</div>';
	 	
		return $inline_media;
	}
	// end inline_media
  
	add_shortcode( 'inline_media', 'inline_media' );

/* ============================================================================================================================================= */

	function row( $atts, $content = "" )
	{
		$row = '<div class="row-fluid">' . do_shortcode( $content ) . '</div>';
		
		return $row;
	}
	// end row
  
	add_shortcode( 'row', 'row' );

/* ============================================================================================================================================= */

	function column( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'width' => "",
										'offset' => "" ), $atts ) );
		
		$column = '<div class="span' . $width . ' offset' . $offset . '">' . do_shortcode( $content ) . '</div>';
		
		return $column;
	}
	// end column
  
	add_shortcode( 'column', 'column' );

/* ============================================================================================================================================= */

	function portfolio_text( $atts, $content = "" )
	{
		$portfolio_text = '<div class="portfolio-text">' . do_shortcode( $content ) . '</div>';
		
		return $portfolio_text;
	}
	// end portfolio_text
  
	add_shortcode( 'portfolio_text', 'portfolio_text' );

/* ============================================================================================================================================= */

	function launch_button( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'text' => "",
										'url' => "" ), $atts ) );
		
		$launch_button = '<p class="launch-wrap"><a href="' . $url . '">' . $text . '</a></p>';
		
		return $launch_button;
	}
	// end launch_button
  
	add_shortcode( 'launch_button', 'launch_button' );

/* ============================================================================================================================================= */

	function toggles( $atts, $content = "" )
	{
		$toggles = '<div class="toggle-group">' . do_shortcode( $content ) . '</div>';
		
		return $toggles;
	}
	// end toggles
  
	add_shortcode( 'toggles', 'toggles' );

/* ============================================================================================================================================= */

	function toggle( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'active' => "",
										'title' => "" ), $atts ) );
		
		$toggle = '<div class="toggle"><h4 class="' . $active . '">' . $title . '</h4><div class="toggle-content">' . do_shortcode( $content ) . '</div></div>';
		
		return $toggle;
	}
	// end toggle
  
	add_shortcode( 'toggle', 'toggle' );

/* ============================================================================================================================================= */

	function accordions( $atts, $content = "" )
	{
		$accordions = '<div class="toggle-group accordion">' . do_shortcode( $content ) . '</div>';
		
		return $accordions;
	}
	// end accordions
  
	add_shortcode( 'accordions', 'accordions' );

/* ============================================================================================================================================= */

	function accordion( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'active' => "",
										'title' => "" ), $atts ) );
		
		$accordion = '<div class="toggle"><h4 class="' . $active . '">' . $title . '</h4><div class="toggle-content">' . do_shortcode( $content ) . '</div></div>';
		
		return $accordion;
	}
	// end accordion
  
	add_shortcode( 'accordion', 'accordion' );

/* ============================================================================================================================================= */

	function alert( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'type' => "" ), $atts ) );
		
		$alert = '<div class="alert ' . $type . '">' . do_shortcode( $content ) . '</div>';
		
		return $alert;
	}
	// end alert
  
	add_shortcode( 'alert', 'alert' );

/* ============================================================================================================================================= */

	function call_to_action( $atts, $content = "" )
	{
		$call_to_action = '<div class="cta row-fluid">' . do_shortcode( $content ) . '</div>';
		
		return $call_to_action;
	}
	// end call_to_action
  
	add_shortcode( 'call_to_action', 'call_to_action' );

/* ============================================================================================================================================= */

	function cta_button_wrap( $atts, $content = "" )
	{
		$cta_button_wrap = '<div class="cta-button">' . do_shortcode( $content ) . '</div>';
		
		return $cta_button_wrap;
	}
	// end cta_button_wrap
  
	add_shortcode( 'cta_button_wrap', 'cta_button_wrap' );

/* ============================================================================================================================================= */

	function project_action( $atts, $content = "" )
	{
		$project_action = '<div class="project-action row-fluid">' . do_shortcode( $content ) . '</div>';
		
		return $project_action;
	}
	// end project_action
  
	add_shortcode( 'project_action', 'project_action' );

/* ============================================================================================================================================= */

	function button( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'target' => "",
										'color' => "",
										'size' => "",
										'type' => "",
										'icon' => "",
										'url' => "" ), $atts ) );
										
		if ( $icon == 'linkedin' )
		{
			$icon_out = '<i class="icon-linkedin-sign"></i>';
		}
		elseif ( $icon == 'github' )
		{
			$icon_out = '<i class="icon-github-sign"></i>';
		}
		elseif ( $icon == 'buy' )
		{
			$icon_out = '<i class="icon-shopping-cart"></i>';
		}
		elseif ( $icon == 'eye' )
		{
			$icon_out = '<i class="icon-eye-open"></i>';
		}
		elseif ( $icon == 'beaker' )
		{
			$icon_out = '<i class="icon-beaker"></i>';
		}
		elseif ( $icon == 'download' )
		{
			$icon_out = '<i class="icon-download"></i>';
		}
		elseif ( $icon == 'download2' )
		{
			$icon_out = '<i class="icon-download-alt"></i>';
		}
		elseif ( $icon == 'rss' )
		{
			$icon_out = '<i class="icon-rss"></i>';
		}
		elseif ( $icon == 'like' )
		{
			$icon_out = '<i class="icon-thumbs-up"></i>';
		}
		elseif ( $icon == 'heart' )
		{
			$icon_out = '<i class="icon-heart-empty"></i>';
		}
		elseif ( $icon == 'cup' )
		{
			$icon_out = '<i class="icon-trophy"></i>';
		}
		elseif ( $icon == 'plus' )
		{
			$icon_out = '<i class="icon-plus-sign"></i>';
		}
		else
		{
			$icon_out = "";
		}
		
		$button = '<a target="' . $target . '" class="button ' . $color . ' ' . $size . ' ' . $type . '" href="' . $url . '">' . $icon_out . do_shortcode( $content ) . '</a>';
		
		return $button;
	}
	// end button
  
	add_shortcode( 'button', 'button' );

/* ============================================================================================================================================= */

	function lead_p( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'drop_caps' => "" ), $atts ) );
		
		if ( $drop_caps == 'yes' )
		{
			$drop_caps_out = 'drop-cap';
		}
		else
		{
			$drop_caps_out = "";
		}
		
		$lead_p = '<p class="lead ' . $drop_caps_out . '">' . do_shortcode( $content ) . '</p>';
		
		return $lead_p;
	}
	// end lead_p
	
	add_shortcode( 'lead_p', 'lead_p' );

/* ============================================================================================================================================= */

	function drop_caps( $atts, $content = "" )
	{
		$drop_caps = '<p class="drop-cap">' . do_shortcode( $content ) . '</p>';
		
		return $drop_caps;
	}
	// end drop_caps
	
	add_shortcode( 'drop_caps', 'drop_caps' );

/* ============================================================================================================================================= */

	function tagline( $atts, $content = "" )
	{
		$tagline = '<div class="tagline">' . do_shortcode( $content ) . '</div>';
		
		return $tagline;
	}
	// end tagline
	
	add_shortcode( 'tagline', 'tagline' );

/* ============================================================================================================================================= */

	function syntax_prettify( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'linenums' => "" ), $atts ) );
		
		$syntax_prettify = '<pre class="prettyprint ' . $linenums . '">' . do_shortcode( $content ) . '</pre>';
		
		return $syntax_prettify;
	}
	// end syntax_prettify
  
	add_shortcode( 'syntax_prettify', 'syntax_prettify' );

/* ============================================================================================================================================= */

	function lists( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'type' => "" ), $atts ) );
		
		$lists = '<ul class="icons icon-' . $type . '-list">' . do_shortcode( $content ) . '</ul>';
		
		return $lists;
	}
	// end lists
  
	add_shortcode( 'lists', 'lists' );

/* ============================================================================================================================================= */

	function list_item( $atts, $content = "" )
	{
		$list_item = '<li>' . do_shortcode( $content ) . '</li>';
		
		return $list_item;
	}
	// end list_item
  
	add_shortcode( 'list_item', 'list_item' );

/* ============================================================================================================================================= */

	function social_icons( $atts, $content = "" )
	{
		$social_icons = '<ul class="social">' . do_shortcode( $content ) . '</ul>';
		
		return $social_icons;
	}
	// end social_icons
	
	add_shortcode( 'social_icons', 'social_icons' );

/* ============================================================================================================================================= */

	function social_icon( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'type' => "",
										'title' => "",
										'url' => "" ), $atts ) );
		
		if ( $type == 'facebook' ) { $type_icon = '&#88;'; }
		elseif ( $type == 'twitter' ) { $type_icon = '&#95;'; }
		elseif ( $type == 'linkedin' ) { $type_icon = '&#118;'; }
		elseif ( $type == 'google' ) { $type_icon = ""; }
		elseif ( $type == 'vimeo' ) { $type_icon = '&#33;'; }
		elseif ( $type == 'pinterest' ) { $type_icon = ""; }
		elseif ( $type == 'flickr' ) { $type_icon = '&#98;'; }
		elseif ( $type == 'dribble' ) { $type_icon = '&#83;'; }
		elseif ( $type == 'dribbble' ) { $type_icon = '&#83;'; }
		elseif ( $type == 'lastfm' ) { $type_icon = '&#117;'; }
		elseif ( $type == 'rss' ) { $type_icon = '&#42;'; }
		elseif ( $type == 'forrst' ) { $type_icon = '&#100;'; }
		elseif ( $type == 'skype' ) { $type_icon = '&#58;'; }
		elseif ( $type == 'picassa' ) { $type_icon = '&#56;'; }
		elseif ( $type == 'youtube' ) { $type_icon = '&#39;'; }
		elseif ( $type == 'behance' ) { $type_icon = '&#71;'; }
		elseif ( $type == 'tumblr' ) { $type_icon = '&#92;'; }
		elseif ( $type == 'blogger' ) { $type_icon = '&#74;'; }
		elseif ( $type == 'delicious' ) { $type_icon = '&#76;'; }
		elseif ( $type == 'digg' ) { $type_icon = '&#81;'; }
		elseif ( $type == 'friendfeed' ) { $type_icon = '&#102;'; }
		elseif ( $type == 'github' ) { $type_icon = '&#106;'; }
		elseif ( $type == 'wordpress' ) { $type_icon = '$'; }
		elseif ( $type == 'instagram' ) { $type_icon = ""; }
		else { $type_icon = ""; }
		
		$social_icon = '<li><a target="_blank" class="' . $type . '" href="' . $url . '">' . $type_icon . '</a></li>';
		
		return $social_icon;
	}
	// end social_icon
  
	add_shortcode( 'social_icon', 'social_icon' );

/* ============================================================================================================================================= */

	function intro( $atts, $content = "" )
	{
		$intro = '<div class="intro">' . do_shortcode( $content ) . '</div>';
		
		return $intro;
	}
	// end intro
  
	add_shortcode( 'intro', 'intro' );

/* ============================================================================================================================================= */

	function label( $atts, $content = "" )
	{
		$label = '<span class="label">' . do_shortcode( $content ) . '</span>';
		
		return $label;
	}
	// end label
  
	add_shortcode( 'label', 'label' );

/* ============================================================================================================================================= */

	function view_button( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'text' => "",
										'url' => "" ), $atts ) );
		
		$view_button = '<p class="launch-wrap"><a href="' . $url . '">' . $text . '</a></p>';
		
		return $view_button;
	}
	// end view_button
  
	add_shortcode( 'view_button', 'view_button' );

/* ============================================================================================================================================= */

	function divider( $atts, $content = "" )
	{
		$divider = '<hr>';
		
		return $divider;
	}
	// end divider
  
	add_shortcode( 'divider', 'divider' );

/* ============================================================================================================================================= */

	function lightbox_audio( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "",
										'url' => "" ), $atts ) );
									
									
		if ( is_single() )
		{
			$lightbox_audio = '<iframe style="width: 100%;" src="' . $url . '"></iframe>';
		}
		else
		{
			$lightbox_audio = '<a class="lightbox iframe" data-lightbox-gallery="fancybox-item-' . get_the_ID() . '" title="' . $title . '" href="' . $url . '"></a>';
		}
		
		return $lightbox_audio;
	}
	// end lightbox_audio
  
	add_shortcode( 'lightbox_audio', 'lightbox_audio' );

/* ============================================================================================================================================= */

	function lightbox_video( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "",
										'url' => "" ), $atts ) );
										
										
		if ( is_single() )
		{
			$lightbox_video = '<div class="media-wrap"><iframe src="' . $url . '"></iframe></div>';
		}
		else
		{
			$lightbox_video = '<a class="lightbox iframe" data-lightbox-gallery="fancybox-item-' . get_the_ID() . '" title="' . $title . '" href="' . $url . '"></a>';
		}
		
		return $lightbox_video;
	}
	// end lightbox_video
	
	add_shortcode( 'lightbox_video', 'lightbox_video' );

/* ============================================================================================================================================= */

	function lightbox_image( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'title' => "",
										'url' => "",
										'first_image' => "yes" ), $atts ) );
										
		if ( $first_image == "yes" )
		{
			$first_image_out = "";
		}
		else
		{
			$first_image_out = 'hidden';
		}
		
		
		if ( is_single() )
		{
			$lightbox_image .= '<img style="display: block; margin-left: auto; margin-right: auto;" alt="' . $title . '" src="' . $url . '">';
		}
		else
		{
			$lightbox_image = '<a class="lightbox ' . $first_image_out . '" data-lightbox-gallery="fancybox-item-' . get_the_ID() . '" title="' . $title . '" href="' . $url . '"></a>';
		}
		
		return $lightbox_image;
	}
	// end lightbox_image
  
	add_shortcode( 'lightbox_image', 'lightbox_image' );

/* ============================================================================================================================================= */

	function aside_content( $atts, $content = "" )
	{
		$aside_content = '<div class="aside-content">' . do_shortcode( $content ) . '</div>';
		
		return $aside_content;
	}
	// end aside_content
  
	add_shortcode( 'aside_content', 'aside_content' );

/* ============================================================================================================================================= */

	function link_content( $atts, $content = "" )
	{
		$link_content = '<div class="link-content">' . do_shortcode( $content ) . '</div>';
		
		return $link_content;
	}
	// end link_content
  
	add_shortcode( 'link_content', 'link_content' );

/* ============================================================================================================================================= */

	function inline_lightbox_wrap( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'type' => "",
										'thumbnail' => "",
										'alt' => "" ), $atts ) );
		
		$inline_lightbox_wrap = '<div class="inline-lightbox ' . $type . '">';
		$inline_lightbox_wrap .= '<div class="media-box">';
		$inline_lightbox_wrap .= '<img  alt="' . $alt . '" src="' . $thumbnail . '">';
		$inline_lightbox_wrap .= '<div class="mask">';
		$inline_lightbox_wrap .= '<div class="portfolio-info"></div>';
		$inline_lightbox_wrap .= do_shortcode( $content );
		$inline_lightbox_wrap .= '</div>';
		$inline_lightbox_wrap .= '</div>';
		$inline_lightbox_wrap .= '</div>';
		
		return $inline_lightbox_wrap;
	}
	// end inline_lightbox_wrap
  
	add_shortcode( 'inline_lightbox_wrap', 'inline_lightbox_wrap' );

/* ============================================================================================================================================= */

	function inline_lightbox_image( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'first_image' => "",
										'gallery' => "",
										'title' => "",
										'url' => "" ), $atts ) );
										
		if ( $first_image == 'yes' )
		{
			$first_image_out = "";
		}
		else
		{
			$first_image_out = 'hidden';
		}
		
		$inline_lightbox_image = '<a class="lightbox ' . $first_image_out . '" data-lightbox-gallery="fancybox-item-' . $gallery . '" title="' . $title . '" href="' . $url . '"></a>';
		
		return $inline_lightbox_image;
	}
	// end inline_lightbox_image
  
	add_shortcode( 'inline_lightbox_image', 'inline_lightbox_image' );

/* ============================================================================================================================================= */

	function inline_lightbox_video( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'gallery' => "",
										'title' => "",
										'url' => "" ), $atts ) );
										
		
		$inline_lightbox_video = '<a class="lightbox iframe" data-lightbox-gallery="fancybox-item-' . $gallery . '" title="' . $title . '" href="' . $url . '"></a>';
		
		return $inline_lightbox_video;
	}
	// end inline_lightbox_video
  
	add_shortcode( 'inline_lightbox_video', 'inline_lightbox_video' );

/* ============================================================================================================================================= */

	function inline_lightbox_audio( $atts, $content = "" )
	{
		extract( shortcode_atts( array( 'gallery' => "",
										'title' => "",
										'url' => "" ), $atts ) );
										
		
		$inline_lightbox_audio = '<a class="lightbox iframe" data-lightbox-gallery="fancybox-item-' . $gallery . '" title="' . $title . '" href="' . $url . '"></a>';
		
		return $inline_lightbox_audio;
	}
	// end inline_lightbox_audio
  
	add_shortcode( 'inline_lightbox_audio', 'inline_lightbox_audio' );

/* ============================================================================================================================================= */

	if ( is_admin() )
	{
		include_once 'theme-options.php';
	}

/* ============================================================================================================================================= */

	include_once 'shortcode-generator.php';

/* ============================================================================================================================================= */

	function theme_customize_register( $wp_customize )
	{
		$wp_customize->add_section( 'section_colors' , array( 'title' => __( 'Colors', 'read' ), 'priority' => 30 ) );
		
		/* ========================= */
		
		$wp_customize->add_setting( 'setting_link_color', array( 'default' => '#ce6607', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'control_link_color', array( 'label' => __( 'Link Color', 'read' ),
																												'section' => 'section_colors',
																												'settings' => 'setting_link_color' ) ) );
		
		/* ========================= */
		
		$wp_customize->add_setting( 'setting_link_hover_color', array( 'default' => '#a35208', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'control_link_hover_color', array(   'label' => __( 'Link Hover Color', 'read' ),
																														'section' => 'section_colors',
																														'settings' => 'setting_link_hover_color' ) ) );
		
		/* ========================= */
		
		$wp_customize->add_setting( 'setting_menu_active_color', array(	'default' => '#cc3300', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'control_menu_active_color', array(  'label' => __( 'Menu Active Color', 'read' ),
																														'section' => 'section_colors',
																														'settings' => 'setting_menu_active_color' ) ) );
		
		/* ================================================== */
		/* ================================================== */
		
		$wp_customize->add_section( 'section_fonts' , array( 'title' => __( 'Fonts', 'read' ), 'priority' => 30 ) );
		
		/* ========================= */
		
		include_once 'fonts.php';
		
		/* ========================= */
		
		$wp_customize->add_setting( 'setting_text_logo_font', array( 'default' => 'UnifrakturMaguntia', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'control_text_logo_font', array(    'label' => 'Text Logo Font',
																		'section' => 'section_fonts',
																		'settings' => 'setting_text_logo_font',
																		'type' => 'select',
																		'choices' => $all_fonts ) );
		
		/* ========================= */
		
		$wp_customize->add_setting( 'setting_heading_font', array( 'default' => 'Coustard', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'control_heading_font', array(	'label' => 'Heading Font',
																	'section' => 'section_fonts',
																	'settings' => 'setting_heading_font',
																	'type' => 'select',
																	'choices' => $all_fonts ) );
		
		/* ========================= */
		
		$wp_customize->add_setting( 'setting_menu_font', array(	'default' => 'Coustard', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'control_menu_font', array(	'label' => 'Menu Font',
																'section' => 'section_fonts',
																'settings' => 'setting_menu_font',
																'type' => 'select',
																'choices' => $all_fonts ) );
		
		/* ========================= */
		
		$wp_customize->add_setting( 'setting_content_font', array( 'default' => 'Lora', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'control_content_font', array(	'label' => 'Content Font',
																	'section' => 'section_fonts',
																	'settings' => 'setting_content_font',
																	'type' => 'select',
																	'choices' => $all_fonts ) );
		
		/* ========================= */
		
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		
		$wp_customize->get_setting( 'setting_link_color' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_link_hover_color' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_menu_active_color' )->transport = 'postMessage';
		
		$wp_customize->get_setting( 'setting_text_logo_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_heading_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_menu_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_content_font' )->transport = 'postMessage';
	}
	// end theme_customize_register
	
	add_action( 'customize_register', 'theme_customize_register' );


	function theme_customize_css()
	{
		global $subset;
		
		$extra_font_styles = get_option( 'extra_font_styles', 'No' );
		
		if ( $extra_font_styles == 'Yes' )
		{
			$font_styles = ':300,400,600,700,800,900,300italic,400italic,600italic,700italic,800italic,900italic';
		}
		else
		{
			$font_styles = "";
		}
		// end if
		
		?>

<?php
	$setting_text_logo_font = get_theme_mod( 'setting_text_logo_font', "" );
	
	if ( $setting_text_logo_font != "" )
	{
		echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $setting_text_logo_font . $font_styles . $subset . '">';
	}
?>

<?php
	$setting_heading_font = get_theme_mod( 'setting_heading_font', "" );
	
	if ( $setting_heading_font != "" )
	{
		echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $setting_heading_font . $font_styles . $subset . '">';
	}
?>

<?php
	$setting_menu_font = get_theme_mod( 'setting_menu_font', "" );
	
	if ( $setting_menu_font != "" )
	{
		echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $setting_menu_font . $font_styles . $subset . '">';
	}
?>

<?php
	$setting_content_font = get_theme_mod( 'setting_content_font', "" );
	
	if ( $setting_content_font != "" )
	{
		echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $setting_content_font . $font_styles . $subset . '">';
	}
?>

<style type="text/css">
<?php
	$setting_link_color = get_theme_mod( 'setting_link_color', "" );
	
	if ( $setting_link_color != "" )
	{
		echo 'a { color: ' . $setting_link_color . '; }' . "\n";
	}
?>

<?php
	$setting_link_hover_color = get_theme_mod( 'setting_link_hover_color', "" );
	
	if ( $setting_link_hover_color != "" )
	{
		echo 'a:hover { color: ' . $setting_link_hover_color . '; }' . "\n";
	}
?>

<?php
	$setting_menu_active_color = get_theme_mod( 'setting_menu_active_color', "" );
	
	if ( $setting_menu_active_color != "" )
	{
		echo '.main-navigation ul .current_page_item > a, .main-navigation ul .current-menu-item > a { color: ' . $setting_menu_active_color . '; }' . "\n";
	}
?>

<?php
	$setting_text_logo_font = get_theme_mod( 'setting_text_logo_font', "" );
	
	if ( $setting_text_logo_font != "" )
	{
		echo 'h1.site-title, h1.site-title a { font-family: "' . $setting_text_logo_font . '", Georgia, serif; }' . "\n";
	}
?>

<?php
	$setting_heading_font = get_theme_mod( 'setting_heading_font', "" );
	
	if ( $setting_heading_font != "" )
	{
		echo 'h1, h2, h3, h4, h5, h6 { font-family: "' . $setting_heading_font . '", Georgia, serif; }' . "\n";
	}
?>

<?php
	$setting_menu_font = get_theme_mod( 'setting_menu_font', "" );
	
	if ( $setting_menu_font != "" )
	{
		echo '.main-navigation ul li { font-family: "' . $setting_menu_font . '", Georgia, serif; }' . "\n";
	}
?>

<?php
	$setting_content_font = get_theme_mod( 'setting_content_font', "" );
	
	if ( $setting_content_font != "" )
	{
		echo 'html { font-family: "' . $setting_content_font . '", Georgia, serif; }' . "\n";
	}
?>
</style>
		<?php
	}
	// end theme_customize_css
	
	add_action( 'wp_head', 'theme_customize_css' );
	
	
	function theme_customize_preview_js()
	{
		wp_enqueue_script( 'my-customizer', get_template_directory_uri() . '/js/wp-theme-customizer.js', array( 'customize-preview' ), '1.0', true );
	}
	
	add_action( 'customize_preview_init', 'theme_customize_preview_js' );

/* ============================================================================================================================================= */

	function options_wp_head()
	{
		$custom_css = stripcslashes( get_option( 'custom_css', "" ) );
	
		if ( $custom_css != "" )
		{
			echo '<style type="text/css">' . "\n";
			
				echo $custom_css;
			
			echo "\n" . '</style>' . "\n";
		}
		// end if
		
		
		$external_css = stripcslashes( get_option( 'external_css', "" ) );
		echo $external_css;
		
		
		$tracking_code_head = stripcslashes( get_option( 'tracking_code_head', "" ) );
		echo $tracking_code_head;
	}
	// end options_wp_head
	
	add_action( 'wp_head', 'options_wp_head' );

/* ============================================================================================================================================= */

	function options_wp_footer()
	{
		$external_js = stripcslashes( get_option( 'external_js', "" ) );
		echo $external_js;
		
		
		$tracking_code = stripcslashes( get_option( 'tracking_code', "" ) );
		echo $tracking_code;
	}
	// end options_wp_footer
	
	add_action( 'wp_footer', 'options_wp_footer' );

/* ============================================================================================================================================= */

?>