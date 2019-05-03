<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */ 
if ( is_single() || is_page() ){
$bevro_disable_above_footer_dyn  = get_post_meta( $post->ID, 'bevro_disable_above_footer_dyn', true );
$bevro_disable_footer_widget_dyn = get_post_meta( $post->ID, 'bevro_disable_footer_widget_dyn', true ); 
$bevro_disable_bottom_footer_dyn = get_post_meta( $post->ID, 'bevro_disable_bottom_footer_dyn', true ); 
}else{
$bevro_disable_above_footer_dyn  ='';
$bevro_disable_footer_widget_dyn ='';
$bevro_disable_bottom_footer_dyn ='';
}
?>
<footer>
	<?php if(get_theme_mod('bevro_stick_footer_active')==true){ ?>
<div class="footer-sticky-icon">
	<span class="footer-icon">
	</span>
</div>
<?php } ?>
	<div class="footer-wrap widget-area">
	<?php 
		bevro_footer_abv_post_meta($bevro_disable_above_footer_dyn);
		bevro_footer_widget_post_meta($bevro_disable_footer_widget_dyn);
	    bevro_footer_bottom_post_meta($bevro_disable_bottom_footer_dyn);
	?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>