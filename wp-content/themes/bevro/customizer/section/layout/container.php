<?php
/**
 * Container Options for Bevro Theme.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
// Container Width
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_conatiner_width', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1200',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_conatiner_width', array(
                    'label'       => esc_html__( 'Container Width', 'bevro' ),
                    'section'     => 'bevro-conatiner',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 768,
                        'max'  => 1920,
                        'step' => 1,
                    ),
                    'priority'   =>2,
                )
        )
);
}
// default container
$wp_customize->add_setting('bevro_default_container', array(
        'default'           => 'boxed',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('bevro_default_container', array(
        'settings' => 'bevro_default_container',
        'label'    => __('Default Container','bevro'),
        'section'  => 'bevro-conatiner',
        'type'     => 'select',
        'choices'  => array(
        'boxed'                  => __('Boxed','bevro'),
        'contentbox'             => __('Content Boxed','bevro'),
        'fullwidthcontained'     => __('Full Width/Contained','bevro'),
        'fullwidthstrechched'    => __('Full Width/Stretched','bevro'), 
        ),
        'priority'   =>3,
    ));

//container for pages
$wp_customize->add_setting('bevro_containerpage', array(
        'default'           => 'default',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('bevro_containerpage', array(
        'settings' => 'bevro_containerpage',
        'label'    => __('Container For Page','bevro'),
        'section'  => 'bevro-conatiner',
        'type'     => 'select',
        'choices'  => array(
        'default'                => __('Default','bevro'),
        'boxed'                  => __('Boxed','bevro'),
        'contentbox'             => __('Content Boxed','bevro'),
        'fullwidthcontained'     => __('Full Width/Contained','bevro'),
        'fullwidthstrechched'    => __('Full Width/Stretched','bevro'), 
        ),
        'priority'   =>4,
    ));
//Container for Blog Archives
$wp_customize->add_setting('bevro_containerarchive', array(
        'default'           => 'default',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('bevro_containerarchive', array(
        'settings' => 'bevro_containerarchive',
        'label'    => __('Container For Blog / Archives','bevro'),
        'section'  => 'bevro-conatiner',
        'type'     => 'select',
        'choices'  => array(
        'default'                => __('Default','bevro'),
        'boxed'                  => __('Boxed','bevro'),
        'contentbox'             => __('Content Boxed','bevro'),
        'fullwidthcontained'     => __('Full Width/Contained','bevro'),
        'fullwidthstrechched'    => __('Full Width/Stretched','bevro'), 
        ),
        'priority'   =>5,
    ));
//container for blog single pages
$wp_customize->add_setting('bevro_containerblogpage', array(
        'default'           => 'default',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('bevro_containerblogpage', array(
        'settings' => 'bevro_containerblogpage',
        'label'    => __('Container For Blog Single','bevro'),
        'section'  => 'bevro-conatiner',
        'type'     => 'select',
        'choices'  => array(
        'default'                => __('Default','bevro'),
        'boxed'                  => __('Boxed','bevro'),
        'contentbox'             => __('Content Boxed','bevro'),
        'fullwidthcontained'     => __('Full Width/Contained','bevro'),
        'fullwidthstrechched'    => __('Full Width/Stretched','bevro'), 
        ),
        'priority'   =>6,
    ));
/****************/
//doc link
/****************/
$wp_customize->add_setting('bevro_container_doc_learn_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_container_doc_learn_more',
            array(
        'section'     => 'bevro-conatiner',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#container-setting')),
         'priority'   =>50,
    )));