<?php
/**
 * Gloabal Color and Background Options for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/******************/
//Global Option
/******************/
// theme color
 $wp_customize->add_setting('bevro_theme_clr', array(
        'default'        => '#ea4c89',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'bevro_theme_clr', array(
        'label'      => __('Theme Color', 'bevro' ),
        'section'    => 'bevro-gloabal-color',
        'settings'   => 'bevro_theme_clr',
        'priority' => 1,
    ) ) 
 );  
// link color
 $wp_customize->add_setting('bevro_link_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'bevro_link_clr', array(
        'label'      => __('Link Color', 'bevro' ),
        'section'    => 'bevro-gloabal-color',
        'settings'   => 'bevro_link_clr',
        'priority' => 2,
    ) ) 
 );  
// link color
 $wp_customize->add_setting('bevro_link_hvr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'bevro_link_hvr_clr', array(
        'label'      => __('Link Hover Color', 'bevro' ),
        'section'    => 'bevro-gloabal-color',
        'settings'   => 'bevro_link_hvr_clr',
        'priority' => 3,
    ) ) 
 );  
// text color
 $wp_customize->add_setting('bevro_text_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'bevro_text_clr', array(
        'label'      => __('Text Color', 'bevro' ),
        'section'    => 'bevro-gloabal-color',
        'settings'   => 'bevro_text_clr',
        'priority' => 4,
    ) ) 
 );
 // title color
 $wp_customize->add_setting('bevro_title_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'bevro_title_clr', array(
        'label'      => __('Title Color', 'bevro' ),
        'section'    => 'bevro-gloabal-color',
        'settings'   => 'bevro_title_clr',
        'priority' => 4,
    ) ) 
 );    
// gloabal background option
$wp_customize->get_control( 'background_color' )->section = 'bevro-gloabal-color';
$wp_customize->get_control( 'background_color' )->priority = 6;
$wp_customize->get_control( 'background_image' )->section = 'bevro-gloabal-color';
$wp_customize->get_control( 'background_image' )->priority = 7;
$wp_customize->get_control( 'background_preset' )->section = 'bevro-gloabal-color';
$wp_customize->get_control( 'background_preset' )->priority = 8;
$wp_customize->get_control( 'background_position' )->section = 'bevro-gloabal-color';
$wp_customize->get_control( 'background_position' )->priority = 8;
$wp_customize->get_control( 'background_repeat' )->section = 'bevro-gloabal-color';
$wp_customize->get_control( 'background_repeat' )->priority = 9;
$wp_customize->get_control( 'background_attachment' )->section = 'bevro-gloabal-color';
$wp_customize->get_control( 'background_attachment' )->priority = 10;
$wp_customize->get_control( 'background_size' )->section = 'bevro-gloabal-color';
$wp_customize->get_control( 'background_size' )->priority = 11;
/****************/
//doc link
/****************/
$wp_customize->add_setting('bevro_global_clr_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_global_clr_more',
            array(
        'section'     => 'bevro-gloabal-color',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#color-background')),
        'priority'   => 30,
)));