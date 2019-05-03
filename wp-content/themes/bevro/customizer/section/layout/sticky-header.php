<?php
/**
 * Transparent Header for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/************************/
//Header Transparent
/************************/
$wp_customize->add_setting( 'bevro_header_transparent', array(
                'default'               => false,
                'sanitize_callback'     => 'bevro_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_header_transparent', array(
                'label'                 => esc_html__('Enable Header Transparent
', 'bevro'),
                'type'                  => 'checkbox',
                'section'               => 'bevro-transparent-header',
                'settings'              => 'bevro_header_transparent',
            ) ) );
// force disable on special page 
$wp_customize->add_setting( 'bevro_header_transparent_special_page_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'bevro_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_header_transparent_special_page_disable', array(
                'label'                 => esc_html__('Disable transparent header for Special pages', 'bevro'),
                'description'           => esc_html__('(like archive,404,search,shop, product page etc.)', 'bevro'),
                'type'                  => 'checkbox',
                'section'               => 'bevro-transparent-header',
                'settings'              => 'bevro_header_transparent_special_page_disable',
            ) ) );
/****************/
//doc link
/****************/
$wp_customize->add_setting('bevro_tranparnet_header_doc_learn_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_tranparnet_header_doc_learn_more',
            array(
        'section'     => 'bevro-transparent-header',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#transparent-header')),
         'priority'   =>50,
    )));