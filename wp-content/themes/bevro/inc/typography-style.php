<?php 
/**
 * Typography Style for Bevro Theme.
  *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
function bevro_typography_style(){
$bevro_typography_style='';
//Body 
function bevro_body_font_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= 'body{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_body_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= 'body{
   line-height: ' . $v3 . ';
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_body_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= 'body{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_body_font_size','bevro_body_font_size_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_body_font_line_height','bevro_body_line_height_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_body_font_letter_spacing','bevro_body_letter_spacing_responsive');
$bevro_body_font = get_theme_mod('bevro_body_font');
$bevro_body_text_transform = get_theme_mod('bevro_body_text_transform');
if(!empty($bevro_body_font)){
bevro_enqueue_google_font($bevro_body_font);
$bevro_typography_style.="body, button, input, select, textarea,#respond.comment-respond #submit, .read-more .brv-button, button, [type='submit'], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{ 
   font-family:{$bevro_body_font};
  }";
}
if(!empty($bevro_body_text_transform)){
$bevro_typography_style.="body, button, input, select, textarea,#respond.comment-respond #submit, .read-more .brv-button, button, [type='submit'], .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{ 
   text-transform:{$bevro_body_text_transform};
  }";
}
$bevro_heading_font           = get_theme_mod('bevro_heading_font');
$bevro_heading_text_transform = get_theme_mod('bevro_heading_text_transform');
if(!empty($bevro_heading_font)){
bevro_enqueue_google_font($bevro_heading_font);
$bevro_typography_style.=".woocommerce .page-title,h2.widget-title,.site-title h1,h2.entry-title,h2.entry-title a,h1.entry-title,h2.comments-title,h3.comment-reply-title,h4.author-header,.bevro-related-post h3,#content.blog-single .bevro-related-post ul li h3 a,h3.widget-title,.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title,.woocommerce h1.product_title, .woocommerce-Tabs-panel h2, .related.products h2, section.up-sells h2, .cross-sells h2, .cart_totals h2, .woocommerce-billing-fields h3, .woocommerce-account .addresses .title h3{ 
   font-family:{$bevro_heading_font};
  }"; 
}
if(!empty($bevro_heading_text_transform)){
$bevro_typography_style.=".woocommerce .page-title,h2.widget-title,.site-title h1,h2.entry-title,h2.entry-title a,h1.entry-title,h2.comments-title,h3.comment-reply-title,h4.author-header,.bevro-related-post h3,#content.blog-single .bevro-related-post ul li h3 a,h3.widget-title,.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title,.woocommerce h1.product_title, .woocommerce-Tabs-panel h2, .related.products h2, section.up-sells h2, .cross-sells h2, .cart_totals h2, .woocommerce-billing-fields h3, .woocommerce-account .addresses .title h3{ 
   text-transform:{$bevro_heading_text_transform};
  }"; 
}
/********************/
//Content typography
/********************/
function bevro_h1_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h1{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_h1_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h1{
   line-height: ' . $v3 . ';
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_h1_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h1{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
// h2
function bevro_h2_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h2{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_h2_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h2{
   line-height: ' . $v3 . ';
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_h2_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h2{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
// h3
function bevro_h3_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h3{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_h3_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h3{
   line-height: ' . $v3 . ';
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_h3_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h3{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
// h4
function bevro_h4_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h4{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_h4_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h4{
   line-height: ' . $v3 . ';
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_h4_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h4{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
// h5
function bevro_h5_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h5{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_h5_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h5{
   line-height: ' . $v3 . ';
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_h5_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h5{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
// h6
function bevro_h6_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h6{
   font-size: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_h6_line_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h6{
   line-height: ' . $v3 . ';
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
function bevro_h6_letter_spacing_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
    break;
    }
   $custom_css .= '.entry-content h6{
   letter-spacing: ' . $v3 . 'px;
   }';
   $custom_css = bevro_add_media_query($dimension, $custom_css);
   return $custom_css;
}
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h1_size','bevro_h1_size_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h1_line_height','bevro_h1_line_height_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h1_letter_spacing','bevro_h1_letter_spacing_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h2_size','bevro_h2_size_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h2_line_height','bevro_h2_line_height_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h2_letter_spacing','bevro_h2_letter_spacing_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h3_size','bevro_h3_size_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h3_line_height','bevro_h3_line_height_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h3_letter_spacing','bevro_h3_letter_spacing_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h4_size','bevro_h4_size_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h4_line_height','bevro_h4_line_height_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h4_letter_spacing','bevro_h4_letter_spacing_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h5_size','bevro_h5_size_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h5_line_height','bevro_h5_line_height_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h5_letter_spacing','bevro_h5_letter_spacing_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h6_size','bevro_h6_size_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h6_line_height','bevro_h6_line_height_responsive');
$bevro_typography_style.= bevro_responsive_slider_funct('bevro_h6_letter_spacing','bevro_h6_letter_spacing_responsive');
$bevro_h1_font = get_theme_mod('bevro_h1_font');
$bevro_h1_text_transform = get_theme_mod('bevro_h1_text_transform');
if(!empty($bevro_h1_font)){
bevro_enqueue_google_font($bevro_h1_font);
$bevro_typography_style.=".entry-content h1{ 
   font-family:{$bevro_h1_font};
  }";
}
if(!empty($bevro_h1_text_transform)){
$bevro_typography_style.=".entry-content h1{ 
   text-transform:{$bevro_h1_text_transform};
  }";
}
$bevro_h2_font = get_theme_mod('bevro_h2_font');
$bevro_h2_text_transform = get_theme_mod('bevro_h2_text_transform');
if(!empty($bevro_h2_font)){
bevro_enqueue_google_font($bevro_h2_font);
$bevro_typography_style.=".entry-content h2{ 
   font-family:{$bevro_h2_font};
   text-transform:{$bevro_h2_text_transform};
  }";
}
if(!empty($bevro_h2_text_transform)){
$bevro_typography_style.=".entry-content h2{ 
   text-transform:{$bevro_h2_text_transform};
  }";
}
$bevro_h3_font = get_theme_mod('bevro_h3_font');
$bevro_h3_text_transform = get_theme_mod('bevro_h3_text_transform');
if(!empty($bevro_h3_font)){
bevro_enqueue_google_font($bevro_h3_font);
$bevro_typography_style.=".entry-content h3{ 
   font-family:{$bevro_h3_font};
  }";
}
if(!empty($bevro_h3_text_transform)){
$bevro_typography_style.=".entry-content h3{ 
   text-transform:{$bevro_h3_text_transform};
  }";
}
$bevro_h4_font = get_theme_mod('bevro_h4_font');
$bevro_h4_text_transform = get_theme_mod('bevro_h4_text_transform');
if(!empty($bevro_h4_font)){
bevro_enqueue_google_font($bevro_h4_font);
$bevro_typography_style.=".entry-content h4{ 
   font-family:{$bevro_h4_font};
  }";
}
if(!empty($bevro_h4_text_transform)){
$bevro_typography_style.=".entry-content h4{ 
   text-transform:{$bevro_h4_text_transform};
  }";
}
$bevro_h5_font = get_theme_mod('bevro_h5_font');
$bevro_h5_text_transform = get_theme_mod('bevro_h5_text_transform');
if(!empty($bevro_h5_font)){
bevro_enqueue_google_font($bevro_h5_font);
$bevro_typography_style.=".entry-content h5{ 
   font-family:{$bevro_h5_font};
  }";
}
if(!empty($bevro_h5_text_transform)){
$bevro_typography_style.=".entry-content h5{ 
   text-transform:{$bevro_h5_text_transform};
  }";
}
$bevro_h6_font = get_theme_mod('bevro_h6_font');
$bevro_h6_text_transform = get_theme_mod('bevro_h6_text_transform');
if(!empty($bevro_h6_font)){
bevro_enqueue_google_font($bevro_h6_font);
$bevro_typography_style.=".entry-content h6{ 
   font-family:{$bevro_h6_font};
   text-transform:{$bevro_h6_text_transform};
  }";
}
if(!empty($bevro_h6_text_transform)){
$bevro_typography_style.=".entry-content h6{ 
   text-transform:{$bevro_h6_text_transform};
  }";
}
return $bevro_typography_style;
}