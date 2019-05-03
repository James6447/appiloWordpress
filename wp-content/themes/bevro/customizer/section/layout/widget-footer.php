<?php
/**
 * Footer Options for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/******************/
//Widegt footer
/******************/
if(class_exists('Bevro_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'bevro_bottom_footer_widget_layout', array(
               'default'           => 'ft-wgt-none',
               'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customize_Control_Radio_Image(
                $wp_customize, 'bevro_bottom_footer_widget_layout', array(
                    'label'    => esc_html__( 'Layout','bevro'),
                    'section'  => 'bevro-widget-footer',
                    'choices'  => array(
                       'ft-wgt-none'   => array(
                            'url' => BEVRO_FOOTER_WIDGET_LAYOUT_NONE,
                        ),
                        'ft-wgt-one'   => array(
                            'url' => BEVRO_FOOTER_WIDGET_LAYOUT_1,
                        ),
                        'ft-wgt-two' => array(
                            'url' => BEVRO_FOOTER_WIDGET_LAYOUT_2,
                        ),
                        'ft-wgt-three' => array(
                            'url' => BEVRO_FOOTER_WIDGET_LAYOUT_3,
                        ),
                        'ft-wgt-four' => array(
                            'url' => BEVRO_FOOTER_WIDGET_LAYOUT_4,
                        ),
                        'ft-wgt-five' => array(
                            'url' => BEVRO_FOOTER_WIDGET_LAYOUT_5,
                        ),
                        'ft-wgt-six' => array(
                            'url' => BEVRO_FOOTER_WIDGET_LAYOUT_6,
                        ),
                        'ft-wgt-seven' => array(
                            'url' => BEVRO_FOOTER_WIDGET_LAYOUT_7,
                        ),
                        'ft-wgt-eight' => array(
                            'url' => BEVRO_FOOTER_WIDGET_LAYOUT_8,
                        ),
                    ),
                )
            )
        );
    } 
/******************************/
/* Widget Redirect
/****************************/
if (class_exists('Bevro_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'bevro_bottom_footer_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Bevro_Widegt_Redirect(
                $wp_customize, 'bevro_bottom_footer_widget_redirect', array(
                    'section'      => 'bevro-widget-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'bevro' ),
                    'button_class' => 'focus-customizer-widget-redirect',  
                )
            )
        );
} 
/************/
//CONTENT WIDTH
/************/ 
$wp_customize->add_setting('bevro_footer_widget_content_width', array(
        'default'        => 'content-width',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('bevro_footer_widget_content_width', array(
        'settings' => 'bevro_footer_widget_content_width',
        'label'    => __('Widget Width','bevro'),
        'section'  => 'bevro-widget-footer',
        'type'     => 'select',
        'choices'  => array(
        'content-width'             => __('Content Width','bevro'),
        'full-width'             => __('Full Width','bevro'),  
    ),
));

//choose color layout
if((bevro_pro_activation_class())==''){
if(class_exists('Bevro_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'bevro_bottom_footer_widget_color_scheme', array(
                'default'           => 'ft-wgt-default',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customize_Control_Radio_Image(
                $wp_customize, 'bevro_bottom_footer_widget_color_scheme', array(
                    'label'    => esc_html__( 'Choose Color Scheme', 'bevro' ),
                    'section'  => 'bevro-widget-footer',
                    'choices'  => array(
                       'ft-wgt-default' => array(
                            'url'    => BEVRO_COLOR_SCHM_DEF,
                        ),
                        'ft-wgt-dark'   => array(
                            'url'    => BEVRO_COLOR_SCHM_DRK,
                        ),
                    ),
                )
            )
        );
    }
}

/****************/
//doc link
/****************/
$wp_customize->add_setting('bevro_widget_footer_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_widget_footer_more',
            array(
        'section'     => 'bevro-widget-footer',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#footer-widget')),
        'priority'   =>30,
)));