<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<!-- layout class call -->
<?php 
$bevro_default_container    = get_theme_mod('bevro_default_container','boxed');
$bevro_main_header_layout   = get_theme_mod('bevro_main_header_layout','mhdrleft');
$bevro_above_header_layout  = get_theme_mod('bevro_above_header_layout','abv-two');
$bevro_bottom_header_layout = get_theme_mod('bevro_bottom_header_layout','abv-two');
// add-pro-feature
$bevro_container_site_layout = get_theme_mod('bevro_container_site_layout','fullwidth');
// page post meta
if ((is_single() || is_page()) || ((class_exists( 'WooCommerce' ))&&(is_woocommerce() || is_checkout() || is_cart() || is_account_page()))
 ){
    if(class_exists( 'WooCommerce' ) && is_shop()){
               $shop_page_id = get_option( 'woocommerce_shop_page_id' );
               $postid=$shop_page_id;	
        }else{
	           $postid=$post->ID;	
             }
              $bevro_transparent_header_dyn = get_post_meta($postid, 'bevro_transparent_header_dyn', true );
              $bevro_disable_main_header_dyn = get_post_meta($postid, 'bevro_disable_main_header_dyn', true );
	          $bevro_disable_above_header_dyn = get_post_meta($postid, 'bevro_disable_above_header_dyn', true );
	          $bevro_disable_bottom_header_dyn = get_post_meta($postid, 'bevro_disable_bottom_header_dyn', true );
	          if(is_search() || is_404()){
                     $bevro_sticky_header_dyn='';
               }else{
                     $bevro_sticky_header_dyn = get_post_meta($postid, 'bevro_sticky_header_dyn', true );
                   }
     }else{
      $bevro_disable_above_header_dyn='';	
      $bevro_disable_main_header_dyn='';
      $bevro_disable_bottom_header_dyn='';
      $bevro_transparent_header_dyn='';
      $bevro_sticky_header_dyn='';
     }
?>
<!-- layout class call -->
<body <?php body_class(array(esc_attr($bevro_default_container), esc_attr($bevro_main_header_layout), esc_attr($bevro_above_header_layout),esc_attr($bevro_container_site_layout))); ?>>
<?php if(get_theme_mod('bevro_scroll_to_top_disable')==false):?>	
<input type="hidden" id="back-to-top" value="on"/>
<?php endif;?>
<?php if(get_theme_mod('bevro_stick_hide_scroll_down')==true):?>	
<input type="hidden" id="header-scroll-down-hide" value="on"/>
<?php endif;?>
<?php bevro_preloader();?>
<div id="page" class="bevro-site">
<header class="<?php echo esc_attr($bevro_main_header_layout);?> <?php if(function_exists('bevro_sticky_above_header_class')){
	echo esc_attr(bevro_sticky_above_header_class($bevro_sticky_header_dyn));
}?> <?php if(function_exists('bevro_sticky_main_header_class')){
	echo esc_attr(bevro_sticky_main_header_class($bevro_sticky_header_dyn));
}?> <?php if(function_exists('bevro_sticky_bottom_header_class')){
	echo esc_attr(bevro_sticky_bottom_header_class($bevro_sticky_header_dyn));
}?> <?php if(function_exists('bevro_stick_animation_class')){ echo esc_attr(bevro_stick_animation_class());} ?> <?php echo esc_attr(bevro_header_transparent_class($bevro_transparent_header_dyn));?>">
	<?php if($bevro_main_header_layout=='mhdrrightpan' || $bevro_main_header_layout=='mhdrleftpan'):?>
		<div class="header-pan-icon">
		<span class="pan-icon">
		</span>
		</div>
		<div class="pan-content">
		<div class="container">
		<?php bevro_logo();?>
	    </div>
	<?php endif;?>
    <!-- minbar header -->
	<?php if($bevro_main_header_layout=='mhdminbarleft' || $bevro_main_header_layout=='mhdminbarright'){?>
	<?php bevro_minbar_header_markup();?>
	<div class="pan-content">	
	<?php } ?>
    <!-- end minbar header -->
	<!-- top-header start -->
	<?php 
	bevro_header_abv_post_meta($bevro_disable_above_header_dyn);
    bevro_header_main_post_meta($bevro_disable_main_header_dyn);
	bevro_header_btm_post_meta($bevro_disable_bottom_header_dyn); ?>
	<!-- bottom-header end-->
    <?php if($bevro_main_header_layout=='mhdrrightpan' || $bevro_main_header_layout=='mhdrleftpan'):?>
	</div>
	<?php endif;?>
	<?php if($bevro_main_header_layout=='mhdminbarleft'){?>
	</div>	
	<?php } ?>
</header>
