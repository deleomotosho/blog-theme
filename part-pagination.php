<?php
	$pagination = get_option( 'pagination', 'No' );
	
	if ( $pagination == 'Yes' )
	{
		?>
			<!-- post pagination -->
			<nav class="post-pagination">
				<?php
					oxo_pagination( array() );
				?>
			</nav>
			<!-- end post pagination -->
		<?php
	}
	else
	{
		?>
			<!-- post nav -->
			<nav class="navigation" role="navigation">
				<div class="nav-previous"><?php next_posts_link( __( '&#8592; Older posts', 'read' ) ); ?></div>
				
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts &#8594;', 'read' ) ); ?></div>
			</nav>
			<!-- end post nav -->
		<?php
	}
	// end if
?>