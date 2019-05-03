<?php
/**
 * Template part for displaying single post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
$bevro_disable_title_dyn = get_post_meta($post->ID, 'bevro_disable_title_dyn', true );
$bevro_disable_feature_image_dyn = get_post_meta($post->ID, 'bevro_disable_feature_image_dyn', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(apply_filters( 'bevro_single_post_ftr_img_space_classes','')); ?>>
<div class="bevro-single-content">
<?php bevro_single_post_thumbnai_and_title_order($bevro_disable_title_dyn,$bevro_disable_feature_image_dyn); ?>
	<div class="entry-content-wrapper">
		<div class="entry-content">
			<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bevro' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bevro' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .entry-content-wrapper -->
</div>
</article><!-- #post -->
