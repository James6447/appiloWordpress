<?php
/**
 * Register WooCommerce customizer panels & sections.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
//General Section
if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}
$wp_customize->get_panel('woocommerce')->priority = 30;
$bevro_woo_general_section = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-woo-general-section', array(
    'title'    => __('General', 'bevro'),
        'panel'    => 'woocommerce',
        'priority' => 1,
));
$wp_customize->add_section($bevro_woo_general_section);
$bevro_woo_gen_sale = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-woo-gen-sale', array(
    'title'    => __( 'On Sale Badge', 'bevro' ),
     'panel'    => 'woocommerce',
		'section'  => 'bevro-woo-general-section',
		'priority' => 1,
));
$wp_customize->add_section( $bevro_woo_gen_sale );
$bevro_woo_cart = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-woo-cart', array(
    'title'    => __( 'Cart', 'bevro' ),
     'panel'    => 'woocommerce',
        'section'  => 'bevro-woo-general-section',
        'priority' => 2,
));
$wp_customize->add_section( $bevro_woo_cart );
$bevro_woo_shop = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-woo-shop', array(
    'title'    => __( 'Shop Page', 'bevro' ),
     'panel'    => 'woocommerce',
	 'priority' => 2,
));
$wp_customize->add_section( $bevro_woo_shop );
$bevro_woo_single_product = new Bevro_WP_Customize_Section( $wp_customize,'bevro_woo_single_product', array(
    'title'    => __( 'Single Product', 'bevro' ),
    'panel'    => 'woocommerce',
    'priority' => 3,
));
$wp_customize->add_section( $bevro_woo_single_product  );