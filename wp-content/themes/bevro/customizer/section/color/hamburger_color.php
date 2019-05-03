<?php
/**
 * Hamburger Colors Options for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
//Bg-color
$wp_customize->add_setting('bevro_hamburger_bg_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_hamburger_bg_clr', array(
        'label'      => __('Background Color', 'bevro' ),
        'section'    => 'bevro-hamburger-color',
        'settings'   => 'bevro_hamburger_bg_clr',
    ) ) 
 );
// border-color
$wp_customize->add_setting('bevro_hamburger_brdr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_hamburger_brdr_clr', array(
        'label'      => __('Border Color', 'bevro' ),
        'section'    => 'bevro-hamburger-color',
        'settings'   => 'bevro_hamburger_brdr_clr',
    ) ) 
 );
// icon-color
$wp_customize->add_setting('bevro_hamburger_icon_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_hamburger_icon_clr', array(
        'label'      => __('Icon Color', 'bevro' ),
        'section'    => 'bevro-hamburger-color',
        'settings'   => 'bevro_hamburger_icon_clr',
    ) ) 
 );
// Border radius
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_hamburger_border_radius', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_hamburger_border_radius', array(
                    'label'       => esc_html__( 'Border Radius', 'bevro' ),
                    'section'     => 'bevro-hamburger-color',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 50,
                        'step' => 1,
                    ),
                )
            )
    );
}

/****************/
//doc link
/****************/
$wp_customize->add_setting('bevro_hamburger_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_hamburger_more',
            array(
        'section'     => 'bevro-hamburger-color',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#hamburger-colors')),
        'priority'   => 30,
)));