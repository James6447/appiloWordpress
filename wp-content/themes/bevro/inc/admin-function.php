<?php 
/**
 * Common Function for Bevro Theme.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
 if ( ! function_exists( 'bevro_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 * Does nothing if the custom logo is not available.
 */
function bevro_custom_logo(){
    if ( function_exists( 'the_custom_logo' ) ){
        the_custom_logo();
    }
}
endif;
function bevro_header_menu_style(){
          $bevro_main_header_layout = get_theme_mod('bevro_main_header_layout');
        	if($bevro_main_header_layout =='mhdrleftpan' || $bevro_main_header_layout =='mhdrrightpan' || $bevro_main_header_layout =='mhdminbarleft'|| $bevro_main_header_layout =='mhdminbarright'){
            $menustyle='accordion';
        	}else{
        	$menustyle='horizontal';	
        	}
        	return $menustyle;
		}
function bevro_add_classes_to_page_menu( $ulclass ){
  return preg_replace( '/<ul>/','<ul class="bevro-menu" data-menu-style='.esc_attr(bevro_header_menu_style()).'>', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'bevro_add_classes_to_page_menu' );
		 // This theme uses wp_nav_menu() in two locations.
		function bevro_custom_menu(){
		     register_nav_menus(array(
			'bevro-main-menu'   => esc_html__( 'Main', 'bevro' ),
			'bevro-above-menu'  => esc_html__( 'Header Above Menu', 'bevro' ),
			'bevro-bottom-menu' => esc_html__( 'Header Below Menu', 'bevro' ),
			'bevro-abv-footer-menu' => esc_html__( 'Footer Above Menu', 'bevro' ),
			'bevro-btm-footer-menu' => esc_html__( 'Footer Below Menu', 'bevro' ),
		) );
	  }
	  add_action( 'after_setup_theme', 'bevro_custom_menu' );
	  // MAIN MENU
      function bevro_main_nav_menu(){
              wp_nav_menu( array(
              'theme_location' => 'bevro-main-menu', 
              'container' => false, 
              'link_before' => '<span>',
              'link_after' => '</span>',
              'items_wrap'      => '<ul id="bevro-menu" class="bevro-menu" data-menu-style='.esc_attr(bevro_header_menu_style()).'>%3$s</ul>',
             ));
         }
         // HEADER ABOVE MENU
         function bevro_abv_nav_menu(){
              wp_nav_menu( array('theme_location' => 'bevro-above-menu', 
              'container'   => false, 
              'link_before' => '<span>',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="bevro-above-menu" class="bevro-menu" data-menu-style='.esc_attr(bevro_header_menu_style()).'>%3$s</ul>',
             ));
         }
         // HEADER BOTTOM MENU
         function bevro_btm_nav_menu(){
              wp_nav_menu( array('theme_location' => 'bevro-bottom-menu', 
              'container'   => false, 
              'link_before' => '<span>',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="bevro-bottom-menu" class="bevro-menu" data-menu-style='.esc_attr(bevro_header_menu_style()).'>%3$s</ul>',
             ));
         }
         // FOOTER TOP MENU
         function bevro_avove_footer_nav_menu(){
              wp_nav_menu( array('theme_location' => 'bevro-abv-footer-menu', 
              'container'   => false, 
              'link_before' => '<span>',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="bevro-above-footer-menu" class="bevro-bottom-menu">%3$s</ul>',
             ));
         } 
         // FOOTER TOP MENU
         function bevro_bottom_footer_nav_menu(){
              wp_nav_menu( array('theme_location' => 'bevro-btm-footer-menu', 
              'container'   => false, 
              'link_before' => '<span>',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="bevro-bottom-footer-menu" class="bevro-bottom-menu">%3$s</ul>',
             ));
         } 
/**
 * Display Sidebars
 */
if ( ! function_exists( 'bevro_get_sidebar' ) ){
	/**
	 * Get Sidebar
	 *
	 * @since 1.0.1.1
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function bevro_get_sidebar( $sidebar_id ){
		 return $sidebar_id;
	}
}
/**
 * Return Theme options.
 */
if ( ! function_exists( 'bevro_get_option' ) ){
	/**
	 * Return Theme options.
	 *
	 * @param  string $option       Option key.
	 * @param  string $default      Option default value.
	 * @param  string $deprecated   Option default value.
	 * @return Mixed               Return option value.
	 */
	function bevro_get_option( $option, $default = '', $deprecated = '' ){

		if ( '' != $deprecated ) {
			$default = $deprecated;
		}
		$theme_options = Bevro_Theme_Options::get_options();
		/**
		 * Filter the options array for bevro Settings.
		 *
		 * @since  1.0.20
		 * @var Array
		 */
		$theme_options = apply_filters( 'bevro_get_option_array', $theme_options, $option, $default );

		$value = ( isset( $theme_options[ $option ] ) && '' !== $theme_options[ $option ] ) ? $theme_options[ $option ] : $default;
         
		/**
		 * Dynamic filter bevro_get_option_$option.
		 * $option is the name of the Bevro Setting, Refer Bevro_Theme_Options::defaults() for option names from the theme.
		 *
		 * @since  1.0.20
		 * @var Mixed.
		 */
		return apply_filters( "bevro_get_option_{$option}", $value, $option, $default );
	}
}

/**
 * Get CSS value
 */
if ( ! function_exists( 'bevro_get_css_value' ) ){

	/**
	 * Get CSS value
	 *
	 * Syntax:
	 *
	 *  bevro_get_css_value( VALUE, UNIT );
	 *
	 * E.g.
	 *
	 *  bevro_get_css_value( VALUE, 'url' );
	 *  bevro_get_css_value( VALUE, 'px' );
	 *  bevro_get_css_value( VALUE, 'em' );
	 *
	 * @param  string $value        CSS value.
	 * @param  string $unit         CSS unit.
	 * @param  string $default      CSS default font.
	 * @return mixed               CSS value depends on $unit
	 */
	function bevro_get_css_value( $value = '', $unit = 'px', $default = '' ) {

		if ( '' == $value && '' == $default ) {
			return $value;
		}

		$css_val = '';

		switch ( $unit ) {

			case 'px':
			case '%':
						$value   = ( '' != $value ) ? $value : $default;
						$css_val = esc_attr( $value ) . $unit;
				break;

			case 'url':
						$css_val = $unit . '(' . esc_url( $value ) . ')';
				break;

			case 'rem':
				if ( is_numeric( $value ) || strpos( $value, 'px' ) ) {
					$value          = intval( $value );
					$body_font_size = bevro_get_option( 'font-size-body' );
					if ( is_array( $body_font_size ) ) {
						$body_font_size_desktop = ( isset( $body_font_size['desktop'] ) && '' != $body_font_size['desktop'] ) ? $body_font_size['desktop'] : 15;
					} else {
						$body_font_size_desktop = ( '' != $body_font_size ) ? $body_font_size : 15;
					}

					if ( $body_font_size_desktop ) {
						$css_val = esc_attr( $value ) . 'px;font-size:' . ( esc_attr( $value ) / esc_attr( $body_font_size_desktop ) ) . $unit;
					}
				} else {
					$css_val = esc_attr( $value );
				}

				break;

			default:
				$value = ( '' != $value ) ? $value : $default;
				if ( '' != $value ) {
					$css_val = esc_attr( $value ) . $unit;
				}
		}

		return $css_val;
	}
}
/**
 * Get Responsive Spacing
 */
if ( ! function_exists( 'bevro_responsive_spacing' ) ) {

	/**
	 * Get Spacing value
	 *
	 * @param  array  $option    CSS value.
	 * @param  string $side  top | bottom | left | right.
	 * @param  string $device  CSS device.
	 * @param  string $default Default value.
	 * @return mixed
	 */
	function bevro_responsive_spacing( $option, $side = '', $device = 'desktop', $default = '' ) {

		if ( isset( $option[ $device ][ $side ] ) && isset( $option[ $device . '-unit' ] ) ) {
			$spacing = bevro_get_css_value( $option[ $device ][ $side ], $option[ $device . '-unit' ], $default );
		} elseif ( is_numeric( $option ) ) {
			$spacing = bevro_get_css_value( $option );
		} else {
			$spacing = ( ! is_array( $option ) ) ? $font : '';
		}

		return $spacing;
	}
}
/**
 * Parse CSS
 */
if ( ! function_exists( 'bevro_parse_css' ) ){
	/**
	 * Parse CSS
	 *
	 * @param  array  $css_output Array of CSS.
	 * @param  string $min_media  Min Media breakpoint.
	 * @param  string $max_media  Max Media breakpoint.
	 * @return string             Generated CSS.
	 */
	function bevro_parse_css( $css_output = array(), $min_media = '', $max_media = '' ){
		$parse_css = '';
		if ( is_array( $css_output ) && count( $css_output ) > 0 ) {

			foreach ( $css_output as $selector => $properties ) {

				if ( ! count( $properties ) ) {
					continue; }

				$temp_parse_css   = $selector . '{';
				$properties_added = 0;

				foreach ( $properties as $property => $value ) {

					if ( '' === $value ) {
						continue; }

					$properties_added++;
					$temp_parse_css .= $property . ':' . $value . ';';
				}

				$temp_parse_css .= '}';

				if ( $properties_added > 0 ) {
					$parse_css .= $temp_parse_css;
				}
			}

			if ( '' != $parse_css && ( '' !== $min_media || '' !== $max_media ) ) {

				$media_css       = '@media ';
				$min_media_css   = '';
				$max_media_css   = '';
				$media_separator = '';

				if ( '' !== $min_media ) {
					$min_media_css = '(min-width:' . $min_media . 'px)';
				}
				if ( '' !== $max_media ) {
					$max_media_css = '(max-width:' . $max_media . 'px)';
				}
				if ( '' !== $min_media && '' !== $max_media ) {
					$media_separator = ' and ';
				}

				$media_css .= $min_media_css . $media_separator . $max_media_css . '{' . $parse_css . '}';

				return $media_css;
			}
		}

		return $parse_css;
	}
}
/**
 * Function to check if it is Internet Explorer
 */
if ( ! function_exists( 'bevro_check_is_ie' ) ) :

	/**
	 * Function to check if it is Internet Explorer.
	 *
	 * @return true | false boolean
	 */
	function bevro_check_is_ie() {

		$is_ie = false;

		$ua = htmlentities( $_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8' );
		if ( strpos( $ua, 'Trident/7.0' ) !== false ) {
			$is_ie = true;
		}

		return apply_filters( 'bevro_check_is_ie', $is_ie );
	}

endif;

/**
 * ratia image
 */
if ( ! function_exists( 'bevro_replace_header_attr' ) ) :
	/**
	 * Replace header logo.
	 *
	 * @param array  $attr Image.
	 * @param object $attachment Image obj.
	 * @param sting  $size Size name.
	 *
	 * @return array Image attr.
	 */
	function bevro_replace_header_attr( $attr, $attachment, $size ) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		if ( $custom_logo_id == $attachment->ID ){
			$attach_data = array();
			if ( ! is_customize_preview() ){
				$attach_data = wp_get_attachment_image_src( $attachment->ID, 'bevro-logo-size' );


				if ( isset( $attach_data[0] ) ) {
					$attr['src'] = $attach_data[0];
				}
			}

			$file_type      = wp_check_filetype( $attr['src'] );
			$file_extension = $file_type['ext'];
			if ( 'svg' == $file_extension ) {
				$attr['class'] = 'bevro-logo-svg';
			}
			$retina_logo = bevro_get_option( 'bevro_header_retina_logo' );
			$attr['srcset'] = '';
			if ( apply_filters( 'bevro_main_header_retina', true ) && '' !== $retina_logo ) {
				$cutom_logo     = wp_get_attachment_image_src( $custom_logo_id, 'full' );
				$cutom_logo_url = $cutom_logo[0];

				if (bevro_check_is_ie() ){
					// Replace header logo url to retina logo url.
					$attr['src'] = $retina_logo;
				}

				$attr['srcset'] = $cutom_logo_url . ' 1x, ' . $retina_logo . ' 2x';

			}
		}

		return apply_filters( 'bevro_replace_header_attr', $attr );
	}

endif;

add_filter( 'wp_get_attachment_image_attributes', 'bevro_replace_header_attr', 10, 3 );

/********************************/
// responsive slider function
/*********************************/
if ( ! function_exists( 'bevro_responsive_slider_funct' ) ) :
function bevro_responsive_slider_funct($control_name,$function_name){
  $custom_css='';
           $control_value = get_theme_mod( $control_name );
           if ( empty( $control_value ) ){
                return '';
             }  
        if ( bevro_is_json( $control_value ) ){
    $control_value = json_decode( $control_value, true );
    if ( ! empty( $control_value ) ) {

      foreach ( $control_value as $key => $value ){
        $custom_css .= call_user_func( $function_name, $value, $key );
      }
    }
    return $custom_css;
  }  
}
endif;
/********************************/
// responsive slider function add media query
/********************************/
if ( ! function_exists( 'bevro_add_media_query' ) ) :
function bevro_add_media_query( $dimension, $custom_css ){
  switch ($dimension) {
      case 'desktop':
      $custom_css = '@media (min-width: 769px){' . $custom_css . '}';
      break;
      break;
      case 'tablet':
      $custom_css = '@media (max-width: 768px){' . $custom_css . '}';
      break;
      case 'mobile':
      $custom_css = '@media (max-width: 550px){' . $custom_css . '}';
      break;
  }

      return $custom_css;
}
endif;
/**************************/
// Dynamic Social Link
/**************************/
function bevro_social_links(){
$social='';
$original_color = get_theme_mod('bevro_social_original_color',false);
if($original_color==true){
$class_original='original-social-icon';
}else{
$class_original='';	
}
$social.='<ul class="social-icon ' .esc_attr($class_original). ' ">';
if($f_link = get_theme_mod('social_x_link_facebook','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($f_link).'"><i class="fa fa-facebook"></i></a></li>';
endif;
if($g_link = get_theme_mod('social_x_link_google','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($g_link).'"><i class="fa fa-google-plus"></i></a></li>';
endif;
if($l_link = get_theme_mod('social_x_link_linkedin','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($l_link).'"><i class="fa fa-linkedin"></i></a></li>';
endif;
if($p_link = get_theme_mod('social_x_link_pintrest','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($p_link).'"><i class="fa fa-pinterest"></i></a></li>';
endif;
if($t_link = get_theme_mod('social_x_link_twitter','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($t_link).'"><i class="fa fa-twitter"></i></a></li>';
endif;
if($insta_link = get_theme_mod('social_x_link_insta','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($insta_link).'"><i class="fa fa-instagram"></i></a></li>';
endif;
if($tum_link = get_theme_mod('social_x_link_tumblr','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($tum_link).'"><i class="fa fa-tumblr"></i></a></li>';
endif;
if($y_link = get_theme_mod('social_x_link_youtube','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($y_link).'"><i class="fa fa-youtube-play"></i></a></li>';
endif;
if($stumb_link = get_theme_mod('social_x_link_stumbleupon','#')):
	$social.='<li><a target="_blank" href="'.esc_url($stumb_link).'">
	 <i class="fa fa-stumbleupon"></i></a></li>';
endif;
if($dribble_link = get_theme_mod('social_x_link_dribble','#')):
	$social.='<li><a target="_blank" href="'.esc_url($dribble_link).'">
	 <i class="fa fa-dribbble"></i></a></li>';
endif;
$social.='</ul>';
return $social;
}

if ( ! function_exists( 'bevro_get_pro_url' ) ) :
	/**
	 * Returns an URL with utm tags
	 * the admin settings page.
	 *
	 * @param string $url    URL fo the site.
	 * @param string $source utm source.
	 * @param string $medium utm medium.
	 * @param string $campaign utm campaign.
	 * @return mixed
	 */
	function bevro_get_pro_url( $url, $source = '', $medium = '', $campaign = '' ) {

		$url = trailingslashit( $url );

		// Set up our URL if we have a source.
		if ( isset( $source ) ) {
			$url = add_query_arg( 'utm_source', sanitize_text_field( $source ), $url );
		}
		// Set up our URL if we have a medium.
		if ( isset( $medium ) ) {
			$url = add_query_arg( 'utm_medium', sanitize_text_field( $medium ), $url );
		}
		// Set up our URL if we have a campaign.
		if ( isset( $campaign ) ) {
			$url = add_query_arg( 'utm_campaign', sanitize_text_field( $campaign ), $url );
		}

		return esc_url( $url );
	}

endif;
/***************************/
// Bevro pro activation class
/***************************/
function bevro_pro_activation_class(){
$activate='';
$classes = get_body_class();
if (in_array('bevro-pro',$classes)){
    $activate ='bevro-pro-activate';
   }else{
     $activate ='';
  }
  return $activate;
}
// page-builder-class-add
function bevro_body_classes( $classes ){
		$bevro_default_container = get_theme_mod('bevro_default_container');
		$bevro_containerpage = get_theme_mod('bevro_containerpage');
		if ( 'fullwidthstrechched' == $bevro_default_container || 'fullwidthstrechched' == $bevro_containerpage ){
			$classes[] = 'brv-page-builder-template';
		}
		return $classes;
}
add_filter( 'body_class', 'bevro_body_classes' );