<?php 
/**
 * Base-Typography for Bevro Theme.
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
if ( class_exists( 'Bevro_Customize_Control_Checkbox_Multiple' ) ){
    $wp_customize->add_setting(
            'bevro_font_subsets', array(
                'default' => array( 'latin' ),
                'sanitize_callback' => 'bevro_checkbox_explode',
            )
        );
    $wp_customize->add_control(
            new Bevro_Customize_Control_Checkbox_Multiple(
                $wp_customize, 'bevro_font_subsets', array(
                    'section' => 'bevro-base-typography-font-subset',
                    'label'   => esc_html__( 'Font Subsets', 'bevro' ),
                    'choices' => array(
                        'latin'     => 'latin',
                        'latin-ext' => 'latin-ext',
                        'cyrillic'  => 'cyrillic',
                        'cyrillic-ext' => 'cyrillic-ext',
                        'greek'        => 'greek',
                        'greek-ext'    => 'greek-ext',
                        'vietnamese'   => 'vietnamese',
                        'arabic'       => 'arabic',
                    ),
                    'priority' => 1,
                )
            )
        );
}
//Body
if (class_exists( 'Bevro_Font_Selector')){
        $wp_customize->add_setting(
            'bevro_body_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Bevro_Font_Selector(
                $wp_customize, 'bevro_body_font', array(
        'label' => esc_html__( 'Font family', 'bevro' ),
                    'section'           => 'bevro-base-typography-body-font',
                    'priority'          => 1,
                    'type'              => 'select',
            )
        )
    );
}
//Text-transform
$wp_customize->add_setting('bevro_body_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'bevro_body_text_transform', array(
        'settings' => 'bevro_body_text_transform',
        'label'    => __('Text Transform','bevro'),
        'section'  => 'bevro-base-typography-body-font',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'bevro' ),
        'none'       => __( 'None', 'bevro' ),
        'capitalize' => __( 'Capitalize', 'bevro' ),
        'uppercase'  => __( 'Uppercase', 'bevro' ),
        'lowercase'  => __( 'Lowercase', 'bevro' ),    
        ),
));
/*******************/
// font-size
/*******************/
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_body_font_size', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '15',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_body_font_size', array(
                    'label'       => esc_html__( 'Font-Size', 'bevro' ),
                    'section'     => 'bevro-base-typography-body-font',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
// font line-height
$wp_customize->add_setting(
            'bevro_body_font_line_height', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1.6',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize,'bevro_body_font_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'bevro' ),
                    'section'     => 'bevro-base-typography-body-font',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
// font letter spacing
$wp_customize->add_setting(
                'bevro_body_font_letter_spacing', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_body_font_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'bevro' ),
                    'section'     => 'bevro-base-typography-body-font',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}
/*******************/
//Heading Font-Style
/*******************/
if (class_exists( 'Bevro_Font_Selector')){
        $wp_customize->add_setting(
            'bevro_heading_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Bevro_Font_Selector(
                $wp_customize, 'bevro_heading_font', array(
            'label' => esc_html__( 'Font family', 'bevro' ),
                    'section'     => 'bevro-base-typography-heading',
                    'priority'    => 1,
                    'type'        => 'select',
            )
        )
    );
}
//Text-transform
$wp_customize->add_setting('bevro_heading_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'bevro_heading_text_transform', array(
        'settings' => 'bevro_heading_text_transform',
        'label'    => __('Text Transform','bevro'),
        'section'  => 'bevro-base-typography-heading',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'bevro' ),
        'none'       => __( 'None', 'bevro' ),
        'capitalize' => __( 'Capitalize', 'bevro' ),
        'uppercase'  => __( 'Uppercase', 'bevro' ),
        'lowercase'  => __( 'Lowercase', 'bevro' ),    
        ),
));
/**********************/
//Content Font-Style H1
/**********************/
if (class_exists( 'Bevro_Font_Selector')){
        $wp_customize->add_setting(
            'bevro_h1_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Bevro_Font_Selector(
                $wp_customize, 'bevro_h1_font', array(
            'label' => esc_html__( 'H1', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'select',
            )
        )
    );
}
//H1 Text-transform
$wp_customize->add_setting('bevro_h1_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'bevro_h1_text_transform', array(
        'settings' => 'bevro_h1_text_transform',
        'label'    => __('Text Transform','bevro'),
        'section'  => 'bevro-base-typography-content',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'bevro' ),
        'none'       => __( 'None', 'bevro' ),
        'capitalize' => __( 'Capitalize', 'bevro' ),
        'uppercase'  => __( 'Uppercase', 'bevro' ),
        'lowercase'  => __( 'Lowercase', 'bevro' ),    
        ),
));
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_h1_size', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '48',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_h1_size', array(
                    'label'       => esc_html__( 'Font-Size', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
$wp_customize->add_setting(
            'bevro_h1_line_height', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1.2',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize,'bevro_h1_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );

// font letter spacing
$wp_customize->add_setting(
                'bevro_h1_letter_spacing', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_h1_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}
/**********************/
//Content Font-Style H2
/**********************/
if (class_exists( 'Bevro_Font_Selector')){
        $wp_customize->add_setting(
            'bevro_h2_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Bevro_Font_Selector(
                $wp_customize, 'bevro_h2_font', array(
            'label' => esc_html__( 'H2', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    
                    'type'        => 'select',
            )
        )
    );
}
//H1 Text-transform
$wp_customize->add_setting('bevro_h2_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'bevro_h2_text_transform', array(
        'settings' => 'bevro_h2_text_transform',
        'label'    => __('Text Transform','bevro'),
        'section'  => 'bevro-base-typography-content',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'bevro' ),
        'none'       => __( 'None', 'bevro' ),
        'capitalize' => __( 'Capitalize', 'bevro' ),
        'uppercase'  => __( 'Uppercase', 'bevro' ),
        'lowercase'  => __( 'Lowercase', 'bevro' ),    
        ),
));
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_h2_size', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '44',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_h2_size', array(
                    'label'       => esc_html__( 'Font-Size', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
$wp_customize->add_setting(
            'bevro_h2_line_height', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1.3',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize,'bevro_h2_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );

// font letter spacing
$wp_customize->add_setting(
                'bevro_h2_letter_spacing', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_h2_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}
/**********************/
//Content Font-Style H3
/**********************/
if (class_exists( 'Bevro_Font_Selector')){
        $wp_customize->add_setting(
            'bevro_h3_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Bevro_Font_Selector(
                $wp_customize, 'bevro_h3_font', array(
            'label' => esc_html__( 'H3', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    
                    'type'        => 'select',
            )
        )
    );
}
//H1 Text-transform
$wp_customize->add_setting('bevro_h3_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'bevro_h3_text_transform', array(
        'settings' => 'bevro_h3_text_transform',
        'label'    => __('Text Transform','bevro'),
        'section'  => 'bevro-base-typography-content',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'bevro' ),
        'none'       => __( 'None', 'bevro' ),
        'capitalize' => __( 'Capitalize', 'bevro' ),
        'uppercase'  => __( 'Uppercase', 'bevro' ),
        'lowercase'  => __( 'Lowercase', 'bevro' ),    
        ),
));
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_h3_size', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '40',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_h3_size', array(
                    'label'       => esc_html__( 'Font-Size', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
$wp_customize->add_setting(
            'bevro_h3_line_height', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1.4',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize,'bevro_h3_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );

// font letter spacing
$wp_customize->add_setting(
                'bevro_h3_letter_spacing', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_h3_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}
/**********************/
//Content Font-Style H4
/**********************/
if (class_exists( 'Bevro_Font_Selector')){
        $wp_customize->add_setting(
            'bevro_h4_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Bevro_Font_Selector(
                $wp_customize, 'bevro_h4_font', array(
            'label' => esc_html__( 'H4', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    
                    'type'        => 'select',
            )
        )
    );
}
//H1 Text-transform
$wp_customize->add_setting('bevro_h4_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'bevro_h4_text_transform', array(
        'settings' => 'bevro_h4_text_transform',
        'label'    => __('Text Transform','bevro'),
        'section'  => 'bevro-base-typography-content',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'bevro' ),
        'none'       => __( 'None', 'bevro' ),
        'capitalize' => __( 'Capitalize', 'bevro' ),
        'uppercase'  => __( 'Uppercase', 'bevro' ),
        'lowercase'  => __( 'Lowercase', 'bevro' ),    
        ),
));
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_h4_size', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '36',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_h4_size', array(
                    'label'       => esc_html__( 'Font-Size', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
$wp_customize->add_setting(
            'bevro_h4_line_height', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1.5',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize,'bevro_h4_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );

// font letter spacing
$wp_customize->add_setting(
                'bevro_h4_letter_spacing', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_h4_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}
/**********************/
//Content Font-Style H5
/**********************/
if (class_exists( 'Bevro_Font_Selector')){
        $wp_customize->add_setting(
            'bevro_h5_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Bevro_Font_Selector(
                $wp_customize, 'bevro_h5_font', array(
            'label' => esc_html__( 'H5', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    
                    'type'        => 'select',
            )
        )
    );
}
//H5 Text-transform
$wp_customize->add_setting('bevro_h5_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'bevro_h5_text_transform', array(
        'settings' => 'bevro_h5_text_transform',
        'label'    => __('Text Transform','bevro'),
        'section'  => 'bevro-base-typography-content',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'bevro' ),
        'none'       => __( 'None', 'bevro' ),
        'capitalize' => __( 'Capitalize', 'bevro' ),
        'uppercase'  => __( 'Uppercase', 'bevro' ),
        'lowercase'  => __( 'Lowercase', 'bevro' ),    
        ),
));
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_h5_size', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '32',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_h5_size', array(
                    'label'       => esc_html__( 'Font-Size', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
$wp_customize->add_setting(
            'bevro_h5_line_height', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1.6',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize,'bevro_h5_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );

// font letter spacing
$wp_customize->add_setting(
                'bevro_h5_letter_spacing', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_h5_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}
/**********************/
//Content Font-Style H6
/**********************/
if (class_exists( 'Bevro_Font_Selector')){
        $wp_customize->add_setting(
            'bevro_h6_font', array(
                'type'              => 'theme_mod',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            new Bevro_Font_Selector(
                $wp_customize, 'bevro_h6_font', array(
            'label' => esc_html__( 'H6', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'select',
            )
        )
    );
}
//H5 Text-transform
$wp_customize->add_setting('bevro_h6_text_transform', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
));
$wp_customize->add_control( 'bevro_h6_text_transform', array(
        'settings' => 'bevro_h6_text_transform',
        'label'    => __('Text Transform','bevro'),
        'section'  => 'bevro-base-typography-content',
        'type'     => 'select',
        'choices'    => array(
        ''           => __( 'Default', 'bevro' ),
        'none'       => __( 'None', 'bevro' ),
        'capitalize' => __( 'Capitalize', 'bevro' ),
        'uppercase'  => __( 'Uppercase', 'bevro' ),
        'lowercase'  => __( 'Lowercase', 'bevro' ),    
        ),
));
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_h6_size', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '30',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_h6_size', array(
                    'label'       => esc_html__( 'Font-Size', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
$wp_customize->add_setting(
            'bevro_h6_line_height', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1.7',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize,'bevro_h6_line_height', array(
                    'label'       => esc_html__( 'Line-Height', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 10,
                        'step' => 0.1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );

// font letter spacing
$wp_customize->add_setting(
                'bevro_h6_letter_spacing', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_h6_letter_spacing', array(
                    'label'       => esc_html__( 'Letter-Spacing', 'bevro' ),
                    'section'     => 'bevro-base-typography-content',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
    );
}

/****************/
//font subset doc link
/****************/
$wp_customize->add_setting('bevro_font_subset_more', array(
    'sanitize_callback' => 'bevro_sanitize_textarea',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_font_subset_more',
            array(
        'section'     => 'bevro-base-typography-font-subset',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#font-subsets')),
        'priority'   =>30,
    )));

/****************/
//body doc link
/****************/
$wp_customize->add_setting('bevro_body_font_more', array(
    'sanitize_callback' => 'bevro_sanitize_textarea',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_body_font_more',
            array(
        'section'     => 'bevro-base-typography-body-font',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#base-typography')),
        'priority'   =>30,
    )));