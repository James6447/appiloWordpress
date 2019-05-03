<?php
/**
 * Customizer Custom function.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */
/**
 * Sanitization for textarea field
 */
function bevro_sanitize_textarea( $input ){
    global $allowedposttags;
    $output = wp_kses( $input, $allowedposttags );
    return $output;
}
function bevro_sanitize_text( $string ){
    return wp_kses_post( balanceTags( $string ) );
}
/**
 * Returns a sanitized filepath if it has a valid extension.
 */
function bevro_sanitize_upload( $upload ) {
    $return = '';
    $fype = wp_check_filetype( $upload );
    if ( $fype["ext"] ) {
        $return = esc_url_raw( $upload );
    }
    return $return;
}
/**
 * Checkbox sanitization callback
 *
 */
function bevro_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
/**
 * Select sanitization callback
 */
function bevro_sanitize_select( $input, $setting ) {
    // Ensure input is a slug.
    $input = sanitize_key( $input );
    
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
    
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
/**
 * Color sanitization callback
 *
 * @since 1.2.1
 */
function bevro_sanitize_color( $color ) {
    if ( empty( $color ) || is_array( $color ) ) {
        return '';
    }

    // If string does not start with 'rgba', then treat as hex.
    // sanitize the hex color and finally convert hex to rgba
    if ( false === strpos( $color, 'rgba' ) ) {
        return sanitize_hex_color( $color );
    }

    // By now we know the string is formatted as an rgba color so we need to further sanitize it.
    $color = str_replace( ' ', '', $color );
    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

    return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
}
/**
 * vaild int.
 */
function bevro_sanitize_int( $input ){
$return = absint($input);
    return $return;
}
// Multiple Checkbox Show
function bevro_checkbox_explode( $values ){
    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;
    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}
// Multiple Checkbox Show
function bevro_sanitize_number( $val, $setting ){

            $input_attrs = $setting->manager->get_control( $setting->id )->input_attrs;

            if ( isset( $input_attrs ) ) {

                $input_attrs['min']  = isset( $input_attrs['min'] ) ? $input_attrs['min'] : 0;
                $input_attrs['step'] = isset( $input_attrs['step'] ) ? $input_attrs['step'] : 1;

                if ( isset( $input_attrs['max'] ) && $val > $input_attrs['max'] ) {
                    $val = $input_attrs['max'];
                } elseif ( $val < $input_attrs['min'] ) {
                    $val = $input_attrs['min'];
                }

                        $dv = $val / $input_attrs['step'];

                        $dv = round( $dv );

                        $val = $dv * $input_attrs['step'];

                    $val = number_format( (float) $val, 2, '.', '' );
                if ( $val == (int) $val ) {
                    $val = (int) $val;
                }
            }

            return is_numeric( $val ) ? $val : 0;
        }
// MULTI-CHOICE
function bevro_sanitize_multi_choices( $input, $setting ){

      // Get list of choices from the control
      // associated with the setting.
      $choices    = $setting->manager->get_control( $setting->id )->choices;
      $input_keys = $input;

      foreach ( $input_keys as $key => $value ){
        if ( ! array_key_exists( $value, $choices ) ){
          unset( $input[ $key ] );
        }
      }

      // If the input is a valid key, return it;
      // otherwise, return the default.
      return ( is_array( $input ) ? $input : $setting->default );
    }

/**
 * Default color picker palettes
 */
if ( ! function_exists( 'bevrowp_default_color_palettes' ) ){
    function bevrowp_default_color_palettes() {
    $palettes = array(
            '#000000',
            '#ffffff',
            '#dd3333',
            '#dd9933',
            '#eeee22',
            '#81d742',
            '#1e73be',
            '#8224e3',
        );
        // Apply filters and return
        return apply_filters( 'bevro_default_color_palettes', $palettes );

    }

}
// Bevro_Customizer_Sanitizes
if ( ! class_exists( 'Bevro_Customizer_Sanitizes' ) ){
    /**
     * Customizer Sanitizes Initial setup
     */
    class Bevro_Customizer_Sanitizes {

        /**
         * Instance
         *
         * @access private
         * @var object
         */
        private static $instance;

        /**
         * Initiator
         */
        public static function get_instance(){
            if ( ! isset( self::$instance ) ){
                self::$instance = new self;
            }
            return self::$instance;
        }
        /**
         * Constructor
         */
        public function __construct() { }
        /**
         * Sanitize responsive  Spacing
         *
         * @param  number $val Customizer setting input number.
         * @return number        Return number.
         * @since  1.2.1
         */
        static public function bevro_sanitize_responsive_spacing( $val ) {

            $spacing = array(
                'desktop'      => array(
                    'top'    => '',
                    'right'  => '',
                    'bottom' => '',
                    'left'   => '',
                ),
                'tablet'       => array(
                    'top'    => '',
                    'right'  => '',
                    'bottom' => '',
                    'left'   => '',
                ),
                'mobile'       => array(
                    'top'    => '',
                    'right'  => '',
                    'bottom' => '',
                    'left'   => '',
                ),
                'desktop-unit' => 'px',
                'tablet-unit'  => 'px',
                'mobile-unit'  => 'px',
            );

            if ( isset( $val['desktop'] ) ) {
                $spacing['desktop'] = array_map(
                    function ( $value ) {
                            return ( is_numeric( $value ) && $value >= 0 ) ? $value : '';
                    }, $val['desktop']
                );

                $spacing['tablet'] = array_map(
                    function ( $value ) {
                            return ( is_numeric( $value ) && $value >= 0 ) ? $value : '';
                    }, $val['tablet']
                );

                $spacing['mobile'] = array_map(
                    function ( $value ) {
                            return ( is_numeric( $value ) && $value >= 0 ) ? $value : '';
                    }, $val['mobile']
                );

                if ( isset( $val['desktop-unit'] ) ) {
                    $spacing['desktop-unit'] = $val['desktop-unit'];
                }

                if ( isset( $val['tablet-unit'] ) ) {
                    $spacing['tablet-unit'] = $val['tablet-unit'];
                }

                if ( isset( $val['mobile-unit'] ) ) {
                    $spacing['mobile-unit'] = $val['mobile-unit'];
                }

                return $spacing;

            } else {
                foreach ( $val as $key => $value ) {
                    $val[ $key ] = is_numeric( $val[ $key ] ) ? $val[ $key ] : '';
                }
                return $val;
            }

        }

    }

}
Bevro_Customizer_Sanitizes::get_instance();
function bevro_customize_function_register( $wp_customize ){
/**
 * Multiple checkbox customize control class.
 *
 * @since  1.0.0
 * @access public
 */
class Bevro_Customize_Control_Checkbox_Multiple extends WP_Customize_Control{
    /**
     * The type of customize control being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'checkbox-multiple';

    /**
     * Enqueue scripts/styles.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function enqueue(){
       
    }

    /**
     * Displays the control content.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function render_content(){

        if ( empty( $this->choices ) ){
            return;   }
            ?>
      

        <?php if ( !empty( $this->label ) ) : ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php endif; ?>
        <?php if ( !empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo $this->description; ?></span>
        <?php endif; ?>
        <?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>
        <ul>
            <?php foreach ( $this->choices as $value => $label ) : ?>

                <li>
                    <label>
                        <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> /> 
                        <?php echo esc_html( $label ); ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
    <?php }
}
/**
 *widget-redirect
 *
 */
class Bevro_Widegt_Redirect extends WP_Customize_Control{
    /**
     * Control id
     *
     * @var string $id Control id.
     */
    public $id = '';

    /**
     * Button class.
     *
     * @var mixed|string
     */
    public $button_class = '';

    /**
     * Icon class.
     *
     * @var mixed|string
     */
    public $icon_class = '';

    /**
     * Button text.
     *
     * @var mixed|string
     */
    public $button_text = '';

    /**
     * Hestia_Display_Text constructor.
     *
     * @param WP_Customize_Manager $manager Customizer manager.
     * @param string               $id Control id.
     * @param array                $args Argument.
     */
    public function __construct( $manager, $id, $args = array() ) {
        parent::__construct( $manager, $id, $args );
        $this->id = $id;
        if ( ! empty( $args['button_class'] ) ) {
            $this->button_class = $args['button_class'];
        }
        if ( ! empty( $args['icon_class'] ) ) {
            $this->icon_class = $args['icon_class'];
        }
        if ( ! empty( $args['button_text'] ) ) {
            $this->button_text = $args['button_text'];
        }
    }

    /**
     * Render content for the control.
     *
     * @since Hestia 1.1.42
     */
    public function render_content() {
        if ( ! empty( $this->button_text ) ) {
            echo '<button type="button" class="button menu-shortcut ' . esc_attr( $this->button_class ) . '" tabindex="0">';
            if ( ! empty( $this->button_class ) ) {
                echo '<span class="dashicons dashicons-admin-generic" style="margin-right: 10px;margin-top:3PX;
    color:#999;"></span>';
            }
                echo esc_html( $this->button_text );
            echo '</button>';
        }
    }
}
// divider
    class Bevro_Misc_Control extends WP_Customize_Control{
    public function render_content(){
        switch ( $this->type ){
            default:

            case 'heading':
                echo '<span class="customize-control-title">' .$this->title. '</span>';
                break;

            case 'custom_message' :
                echo '<p class="description">' .$this->description. '</p>';
                break;

            case 'hr' :
                echo '<hr />';
                break;
        }
    }
}
$wp_customize->register_panel_type( 'Bevro_WP_Customize_Panel' );
$wp_customize->register_section_type( 'Bevro_WP_Customize_Section' );
$wp_customize->register_section_type( 'Bevro_WP_Customizer_Range_Value_Control' );
$wp_customize->register_section_type( 'Bevro_Customizer_Color_Control' );
$wp_customize->register_section_type( 'Bevro_Customizer_Buttonset_Control' );
$wp_customize->register_section_type( 'Bevro_Control_Sortable' );
$wp_customize->register_section_type( 'Bevro_WP_Customize_Control_Radio_Image' );
}
add_action('customize_register','bevro_customize_function_register');
function bevro_customizer_script_registers(){
wp_enqueue_script( 'bevro_customizer_script', get_template_directory_uri() .'/customizer/extend-customizer/extend-js/extend-customizer.js', array("jquery"), '', true );  
wp_enqueue_script( 'bevro_custom_customizer_script', get_template_directory_uri() . '/customizer/js/customizer.js', array("jquery"), '', true  );
wp_enqueue_script( 'bevro_customizer_toggle_script', get_template_directory_uri() . '/customizer/js/customizer-toogle.js', array("jquery"), '', true  );
wp_enqueue_script( 'bevro_customizer_toggle_script_above_header', get_template_directory_uri() . '/customizer/js/customizer-control-toggle/customize-above-header-toggle.js', array("jquery"), '', true  );
wp_enqueue_script( 'bevro_customizer_toggle_script_main_header', get_template_directory_uri() . '/customizer/js/customizer-control-toggle/customize-main-header-toggle.js', array("jquery"), '', true  );
wp_enqueue_script( 'bevro_customizer_toggle_script_bottom_header', get_template_directory_uri() . '/customizer/js/customizer-control-toggle/customize-bottom-header-toggle.js', array("jquery"), '', true  );
wp_enqueue_script( 'bevro_customizer_toggle_script_sidebar', get_template_directory_uri() . '/customizer/js/customizer-control-toggle/customize-sidebar-toggle.js', array("jquery"), '', true  );
wp_enqueue_script( 'bevro_customizer_toggle_script_blog_archive', get_template_directory_uri() . '/customizer/js/customizer-control-toggle/customizer-blog-archive-toggle.js', array("jquery"), '', true  );
wp_enqueue_script( 'bevro_customizer_toggle_script_blog_single', get_template_directory_uri() . '/customizer/js/customizer-control-toggle/customizer-blog-single-toggle.js', array("jquery"), '', true  );
wp_enqueue_script( 'bevro_customizer_toggle_script_above_footer', get_template_directory_uri() . '/customizer/js/customizer-control-toggle/customize-above-footer-toggle.js', array("jquery"), '', true  );
wp_enqueue_script( 'bevro_customizer_toggle_script_widget_footer', get_template_directory_uri() . '/customizer/js/customizer-control-toggle/customize-footer-widget-toggle.js', array("jquery"), '', true  );
wp_enqueue_script( 'bevro_customizer_toggle_script_bottom_footer', get_template_directory_uri() . '/customizer/js/customizer-control-toggle/customzier-bottom-footer-toggle.js', array("jquery"), '', true  );
// woocoomerce-toogle
if (class_exists( 'WooCommerce' ) ) :
    wp_enqueue_script( 'bevro_customizer_toggle_script_product_single', get_template_directory_uri() . '/inc/woocommerce/customizer/js/customizer-toggle-control/customizer-product-single-toggle.js', array("jquery"), '', true  );
endif;
// select font typography
wp_enqueue_script( 'bevro-select-script', get_template_directory_uri() . '/customizer/customizer-font-selector/js/select.js', array( 'jquery' ), '1.0.0', true );
wp_enqueue_script( 'bevro-typography-js', get_template_directory_uri() . '/customizer/customizer-font-selector/js/typography.js', array( 'jquery', 'bevro-select-script' ), '1.0.0', true );
}
function bevro_customizer_style_registers(){
    wp_enqueue_style('bevro_customizer_styles', get_template_directory_uri() .'/customizer/extend-customizer/extend-css/extend-customizer.css');
    // font select typography
    wp_enqueue_style('bevro-select-style', get_template_directory_uri(). '/customizer/customizer-font-selector/css/select.css', null, '1.0.0');
    wp_enqueue_style('bevro-typography', get_template_directory_uri() . '/customizer/customizer-font-selector/css/typography.css', null);
}
add_action('customize_controls_print_styles', 'bevro_customizer_style_registers');
add_action('customize_controls_enqueue_scripts', 'bevro_customizer_script_registers' );
/**
 * Used by hook: 'customize_preview_init'
 * 
 * @see add_action('customize_preview_init',$func)
 */
function bevro_customizer_live_preview(){
//Update variables.
Bevro_Theme_Options::refresh();    
wp_enqueue_script( 'bevro_live_customizer', get_template_directory_uri().'/customizer/js/live-customizer.js', array("jquery"),'', true );  
}
add_action('customize_preview_init','bevro_customizer_live_preview');