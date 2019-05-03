<?php
/**
 * Customizer Control: sortable.
 *
 * @package Themehunk
 * @subpackage  Bevro
 * @since 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ){
	exit;
}
if ( ! class_exists( 'WP_Customize_Control' ) ){
	return;
}
/**
 * Sortable control (uses checkboxes).
 */
class Bevro_Control_Sortable extends WP_Customize_Control{

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'brv-sortable';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {

		$css_uri = BEVRO_THEME_URI . 'customizer/sortable/';
		$js_uri  = BEVRO_THEME_URI . 'customizer/sortable/';

		wp_enqueue_script( 'bevro-sortable-js', $js_uri . 'sortable.js', array( 'jquery', 'customize-base', 'jquery-ui-core', 'jquery-ui-sortable' ), BEVRO_THEME_VERSION, true );
		wp_enqueue_style( 'bevro-sortable-css', $css_uri . 'sortable.css', null, BEVRO_THEME_VERSION );

	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {

		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}

		$this->json['id']         = $this->id;
		$this->json['link']       = $this->get_link();
		$this->json['value']      = maybe_unserialize( $this->value() );
		$this->json['choices']    = $this->choices;
		$this->json['inputAttrs'] = '';

		foreach ( $this->input_attrs as $attr => $value ){
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}
		$this->json['inputAttrs'] = maybe_serialize( $this->input_attrs() );

	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<label class='brv-sortable'>
			<span class="customize-control-title">
				{{{ data.label }}}
			</span>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>

			<ul class="sortable">
				<# _.each( data.value, function( choiceID ) { #>
					<li {{{ data.inputAttrs }}} class='brv-sortable-item' data-value='{{ choiceID }}'>
						<i class='dashicons dashicons-menu'></i>
						<i class="dashicons dashicons-visibility visibility"></i>
						{{{ data.choices[ choiceID ] }}}
					</li>
				<# }); #>
				<# _.each( data.choices, function( choiceLabel, choiceID ) { #>
					<# if ( -1 === data.value.indexOf( choiceID ) ) { #>
						<li {{{ data.inputAttrs }}} class='brv-sortable-item invisible' data-value='{{ choiceID }}'>
							<i class='dashicons dashicons-menu'></i>
							<i class="dashicons dashicons-visibility visibility"></i>
							{{{ data.choices[ choiceID ] }}}
						</li>
					<# } #>
				<# }); #>
			</ul>
		</label>

		<?php
	}

	/**
	 * Render the control's content.
	 *
	 * @see WP_Customize_Control::render_content()
	 */
	 protected function render_content() {}
}
