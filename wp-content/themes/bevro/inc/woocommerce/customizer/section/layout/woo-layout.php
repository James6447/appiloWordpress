<?php
/**
 * Woocommerce Page Layout for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}
//container for woocommerce pages
$wp_customize->add_setting('bevro_containerwoopage', array(
        'default'           => 'default',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('bevro_containerwoopage', array(
        'settings' => 'bevro_containerwoopage',
        'label'    => __('Container For Woocommerce Page','bevro'),
        'section'  => 'bevro-conatiner',
        'type'     => 'select',
        'choices'  => array(
        'default'                => __('Default','bevro'),
        'boxed'                  => __('Boxed','bevro'),
        'contentbox'             => __('Content Boxed','bevro'),
        'fullwidthcontained'     => __('Full Width/Contained','bevro'),
        'fullwidthstrechched'    => __('Full Width/Stretched','bevro'), 
        ),
    ));
/********************/
// Woo page layout
/********************/
$wp_customize->add_setting('bevro_sidebar_woo_layout', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
        

    ));
$wp_customize->add_control( 'bevro_sidebar_woo_layout', array(
        'settings' => 'bevro_sidebar_woo_layout',
        'label'    => __('WooCommerce','bevro'),
        'section'  => 'bevro-section-sidebar-group',
        'type'     => 'select',
        'choices'      => array(
        'default'      => __('Default','bevro'),
        'no-sidebar'   => __('No Sidebar','bevro'),
        'left'         => __('Left Sidebar','bevro'),
        'right'        => __('Right Sidebar','bevro'),    
        ),
        'priority'   => 6,
));