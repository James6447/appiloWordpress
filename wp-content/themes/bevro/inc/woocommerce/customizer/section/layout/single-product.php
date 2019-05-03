<?php
/**
 * Single Product for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
/*********************/
//Single Product content width
/*********************/
    $wp_customize->add_setting('bevro_single_product_content_width', array(
        'default'          =>'defualt',
        'capability'       =>'edit_theme_options',
        'sanitize_callback'=>'esc_attr',
    ));
    $wp_customize->add_control('bevro_single_product_content_width', array(
        'settings'=> 'bevro_single_product_content_width',
        'label'   => __('Content Width','bevro'),
        'section' => 'bevro_woo_single_product',
        'type'    => 'select',
        'choices' => array(
        'defualt'    => __('Default','bevro'),
        'custom'     => __('Custom','bevro'), 
        ),
    ));
$wp_customize->add_setting('bevro_single_sidebar_disable', array(
                'default'               => true,
                'sanitize_callback'     => 'bevro_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'bevro_single_sidebar_disable', array(
                'label'         => __('Force to disable sidebar in single product page.', 'bevro'),
                'type'          => 'checkbox',
                'section'       => 'bevro_woo_single_product',
                'settings'      => 'bevro_single_sidebar_disable',
            ) ) );
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_product_cnt_widht', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1200',
                 'transport'        => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_product_cnt_widht', array(
                    'label'       => __( 'Enter Width', 'bevro' ),
                    'section'     => 'bevro_woo_single_product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 768,
                        'max'  => 1920,
                        'step' => 1,
                    ),
                )
        )
);
}
/***********************************/  
//Product Layout Alignment
/***********************************/ 
if(class_exists('Bevro_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'bevro_single_product_alignment', array(
                'default'           => 'left',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
    $wp_customize->add_control(
            new Bevro_WP_Customize_Control_Radio_Image(
                $wp_customize, 'bevro_single_product_alignment', array(
                    'label'    => esc_html__( 'Product Content Alignment', 'bevro' ),
                    'section'  => 'bevro_woo_single_product',
                    'choices'  => array(   
                        'left' => array(
                            'url' => BEVRO_WOO_SINGLE_1,
                        ),
                        'center' => array(
                            'url' => BEVRO_WOO_SINGLE_2,
                        ),
                         'right' => array(
                            'url' => BEVRO_WOO_SINGLE_3,
                        )  
                        
                    ),
                    
                )
            )
        );
    } 
/***********************************/  
// Single product structure 
/***********************************/  
$wp_customize->add_setting(
        BEVRO_THEME_SETTINGS . '[bevro-woo-single-product-structure]', array(
            'default'           => bevro_get_option('bevro-woo-single-product-structure'),
            'type'              => 'option',
            'sanitize_callback' => 'bevro_sanitize_multi_choices',
        )
    );
    $wp_customize->add_control(
        new Bevro_Control_Sortable(
            $wp_customize, BEVRO_THEME_SETTINGS . '[bevro-woo-single-product-structure]', array(
                'type'     => 'brv-sortable',
                'section'  => 'bevro_woo_single_product',
                'label'    => __( 'Product Structure', 'bevro' ),
                'choices'  => array(
                        'title'      => __( 'Title', 'bevro' ),
                    'price'      => __( 'Price', 'bevro' ),
                    'ratings'    => __( 'Ratings', 'bevro' ),
                    'add_cart'   => __( 'Add To Cart', 'bevro' ),
                    'short_desc' => __( 'Short Description', 'bevro' ),
                    'meta'       => __( 'Meta', 'bevro' ),
                ),
            )
        )
    );
	
/**********************/
// Display product Tab
/**********************/
// product tab divider
$wp_customize->add_setting('bevro_single_product_tab_display_divide', array(
        'sanitize_callback' => 'bevro_sanitize_textarea',
    ));
$wp_customize->add_control( new Bevro_Misc_Control( $wp_customize, 'bevro_single_product_tab_display_divide',
            array(
        'section'     => 'bevro_woo_single_product',
        'type'        => 'custom_message',
        'description' => __('Product Description Tab','bevro' ),
)));
$wp_customize->add_setting('bevro_single_product_tab_display', array(
                'default'               => true,
                'sanitize_callback'     => 'bevro_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'bevro_single_product_tab_display', array(
                'label'         => __('Display Product Description Tab', 'bevro'),
                'type'          => 'checkbox',
                'section'       => 'bevro_woo_single_product',
                'settings'      => 'bevro_single_product_tab_display',
            ) ) );

$wp_customize->add_setting('bevro_single_product_tab_layout', array(
                'default'               => 'horizontal',
                'sanitize_callback'     => 'bevro_sanitize_select',
            ) );
$wp_customize->add_control( new Bevro_Customizer_Buttonset_Control( $wp_customize, 'bevro_single_product_tab_layout', array(
                'label'                 => esc_html__( 'Product Tab Layout', 'bevro' ),
                'section'               => 'bevro_woo_single_product',
                'settings'              => 'bevro_single_product_tab_layout',
                'choices'               => array(
                    'horizontal'          => esc_html__( 'Horizontal', 'bevro' ),
                    'vertical'            => esc_html__( 'Vertical', 'bevro' ),
                ),
            ) ) );
/******************************/
// Up Sell Product
/******************************/
$wp_customize->add_setting('bevro_single_upsell_product_divide', array(
        'sanitize_callback' => 'bevro_sanitize_textarea',
    ));
$wp_customize->add_control( new Bevro_Misc_Control( $wp_customize, 'bevro_single_upsell_product_divide',
            array(
        'section'     => 'bevro_woo_single_product',
        'type'        => 'custom_message',
        'description' => __('Up Sell Product','bevro' ),
)));
// display upsell
$wp_customize->add_setting('bevro_upsell_product_display', array(
                'default'               => true,
                'sanitize_callback'     => 'bevro_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'bevro_upsell_product_display', array(
                'label'         => __('Display up sell product', 'bevro'),
                'type'          => 'checkbox',
                'section'       => 'bevro_woo_single_product',
                'settings'      => 'bevro_upsell_product_display',
            ) ) );
// up sell product column
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_upsale_num_col_shw', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default' => '3',  
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_upsale_num_col_shw', array(
                    'label'       => __( 'Number Of Column To Show', 'bevro' ),
                    'section'     => 'bevro_woo_single_product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 6,
                        'step' => 1,
                    ),
                    
                )
        )
);
// no.of product to show
$wp_customize->add_setting(
            'bevro_upsale_num_product_shw', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default' => '3',
                
                
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_upsale_num_product_shw', array(
                    'label'       => __( 'Number Of Product To Show', 'bevro' ),
                    'section'     => 'bevro_woo_single_product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    
                )
        )
);
}
/******************************/
// Related Product
/******************************/
$wp_customize->add_setting('bevro_single_related_product_divide', array(
        'sanitize_callback' => 'bevro_sanitize_textarea',
    ));
$wp_customize->add_control( new Bevro_Misc_Control( $wp_customize, 'bevro_single_related_product_divide',
            array(
        'section'     => 'bevro_woo_single_product',
        'type'        => 'custom_message',
        'description' => __('Related Product','bevro' ),
)));
// display upsell
$wp_customize->add_setting('bevro_related_product_display', array(
                'default'               => true,
                'sanitize_callback'     => 'bevro_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'bevro_related_product_display', array(
                'label'         => __('Display Related product', 'bevro'),
                'type'          => 'checkbox',
                'section'       => 'bevro_woo_single_product',
                'settings'      => 'bevro_related_product_display',
            ) ) );
// up sell product column
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_related_num_col_shw', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default' => '3',
                
                
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_related_num_col_shw', array(
                    'label'       => __( 'Number Of Column To Show', 'bevro' ),
                    'section'     => 'bevro_woo_single_product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 6,
                        'step' => 1,
                    ),
                    
                )
        )
);
// no.of product to show
$wp_customize->add_setting(
            'bevro_related_num_product_shw', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default' => '3',
                
                
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_related_num_product_shw', array(
                    'label'       => __( 'Number Of Product To Show', 'bevro' ),
                    'section'     => 'bevro_woo_single_product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    
                )
        )
);
}

/****************/
//doc link
/****************/
$wp_customize->add_setting('bevro_woo_single_link_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_woo_single_link_more',
            array(
        'section'     => 'bevro_woo_single_product',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#single-product')),
        'priority'   =>30,
    )));