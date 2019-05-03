<?php
/**
 * General Sale Badges for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
//choose sale badges style
if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}
$wp_customize->add_setting('bevro_sale_bagde_style', array(
        'default'        => 'circle',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'bevro_sale_bagde_style', array(
        'settings' => 'bevro_sale_bagde_style',
        'label'   => __('On Sale Badge Style','bevro'),
        'section' => 'bevro-woo-gen-sale',
        'type'    => 'select',
        'choices'    => array(
        'circle'            => __('Circle','bevro'),
        'square'            => __('Square','bevro'),
        'diamond'           => __('Diamond','bevro'),         
        ),
    ));
