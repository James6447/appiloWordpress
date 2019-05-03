<?php
/**
 *Blog Option
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/********************/
// Blog layout
/********************/
if(class_exists('Bevro_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'bevro_blog_layout', array(
                'default'           => 'brv-blog-layout-1',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customize_Control_Radio_Image(
                $wp_customize, 'bevro_blog_layout', array(
                    'label'    => esc_html__( 'Blog Layout', 'bevro' ),
                    'section'  => 'bevro-blog-archive',
                    'choices'  => array(   
                        'brv-blog-layout-1' => array(
                            'url' => BEVRO_BLOG_ARCHIVE_LAYOUT_1,
                        ),
                        
                    ),
                    'priority'   =>1,
                )
            )
        );
    } 
    /*********************/
    //Grid-layout
    /*********************/
    if(class_exists('Bevro_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'bevro_blog_grid_layout', array(
                'default'           => 'brv-one-colm',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
    $wp_customize->add_control(
            new Bevro_WP_Customize_Control_Radio_Image(
                $wp_customize, 'bevro_blog_grid_layout', array(
                    'label'    => esc_html__( 'Grid Layout', 'bevro' ),
                    'section'  => 'bevro-blog-archive',
                    'choices'  => array(   
                        'brv-one-colm' => array(
                            'url' => BEVRO_BLOG_GRID_1,
                        ),
                        'brv-two-colm' => array(
                            'url' => BEVRO_BLOG_GRID_2,
                        ),
                         'brv-three-colm' => array(
                            'url' => BEVRO_BLOG_GRID_3,
                        ),
                        'brv-four-colm' => array(
                            'url' => BEVRO_BLOG_GRID_4,
                        ),
                        
                    ),
                    'priority'   =>2,
                )
            )
        );
    } 
    // Highlight first image
    $wp_customize->add_setting( 'bevro_blog_highlight', array(
                'default'           => false,
                'sanitize_callback' => 'bevro_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_blog_highlight', array(
                'label'       => esc_html__('Make First Post Large', 'bevro'),
                'type'        => 'checkbox',
                'section'     => 'bevro-blog-archive',
                'settings'    => 'bevro_blog_highlight',
                 'priority'   =>3,
            ) ) );
    
    // add Space b/w post
    $wp_customize->add_setting( 'bevro_blog_add_space', array(
                'default'           => true,
                'sanitize_callback' => 'bevro_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_blog_add_space', array(
                'label'       => esc_html__('Add Space Between Post', 'bevro'),
                'type'        => 'checkbox',
                'section'     => 'bevro-blog-archive',
                'settings'    => 'bevro_blog_add_space',
                 'priority'   =>4,
            ) ) );
    // add Space b/w post
    $wp_customize->add_setting( 'bevro_blog_img_rmv_space', array(
                'default'           => false,
                'sanitize_callback' => 'bevro_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_blog_img_rmv_space', array(
                'label'       => esc_html__('Remove Featured Image Space
','bevro'),
                'type'        => 'checkbox',
                'section'     => 'bevro-blog-archive',
                'settings'    => 'bevro_blog_img_rmv_space',
                 'priority'   =>5,
            ) ) );
    //date box
    $wp_customize->add_setting( 'bevro_date_box', array(
                'default'           => false,
                'sanitize_callback' => 'bevro_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_date_box', array(
                'label'       => esc_html__('Enable Date Box', 'bevro'),
                'type'        => 'checkbox',
                'section'     => 'bevro-blog-archive',
                'settings'    => 'bevro_date_box',
                 'priority'   =>6,
            ) ) );
    // Date box style
    $wp_customize->add_setting('bevro_datebox_style', array(
        'default'        => 'square',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('bevro_datebox_style', array(
        'settings' => 'bevro_datebox_style',
        'label'   => __('Blog Date','bevro'),
        'section' => 'bevro-blog-archive',
        'type'    => 'select',
        'choices'    => array(
        'square'   => __('Square','bevro'),
        'circle' => __('Circle','bevro'), 
        'diamond' => __('Diamond','bevro'), 
        ),
         'priority'   =>7,
    ));
    //enable dropcap
    $wp_customize->add_setting( 'bevro_blog_dropcap', array(
                'default'           => false,
                'sanitize_callback' => 'bevro_sanitize_textarea',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_blog_dropcap', array(
                'label'       => esc_html__('Enable Drop Cap', 'bevro'),
                'type'        => 'checkbox',
                'section'     => 'bevro-blog-archive',
                'settings'    => 'bevro_blog_dropcap',
                 'priority'   =>8,
            ) ) );
    /*******************/
    //blog post content
    /*******************/
    $wp_customize->add_setting('bevro_blog_post_content', array(
        'default'        => 'excerpt',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('bevro_blog_post_content', array(
        'settings' => 'bevro_blog_post_content',
        'label'   => __('Blog Post Content','bevro'),
        'section' => 'bevro-blog-archive',
        'type'    => 'select',
        'choices'    => array(
        'full'   => __('Full Content','bevro'),
        'excerpt' => __('Excerpt Content','bevro'), 
        'nocontent' => __('No Content','bevro'), 
        ),
         'priority'   =>9,
    ));
    // excerpt length
    $wp_customize->add_setting('bevro_blog_expt_length', array(
			'default'           =>'30',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'bevro_sanitize_number',
		)
	);
	$wp_customize->add_control('bevro_blog_expt_length', array(
			'type'        => 'number',
			'section'     => 'bevro-blog-archive',
			'label'       => __( 'Excerpt Length', 'bevro' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 3000,
			),
             'priority'   =>10,
		)
	);
	// read more text
    $wp_customize->add_setting('bevro_blog_read_more_txt', array(
			'default'           =>'Read More',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'bevro_sanitize_textarea',
            'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control('bevro_blog_read_more_txt', array(
			'type'        => 'text',
			'section'     => 'bevro-blog-archive',
			'label'       => __( 'Read More Text', 'bevro' ),
			'settings' => 'bevro_blog_read_more_txt',
             'priority'   =>11,
			
		)
	);
	// display read more as a button
    $wp_customize->add_setting( 'bevro_main_read_more_btn', array(
                'default'           => false,
                'sanitize_callback' => 'bevro_sanitize_checkbox',
            ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bevro_main_read_more_btn', array(
                'label'       => esc_html__('Display Read More as Button', 'bevro'),
                'type'        => 'checkbox',
                'section'     => 'bevro-blog-archive',
                'settings'    => 'bevro_main_read_more_btn',
                 'priority'   =>12,
            ) ) );
    /*********************/
    //blog post pagination
    /*********************/
   $wp_customize->add_setting('bevro_blog_post_pagination', array(
        'default'        => 'num',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('bevro_blog_post_pagination', array(
        'settings' => 'bevro_blog_post_pagination',
        'label'   => __('Post Pagination','bevro'),
        'section' => 'bevro-blog-archive',
        'type'    => 'select',
        'choices' => array(
        'num'     => __('Numbered','bevro'),
        'click'   => __('Load More','bevro'), 
        'scroll'  => __('Infinite Scroll','bevro'), 
        ),
        'priority'   =>13,
    ));
    //load more text
    $wp_customize->add_setting('bevro_load_more_txt', array(
            'default'           =>'More Posts',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'bevro_sanitize_textarea',
        )
    );
    $wp_customize->add_control('bevro_load_more_txt', array(
            'type'        => 'text',
            'section'     => 'bevro-blog-archive',
            'label'       => __( 'Load More Text', 'bevro' ),
            'settings' => 'bevro_load_more_txt',
             'priority'   =>14,
            
        )
    );
    //blog title & meta ordering
     $wp_customize->add_setting(
        BEVRO_THEME_SETTINGS . '[bevro-blog-structure-meta]', array(
            'default'           =>bevro_get_option('bevro-blog-structure-meta'),
            'type'              => 'option',
            'sanitize_callback' => 'bevro_sanitize_multi_choices',
        )
    );
    $wp_customize->add_control(
        new Bevro_Control_Sortable(
            $wp_customize, BEVRO_THEME_SETTINGS . '[bevro-blog-structure-meta]', array(
                'type'     => 'brv-sortable',
                'section'  => 'bevro-blog-archive',
                'label'    => __( 'Blog Structure', 'bevro' ),
                'choices'  => array(
                    'image'  => __( 'Featured Image', 'bevro' ),
                    'title'  => __( 'Post Title & Meta', 'bevro' ),  
                ),
                 'priority'   =>15,
            )
        )
    );
    //blog meta odering
     $wp_customize->add_setting(
        BEVRO_THEME_SETTINGS . '[bevro-blog-meta]', array(
            'default'           =>bevro_get_option('bevro-blog-meta'),
            'type'              => 'option',
            'sanitize_callback' => 'bevro_sanitize_multi_choices',
        )
    );
    $wp_customize->add_control(
        new Bevro_Control_Sortable(
            $wp_customize, BEVRO_THEME_SETTINGS . '[bevro-blog-meta]', array(
                'type'     => 'brv-sortable',
                'section'  => 'bevro-blog-archive',
                'label'    => __( 'Blog Meta', 'bevro' ),
                'choices'  => array(
                    'comments'  => __( 'Comments', 'bevro' ),
                    'category'  => __( 'Category', 'bevro' ),
                    'author'    => __( 'Author', 'bevro' ),
                    'date'      => __( 'Publish Date', 'bevro' ),
                ),
                 'priority'   =>16,
            )
        )
    );
    //post meta seprator
    $wp_customize->add_setting('bevro_blog_meta_seprator', array(
            'default'           =>'/',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' =>'bevro_sanitize_textarea',
        )
    );
    $wp_customize->add_control('bevro_blog_meta_seprator', array(
            'type'        => 'text',
            'section'     => 'bevro-blog-archive',
            'label'       => __( 'Post Meta Separator', 'bevro' ),
            'settings' => 'bevro_blog_meta_seprator',
             'priority'   =>17,
            
        )
    );
    /*********************/
    //blog content width
    /*********************/
    $wp_customize->add_setting('bevro_blog_content_width', array(
        'default'          =>'defualt',
        'capability'       =>'edit_theme_options',
        'sanitize_callback'=>'esc_attr',
    ));
    $wp_customize->add_control('bevro_blog_content_width', array(
        'settings'=> 'bevro_blog_content_width',
        'label'   => __('Blog Content Width','bevro'),
        'section' => 'bevro-blog-archive',
        'type'    => 'select',
        'choices' => array(
        'defualt'    => __('Default','bevro'),
        'custom' => __('Custom','bevro'), 
        ),
         'priority'   =>18,
    ));
    if ( class_exists( 'Bevro_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'bevro_blog_cnt_widht', array(
                'sanitize_callback' => 'bevro_sanitize_range_value',
                'default'           => '1200',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new Bevro_WP_Customizer_Range_Value_Control(
                $wp_customize, 'bevro_blog_cnt_widht', array(
                    'label'       => esc_html__( 'Enter Width in px', 'bevro' ),
                    'section'     => 'bevro-blog-archive',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 768,
                        'max'  => 1920,
                        'step' => 1,
                    ),
                     'priority'   =>19,
                )
        )
);
}
/****************/
//blog doc link
/****************/
$wp_customize->add_setting('bevro_blog_arch_learn_more', array(
    'sanitize_callback' => 'bevro_sanitize_text',
    ));
$wp_customize->add_control(new Bevro_Misc_Control( $wp_customize, 'bevro_blog_arch_learn_more',
            array(
        'section'     => 'bevro-blog-archive',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more Go with this <a target="_blank" href="%s">Doc</a> !', 'bevro' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/bevro-wordpress-theme/#blog-archive')),
         'priority'   =>30,
    )));