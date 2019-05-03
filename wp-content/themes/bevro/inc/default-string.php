<?php
/**
 * Bevro Theme Strings
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/**
 * Default Strings
 */
if ( ! function_exists( 'bevro_default_strings' ) ) {

	/**
	 * Default Strings
	 *
	 * @since 1.0.0
	 * @param  string  $key  String key.
	 * @param  boolean $echo Print string.
	 * @return mixed        Return string or nothing.
	 */
	function bevro_default_strings( $key, $echo = true ){

		$defaults = apply_filters(
			'bevro_default_strings', array(

				// Header.
				'string-header-skip-link'                => __( 'Skip to content', 'bevro' ),

				// 404 Page Strings.
				'string-404-sub-title'                   => __( 'It looks like the link pointing here was faulty. Maybe try searching?', 'bevro' ),

				// Search Page Strings.
				'string-search-nothing-found'            => __( 'Nothing Found', 'bevro' ),
				'string-search-nothing-found-message'    => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bevro' ),
				'string-full-width-search-message'       => __( 'Start typing and press enter to search', 'bevro' ),
				'string-full-width-search-placeholder'   => __( 'Start Typing&hellip;', 'bevro' ),
				'string-header-cover-search-placeholder' => __( 'Start Typing&hellip;', 'bevro' ),
				'string-search-input-placeholder'        => __( 'Search &hellip;', 'bevro' ),

				// Comment Template Strings.
				'string-comment-reply-link'              => __( 'Reply', 'bevro' ),
				'string-comment-edit-link'               => __( 'Edit', 'bevro' ),
				'string-comment-awaiting-moderation'     => __( 'Your comment is awaiting moderation.', 'bevro' ),
				'string-comment-title-reply'             => __( 'Leave a Comment', 'bevro' ),
				'string-comment-cancel-reply-link'       => __( 'Cancel Reply', 'bevro' ),
				'string-comment-label-submit'            => __( 'Post Comment &raquo;', 'bevro' ),
				'string-comment-label-message'           => __( 'Type here..', 'bevro' ),
				'string-comment-label-name'              => __( 'Name*', 'bevro' ),
				'string-comment-label-email'             => __( 'Email*', 'bevro' ),
				'string-comment-label-website'           => __( 'Website', 'bevro' ),
				'string-comment-closed'                  => __( 'Comments are closed.', 'bevro' ),
				'string-comment-navigation-title'        => __( 'Comment navigation', 'bevro' ),
				'string-comment-navigation-next'         => __( 'Newer Comments', 'bevro' ),
				'string-comment-navigation-previous'     => __( 'Older Comments', 'bevro' ),

				// Blog Default Strings.
				'string-blog-page-links-before'          => __( 'Pages:', 'bevro' ),
				'string-blog-meta-author-by'             => __( 'By ', 'bevro' ),
				'string-blog-meta-leave-a-comment'       => __( 'Leave a Comment', 'bevro' ),
				'string-blog-meta-one-comment'           => __( '1 Comment', 'bevro' ),
				'string-blog-meta-multiple-comment'      => __( '% Comments', 'bevro' ),
				'string-blog-navigation-next'            => __( 'Next Page', 'bevro' ) . ' <span class="ast-right-arrow">&rarr;</span>',
				'string-blog-navigation-previous'        => '<span class="ast-left-arrow">&larr;</span> ' . __( 'Previous Page', 'bevro' ),

				// Single Post Default Strings.
				'string-single-page-links-before'        => __( 'Pages:', 'bevro' ),
				/* translators: 1: Post type label */
				'string-single-navigation-next'          => __( 'Next %s', 'bevro' ) . ' <span class="ast-right-arrow">&rarr;</span>',
				/* translators: 1: Post type label */
				'string-single-navigation-previous'      => '<span class="ast-left-arrow">&larr;</span> ' . __( 'Previous %s', 'bevro' ),

				// Content None.
				'string-content-nothing-found-message'   => __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bevro' ),

			)
		);
		$output = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

		/**
		 * Print or return
		 */
		if ( $echo ) {
			echo esc_attr($output);
		} else {
			return $output;
		}
	}
}
