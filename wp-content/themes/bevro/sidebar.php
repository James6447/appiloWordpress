<?php
/**
 * Primary sidebar
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
$sidebar = apply_filters( 'bevro_get_sidebar', 'sidebar-1' );
?>
<div id="sidebar-primary" class="widget-area sidebar <?php if(function_exists('bevro_stick_sidebar_class')){echo esc_attr(bevro_stick_sidebar_class());}?>" role="complementary">
	<div class="sidebar-main">
<?php
    if ( is_active_sidebar($sidebar) ){
    dynamic_sidebar($sidebar);
     }
?>
</div>
</div>