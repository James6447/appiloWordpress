/*****************************************************************************/
/**********************customizer control setting*************************/
/*****************************************************************************/
( function( $ ) {
//**********************************/
// Footer widget hide and show settings
//**********************************/
ZTAControlTrigger.addHook( 'bevro-toggle-control', function( argument, api ){
		ZTACustomizerToggles ['bevro_bottom_footer_widget_layout'] = [
			{
				controls: [
					
					'bevro_footer_widget_content_width',
					'bevro_bottom_footer_widget_redirect',
					'bevro_bottom_footer_widget_color_scheme'
				],
				callback: function(layout){
					if ('ft-wgt-none'== layout){
						return false;
					}
					return true;
				}
			},
				
		];	
 });
})( jQuery );
