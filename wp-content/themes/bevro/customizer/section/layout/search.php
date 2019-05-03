<?php 
/**
 *Search Options for Bevro Theme.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
//Icon-font-size
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_search_icon_font_size', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '15',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_search_icon_font_size', array(
                    'label'       => esc_html__( 'Icon Font Size', 'bevro' ),
                    'section'     => 'bevro-search-icon',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                )
           )
    );
}
//Radius
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_search_icon_radius', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_search_icon_radius', array(
                    'label'       => esc_html__( 'Icon Radius', 'bevro' ),
                    'section'     => 'bevro-search-icon',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                )
           )
    );
}
// iconcolor
$wp_customize->add_setting('bevro_search_icon_clr', array(
        'default'        => '#ea4c89',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_search_icon_clr', array(
        'label'      => __('Icon Color', 'bevro' ),
        'section'    => 'bevro-search-icon',
        'settings'   => 'bevro_search_icon_clr',
    ) ) 
 ); 
// brdrcolor
$wp_customize->add_setting('bevro_search_icon_brd_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_search_icon_brd_clr', array(
        'label'      => __('Icon Border Color', 'bevro' ),
        'section'    => 'bevro-search-icon',
        'settings'   => 'bevro_search_icon_brd_clr',
    ) ) 
 ); 
// iconhover
$wp_customize->add_setting('bevro_search_icon_hvr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_search_icon_hvr_clr', array(
        'label'      => __('Icon Hover Color', 'bevro' ),
        'section'    => 'bevro-search-icon',
        'settings'   => 'bevro_search_icon_hvr_clr',
    ) ) 
 ); 
// bgcolor
$wp_customize->add_setting('bevro_search_icon_bg_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_search_icon_bg_clr', array(
        'label'      => __('Icon Background Color', 'bevro' ),
        'section'    => 'bevro-search-icon',
        'settings'   => 'bevro_search_icon_bg_clr',
    ) ) 
 ); 
//****************//
// search box
//****************//
//Icon-font-size
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_search_box_icon_width', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '100',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_search_box_icon_width', array(
                    'label'       => esc_html__( 'Width', 'bevro' ),
                    'section'     => 'bevro-search-box',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                )
           )
    );
}
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_search_box_icon_height', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '40',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_search_box_icon_height', array(
                    'label'       => esc_html__( 'Height', 'bevro' ),
                    'section'     => 'bevro-search-box',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                )
           )
    );
}
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_search_box_radius', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '0',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_search_box_radius', array(
                    'label'       => esc_html__( 'Border Radius', 'bevro' ),
                    'section'     => 'bevro-search-box',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                )
           )
    );
}

if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_search_box_plc_txt_size', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '15',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_search_box_plc_txt_size', array(
                    'label'       => esc_html__( 'Placeholder Font Size', 'bevro' ),
                    'section'     => 'bevro-search-box',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                )
           )
    );
$wp_customize->add_setting(
            'bevro_search_box_icon_size', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '15',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_search_box_icon_size', array(
                    'label'       => esc_html__( 'Icon Size', 'bevro' ),
                    'section'     => 'bevro-search-box',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                )
           )
    );
}
$wp_customize->add_setting('bevro_social_box_bg_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_social_box_bg_clr', array(
        'label'      => __('Search Box Background Color', 'bevro' ),
        'section'    => 'bevro-search-box',
        'settings'   => 'bevro_social_box_bg_clr',
    ) ) 
 );
$wp_customize->add_setting('bevro_social_box_plc_holdr_clr', array(
        'default'           => '#bbb',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
 ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_social_box_plc_holdr_clr', array(
        'label'      => __('Placeholder Text Color', 'bevro' ),
        'section'    => 'bevro-search-box',
        'settings'   => 'bevro_social_box_plc_holdr_clr',
  )) 
);
$wp_customize->add_setting('bevro_social_box_brdr_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
 ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_social_box_brdr_clr', array(
        'label'      => __('Border Color', 'bevro' ),
        'section'    => 'bevro-search-box',
        'settings'   => 'bevro_social_box_brdr_clr',
  )) 
);

$wp_customize->add_setting('bevro_social_box_icon_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'bevro_sanitize_color',
        'transport'         => 'postMessage',
 ));
$wp_customize->add_control( 
    new Bevro_Customizer_Color_Control($wp_customize,'bevro_social_box_icon_clr', array(
        'label'      => __('Icon Color', 'bevro' ),
        'section'    => 'bevro-search-box',
        'settings'   => 'bevro_social_box_icon_clr',
  )) 
);
/****************/
//doc link
/****************/
$wp_customize->add_setting('bevro_search_icon_link_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_search_icon_link_more',
            array(
        'section'     => 'bevro-search-icon',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#search-icon')),
        'priority'   =>30,
    )));
