/****************/
// Main header	
/****************/
( function( $ ) {
//**********************************/
// container hide and show settings
//**********************************/
ZTAControlTrigger.addHook( 'bevro-toggle-control', function( argument, api ){
		ZTACustomizerToggles ['bevro_main_header_set'] = [
		    {
				controls: [    
				'bevro_main_header_texthtml',
				'bevro_mian_header_widget_redirect',
				'bevro_mian_header_social_media_redirect',
				'bevro_main_header_btn_txt',
				'bevro_main_header_btn_url'   
				],
				callback: function(custommenu){
					if (custommenu =='none'){
					return false;
					}
					return true;
				}
			},	
			 {
				controls: [    
				'bevro_main_header_texthtml',   
				],
				callback: function(custommenu){
					if (custommenu =='text'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'bevro_mian_header_widget_redirect',   
				],
				callback: function(custommenu){
					if (custommenu =='widget'){
					return true;
					}
					return false;
				}
			},	
			{
				controls: [    
				'bevro_mian_header_social_media_redirect',   
				],
				callback: function(custommenu){
					if (custommenu =='social'){
					return true;
					}
					return false;
				}
			},	
			{
				controls: [    
				'bevro_main_header_btn_txt',
				'bevro_main_header_btn_url' 
				],
				callback: function(custommenu){
					if (custommenu =='button'){
					return true;
					}
					return false;
				}
			},	
		];
		ZTACustomizerToggles ['bevro_main_header_layout'] = [
		    {
				controls: [    
				'bevro_mobile_menu_open', 
				'bevro_main_header_menu_align',
				'bevro_main_header_mobile_txt'
				],
				callback: function(custommenu){
					if (custommenu =='mhdrleftpan' || custommenu =='mhdrrightpan' || custommenu =='mhdminbarleft' || custommenu =='mhdminbarright'){
					return false;
					}
					return true;
				}
			},	
			 
		];	
  });
})( jQuery );