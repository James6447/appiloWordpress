<?php
/**
 * Cart for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
//cart visibility
$wp_customize->add_setting('bevro_woo_cart_visibility', array(
        'default'        => 'disable-all',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'bevro_woo_cart_visibility', array(
        'settings'   => 'bevro_woo_cart_visibility',
        'label'      => __('Visibility','bevro'),
        'section'    => 'bevro-woo-cart',
        'type'       => 'select',
        'choices'    => array(
        'display-all'     => __('Display on all devices','bevro'),
        'disable-mobile'  => __('Disable in mobile','bevro'),
        'disable-all'     => __('Disable in all device','bevro'),
        ),
    ));
/**************/
//Cart display
/**************/
$wp_customize->add_setting('bevro_woo_cart_disable', array(
        'default'           => 'icon',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'bevro_woo_cart_disable', array(
        'settings'   => 'bevro_woo_cart_disable',
        'label'      => __('Show as','bevro'),
        'section'    => 'bevro-woo-cart',
        'type'       => 'select',
        'choices'    => array(
        'icon'                     => __('Icon','bevro'),
        'icon+total'                => __('Icon & Total','bevro'),
        'icon+cartcount'           => __('Icon & Cart Count','bevro'),
        'icon+cartcount+total'     => __('Icon & Cart Count & Total','bevro'),
        ),
    ));
// color scheme
if((bevro_pro_activation_class())==''){
if(class_exists('Bevro_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'bevro_woo_cart_color_scheme', array(
                'default'           => 'woo-cart-default',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customize_Control_Radio_Image(
                $wp_customize, 'bevro_woo_cart_color_scheme', array(
                    'label'    => esc_html__( 'Choose Dropdown Color Scheme', 'bevro' ),
                    'section'  => 'bevro-woo-cart',
                    'choices'  => array(
                       'woo-cart-default' => array(
                            'url'    => BEVRO_COLOR_SCHM_DEF,
                        ),
                        'woo-cart-dark'   => array(
                            'url'    => BEVRO_COLOR_SCHM_DRK,
                        ),
                    ),
                )
            )
        );
    }
}