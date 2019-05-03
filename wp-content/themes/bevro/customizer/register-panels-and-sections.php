<?php
/**
 * Register customizer panels & sections.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/*************************/
/*Layout Panel*/
/*************************/
$wp_customize->add_panel( 'bevro-panel-layout', array(
				'priority' => 21,
				'title'    => __( 'Layout', 'bevro' ),
			) );
//conatiner section
$wp_customize->add_section('bevro-conatiner', array(
        'title'    => __('Container', 'bevro'),
        'panel'    => 'bevro-panel-layout',
        'priority' => 1,
));
$bevro_section_header_group = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-section-header-group', array(
    'title' =>  __( 'Header', 'bevro' ),
    'panel' => 'bevro-panel-layout',
    'priority' => 1,
  ));
$wp_customize->add_section( $bevro_section_header_group );
$bevro_section_sidebar_group = new Bevro_WP_Customize_Section( $wp_customize,'bevro-section-sidebar-group', array(
    'title' =>  __( 'Sidebar', 'bevro' ),
    'panel' => 'bevro-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section($bevro_section_sidebar_group);
$bevro_section_blog_group = new Bevro_WP_Customize_Section( $wp_customize,'bevro-section-blog-group', array(
    'title' =>  __( 'Blog', 'bevro' ),
    'panel' => 'bevro-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section($bevro_section_blog_group);
$bevro_section_footer_group = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-section-footer-group', array(
    'title' =>  __( 'Footer', 'bevro' ),
    'panel' => 'bevro-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section( $bevro_section_footer_group);
// above-header
$bevro_above_header = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-above-header', array(
    'title'    => __( 'Above Header', 'bevro' ),
    'panel'    => 'bevro-panel-layout',
        'section'  => 'bevro-section-header-group',
        'priority' => 1,
  ));
$wp_customize->add_section( $bevro_above_header );
// main-header
$bevro_main_header = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-main-header', array(
    'title'    => __( 'Main Header', 'bevro' ),
    'panel'    => 'bevro-panel-layout',
		'section'  => 'bevro-section-header-group',
		'priority' => 5,
  ));
$wp_customize->add_section( $bevro_main_header );
// bottom-header
$bevro_main_header = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-bottom-header', array(
    'title'    => __( 'Below Header', 'bevro' ),
    'panel'    => 'bevro-panel-layout',
    'section'  => 'bevro-section-header-group',
    'priority' => 5,
  ));
$wp_customize->add_section( $bevro_main_header );
// sticky-header
$bevro_sticky_header = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-sticky-header', array(
    'title'    => __( 'Sticky Header', 'bevro' ),
    'panel'    => 'bevro-panel-layout',
    'section'  => 'bevro-section-header-group',
    'priority' => 5,
  ));
$wp_customize->add_section($bevro_sticky_header);
// transparent-header
$bevro_transparent_header = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-transparent-header', array(
    'title'    => __( 'Transparent Header', 'bevro' ),
    'panel'    => 'bevro-panel-layout',
    'section'  => 'bevro-section-header-group',
    'priority' => 6,
  ));
$wp_customize->add_section($bevro_transparent_header);
//**********************//
//blog/archive
//**********************//
$bevro_blog_archive = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-blog-archive', array(
    'title'    => __( 'Blog/Archive', 'bevro' ),
    'panel'    => 'bevro-panel-layout',
    'section'  => 'bevro-section-blog-group',
    'priority' => 1,
  ));
$wp_customize->add_section( $bevro_blog_archive );
//**********************//
//blog single
//**********************//
$bevro_blog_single = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-blog-single', array(
    'title'    => __( 'Single Post', 'bevro' ),
    'panel'    => 'bevro-panel-layout',
    'section'  => 'bevro-section-blog-group',
    'priority' => 2,
  ));
$wp_customize->add_section( $bevro_blog_single );
//**********************//
//social icon 
//**********************//     
$bevro_social_header = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-social-icon', array(
    'title'    => __( 'Social Icon', 'bevro' ),
    'priority' => 28,
  ));
$wp_customize->add_section( $bevro_social_header );
//**********************//
//search icon 
//**********************//     
$bevro_search_header = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-search', array(
    'title'    => __( 'Search', 'bevro' ),
    'priority' => 29,
  ));
$wp_customize->add_section( $bevro_search_header );
$bevro_search_icon = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-search-icon', array(
    'title'    => __( 'Search Icon', 'bevro' ),
    'section'  => 'bevro-search',
    'priority' => 1,
  ));
$wp_customize->add_section($bevro_search_icon);
$bevro_search_box = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-search-box', array(
    'title'    => __('Search Box', 'bevro' ),
    'section'  => 'bevro-search',
    'priority' => 2,
  ));
$wp_customize->add_section($bevro_search_box);
//widget footer
$bevro_widget_footer = new Bevro_WP_Customize_Section($wp_customize,'bevro-widget-footer', array(
    'title'    => __('Footer Widget','bevro'),
    'panel'    => 'bevro-panel-layout',
    'section'  => 'bevro-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $bevro_widget_footer);
//Bottom footer
$bevro_bottom_footer = new Bevro_WP_Customize_Section($wp_customize,'bevro-bottom-footer', array(
    'title'    => __('Bottom Footer','bevro'),
    'panel'    => 'bevro-panel-layout',
    'section'  => 'bevro-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $bevro_bottom_footer);
//**************************//
//Footer Area
//**************************//
//above-footer
$bevro_above_footer = new Bevro_WP_Customize_Section( $wp_customize, 'bevro-above-footer',array(
    'title'    => __( 'Above Footer','bevro' ),
    'panel'    => 'bevro-panel-layout',
        'section'  => 'bevro-section-footer-group',
        'priority' => 1,
));
$wp_customize->add_section( $bevro_above_footer);
//widget footer
$bevro_widget_footer = new Bevro_WP_Customize_Section($wp_customize,'bevro-widget-footer', array(
    'title'    => __('Widget Footer','bevro'),
    'panel'    => 'bevro-panel-layout',
    'section'  => 'bevro-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $bevro_widget_footer);
//Bottom footer
$bevro_bottom_footer = new Bevro_WP_Customize_Section($wp_customize,'bevro-bottom-footer', array(
    'title'    => __('Below Footer','bevro'),
    'panel'    => 'bevro-panel-layout',
    'section'  => 'bevro-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $bevro_bottom_footer);
//*****************//
// scroll to top
//*****************//
$wp_customize->add_section('bevro-scroll-to-top-section', array(
        'title'    => __('Scroll To Top', 'bevro'),
        'panel'    => 'bevro-panel-layout',
        'priority' => 5,
));
/****************************/
/*Color and Background Panel*/
/****************************/
// section gloab color and background
/****************************/
/*Color and Background Panel*/
/****************************/
$wp_customize->add_panel( 'bevro-panel-color-background', array(
        'priority' => 22,
        'title'    => __( 'Color & Background', 'bevro' ),
    ) );
// Section gloab color and background
$wp_customize->add_section('bevro-gloabal-color', array(
    'title'    => __('Global Colors', 'bevro'),
    'panel'    => 'bevro-panel-color-background',
    'priority' => 1,
));
// Section Hamburger Color
$wp_customize->add_section('bevro-hamburger-color', array(
    'title'    => __('Hamburger Colors', 'bevro'),
    'panel'    => 'bevro-panel-color-background',
    'priority' => 2,
));
/*********************/
// Typography
/*********************/
$wp_customize->add_panel( 'bevro-base-typography', array(
        'priority' => 23,
        'title'    => __( 'Typography', 'bevro' ),
) );
/****************************/
/*Site Button*/
/****************************/
$wp_customize->add_section('bevro-site-button', array(
    'title'    => __('Site Button', 'bevro'),
    'priority' => 23,
));
/****************************/
/*Pre-loader*/
/****************************/
$wp_customize->add_section('bevro-pre-loader', array(
    'title'    => __('Pre Loader', 'bevro'),
    'priority' => 24,
));
/*******************/
//Typograpgy
/*******************/
$bevro_base_typography_font_subset = new Bevro_WP_Customize_Section( $wp_customize,'bevro-base-typography-font-subset', array(
    'title'      => __('Font Subset', 'bevro' ), 
    'panel'      => 'bevro-base-typography',
    'priority'   => 1,
  ));
$wp_customize->add_section($bevro_base_typography_font_subset);
$bevro_base_typography_base_typo = new Bevro_WP_Customize_Section( $wp_customize,'bevro-base-typography-base-typo', array(
    'title'      => __('Base Typography', 'bevro' ), 
    'panel'      => 'bevro-base-typography',
    'priority'   => 2,
  ));
$wp_customize->add_section($bevro_base_typography_base_typo);
$bevro_base_typography_body_font = new Bevro_WP_Customize_Section( $wp_customize,'bevro-base-typography-body-font', array(
    'title'      => __('Body', 'bevro' ), 
    'panel'      => 'bevro-base-typography',
    'section'    => 'bevro-base-typography-base-typo',
    'priority'   => 1,
  ));
$wp_customize->add_section($bevro_base_typography_body_font);
$bevro_base_typography_heading = new Bevro_WP_Customize_Section( $wp_customize,'bevro-base-typography-heading', array(
    'title'      => __('Title', 'bevro' ), 
    'panel'      => 'bevro-base-typography',
    'section'    => 'bevro-base-typography-base-typo',
    'priority'   => 2,
  ));
$wp_customize->add_section($bevro_base_typography_heading);
$bevro_base_typography_content = new Bevro_WP_Customize_Section( $wp_customize,'bevro-base-typography-content', array(
    'title'      => __('Content', 'bevro' ), 
    'panel'      => 'bevro-base-typography',
    'section'    => 'bevro-base-typography-base-typo',
    'priority'   => 3,
  ));
$wp_customize->add_section($bevro_base_typography_content);