<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Parallel
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>

<div class="col-md-12">
			
    <div class="sidebar">
		
		<?php dynamic_sidebar( 'sidebar-1' ); ?>

	</div><!--sidebar-->

</div>

<?php endif; ?>