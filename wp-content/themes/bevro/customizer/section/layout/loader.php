<?php
/**
 * Site Loader for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
//Enable Loader
$wp_customize->add_setting( 'bevro_preloader_enable', array(
                'default'               => false,
                'sanitize_callback'     => 'bevro_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_preloader_enable', array(
                'label'                 => esc_html__('Enable Loader', 'bevro'),
                'type'                  => 'checkbox',
                'section'               => 'bevro-pre-loader',
                'settings'              => 'bevro_preloader_enable',
                'priority'   => 1,
            ) ) );
// BG color
 $wp_customize->add_setting('bevro_loader_bg_clr', array(
        'default'           => '#f5f5f5',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_loader_bg_clr', array(
        'label'      => __('Background Color', 'bevro' ),
        'section'    => 'bevro-pre-loader',
        'settings'   => 'bevro_loader_bg_clr',
        'priority'   => 2,
    ) ) 
 ); 
/*******************/ 
// Pre loader Image
/*******************/ 
$wp_customize->add_setting('bevro_preloader_image_upload', array(
        'default'       => BEVRO_LOADER,
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'bevro_preloader_image_upload', array(
        'label'          => __('Pre Loader Image', 'bevro'),
        'description'    => __('(You can also use GIF image.)', 'bevro'),
        'section'        => 'bevro-pre-loader',
        'settings'       => 'bevro_preloader_image_upload',
 )));
/****************/
//body doc link
/****************/
$wp_customize->add_setting('bevro_pre_loader_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_pre_loader_more',
            array(
        'section'     => 'bevro-pre-loader',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#pre-loader')),
        'priority'   =>30,
    )));