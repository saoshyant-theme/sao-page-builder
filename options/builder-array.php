<?php
 
function sao_all_image_sizes() {
    global $_wp_additional_image_sizes;

    $default_image_sizes = get_intermediate_image_sizes();

    foreach ( $default_image_sizes as $size ) {
        $image_sizes[ $size ][ 'width' ] = intval( get_option( "{$size}_size_w" ) );
        $image_sizes[ $size ][ 'height' ] = intval( get_option( "{$size}_size_h" ) );
        $image_sizes[ $size ][ 'crop' ] = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
    }

    if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
        $image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
    }

 	
	 
 	$image = array();
  	foreach ($image_sizes as $key => $value) {
     	$image[esc_html($key)] = esc_html($key).' '.$value['width'].' x '.$value['height'];
	}	
 	$image['full'] = 'Full';
	 
	return $image;	
	
	
}
function sao_array_options($value) {
	
 
	global $wp_registered_sidebars;
 	$sidebar_options = array();
  	$sidebar_options_obj = $wp_registered_sidebars;
  	if(!empty($sidebar_options_obj)){
		foreach ($sidebar_options_obj as $side) {
			$sidebar_options[$side['id']] = $side['name'];
		}
	}
 
	$options['sidebars'] = $sidebar_options;

 	$options['post_type']= array(
		'posts'				=>	__('Posts','sao'),
 		'slides'			=>	__('Custom Slides','sao'),
	);	 
	 
	$options_sliders = array();
	$options_sliders_obj = get_categories('taxonomy=sao_sliders&type=sao_slides'); 
 	foreach ($options_sliders_obj as $slider) {
    	$options_sliders[$slider->cat_ID] = $slider->cat_name;
	}	 
	 
	$options['sliders'] = $options_sliders;
	  
 	$options['sidebar']= $sidebar_options;  
	$options_categories = array();
	$options_categories_obj = get_categories();
 	$options_categories['']=esc_html__('All Categories','sao');
	 	 
 	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	$options['cats']= $options_categories;
	$options['attachment']= array(
		'medium' ,	
		'url' ,	
		'title' ,		
		'caption' ,		
		'alt' ,		
		'description' ,		
		'width' ,		
		'height' ,		
		
	);
	
	$options['attachment_thumbnail']= array(
		'thumbnail' ,	
		'url' ,	
		'title' ,		
		'caption' ,		
		'alt' ,		
		'description' ,		
		'width' ,		
		'height' ,		
		
	);
 
  
 	$options['size1']= array(
 		'sao-img-medium'				=>	esc_html__('Medium','sao'), 
		'sao-img-large'				=>	esc_html__('Large','sao'), 
		
	);
	
	
	
 
 
 	$options['size2']= array(
		'sao-img-small'				=>	esc_html__('Small','sao'),
		'sao-img-medium'				=>	esc_html__('Medium','sao'), 
		'sao-img-large'				=>	esc_html__('Large','sao'), 
		
	);		
	
 
 	$options['height']= array(
		'200'				=>	'200px',
		'300'				=>	'300px',
		'400'				=>	'400px',
		'500'				=>	'500px', 
		'600'				=>	'600px',
		'700'				=>	'700px',
		'800'				=>	'800px',
		
	);
		
 
 	$options['height_content']= array(
		'sao-300px'				=>	'300px',
		'sao-400px'				=>	'400px',
		'sao-500px'				=>	'500px', 
		'sao-600px'				=>	'600px',
		
	);	
 
	$options['orderby']= array(
 		''							=>	esc_html__('Recent Posts','sao'),
		'rand'						=>	esc_html__('Randam','sao'),
		'rand-day'					=>	esc_html__('Randam - 1 day ago','sao'),
		'rand-week'					=>	esc_html__('Randam - 1 week ago','sao'),
		'rand-month'				=>	esc_html__('Randam - 1 month ago','sao'),
		'rand-year'					=>	esc_html__('Randam - 1 year ago','sao'),
		'most-comment'				=>	esc_html__('Most Comments ','sao'),
		'most-comment-day'			=>	esc_html__('Most Comments 1 day ago','sao'),
		'most-comment-week'			=>	esc_html__('Most Comments 1 week ago','sao'),
		'most-comment-month'		=>	esc_html__('Most Comments 1 month ago','sao'),
		'most-comment-year'			=>	esc_html__('Most Comments 1 year ago','sao'),		
		'views'						=>	esc_html__('Most Views','sao'),
		'views-day'					=>	esc_html__('Most Views - 1 day ago','sao'),
		'views-week'				=>	esc_html__('Most Views - 1 week ago','sao'),
		'views-month'				=>	esc_html__('Most Views - 1 month ago','sao'),
		'views-year'				=>	esc_html__('Most Views - 1 year ago','sao'),
	); 

	$options['meta']= array(
		'comments'				=>	esc_html__('Comments','sao'), 
  		'view'					=>	esc_html__('Views','sao'),
 		'date'					=>	esc_html__('Date','sao'), 
  		'author'				=>	esc_html__('Author','sao'), 
 		
	); 
	$options['ratio1']= array(
		'sao-ratio40f'				=>	esc_html__('5/2','sao'),
		'sao-ratio60f'				=>	esc_html__('16/9','sao')  
		
	);
	
	$options['ratio2']= array(
		'sao-ratio60'				=>	esc_html__('16/9','sao'),
		'sao-ratio75'				=>	esc_html__('4/3','sao')  
		
	);
	
 	
	
	$options['ratio3']= array(
		'sao-ratio60'				=>	esc_html__('16/9','sao'),
		'sao-ratio75'				=>	esc_html__('4/3','sao'), 
		'sao-ratio100'				=>	esc_html__('1/1','sao') , 
		
		
	);

	$options['ratio4']= array(
 		''				=>	esc_html__('Default','sao'),
 		'sao-ratio60'				=>	esc_html__('16/9','sao'),
		'sao-ratio75'				=>	esc_html__('4/3','sao'), 
		'sao-ratio100'				=>	esc_html__('1/1','sao') ,
		'sao-ratio135'				=>	esc_html__('3/5','sao') ,
 	);
			
	
	$options['effect']= array(

		'slide'					=>	esc_html__('Slide','sao'),
		'fade'					=>	esc_html__('Fade','sao'), 
	); 
 	$options['background_thumb']= array(
		'none'					=>	esc_html__('None','sao'),
		'light'					=>	esc_html__('Light','sao'), 
		'dark'					=>	esc_html__('Dark','sao'), 
	);

 	$options['unit']= array(
		'px'				=>	'px',
		'%'					=>	'%', 
		'in'				=>	'in',
		'cm'				=>	'cm',
		'mm'				=>	'mm',
		'em'				=>	'em',
		'ex'				=>	'ex',
		'pt'				=>	'pt',
		'pc'				=>	'pc',
		'rem'				=>	'rem',
 		
	);
	
	$options['width']= array(
		''						=>	esc_html__('Default','sao'), 
		'1000px'				=>	'1000px',
		'1100px'				=>	'1100px',
		'1200px'				=>	'1200px',
		'1300px'				=>	'1300px',
		'1400px'				=>	'1400px',
 		'1600px'				=>	'1600px',
 		'1920px'				=>	'1920px',
 		'100%'				=>	esc_html__('Full Wight','sao'),
 		
	);	
	
	$options['heading']= array(
		''					=>esc_html__('Default','sao'), 
		'h1'				=> 'h1', 
		'h2'				=> 'h2', 
		'h3'				=> 'h3', 
		'h4'				=> 'h4', 
		'h5'				=> 'h5', 
		'h6'				=> 'h6', 
  		
	);	
	
	$options['list_col']= array(
 		'1'				=> '1', 
		'2'				=> '2', 
		'3'				=> '3', 
		'4'				=> '4', 
		'5'				=> '5', 
		'6'				=> '6', 
 		'7'				=> '7', 
		'8'				=> '8', 		
	);	
	
	
	$options['col']= array(
		''				=>	esc_html__('Default','sao'), 
 		'1'				=> '1', 
		'2'				=> '2', 
		'3'				=> '3', 
		'4'				=> '4', 
		'5'				=> '5', 
		'6'				=> '6', 
 		'7'				=> '7', 
		'8'				=> '8', 
		'9'				=> '9', 
		'10'			=> '10', 
		'11'			=> '11', 
		'12'			=> '12', 		
	);
	
	$options['tablet_cols']= array(
		''						=>	esc_html__('Default','sao'), 
  		'1'				=> '1', 
		'2'				=> '2', 
		'3'				=> '3', 
		'4'				=> '4', 
		'5'				=> '5', 
		'6'				=> '6',  
	);
	
	
	$options['mobile_cols']= array(
		''				=>	esc_html__('Default','sao'), 
 		'1'				=> '1', 
		'2'				=> '2', 
		'3'				=> '3', 
	);
	
	$options['text_align']= array(
		''					=> esc_html__('Default','sao'), 
		'left'				=> 'Left', 
		'center'			=> 'Center', 
		'right'				=> 'Right', 
   		
	);		
	$options['font_weight']= array(
		''				=>esc_html__('Default','sao'), 
		'normal'		=> esc_html__('Normal','sao'), 
		'bold'			=> esc_html__('Bold','sao'), 
 	);	
		
	$options['font_style']= array(
		''				=>esc_html__('Default','sao'), 
		'normal'		=> esc_html__('Normal','sao'), 
		'italic'		=> esc_html__('Italic','sao'), 
		'oblique'		=> esc_html__('Oblique','sao'), 
		 
		
		
 	);	
	
	$options['border_style']= array(
	
		'solid'			=>esc_html__('Solid','sao'), 
		'dotted'		=> esc_html__('Dotted','sao'), 
		'dashed'		=> esc_html__('Dashed','sao'), 
		'double'		=> esc_html__('Double','sao'), 
		'groove'		=> esc_html__('Groove','sao'), 
		'ridge'			=> esc_html__('Ridge','sao'), 
		'inset'			=> esc_html__('Inset','sao'), 
		'outset'		=> esc_html__('Outset','sao'), 
		'none'			=> esc_html__('None','sao'), 
		'hidden'			=> esc_html__('hidden','sao'), 
 		 
		 
		
		
 	);	
	
	$options['columns']= array(
		''				=>esc_html__('Default','sao'), 
  		'1_1'				=> '1/1', 
 		'1_2'				=> '1/2', 
 		'1_3'				=> '1/3', 
 		'1_4'				=> '1/4', 
		'1_5'				=> '1/5', 
		'1_6'				=> '1/6', 
 		'2_3'				=> '2/3', 
		'3_4'				=> '3/4', 
		'2_5'				=> '2/5', 
		'3_5'				=> '3/5', 
		'4_5'				=> '4/5', 
		'5_6'				=> '5/6', 
 		'hide'				=> 'Hide', 
	);	
	
	
	 	
		 
	$options['imgsize']= array(
 		''		=> 'Default', 
 		'sao_mini'		=> 'sao Mini', 
 		'sao_small'		=> 'sao Small', 
 		'thumbnail'			=> 'sao Thumbnail', 
 		'sao_medium'		=> 'sao Medium', 
 		'medium'			=> 'Medium', 
		'sao_large'		=> 'sao Large', 
		'sao_big'		=> 'sao Big', 
		'large'				=> 'Main Large', 
 		'full'				=> 'Full', 
	);	
		

	$args = array(
			'sort_order' => 'asc',
			'sort_column' => 'post_title',
			'hierarchical' => 1,
 			'child_of' => 0,
			'parent' => -1,
			'post_type' => 'page',
			'post_status' => 'publish'
		); 		
		
 
 
  
		$options_post = array();
		$options_post_obj =get_pages($args); 
 
		foreach ($options_post_obj as $rezapost) {
			$options_post[$rezapost->ID] = $rezapost->post_title;
		}		
	$options['page'] = $options_post;
  	return $options[$value];
}	

function sao_multi_array_options($value) {


	$options['margin_horizontal'] = array( 
			array( 
				"name"			=> esc_html('Top','sao'),			
  				"id"			=> "top",
				"type"			=> "number",
 			), 
			array( 
				"name"			=> esc_html('Bottom','sao'),
    				"id"			=> "bottom",
 				"type"			=> "number",
 			), 
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),
  	);
	
	$options['margin'] = array( 
			array( 
				"name"			=> esc_html('Top','sao'),			
  				"id"			=> "top",
				"type"			=> "number",
 			),
			array( 
				"name"			=> esc_html('Right','sao'),
 				"id"			=> "right",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html('Bottom','sao'),
    				"id"			=> "bottom",
 				"type"			=> "number",
 			),
			array( 
				"name"			=>  esc_html('Left','sao'),
  				"id"			=> "left",
 				"type"			=> "number",
 			),	
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),
  	);
	
	
 	$options['border'] = array( 
			array( 
				"name"			=> esc_html('Top','sao'),			
  				"id"			=> "top",
				"type"			=> "number",
 			),
			array( 
				"name"			=> esc_html('Right','sao'),
 				"id"			=> "right",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html('Bottom','sao'),
    				"id"			=> "bottom",
 				"type"			=> "number",
 			),
			array( 
				"name"			=>  esc_html('Left','sao'),
  				"id"			=> "left",
 				"type"			=> "number",
 			),	
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),	
			array( 
 				"name"			=> 	esc_html('Style','sao'),
 				"id"			=> "style",
  				"type"			=> "select",
				"options"		=>  sao_array_options('border_style'),
 			),					
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			),	
			 					
 		); 
		
	
	
	$options['shadow'] = array( 
			array( 
				"name"			=> esc_html('Horizontal','sao'),			
  				"id"			=> "horizontal",
				"type"			=> "number",
 			),
			array( 
				"name"			=> esc_html('Vertical','sao'),
 				"id"			=> "vertical",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html('Blur','sao'),
				"id"			=> "blur",
 				"type"			=> "number",
 			),
			array( 
				"name"			=>  esc_html('Spread','sao'),
  				"id"			=> "spread",
 				"type"			=> "number",
 			),	
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),	
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			),				
			array( 
  				"id"			=> "position",
  				"type"			=> "select",
				"options"		=>  array( 
   					""		=> "Outline",
 					"inset"			=> "Inset",
 				),
 			),
			);
 
 		$options['text_shadow'] = array( 
			array( 
				"name"			=> esc_html('Horizontal','sao'),			
  				"id"			=> "horizontal",
				"type"			=> "number",
 			),
			array( 
				"name"			=> esc_html('Vertical','sao'),
 				"id"			=> "vertical",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html('Blur','sao'),
				"id"			=> "blur",
 				"type"			=> "number",
 			),
 		 
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),	
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			),				
			 
			);
 
 
 
 
		$options['radius'] = array( 
			array( 
				"name"			=> esc_html('Top Left','sao'),			
  				"id"			=> "top_left",
				"type"			=> "number",
 			),
			array( 
				"name"			=> esc_html('Top Right','sao'),
 				"id"			=> "top_right",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html('Bottom Right','sao'),
				"id"			=> "bottom_right",
 				"type"			=> "number",
 			),
			array( 
				"name"			=>  esc_html('Bottom Left','sao'),
  				"id"			=> "bottom_left",
 				"type"			=> "number",
 			),	
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),	
 
 		); 
 
 
		$options['meta'] = array( 
			array( 
				"name"			=> esc_html('Category','sao'),			
  				"id"			=> "meta_category",
				"type"			=> "checkbox",
 			),
			array( 
				"name"			=> esc_html('Author','sao'),
 				"id"			=> "meta_author",
 				"type"			=> "checkbox",
 			),	
			array( 
				"name"			=> esc_html('Date','sao'),
				"id"			=> "meta_date",
 				"type"			=> "checkbox",
 			), 
			array( 
				"name"			=>  esc_html('Comments','sao'),
  				"id"			=> "meta_comments",
 				"type"			=> "checkbox",
 			),	
			 
 		); 
 
	
	
return $options[$value];
}	
?>