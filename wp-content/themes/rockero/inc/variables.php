<?php

$rockeroPostsPagesArray = array(
	'select' => __('Select a post/page', 'rockero'),
);

$rockeroPostsPagesArgs = array(
	
	// Change these category SLUGS to suit your use.
	'ignore_sticky_posts' => 1,
	'post_type' => array('post', 'page'),
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	
);
$rockeroPostsPagesQuery = new WP_Query( $rockeroPostsPagesArgs );
	
if ( $rockeroPostsPagesQuery->have_posts() ) :
							
	while ( $rockeroPostsPagesQuery->have_posts() ) : $rockeroPostsPagesQuery->the_post();
			
		$rockeroPostsPagesId = get_the_ID();
		if(get_the_title() != ''){
				$rockeroPostsPagesTitle = get_the_title();
		}else{
				$rockeroPostsPagesTitle = get_the_ID();
		}
		$rockeroPostsPagesArray[$rockeroPostsPagesId] = $rockeroPostsPagesTitle;
	   
	endwhile; wp_reset_postdata();
							
endif;

$rockeroYesNo = array(
	'select' => __('Select', 'rockero'),
	'yes' => __('Yes', 'rockero'),
	'no' => __('No', 'rockero'),
);

$rockeroSliderType = array(
	'select' => __('Select', 'rockero'),
	'header' => __('WP Custom Header', 'rockero'),
	'owl' => __('Owl Slider', 'rockero'),
);

$rockeroServiceLayouts = array(
	'select' => __('Select', 'rockero'),
	'one' => __('One', 'rockero'),
	'two' => __('Two', 'rockero'),
);

$rockeroAvailableCats = array( 'select' => __('Select', 'rockero') );

$rockero_categories_raw = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, ) );

foreach( $rockero_categories_raw as $category ){
	
	$rockeroAvailableCats[$category->term_id] = $category->name;
	
}

$rockeroBusinessLayoutType = array( 
	'select' => __('Select', 'rockero'), 
	'seven' => __('Seven', 'rockero'),
	'woo-one' => __('Woocommerce One', 'rockero'),
);
