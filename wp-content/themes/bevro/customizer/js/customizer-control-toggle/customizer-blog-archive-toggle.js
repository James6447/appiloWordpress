/*************************************/
// Blog Archive Hide and Show control
/*************************************/
( function( $ ){
ZTAControlTrigger.addHook( 'bevro-toggle-control', function( argument, api ){
ZTACustomizerToggles ['bevro_blog_layout'] = [
		    {
				controls: [    
				'bevro_blog_grid_layout',
				'bevro-settings[bevro-blog-structure-meta]',
				'bevro_blog_img_rmv_space' 
				],
				callback: function(layout){
					if((layout == 'brv-blog-layout-1')){
					return true;
					}
					return false;
				}
			},
				
		];

  });
  ZTACustomizerToggles ['bevro_date_box'] = [
		    {
				controls: [    
				'bevro_datebox_style'
				],
				callback: function(layout){
					if(layout==1){
					return true;
					}
					return false;
				}
			},	
		];
ZTACustomizerToggles ['bevro_blog_post_content'] = [
		    {
				controls: [    
				'bevro_blog_expt_length',
				'bevro_blog_read_more_txt',
				'bevro_main_read_more_btn'
				],
				callback: function(layout){
					if(layout=='full'||layout=='nocontent'){
					return false;
					}
					return true;
				}
			},	
		];	
 ZTACustomizerToggles ['bevro_blog_post_pagination'] = [
		    {
				controls: [    
				'bevro_load_more_txt'
				],
				callback: function(layout){
					if(layout=='num' || layout=='scroll'){
					return false;
					}
					return true;
				}
			},	
		];
  ZTACustomizerToggles ['bevro_blog_content_width'] = [
		    {
				controls: [    
				'bevro_blog_cnt_widht'
				],
				callback: function(layout){
					if(layout=='custom'){
					return true;
					}
					return false;
				}
			},	
		];
 ZTACustomizerToggles ['bevro_blog_grid_layout'] = [
		    {
				controls: [    
				'bevro_blog_highlight'
				],
				callback: function(layout){
					if(layout!=='brv-one-colm'){
					return true;
					}
					return false;
				}
			},	
		];
})( jQuery );