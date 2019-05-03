<?php
/**
 * rockero Theme Customizer
 *
 * @package rockero
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rockero_customize_register( $wp_customize ) {

	global $rockeroPostsPagesArray, $rockeroYesNo, $rockeroSliderType, $rockeroServiceLayouts, $rockeroAvailableCats, $rockeroBusinessLayoutType;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'rockero_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'rockero_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_panel( 'rockero_general', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'rockero'),
		'active_callback' => '',
	) );

	$wp_customize->get_section( 'title_tagline' )->panel = 'rockero_general';
	$wp_customize->get_section( 'background_image' )->panel = 'rockero_general';
	$wp_customize->get_section( 'background_image' )->title = __('Site background', 'rockero');
	$wp_customize->get_section( 'header_image' )->panel = 'rockero_general';
	$wp_customize->get_section( 'header_image' )->title = __('Header Settings', 'rockero');
	$wp_customize->get_control( 'header_image' )->priority = 20;
	//$wp_customize->get_control( 'header_image' )->active_callback = 'rockero_show_wp_header_control';	
	$wp_customize->get_section( 'static_front_page' )->panel = 'rockero_business_page';
	$wp_customize->get_section( 'static_front_page' )->title = __('Select frontpage type', 'rockero');
	$wp_customize->get_section( 'static_front_page' )->priority = 9;
	$wp_customize->remove_section('colors');
	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'background_color', 
			array(
				'label'      => __( 'Background Color', 'rockero' ),
				'section'    => 'background_image',
				'priority'   => 9
			) ) 
	);
	//$wp_customize->remove_section('static_front_page');	
	//$wp_customize->remove_section('header_image');	

	/* Upgrade */	
	$wp_customize->add_section( 'rockero_business_upgrade', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'title'      => __('Upgrade to PRO', 'rockero'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'rockero_show_sliderr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new rockero_Customize_Control_Upgrade(
		$wp_customize,
		'rockero_show_sliderr',
		array(
			'label'      => __( 'Show headerr?', 'rockero' ),
			'settings'   => 'rockero_show_sliderr',
			'priority'   => 10,
			'section'    => 'rockero_business_upgrade',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''			
		)
	) );
	
	/* Usage guide */	
	$wp_customize->add_section( 'rockero_business_usage', array(
		'priority'       => 9,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Usage Guide', 'rockero'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'rockero_show_sliderrr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new rockero_Customize_Control_Guide(
		$wp_customize,
		'rockero_show_sliderrr',
		array(

			'label'      => __( 'Show headerr?', 'rockero' ),
			'settings'   => 'rockero_show_sliderrr',
			'priority'   => 10,
			'section'    => 'rockero_business_usage',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''				
		)
	) );
	
	/* Header Section */
	$wp_customize->add_setting( 'rockero_show_slider',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rockero_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_show_slider',
		array(
			'label'      => __( 'Show header?', 'rockero' ),
			'settings'   => 'rockero_show_slider',
			'priority'   => 10,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $rockeroYesNo,
		)
	) );	
	$wp_customize->add_setting( 'rockero_header_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rockero_sanitize_slider_type_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_header_type',
		array(
			'label'      => __( 'Header type :', 'rockero' ),
			'settings'   => 'rockero_header_type',
			'priority'   => 10,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $rockeroSliderType,
		)
	) );	
	
	
	/* Business page panel */
	$wp_customize->add_panel( 'rockero_business_page', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home/Front Page Settings', 'rockero'),
		'active_callback' => '',
	) );
	
	$wp_customize->add_section( 'rockero_business_page_layout_selection', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('Select FrontPage Layout', 'rockero'),
		'active_callback' => 'rockero_front_page_sections',
		'panel'  => 'rockero_business_page',
	) );
	$wp_customize->add_setting( 'rockero_business_page_layout_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rockero_sanitize_layout_type',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_business_page_layout_type',
		array(
			'label'      => __( 'Layout type :', 'rockero' ),
			'settings'   => 'rockero_business_page_layout_type',
			'priority'   => 10,
			'section'    => 'rockero_business_page_layout_selection',
			'type'    => 'select',
			'choices' => $rockeroBusinessLayoutType,
		)
	) );	
	
	
	$wp_customize->add_section( 'rockero_business_page_layout_seven', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('Seven settings', 'rockero'),
		'active_callback' => 'rockero_front_page_sections',
		'panel'  => 'rockero_business_page',
	) );
	$wp_customize->add_setting( 'rockero_seven_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rockero_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_seven_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'rockero' ),
			'settings'   => 'rockero_seven_welcome_post',
			'priority'   => 10,
			'section'    => 'rockero_business_page_layout_seven',
			'type'    => 'select',
			'choices' => $rockeroPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'rockero_portfolio_heading',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_portfolio_heading',
		array(
			'label'      => __( 'Portfolio Heading :', 'rockero' ),
			'settings'   => 'rockero_portfolio_heading',
			'priority'   => 20,
			'section'    => 'rockero_business_page_layout_seven',
			'type'    => 'text',
		)
	) );
	$wp_customize->add_setting( 'rockero_portfolio_text',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_portfolio_text',
		array(
			'label'      => __( 'Portfolio Text :', 'rockero' ),
			'settings'   => 'rockero_portfolio_text',
			'priority'   => 30,
			'section'    => 'rockero_business_page_layout_seven',
			'type'    => 'text',
		)
	) );
	$wp_customize->add_setting( 'rockero_portfolio_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rockero_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_portfolio_cat',
		array(
			'label'      => __( 'Select category for portfolio :', 'rockero' ),
			'settings'   => 'rockero_portfolio_cat',
			'priority'   => 40,
			'section'    => 'rockero_business_page_layout_seven',
			'type'    => 'select',
			'choices' => $rockeroAvailableCats,
		)
	) );
	$wp_customize->add_setting( 'rockero_seven_about_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rockero_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_seven_about_post',
		array(
			'label'      => __( 'About post :', 'rockero' ),
			'settings'   => 'rockero_seven_about_post',
			'priority'   => 50,
			'section'    => 'rockero_business_page_layout_seven',
			'type'    => 'select',
			'choices' => $rockeroPostsPagesArray,
		)
	) );	
	
	
	$wp_customize->add_section( 'business_page_layout_wooone', array(
		'priority'       => 60,
		'capability'     => 'edit_theme_options',
		'title'      => __('Woo One settings', 'rockero'),
		'active_callback' => 'rockero_front_page_sections',
		'panel'  => 'rockero_business_page',
	) );

	$wp_customize->add_setting( 'rockero_wooone_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rockero_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_wooone_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'rockero' ),
			'settings'   => 'rockero_wooone_welcome_post',
			'priority'   => 10,
			'section'    => 'business_page_layout_wooone',
			'type'    => 'select',
			'choices' => $rockeroPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'rockero_wooone_latest_heading',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_wooone_latest_heading',
		array(
			'label'      => __( 'Products Heading :', 'rockero' ),
			'settings'   => 'rockero_wooone_latest_heading',
			'priority'   => 20,
			'section'    => 'business_page_layout_wooone',
			'type'    => 'text',
		)
	) );
	$wp_customize->add_setting( 'rockero_wooone_latest_text',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_wooone_latest_text',
		array(
			'label'      => __( 'Products Text :', 'rockero' ),
			'settings'   => 'rockero_wooone_latest_text',
			'priority'   => 30,
			'section'    => 'business_page_layout_wooone',
			'type'    => 'text',
		)
	) );	

	$wp_customize->add_section( 'rockero_business_page_quote', array(
		'priority'       => 110,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Settings', 'rockero'),
		'active_callback' => '',
		'panel'  => 'rockero_general',
	) );
	$wp_customize->add_setting( 'rockero_show_quote',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rockero_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_show_quote',
		array(
			'label'      => __( 'Show quote?', 'rockero' ),
			'settings'   => 'rockero_show_quote',
			'priority'   => 10,
			'section'    => 'rockero_business_page_quote',
			'type'    => 'select',
			'choices' => $rockeroYesNo,
		)
	) );
	$wp_customize->add_setting( 'rockero_quote_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rockero_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_quote_post',
		array(
			'label'      => __( 'Select post', 'rockero' ),
			'description' => __( 'Select a post/page you want to show in quote section', 'rockero' ),
			'settings'   => 'rockero_quote_post',
			'priority'   => 11,
			'section'    => 'rockero_business_page_quote',
			'type'    => 'select',
			'choices' => $rockeroPostsPagesArray,
		)
	) );	
	
	$wp_customize->add_section( 'rockero_business_page_social', array(
		'priority'       => 120,
		'capability'     => 'edit_theme_options',
		'title'      => __('Social Settings', 'rockero'),
		'active_callback' => '',
		'panel'  => 'rockero_general',
	) );	
	$wp_customize->add_setting( 'rockero_show_social',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rockero_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rockero_show_social',
		array(
			'label'      => __( 'Show social?', 'rockero' ),
			'settings'   => 'rockero_show_social',
			'priority'   => 10,
			'section'    => 'rockero_business_page_social',
			'type'    => 'select',
			'choices' => $rockeroYesNo,
		)
	) );
	$wp_customize->add_setting( 'business_page_facebook',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_facebook', array(
	  'type' => 'text',
	  'section' => 'rockero_business_page_social', // Add a default or your own section
	  'label' => __( 'Facebook', 'rockero' ),
	  'description' => __( 'Enter your facebook url.', 'rockero' ),
	) );
	$wp_customize->add_setting( 'business_page_flickr',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_flickr', array(
	  'type' => 'text',
	  'section' => 'rockero_business_page_social', // Add a default or your own section
	  'label' => __( 'Flickr', 'rockero' ),
	  'description' => __( 'Enter your flickr url.', 'rockero' ),
	) );
	$wp_customize->add_setting( 'business_page_gplus',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_gplus', array(
	  'type' => 'text',
	  'section' => 'rockero_business_page_social', // Add a default or your own section
	  'label' => __( 'Gplus', 'rockero' ),
	  'description' => __( 'Enter your gplus url.', 'rockero' ),
	) );
	$wp_customize->add_setting( 'business_page_linkedin',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_linkedin', array(
	  'type' => 'text',
	  'section' => 'rockero_business_page_social', // Add a default or your own section
	  'label' => __( 'Linkedin', 'rockero' ),
	  'description' => __( 'Enter your linkedin url.', 'rockero' ),
	) );
	$wp_customize->add_setting( 'business_page_reddit',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_reddit', array(
	  'type' => 'text',
	  'section' => 'rockero_business_page_social', // Add a default or your own section
	  'label' => __( 'Reddit', 'rockero' ),
	  'description' => __( 'Enter your reddit url.', 'rockero' ),
	) );
	$wp_customize->add_setting( 'business_page_stumble',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_stumble', array(
	  'type' => 'text',
	  'section' => 'rockero_business_page_social', // Add a default or your own section
	  'label' => __( 'Stumble', 'rockero' ),
	  'description' => __( 'Enter your stumble url.', 'rockero' ),
	) );
	$wp_customize->add_setting( 'business_page_twitter',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_twitter', array(
	  'type' => 'text',
	  'section' => 'rockero_business_page_social', // Add a default or your own section
	  'label' => __( 'Twitter', 'rockero' ),
	  'description' => __( 'Enter your twitter url.', 'rockero' ),
	) );	
	
}
add_action( 'customize_register', 'rockero_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function rockero_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function rockero_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rockero_customize_preview_js() {
	wp_enqueue_script( 'rockero-customizer', esc_url( get_template_directory_uri() ) . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'rockero_customize_preview_js' );

require get_template_directory() . '/inc/variables.php';

function rockero_sanitize_yes_no_setting( $value ){
	global $rockeroYesNo;
    if ( ! array_key_exists( $value, $rockeroYesNo ) ){
        $value = 'select';
	}
    return $value;	
}

function rockero_sanitize_post_selection( $value ){
	global $rockeroPostsPagesArray;
    if ( ! array_key_exists( $value, $rockeroPostsPagesArray ) ){
        $value = 'select';
	}
    return $value;	
}

function rockero_front_page_sections(){
	
	$value = false;
	
	if( 'page' == get_option( 'show_on_front' ) ){
		$value = true;
	}
	
	return $value;
	
}

function rockero_show_wp_header_control(){
	
	$value = false;
	
	if( 'header' == get_theme_mod( 'header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function rockero_show_header_one_control(){
	
	$value = false;
	
	if( 'header-one' == get_theme_mod( 'header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function rockero_sanitize_slider_type_setting( $value ){

	global $rockeroSliderType;
    if ( ! array_key_exists( $value, $rockeroSliderType ) ){
        $value = 'select';
	}
    return $value;	
	
}

function rockero_sanitize_cat_setting( $value ){
	
	global $rockeroAvailableCats;
	
	if( ! array_key_exists( $value, $rockeroAvailableCats ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

function rockero_sanitize_layout_type( $value ){
	
	global $rockeroBusinessLayoutType;
	
	if( ! array_key_exists( $value, $rockeroBusinessLayoutType ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

add_action( 'customize_register', 'rockero_load_customize_classes', 0 );
function rockero_load_customize_classes( $wp_customize ) {
	
	class rockero_Customize_Control_Upgrade extends WP_Customize_Control {

		public $type = 'rockero-upgrade';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="rockero-upgrade-container" class="rockero-upgrade-container">

				<ul>
					<li>More sliders</li>
					<li>More layouts</li>
					<li>Color customization</li>
					<li>Font customization</li>
				</ul>

				<p>
					<a href="https://www.themealley.com/business/">Upgrade</a>
				</p>
									
			</div><!-- .rockero-upgrade-container -->
			
		<?php }	
		
	}
	
	class rockero_Customize_Control_Guide extends WP_Customize_Control {

		public $type = 'rockero-guide';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="rockero-upgrade-container" class="rockero-upgrade-container">

				<ol>
					<li>Select 'A static page' for "your homepage displays" in 'select frontpage type' section of 'Home/Front Page settings' tab.</li>
					<li>Enter details for various section like header, welcome, services, quote, social sections.</li>
				</ol>
									
			</div><!-- .rockero-upgrade-container -->
			
		<?php }	
		
	}	

	$wp_customize->register_control_type( 'rockero_Customize_Control_Upgrade' );
	$wp_customize->register_control_type( 'rockero_Customize_Control_Guide' );
	
	
}