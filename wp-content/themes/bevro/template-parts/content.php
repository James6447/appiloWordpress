<?php
/**
 * Template part for displaying posts
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$blog_layout_classes = apply_filters( 'bevro_blog_post_layout_class','');
	$postformat = get_post_format();
    ?>
	<div class="entry-content-outer-wrapper <?php echo esc_attr($blog_layout_classes);?>" >
	    <?php 
	    if($blog_layout_classes=='brv-blog-layout-1'){
	       bevro_blog_post_thumbnai_and_title_order();
	       bevro_the_excerpt();
	       do_action( 'bevro_blog_post_featured_format' );
	      } else { ?>
           <?php $no_thumb=''; if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){
              if(($postformat!=='gallery')&&($postformat!=='video')&&($postformat!=='audio')&&($postformat!=='quote')):

            ?>
			<div class="post-img-wrapper">
		    <div class="post-img">
		    <?php echo apply_filters( 'bevro_post_date_box','');?>
			<a href="<?php the_permalink() ?>"> <?php the_post_thumbnail('post_thumbnail_loop'); ?></a>
			</div>
	        </div>
			<?php endif;}else{
				$no_thumb='no-thumb';
			} ?>    
		    <div class="entry-content-wrapper <?php echo esc_attr($no_thumb);?>">
		    <?php if($no_thumb=='no-thumb'){
		    	echo apply_filters( 'bevro_post_date_box','');
		    }?>
			<?php 
			$postformat = get_post_format();
            if($postformat!=='aside'):
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); 
		    endif;
			?>
			<?php bevro_blog_get_post_meta();?>
			<?php bevro_the_excerpt();
			 do_action( 'bevro_blog_post_featured_format' );?> 
		    </div>  
	      <?php }	 
		?>     
	</div>
</article>