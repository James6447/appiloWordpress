    <div class="site-slider rockero-owl-basic">

        <div id="rockero-owl-basic" class="owl-carousel owl-theme">
    
    		<?php 
			
				if(get_theme_mod('rockero_slider_num')){
					$rockero_slider_num = get_theme_mod('rockero_slider_num');
				}else{
					$rockero_slider_num = '5';
				}
			
				if(get_theme_mod('rockero_slider_cat')){
					$rockero_slider_cat = get_theme_mod('rockero_slider_cat');
				}else{
					$rockero_slider_cat = 0;
				}			
			
				$rockero_slider_args = array(
                    // Change these category SLUGS to suit your use.
                    'ignore_sticky_posts' => 1,
                    'post_type' => array('post'),
                    'posts_per_page'=> $rockero_slider_num,
					'cat' => $rockero_slider_cat
               );
        
			   $rockero_slider = new WP_Query($rockero_slider_args);
			
            if ( $rockero_slider->have_posts() ) : ?>            
			<?php /* Start the Loop */ ?>
			<?php while ( $rockero_slider->have_posts() ) : $rockero_slider->the_post(); ?>
            <div class="owl-carousel-slide">
                
                <?php if ( has_post_thumbnail()) : ?>	
                <?php the_post_thumbnail('rockero-owl'); ?>
                <?php else : ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/2000.png">
                <?php endif; ?>
                
                <div class="owl-carousel-caption-container">
                    <h3>
						<a href="<?php the_permalink() ?>">
						<?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="owl-carousel-caption">
						<p><?php echo rockero_limitedstring(get_the_excerpt()); ?></p>
						<p><a href="<?php the_permalink() ?>">Read More</a></p>

					</div>
                </div>
                 	
            </div>
    		<?php endwhile; wp_reset_postdata(); endif; ?>
            
         </div>
    
    </div><!-- .site-slider --> 