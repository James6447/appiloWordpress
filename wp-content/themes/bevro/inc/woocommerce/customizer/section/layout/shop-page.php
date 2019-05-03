<?php
/**
 * Shop Page for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}
$wp_customize->get_setting( 'woocommerce_catalog_columns' )->priority = '1';
$wp_customize->get_control( 'woocommerce_catalog_columns' )->section = 'bevro-woo-shop';
$wp_customize->get_setting( 'woocommerce_catalog_rows' )->priority = '1';
$wp_customize->get_control( 'woocommerce_catalog_rows' )->section = 'bevro-woo-shop';
// product animation
$wp_customize->add_setting('bevro_woo_product_animation', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'bevro_woo_product_animation', array(
        'settings'=> 'bevro_woo_product_animation',
        'label'   => __('Product Image Hover Style','bevro'),
        'section' => 'bevro-woo-shop',
        'type'    => 'select',
        'choices'    => array(
        'none'            => __('None','bevro'),
        'zoom'            => __('Zoom','bevro'),
        'swap'            => __('Swap','bevro'),         
        ),
    ));
//product stucture
     $wp_customize->add_setting(
        BEVRO_THEME_SETTINGS . '[bevro-product-structure]', array(
            'default'           => bevro_get_option('bevro-product-structure'),
            'type'              => 'option',
            'sanitize_callback' => 'bevro_sanitize_multi_choices',
        )
    );
    $wp_customize->add_control(
        new Bevro_Control_Sortable(
            $wp_customize, BEVRO_THEME_SETTINGS . '[bevro-product-structure]', array(
                'type'     => 'brv-sortable',
                'section'  => 'bevro-woo-shop',
                'label'    => __( 'Product Structure', 'bevro' ),
                'choices'  => array(
                        'title'      => __( 'Title', 'bevro' ),
						'price'      => __( 'Price', 'bevro' ),
						'ratings'    => __( 'Ratings', 'bevro' ),
						'add_cart'   => __( 'Add To Cart', 'bevro' ),
						'category'   => __( 'Category', 'bevro' ),
                        'short_desc' => __( 'Short Description', 'bevro' ),
                ),
            )
        )
    );
/***********************************/  
//Product content alignment
/***********************************/ 
if(class_exists('Bevro_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'bevro_product_content_alignment', array(
                'default'           => 'left',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
    $wp_customize->add_control(
            new Bevro_WP_Customize_Control_Radio_Image(
                $wp_customize, 'bevro_product_content_alignment', array(
                    'label'    => esc_html__( 'Product Content Alignment', 'bevro' ),
                    'section'  => 'bevro-woo-shop',
                    'choices'  => array(   
                        'left' => array(
                            'url' => BEVRO_WOO_SHOP_1,
                        ),
                        'center' => array(
                            'url' => BEVRO_WOO_SHOP_2,
                        ),
                         'right' => array(
                            'url' => BEVRO_WOO_SHOP_3,
                        )  
                        
                    ),
                    
                )
            )
        );
    } 
/****************************/
// Box Shadow
/****************************/
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_shop_product_box_shadow', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_shop_product_box_shadow', array(
                    'label'       => esc_html__( 'Product Box shadow', 'bevro' ),
                    'section'     => 'bevro-woo-shop',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 5,
                        'step' => 1,
                    ),
                )
        )
);
//**********************/
// Box shadow on hover
//**********************/
$wp_customize->add_setting(
            'bevro_shop_product_box_shadow_on_hover', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_shop_product_box_shadow_on_hover', array(
                    'label'       => esc_html__( 'Product Box shadow on Hover', 'bevro' ),
                    'section'     => 'bevro-woo-shop',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 5,
                        'step' => 1,
                    ),
                )
        )
);
}

/****************/
//doc link
/****************/
$wp_customize->add_setting('bevro_woo_shop_link_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_woo_shop_link_more',
            array(
        'section'     => 'bevro-woo-shop',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#shop-page')),
        'priority'   =>30,
    )));