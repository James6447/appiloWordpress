<?php 
/**
 * Common Function for Bevro Theme.
 *
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/***************************/
// LEFTMINBAR HEADERLAYOUT
/***************************/
if ( ! function_exists( 'bevro_minbar_header_markup' ) ){
function bevro_minbar_header_markup(){ 
$bevro_main_header_layout = get_theme_mod('bevro_main_header_layout'); 
if($bevro_main_header_layout=='mhdminbarleft'){
$barlayout='leftminbar';
}else{
$barlayout='rightminbar';    
} 
$bevro_main_header_menu_disable = get_theme_mod( 'bevro_main_header_menu_disable',false);?>
<div class="min-bar-header <?php echo esc_attr($barlayout);?>">
    <div class="min-bar-header-content">
                <div class="container">
                    <div class="min-bar-container">
        <div class="min-bar-col1">
            <div class="bar-menu-toggle">
            <button type="button" class="menu-btn" id="bar-menu-btn">
            <span class="menu-icon-inner"></span>
            </button>
            </div>
            <?php 
    if(class_exists( 'WooCommerce' )){
    if(get_theme_mod('bevro_woo_cart_visibility')=='display-all'){?>
    <div class="bevro_woo_cart">
    <?php do_action( 'bevro_cart_count' ); 
       do_action( 'bevro_cart' );?>
    </div>
   <?php  }
    if(get_theme_mod('bevro_woo_cart_visibility')=='disable-mobile'){
       if (!wp_is_mobile()):?>
        <div class="bevro_woo_cart">
       <?php do_action( 'bevro_cart_count' ); 
       do_action( 'bevro_cart' );?>
        </div>
       <?php endif;
     }
    }
    ?>
    </div>
             <div class="min-bar-col2">
                <?php bevro_logo();?>
             </div>
                    </div>
                </div>
     </div>
</div>
<?php } }
/**
 * Function to get mian Header
 */
if ( ! function_exists( 'bevro_main_header_markup' ) ){
function bevro_main_header_markup(){ ?>
<?php 
$bevro_main_header_layout = get_theme_mod( 'bevro_main_header_layout','mhdrleft');
$bevro_main_header_menu_disable = get_theme_mod( 'bevro_main_header_menu_disable',false);
$bevro_mobile_menu_open = get_theme_mod( 'bevro_mobile_menu_open','left');
$bevro_main_header_mobile_txt = get_theme_mod( 'bevro_main_header_mobile_txt','');
$bevro_main_header_menu_align = get_theme_mod( 'bevro_main_header_menu_align','inline');
//menu style
if($bevro_main_header_layout=='mhdrleft' || $bevro_main_header_layout=='mhdrcenter' || $bevro_main_header_layout=='mhdrright'){
$bevropro_x_menu_alignment = get_theme_mod( 'bevropro_x_menu_alignment','right-menu');
$bevropro_x_menu_effect = get_theme_mod( 'bevropro_x_menu_effect','linkeffect-none');
}else{
  $bevropro_x_menu_alignment='';  
  $bevropro_x_menu_effect='';
}
?>	
<div class="main-header <?php echo esc_attr($bevro_main_header_layout);?> <?php echo esc_attr($bevro_main_header_menu_align);?> <?php echo esc_attr($bevropro_x_menu_alignment);?> <?php echo esc_attr($bevropro_x_menu_effect);?>">
	     	<div class="main-header-bar two">
	     		<div class="container">
	     			<div class="main-header-container">
           <?php if($bevro_main_header_layout!=='mhdrrightpan' && $bevro_main_header_layout!=='mhdrleftpan' && $bevro_main_header_layout!=='mhdminbarleft' && $bevro_main_header_layout!=='mhdminbarright'):?>
		                <div class="main-header-col1">
		                     <?php bevro_logo();?>
                        </div>
                    <?php endif; ?>
      <div class="main-header-col2">
   <?php if($bevro_main_header_menu_disable==false){?>
        <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
            <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <div class="text">
                 <?php if($bevro_main_header_mobile_txt!==''){ ?>
                <span><?php echo esc_html($bevro_main_header_mobile_txt);?></span>
                 <?php } ?>
            </div>
           
            </button>
        </div>
        <div class="sider main bevro-menu-hide <?php echo esc_attr($bevro_mobile_menu_open);?>">
        <div class="sider-inner"><?php if( has_nav_menu('bevro-main-menu' )){ bevro_main_nav_menu();
        }else{
            wp_nav_menu(array( 
            'items_wrap'  => '<ul class="bevro-menu" data-menu-style="'.esc_attr(bevro_header_menu_style()).'">%3$s</ul>',
            'link_before' => '<span>',
            'link_after'  => '</span>'));
        }?>
        </div>
        </div>
        </nav>

    <?php } else { ?>

        <div class="sider-inner">
        <?php echo bevro_add_header_widthout_menu_custom_item();?>
        </div>

    <?php } ?>
    <?php 
    if($bevro_main_header_layout!=='mhdminbarleft' && $bevro_main_header_layout!=='mhdminbarright'){
    if(class_exists( 'WooCommerce' )){    
    if(get_theme_mod('bevro_woo_cart_visibility')=='display-all'){?>
    <div class="bevro_woo_cart">
    <?php do_action( 'bevro_cart_count' ); 
       do_action( 'bevro_cart' );?>
    </div>
   <?php  }
    if(get_theme_mod('bevro_woo_cart_visibility')=='disable-mobile'){
       if (!wp_is_mobile()):?>
        <div class="bevro_woo_cart">
       <?php do_action( 'bevro_cart_count' ); 
       do_action( 'bevro_cart' );?>
        </div>
       <?php endif;
     }
    }
    }
    ?>
        <!-- Responsive Menu Structure-->
    </div> <!-- col-2-->
		            </div>
		        </div>
		    </div>
		</div> 				
<?php	}
}
add_action( 'bevro_main_header', 'bevro_main_header_markup' );
/**************************************/
//logo & site title function
/**************************************/
if ( ! function_exists( 'bevro_logo' ) ){
function bevro_logo(){
$title_disable          = get_theme_mod( 'title_disable','enable');
$tagline_disable        = get_theme_mod( 'tagline_disable','enable');
$description            = get_bloginfo( 'description', 'display' );?>
<div class="bevro-logo">
<?php bevro_custom_logo();?>
</div>
<?php 
if($title_disable!='' || $tagline_disable!=''){
if($title_disable!=''){	
?>
<div class="site-title"><h1>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
</h1>
</div>
<?php
}
if($tagline_disable!=''){
if( $description || is_customize_preview() ):?>
<div class="site-description">
   <p><?php echo esc_html($description); ?></p>
</div>
<?php endif;
      }
    } 
  }
}
/**************************************/
//Top Header function
/**************************************/
if ( ! function_exists( 'bevro_top_header_markup' ) ){	
function bevro_top_header_markup(){ ?>
<?php 
$bevro_above_header_layout     = get_theme_mod( 'bevro_above_header_layout','abv-none');
$bevro_above_header_col1_set   = get_theme_mod( 'bevro_above_header_col1_set','text');
$bevro_above_header_col2_set   = get_theme_mod( 'bevro_above_header_col2_set','text');
$bevro_above_header_col3_set   = get_theme_mod( 'bevro_above_header_col3_set','text');
?>
<div class="top-header">
			<div class="top-header-bar <?php echo esc_attr($bevro_above_header_layout);?>">
	     	<div class="container">
	     		<div class="top-header-container">
	     		<?php if($bevro_above_header_layout=='abv-one'):?>	
		         <div class="top-header-col1">
		         	<?php bevro_top_header_conetnt_col1($bevro_above_header_col1_set); ?>
		         </div>
		        <?php elseif($bevro_above_header_layout=='abv-two'): ?>
		        <div class="top-header-col1">
		        	<?php bevro_top_header_conetnt_col1($bevro_above_header_col1_set); ?>
		         </div>
		         <div class="top-header-col2">
                    <?php bevro_top_header_conetnt_col2($bevro_above_header_col2_set); ?></div>
		         <?php elseif($bevro_above_header_layout=='abv-three'): ?>
                  <div class="top-header-col1">
                  	<?php bevro_top_header_conetnt_col1($bevro_above_header_col1_set); ?>
		         </div>
		         <div class="top-header-col2">
                    <?php bevro_top_header_conetnt_col2($bevro_above_header_col2_set); ?></div>
		         <div class="top-header-col3">
                    <?php bevro_top_header_conetnt_col3($bevro_above_header_col3_set); ?></div>
                 <?php endif;?>
		          </div>
		        </div>
		</div>
</div>
<?php	}
}
add_action( 'bevro_top_header', 'bevro_top_header_markup' );
//************************************/
// top header col1 function
//************************************/
if ( ! function_exists( 'bevro_top_header_conetnt_col1' ) ){	
function bevro_top_header_conetnt_col1($content){ 
$bevro_mobile_menu_open = get_theme_mod( 'bevro_mobile_menu_open','left');?>
<?php if($content=='text'){?>
<div class='content-html'>
	<?php echo esc_html(get_theme_mod('bevro_col1_texthtml',  __( 'Add your content here', 'bevro' )));?>
</div>
<?php }elseif($content=='menu'){
if ( has_nav_menu('bevro-above-menu' ) ) {?>
<!-- Menu Toggle btn-->
     <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-abv">
            	<div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </div>
            </button>
        </div>
        <div class="sider above bevro-menu-hide <?php echo esc_attr($bevro_mobile_menu_open);?>">
        <div class="sider-inner">
        <?php bevro_abv_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 
  }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'bevro' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
	<div class="content-widget">
    <?php if( is_active_sidebar('top-header-widget-col1' ) ){
    dynamic_sidebar('top-header-widget-col1' );
     }else{?>
     	<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo bevro_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// top header col2 function
//************************************/
if ( ! function_exists( 'bevro_top_header_conetnt_col2' ) ){	
function bevro_top_header_conetnt_col2($content){ 
$bevro_mobile_menu_open = get_theme_mod( 'bevro_mobile_menu_open','left');?>
<?php if($content=='text'){?>
<div class='content-html'>
	<?php echo esc_html(get_theme_mod('bevro_col2_texthtml',  __( 'Add your content here', 'bevro' )));?>
</div>
<?php }elseif($content=='menu'){
	if ( has_nav_menu('bevro-above-menu' ) ){?>
<!-- Menu Toggle btn-->
        <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-abv">
                <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </div>
            </button>
        </div>
        <div class="sider above bevro-menu-hide <?php echo esc_attr($bevro_mobile_menu_open);?>">
        <div class="sider-inner">
        <?php bevro_abv_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'bevro' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
	<div class="content-widget">
    <?php if( is_active_sidebar('top-header-widget-col2' ) ){
    dynamic_sidebar('top-header-widget-col2' );
     }else{?>
     	<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo bevro_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// top header col3 function
//************************************/
if ( ! function_exists( 'bevro_top_header_conetnt_col3' ) ){	
function bevro_top_header_conetnt_col3($content){ 
$bevro_mobile_menu_open = get_theme_mod( 'bevro_mobile_menu_open','left');?>
<?php if($content=='text'){?>
<div class='content-html'>
	<?php echo esc_html(get_theme_mod('bevro_col3_texthtml',  __( 'Add your content here', 'bevro' )));?>
</div>
<?php }elseif($content=='menu'){
	if ( has_nav_menu('bevro-above-menu' ) ) {?>
<!-- Menu Toggle btn-->
       <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-abv">
                <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </div>
            </button>
        </div>
        <div class="sider above bevro-menu-hide <?php echo esc_attr($bevro_mobile_menu_open);?>">
        <div class="sider-inner">
        <?php bevro_abv_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'bevro' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
	<div class="content-widget">
    <?php if( is_active_sidebar('top-header-widget-col3' ) ){
    dynamic_sidebar('top-header-widget-col3' );
     }else{?>
     	<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo bevro_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
/***************************/
// bottom-header
/***************************/
if ( ! function_exists( 'bevro_bottom_header_markup' ) ){
function bevro_bottom_header_markup(){ ?>
<?php 
$bevro_bottom_header_layout     = get_theme_mod( 'bevro_bottom_header_layout','btm-none');
$bevro_bottom_header_col1_set   = get_theme_mod( 'bevro_bottom_header_col1_set','text');
$bevro_bottom_header_col2_set   = get_theme_mod( 'bevro_bottom_header_col2_set','text');
$bevro_bottom_header_col3_set   = get_theme_mod( 'bevro_bottom_header_col3_set','text');
?>
<div class="bottom-header">
            <div class="bottom-header-bar <?php echo esc_attr($bevro_bottom_header_layout);?>">
                <div class="container">
                    <div class="bottom-header-container">
                 <?php if($bevro_bottom_header_layout=='btm-one'):?>
                     <div class="bottom-header-col1">
                        <?php bevro_bottom_header_content_col1($bevro_bottom_header_col1_set); ?>
                        </div>
                 <?php endif; ?>
                 <?php if($bevro_bottom_header_layout=='btm-two'):?>
                     <div class="bottom-header-col1">
                        <?php bevro_bottom_header_content_col1($bevro_bottom_header_col1_set); ?></div>
                     <div class="bottom-header-col2">
                        <?php bevro_bottom_header_content_col2($bevro_bottom_header_col2_set); ?>
                        </div>
                 <?php endif; ?>
                  <?php if($bevro_bottom_header_layout=='btm-three'):?>
                     <div class="bottom-header-col1">
                        <?php bevro_bottom_header_content_col1($bevro_bottom_header_col1_set); ?></div>
                     <div class="bottom-header-col2">
                        <?php bevro_bottom_header_content_col2($bevro_bottom_header_col2_set); ?>
                        </div>
                     <div class="bottom-header-col3">
                        <?php bevro_bottom_header_content_col3($bevro_bottom_header_col3_set); ?></div>
                 <?php endif; ?>
                   </div>
                 </div>
             </div>
         </div>
<?php   }
}
add_action( 'bevro_bottom_header', 'bevro_bottom_header_markup' );

//************************************/
// bottom header col1 function
//************************************/
if ( ! function_exists( 'bevro_bottom_header_content_col1' ) ){ 
function bevro_bottom_header_content_col1($content){ 
$bevro_mobile_menu_open = get_theme_mod( 'bevro_mobile_menu_open','left');?>
<?php if($content=='text'){?>
<div class='content-html'>
    <?php echo esc_html(get_theme_mod('bevro_col1_bottom_texthtml',  __( 'Add your content here', 'bevro' )));?>
</div>
<?php }elseif($content=='menu'){
    if ( has_nav_menu('bevro-bottom-menu' ) ) {?>
<!-- Menu Toggle btn-->
        <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-btm">
                <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </div>
            </button>
        </div>
        <div class="sider bottom bevro-menu-hide <?php echo esc_attr($bevro_mobile_menu_open);?>">
        <div class="sider-inner">
        <?php bevro_btm_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 

 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Bottom Header Menu', 'bevro' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
    <div class="content-widget">
    <?php if( is_active_sidebar('bottom-header-widget-col1' ) ){
    dynamic_sidebar('bottom-header-widget-col1' );
     }else{?>
        <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo bevro_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// bottom header col2 function
//************************************/
if ( ! function_exists( 'bevro_bottom_header_content_col2' ) ){ 
function bevro_bottom_header_content_col2($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
    <?php echo esc_html(get_theme_mod('bevro_col2_bottom_texthtml',  __( 'Add your content here', 'bevro' )));?>
</div>
<?php }elseif($content=='menu'){
    if ( has_nav_menu('bevro-bottom-menu' ) ){?>
<!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" id="menu-btn" id="menu-btn-btm">
                <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            </button>
        </div>
<?php 
  bevro_btm_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Bottom Header Menu', 'bevro' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
    <div class="content-widget">
    <?php if( is_active_sidebar('bottom-header-widget-col2' ) ){
    dynamic_sidebar('bottom-header-widget-col2' );
     }else{?>
        <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo bevro_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// bottom header col3 function
//************************************/
if ( ! function_exists( 'bevro_bottom_header_content_col3' ) ){ 
function bevro_bottom_header_content_col3($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
    <?php echo esc_html(get_theme_mod('bevro_col3_bottom_texthtml',  __( 'Add your content here', 'bevro' )));?>
</div>
<?php }elseif($content=='menu'){
    if ( has_nav_menu('bevro-bottom-menu' ) ) {?>
<!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" id="menu-btn" id="menu-btn-btm">
                <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            </button>
        </div>
<?php 
  bevro_btm_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Bottom Header Menu', 'bevro' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
    <div class="content-widget">
    <?php if( is_active_sidebar('bottom-header-widget-col3' ) ){
    dynamic_sidebar('bottom-header-widget-col3' );
     }else{?>
        <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo bevro_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
/******************************/
//Transparent header function
/******************************/
function bevro_header_transparent_class($bevro_transparent_post_meta){
    if($bevro_transparent_post_meta=='default' || $bevro_transparent_post_meta==''){
        $class='';
        $bevro_header_transparent_special_page_disable = get_theme_mod('bevro_header_transparent_special_page_disable',false);
        $bevro_header_transparent = get_theme_mod( 'bevro_header_transparent',false);
        if($bevro_header_transparent==true && !is_home() && !is_single()){
            if(($bevro_header_transparent_special_page_disable==true) && (is_archive()||is_404()||is_search()|| (class_exists( 'WooCommerce' ) && (is_shop()||is_product()))) ){
                    $class= '';
            }else{
                    $class= 'brv-transparent-header';
           }             
         
        }else{
            $class= '';
        } 
       return $class;
   }else{
        $class='';
        if($bevro_transparent_post_meta=='enable'){
        $class= 'brv-transparent-header'; 
        return $class;
      }

   }
}
if(get_theme_mod('bevro_main_header_set','none')!=='none'):
function bevro_add_header_custom_item($items, $args){
    if(get_theme_mod('bevro_main_header_set')=='text'){
        $csmhtml = get_theme_mod('bevro_main_header_texthtml',__('Add your content here','bevro'));
          if( ($args->theme_location!== 'bevro-above-menu') && ($args->theme_location!== 'bevro-bottom-menu') && ($args->theme_location!== 'bevro-abv-footer-menu') && ($args->theme_location!== 'bevro-btm-footer-menu')){
          $items .= '<li class="menu-item brv-custom-item">'
                  . '<div class="menu-custom-html">'
                  .  esc_html($csmhtml)
                  . '</div>'
                  . '</li>';
          }
        return $items;
    }elseif(get_theme_mod('bevro_main_header_set')=='widget'){
        ob_start();
dynamic_sidebar('main-header-widget');
$sidebar = ob_get_contents();
ob_end_clean();
          if( ($args->theme_location!== 'bevro-above-menu') && ($args->theme_location!== 'bevro-bottom-menu') && ($args->theme_location!== 'bevro-abv-footer-menu') && ($args->theme_location!== 'bevro-btm-footer-menu')){
            $items .= '<li class="menu-item brv-custom-item">'
                   . '<div class="menu-custom-widget">'
                   . $sidebar
                   . '</div>'
                   . '</li>';
          }
        return $items;
    }elseif(get_theme_mod('bevro_main_header_set')=='search'){
         if( ($args->theme_location!== 'bevro-above-menu') && ($args->theme_location!== 'bevro-bottom-menu') && ($args->theme_location!== 'bevro-abv-footer-menu') && ($args->theme_location!== 'bevro-btm-footer-menu')){
          $items .= '<li class="menu-item brv-custom-item">'
                  . '<div class="menu-custom-search">'
                  .'<div class="searchfrom">'
                  .'<a href="#" class="search-btn"><i class="fa fa-search"></i></a>'
                  . '<form role="search" method="get" id="searchform" action="'.esc_url(home_url( '/' )).'">'
                  .'<div class="form-content">'
                  .'<input type="text" placeholder="'.esc_attr_x( 'Search', 'placeholder', 'bevro' ).'" name="s" id="s" value=""/>'
                  .'<input type="submit" value="'.esc_attr_x( 'Search', 'text', 'bevro' ).'" />'
                  .'</div>'
                  .'</form>'
                  .'</div>'
                  .'</div>'
                  .'</li>';
          }
        return $items;
    }
    elseif(get_theme_mod('bevro_main_header_set')=='social'){
          if( ($args->theme_location!== 'bevro-above-menu') && ($args->theme_location!== 'bevro-bottom-menu') && ($args->theme_location!== 'bevro-abv-footer-menu') && ($args->theme_location!== 'bevro-btm-footer-menu')){
          $items .= '<li class="menu-item brv-custom-item">
                    <div class="menu-custom-search"><div class="content-social">
                    '.bevro_social_links().'</div></div></li>';
          }
        return $items;
    }
    elseif(get_theme_mod('bevro_main_header_set')=='button'){
         $btntxt = get_theme_mod('bevro_main_header_btn_txt','');
         $btnurl = get_theme_mod('bevro_main_header_btn_url','');
          if( ($args->theme_location!== 'bevro-above-menu') && ($args->theme_location!== 'bevro-bottom-menu') && ($args->theme_location!== 'bevro-abv-footer-menu') && ($args->theme_location!== 'bevro-btm-footer-menu')){
          $items .='<a class="main-header-btn" href="'.esc_url($btnurl).'">'.esc_html($btntxt)
                  .'</a>';
          }
        return $items;
    }
    elseif(get_theme_mod('bevro_main_header_set')=='none'){
          if( ($args->theme_location!== 'bevro-above-menu') && ($args->theme_location!== 'bevro-bottom-menu') && ($args->theme_location!== 'bevro-abv-footer-menu') && ($args->theme_location!== 'bevro-btm-footer-menu')){
          $items .= '';
          }
        return $items;
    }

}
add_filter('wp_nav_menu_items', 'bevro_add_header_custom_item', 10, 2);
endif;
/************************/
// Without menu 
/************************/
function bevro_add_header_widthout_menu_custom_item(){
     $items="";
    if(get_theme_mod('bevro_main_header_set')=='text'){
        $csmhtml = get_theme_mod('bevro_main_header_texthtml',__('Add your content here','bevro'));
          $items .= '<div class="menu-custom-html">'
                  . esc_html($csmhtml)
                  . '</div>';
          
        return $items;
    }elseif(get_theme_mod('bevro_main_header_set')=='widget'){
        ob_start();
dynamic_sidebar('main-header-widget');
$sidebar = ob_get_contents();
ob_end_clean();
          
            $items .= '<div class="menu-custom-widget">'
                   . $sidebar
                   . '</div>';           
        return $items;
    }elseif(get_theme_mod('bevro_main_header_set')=='search'){
          
          $items .='<div class="menu-custom-search">'
                  .'<div class="searchfrom">'
                  .'<a href="#" class="search-btn"><i class="fa fa-search"></i></a>'
                  . '<form role="search" method="get" id="searchform" action="'.esc_url(home_url( '/' )).'">'
                  .'<div class="form-content">'
                  .'<input type="text" placeholder="'.esc_attr_x( 'Search', 'placeholder', 'bevro' ).'" name="s" id="s" value=""/>'
                  .'<input type="submit" value="'.esc_attr_x( 'Search', 'text', 'bevro' ).'" />'
                  .'</div>'
                  .'</form>'
                  .'</div>'
                  .'</div>';
                  return $items;
                 
          }
      
    elseif(get_theme_mod('bevro_main_header_set')=='social'){
          
          $items .= '<div class="menu-custom-search"><div class="content-social">
                    '.bevro_social_links().'</div></div></li>';
         
        return $items;
    }
    elseif(get_theme_mod('bevro_main_header_set')=='button'){
         $btntxt = get_theme_mod('bevro_main_header_btn_txt','');
         $btnurl = get_theme_mod('bevro_main_header_btn_url','');
          
          $items .='<a class="main-header-btn" href="'.esc_url($btnurl).'">'.esc_html($btntxt)
                  .'</a>';
        return $items;
    }
    elseif(get_theme_mod('bevro_main_header_set')=='none'){
          
          $items .= '';
          
        return $items;
    }
}
/***********************************************************
*Header Post Meta Hide and show Function for Bevro Theme
***************************************************************/
if( ! function_exists( 'bevro_header_abv_post_meta' ) ){
function bevro_header_abv_post_meta($page_post_meta_set=''){
   $bevro_above_header_layout = get_theme_mod('bevro_above_header_layout','abv-none');
    if($page_post_meta_set!=='on'){
        if($bevro_above_header_layout!=='abv-none'):
            bevro_top_header();
    endif;    
  }
 }
}
// main
if( ! function_exists( 'bevro_header_main_post_meta' ) ){
function bevro_header_main_post_meta($page_post_meta_set=''){
    if($page_post_meta_set!=='on'){
        bevro_main_header();
  }
 }
}
// bottom
if( ! function_exists( 'bevro_header_btm_post_meta' ) ){
function bevro_header_btm_post_meta($page_post_meta_set=''){
    $bevro_bottom_header_layout = get_theme_mod('bevro_bottom_header_layout','btm-none');
    if($page_post_meta_set!=='on'){
        if( $bevro_bottom_header_layout!=='btm-none'):
            bevro_bottom_header();
    endif;    
  }
 }
}
//PRELOADER
if( ! function_exists( 'bevro_preloader' ) ){
function bevro_preloader(){
 if (( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) ||
                isset( $_REQUEST['elementor-preview'] )){
      return;
 }else{         
    $bevro_preloader_enable = get_theme_mod('bevro_preloader_enable',false);
    $bevro_preloader_image_upload = get_theme_mod('bevro_preloader_image_upload',BEVRO_LOADER);
    if($bevro_preloader_enable==true){ ?>
    <div class="bevro_overlayloader">
    <div class="bevro-pre-loader"><img src="<?php echo esc_url($bevro_preloader_image_upload);?>"></div>
    </div> 
   <?php }
   }
 }
}