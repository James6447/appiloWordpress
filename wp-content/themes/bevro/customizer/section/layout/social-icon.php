<?php 
/**
 * Social Icon Options for Bevro Theme.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
$wp_customize->add_setting('social_x_link_facebook', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('social_x_link_facebook', array(
        'label'    => __('Facebook URL', 'bevro'),
        'section'  => 'bevro-social-icon',
        'settings' => 'social_x_link_facebook',
         'type'       => 'text',
        
        ));
$wp_customize->add_setting('social_x_link_google', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('social_x_link_google', array(
        'label'    => __('Google+ URL', 'bevro'),
        'section'  => 'bevro-social-icon',
        'settings' => 'social_x_link_google',
         'type'       => 'text',
         
        ));
$wp_customize->add_setting('social_x_link_linkedin', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('social_x_link_linkedin', array(
        'label'    => __('LinkedIn URL', 'bevro'),
        'section'  => 'bevro-social-icon',
        'settings' => 'social_x_link_linkedin',
         'type'       => 'text',
        
        ));
$wp_customize->add_setting('social_x_link_pintrest', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('social_x_link_pintrest', array(
        'label'    => __('Pinterest URL', 'bevro'),
        'section'  => 'bevro-social-icon',
        'settings' => 'social_x_link_pintrest',
         'type'       => 'text',
        
        ));
$wp_customize->add_setting('social_x_link_twitter', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_x_link_twitter', array(
        'label'    => __('Twitter URL', 'bevro'),
        'section'  => 'bevro-social-icon',
        'settings' => 'social_x_link_twitter',
         'type'       => 'text',
        ));
$wp_customize->add_setting('social_x_link_insta', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_x_link_insta', array(
        'label'    => __('Instagram URL', 'bevro'),
        'section'  => 'bevro-social-icon',
        'settings' => 'social_x_link_insta',
         'type'       => 'text',
        ));
$wp_customize->add_setting('social_x_link_tumblr', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
$wp_customize->add_control('social_x_link_tumblr', array(
        'label'    => __('Tumblr URL', 'bevro'),
        'section'  => 'bevro-social-icon',
        'settings' => 'social_x_link_tumblr',
         'type'       => 'text',
        ));
$wp_customize->add_setting('social_x_link_youtube', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_x_link_youtube', array(
        'label'    => __('Youtube URL', 'bevro'),
        'section'  => 'bevro-social-icon',
        'settings' => 'social_x_link_youtube',
         'type'       => 'text',
        ));
$wp_customize->add_setting('social_x_link_stumbleupon', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_x_link_stumbleupon', array(
        'label'    => __('Stumbleupon URL', 'bevro'),
        'section'  => 'bevro-social-icon',
        'settings' => 'social_x_link_stumbleupon',
        'type'     => 'text',
        ));
        $wp_customize->add_setting('social_x_link_dribble', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_x_link_dribble', array(
        'label'    => __('Dribble URL', 'bevro'),
        'section'  => 'bevro-social-icon',
        'settings' => 'social_x_link_dribble',
        'type'     => 'text',
        ));
//Enable Loader
$wp_customize->add_setting( 'bevro_social_original_color', array(
                'default'               => false,
                'sanitize_callback'     => 'bevro_sanitize_checkbox',
            ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_social_original_color', array(
                'label'       => esc_html__('Show Original Color', 'bevro'),
                'type'        => 'checkbox',
                'section'     => 'bevro-social-icon',
                'settings'    => 'bevro_social_original_color',
)));
/****************/
//body doc link
/****************/
$wp_customize->add_setting('bevro_social_link_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_social_link_more',
            array(
        'section'     => 'bevro-social-icon',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#social-icon')),
        'priority'   =>30,
    )));