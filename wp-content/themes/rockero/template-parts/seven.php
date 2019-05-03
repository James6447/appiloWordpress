<div class="rockero-seven-container">

	<?php

		$rockeroSevenWelcomePostTitle = '';
		$rockeroSevenWelcomePostDesc = '';
		$rockeroSevenWelcomePostContent = '';
	
		if( '' != get_theme_mod('rockero_seven_welcome_post') && 'select' != get_theme_mod('rockero_seven_welcome_post') ):

			$rockeroSevenWelcomePostId = get_theme_mod('rockero_seven_welcome_post');

			if( ctype_alnum($rockeroSevenWelcomePostId) ){

				$rockeroSevenWelcomePost = get_post( $rockeroSevenWelcomePostId );

				$rockeroSevenWelcomePostTitle = $rockeroSevenWelcomePost->post_title;
				$rockeroSevenWelcomePostDesc = $rockeroSevenWelcomePost->post_excerpt;
				$rockeroSevenWelcomePostContent = rockero_limitedstring($rockeroSevenWelcomePost->post_content, 300);

			}

	?>	
	
	<div class="rockero-seven-welcome-container">

		<h2><?php echo esc_html($rockeroSevenWelcomePostTitle); ?></h2>
		<div class="rockero-seven-welcome-content">
			<p>
			<?php 
				
				if( '' != $rockeroSevenWelcomePostDesc ){
					
					echo esc_html($rockeroSevenWelcomePostDesc);
					
				}else{
					
					echo esc_html($rockeroSevenWelcomePostContent);
					
				} 
				
			?>	
			</p>
		</div>

	</div><!-- .rockero-seven-welcome-container -->
	<?php endif; ?>

	<div class="rockero-seven-work-container">

		<?php if( '' != get_theme_mod('rockero_portfolio_heading') ): ?>
		<h2><?php echo esc_html(get_theme_mod('rockero_portfolio_heading')); ?></h2>
		<?php endif; ?>
		
		<?php if( '' != get_theme_mod('rockero_portfolio_text') ): ?>
		<p><?php echo esc_html(get_theme_mod('rockero_portfolio_text')); ?></p>
		<?php endif; ?>

		<div class="rockero-seven-work-content">
			
			<?php 
			
				if( '' != get_theme_mod('rockero_portfolio_cat') && 'select' != get_theme_mod('rockero_portfolio_cat') ): 		

				$rockero_portfolio_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> 8,
				   'cat' => get_theme_mod('rockero_portfolio_cat')
				);

				$rockero_portfolio = new WP_Query($rockero_portfolio_args);		

				if ( $rockero_portfolio->have_posts() ) : while ( $rockero_portfolio->have_posts() ) : $rockero_portfolio->the_post();
   			?> 
			
			<div class="rockero-seven-work-item">

				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('rockero-home-posts');
					}else{
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/frontsix.png" />';
					}						
				?>

			</div><!-- .rockero-seven-work-item -->			
			
			<?php endwhile; wp_reset_postdata(); endif; endif;?>			

		</div>

	</div><!-- .rockero-seven-work-container -->

	

	<?php

		$rockeroSevenAboutPostTitle = '';
		$rockeroSevenAboutPostDesc = '';
		$rockeroSevenAboutPostContent = '';
	
		if( '' != get_theme_mod('rockero_seven_about_post') && 'select' != get_theme_mod('rockero_seven_about_post') ):

			$rockeroSevenAboutPostId = get_theme_mod('rockero_seven_about_post');

			if( ctype_alnum($rockeroSevenAboutPostId) ){

				$rockeroSevenAboutPost = get_post( $rockeroSevenAboutPostId );

				$rockeroSevenAboutPostTitle = $rockeroSevenAboutPost->post_title;
				$rockeroSevenAboutPostDesc = $rockeroSevenAboutPost->post_excerpt;
				$rockeroSevenAboutPostContent = rockero_limitedstring($rockeroSevenAboutPost->post_content, 150);

			}

	?>
	<div class="rockero-seven-about-container">

		<h2><?php echo esc_html($rockeroSevenAboutPostTitle); ?></h2>
		<div class="rockero-seven-about-content">
			<p>
			<?php 
				
				if( '' != $rockeroSevenAboutPostDesc ){
					
					echo esc_html($rockeroSevenAboutPostDesc);
					
				}else{
					
					echo esc_html($rockeroSevenAboutPostContent);
					
				} 
				
			?>	
			</p>
		</div>

	</div><!-- .rockero-seven-about-container -->
	<?php endif; ?>

</div><!-- .rockero-seven-container -->