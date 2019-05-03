<?php
/**
 * Site Button for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
// Button Text Color
$wp_customize->add_setting('bevro_button_txt_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'bevro_button_txt_clr', array(
        'label'      => __('Button Text Color', 'bevro' ),
        'section'    => 'bevro-site-button',
        'settings'   => 'bevro_button_txt_clr',
        'priority' => 1,
    ) ) 
 );  

// Button BG color
 $wp_customize->add_setting('bevro_button_bg_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_button_bg_clr', array(
        'label'      => __('Button Background Color', 'bevro' ),
        'section'    => 'bevro-site-button',
        'settings'   => 'bevro_button_bg_clr',
        'priority'   => 2,
    ) ) 
 ); 
// Button Text Hover Color
$wp_customize->add_setting('bevro_button_txt_hvr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'bevro_button_txt_hvr_clr', array(
        'label'      => __('Button Text Hover Color', 'bevro' ),
        'section'    => 'bevro-site-button',
        'settings'   => 'bevro_button_txt_hvr_clr',
        'priority'   =>3,
    ) ) 
 ); 
 // Button BG hover color
 $wp_customize->add_setting('bevro_button_bg_hvr_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_button_bg_hvr_clr', array(
        'label'      => __('Button Background Hover Color', 'bevro' ),
        'section'    => 'bevro-site-button',
        'settings'   => 'bevro_button_bg_hvr_clr',
        'priority'   => 4,
    ) ) 
 );
/**********************/  
// Button border radius
/**********************/ 
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_button_border_radius', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_button_border_radius', array(
                    'label'       => esc_html__( 'Button Border Radius', 'bevro' ),
                    'section'     => 'bevro-site-button',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                )
        )
    );
}
/****************/
//body doc link
/****************/
$wp_customize->add_setting('bevro_site_button_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_site_button_more',
            array(
        'section'     => 'bevro-site-button',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#site-button')),
        'priority'   =>30,
    )));