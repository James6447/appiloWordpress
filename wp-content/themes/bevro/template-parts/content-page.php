<?php
/**
 * Template part for displaying page content in page.php
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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-header entry-page">
<?php	
 bevro_page_feature_img_post_meta($bevro_disable_feature_image_dyn); 
 echo esc_attr(bevro_page_title_post_meta($bevro_disable_title_dyn)); ?>
</div>
	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bevro' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Edit <span class="screen-reader-text">%s</span>', 'bevro' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post -->
