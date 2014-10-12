<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
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
			<a <?php echo $hide_post_title_out; ?> href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
	</header>
	
	
	<footer class="entry-meta">
		<span class="post-category">
			<?php
				echo __( 'posted in', 'read' );
				
				echo ' ';
				
				the_category( ', ' );
			?>
		</span>
		
		
		<span class="post-date">
			<?php echo __( 'on', 'read' ); ?> <a href="<?php the_permalink(); ?>" title="<?php the_time(); ?>" rel="bookmark"><time class="entry-date" datetime="2012-11-09T23:15:57+00:00"><?php echo get_the_date(); ?></time></a>
		</span>
		
		
		<span class="by-author"> <?php echo __( 'by', 'read' ); ?>
			<span class="author vcard">
				<a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo __( 'View all posts by ', 'read' ) . get_the_author(); ?>" rel="author"><?php the_author(); ?></a>
			</span>
		</span>
		
		
		<span class="comments-link">
			<?php
				comments_popup_link( __( '0 Comment', 'read' ), __( '1 Comment', 'read' ), __( '% Comments', 'read' ) );
			?>
		</span>
		
		
		<?php
			edit_post_link( __( 'Edit', 'read' ), '<span class="edit-link">', '</span>' );
		?>
	</footer>
	
	
	<?php
		if ( has_post_thumbnail() )
		{
			?>
				<div class="featured-image">
					<?php
						the_post_thumbnail( 'blog_feat_img', array( 'alt' => get_the_title(), 'title' => "" ) );
					?>
				</div>
			<?php
		}
	?>
	
	
	<div class="entry-content clearfix">
		<?php
			if ( has_excerpt() )
			{
				the_excerpt();
				
				echo '<a class="more-link" href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&#8594;</span>', 'read' ) . '</a>';
			}
			else
			{
				$theme_excerpt = get_option( 'theme_excerpt', 'No' );
				
				if ( $theme_excerpt == 'Yes' )
				{
					the_excerpt();
				}
				elseif ( $theme_excerpt == 'standard' )
				{
					$format = get_post_format();
					
					if ( $format == false )
					{
						the_excerpt();
					}
					else
					{
						the_content( __( 'Continue reading <span class="meta-nav">&#8594;</span>', 'read' ) );
					}
				}
				else
				{
					the_content( __( 'Continue reading <span class="meta-nav">&#8594;</span>', 'read' ) );
				}
			}
		?>
		
		
		<?php
			wp_link_pages( array( 'before' => '<div class="page-links clearfix">' . __( 'Pages:', 'read' ), 'after' => '</div>' ) );
		?>
	</div>
</article>