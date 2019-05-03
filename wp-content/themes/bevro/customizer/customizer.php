<?php 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function bevro_customize_register( $wp_customize ){
/**
 * Register Sections & Panels
*/
require BEVRO_THEME_DIR . 'customizer/register-panels-and-sections.php';
//site identity
require BEVRO_THEME_DIR . 'customizer/site-identity-customizer.php';
//container option 
require BEVRO_THEME_DIR . 'customizer/section/layout/container.php';
//header option 
require BEVRO_THEME_DIR . 'customizer/section/layout/main-header.php';
require BEVRO_THEME_DIR . 'customizer/section/layout/above-header.php';
require BEVRO_THEME_DIR . 'customizer/section/layout/bottom-header.php';
require BEVRO_THEME_DIR . 'customizer/section/layout/sticky-header.php';
require BEVRO_THEME_DIR . 'customizer/section/layout/social-icon.php';
require BEVRO_THEME_DIR . 'customizer/section/layout/search.php';
//sidebar option
require BEVRO_THEME_DIR . 'customizer/section/layout/sidebar-setting.php';
//blog option
require BEVRO_THEME_DIR . 'customizer/section/layout/blog-archive.php';
//blog single option
require BEVRO_THEME_DIR . 'customizer/section/layout/blog-single.php';
//Scroll to top option
require BEVRO_THEME_DIR . 'customizer/section/layout/scroll-to-top.php';
//footer option
require BEVRO_THEME_DIR . 'customizer/section/layout/above-footer.php';
require BEVRO_THEME_DIR . 'customizer/section/layout/widget-footer.php';
require BEVRO_THEME_DIR . 'customizer/section/layout/bottom-footer.php';
//Button
require BEVRO_THEME_DIR . 'customizer/section/layout/button.php';
//Loader
require BEVRO_THEME_DIR . 'customizer/section/layout/loader.php';
//gloabal color and background
require BEVRO_THEME_DIR . 'customizer/section/color/gloabal_color_background.php';
//Hamburger color and background
require BEVRO_THEME_DIR . 'customizer/section/color/hamburger_color.php';
//****************/
//Typography
//****************/
require BEVRO_THEME_DIR . 'customizer/customizer-font-selector/class/class-bevro-font-selector.php';
require BEVRO_THEME_DIR . 'customizer/section/typography/base-typography.php';
//*********************/
//WooCommerce
//*********************/
require BEVRO_THEME_DIR . 'inc/woocommerce/register-woocommerce-panels-and-sections.php';
// sale-badges
require BEVRO_THEME_DIR . 'inc/woocommerce/customizer/section/layout/general-sale-badges.php';
// cart
require BEVRO_THEME_DIR . 'inc/woocommerce/customizer/section/layout/cart.php';

// shop-page
require BEVRO_THEME_DIR . 'inc/woocommerce/customizer/section/layout/shop-page.php';
// single-product-page
require BEVRO_THEME_DIR . 'inc/woocommerce/customizer/section/layout/single-product.php';
//woo-layout
require BEVRO_THEME_DIR . 'inc/woocommerce/customizer/section/layout/woo-layout.php';
}
add_action('customize_register','bevro_customize_register');
function bevro_is_json( $string ){
    return is_string( $string ) && is_array( json_decode( $string, true ) ) ? true : false;
}