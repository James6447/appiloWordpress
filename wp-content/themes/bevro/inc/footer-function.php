<?php 
/**
 * Common Function for Bevro Theme.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/**
 * Function to get above footer
 */
if ( ! function_exists( 'bevro_top_footer_markup' ) ){	
function bevro_top_footer_markup(){ ?>
<?php 
$bevro_above_footer_layout    = get_theme_mod( 'bevro_above_footer_layout','ft-abv-none');
$bevro_above_footer_col1_set  = get_theme_mod( 'bevro_above_footer_col1_set','text');
$bevro_above_footer_col2_set  = get_theme_mod( 'bevro_above_footer_col2_set','text');
$bevro_above_footer_col3_set  = get_theme_mod( 'bevro_above_footer_col3_set','text');
?>	
<div class="top-footer">
		 	<div class="top-footer-bar <?php echo esc_attr($bevro_above_footer_layout);?>">
		       <div class="container">
			      <div class="top-footer-container">
			      	<?php if($bevro_above_footer_layout=='ft-abv-one'):?>	
		             <div class="top-footer-col1">
		             	<?php bevro_top_footer_conetnt_col1($bevro_above_footer_col1_set); ?>
		             </div>
		             <?php elseif($bevro_above_footer_layout=='ft-abv-two'):?>
		             <div class="top-footer-col1">
		             	<?php bevro_top_footer_conetnt_col1($bevro_above_footer_col1_set); ?>
		             </div>	
		             	<div class="top-footer-col2">
                    <?php bevro_top_footer_conetnt_col2($bevro_above_footer_col2_set); ?>
                    </div>
		             	<?php elseif($bevro_above_footer_layout=='ft-abv-three'):?>
		             		<div class="top-footer-col1">
		             	<?php bevro_top_footer_conetnt_col1($bevro_above_footer_col1_set); ?>
		                </div>	
		             	<div class="top-footer-col2"><?php bevro_top_footer_conetnt_col2($bevro_above_footer_col2_set); ?></div>
		             	<div class="top-footer-col3"><?php bevro_top_footer_conetnt_col3($bevro_above_footer_col3_set); ?></div>
		            <?php endif;?> 
		           </div>
		       </div>
		    </div>
		</div>
<?php }
}
add_action( 'bevro_top_footer', 'bevro_top_footer_markup' );
//************************************/
// Footer top col1 function
//************************************/
if ( ! function_exists( 'bevro_top_footer_conetnt_col1' ) ){	
function bevro_top_footer_conetnt_col1($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
<?php echo esc_html(get_theme_mod('bevro_footer_col1_texthtml',  __( 'Add your content here', 'bevro' )));?>
</div>
<?php }
elseif($content=='menu'){
if ( has_nav_menu('bevro-abv-footer-menu' ) ){?>     
<?php 
 bevro_avove_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'bevro' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
	<div class="content-widget">
    <?php if( is_active_sidebar('footer-top-first' ) ){
    dynamic_sidebar('footer-top-first' );
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
// Footer top col2 function
//************************************/
if ( ! function_exists( 'bevro_top_footer_conetnt_col2' ) ){	
function bevro_top_footer_conetnt_col2($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
	<?php echo esc_html(get_theme_mod('bevro_above_footer_col2_texthtml',  __( 'Add your content here', 'bevro' )));?>
</div>
<?php }elseif($content=='menu'){
	if ( has_nav_menu('bevro-abv-footer-menu' ) ){?>
<?php 
  bevro_avove_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'bevro' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
	<div class="content-widget">
    <?php if( is_active_sidebar('footer-top-second' ) ){
    dynamic_sidebar('footer-top-second' );
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
// Footer top col3 function
//************************************/
if ( ! function_exists( 'bevro_top_footer_conetnt_col3' ) ){	
function bevro_top_footer_conetnt_col3($content){?>
<?php if($content=='text'){?>
<div class='content-html'>
<?php echo esc_html(get_theme_mod('bevro_above_footer_col3_texthtml',  __( 'Add your content here', 'bevro' )));;?>
</div>
<?php }elseif($content=='menu'){
	if ( has_nav_menu('bevro-abv-footer-menu' ) ){?>
<?php 
  bevro_avove_footer_nav_menu();
 } else { ?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'bevro' );?></a>
<?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
	<div class="content-widget">
    <?php if( is_active_sidebar('footer-top-third' ) ){
    dynamic_sidebar('footer-top-third' );
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
/**
 * Function to get bottom footer
 */
if ( ! function_exists( 'bevro_bottom_footer_markup' ) ){	
function bevro_bottom_footer_markup(){ ?>
<?php 
$bevro_bottom_footer_layout  = get_theme_mod( 'bevro_bottom_footer_layout','ft-btm-one');
$bevro_bottom_footer_col1_set= get_theme_mod( 'bevro_bottom_footer_col1_set','text');
$bevro_bottom_footer_col2_set= get_theme_mod( 'bevro_bottom_footer_col2_set','text');
$bevro_bottom_footer_col3_set= get_theme_mod( 'bevro_bottom_footer_col3_set','text');
?>	
<div class="bottom-footer">
		 	<div class="bottom-footer-bar <?php echo esc_attr($bevro_bottom_footer_layout);?>">
		       <div class="container">
			      <div class="bottom-footer-container">
              <?php if($bevro_bottom_footer_layout=='ft-btm-one'):?>  
                 <div class="bottom-footer-col1">
                  <?php bevro_bottom_footer_conetnt_col1($bevro_bottom_footer_col1_set); ?>
                 </div>
               <?php elseif($bevro_bottom_footer_layout=='ft-btm-two'):?> 
                <div class="bottom-footer-col1">
                  <?php bevro_bottom_footer_conetnt_col1($bevro_bottom_footer_col1_set); ?>
                 </div>
                 <div class="bottom-footer-col2">
                  <?php bevro_bottom_footer_conetnt_col2($bevro_bottom_footer_col2_set); ?>
                  </div>
              <?php elseif($bevro_bottom_footer_layout=='ft-btm-three'):?>
                   <div class="bottom-footer-col1">
                  <?php bevro_bottom_footer_conetnt_col1($bevro_bottom_footer_col1_set); ?>
                 </div>
                 <div class="bottom-footer-col2">
                  <?php bevro_bottom_footer_conetnt_col2($bevro_bottom_footer_col2_set); ?>
                  </div>
                  <div class="bottom-footer-col3">
                    <?php bevro_bottom_footer_conetnt_col3($bevro_bottom_footer_col3_set); ?>
                  </div>
              <?php endif;?>
		           </div>
		       </div>
		    </div>
</div>
<?php }
}
add_action( 'bevro_bottom_footer', 'bevro_bottom_footer_markup' );
//************************************/
// Footer bottom col1 function
//************************************/
if ( ! function_exists( 'bevro_bottom_footer_conetnt_col1' ) ){ 
function bevro_bottom_footer_conetnt_col1($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('bevro_footer_bottom_col1_texthtml',__('Copyright | Bevro | Powered by Bevro','bevro')));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('bevro-btm-footer-menu' ) ) {?>
<?php 
  bevro_bottom_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'bevro' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-bottom-first' ) ){
    dynamic_sidebar('footer-bottom-first' );
     } else { ?>
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
// Footer bottom col2 function
//************************************/
if ( ! function_exists( 'bevro_bottom_footer_conetnt_col2' ) ){ 
function bevro_bottom_footer_conetnt_col2($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('bevro_footer_bottom_col2_texthtml',  __( 'Add your content here', 'bevro' )));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('bevro-btm-footer-menu' ) ) {?>
<?php 
  bevro_bottom_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'bevro' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-bottom-second')){
    dynamic_sidebar('footer-bottom-second');
          }else{ ?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
        <?php } ?>
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
// Footer bottom col3 function
//************************************/
if ( ! function_exists( 'bevro_bottom_footer_conetnt_col3' ) ){ 
function bevro_bottom_footer_conetnt_col3($content){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('bevro_bottom_footer_col3_texthtml',  __( 'Add your content here', 'bevro' )));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('bevro-btm-footer-menu' ) ) {?>
<?php 
  bevro_bottom_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'bevro' );?></a>
 <?php }
}
elseif($content=='search'){?>
<div class="searchfrom">
<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
<?php get_search_form();?>
</div>
<?php }elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-bottom-third')){
    dynamic_sidebar('footer-bottom-third');
          }else{ ?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
        <?php } ?>
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
/**
 * Function to get footer widget
 */
if ( ! function_exists( 'bevro_footer_widget_markup' ) ){	
function bevro_footer_widget_markup(){ ?>
<?php 
$bevro_bottom_footer_widget_layout  = get_theme_mod( 'bevro_bottom_footer_widget_layout','ft-wgt-none');
?>	
<div class="widget-footer">
		 	<div class="widget-footer-bar <?php echo esc_attr($bevro_bottom_footer_widget_layout);?>">
		       <div class="container">
			      <div class="widget-footer-container">
			      	<?php if($bevro_bottom_footer_widget_layout=='ft-wgt-one'):?>
		             <div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($bevro_bottom_footer_widget_layout=='ft-wgt-two'): ?>
                      	<div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($bevro_bottom_footer_widget_layout=='ft-wgt-three'): ?>
                      	<div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
                      <?php elseif($bevro_bottom_footer_widget_layout=='ft-wgt-four'): ?>
                      	<div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col4"><?php if( is_active_sidebar('footer-4' ) ){
                                       dynamic_sidebar('footer-4' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
                  <?php elseif($bevro_bottom_footer_widget_layout=='ft-wgt-five'): ?>
                  	<div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
                       <?php elseif($bevro_bottom_footer_widget_layout=='ft-wgt-six'): ?>
                       <div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
                  <?php elseif($bevro_bottom_footer_widget_layout=='ft-wgt-seven'): ?>
                  	<div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
                  <?php elseif($bevro_bottom_footer_widget_layout=='ft-wgt-eight'): ?>
                  	<div class="widget-footer-col1">
		             	<?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
		             <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
     	                     <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'bevro' );?></a>
                          <?php }?>
                      </div>
                  <?php endif;?>
		        </div>
		  </div>
	</div>
</div>
<?php }
}
add_action( 'bevro_widget_footer', 'bevro_footer_widget_markup' );
/***********************************************************
*Footer Post Meta Hide and show Function for Bevro Theme
***************************************************************/
if( ! function_exists( 'bevro_footer_abv_post_meta' ) ){
function bevro_footer_abv_post_meta($page_post_meta_set=''){
    $bevro_above_footer_layout = get_theme_mod('bevro_above_footer_layout','ft-abv-none');
    if($page_post_meta_set!=='on'){
        if( $bevro_above_footer_layout!=='ft-abv-none'):
             bevro_top_footer();
    endif;    
  }
 }
}
//Widget footer
if( ! function_exists( 'bevro_footer_widget_post_meta' ) ){
function bevro_footer_widget_post_meta($page_post_meta_set=''){
   $bevro_bottom_footer_widget_layout = get_theme_mod('bevro_bottom_footer_widget_layout','ft-wgt-none');
    if($page_post_meta_set!=='on'){
        if($bevro_bottom_footer_widget_layout!=='ft-wgt-none'):
             bevro_widget_footer();
    endif;    
  }
 }
}
//Footer bottom
if( ! function_exists( 'bevro_footer_bottom_post_meta' ) ){
function bevro_footer_bottom_post_meta($page_post_meta_set=''){
   $bevro_bottom_footer_layout = get_theme_mod('bevro_bottom_footer_layout','ft-btm-one');
    if($page_post_meta_set!=='on'){
        if($bevro_bottom_footer_layout!=='ft-btm-none'):
             bevro_bottom_footer();
    endif;    
  }
 }
}