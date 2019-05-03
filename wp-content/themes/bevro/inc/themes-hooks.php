<?php /**
 * Theme Hook.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/**
 * Main Header
 */
function bevro_main_header(){
	do_action( 'bevro_main_header' );
}
/**
 * top Header
 */
function bevro_top_header(){
	do_action( 'bevro_top_header' );
}
/**
 * bottom Header
 */
function bevro_bottom_header(){
	do_action( 'bevro_bottom_header' );
}
/**
 * above Footer 
 */
function bevro_top_footer(){
	do_action( 'bevro_top_footer' );
}
/**
 * widget Footer 
 */
function bevro_widget_footer(){
	do_action( 'bevro_widget_footer' );
}
/**
 * bottom Footer 
 */
function bevro_bottom_footer(){
	do_action( 'bevro_bottom_footer' );
}

/**
 * Blog post layout before
 */
function bevro_blog_post_before_feature_image(){
	do_action( 'bevro_blog_post_before_feature_image' );
}
/**
 * Blog post layout after
 */
function bevro_blog_post_after_feature_image(){
	do_action( 'bevro_blog_post_after_feature_image' );
}

