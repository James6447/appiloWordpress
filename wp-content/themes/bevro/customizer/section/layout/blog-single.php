<?php
/**
 * Blog Single page option
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/*********************/
//Single post content width
/*********************/
    $wp_customize->add_setting('bevro_single_post_content_width', array(
        'default'          =>'defualt',
        'capability'       =>'edit_theme_options',
        'sanitize_callback'=>'esc_attr',
    ));
    $wp_customize->add_control('bevro_single_post_content_width', array(
        'settings'=> 'bevro_single_post_content_width',
        'label'   => __('Single Post Content Width','bevro'),
        'section' => 'bevro-blog-single',
        'type'    => 'select',
        'choices' => array(
        'defualt'    => __('Default','bevro'),
        'custom' => __('Custom','bevro'),
        ),
        'priority'   =>1,
    ));
if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_sngle_cnt_widht', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1200',
                 'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_sngle_cnt_widht', array(
                    'label'       => esc_html__( 'Enter Width', 'bevro' ),
                    'section'     => 'bevro-blog-single',
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
//blog single title & meta ordering
     $wp_customize->add_setting(
        BEVRO_THEME_SETTINGS . '[bevro-blog-single-structure-meta]', array(
            'default'           => bevro_get_option('bevro-blog-single-structure-meta'),
            'type'              => 'option',
            'sanitize_callback' => 'bevro_sanitize_multi_choices',
        )
    );
    $wp_customize->add_control(
        new Bevro_Control_Sortable(
            $wp_customize, BEVRO_THEME_SETTINGS . '[bevro-blog-single-structure-meta]', array(
                'type'     => 'brv-sortable',
                'section'  => 'bevro-blog-single',
                'label'    => __( 'Single Post Structure', 'bevro' ),
                'choices'  => array(
                    'image'  => __( 'Feature Image', 'bevro' ),
                    'title'  => __( 'Post Title & Meta', 'bevro' ),  
                ),
                'priority'   =>3,
            )
        )
    );
    //single post meta odering
     $wp_customize->add_setting(
        BEVRO_THEME_SETTINGS . '[bevro-blog-meta-single]', array(
            'default'           => bevro_get_option('bevro-blog-meta-single'),
            'type'              => 'option',
            'sanitize_callback' => 'bevro_sanitize_multi_choices',
        )
    );
    $wp_customize->add_control(
        new Bevro_Control_Sortable(
            $wp_customize, BEVRO_THEME_SETTINGS . '[bevro-blog-meta-single]', array(
                'type'     => 'brv-sortable',
                'section'  => 'bevro-blog-single',
                'label'    => __( 'Single Post Meta', 'bevro' ),
                'choices'  => array(
                    'comments'  => __( 'Comments', 'bevro' ),
                    'category'  => __( 'Category', 'bevro' ),
                    'author'    => __( 'Author', 'bevro' ),
                    'date'      => __( 'Publish Date', 'bevro' ),
                ),
                'priority'   =>4,
            )
        )
    );   
 //single post meta seprator
    $wp_customize->add_setting('bevro_single_meta_seprator', array(
            'default'           =>'/',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'bevro_sanitize_text',
        )
    );
    $wp_customize->add_control('bevro_single_meta_seprator', array(
            'type'        => 'text',
            'section'     => 'bevro-blog-single',
            'label'       => __( 'Single Post Meta Separator', 'bevro' ),
            'settings' => 'bevro_single_meta_seprator',
            'priority'   =>5,
            
        )
    );

       // Enable drop cap
    $wp_customize->add_setting( 'bevro_single_drop_cap', array(
                'default'           => false,
                'sanitize_callback' => 'bevro_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_single_drop_cap', array(
                'label'       => esc_html__('Enable Drop Cap', 'bevro'),
                'type'        => 'checkbox',
                'section'     => 'bevro-blog-single',
                'settings'    => 'bevro_single_drop_cap',
                'priority'   =>6,
            ) ) );
// Remove Feature image padding
    $wp_customize->add_setting( 'bevro_single_remove_img_pad', array(
                'default'           => false,
                'sanitize_callback' => 'bevro_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_single_remove_img_pad', array(
                'label'       => esc_html__('Remove Featured Image Padding', 'bevro'),
                'type'        => 'checkbox',
                'section'     => 'bevro-blog-single',
                'settings'    => 'bevro_single_remove_img_pad',
                'priority'    =>7,
            ) ) );
    
    // DISPALY AUTOR BIO
    $wp_customize->add_setting( 'bevro_single_authr_bio', array(
                'default'           => false,
                'sanitize_callback' => 'bevro_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_single_authr_bio', array(
                'label'       => esc_html__('Display Author Info', 'bevro'),
                'type'        => 'checkbox',
                'section'     => 'bevro-blog-single',
                'settings'    => 'bevro_single_authr_bio',
                'priority'    =>9,
            ) ) );
 // Display Related Post
    $wp_customize->add_setting( 'bevro_single_related_post', array(
                'default'           => false,
                'sanitize_callback' => 'bevro_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_single_related_post', array(
                'label'       => esc_html__('Display Related Post', 'bevro'),
                'type'        => 'checkbox',
                'section'     => 'bevro-blog-single',
                'settings'    => 'bevro_single_related_post',
                'priority'    =>10,
            ) ) );
/***********************************/  
// Related post option tag & category
/***********************************/ 
$wp_customize->add_setting('bevro_single_related_post_option', array(
                'default'               => 'category',
                'sanitize_callback'     => 'bevro_sanitize_select',
            ) );

$wp_customize->add_control( new Bevro_Customizer_Buttonset_Control( $wp_customize,'bevro_single_related_post_option', array(
                'label'                 => esc_html__( 'Related Post ', 'bevro' ),
                'section'               => 'bevro-blog-single',
                'settings'              => 'bevro_single_related_post_option',
                'choices'               => array(
                    'category'   => esc_html__( 'Category', 'bevro' ),
                    'tag'        => esc_html__( 'Tag', 'bevro' ),
             ),
                'priority'   =>11,
        ) ) );
/****************/
//single blog doc link
/****************/
$wp_customize->add_setting('bevro_blog_learn_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_blog_learn_more',
            array(
        'section'     => 'bevro-blog-single',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#single-post')),
        'priority'   =>30,
    )));