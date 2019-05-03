<?php
/**
 * Header Options for Bevro Theme.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
// main header
// choose col layout
if(class_exists('Bevro_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'bevro_main_header_layout', array(
                'default'           => 'mhdrleft',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customize_Control_Radio_Image(
                $wp_customize, 'bevro_main_header_layout', array(
                    'label'    => esc_html__( 'Header Layout', 'bevro' ),
                    'section'  => 'bevro-main-header',
                    'choices'  => array(
                        'mhdrleft'   => array(
                            'url' => BEVRO_MAINHEADER_LAYOUT_LEFT,
                        ),
                        'mhdrcenter'   => array(
                            'url' => BEVRO_MAINHEADER_LAYOUT_CENTER,
                        ),
                        'mhdrright' => array(
                            'url' => BEVRO_MAINHEADER_LAYOUT_RIGHT,
                        ),
                        'mhdrleftpan' => array(
                            'url' => BEVRO_MAINHEADER_LAYOUT_LEFTPAN,
                        ),
                        'mhdrrightpan' => array(
                            'url' => BEVRO_MAINHEADER_LAYOUT_RIGHTPAN,
                        ),
                        'mhdfull' => array(
                            'url' => BEVRO_MAINHEADER_LAYOUT_FULL,
                        ),
                        'mhdminbarleft' => array(
                            'url' => BEVRO_MAINHEADER_LAYOUT_MINBARLEFT,
                        ),
                        'mhdminbarright' => array(
                            'url' => BEVRO_MAINHEADER_LAYOUT_MINBARRIGHT,
                        ),         
                    ),
                )
            )
        );
} 
// disable menu
$wp_customize->add_setting( 'bevro_main_header_menu_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'bevro_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_main_header_menu_disable', array(
                'label'                 => esc_html__('Disable Menu', 'bevro'),
                'type'                  => 'checkbox',
                'section'               => 'bevro-main-header',
                'settings'              => 'bevro_main_header_menu_disable',
            ) ) );
// main header setting
$wp_customize->add_setting('bevro_main_header_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'bevro_main_header_set', array(
        'settings' => 'bevro_main_header_set',
        'label'    => __('Last Menu Item','bevro'),
        'section'  => 'bevro-main-header',
        'type'     => 'select',
        'choices'    => array(
        'none'       => __('None','bevro'),
        'text'       => __('Text','bevro'),
        'search'     => __('Search','bevro'),
        'widget'     => __('Widget','bevro'),
        'social'     => __('Social Media','bevro'),
        'button'     => __('Button','bevro'),
        ),
    ));
// text/html
$wp_customize->add_setting('bevro_main_header_texthtml', array(
        'default'           => __('Add your content here','bevro'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_textarea',
        
    ));
$wp_customize->add_control('bevro_main_header_texthtml', array(
        'label'    => __('Text', 'bevro'),
        'section'  => 'bevro-main-header',
        'settings' => 'bevro_main_header_texthtml',
         'type'    => 'textarea',
    ));
// widget redirection
if (class_exists('Bevro_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'bevro_mian_header_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Bevro_Widegt_Redirect(
                $wp_customize, 'bevro_mian_header_widget_redirect', array(
                    'section'      => 'bevro-main-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'bevro' ),
                    'button_class' => 'focus-customizer-widget-redirect',  
                )
            )
        );
}    
// social media redirection
if (class_exists('Bevro_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'bevro_mian_header_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Bevro_Widegt_Redirect(
                $wp_customize, 'bevro_mian_header_social_media_redirect', array(
                    'section'      => 'bevro-main-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'bevro' ),
                    'button_class' => 'focus-customizer-social-media-redirect',  
                )
            )
        );
}   
// button
$wp_customize->add_setting('bevro_main_header_btn_txt', array(
        'default'           =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('bevro_main_header_btn_txt', array(
        'label'    => __('Button Text', 'bevro'),
        'section'  => 'bevro-main-header',
        'settings' => 'bevro_main_header_btn_txt',
         'type'    => 'text',
    ));
$wp_customize->add_setting('bevro_main_header_btn_url', array(
        'default'           =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_textarea',
        
    ));
$wp_customize->add_control('bevro_main_header_btn_url', array(
        'label'    => __('Button Url', 'bevro'),
        'section'  => 'bevro-main-header',
        'settings' => 'bevro_main_header_btn_url',
         'type'    => 'text',
    ));

// main header bottom-border size
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_main_hdr_botm_brd', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_main_hdr_botm_brd', array(
                    'label'       => esc_html__( 'Bottom Border Size','bevro' ),
                    'section'     => 'bevro-main-header',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 200,
                        'step' => 1,
                    ),
                )
        )
);
}
// border-color
$wp_customize->add_setting('bevro_main_brdr_clr', array(
        'default'        => '#eee',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_main_brdr_clr', array(
        'label'      => __('Bottom Border Color', 'bevro' ),
        'section'    => 'bevro-main-header',
        'settings'   => 'bevro_main_brdr_clr',
    ) ) 
 );
// choose full width header
$wp_customize->add_setting( 'bevro_main_header_width_full', array(
                'default'               => false,
                'sanitize_callback'     => 'bevro_sanitize_checkbox',
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_main_header_width_full', array(
                'label'                 => esc_html__('Enable Full Width Header', 'bevro'),
                'type'                  => 'checkbox',
                'section'               => 'bevro-main-header',
                'settings'              => 'bevro_main_header_width_full',
) ) );
/***********************************/  
// mobile menu open
/***********************************/
 if(class_exists('Bevro_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'bevro_mobile_menu_open', array(
                'default'           => 'left',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
    $wp_customize->add_control(
            new Bevro_WP_Customize_Control_Radio_Image(
                $wp_customize, 'bevro_mobile_menu_open', array(
                    'label'    => esc_html__( 'Mobile Menu Open', 'bevro' ),
                    'section'  => 'bevro-main-header',
                    'choices'  => array(   
                        'left' => array(
                            'url' => BEVRO_MAINHEADER_MOBILE_1,
                        ),
                        'overcenter' => array(
                            'url' => BEVRO_MAINHEADER_MOBILE_2,
                        ),
                         'right' => array(
                            'url' => BEVRO_MAINHEADER_MOBILE_3,
                        )  
                        
                    ),
                    
                )
            )
        );
    } 
// text
$wp_customize->add_setting('bevro_main_header_mobile_txt', array(
        'default'           =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('bevro_main_header_mobile_txt', array(
        'label'    => __('Menu Label on Small Device', 'bevro'),
        'section'  => 'bevro-main-header',
        'settings' => 'bevro_main_header_mobile_txt',
         'type'    => 'text',
    ));
// menu alignment
$wp_customize->add_setting('bevro_main_header_menu_align', array(
        'default'        => 'inline',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control( 'bevro_main_header_menu_align', array(
        'settings'=> 'bevro_main_header_menu_align',
        'label'   => __('Menu Alignment','bevro'),
        'section' => 'bevro-main-header',
        'type'    => 'select',
        'choices' => array(
        'inline'  => __('Inline','bevro'),
        'stack'   => __('Stack','bevro'),  
        ),
    ));
//choose color layout
if((bevro_pro_activation_class())==''){
if(class_exists('Bevro_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'bevro_main_color_scheme', array(
                'default'           => 'main-default',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customize_Control_Radio_Image(
                $wp_customize, 'bevro_main_color_scheme', array(
                    'label'    => esc_html__( 'Choose Color Scheme', 'bevro' ),
                    'section'  => 'bevro-main-header',
                    'choices'  => array(
                       'main-default' => array(
                            'url'     => BEVRO_COLOR_SCHM_DEF,
                        ),
                        'main-dark'   => array(
                            'url'     => BEVRO_COLOR_SCHM_DRK,
                        ),
                    ),
                )
            )
        );
    } 
}
$wp_customize->get_control( 'header_image' )->section = 'bevro-main-header';
$wp_customize->get_control( 'header_image' )->priority = 35;

/****************/
//doc link
/****************/
$wp_customize->add_setting('bevro_main_header_doc_learn_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_main_header_doc_learn_more',
            array(
        'section'     => 'bevro-main-header',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#main-header')),
         'priority'   =>50,
    )));