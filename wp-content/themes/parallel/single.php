<?php
/**
 * Single Posts for our theme
 
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php get_header(); ?>

<div class="container">

	<div class="row">

		<div class="<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-md-12<?php else : ?>col-md-12<?php endif; ?>">
        
			<div class="content">
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
                <article id="post-<?php the_ID(); ?>" class="post-details row" <?php post_class(); ?>>
                    
                    <?php if(get_the_post_thumbnail()) { ?><figure class="post-image col-md-4 col-xs-12"><?php the_post_thumbnail('large',array('class'=>'img-responsive')); ?></figure><?php } ?>
                    
<!--                    <div class="clearfix"></div>-->
                     <div class="post-description col-md-6 col-xs-12">

                         <div class="title">
                            <h1><?php the_title(); ?></a></h1>
                         </div>

    <!--                    <ul class="pagemeta">-->
    <!--                    -->
    <!--                        <li><i class="fa fa-clock-o"></i>--><?php //the_time( get_option( 'date_format' ) ); ?><!--</li>-->
    <!--                    -->
    <!--                        <li><i class="fa fa-bookmark"></i>--><?php //the_category(', '); ?><!--</li>-->
    <!--                    -->
    <!--                        <li><i class="fa fa-comment"></i>--><?php //printf( esc_html( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'parallel' ) ),number_format_i18n( get_comments_number() ), get_the_title() ); ?><!--</li>-->
    <!--                    -->
    <!--                        <li><i class="fa fa-user"></i><a href="--><?php //echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?><!--"><span class="vcard author author_name"><span class="fn">--><?php //the_author(); ?><!--</span></span></a></li>-->
    <!--                    -->
    <!--                    </ul>-->

                        <div class="entry">

                          <?php the_content(); ?>

                        </div>

                     </div>
            
                    <div class="clearfix"></div>
            
                </article>                
			
			<?php wp_link_pages(); ?> 
			
			<?php endwhile;?>


			<?php endif; ?>

			</div>

		</div>

        <div class="col-md-12">
            <h1>Pricing</h1>
        </div>

        <div class="post-details col-md-12">
            <div class="block col-md-12">
                <div class="left">
                    <h4>Web small</h4>
                    <p>867x577, 12"x8" @72dpi <a>read full license</a></p>
                </div>

                <div class="right">
                    <h4>$10.00</h4>
                    <div class="text-center">
                        <a href="#" class="btn btn-lg btn-secondary">BUY ILLUSTRATIONS</a>
                    </div>
                </div>
            </div>

            <div class="block col-md-12">
                <div class="left">
                    <h4>Web small</h4>
                    <p>867x577, 12"x8" @72dpi <a>read full license</a></p>
                </div>

                <div class="right">
                    <h4>$10.00</h4>
                    <div class="text-center">
                        <a href="#" class="btn btn-lg btn-secondary">BUY ILLUSTRATIONS</a>
                    </div>
                </div>
            </div>

            <div class="block col-md-12">
                <div class="left">
                    <h4>Web small</h4>
                    <p>867x577, 12"x8" @72dpi <a>read full license</a></p>
                </div>

                <div class="right">
                    <h4>$10.00</h4>
                    <div class="text-center">
                        <a href="#" class="btn btn-lg btn-secondary">BUY ILLUSTRATIONS</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="post-refund col-md-12">
            <img src="http://localhost:8000/wp-content/uploads/2019/05/money-back-badge-3x.png">
            <p>14-day money-back guarantee</p>
        </div>

        <div class="post-slide col-md-12">
            <div class="block">

            <?php echo do_shortcode('[metaslider id="66"]'); ?>

            </div>
        </div>
<!--		--><?php //get_sidebar(); ?>

	</div>
    
</div>

<?php get_footer(); ?>