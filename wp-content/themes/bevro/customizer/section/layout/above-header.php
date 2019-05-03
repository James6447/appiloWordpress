<?php
/**
 * Header Options for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
//above header
// choose col layout
if(class_exists('Bevro_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'bevro_above_header_layout', array(
                'default'           => 'abv-none',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customize_Control_Radio_Image(
                $wp_customize, 'bevro_above_header_layout', array(
                    'label'    => esc_html__( 'Layout', 'bevro' ),
                    'section'  => 'bevro-above-header',
                    'choices'  => array(
                       'abv-none'   => array(
                            'url' => BEVRO_TOP_HEADER_LAYOUT_NONE,
                        ),
                        'abv-one'   => array(
                            'url' => BEVRO_TOP_HEADER_LAYOUT_1,
                        ),
                        'abv-two' => array(
                            'url' => BEVRO_TOP_HEADER_LAYOUT_2,
                        ),
                        'abv-three' => array(
                            'url' => BEVRO_TOP_HEADER_LAYOUT_3,
                        ),
                    ),
                )
            )
        );
    } 
// col1
$wp_customize->add_setting('bevro_above_header_col1_set', array(
        'default'        => 'text',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'bevro_above_header_col1_set', array(
        'settings' => 'bevro_above_header_col1_set',
        'label'   => __('Column 1','bevro'),
        'section' => 'bevro-above-header',
        'type'    => 'select',
        'choices'    => array(
        'none'                 => __('None','bevro'),
        'text'             => __('Text','bevro'),
        'menu'                 => __('Menu','bevro'),
        'search'             => __('Search','bevro'),
        'widget'                 => __('Widget','bevro'),
        'social'             => __('Social Media','bevro'),
            
        ),
    ));
// col1-text/html
$wp_customize->add_setting('bevro_col1_texthtml', array(
        'default'           => __('Add your content here','bevro'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('bevro_col1_texthtml', array(
        'label'    => __('Text', 'bevro'),
        'section'  => 'bevro-above-header',
        'settings' => 'bevro_col1_texthtml',
         'type'    => 'textarea',
    ));
// col1 widget redirection
if (class_exists('Bevro_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'bevro_col1_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Bevro_Widegt_Redirect(
                $wp_customize, 'bevro_col1_widget_redirect', array(
                    'section'      => 'bevro-above-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'bevro' ),
                    'button_class' => 'focus-customizer-widget-redirect-col1',  
                )
            )
        );
} 
// col1 menu redirection
if (class_exists('Bevro_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'bevro_col1_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Bevro_Widegt_Redirect(
                $wp_customize, 'bevro_col1_menu_redirect', array(
                    'section'      => 'bevro-above-header',
                    'button_text'  => esc_html__( 'Go To Menu', 'bevro' ),
                    'button_class' => 'focus-customizer-menu-redirect-col1',  
                )
            )
        );
} 
// col1 social media redirection
if (class_exists('Bevro_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'bevro_col1_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Bevro_Widegt_Redirect(
                $wp_customize, 'bevro_col1_social_media_redirect', array(
                    'section'      => 'bevro-above-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'bevro' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col1',  
                )
            )
        );
} 
// col2
$wp_customize->add_setting('bevro_above_header_col2_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'bevro_above_header_col2_set', array(
        'settings' => 'bevro_above_header_col2_set',
        'label'   => __('Column 2','bevro'),
        'section' => 'bevro-above-header',
        'type'    => 'select',
        'choices'    => array(
        'none'                 => __('None','bevro'),
        'text'             => __('Text','bevro'),
        'menu'                 => __('Menu','bevro'),
        'search'             => __('Search','bevro'),
        'widget'                 => __('Widget','bevro'),
        'social'             => __('Social Media','bevro'),
            
        ),
    ));
// col2-text/html
$wp_customize->add_setting('bevro_col2_texthtml', array(
        'default'           => __('Add your content here','bevro'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('bevro_col2_texthtml', array(
        'label'    => __('Text', 'bevro'),
        'section'  => 'bevro-above-header',
        'settings' => 'bevro_col2_texthtml',
         'type'    => 'textarea',
    ));
// col2 menu redirection
if (class_exists('Bevro_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'bevro_col2_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Bevro_Widegt_Redirect(
                $wp_customize, 'bevro_col2_menu_redirect', array(
                    'section'      => 'bevro-above-header',
                    'button_text'  => esc_html__( 'Go To Menu', 'bevro' ),
                    'button_class' => 'focus-customizer-menu-redirect-col2',  
                )
            )
        );
} 
// col2 widget redirection
if (class_exists('Bevro_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'bevro_col2_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Bevro_Widegt_Redirect(
                $wp_customize, 'bevro_col2_widget_redirect', array(
                    'section'      => 'bevro-above-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'bevro' ),
                    'button_class' => 'focus-customizer-widget-redirect-col2',  
                )
            )
        );
}    
// col2 social media redirection
if (class_exists('Bevro_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'bevro_col2_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Bevro_Widegt_Redirect(
                $wp_customize, 'bevro_col2_social_media_redirect', array(
                    'section'      => 'bevro-above-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'bevro' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col2',  
                )
            )
        );
} 
// col3
$wp_customize->add_setting('bevro_above_header_col3_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'bevro_above_header_col3_set', array(
        'settings' => 'bevro_above_header_col3_set',
        'label'   => __('Column 3','bevro'),
        'section' => 'bevro-above-header',
        'type'    => 'select',
        'choices'    => array(
        'none'                 => __('None','bevro'),
        'text'             => __('Text','bevro'),
        'menu'                 => __('Menu','bevro'),
        'search'             => __('Search','bevro'),
        'widget'                 => __('Widget','bevro'),
        'social'             => __('Social Media','bevro'),
            
        ),
    ));

// col3-text/html
$wp_customize->add_setting('bevro_col3_texthtml', array(
        'default'           => __('Add your content here','bevro'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('bevro_col3_texthtml', array(
        'label'    => __('Text', 'bevro'),
        'section'  => 'bevro-above-header',
        'settings' => 'bevro_col3_texthtml',
         'type'    => 'textarea',
    ));
// col3 social media redirection
if (class_exists('Bevro_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'bevro_col3_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Bevro_Widegt_Redirect(
                $wp_customize, 'bevro_col3_social_media_redirect', array(
                    'section'      => 'bevro-above-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'bevro' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col3',  
                )
            )
        );
} 
// col3 menu redirection
if (class_exists('Bevro_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'bevro_col3_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Bevro_Widegt_Redirect(
                $wp_customize, 'bevro_col3_menu_redirect', array(
                    'section'      => 'bevro-above-header',
                    'button_text'  => esc_html__( 'Go To Menu', 'bevro' ),
                    'button_class' => 'focus-customizer-menu-redirect-col3',  
                )
            )
        );
}
// col3 widget redirection
if (class_exists('Bevro_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'bevro_col3_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new Bevro_Widegt_Redirect(
                $wp_customize, 'bevro_col3_widget_redirect', array(
                    'section'      => 'bevro-above-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'bevro' ),
                    'button_class' => 'focus-customizer-widget-redirect-col3',  
                )
            )
        );
}
/****************************/
// common option
/****************************/
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_abv_hdr_hgt', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '40',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_abv_hdr_hgt', array(
                    'label'       => esc_html__( 'Height', 'bevro' ),
                    'section'     => 'bevro-above-header',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 20,
                        'max'  => 1000,
                        'step' => 1,
                    ),
                )
        )
);
}
// above bottom-border
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_abv_hdr_botm_brd', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_abv_hdr_botm_brd', array(
                    'label'       => esc_html__( 'Bottom Border', 'bevro' ),
                    'section'     => 'bevro-above-header',
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
 $wp_customize->add_setting('bevro_above_brdr_clr', array(
        'default'        => '#eee',
        'capability'     => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'bevro_sanitize_color'
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_above_brdr_clr', array(
        'label'      => __('Border Color', 'bevro' ),
        'section'    => 'bevro-above-header',
        'settings'   => 'bevro_above_brdr_clr',
    ) ) 
 );  

//choose color layout
if((bevro_pro_activation_class())==''){
  if(class_exists('Bevro_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'bevro_above_color_scheme', array(
                'default'           => 'abv-default',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customize_Control_Radio_Image(
                $wp_customize, 'bevro_above_color_scheme', array(
                    'label'    => esc_html__( 'Choose Color Scheme', 'bevro' ),
                    'section'  => 'bevro-above-header',
                    'choices'  => array(
                       'abv-default' => array(
                            'url'    => BEVRO_COLOR_SCHM_DEF,
                        ),
                        'abv-dark'   => array(
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
$wp_customize->add_setting('bevro_abv_header_doc_learn_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_abv_header_doc_learn_more',
            array(
        'section'     => 'bevro-above-header',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#above-header')),
         'priority'   =>50,
    )));