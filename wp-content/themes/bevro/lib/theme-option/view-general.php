<?php
/**
 * View General
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
?>
<div class="bevro-container bevro-welcome">
		<div id="poststuff">
			<div id="post-body" class="columns-1">
				<div id="post-body-content">
					<!-- All WordPress Notices below header -->
					<h1 class="screen-reader-text"><?php esc_html_e( 'Bevro', 'bevro' ); ?> </h1>
						<?php do_action( 'bevro_welcome_page_content_before' ); ?>
                        <div class="bevro-content">
						<?php do_action( 'bevro_welcome_page_main_content' ); ?>
                         </div>
						
						<?php do_action( 'bevro_welcome_page_content_after' ); ?>
				</div>
			</div>
			<!-- /post-body -->
			<br class="clear">
		</div>


</div>
