<?php
if ( ! class_exists( 'Bevro_Admin_Settings' ) ){
    /**
	 * Bevro Admin Settings
	 */
	class Bevro_Admin_Settings{
    /**
		 * View all actions
		 *
		 * @since 1.0
		 * @var array $view_actions
		 */
		static public $view_actions = array();

		/**
		 * Menu page title
		 *
		 * @since 1.0
		 * @var array $menu_page_title
		 */
		static public $menu_page_title = 'Bevro Theme';

		/**
		 * Page title
		 *
		 * @since 1.0
		 * @var array $page_title
		 */
		static public $page_title = 'Bevro';

		/**
		 * Plugin slug
		 *
		 * @since 1.0
		 * @var array $plugin_slug
		 */
		static public $plugin_slug = 'bevro';

		/**
		 * Default Menu position
		 *
		 * @since 1.0
		 * @var array $default_menu_position
		 */
		static public $default_menu_position = 'themes.php';

		/**
		 * Parent Page Slug
		 *
		 * @var array $parent_page_slug
		 */
		static public $parent_page_slug = 'general';

		/**
		 * Current Slug
		 *
		 * @var array $current_slug
		 */
		static public $current_slug = 'general';

		/**
		 * Constructor
		 */
		function __construct() {

			if ( ! is_admin() ) {
				return;
			}
			add_action( 'after_setup_theme', __CLASS__ . '::init_admin_settings', 99 );
		}
        /**
		 * Admin settings init
		 */
		static public function init_admin_settings(){
			self::$menu_page_title = apply_filters( 'bevro_menu_page_title', __( 'Bevro Options', 'bevro' ) );
			self::$page_title      = apply_filters( 'bevro_page_title', __( 'Bevro', 'bevro' ) );

			if ( isset( $_REQUEST['page'] ) && strpos( $_REQUEST['page'], self::$plugin_slug ) !== false ) {
				add_action( 'admin_enqueue_scripts', __CLASS__ . '::styles_scripts' );
            
				
			}
			// Let extensions hook into saving.
		    do_action( 'bevro_admin_settings_scripts' );
			self::save_settings();
            add_action( 'admin_enqueue_scripts', __CLASS__ . '::admin_scripts' );
			add_action( 'admin_menu', __CLASS__ . '::add_admin_menu', 99 );

			add_action( 'bevro_menu_general_action', __CLASS__ . '::general_page',99 );
			add_action( 'bevro_header_right_section', __CLASS__ . '::top_header_right_section' );
			add_filter( 'admin_title', __CLASS__ . '::bevro_admin_title', 10, 2 );
			
			add_action( 'bevro_welcome_page_main_content', __CLASS__ . '::bevro_welcome_page_knowledge_base_scetion', 11 );
            add_action( 'bevro_welcome_page_main_content', __CLASS__ . '::bevro_welcome_page_community_scetion', 12 );
            add_action( 'bevro_welcome_page_main_content', __CLASS__ . '::bevro_welcome_page_five_star_scetion', 13 );
            add_action( 'bevro_welcome_page_main_content', __CLASS__ . '::bevro_recommend_plugins',10 );
            add_action( 'bevro_welcome_page_main_content', __CLASS__ . '::bevro_welcome_page_starter_sites_section',10 );
			add_action( 'bevro_welcome_page_main_content', __CLASS__ . '::bevro_welcome_page_pro_content',15 );
			add_action( 'bevro_recommend_plugins_setup', __CLASS__ . '::bevro_plugin_setup_api',17);
			// AJAX.
			//add_action( 'wp_ajax_bevro_default_home', __CLASS__ . '::bevro_default_home' );
			add_action( 'wp_ajax_bevro_activeplugin', __CLASS__ . '::bevro_activeplugin' );
			// AJAX.
			add_action( 'wp_ajax_bevro-sites-plugin-activate', __CLASS__ . '::required_plugin_activate' );
		}
		 /**
		 * View actions
		 */
		static public function get_view_actions() {

			if ( empty( self::$view_actions ) ) {

				$actions            = array(
					'general' => array(
						'label' => __( 'Welcome', 'bevro' ),
						'show'  => ! is_network_admin(),
					),
				);
				self::$view_actions = apply_filters( 'bevro_menu_options', $actions );
			}

			return self::$view_actions;
		}
        /**
		 * Save All admin settings here
		 */
		static public function save_settings() {

			// Only admins can save settings.
			if ( ! current_user_can( 'manage_options' ) ){
				return;
			}

			// Let extensions hook into saving.
			do_action( 'bevro_admin_settings_save' );
		}

        /**
		 * Enqueues the needed CSS/JS for the builder's admin settings page.
		 *
		 */
		static public function styles_scripts(){
			// Styles.
			wp_enqueue_style( 'bevro-admin-settings', BEVRO_THEME_URI . 'lib/theme-option/assets/css/bevro-admin-menu-settings.css', array(), BEVRO_THEME_VERSION );
			// Script.
			wp_enqueue_script( 'bevro-admin-settings', BEVRO_THEME_URI . 'lib/theme-option/assets/js/bevro-admin-menu-settings.js', array( 'jquery', 'wp-util', 'updates' ), BEVRO_THEME_VERSION );
			

			$localize = array(
				'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
				'btnActivating'       => __( 'Activating Importer Plugin ', 'bevro' ) . '&hellip;',
				'bevroSitesLink'      => admin_url( 'themes.php?page=pt-one-click-demo-import' ),
				'bevroSitesLinkTitle' => __( 'See Library', 'bevro' ),
			);
			wp_localize_script( 'bevro-admin-settings', 'bevro', apply_filters( 'bevro_theme_js_localize', $localize ) );
		}

		/**
		 * Enqueues the needed CSS/JS for Backend.
		 *
		 */
		static public function admin_scripts(){
			// Styles.
			wp_enqueue_style( 'bevro-admin', BEVRO_THEME_URI . 'lib/theme-option/assets/css/bevro-admin.css', array(), BEVRO_THEME_VERSION );
			
		}
        /**
		 * Add main menu
		 *
		 */
		static public function add_admin_menu() {

			$parent_page    = self::$default_menu_position;
			$page_title     = self::$menu_page_title;
			$capability     = 'manage_options';
			$page_menu_slug = self::$plugin_slug;
			$page_menu_func = __CLASS__ . '::menu_callback';

			if ( apply_filters( 'bevro_dashboard_admin_menu', true ) ) {
				add_theme_page( $page_title, $page_title, $capability, $page_menu_slug, $page_menu_func );
			} else {
				do_action( 'bevro_register_admin_menu', $parent_page, $page_title, $capability, $page_menu_slug, $page_menu_func );
			}
		}

        /**
		 * Menu callback
		 *
		 */
		static public function menu_callback() {

			$current_slug = isset( $_GET['action'] ) ? esc_attr( $_GET['action'] ) : self::$current_slug;

			$active_tab   = str_replace( '_', '-', $current_slug );
			$current_slug = str_replace( '-', '_', $current_slug );

			$bevro_icon           = apply_filters( 'bevro_page_top_icon', true );
			$ast_visit_site_url = apply_filters( 'bevroa_site_url', 'https://bevro.com' );
			$ast_wrapper_class  = apply_filters( 'bevro_welcome_wrapper_class', array( $current_slug ) );
			$my_theme = wp_get_theme();
			$bevro_theme_version = $my_theme->get( 'Version' );
            
			?>
			<div class="bevro-menu-page-wrapper wrap bevro-clear <?php echo esc_attr( implode( ' ', $ast_wrapper_class ) ); ?>">
					
				<?php do_action( 'bevro_menu_' . esc_attr( $current_slug ) . '_action' ); ?>
			</div>
			<?php
		}
        /**
		 * Include general page
		 *
		 * @since 1.0
		 */
		static public function general_page(){
			get_template_part( 'lib/theme-option/view-general');
		}
         /**
		 * Include Recommend Plugin
		 *
		 */
		static public function bevro_recommend_plugins(){	
			?>
			<div class="postbox bevro-recommend-plugins">
				<h2 class="hndle bevro-normal-cusror">
					<span class="dashicons dashicons-admin-plugins"></span>
					<span><?php esc_html_e( 'Recommended Plugins', 'bevro' ); ?></span>
				</h2>
				<div class="inside">
					<?php do_action( 'bevro_recommend_plugins_setup' ); ?>
			    </div>
			</div>
			<?php } 
        

        /**
		 * Include Welcome page right starter sites content
		 *
		 * @since 1.2.4
		 */
		static public function bevro_welcome_page_starter_sites_section(){
			?>
			<div class="postbox">
				<h2 class="hndle bvr-normal-cusror">
					<span class="dashicons dashicons-admin-customizer"></span>
					<span><?php echo esc_html__('Import Demo Site', 'bevro'); ?></span>
				</h2>
				
				<div class="inside">
					<img class="bvr-starter-sites-img" src="<?php echo esc_url( BEVRO_THEME_URI . 'lib/theme-option/assets/images/demo-site.png' ); ?>">
					<p>
					<?php	
						printf(
							esc_html__( 'Import live demo content of %1$s theme, widgets and settings with just one click.', 'bevro' ),
							self::$page_title
						);
						
						?>
					</p>
					
						<?php
						// Sita Sites - Installed but Inactive.
						// Sita Premium Sites - Inactive.
						if ( (file_exists( WP_PLUGIN_DIR . '/elementor/elementor.php' ) && is_plugin_inactive( 'elementor/elementor.php' )) && (file_exists( WP_PLUGIN_DIR . '/one-click-demo-import/one-click-demo-import.php' ) && is_plugin_inactive( 'one-click-demo-import/one-click-demo-import.php' ))){

							$class        = 'button bvr-sites-inactive';
							$button_text  = __( 'Activate Importer Plugin', 'bevro' );
							$data_slug    = 'elementor';
							$data_init    = '/elementor/elementor.php';
							$data_slug1   = 'one-click-demo-import';
							$data_init1   = '/one-click-demo-import/one-click-demo-import.php';

							// Sita Sites - Not Installed.
							// Sita Premium Sites - Inactive.
						} elseif ( (! file_exists( WP_PLUGIN_DIR . '/elementor/elementor.php' ) )&&( ! file_exists( WP_PLUGIN_DIR . '/one-click-demo-import/one-click-demo-import.php' ) )){

							$class       = 'button bvr-sites-notinstalled';
							$button_text = __( 'Install Importer Plugin', 'bevro' );
							$data_slug   = 'elementor';
							$data_init   = '/elementor/elementor.php';
							$data_slug1   = 'one-click-demo-import';
							$data_init1   = '/one-click-demo-import/one-click-demo-import.php';

						} else {
							$class       = 'active';
							$button_text = __( 'See Library', 'bevro' );
							$link        = admin_url( 'themes.php?page=pt-one-click-demo-import' );
						}

						printf(
							'<a class="%1$s" %2$s %3$s %4$s %5$s %6$s> %7$s </a>',
							esc_attr( $class ),
							isset( $link ) ? 'href="' . esc_url( $link ) . '"' : '',
							isset( $data_slug ) ? 'data-slug="' . esc_attr( $data_slug ) . '"' : '',
							isset( $data_init ) ? 'data-init="' . esc_attr( $data_init ) . '"' : '',

							isset( $data_slug1 ) ? 'data-slug1="' . esc_attr( $data_slug1 ) . '"' : '',
							isset( $data_init1 ) ? 'data-init1="' . esc_attr( $data_init1 ) . '"' : '',
							esc_html( $button_text )
						);
						?>
					<div>
					</div>
				</div>
			</div>

			<?php
		}
		
        /**
		 * Include Welcome page right side knowledge base content
		 */
		static public function bevro_welcome_page_knowledge_base_scetion(){
			?>

			<div class="postbox">
				<h2 class="hndle bevro-normal-cusror">
					<span class="dashicons dashicons-book"></span>
					<span><?php esc_html_e( 'Learn More', 'bevro' ); ?></span>
				</h2>
				<div class="inside">
					<p>
						<?php
						printf(
							esc_html__( 'We want to make sure you have the best experience using %1$s. Visit us and know how it works, take a look and get whole knowledge about %1$s .', 'bevro' ),
							self::$page_title
						);
						?>
					</p>
					<?php
					$bevro_knowledge_base_doc_link      = 'https://themehunk.com/docs/bevro-wordpress-theme/';
					$bevro_knowledge_base_doc_link_text = apply_filters( 'bevro_knowledge_base_documentation_link_text', __( 'Visit Us', 'bevro' ) );
					printf(
						'%1$s',
						! empty( $bevro_knowledge_base_doc_link ) ? '<a href=' . esc_url( $bevro_knowledge_base_doc_link ) . ' target="_blank" rel="noopener">' . esc_html( $bevro_knowledge_base_doc_link_text ) . '</a>' :
						esc_html( $bevro_knowledge_base_doc_link_text )
					);
					?>
				</div>
			</div>
			<?php
		}

		/**
		 * Include Welcome page right side Bevro community content
		 */
		static public function bevro_welcome_page_community_scetion(){
			?>
			<div class="postbox">
				<h2 class="hndle bevro-normal-cusror">
					<span class="dashicons dashicons-groups"></span>
					<span>
						<?php
						printf(
							/* translators: %1$s: Bevro Theme name. */
							esc_html__( 'Join Community', 'bevro' ),
							self::$page_title
						);
						?>
				</h2>
				<div class="inside">
					<p>
						<?php
						printf(
							
							esc_html__( 'Join the community of Generous %1$s users. Get connected, share opinion, ask questions and Help each other!', 'bevro' ),
							self::$page_title
						);
						?>
					</p>
					<?php
					$bevro_community_group_link      = apply_filters( 'bevro_community_group_link', 'https://www.facebook.com/pg/ThemeHunk/community/' );
					$bevro_community_group_link_text = apply_filters( 'bevro_community_group_link_text', __('Join us on Facebook', 'bevro' ) );

					printf(
						
						'%1$s',
						! empty( $bevro_community_group_link ) ? '<a href=' . esc_url( $bevro_community_group_link ) . ' target="_blank" rel="noopener">' . esc_html( $bevro_community_group_link_text ) . '</a>' :
						esc_html( $bevro_community_group_link_text )
					);
					?>
				</div>
			</div>
			<?php
		}
        
        /**
		 * Include Welcome page right side Five Star Support
		 *
		 */
		static public function bevro_welcome_page_five_star_scetion(){
			?>
			<div class="postbox">
				<h2 class="hndle bevro-normal-cusror">
					<span class="dashicons dashicons-sos"></span>
					<span><?php esc_html_e( 'Customer Support', 'bevro' ); ?></span>
				</h2>
				<div class="inside">
					<p>
						<?php
						printf(
							
							esc_html__( 'You\'re absolutely free to contact us and ask any question related to our theme. Our tech team will be happy to help you.', 'bevro' ),
							self::$page_title
						);
						?>
					</p>
					<?php
						$bevro_support_link       = apply_filters( 'bevro_support_link', bevro_get_pro_url( 'https://www.themehunk.com/support/', 'submit-a-ticket', 'welcome-page' ) );
						$bevro_support_link_text  = apply_filters( 'bevro_support_link_text', __( 'Submit a Ticket', 'bevro' ) );

						printf(
							/* translators: %1$s: bevro Knowledge doc link. */
							'%1$s',
							! empty( $bevro_support_link ) ? '<a href=' . esc_url( $bevro_support_link ) . ' target="_blank" rel="noopener">' . esc_html( $bevro_support_link_text ) . '</a>' :
							esc_html( $bevro_support_link_text )
						);
					?>
				</div>
			</div>
			<?php
		}
       
         
		/**
		 * Include Welcome page content
		 *
		 * @since 1.2.4
		 */
		static public function bevro_welcome_page_pro_content(){

			if(bevro_pro_activation_class()=='' ){  

			$bevro_addon_tagline = apply_filters( 'bevro_addon_list_tagline', __( 'Get More Options with Bevro Pro!', 'bevro' ) );
			$bevro_visit_pro_feature_site_url = apply_filters( 'bevro_pro_site_url', 'https://themehunk.com/product/bevro-wordpress-theme/' );
			
			?>
			<div class="postbox">
			
				<h2 class="hndle bevro-normal-cusror">
					<span class="dashicons dashicons-admin-network"></span>
					<span><?php echo esc_html( $bevro_addon_tagline ); ?></span>
				
					<?php do_action( 'bevro_addon_bulk_action' ); ?>
				</h2>
				<div class="inside">
					<p>
                      <?php
						printf(
							esc_html__( 'Want more features and extended functionalities of %1$s.', 'bevro' ),
							self::$page_title
						);
						?>
                  </p>
                      <?php
						$bevro_pro_link       = apply_filters( 'bevro_support_link', bevro_get_pro_url( 'https://themehunk.com/product/bevro-amazing-wordpress-theme/', 'bevro_pro', 'welcome-page' ) );
						$bevro_pro_link_text  = apply_filters( 'bevro_support_link_text', __( 'Go with Bevro Pro', 'bevro' ) );

						printf(
							/* translators: %1$s: bevro Knowledge doc link. */
							'%1$s',
							! empty( $bevro_pro_link ) ? '<a href=' . esc_url( $bevro_pro_link ) . ' target="_blank" rel="noopener">' . esc_html( $bevro_pro_link_text ) . '</a>' :
							esc_html( $bevro_pro_link_text )
						);
					?>
			    </div>
			</div>

			<?php
		}else{

            $settings = Bevro_Ext_White_Label_Markup::get_white_labels();
if($settings['bevro-agency']['hide_branding']==''){
    $extensions = apply_filters(
				'bevro_addon_list',
				array(
					'white-level' => array(
						'title'     => __( 'White Label', 'bevro' ),
						'class'     => 'bvr-addon',
						'title_url' => 'https://themehunk.com/docs/bevro-wordpress-theme/#white-label',
						'links'     => array(
							array(
								'link_class'   => 'bvr-learn-more',
								'link_url'     => esc_url( admin_url( 'themes.php?page=bevro&action=white-label' ) ),
								'link_text'    => __( 'Setting', 'bevro' ),
								'target_blank' => false,
							),
						),
					),
				)
			);
			?>
            <div class="postbox">
			
					<div class="bvr-addon-list-section">
						<?php
						if ( ! empty( $extensions ) ) :
							?>
							
								<div class="bvr-addon-list">
									<?php
									foreach ( (array) $extensions as $addon => $info ) {
										$title_url     = ( isset( $info['title_url'] ) && ! empty( $info['title_url'] ) ) ? 'href="' . esc_url( $info['title_url'] ) . '"' : '';
										$anchor_target = ( isset( $info['title_url'] ) && ! empty( $info['title_url'] ) ) ? "target='_blank' rel='noopener'" : '';

										echo '<div id="' . esc_attr( $addon ) . '"  class="' . esc_attr( $info['class'] ) . '"><a class=" bvr-addon-title"' . $title_url . $anchor_target . ' >' . esc_html( $info['title'] ) . '</a><div class=" bvr-addon-link-wrapper">';

										foreach ( $info['links'] as $key => $link ) {
											printf(
												'<a class="%1$s" %2$s %3$s> %4$s </a>',
												esc_attr( $link['link_class'] ),
												isset( $link['link_url'] ) ? 'href="' . esc_url( $link['link_url'] ) . '"' : '',
												( isset( $link['target_blank'] ) && $link['target_blank'] ) ? 'target="_blank" rel="noopener"' : '',
												esc_html( $link['link_text'] )
											);
										}
										echo '</div></div>';
									}
									?>
								</div>
							
						<?php endif; ?>
					</div>
			</div>
 

		<?php }
		}
	}
		/**
		 * Include Welcome page content
		 */
       static public  function bevro_plugin_setup_api(){
       include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
       network_admin_url( 'plugin-install.php' );
       $recommend_plugins = get_theme_support( 'recommend-plugins' );


       if ( is_array( $recommend_plugins ) && isset( $recommend_plugins[0] ) ){
        foreach($recommend_plugins[0] as $slug=>$plugin){
            $plugin_info = plugins_api( 'plugin_information', array(
                       'slug' => $slug,
                    	'fields' => array(
                        'downloaded'        => false,
                        'sections'          => true,
                        'homepage'          => true,
                        'added'             => false,
                        'compatibility'     => false,
                        'requires'          => false,
                        'downloadlink'      => false,
                        'icons'             => false,
                    )
                ) );
                    $plugin_name = $plugin_info->name;
                    $plugin_slug = $plugin_info->slug;
                    $version = $plugin_info->version;
                    $author = $plugin_info->author;
                    $download_link = $plugin_info->download_link;
                   
            

            $status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_slug );
            $active_file_name = $plugin_slug . '/' . $plugin_slug . '.php';
            $button_class = 'install-now button '.$plugin_slug;

             if ( is_plugin_active( $active_file_name ) ) {
                   $button_class = 'button disabled '.$plugin_slug;
                   $button_txt = esc_html__( 'Plugin Activated', 'bevro' );
                   $detail_link = $install_url = '';

        }

            if ( ! is_plugin_active( $active_file_name ) ){
		            $button_txt = esc_html__( 'Install Now', 'bevro' );
		            if ( ! $status ) {
		                $install_url = wp_nonce_url(
		                    add_query_arg(
		                        array(
		                            'action' => 'install-plugin',
		                            'plugin' => $plugin_slug
		                        ),
		                        network_admin_url( 'update.php' )
		                    ),
		                    'install-plugin_'.$plugin_slug
		                );

		            } else {
		                $install_url = add_query_arg(array(
		                    'action' => 'activate',
		                    'plugin' => rawurlencode( $active_file_name ),
		                    'plugin_status' => 'all',
		                    'paged' => '1',
		                    '_wpnonce' => wp_create_nonce('activate-plugin_' . $active_file_name ),
		                ), network_admin_url('plugins.php'));
		                $button_class = 'activate-now button-primary '.$plugin_slug;
		                $button_txt = esc_html__( 'Activate Now', 'bevro' );
		            }
		                $detail_link = add_query_arg(
		                array(
		                    'tab' => 'plugin-information',
		                    'plugin' => $plugin_slug,
		                    'TB_iframe' => 'true',
		                    'width' => '772',
		                    'height' => '349',

		                ),
		                network_admin_url( 'plugin-install.php' )
		            );

                }

				$detail = '';
                echo '<div class="rcp">';
                echo '<h4 class="rcp-name">';
                echo esc_html( $plugin_name );
                echo '</h4>';
				if($plugin_slug=='contact-form-7'){
				echo'<img src="'.esc_url( BEVRO_THEME_URI . 'lib/theme-option/assets/images/contact-form-7.png' ).'" />'; 
		        $detail='Contact Form 7 can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup';
                }elseif($plugin_slug=='one-click-demo-import'){
                	echo'<img src="'.esc_url( BEVRO_THEME_URI . 'lib/theme-option/assets/images/one-click-demo-import.png' ).'" />'; 
		        $detail= 'Import your demo content, widgets and theme settings with one click. Theme authors! Enable simple demo import for your theme demo data.';
                }elseif($plugin_slug=='woocommerce'){
                	echo'<img src="'.esc_url( BEVRO_THEME_URI . 'lib/theme-option/assets/images/woocommerce.png' ).'" />'; 
                $detail='WooCommerce is a free eCommerce plugin that allows you to sell anything, beautifully.';
                }elseif($plugin_slug=='elementor'){
                	 echo'<img src="'.esc_url( BEVRO_THEME_URI . 'lib/theme-option/assets/images/elementor.png' ).'" />'; 
                $detail='The most advanced frontend drag & drop page builder. Create high-end, pixel perfect websites at record speeds. Any theme, any page, any design.';
                }
			    echo '<p class="rcp-detail">'.esc_html($detail).' </p>';
                echo '<p class="action-btn plugin-card-'.esc_attr( $plugin_slug ).'">
                        <span>Version:'.esc_html($version).'</span>
                        '.$author.'
                        | <a class="plugin-detail thickbox open-plugin-details-modal" href="'.esc_url( $detail_link ).'">'.esc_html__( 'Details', 'bevro' ).'</a>
                </p>';
                echo'<button data-activated="Plugin Activated" data-msg="Activating Plugin" data-init="'.esc_attr($active_file_name).'" data-slug="'.esc_attr( $plugin_slug ).'" class="button '.esc_attr( $button_class ).'">'.esc_html($button_txt).'</button>';
                echo '</div>';
        }
    }
}
		/**
		 * Update Admin Title.
		 *
		 * @since 1.0.19
		 *
		 * @param string $admin_title Admin Title.
		 * @param string $title Title.
		 * @return string
		 */
		static public function bevro_admin_title( $admin_title, $title ){

			$screen = get_current_screen();
			if ( 'appearance_page_bevro' == $screen->id ) {

				$view_actions = self::get_view_actions();

				$current_slug = isset( $_GET['action'] ) ? esc_attr( $_GET['action'] ) : self::$current_slug;
				$active_tab   = str_replace( '_', '-', $current_slug );

				if ( 'general' != $active_tab && isset( $view_actions[ $active_tab ]['label'] ) ) {
					$admin_title = str_replace( $title, $view_actions[ $active_tab ]['label'], $admin_title );
				}
			}

			return $admin_title;
		}

        /**
		 * Bevro Header Right Section Links
		 *
		 * @since 1.2.4
		 */
		static public function top_header_right_section(){

			$top_links = apply_filters(
				'bevro_header_top_links',
				array(
					'bevro-theme-info' => array(
						'title' => __( 'Easy to use, Fully Customizable, Unique options', 'bevro' ),
					),
				)
			);

			if ( ! empty( $top_links ) ) {
				?>
				<div class="bevro-top-links">
					<ul>
						<?php
						foreach ( (array) $top_links as $key => $info ) {
							/* translators: %1$s: Top Link URL wrapper, %2$s: Top Link URL, %3$s: Top Link URL target attribute */
							printf(
								'<li><%1$s %2$s %3$s > %4$s </%1$s>',
								isset( $info['url'] ) ? 'a' : 'span',
								isset( $info['url'] ) ? 'href="' . esc_url( $info['url'] ) . '"' : '',
								isset( $info['url'] ) ? 'target="_blank" rel="noopener"' : '',
								esc_html( $info['title'] )
							);
						}
						?>
						</ul>
					</div>
				<?php
			}
		}
      
		 /*
		  * Plugin install
		  * Active plugin
		  * Setup Homepage
		  */
		public function bevro_activeplugin(){
				$init = isset($_POST['init'])?$_POST['init']:'';
				$slug = isset($_POST['slug']) && $_POST['slug']=='one-click-demo-import';
		        activate_plugin( $init, '', false, true );
			       			wp_die(); 

		}
		
         /**
		 * Required Plugin Activate
		 *
		 * @since 1.2.4
		 */
		static public function required_plugin_activate() {

			if ( ! current_user_can( 'install_plugins' ) || ! isset( $_POST['init'] ) || ! $_POST['init'] || ! isset( $_POST['init1'] ) || ! $_POST['init1'] ) {
				wp_send_json_error(
					array(
						'success' => false,
						'message' => __( 'No plugin specified', 'bevro' ),
					)
				);
			}

			$plugin_init = ( isset( $_POST['init'] ) ) ? esc_attr( $_POST['init'] ) : '';
			$plugin_init1 = ( isset( $_POST['init1'] ) ) ? esc_attr( $_POST['init1'] ) : '';

			$activate = activate_plugin( $plugin_init, '', false, true );
            $activate1 = activate_plugin( $plugin_init1, '', false, true );
			if ( is_wp_error( $activate ) ) {
				wp_send_json_error(
					array(
						'success' => false,
						'message' => $activate->get_error_message(),
					)
				);
			}
			if ( is_wp_error( $activate1 ) ) {
				wp_send_json_error(
					array(
						'success' => false,
						'message' => $activate1->get_error_message(),
					)
				);
			}

			wp_send_json_success(
				array(
					'success' => true,
					'message' => __( 'Plugin Successfully Activated', 'bevro' ),
				)
			);

		}

	}
   new Bevro_Admin_Settings;
}