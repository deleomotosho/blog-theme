<form role="search" id="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
	<div>
		<label class="screen-reader-text" for="s"><?php echo __( 'Search for:', 'read' ); ?></label>
		
		<input type="text" id="s" name="s" value="<?php the_search_query(); ?>" required="required" placeholder="<?php echo __( 'Enter keyword...', 'read' ); ?>">
		
		<input type="submit" id="searchsubmit" value="<?php echo __( 'Search', 'read' ); ?>">
	</div>
</form>