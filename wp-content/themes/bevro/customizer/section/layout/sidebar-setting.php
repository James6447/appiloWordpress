<?php
/**
 *Sidebar Options for Bevro Theme.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/********************/
// default layout
/********************/
$wp_customize->add_setting('bevro_sidebar_default_layout', array(
        'default'        => 'right',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control( 'bevro_sidebar_default_layout', array(
        'settings' => 'bevro_sidebar_default_layout',
        'label'   => __('Default Layout','bevro'),
        'section' => 'bevro-section-sidebar-group',
        'type'    => 'select',
        'choices'    => array(
        'no-sidebar'   => __('No Sidebar','bevro'),
        'left' => __('Left Sidebar','bevro'),
        'right'=> __('Right Sidebar','bevro'),    
        ),
        'priority'   => 1,
));
/********************/
// page layout
/********************/
$wp_customize->add_setting('bevro_sidebar_page_layout', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'bevro_sidebar_page_layout', array(
        'settings' => 'bevro_sidebar_page_layout',
        'label'    => __('Page Layout','bevro'),
        'section'  => 'bevro-section-sidebar-group',
        'type'     => 'select',
        'choices'       => array(
        'default'       => __('Default','bevro'),
        'no-sidebar'    => __('No Sidebar','bevro'),
        'left' => __('Left Sidebar','bevro'),
        'right'=> __('Right Sidebar','bevro'),    
        ),
        'priority'   => 3,
));
/********************/
// blog page layout
/********************/
$wp_customize->add_setting('bevro_sidebar_blog_layout', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'bevro_sidebar_blog_layout', array(
        'settings' => 'bevro_sidebar_blog_layout',
        'label'   => __('Blog Layout','bevro'),
        'section' => 'bevro-section-sidebar-group',
        'type'    => 'select',
        'choices'    => array(
        'default'   => __('Default','bevro'),
        'no-sidebar'   => __('No Sidebar','bevro'),
        'left' => __('Left Sidebar','bevro'),
        'right'=> __('Right Sidebar','bevro'),    
        ),
        'priority'   => 4,
));
/********************/
// blog single page layout
/********************/
$wp_customize->add_setting('bevro_sidebar_archive_layout', array(
        'default'        => 'default',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'bevro_sidebar_archive_layout', array(
        'settings' => 'bevro_sidebar_archive_layout',
        'label'   => __('Blog Post Archives','bevro'),
        'section' => 'bevro-section-sidebar-group',
        'type'    => 'select',
        'choices'    => array(
        'default'   => __('Default','bevro'),
        'no-sidebar'   => __('No Sidebar','bevro'),
        'left' => __('Left Sidebar','bevro'),
        'right'=> __('Right Sidebar','bevro'),    
        ),
        'priority'   => 5,
));
/*********************/
//Sidebar width
/*********************/
if ( class_exists('Bevro_WP_Customizer_Range_Value_Control')){
$wp_customize->add_setting(
            'bevro_sidebar_width', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '35',
                'transport'         => 'postMessage',
                
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_sidebar_width', array(
                    'label'       => esc_html__( 'Sidebar Width (%)', 'bevro' ),
                    'section'     => 'bevro-section-sidebar-group',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 15,
                        'max'  => 50,
                        'step' => 1,
                    ),
                    'priority'   => 10,
                )
        )
);
}
/****************/
//doc link
/****************/
$wp_customize->add_setting('bevro_sidebar_doc_learn_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_sidebar_doc_learn_more',
            array(
        'section'     => 'bevro-section-sidebar-group',
        'type'        => 'custom_message',
        
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#sidebar-setting')),
         'priority'   =>50,
    )));