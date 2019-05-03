<?php 
/**
 * Custom Style for Bevro Theme.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
function bevro_custom_style(){
$bevro_style="";   
$bevro_style.= bevro_responsive_slider_funct( 'bevro_logo_width', 'bevro_logo_width_responsive');
//end logo width 
/**************************/
//gloabal color
/**************************/
$bevro_theme_clr     = get_theme_mod('bevro_theme_clr','#ea4c89');
$bevro_link_clr      = get_theme_mod('bevro_link_clr','');
$bevro_link_hvr_clr  = get_theme_mod('bevro_link_hvr_clr','');
$bevro_text_clr      = get_theme_mod('bevro_text_clr','');
$bevro_title_clr     = get_theme_mod('bevro_title_clr','');
$bevro_loader_bg_clr = get_theme_mod('bevro_loader_bg_clr','#f5f5f5');
$bevro_style .= "a:hover,.inifiniteLoader,mark,.single .nav-previous:hover:before,.single .nav-next:hover:after,.page-numbers.current, .page-numbers:hover, .prev.page-numbers:hover, .next.page-numbers:hover,.bevro-load-more #load-more-posts:hover,article h2.entry-title a:hover,.bevro-menu li a:hover,.main-header .bevro-menu > li > a:hover,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.bevro-menu li.menu-active > a,.main-header .main-header-bar a:hover,.bevro-menu .content-social .social-icon li a:hover,.mhdrleftpan .content-social .social-icon a:hover, .mhdrrightpan .content-social .social-icon a:hover{color:{$bevro_theme_clr}}
  .page-numbers.current, .page-numbers:hover, .prev.page-numbers:hover, .next.page-numbers:hover,.bevro-load-more #load-more-posts:hover{border-color:{$bevro_theme_clr}} #respond.comment-respond #submit,.read-more .brv-button, button,[type='submit'],.woocommerce #respond input#submit, 
.woocommerce a.button,
.woocommerce button.button, 
.woocommerce input.button,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.bevro-cart p.buttons a,.wc-proceed-to-checkout .button.alt.wc-forward,.main-header .main-header-bar a.main-header-btn{border-color:{$bevro_theme_clr};background-color:{$bevro_theme_clr}} #move-to-top,.brv-date-meta .posted-on,.mhdrleftpan .header-pan-icon span,.mhdrrightpan .header-pan-icon span{background:{$bevro_theme_clr}}.inifiniteLoader{color:{$bevro_theme_clr}}
  .bevro_overlayloader{background:{$bevro_loader_bg_clr}} .woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle{background:{$bevro_theme_clr}}
.cart-contents .cart-crl{background:{$bevro_theme_clr}}.cart-crl:before{border-color:{$bevro_theme_clr}}
.woocommerce #respond input#submit.alt.disabled, 
.woocommerce #respond input#submit.alt.disabled:hover, 
.woocommerce #respond input#submit.alt:disabled, 
.woocommerce #respond input#submit.alt:disabled:hover, 
.woocommerce #respond input#submit.alt:disabled[disabled], 
.woocommerce #respond input#submit.alt:disabled[disabled]:hover, 
.woocommerce a.button.alt.disabled, 
.woocommerce a.button.alt.disabled:hover, 
.woocommerce a.button.alt:disabled, 
.woocommerce a.button.alt:disabled:hover,
 .woocommerce a.button.alt:disabled[disabled], 
 .woocommerce a.button.alt:disabled[disabled]:hover, 
 .woocommerce button.button.alt.disabled, 
 .woocommerce button.button.alt.disabled:hover, 
 .woocommerce button.button.alt:disabled, 
 .woocommerce button.button.alt:disabled:hover,
  .woocommerce button.button.alt:disabled[disabled], 
  .woocommerce button.button.alt:disabled[disabled]:hover, 
  .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, 
  .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, 
.woocommerce input.button.alt:disabled[disabled], 
.woocommerce input.button.alt:disabled[disabled]:hover,.page-numbers,.next.page-numbers, .prev.page-numbers,.woocommerce nav.woocommerce-pagination ul li a{border-color: {$bevro_theme_clr};
    background-color: {$bevro_theme_clr};}";
//link-color
$bevro_style .= "a,.single .nav-previous:before,.single .nav-next:after,.bevro-menu li a,.main-header .bevro-menu > li > a{color:{$bevro_link_clr}}";
//link-hover-color
  $bevro_style .= "a:hover,.single .nav-previous:hover:before,.single .nav-next:hover:after,article h2.entry-title a:hover,.bevro-menu li a:hover,.main-header .bevro-menu > li > a:hover,.bevro-menu li.menu-active > a,.main-header .main-header-bar a:hover,.bevro-menu .content-social .social-icon li a:hover,.mhdrleftpan .content-social .social-icon a:hover, .mhdrrightpan .content-social .social-icon a:hover{color:{$bevro_link_hvr_clr}}";
//body-text-color
  $bevro_style .= "body,.bevro-site #content .entry-meta{color:{$bevro_text_clr}}";
//title-color
  $bevro_style .= "article h2.entry-title a,#sidebar-primary h2.widget-title,.woocommerce h1.product_title, .woocommerce-Tabs-panel h2, .related.products h2, section.up-sells h2, .cross-sells h2, .cart_totals h2, .woocommerce-billing-fields h3, .woocommerce-account .addresses .title h3,h1.page-title, h1.entry-title{color:{$bevro_title_clr}}";
/*************************************/
//Hamburger COLOR
/*************************************/
$bevro_hamburger_bg_clr         = get_theme_mod('bevro_hamburger_bg_clr','');
$bevro_hamburger_brdr_clr       = get_theme_mod('bevro_hamburger_brdr_clr','');
$bevro_hamburger_icon_clr       = get_theme_mod('bevro_hamburger_icon_clr','');
$bevro_hamburger_border_radius  = get_theme_mod('bevro_hamburger_border_radius','');
$bevro_style.=".menu-toggle .menu-btn,.bar-menu-toggle .menu-btn{background:{$bevro_hamburger_bg_clr};border-color:{$bevro_hamburger_brdr_clr}}.menu-toggle .icon-bar,.bar-menu-toggle .icon-bar{background:{$bevro_hamburger_icon_clr}} .menu-toggle .menu-btn,.bar-menu-toggle .menu-btn{border-radius:{$bevro_hamburger_border_radius}px;}.menu-icon-inner{color:{$bevro_hamburger_icon_clr}}";
//**********************/
// Site Button Style 
//**********************/   
$bevro_button_txt_clr       = get_theme_mod('bevro_button_txt_clr','');
$bevro_button_txt_hvr_clr   = get_theme_mod('bevro_button_txt_hvr_clr','');
$bevro_button_bg_clr        = get_theme_mod('bevro_button_bg_clr','');
$bevro_button_bg_hvr_clr    = get_theme_mod('bevro_button_bg_hvr_clr','');
$bevro_button_border_radius    = get_theme_mod('bevro_button_border_radius');
$bevro_style .=".menu-custom-html > a button,.read-more .brv-button,#respond.comment-respond #submit,button,[type='submit'],.woocommerce #respond input#submit, 
.woocommerce a.button,
.woocommerce button.button, 
.woocommerce input.button,.woocommerce #respond input#submit.alt,
 .woocommerce a.button.alt,
 .woocommerce button.button.alt,
  .woocommerce input.button.alt,.bevro-cart p.buttons a,.wc-proceed-to-checkout .button.alt.wc-forward,.main-header .main-header-bar a.main-header-btn{background:{$bevro_button_bg_clr};
color:{$bevro_button_txt_clr};border-color:{$bevro_button_bg_clr};} 
.menu-custom-html > a button,.read-more .brv-button,#respond.comment-respond #submit,button,[type='submit'],.woocommerce #respond input#submit, 
.woocommerce a.button,
.woocommerce button.button, 
.woocommerce input.button,.woocommerce #respond input#submit.alt,
 .woocommerce a.button.alt,
 .woocommerce button.button.alt,
  .woocommerce input.button.alt,.main-header .main-header-bar a.main-header-btn{border-radius:{$bevro_button_border_radius}px;}
.menu-custom-html > a button:hover,.read-more .brv-button:hover,#respond.comment-respond #submit:hover,button:hover,[type='submit']:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover,.woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover,
 .woocommerce a.button.alt:hover,
 .woocommerce button.button.alt:hover,
  .woocommerce input.button.alt:hover,.bevro-cart p.buttons a:hover,.main-header .main-header-bar .main-header .main-header-bar a.main-header-btn:hover,.main-header .main-header-bar a.main-header-btn:hover{background:{$bevro_button_bg_hvr_clr};
color:{$bevro_button_txt_hvr_clr}; border-color:{$bevro_button_bg_hvr_clr}}
.woocommerce #respond input#submit.alt.disabled, 
.woocommerce #respond input#submit.alt.disabled:hover, 
.woocommerce #respond input#submit.alt:disabled, 
.woocommerce #respond input#submit.alt:disabled:hover, 
.woocommerce #respond input#submit.alt:disabled[disabled], 
.woocommerce #respond input#submit.alt:disabled[disabled]:hover, 
.woocommerce a.button.alt.disabled, 
.woocommerce a.button.alt.disabled:hover, 
.woocommerce a.button.alt:disabled, 
.woocommerce a.button.alt:disabled:hover,
 .woocommerce a.button.alt:disabled[disabled], 
 .woocommerce a.button.alt:disabled[disabled]:hover, 
 .woocommerce button.button.alt.disabled, 
 .woocommerce button.button.alt.disabled:hover, 
 .woocommerce button.button.alt:disabled, 
 .woocommerce button.button.alt:disabled:hover,
  .woocommerce button.button.alt:disabled[disabled], 
  .woocommerce button.button.alt:disabled[disabled]:hover, 
  .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, 
  .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, 
.woocommerce input.button.alt:disabled[disabled], 
.woocommerce input.button.alt:disabled[disabled]:hover{border-color: {$bevro_button_bg_clr};
    background-color: {$bevro_button_bg_clr};}";
/********************/
// Header transparent 
/*********************/
$bevro_style .=".mhdrleft.brv-transparent-header .top-header-bar,.mhdrleft.brv-transparent-header .main-header-bar,.mhdrleft.brv-transparent-header .bottom-header-bar,.bevro-site .mhdrleft.brv-transparent-header .main-header-bar:before{
background:transparent;
}
.mhdrright.brv-transparent-header .top-header-bar,.mhdrright.brv-transparent-header .main-header-bar,.mhdrright.brv-transparent-header .bottom-header-bar,.bevro-site .mhdrright.brv-transparent-header .main-header-bar:before{
background:transparent;
}
.mhdrcenter.brv-transparent-header .top-header-bar,.mhdrcenter.brv-transparent-header .main-header-bar,.mhdrcenter.brv-transparent-header .bottom-header-bar,.bevro-site .mhdrcenter.brv-transparent-header .main-header-bar:before{
background:transparent;
}
.mhdfull.brv-transparent-header, .mhdfull.brv-transparent-header .top-header-bar,
.mhdfull.brv-transparent-header .main-header-bar,
.mhdfull.brv-transparent-header .bottom-header-bar,.mhdfull.brv-transparent-header .top-header-bar:before,
.mhdfull.brv-transparent-header .main-header-bar:before,
.mhdfull.brv-transparent-header .bottom-header-bar:before{
  background:transparent;
}

";
  //header border
    $bevro_theme_clr    = get_theme_mod('bevro_theme_clr','#ea4c89');
    $bevro_main_hdr_botm_brd = get_theme_mod('bevro_main_hdr_botm_brd','1');
    $bevro_main_brdr_clr = get_theme_mod('bevro_main_brdr_clr','#eee');
    $bevro_style .= ".main-header-bar{border-bottom-width:{$bevro_main_hdr_botm_brd}px;}.main-header-bar{border-bottom-color:{$bevro_main_brdr_clr}}";
	//container
	  $bevro_conatiner_width  = get_theme_mod('bevro_conatiner_width');
    $bevro_style.="header .container,#container.site-
    container,footer .container,#content #container,#content.site-content.boxed #container,
#content.site-content.contentbox #container,
#content.site-content.fullwidthcontained #container{max-width:{$bevro_conatiner_width}px;}";
    //header fullwidth
    $bevro_main_header_width_full = get_theme_mod('bevro_main_header_width_full',false);
    if($bevro_main_header_width_full){
       $bevro_style.="header .container{max-width:100%}"; 
    } 
    /**************************/
    // Above Header
    /**************************/
    $bevro_abv_hdr_hgt = get_theme_mod('bevro_abv_hdr_hgt','40');
    $bevro_abv_hdr_botm_brd = get_theme_mod('bevro_abv_hdr_botm_brd','1');
    $bevro_above_brdr_clr = get_theme_mod('bevro_above_brdr_clr','#eee');
    $bevro_style.=".top-header-container{line-height:{$bevro_abv_hdr_hgt}px;}.top-header-bar{border-bottom-width:{$bevro_abv_hdr_botm_brd}px;}.top-header-bar{border-bottom-color:{$bevro_above_brdr_clr}}";
    /**************************/
    // Bottom Header
    /**************************/
    $bevro_bottom_hdr_hgt = get_theme_mod('bevro_bottom_hdr_hgt','40');
    $bevro_bottom_hdr_botm_brd = get_theme_mod('bevro_bottom_hdr_botm_brd','1');
    $bevro_bottom_brdr_clr = get_theme_mod('bevro_bottom_brdr_clr','#eee');
    $bevro_style.=".bottom-header-container{line-height:{$bevro_bottom_hdr_hgt}px;}
   .bottom-header-bar{border-bottom-width:{$bevro_bottom_hdr_botm_brd}px;}.bottom-header-bar{border-bottom-color:{$bevro_bottom_brdr_clr}}";
    // top footer height
    $bevro_abve_ftr_hgt = get_theme_mod('bevro_abve_ftr_hgt','40');
    $bevro_abv_ftr_botm_brd = get_theme_mod('bevro_abv_ftr_botm_brd','1');
    $bevro_above_frt_brdr_clr = get_theme_mod('bevro_above_frt_brdr_clr','#eee');
    $bevro_style.=".top-footer-container{line-height:{$bevro_abve_ftr_hgt}px;}
   .top-footer-bar{border-bottom-width:{$bevro_abv_ftr_botm_brd}px;}.top-footer-bar{border-bottom-color:{$bevro_above_frt_brdr_clr}}";
    // top footer height
    $bevro_btm_ftr_hgt = get_theme_mod('bevro_btm_ftr_hgt','100');
    $bevro_btm_ftr_botm_brd = get_theme_mod('bevro_btm_ftr_botm_brd','1');
    $bevro_bottom_frt_brdr_clr = get_theme_mod('bevro_bottom_frt_brdr_clr','#eee');
    $bevro_style.=".bottom-footer-container{line-height:{$bevro_btm_ftr_hgt}px;}
   .bottom-footer-bar{border-top-width:{$bevro_btm_ftr_botm_brd}px;}.bottom-footer-bar{border-top-color:{$bevro_bottom_frt_brdr_clr}}";
/****************/
// sidebar width
/****************/
    $bevro_sidebar_width = get_theme_mod('bevro_sidebar_width','35');
    $bevro_primary_width = absint( 100 - $bevro_sidebar_width);
    $bevro_style.=".site-content #sidebar-primary{width:{$bevro_sidebar_width}%}";
    $bevro_style.=".site-content #primary{width:{$bevro_primary_width}%}";
    /************************/
    //blog archive/setting
    /************************/
    $bevro_blog_content_width = get_theme_mod('bevro_blog_content_width','defualt');
    if($bevro_blog_content_width=='custom'){
    $bevro_blog_cnt_widht = get_theme_mod('bevro_blog_cnt_widht','1200');
    $bevro_style.=".blog #content #container.site-container,.archive #content #container.site-container{max-width:{$bevro_blog_cnt_widht}px;}";   
    }
    /************************/
   // blog drop cap
   /************************/
 $bevro_blog_dropcap = get_theme_mod('bevro_blog_dropcap');
 if($bevro_blog_dropcap){
  $bevro_style .=".blog article .entry-content p:first-child:first-letter{
                color: {$bevro_theme_clr};
                float: left;
                font-family: Georgia;
                font-size: 75px;
                line-height: 60px;
                padding-top: 4px;
                padding-right: 15px;
                padding-left: 0px;
                text-shadow: 3px 3px 0 rgba(56, 60, 80, 0.12);
              }";
  $bevro_body_font = get_theme_mod('bevro_body_font');
if(!empty($bevro_body_font)){
bevro_enqueue_google_font($bevro_body_font);
$bevro_style .=".blog article .entry-content p:first-child:first-letter{
  font-family: {$bevro_body_font};
}";
}           
  }
  // single post drop cap
 $bevro_single_drop_cap = get_theme_mod('bevro_single_drop_cap');
 if($bevro_single_drop_cap){
  $bevro_style .=".single-post article .entry-content p:first-child:first-letter{
                color:{$bevro_theme_clr};
                float: left;
                font-family: Georgia;
                font-size: 75px;
                line-height: 60px;
                padding-top: 4px;
                padding-right: 15px;
                padding-left: 0px;
                text-shadow: 3px 3px 0 rgba(56, 60, 80, 0.12);
              }";
$bevro_body_font = get_theme_mod('bevro_body_font');
if(!empty($bevro_body_font)){
bevro_enqueue_google_font($bevro_body_font);
$bevro_style .=".single-post article .entry-content p:first-child:first-letter{
  font-family: {$bevro_body_font};
}";
}
  }

if(get_theme_mod('bevro_single_post_content_width')=='custom'):
    $bevro_sngle_cnt_widht = get_theme_mod('bevro_sngle_cnt_widht','1200');
    $bevro_style .="#content.site-content.blog-single.boxed #container,
    .boxed #content.site-content.blog-single #container, #content.site-content.blog-single.contentbox #container,
    .contentbox #content.site-content.blog-single #container, #content.site-content.blog-single.fullwidthcontained #container,
    .fullwidthcontained #content.site-content.blog-single #container{max-width:{$bevro_sngle_cnt_widht}px;}";
endif;
/******************************************/    
// Woocommerce single product content width
/******************************************/
if((class_exists( 'WooCommerce' )) && (get_theme_mod('bevro_single_product_content_width')=='custom')):
    $bevro_product_cnt_widht = get_theme_mod('bevro_product_cnt_widht','1200');
    $bevro_style .=".single-product.woocommerce #content.site-content.product #container{max-width:{$bevro_product_cnt_widht}px;}";
endif;
/************************/    
// scroll to top button
/************************/  
$bevro_scroll_to_top_option = get_theme_mod('bevro_scroll_to_top_option','right');
$bevro_scroll_to_top_icon_radius = get_theme_mod('bevro_scroll_to_top_icon_radius','2');
$bevro_scroll_to_top_icon_clr = get_theme_mod('bevro_scroll_to_top_icon_clr','#fff');
$bevro_scroll_to_top_icon_bg_clr = get_theme_mod('bevro_scroll_to_top_icon_bg_clr','#ea4c89');
$bevro_scroll_to_top_icon_hvr_clr = get_theme_mod('bevro_scroll_to_top_icon_hvr_clr','#fff');
$bevro_scroll_to_top_icon_bghvr_clr = get_theme_mod('bevro_scroll_to_top_icon_bghvr_clr','#ea4c89');
if($bevro_scroll_to_top_option=='left'){
   $bevro_style.="#move-to-top{left:30px; right:auto;}";  
}
$bevro_style.="#move-to-top{ border-radius:{$bevro_scroll_to_top_icon_radius}px;-moz-border-radius:{$bevro_scroll_to_top_icon_radius}px;-webkit-border-radius:{$bevro_scroll_to_top_icon_radius}px; color:{$bevro_scroll_to_top_icon_clr}; background:{$bevro_scroll_to_top_icon_bg_clr}} #move-to-top:hover{color:{$bevro_scroll_to_top_icon_hvr_clr}; background:{$bevro_scroll_to_top_icon_bghvr_clr};}"; 
/********************/
// Search-Button
/********************/
$bevro_search_icon_font_size = get_theme_mod('bevro_search_icon_font_size','15');
$bevro_search_icon_radius    = get_theme_mod('bevro_search_icon_radius','');
$bevro_search_icon_clr       = get_theme_mod('bevro_search_icon_clr','');
$bevro_search_icon_brd_clr   = get_theme_mod('bevro_search_icon_brd_clr','');
$bevro_search_icon_bg_clr    = get_theme_mod('bevro_search_icon_bg_clr','');
$bevro_search_icon_hvr_clr    = get_theme_mod('bevro_search_icon_hvr_clr','');
$bevro_style.=".searchfrom .search-btn{font-size:{$bevro_search_icon_font_size}px; border-radius:{$bevro_search_icon_radius}px;} .top-header-bar .searchfrom .search-btn,.main-header-bar .searchfrom .search-btn,.bottom-header-bar .searchfrom .search-btn ,.bevro-menu .menu-custom-search .searchfrom a{color:{$bevro_search_icon_clr}; background:{$bevro_search_icon_bg_clr}; border-color:{$bevro_search_icon_brd_clr}}
.top-header-bar .searchfrom .search-btn:hover,.main-header-bar .searchfrom .search-btn:hover,.bottom-header-bar .searchfrom .search-btn:hover{color:{$bevro_search_icon_hvr_clr}}
";
/********************/
// Search-box
/********************/
$bevro_search_box_icon_width  = get_theme_mod('bevro_search_box_icon_width','100');
$bevro_search_box_icon_height = get_theme_mod('bevro_search_box_icon_height','');
$bevro_search_box_radius      = get_theme_mod('bevro_search_box_radius','0');
$bevro_search_box_icon_size   = get_theme_mod('bevro_search_box_icon_size','');
$bevro_social_box_bg_clr      = get_theme_mod('bevro_social_box_bg_clr','');
$bevro_social_box_icon_clr    = get_theme_mod('bevro_social_box_icon_clr','#ea4c89');
$bevro_social_box_brdr_clr         = get_theme_mod('bevro_social_box_brdr_clr','');
$bevro_social_box_plc_holdr_clr    = get_theme_mod('bevro_social_box_plc_holdr_clr','#bbb');
$bevro_search_box_plc_txt_size     = get_theme_mod('bevro_search_box_plc_txt_size');
$bevro_style.=".widget-area #searchform .form-content,.searchfrom #searchform .form-content{width:{$bevro_search_box_icon_width}%;} .widget-area #searchform .form-content:before,.searchfrom #searchform .form-content:before{color:{$bevro_social_box_icon_clr}; font-size:{$bevro_search_box_icon_size}px;} .widget-area input#s,.searchfrom #searchform input#s{background-color:{$bevro_social_box_bg_clr}; border-color:{$bevro_social_box_brdr_clr};} .widget-area #searchform input[type=submit],.widget-area input#s,.widget-area #searchform .form-content:before,.searchfrom #searchform .form-content:before,.searchfrom input#s,.searchfrom #searchform input[type=submit]{height:{$bevro_search_box_icon_height}px; line-height:{$bevro_search_box_icon_height}px; border-radius:{$bevro_search_box_radius}px;} .form-content input#s::-webkit-input-placeholder, .form-content input#s{color:{$bevro_social_box_plc_holdr_clr}; font-size:{$bevro_search_box_plc_txt_size}px;}";
/*****************/
//footer widget
/*****************/
$bevro_footer_widget_content_width  = get_theme_mod('bevro_footer_widget_content_width','content-width');
if($bevro_footer_widget_content_width=='full-width'):
$bevro_style.=".footer-wrap .widget-footer-bar .container{max-width:100%;}";
endif;
/************************************************************************/
/****************************Only Lite Feafure**************************/
/************************************************************************/
if((bevro_pro_activation_class())==''){
/********************************/
//Above Header Color Scheme
/********************************/
$bevro_above_color_scheme  = get_theme_mod('bevro_above_color_scheme');
if($bevro_above_color_scheme =='abv-dark'):
$bevro_style.=".top-header .top-header-bar{background:#333} 
.top-header .content-html,.top-header .bevro-menu > li > a,.top-header .content-widget,.top-header .top-header-bar .widget-title, .top-header .top-header-bar a{color:#fff}"; 
$bevro_style.=".top-header .top-header-bar a:hover{color:{$bevro_theme_clr}} .top-header .top-header-bar a:hover{color:{$bevro_link_hvr_clr}} .top-header .top-header-bar .bevro-menu li ul.sub-menu li a{color:#9c9c9c;}";
$bevro_style.="@media screen and (max-width: 1024px){
.top-header .top-header-bar .sider.left,.top-header .top-header-bar .sider.right,.top-header .top-header-bar .sider.overcenter,.top-header .top-header-bar .right .menu-close,.top-header .top-header-bar .left .menu-close{background:#333}
}";
endif;
if($bevro_above_color_scheme =='abv-default'):
$bevro_style.=".top-header .top-header-bar a{color:#9c9c9c} .top-header .top-header-bar a:hover{color:{$bevro_theme_clr}} .top-header .top-header-bar a:hover{color:{$bevro_link_hvr_clr}}";
endif;
/********************************/
//Main Header Color Scheme
/********************************/
$header_url = get_theme_mod('header_image','');
$bevro_main_color_scheme  = get_theme_mod('bevro_main_color_scheme');
if($bevro_main_color_scheme =='main-dark'):
$bevro_style.=".main-header .main-header-bar,.mhdrleftpan header,.mhdrrightpan header{background-color:#333; background-image:url('$header_url');} .main-header-bar p,.main-header .bevro-menu > li > a, .main-header .menu-custom-html, .main-header .menu-custom-widget,.main-header .widget-title, header.mhdrleftpan p,header.mhdrrightpan p,header.mhdrleftpan .widget-title,header.mhdrrightpan .widget-title,header.mhdrrightpan .content-html,header.mhdrleftpan .content-html,.mhdrrightpan .bevro-menu a,.mhdrleftpan .bevro-menu a,.mhdrleftpan .content-widget,.mhdrrightpan .content-widget,.main-header .main-header-bar a,.bevro-menu .content-social .social-icon li a,.mhdrleftpan .content-social .social-icon a, .mhdrrightpan .content-social .social-icon a,.cart-pan-active header.mhdrleftpan .bevro-cart,.cart-pan-active header.mhdrrightpan .bevro-cart,.bevro-cart,header.mhdminbarleft p,header.mhdminbarright p,.mhdminbarleft .bevro-menu a,.mhdminbarright .bevro-menu a,.mhdminbarleft .pan-content .content-widget,.mhdminbarright .pan-content .content-widget,.mhdminbarleft .pan-content .content-html,.mhdminbarright .pan-content .content-html,.bevro-cart ul.cart_list li a,.bevro-cart ul.cart_list li span,.cart-close .cart-close-btn,.main-header.mhdfull .menu-close-btn{color:#fff} .bevro-site .main-header-bar:before,header.mhdrrightpan:before,header.mhdrleftpan:before{background:#333;opacity:0.7} .main-header .main-header-bar .bevro-menu li ul.sub-menu li a{color:#9c9c9c;}.cart-pan-active header.mhdrleftpan .bevro-cart,.cart-pan-active header.mhdrrightpan .bevro-cart,.cart-close .cart-close-btn,.bevro-cart,.min-bar-header, .mhdminbarleft .pan-content,.mhdminbarleft .top-header-bar,.mhdminbarleft .bottom-header-bar,.min-bar-header.rightminbar, .mhdminbarright .pan-content,.mhdminbarright .top-header-bar,.mhdminbarright .bottom-header-bar,header.mhdminbarleft .bevro-cart,header.mhdminbarright .bevro-cart{background:#333;}.bevro-cart p.buttons a.checkout{
background:transparent;
border-color:#fff;
color:#fff;
}.mobile-menu-active .mhdfull .sider.left,.mhdfull .sider.left,.mhdfull .left .menu-close,.mobile-menu-active .mhdfull .sider.right,.mhdfull .sider.right,.mhdfull .right .menu-close,.mhdfull.mobile-menu-active .sider.overcenter,.main-header.mhdfull .sider.left,.main-header.mhdfull .sider.right,.main-header.mhdfull .left .menu-close,.main-header.mhdfull .right .menu-close{background-color: #333;}header.mhdminbarleft,header.mhdminbarright{border-color:#555}"; 
$bevro_style.="@media screen and (max-width: 1024px){
.main-header .sider.left,.main-header .sider.right,.main-header .left .menu-close,.main-header .right .menu-close,.mobile-menu-active .sider.overcenter {background-color: #333;} .main-header .menu-close-btn{color: #bbb;} .main-header .bevro-menu li a{color:#fff}}";
else:
$bevro_style.=".main-header .main-header-bar,.mhdrleftpan header,.mhdrrightpan header{background-color:#fff; background-image:url('$header_url');} .bevro-site .main-header-bar:before,header.mhdrrightpan:before,header.mhdrleftpan:before{background:#fff;opacity:0.7}
.main-header-bar p,.main-header .bevro-menu > li > a, .main-header .menu-custom-html, .main-header .menu-custom-widget,.main-header .widget-title, header.mhdrleftpan p,header.mhdrrightpan p,header.mhdrleftpan .widget-title,header.mhdrrightpan .widget-title,header.mhdrrightpan .content-html,header.mhdrleftpan .content-html,.mhdrrightpan .bevro-menu a,.mhdrleftpan .bevro-menu a,.mhdrleftpan .content-widget,.mhdrrightpan .content-widget,header.mhdrleftpan .top-header .top-header-bar .widget-title,header.mhdrrightpan .top-header .top-header-bar .widget-title,.mhdrrightpan .bevro-menu li a, .mhdrleftpan .bevro-menu li a,.mhdrrightpan .bottom-header .bevro-menu > li > a,.mhdrleftpan .bottom-header .bevro-menu > li > a{color:#555} .main-header .main-header-bar a,.mhdrleftpan .content-social .social-icon a, .mhdrrightpan .content-social .social-icon a,.bevro-menu .content-social .social-icon li a{color:#9c9c9c}
  .main-header .main-header-bar a:hover{color:{$bevro_link_hvr_clr}}.bevro-cart p.buttons a.checkout{
background:transparent;
border-color:#9c9c9c;
color:#9c9c9c;
}
header.mhdminbarleft p,header.mhdminbarright p,header.mhdminbarleft .widget-title,header.mhdminbarright .widget-title,header.mhdminbarleft .content-html,header.mhdminbarright .content-html,.mhdminbarleft .bevro-menu a,.mhdminbarright .bevro-menu a,.mhdminbarleft .content-widget,.mhdminbarright .content-widget,header.mhdminbarleft .top-header .top-header-bar .widget-title,header.mhdminbarright .top-header .top-header-bar .widget-title,.mhdminbarleft .bevro-menu li a, .mhdminbarright .bevro-menu li a,.mhdminbarleft .bottom-header .bevro-menu > li > a,.mhdminbarright .bottom-header .bevro-menu > li > a{color:#555}";
endif;
/********************************/
//Bottom Header Color Scheme
/********************************/
$bevro_bottom_color_scheme  = get_theme_mod('bevro_bottom_color_scheme');
if($bevro_bottom_color_scheme =='btm-dark'):
$bevro_style.=".bottom-header .bottom-header-bar{background:#333} .bottom-header .content-html,.bottom-header .bevro-menu > li > a,.bottom-header .content-widget,.bottom-header .bottom-header-bar .widget-title,.bottom-header .bottom-header-bar a{color:#fff} .bottom-header .bottom-header-bar .bevro-menu li ul.sub-menu li a{color:#9c9c9c}"; 
$bevro_style.=".bottom-header .bottom-header-bar a:hover{color:{$bevro_theme_clr}} .bottom-header .bottom-header-bar a:hover{color:{$bevro_link_hvr_clr}}";
$bevro_style.="@media screen and (max-width: 1024px){
.bottom-header .bottom-header-bar .sider.left,.bottom-header .bottom-header-bar .sider.right,.bottom-header .bottom-header-bar .sider.overcenter,.bottom-header .bottom-header-bar .right .menu-close,.bottom-header .bottom-header-bar .left .menu-close{background:#333}
}";
endif;
if($bevro_bottom_color_scheme =='btm-default'):
$bevro_style.=".bottom-header .bottom-header-bar a{color:#9c9c9c} .bottom-header .bottom-header-bar a:hover{color:{$bevro_theme_clr}} .bottom-header .bottom-header-bar a:hover{color:{$bevro_link_hvr_clr}}";
endif;
/********************************/
//Above Footer Color Scheme
/********************************/
$bevro_above_footer_color_scheme  = get_theme_mod('bevro_above_footer_color_scheme');
if($bevro_above_footer_color_scheme =='abv-dark'):
$bevro_style.=".top-footer .top-footer-bar{background:#333} .top-footer .content-html,.top-footer .bevro-menu > li > a,.top-footer .content-widget,.top-footer .top-footer-bar .widget-title,.bevro-bottom-menu li a,.top-footer .top-footer-bar a{color:#fff}"; 
$bevro_style.=".top-footer .top-footer-bar a:hover{color:{$bevro_theme_clr}} .top-footer .top-footer-bar a:hover{color:{$bevro_link_hvr_clr}}";
endif;
if($bevro_above_footer_color_scheme =='abv-default'):
$bevro_style.=".top-footer .top-footer-bar a{color:#9c9c9c} .top-footer .top-footer-bar a:hover{color:{$bevro_theme_clr}} .top-footer .top-footer-bar a:hover{color:{$bevro_link_hvr_clr}}";
endif;
/********************************/
//Widget Footer Color Scheme
/********************************/
$bevro_bottom_footer_widget_color_scheme  = get_theme_mod('bevro_bottom_footer_widget_color_scheme');
if($bevro_bottom_footer_widget_color_scheme =='ft-wgt-dark'):
$bevro_style.=".widget-footer .widget-footer-bar{background:#333} .widget-footer .widget-footer-bar .widget-title,.widget-footer .widget-footer-bar ,.widget-footer .widget-footer-bar a{color:#fff}"; 
$bevro_style.=".widget-footer .widget-footer-bar a:hover{color:{$bevro_theme_clr}} .widget-footer .widget-footer-bar a:hover{color:{$bevro_link_hvr_clr}}";
endif;
if($bevro_bottom_footer_widget_color_scheme =='ft-wgt-default'):
$bevro_style.=".widget-footer .widget-footer-bar a{color:#9c9c9c} .widget-footer .widget-footer-bar a:hover{color:{$bevro_theme_clr}} .widget-footer .widget-footer-bar a:hover{color:{$bevro_link_hvr_clr}}";
endif;
/********************************/
//Footer Bottom Color Scheme
/********************************/
$bevro_bottom_footer_color_scheme  = get_theme_mod('bevro_bottom_footer_color_scheme');
if($bevro_bottom_footer_color_scheme =='ft-btm-dark'):
$bevro_style.=".bottom-footer .bottom-footer-bar{background:#333} .bottom-footer .content-html,.bottom-footer .bevro-menu > li > a,.bottom-footer .content-widget,.bottom-footer .bottom-footer-bar .widget-title,.bevro-bottom-menu li a,.bottom-footer .bottom-footer-bar a{color:#fff}"; 
$bevro_style.=".bottom-footer .bottom-footer-bar a:hover{color:{$bevro_theme_clr}} .bottom-footer .bottom-footer-bar a:hover{color:{$bevro_link_hvr_clr}}";
endif; 
if($bevro_bottom_footer_color_scheme =='ft-btm-default'):
$bevro_style.=".bottom-footer .bottom-footer-bar a{color:#9c9c9c} .bottom-footer .bottom-footer-bar a:hover{color:{$bevro_theme_clr}} .bottom-footer .bottom-footer-bar a:hover{color:{$bevro_link_hvr_clr}}";
endif;

}
/*************************************/
//Woocommerce Add to Cart Color Scheme
/*************************************/
if((bevro_pro_activation_class())==''){
$bevro_woo_cart_color_scheme  = get_theme_mod('bevro_woo_cart_color_scheme');
if($bevro_woo_cart_color_scheme =='woo-cart-dark'){
$bevro_style.=".bevro-cart{background:#333;color:#fff;}
.bevro-cart ul.cart_list li a,.bevro-cart p.total, .widget p.total{
color:#fff;
}";
}else{
$bevro_style.=".bevro-cart,.bevro-cart ul.cart_list li span,.bevro-cart p{background:#ffff;color:#808285;}
.bevro-cart ul.cart_list li a{
color:#9c9c9c;
}.bevro-cart p.buttons a.checkout {
    background: transparent;
    border-color: #9c9c9c;
    color: #9c9c9c;
}";
}
} 
return $bevro_style;
}
//start logo width
function bevro_logo_width_responsive( $value, $dimension = 'desktop' ){
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
  $custom_css .= '.bevro-logo img{
    max-width: ' . $v3 . 'px;
  }';
  $custom_css = bevro_add_media_query( $dimension, $custom_css );
  return $custom_css;
}