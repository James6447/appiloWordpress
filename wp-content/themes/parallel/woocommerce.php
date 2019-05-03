<?php
/*
 * The template for displaying woocommerce content.
 *
 * This is the template that displays all woocommerce content.
 *
 */
?>

<?php get_header(); ?>

<div class="container">

	<div class="row">

		<div class="<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?>">
			
			<div class="content">			
			
                <?php woocommerce_content(); ?>

			</div>

		</div>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>