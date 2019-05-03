<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rockero
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'rockero' ); ?></a>
	
<div class="outerContainer">

	<header id="masthead" class="site-header">
		
		<div class="responsive-container">
		
			<div class="site-branding">
				
				<?php
				
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
							echo '<a href="' . esc_url( home_url( '/' ) ) . '"><img src="'. esc_url( $logo[0] ) .'"></a>';
					} else {
							echo '<h1>'. esc_html(get_bloginfo( 'name' )) .'</h1>';
							$rockero_description = get_bloginfo( 'description', 'display' );
							if ( $rockero_description || is_customize_preview() ){
								echo '<p class="site-description">' . esc_html($rockero_description) . '</p>';
							}
					}			
				
				?>
				
				<span class="menu-button"></span>

			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				
				<div class="menu-container">
				
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'depth' => 1,
						'container_class' => 'rockero-menu',
					) );
					?>
				
				</div><!-- .menu-container -->

			</nav><!-- #site-navigation -->
		
		</div>
		
	</header><!-- #masthead -->
	
	<?php 

		if( is_front_page() && 'no' != get_theme_mod('rockero_show_slider') ){
			
			if( 'header' == get_theme_mod( 'rockero_header_type' ) ){	
				
				get_template_part( 'template-parts/header/wp-header' );
				
			}else{
				
				get_template_part( 'template-parts/header/owl-slider' );
				
			}
			
		}

	?>
	
	<?php if( is_front_page() && ( 'six' == get_theme_mod('rockero_business_page_layout_type') || '' == get_theme_mod('rockero_business_page_layout_type') || 'select' == get_theme_mod('rockero_business_page_layout_type') ) ) : ?>

		<?php

					$rockeroSixWelcomePostTitle = '';
					$rockeroSixWelcomePostDesc = '';
					$rockeroSixWelcomePostContent = '';

					if( '' != get_theme_mod('rockero_six_welcome_post') && 'select' != get_theme_mod('rockero_six_welcome_post') ){

						$rockeroSixWelcomePostId = get_theme_mod('rockero_six_welcome_post');

						if( ctype_alnum($rockeroSixWelcomePostId) ){

							$rockeroSixWelcomePost = get_post( $rockeroSixWelcomePostId );

							$rockeroSixWelcomePostTitle = $rockeroSixWelcomePost->post_title;
							$rockeroSixWelcomePostDesc = $rockeroSixWelcomePost->post_excerpt;
							$rockeroSixWelcomePostContent = $rockeroSixWelcomePost->post_content;

						}

					}			

		?>	
	
	<?php endif; ?>

	<div id="content" class="site-content">
