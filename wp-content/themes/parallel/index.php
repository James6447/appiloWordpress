<?php
/**
 * Index for our theme
 * @subpackage Parallel
 * @since Parallel 1.0
 */
?>
<?php get_header(); ?>

<?php { if ( is_front_page() ) { get_template_part('sections/default'); } } ?>

<div class="container">
	
    <div class="row">

		<div class="<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-md-12<?php else : ?>col-md-12<?php endif; ?>">
			
            <div class="content row">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" class="col-6 col-md-3" <?php post_class(); ?>>

                <?php if(get_the_post_thumbnail()) { ?><figure class="post-image"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('parallel-post-thumbnails',array('class'=>'img-responsive')); ?></a></figure><?php } ?>

                <div class="clearfix"></div>

                <p class="entry-title text-right"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>

<!--                <ul class="pagemeta">-->
<!---->
<!--                    <li><i class="fa fa-clock-o"></i>--><?php //the_time( get_option( 'date_format' ) ); ?><!--</li>-->
<!---->
<!--                    <li><i class="fa fa-bookmark"></i>--><?php //the_category(', '); ?><!--</li>-->
<!---->
<!--                    <li><i class="fa fa-comment"></i>--><?php //printf( esc_html( _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'parallel' ) ),number_format_i18n( get_comments_number() ), get_the_title() ); ?><!--</li>-->
<!---->
<!--                	<li><i class="fa fa-user"></i><a href="--><?php //echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ))); ?><!--"><span class="vcard author author_name"><span class="fn">--><?php //the_author(); ?><!--</span></span></a></li>-->
<!---->
<!--                </ul>-->
<!---->
<!--                <div class="entry">-->
<!---->
<!--                    --><?php //the_excerpt(); ?>
<!---->
<!--                </div>-->

                <div class="clearfix"></div>

            </article>

            <?php endwhile;?>

            <?php endif; ?>
			
			<?php the_posts_pagination( array(
			    'mid_size' => 2,
			    'prev_text' => __( 'Previous', 'parallel' ),
			    'next_text' => __( 'Next', 'parallel' ),
			    'screen_reader_text' => __( '&nbsp;', 'parallel' ),
			) ); ?>

			</div><!--content-->

            <div class="text-center">
                <a href="#" class="btn btn-lg btn-secondary">BROWSE ILLUSTRATIONS</a>
            </div>
		
        </div>



		<?php get_sidebar(); ?>

	</div>

</div>

<div class="hero-background">
    <div class="container">
        <div class="title">
            <h1>Made with love</h1>
        </div>

        <div class="row">
            <div class="lead col-12 col-md-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pellentesque accumsan sodales. Suspendisse id malesuada nisl. Quisque euismod eros quis dapibus commodo. Maecenas dignissim purus nec tortor volutpat placerat. In convallis massa ultrices elementum laoreet. Nunc at dui ac est ultrices egestas. Integer at turpis id quam ornare eleifend et ut diam. Nulla nec sollicitudin enim. Donec at vehicula orci. Nulla turpis justo, dictum eget tortor ac, auctor volutpat lacus. Praesent in eros enim.</p>
            </div>

            <div class="lead col-12 col-md-6 idex-desc">
                <img src="http://localhost:8000/wp-content/uploads/2019/05/Screenshot-2019-05-03-at-11.49.17-AM.png">
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>