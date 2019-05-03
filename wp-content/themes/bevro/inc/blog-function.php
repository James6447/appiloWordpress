<?php 
/**
 * Blog Function for Bevro Theme.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/**
 * Common Functions for Blog and Single Blog
 *
 * @return  post meta
 */
if ( ! function_exists( 'bevro_get_post_meta' ) ){
	/**
	 * Post meta
	 *
	 * @param  string $post_meta Post meta.
	 * @param  string $separator Separator.
	 * @return string            post meta markup.
	 */
	function bevro_get_post_meta( $post_meta, $separator = '/' ){
		$output_str = '';
		$loop_count = 1;
		$post_id      = get_the_ID();

		foreach ( $post_meta as $meta_value ) {

			switch ( $meta_value ) {

				case 'author':
					$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
					$output_str .= esc_html( bevro_default_strings( 'string-blog-meta-author-by', false ) ) . bevro_post_author();
					break;

				case 'date':
					$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
					$output_str .= bevro_post_date();
					break;

				case 'category':
					$category = bevro_post_categories();
					if ( '' != $category ) {
						$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
						$output_str .= $category;
					}
					break;

				case 'tag':
					$tags = bevro_post_tags();
					if ( '' != $tags ) {
						$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
						$output_str .= $tags;
					}
					break;

				case 'comments':
					$comment = bevro_post_comments();
					if ( '' != $comment ) {
						$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
						$output_str .= $comment;
					}
					break;
				case 'read-time':
					$read_time = bevro_calculate_reading_time($post_id);
					$time_unit    = __( ' min ', 'bevro' );
			        $time_postfix = __( ' read ', 'bevro' );
					if ( '' != $read_time ) {
						$output_str .= ( 1 != $loop_count && '' != $output_str ) ? ' ' . $separator . ' ' : '';
						$output_str .= '<span class="brv-reading-time">' . $read_time . $time_unit . $time_postfix . '</span>';
					}
					break;
				default:
					$output_str = apply_filters( 'bevro_meta_case_' . $meta_value, $output_str, $loop_count, $separator );

			}

			$loop_count ++;
		}

		return $output_str;
	}
}
if ( ! function_exists( 'bevro_calculate_reading_time' ) ){ 
         /**
		 * Calculate reading time.
		 *
		 * @since 1.0
		 *
		 * @param  int $post_id Post content.
		 * @return int read time.
		 */
		function bevro_calculate_reading_time( $post_id ){
			$post_content       = get_post_field( 'post_content', $post_id );
			$stripped_content   = strip_shortcodes( $post_content );
			$strip_tags_content = strip_tags( $stripped_content );
			$word_count         = str_word_count( $strip_tags_content );
			$reading_time       = ceil( $word_count / 220 );
			return $reading_time;
		}
    }
	if ( ! function_exists( 'bevro_post_date' ) ){
	/**
	 * Function to get Date of Post
	 *
	 * @return html Markup.
	 */
	function bevro_post_date(){
		$output        = '';
		$format        = apply_filters( 'bevro_post_date_format', '' );
		$time_string   = esc_html( get_the_date( $format ) );
		$modified_date = esc_html( get_the_modified_date( $format ) );
		$posted_on     = sprintf(
			esc_html( '%s' ),
			$time_string
		);
		$modified_on   = sprintf(
			esc_html( '%s' ),
			$modified_date
		);
		$output       .= '<span class="posted-on">';
		$output       .= '<span class="published" itemprop="datePublished"> ' . $posted_on . '</span>';
		//$output     .= '<span class="updated" itemprop="dateModified"> ' . $modified_on . '</span>';
		$output       .= '</span>';
		return apply_filters( 'bevro_post_date', $output );
	}
}
if ( ! function_exists( 'bevro_post_author' ) ){
	/**
	 * Function to get Author of Post
	 *
	 * @param  string $output_filter Filter string.
	 * @return html                Markup.
	 */
	function bevro_post_author( $output_filter = '' ){
		$output = '';
		$byline = sprintf(
			esc_html( '%s' ),
			'<a class="url fn n" title="View all posts by ' . esc_attr( get_the_author() ) . '" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author" itemprop="url"> <span class="author-name" itemprop="name">' . esc_html( get_the_author() ) . '</span> </a>'
		);
		$output .= '<span class="posted-by vcard author" itemtype="https://schema.org/Person" itemscope="itemscope" itemprop="author"> ' . $byline . '</span>';
		return apply_filters( 'bevro_post_author', $output, $output_filter );
	}
}
         /**
		 * Read more text.
		 *
		 * @param string $text default read more text.
		 * @return string read more text
		 */
	function bevro_read_more_text( $text ){
			$read_more = get_theme_mod( 'bevro_blog_read_more_txt' );
			if ( '' != $read_more ){
				$text = $read_more;
			}
			return $text;
		}
    add_filter( 'bevro_post_read_more', 'bevro_read_more_text');
/**
 * Function to get Read More Link of Post
 *
 * @since 1.0.0
 * @return html
 */
if ( ! function_exists( 'bevro_post_link' ) ){
	/**
	 * Function to get Read More Link of Post
	 *
	 * @param  string $output_filter Filter string.
	 * @return html                Markup.
	 */
	function bevro_post_link( $output_filter = '' ){

		$enabled = apply_filters( 'bevro_post_link_enabled', '__return_true' );
		if ( ( is_admin() && ! wp_doing_ajax() ) || ! $enabled ){
			return $output_filter;
		}

		$bevro_read_more_text    = apply_filters( 'bevro_post_read_more', __( 'Read More &raquo;', 'bevro' ) );
		$read_more_classes = apply_filters( 'bevro_post_read_more_class', array() );

		$post_link = sprintf(
			esc_html( '%s' ),
			'<a class="' . implode( ' ', $read_more_classes ) . '" href="' . esc_url( get_permalink() ) . '"> ' . the_title( '<span class="screen-reader-text">', '</span>', false ) . $bevro_read_more_text . '</a>'
		);

		$output = ' &hellip;<p class="read-more"> ' . $post_link . '</p>';

		return apply_filters( 'bevro_post_link', $output, $output_filter );
	}
}
add_filter( 'excerpt_more', 'bevro_post_link', 1 );

/**
 * Function to get Number of Comments of Post
 *
 * @since 1.0.0
 * @return html
 */
if ( ! function_exists( 'bevro_post_comments' ) ) {

	/**
	 * Function to get Number of Comments of Post
	 *
	 * @param  string $output_filter Output filter.
	 * @return html                Markup.
	 */
	function bevro_post_comments( $output_filter = '' ) {

		$output = '';

		ob_start();
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			?>
			<span class="comments-link">
				<?php
				/**
				 * Get Comment Link
				 *
				 * 
				 */
				comments_popup_link( bevro_default_strings( 'string-blog-meta-leave-a-comment', false ), bevro_default_strings( 'string-blog-meta-one-comment', false ), bevro_default_strings( 'string-blog-meta-multiple-comment', false ) );
				?>

				<!-- Comment Schema Meta -->
				<span itemprop="interactionStatistic" itemscope itemtype="https://schema.org/InteractionCounter">
					<meta itemprop="interactionType" content="https://schema.org/CommentAction" />
					<meta itemprop="userInteractionCount" content="<?php echo absint( wp_count_comments( get_the_ID() )->approved ); ?>" />
				</span>
			</span>

			<?php
		}

		$output = ob_get_clean();

		return apply_filters( 'bevro_post_comments', $output, $output_filter );
	}
}

/**
 * Function to get Tags applied of Post
 *
 * @since 1.0.0
 * @return html
 */
if ( ! function_exists( 'bevro_post_tags' ) ) {

	/**
	 * Function to get Tags applied of Post
	 *
	 * @param  string $output_filter Output filter.
	 * @return html                Markup.
	 */
	function bevro_post_tags( $output_filter = '' ) {
		$output = '';

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'bevro' ) );

		if ( $tags_list ) {
			$output .= '<span class="tags-links">' . $tags_list . '</span>';
		}

		return apply_filters( 'bevro_post_tags', $output, $output_filter );
	}
}
/**
 * Function to get Categories of Post
 *
 * @since 1.0.0
 * @return html
 */
if ( ! function_exists( 'bevro_post_categories' ) ) {

	/**
	 * Function to get Categories applied of Post
	 *
	 * @param  string $output_filter Output filter.
	 * @return html                Markup.
	 */
	function bevro_post_categories( $output_filter = '' ){
		$output = '';
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'bevro' ) );

		if ( $categories_list ) {
			$output .= '<span class="cat-links">' . $categories_list . '</span>';
		}

		return apply_filters( 'bevro_post_categories', $output, $output_filter );
	}
}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
if ( ! function_exists( 'bevro_blog_get_post_meta' ) ){
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 *
	 * @since 1.0
	 * @return mixed            Markup.
	 */
	function bevro_blog_get_post_meta() {

		$enable_meta = apply_filters( 'bevro_blog_post_meta_enabled', '__return_true' );
		$post_meta               = bevro_get_option( 'bevro-blog-meta' );
		$post_meta_seprator = get_theme_mod( 'bevro_blog_meta_seprator','/' );
		if ( 'post' == get_post_type() && is_array( $post_meta ) && $enable_meta ) {

			$output_str = bevro_get_post_meta( $post_meta, $post_meta_seprator);

			if ( ! empty( $output_str ) ) {
				echo apply_filters( 'bevro_blog_post_meta', '<div class="entry-meta">' . $output_str . '</div>', $output_str ); // WPCS: XSS OK.
			}
		}
	}
}

         /**
		 * Excerpt count.
		 *
		 * @param int $length default count of words.
		 * @return int count of words
		 */
		function bevro_excerpt_length( $length ){
			$excerpt_length = (string) get_theme_mod( 'bevro_blog_expt_length' );

			if ( '' != $excerpt_length ) {
				$length = $excerpt_length;
			}
			return $length;
		}
		add_filter( 'excerpt_length','bevro_excerpt_length', 999 );
		/**
		 * Read more class.
		 *
		 * @param array $class default classes.
		 * @return array classes
		 */
		function bevro_read_more_class( $class ) {

			$read_more_button = get_theme_mod( 'bevro_main_read_more_btn' );

			if ( $read_more_button ) {
				$class[] = 'brv-button';
			}

			return $class;
		}
		add_filter( 'bevro_post_read_more_class','bevro_read_more_class', 999 );

		/**
 * Display Blog Post Excerpt
 */
if ( ! function_exists( 'bevro_the_excerpt' ) ){
	/**
	 * Display Blog Post Excerpt
	 *
	 * @since 1.0.0
	 */
	function bevro_the_excerpt(){?>
		<div class="entry-content">
		<?php $excerpt_type = get_theme_mod( 'bevro_blog_post_content','excerpt');
		if ( 'full' == $excerpt_type ){
			the_content();
		} elseif('excerpt' == $excerpt_type ){
			the_excerpt();
		} else {
          return false;
		}?>
		</div>	
	<?php }
}
/*********************/
// Blog layout setting
/*********************/
function bevro_blog_layout_class( $class ){
			$class = get_theme_mod( 'bevro_blog_layout','brv-blog-layout-1' );
			return $class;
		}
add_filter( 'bevro_blog_post_layout_class','bevro_blog_layout_class', 999 );
/*********************/
// Grid layout setting
/*********************/
function bevro_blog_grid_layout_class( $class ){
	        $bevro_blog_layout = get_theme_mod( 'bevro_blog_layout','brv-blog-layout-1' );
	        if($bevro_blog_layout=='brv-blog-layout-1'):
			$class = get_theme_mod( 'bevro_blog_grid_layout','brv-one-colm');
		    endif;
			return $class;
		}
add_filter( 'bevro_blog_post_grid_layout_class','bevro_blog_grid_layout_class', 999 );
/*********************/
// highlighted first
/*********************/
function bevro_blog_highlight_layout_class( $classes ){
	        $bevro_blog_layout = get_theme_mod( 'bevro_blog_layout' );
	        $bevro_blog_grid_layout = get_theme_mod( 'bevro_blog_grid_layout' );
	        if($bevro_blog_layout=='brv-blog-layout-1' || $bevro_blog_grid_layout){
            $bevro_blog_highlight = get_theme_mod( 'bevro_blog_highlight' );
			if ( $bevro_blog_highlight ) {
				$classes = 'brv-blog-highlight';
			}
           }
		    return $classes;	
		}
add_filter( 'bevro_blog_post_highlight_layout_class','bevro_blog_highlight_layout_class', 999 );

/*********************/
// ADD SPACE BWN POST
/*********************/
function bevro_blog_add_space_layout_class( $classes ){
$bevro_blog_add_space = get_theme_mod( 'bevro_blog_add_space',true );
if (!$bevro_blog_add_space ){
$classes = 'brv-no-space';
}
return $classes;	
}
add_filter( 'bevro_blog_post_add_space_layout_class','bevro_blog_add_space_layout_class', 999 );
/*********************/
// REMOVE FEATURED IMAGE SPACE
/*********************/
function bevro_blog_remove_space_image_class( $classes ){
$bevro_blog_img_rmv_space = get_theme_mod( 'bevro_blog_img_rmv_space' );
if ($bevro_blog_img_rmv_space ){
$classes = 'brv-img-no-space';
}
return $classes;	
}
add_filter( 'bevro_blog_post_remove_space_image_class','bevro_blog_remove_space_image_class', 999 );

//************************/
// Date Box
//*************************/
function bevro_date_box( $output ){
			$enable_date_box = get_theme_mod( 'bevro_date_box' );
			if ( $enable_date_box ) :
				$date_box_style = get_theme_mod( 'bevro_datebox_style' );
				$time_string = '<time class="entry-date published updated" datetime="%1$s"><span class="date-month">%2$s</span> <span class="date-day">%3$s</span> <span class="date-year">%4$s</span></time>';
				if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ){
					$time_string = '<time class="entry-date published" datetime="%1$s"><span class="date-month">%2$s</span> <span class="date-day">%3$s</span> <span class="date-year">%4$s</span></time>';
				}
				$time_string = sprintf(
					$time_string,
					esc_attr( get_the_date( 'c' ) ),
					esc_html( get_the_date( 'M' ) ),
					esc_html( get_the_date( 'j' ) ),
					esc_html( get_the_date( 'Y' ) ),
					esc_attr( get_the_modified_date( 'c' ) ),
					esc_html( get_the_modified_date() )
				);
				
				ob_start();
				
				if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){?>
				<a href="<?php echo esc_url( get_permalink() ); ?>" >
					<div class="brv-date-meta <?php echo esc_attr($date_box_style); ?>">
					<span class="posted-on"><?php echo sprintf(
					esc_html( '%s' ),
					$time_string
				); ?></span>
					</div>
				</a>
				<?php } else { ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>" >
					<div class="brv-date-meta no-thumb <?php echo esc_attr($date_box_style); ?>">
					<span class="posted-on"><?php echo sprintf(
					esc_html( '%s' ),
					$time_string
				); ?></span>
					</div>
				</a>
			  <?php } ?>
				<?php
				$posted_on_data = ob_get_clean();

				$output .= $posted_on_data;
			endif;
			return $output;
	}
add_filter( 'bevro_post_date_box','bevro_date_box', 999 );
/*******************/
// loader function
/*******************/
if ( ! function_exists( 'bevro_post_loader' ) ):
function bevro_post_loader(){
$bevro_blog_post_pagination = get_theme_mod( 'bevro_blog_post_pagination','num');
$bevro_load_more_txt = get_theme_mod( 'bevro_load_more_txt',__( 'More Post', 'bevro' ));
if($bevro_blog_post_pagination=='num'){
the_posts_pagination();
}
elseif($bevro_blog_post_pagination=='click'){	
bevro_load_more_button('',$bevro_load_more_txt,'');
}
elseif($bevro_blog_post_pagination=='scroll'){
bevro_scrolling_ajax();
}
}
endif;
/**************************************/
//blog title
/**************************************/
if ( ! function_exists( 'bevro_blog_title' ) ){	
function bevro_blog_title(){ ?>
<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
<?php }
}

/**************************************************************************/
//blog post title and featured image odering
/*************************************************************************/
/**
 * Blog Post Thumbnail / Title & Meta Order
 */
if ( ! function_exists( 'bevro_blog_post_thumbnai_and_title_order' ) ){
	/**
	 * Blog post Thubmnail, Title & Blog Meta order
	 *
	 * @since  1.0.8
	 */
	function bevro_blog_post_thumbnai_and_title_order(){
		$blog_post_thumb_title_order = bevro_get_option( 'bevro-blog-structure-meta' );
		if ( is_array( $blog_post_thumb_title_order ) ){
			// Append the custom class for second element for single post.
			foreach ( $blog_post_thumb_title_order as $post_thumb_title_order ){
				switch ( $post_thumb_title_order ){

					// Blog Post Featured Image.
					case 'image':
						bevro_before_blog_feature_img_markup();
					break;
                    
					// Blog Post Title and Blog Post Meta.
					case 'title':
						bevro_after_blog_feature_img_markup();
					break;
				   
					
				}
			}
		}
	}
}
/**************************************/
//Blog layout archive function before
/**************************************/
if ( ! function_exists( 'bevro_before_blog_feature_img_markup' ) ){	
function bevro_before_blog_feature_img_markup(){?>
<div class="post-img-wrapper">	    
<?php echo apply_filters( 'bevro_post_date_box','');
$postformat = get_post_format();
if(($postformat!=='gallery')&&($postformat!=='video')&&($postformat!=='audio')&&($postformat!=='quote')):?>
<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){?>
	    <div class="post-img">
			<a href="<?php the_permalink() ?>"> <?php the_post_thumbnail('post_thumbnail_loop'); ?></a>
		</div> 		
		<?php } endif;?> 
 </div> 
<?php }
}
/**************************************/
//Blog layout archive function after
/**************************************/
if ( ! function_exists( 'bevro_after_blog_feature_img_markup' ) ){	
function bevro_after_blog_feature_img_markup(){ ?>
<div class="entery-header">
<?php 
$postformat = get_post_format();
if($postformat!=='aside'):
bevro_blog_title();
endif;
bevro_blog_get_post_meta();
?>
</div>		
<?php }
}

/**
 * Get audio files from post content
 */
if ( ! function_exists( 'bevro_get_audios_from_post' ) ) {

	/**
	 * Get audio files from post content
	 *
	 * @param  number $post_id Post id.
	 * @return mixed          Iframe.
	 */
	function bevro_get_audios_from_post( $post_id ) {

		// for audio post type - grab.
		$post    = get_post( $post_id );
		$content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
		$embeds  = apply_filters( 'bevro_get_post_audio', get_media_embedded_in_content( $content ) );

		if ( empty( $embeds ) ) {
			return '';
		}

		// check what is the first embed containg video tag, youtube or vimeo.
		foreach ( $embeds as $embed ) {
			if ( strpos( $embed, 'audio' ) ) {
				return '<span class="bevro-post-audio-wrapper">' . $embed . '</span>';
			}
		}
	}
}

/**
 * Get first image from post content
 */
if ( ! function_exists( 'bevro_get_video_from_post' ) ) {

	/**
	 * Get first image from post content
	 *
	 * @since 1.0
	 * @param  number $post_id Post id.
	 * @return mixed
	 */
	function bevro_get_video_from_post( $post_id ) {

		$post    = get_post( $post_id );
		$content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
		$embeds  = apply_filters( 'bevro_get_post_audio', get_media_embedded_in_content( $content ) );

		if ( empty( $embeds ) ) {
			return '';
		}

		// check what is the first embed containg video tag, youtube or vimeo.
		foreach ( $embeds as $embed ) {
			if ( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) || strpos( $embed, 'vimeo' ) ) {
				return $embed;
			}
		}
	}
}

/**************************************/
//Blog Post Formate
/**************************************/
if ( ! function_exists( 'bevro_blog_post_get_featured_item' ) ) {

	/**
	 * To featured image / gallery / audio / video etc. As per the post format.
	 *
	 * @since 1.0
	 * @return mixed
	 */
	function bevro_blog_post_get_featured_item(){

		$post_featured_data = '';
		$post_format        = get_post_format();
			switch ( $post_format ){
				
				case 'video':
				    $video = bevro_get_video_from_post( get_the_ID() );
					$post_featured_data = "<div class='wp-block-embed__wrapper'>
					{$video}
					</div>";
					break;

				case 'gallery':
				    $post_featured_data = get_post_gallery( get_the_ID(), false );
				    
					break;

				    case 'audio':
					$post_featured_data = do_shortcode( bevro_get_audios_from_post( get_the_ID() ) );
					break;

					case 'quote':
                    // Check is post has quote format       
    if (has_post_format('quote', get_the_ID())){
    $the_content = get_the_content();  
    // find blockquotes
    $regex = '/<!--\ wp:quote.*-->([\s\S]*?)<!--\ \/wp:quote -->/i';
    $blockquotes = preg_match_all($regex, $the_content, $matches);
    // rebuild blockqoutes
    $my_blockquotes = '';
    foreach ($matches[1] as $blockquote){
     $my_blockquotes .= "{$blockquote}";
    }
    // rebuild content
    $post_featured_data = '';
    if (!empty($my_blockquotes)){
        $post_featured_data = "
        <div class='my-blockquotes'>
            {$my_blockquotes}
        </div>\n";
    }
 }
break;
}
echo $post_featured_data;
	}
}
add_action( 'bevro_blog_post_featured_format', 'bevro_blog_post_get_featured_item' );
function bevro_get_post_gallery( $gallery, $post ){
	// Already found a gallery so lets quit.
	
	// Check the post exists.
	$post = get_post( $post );
	if ( ! $post ) {
		return $gallery;
	}
    if ( ! has_blocks( $post->post_content ) ){
    return false;
    }
	/**
	 * Search for gallery blocks and then, if found, return the html from the
	 * first gallery block.
	 *
	 */
	$pattern = "/<!--\ wp:gallery.*-->([\s\S]*?)<!--\ \/wp:gallery -->/i";
	preg_match_all( $pattern, $post->post_content, $the_galleries );
	// Check a gallery was found and if so change the gallery html.
	if ( ! empty( $the_galleries[1] ) ) {
		$gallery = reset( $the_galleries[1] );
	}
	return $gallery;
}
add_filter( 'get_post_gallery', 'bevro_get_post_gallery', 10, 2 );