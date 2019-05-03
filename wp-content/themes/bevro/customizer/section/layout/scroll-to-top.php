<?php
/**
 *Scroll to top option
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/***********************/
//DISABLE SCROLL TO TOP
/***********************/
    $wp_customize->add_setting( 'bevro_scroll_to_top_disable', array(
                'default'           => false,
                'sanitize_callback' => 'bevro_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_scroll_to_top_disable', array(
                'label'       => esc_html__('Disable Scroll To Top', 'bevro'),
                'type'        => 'checkbox',
                'section'     => 'bevro-scroll-to-top-section',
                'settings'    => 'bevro_scroll_to_top_disable',
                'priority'   =>1,
            ) ) );
/********************/
// position left/right
/********************/
$wp_customize->add_setting('bevro_scroll_to_top_option', array(
                'default'               => 'right',
                'sanitize_callback'     => 'bevro_sanitize_select',
            ) );
$wp_customize->add_control( new Bevro_Customizer_Buttonset_Control( $wp_customize,'bevro_scroll_to_top_option', array(
                'label'                 => esc_html__( 'Position', 'bevro' ),
                'section'               => 'bevro-scroll-to-top-section',
                'settings'              => 'bevro_scroll_to_top_option',
                'choices'               => array(
                    'left'   => esc_html__( 'Left', 'bevro' ),
                    'right'  => esc_html__( 'Right', 'bevro' ),
             ),
                'priority'   =>2,
) ) );
//icon background radius
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_scroll_to_top_icon_radius', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '2',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_scroll_to_top_icon_radius', array(
                    'label'       => esc_html__( 'Icon Radius', 'bevro' ),
                    'section'     => 'bevro-scroll-to-top-section',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'priority'   =>3,
                )
        )
);
}
// color option
// icon-color
 $wp_customize->add_setting('bevro_scroll_to_top_icon_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_scroll_to_top_icon_clr', array(
        'label'      => __('Icon Color', 'bevro' ),
        'section'    => 'bevro-scroll-to-top-section',
        'settings'   => 'bevro_scroll_to_top_icon_clr',
        'priority'   =>4,
    ) ) 
 ); 

// icon-bg-color
 $wp_customize->add_setting('bevro_scroll_to_top_icon_bg_clr', array(
        'default'        => '#ea4c89',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_scroll_to_top_icon_bg_clr', array(
        'label'      => __('Icon Background Color', 'bevro' ),
        'section'    => 'bevro-scroll-to-top-section',
        'settings'   => 'bevro_scroll_to_top_icon_bg_clr',
        'priority'   =>5,
    ) ) 
 );  
// icon-hvr-color
 $wp_customize->add_setting('bevro_scroll_to_top_icon_hvr_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_scroll_to_top_icon_hvr_clr', array(
        'label'      => __('Icon Hover Color', 'bevro' ),
        'section'    => 'bevro-scroll-to-top-section',
        'settings'   => 'bevro_scroll_to_top_icon_hvr_clr',
        'priority'   =>6,
    ) ) 
 );  
// icon-bghvr-color
 $wp_customize->add_setting('bevro_scroll_to_top_icon_bghvr_clr', array(
        'default'        => '#ea4c89',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_scroll_to_top_icon_bghvr_clr', array(
        'label'      => __('Icon Background Hover Color', 'bevro' ),
        'section'    => 'bevro-scroll-to-top-section',
        'settings'   => 'bevro_scroll_to_top_icon_bghvr_clr',
        'priority'   =>7,
    ) ) 
 );  
/****************/
//doc link
/****************/
$wp_customize->add_setting('bevro_scroll_to_top_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_scroll_to_top_more',
            array(
        'section'     => 'bevro-scroll-to-top-section',
        'type'        => 'custom_message',

        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#scrolltotop-setting')),
        'priority'   =>30,
    )));