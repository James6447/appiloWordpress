<?php
/**
 *Content Function for Bevro Theme
 */
if ( ! function_exists( 'bevro_page_content_layout' ) ){
function bevro_page_content_layout($page_post_meta_set='default', $default=''){
    $bevro_containerpage     = get_theme_mod('bevro_containerpage',$default);
    $bevro_containerblogpage = get_theme_mod('bevro_containerblogpage',$default);
    $bevro_containerwoopage  = get_theme_mod('bevro_containerwoopage',$default);
    $layout='';
if($page_post_meta_set=='default' || $page_post_meta_set==''){
    if((class_exists( 'WooCommerce' ))&&(is_woocommerce() || is_checkout() || is_cart() || is_account_page())){
       $layout = $bevro_containerwoopage;
       
    }
    elseif(is_page()){
       $layout = $bevro_containerpage;
      
    }
    elseif(is_single()){
       $layout = $bevro_containerblogpage;
    }
    
    else{
       $layout = '';
    }   
    return apply_filters( 'bevro_page_content_layout', $layout, $default ); 
  }else{
      if(is_page()){
       $layout = $page_post_meta_set;
      }
      elseif(is_single()){
       $layout = $page_post_meta_set;
      } 
      elseif((class_exists( 'WooCommerce' )) && (is_woocommerce() || is_checkout() || is_cart() || is_account_page())){
       $layout = $page_post_meta_set;
      } 
   else{
       $layout = '';
     }
    return apply_filters( 'bevro_page_content_layout',$layout, $default ); 
    }
  }
}
/******************/
// Page Title
/******************/
if ( ! function_exists( 'bevro_page_title_post_meta' ) ){
function bevro_page_title_post_meta($page_post_meta_set){
if($page_post_meta_set!=='on'){?>
<h1 class='entry-title'><?php the_title();?></h1>
 <?php     }
    }
  }

/******************/
// Page Feature image
/******************/
if ( ! function_exists( 'bevro_page_feature_img_post_meta' ) ){
function bevro_page_feature_img_post_meta($page_post_meta_set){
if($page_post_meta_set!=='on'){
      if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){
        the_post_thumbnail('post-thumbnails'); 
      }
     }
    }
  }