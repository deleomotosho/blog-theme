			</div>
			<!-- end .row .row-fluid -->
        </section>
        <!-- end #main -->
		
        <footer class="site-footer wrapper" role="contentinfo">
			<div class="row">
				<div id="supplementary" class="row-fluid">
					<?php
						$footer_widget_locations = get_option( 'footer_widget_locations', 'No' );
						
						if ( $footer_widget_locations == 'Yes' )
						{
							get_template_part( 'footer', 'widgets' );
						}
					?>
				</div>
				<!-- end #supplementary -->
				
				<div class="site-info">
					<?php
						$copyright_text = stripcslashes( get_option( 'copyright_text', "" ) );
						
						echo $copyright_text;
					?>
				</div>
				<!-- end .site-info -->
			</div>
			<!-- end .row -->
        </footer>
        <!-- end .site-footer -->
    </div>
    <!-- end #PAGE -->
	
	<?php
		wp_footer();
	?>
</body>
</html>