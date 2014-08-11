<!doctype html>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php echo get_bloginfo( 'charset' ); ?>">
	
	<?php
		$mobile_zoom = get_option( 'mobile_zoom', 'No' );
		
		if ( $mobile_zoom == 'Yes' )
		{
			?>

<meta name="viewport" content="width=device-width, initial-scale=1">

			<?php
		}
		else
		{
			?>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

			<?php
		}
		// end if
	?>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
	<title><?php wp_title( '|', true, 'right' ); ?></title>
    
    <!--[if lte IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>
    <![endif]-->
	
	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
		{
			wp_enqueue_script( 'comment-reply' );
		}
	?>
	
	<?php
		wp_head();
	?>
</head>

<body <?php body_class(); ?>>

    <div id="page" class="hfeed site"> 
        <header class="site-header wrapper" role="banner">
			<div class="row">
			    <hgroup>
					<h1 class="site-title">
						<?php
							$logo_type = get_option( 'logo_type', 'Text Logo' );
							
							if ( $logo_type == 'Text Logo' )
							{
								$select_text_logo = get_option( 'select_text_logo', 'WordPress Site Title' );
								
								if ( $select_text_logo == 'WordPress Site Title' )
								{
									$text_logo_out = get_bloginfo( 'name' );
								}
								else
								{
									$text_logo_out = stripcslashes( get_option( 'theme_site_title', "" ) );
								}
								// end if
								
								?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo $text_logo_out; ?></a>
								<?php
							}
							else
							{
								$logo_image = get_option( 'logo_image', "" );
								
								?>
									<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
										<img alt="<?php bloginfo( 'name' ); ?>" src="<?php echo $logo_image; ?>">
									</a>
								<?php
							}
							// end if
						?>
					</h1>
					<!-- end .site-title -->
					
					<h2 class="site-description">
						<?php
							$select_tagline = get_option( 'select_tagline', 'WordPress Tagline' );
							
							if ( $select_tagline == 'WordPress Tagline' )
							{
								$tagline_out = get_bloginfo( 'description' );
							}
							else
							{
								$tagline_out = stripcslashes( get_option( 'theme_tagline', "" ) );
							}
							// end if
							
							echo $tagline_out;
						?>
					</h2>
					<!-- end .site-description -->
			    </hgroup>
				
				<?php
					if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'header_sidebar' ) ) :
					endif;
				?>
				
			    <nav id="site-navigation" class="main-navigation" role="navigation">
					<?php
						wp_nav_menu( array( 'menu' => 'top_menu',
											'menu_id' => 'nav',
											'menu_class' => "menu-custom",
											'theme_location' => 'top_menu',
											'container' => false,
											'depth' => 0,
											'fallback_cb' => 'wp_page_menu2' ) );
											
											
						$nav_menu_search = get_option( 'nav_menu_search', 'No' );
						
						if ( $nav_menu_search == 'Yes' )
						{
							?>
								<script>
									var nav_menu_search = '<li class="nav-menu-search"><form id="search-form" role="search" method="get" action="<?php echo home_url( "/" ); ?>"><label class="screen-reader-text" for="search"><?php echo __( "Search", "read" ); ?></label><input type="text" id="search" name="s" title="<?php echo __( "Enter keyword", "read" ); ?>" value="" required="required"><input type="submit" id="search-submit" title="<?php echo __( "Search it", "read" ); ?>" value="<?php echo __( "&#8594;", "read" ); ?>"></form></li>';
									
									(function($)
									{
										$( '#site-navigation > ul' ).append( nav_menu_search );
										
									})(jQuery);
								</script>
							<?php
						}
						// end if
					?>
			    </nav>
			    <!-- end #site-navigation -->
			</div>
			<!-- end .row -->
        </header>
        <!-- end .site-header -->
		
		<?php
			$blog_type = get_option( 'blog_type', 'Sidebar' );
			
			$post_sidebar = get_option( 'post_sidebar', 'Yes' );
			
			if ( ( $blog_type == 'Sidebar' ) || ( $post_sidebar == 'Yes' ) )
			{
				if ( is_home() || is_archive() || is_single() || is_page_template( 'page-sidebar.php' ) )
				{
					$blog_type_out = 'blog-with-sidebar';
				}
				// end if
			}
			else
			{
				$blog_type_out = "";
			}
			// end if
		?>
		
        <section id="main" class="middle wrapper">
			<div class="row row-fluid <?php echo $blog_type_out; ?>">