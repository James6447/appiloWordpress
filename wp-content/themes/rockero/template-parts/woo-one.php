<div class="wooOneContainer">

	<div class="wooOneWelcomeContainer">
		
			<?php
			
				if( '' != get_theme_mod('rockero_wooone_welcome_post') && 'select' != get_theme_mod('rockero_wooone_welcome_post') ):
		
				$rockeroWelcomePostTitle = '';
				$rockeroWelcomePostDesc = '';

				$rockeroWelcomePostId = get_theme_mod('rockero_wooone_welcome_post');

				if( ctype_alnum($rockeroWelcomePostId) ){

						$rockeroWelcomePost = get_post( $rockeroWelcomePostId );

						$rockeroWelcomePostTitle = $rockeroWelcomePost->post_title;
						$rockeroWelcomePostDesc = $rockeroWelcomePost->post_excerpt;
						$rockeroWelcomePostContent = $rockeroWelcomePost->post_content;

				}			
			
			?>
			
			<h1><?php echo esc_html($rockeroWelcomePostTitle); ?></h1>
			<div class="wooOneWelcomeContent">
				<p>
					<?php 
					
						if( '' != $rockeroWelcomePostDesc ){
							
							echo esc_html($rockeroWelcomePostDesc);
							
						}else{
							
							echo esc_html($rockeroWelcomePostContent);
							
						}
					
					?>
				</p>
			</div><!-- .wooOneWelcomeContent -->
			<?php endif; ?>
		
	</div><!-- .wooOneWelcomeContainer -->
	
	
	<div class="new-arrivals-container">
		
		<?php 
					
			if( 'no' != get_theme_mod('rockero_show_wooone_heading') ): 
			
				$rockeroWooOneLatestHeading = __('Latest Products', 'rockero');	
				$rockeroWooOneLatestText = __('Some of our latest products', 'rockero');
			
					
				if( '' != get_theme_mod('rockero_wooone_latest_heading') ){
					$rockeroWooOneLatestHeading = get_theme_mod('rockero_wooone_latest_heading');
				}
				
				if( '' != get_theme_mod('rockero_wooone_latest_text') ){
					$rockeroWooOneLatestText = get_theme_mod('rockero_wooone_latest_text');
				}				
			
					
		?>
		<div class="new-arrivals-title">
		
			<h3><?php echo esc_html($rockeroWooOneLatestHeading); ?></h3>
			<p><?php echo esc_html($rockeroWooOneLatestText); ?></p>
		
		</div><!-- .new-arrivals-title -->
		<?php endif; ?>
		
		<?php
			
			$rockeroWooOnePaged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
			
			$rockero_front_page_ecom = array(
				'post_type' => 'product',
				'paged' => $rockeroWooOnePaged
			);
			$rockero_front_page_ecom_the_query = new WP_Query( $rockero_front_page_ecom );
			
			$rockero_front_page_temp_query = $wp_query;
			$wp_query   = NULL;
			$wp_query   = $rockero_front_page_ecom_the_query;
			
		?>		
		
		<div class="new-arrivals-content">
		<?php if ( have_posts() && post_type_exists('product') ) : ?>
		
		
			<div class="rockero-woocommerce-content">
			
				<ul class="products">
			
					<?php /* Start the Loop */ ?>
					<?php while ( $rockero_front_page_ecom_the_query->have_posts() ) : $rockero_front_page_ecom_the_query->the_post(); ?>			
					<?php wc_get_template_part( 'content', 'product' ); ?>
					<?php endwhile; ?>
				
				</ul><!-- .products -->
				
				<?php //the_posts_navigation(); ?>
				
				<?php rockero_pagination( $rockeroWooOnePaged, $rockero_front_page_ecom_the_query->max_num_pages); // Pagination Function ?>
				
			</div><!-- .rockero-woocommerce-content -->
			
		<?php else : ?>
		
			<p><?php echo __('Please install wooCommerce and add products.', 'rockero') ?></p>

		<?php 
			
			endif; 
			wp_reset_postdata();
			$wp_query = NULL;
			$wp_query = $rockero_front_page_temp_query;
		?>			
		
		
		</div><!-- .new-arrivals-content -->		
	
	</div><!-- .new-arrivals-container -->	

</div>