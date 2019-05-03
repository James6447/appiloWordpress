<?php
/**
 * Register customizer site identity setting.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/*************************/
/*Site Identity*/
/*************************/
/**
* Option: Retina logo selector
*/
$wp_customize->add_setting(BEVRO_THEME_SETTINGS.'[bevro_header_retina_logo]', array(
            'default'           => bevro_get_option('bevro_header_retina_logo'),
            'type'              => 'option',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
$wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,BEVRO_THEME_SETTINGS.'[bevro_header_retina_logo]', array(
                'section'        => 'title_tagline',
                'priority'       => 8,
                'label'          => __( 'Retina Logo', 'bevro' ),
                'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
            )
        )
    );
$wp_customize->get_section('title_tagline')->priority = 3;
   $wp_customize->add_setting('title_disable', array(
        'default'           => 'enable',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
$wp_customize->add_control('title_disable', array(
        'label'    => __('Display Site Title', 'bevro'),
        'section'  => 'title_tagline',
        'settings' => 'title_disable',
         'type'       => 'checkbox',
        'choices'    => array(
            'enable' => 'Display Site Title',
        ),
    ));
$wp_customize->get_section('title_tagline')->priority = 3;
$wp_customize->add_setting('tagline_disable', array(
        'default'           => 'enable',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ));
$wp_customize->add_control('tagline_disable', array(
        'label'    => __('Display Tagline', 'bevro'),
        'section'  => 'title_tagline',
        'settings' => 'tagline_disable',
         'type'       => 'checkbox',
        'choices'    => array(
            'enable' => 'Display Tagline',
        ),
    )); 
// logo width
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_logo_width', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default' => '225',
                'transport'         => 'postMessage',
                
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_logo_width', array(
                    'label'       => esc_html__( 'Logo Width', 'bevro' ),
                    'section'     => 'title_tagline',
                    'priority'       => 9,
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 50,
                        'max'  => 600,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
);
}
$wp_customize->get_control( 'site_icon' )->priority = 35;
/****************/
//doc link
/****************/
$wp_customize->add_setting('bevro_site_identity_doc_learn_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_site_identity_doc_learn_more',
            array(
        'section'     => 'title_tagline',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#site-identity')),
         'priority'   =>50,
    )));