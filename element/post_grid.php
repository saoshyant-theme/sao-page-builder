<?php

add_filter('sao_element_options', 'sao_post_grid_options');
function sao_post_grid_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Post Grid','sao'),
 		'id'			=> 'post_grid',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/post_grid.jpg'
  	); 
   
 	$option[]= array( 
		"name"			=> esc_html('Title Box','sao'),
 		"id"			=> "title",
 		"default"		=> 'Title Box',
 		"type"			=> "text",
 		   
	);
  
	$option[]= array( 
		"name"			=> esc_html('Number of Posts to show','sao'),
 		"id"			=> "number",
 		"default"			=> 5,
  		"type"			=> "number",
 		  
	);	    
	$option[]= array( 
		"name"			=> esc_html('Category','sao'),
 		"id"			=> "cats",
  		"type"			=> "select",
		"options"		=>  sao_array_options('cats'),						
 	); 
	
	
	$option[]= array( 
		"name"			=> esc_html('Orderby','sao'),
 		"id"			=> "orderby",
  		"type"			=> "select",
		"options"		=>  sao_array_options('orderby'),						
 	); 
	
	$option[]= array( 
		"name"			=> esc_html('Show Title Posts','sao'),
 		"id"			=> "post_title",
		"default"		=>  1,
  		"type"			=> "checkbox",
   	); 
	
	$option[]= array( 
		"name"			=> esc_html('Show Excerpt Posts','sao'),
 		"id"			=> "excerpt",
		"default"		=>  1,
   		"type"			=> "checkbox",
		
   	); 


	$option[]= array( 
		"name"			=> esc_html('Limit Title length','sao'),
 		"id"			=> "title_limit",
		"desc"			=>  esc_html('example: "100"','sao'),
   		"type"			=> "number",
   	); 
	
	$option[]= array( 
		"name"			=> esc_html('Limit Excerpt length','sao'),
 		"id"			=> "excerpt_limit",
		"desc"			=>  esc_html('example: "200"','sao'),
   		"type"			=> "number",
   	); 
	
		 
	$option[]= array( 
		"name"			=> esc_html('Post Meta','sao'),
 		"id"			=> "meta",
		"default"		=> array( 
				"meta_category"		=> true,			
				"meta_author"		=> true,
		),			
   		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('meta'),						
 	);  
	 
	 
	$option[]= array( 
		"name"			=> esc_html('Show Load more','sao'),
 		"id"			=> "load_more",
		"default"		=>  1,
   		"type"			=> "checkbox",
 	);  
	 	 
	  
	$option[]= array( 
		"name"			=> esc_html('Column','sao'),
 		"id"			=> "column",
 		"group"			=>  esc_html('Layout','sao'),
 		"type"			=> 'select',
 		"default"		=> 2,
 		"options"		=>  sao_array_options('list_col'),						
				  
	);
	$option[]= array( 
		"name"			=> esc_html('Image Ratio','sao'),
 		"id"			=> "ratio",
 		"group"			=>  esc_html('Layout','sao'),
  		"default"		=>  'sao-ratio75',
		"type"			=> "select",
   		"options"		=>  sao_array_options('ratio4'),						
 		
  	); 	 
 
	$option[]= array( 
		"name"			=> esc_html('Image Size','sao'),
 		"id"			=> "image_size",
 		"group"			=>  esc_html('Layout','sao'),
		"type"			=> "select",
  		"default"		=>  'full',
		"options" 		=>	sao_all_image_sizes(),
 		 
  	); 	  
   
 
	$option[]= array( 
		"name"			=> esc_html('Alignment','sao'),
 		"id"			=> "alignment",
 		"group"			=>  esc_html('Layout','sao'),
		"default"		=>  'left',
		"desc"			=>  esc_html('Default "Center"','sao'),
		"type"			=> "select",
		"options"		=>  array( 
			"left"			=> 	esc_html('Left','sao'),
			"center"		=>  esc_html('Center','sao'),
 			"right"			=>  esc_html('Right','sao'),					
			 
		),					
		 
	);
	
	$option[]= array( 
		"name"			=> esc_html('Padding','sao'),
 		"id"			=> "padding",
  		"desc"			=>  esc_html('space around the entire','sao'),
 		"group"			=>  esc_html('Layout','sao'),
 		"default"		=>  array( 
				"top"		=> 20,
				"left"		=> 20,
				"bottom"	=> 20,
				"right"		=> 20,
  						) ,  
 		"type"			=> "multi_options",
		
 		"options"		=>  sao_multi_array_options('margin'),						
		  
	);	
	
			
	$option[]= array( 
		"name"			=> esc_html('Title Box Color','sao'),
 		"id"			=> "title_box_color",
  		"group"			=>  esc_html('Design','sao'),
		"type"			=> "color_rgba", 
		
  	); 
	
	$option[]= array( 
		"name"			=> esc_html('Title Color','sao'),
 		"id"			=> "title_color",
  		"group"			=>  esc_html('Design','sao'),
		"type"			=> "color_rgba", 
		
  	); 
		
	
	$option[]= array( 
		"name"			=> esc_html('Details Color','sao'),
 		"id"			=> "details_color", 
  		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "color_rgba", 
		
  	); 	
	
	
	
	$option[]= array( 
		"name"			=> esc_html('Meta Color','sao'),
 		"id"			=> "meta_color", 
  		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "color_rgba", 
		
  	); 
	
	$option[]= array( 
		"name"			=> esc_html('Load More Color','sao'),
 		"id"			=> "loadmore_color", 
  		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "color_rgba", 
		
  	);
	
	
 

	$option[]= array( 
		"name"			=> esc_html('Title Box Font Size','sao'),
 		"id"			=> "title_box_font_size",
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "multi_options",
 
		"options"		=>  array( 
			array( 
				"name"			=> esc_html('Size','sao'),			
  				"id"			=> "size",
				"type"			=> "number",
 			),
 	 
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),		
		),	
		
  	); 
	

	$option[]= array( 
		"name"			=> esc_html('Title Font Size','sao'),
 		"id"			=> "title_font_size",
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "multi_options",
 
		"options"		=>  array( 
			array( 
				"name"			=> esc_html('Size','sao'),			
  				"id"			=> "size",
				"type"			=> "number",
 			),
 	 
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),		
		),	
		
  	); 	
	

	$option[]= array( 
		"name"			=> esc_html('Title Font Weight','sao'),
 		"id"			=> "title_font_weight",
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "select",
		"default"		=>  'bold', 
		"options"		=>  array( 
			"normal"		=> esc_html('Normal','sao'),
			"bold"			=> esc_html('Bold','sao'),
			) ,
		
  	);		
	
	$option[]= array( 
		"name"			=> esc_html('Details Font Size','sao'),
 		"id"			=> "details_font_size",
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "multi_options",
 		"options"		=>  array( 
			array( 
				"name"			=> esc_html('Size','sao'),			
  				"id"			=> "size",
				"type"			=> "number",
 			),
 	 
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),		
		),	
		
  	); 	
	
	$option[]= array( 
		"name"			=> esc_html('Meta Font Size','sao'),
 		"id"			=> "meta_font_size",
	 				
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "multi_options",
		"options"		=>  array( 
			array( 
				"name"			=> esc_html('Size','sao'),			
  				"id"			=> "size",
				"type"			=> "number",
 			),
 	 
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),		
		),	
		
  	);

	$option[]= array( 
		"name"			=> esc_html('Load Mor Fonte Size','sao'),
 		"id"			=> "loadmore_font_size",
	 				
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "multi_options",
		"options"		=>  array( 
			array( 
				"name"			=> esc_html('Size','sao'),			
  				"id"			=> "size",
				"type"			=> "number",
 			),
 	 
			array( 
 				"name"			=> 	esc_html('Unit','sao'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  sao_array_options('unit'),
 			),		
		),	
		
  	);					 	 
	  
			 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 

add_filter('sao_builder_perview_post_grid', 'sao_builder_perview_post_grid');
function sao_builder_perview_post_grid( $args ) {
	 
	
 	$key = $args['key'];
		$output='';
		$css='';
		$output ='<img src="'.plugin_dir_url( __DIR__ ).'assets/image/post_grid.jpg">'; 
		$css.= '.sao-element-'.$key.' {text-align: center;}'; 
  	$return['css']= $css;
	$return['output']= $output;
		return $return;
}
add_filter('sao_builder_post_grid', 'sao_post_grid_config');
function sao_post_grid_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css =''; 
	$ratio = !empty($option['ratio']) ?$option['ratio'] : 'sao-ratio75';
 

	//Text Css
	
	$column_main = !empty($option['column'])?$option['column']:''; 

	$column_desktop = $column_main;
	if( $column_main >= 5){
	$column_tablet = round($column_main/2);
	}else{
	$column_tablet = $column_main;
	}
	$column_phablet = 1;
	$column_phone = 1;
	$responsive = 'sao_post_column_1_'.$column_main.' sao_post_desktop_1_'.$column_desktop.' sao_post_tablet_1_'.$column_tablet.' sao_post_phablet_1_'.$column_phablet.'  sao_post_phone_1_'.$column_phone;
	$alignment = !empty($option['alignment']) ?' sao_alignment_'.$option['alignment'] : '';


 	$output.='<aside class="'.esc_attr($ratio).' sao-post-grid-warp '.esc_attr($responsive).' '.esc_attr($alignment).'">'; 
  		$output.= sao_title_box($option);	
			$output.='<div class="sao-post-list"  >';
				$output.= sao_grid_post(1,$option);
			$output.='</div>';
 			$output.= sao_load_more($option,'sao_list_post');		
  		$output.= '</aside>';			
  
 	//Title Box Css
 	$item = '.sao-element-'.$key.' '; 
	//TexT Css 
	$title_box_css ='';
	$title_box_css.= sao_builder_color($option,'title_box_color'); 
	$title_box_css.= sao_builder_font_size($option,'title_box_font_size'); 
 	$css.= sao_builder_item_css($title_box_css,$item.' .sao-title-box span');	
	 
 	//Title css  
	$title_css='';
 	$title_css.= sao_builder_color($option,'title_color'); 
	$title_css.= sao_builder_font_size($option,'title_font_size');
	$title_css.= sao_builder_font_weight($option,'title_font_weight'); 
	 
 	$css.= sao_builder_item_css($title_css,$item.' .sao-title ,'.$item.' .sao-title a');	
	 	 
  	 
	//Details Css 
	$details_css ='';
	$details_css.= sao_builder_color($option,'details_color'); 
	$details_css.= sao_builder_font_size($option,'details_font_size'); 
	$css.= sao_builder_item_css($details_css,$item.' .sao-excerpt');
	

  	 
	//Meta Css 
	$meta_css ='';
	$meta_css.= sao_builder_color($option,'meta_color'); 
	$meta_css.= sao_builder_font_size($option,'meta_font_size'); 
	$css.= sao_builder_item_css($meta_css,$item.' .sao-meta li,'.$item.' .sao-meta li a');

	//Meta Css 
	$loadmore_css ='';
	$loadmore_css.= sao_builder_color($option,'loadmore_color'); 
	$loadmore_css.= sao_builder_font_size($option,'loadmore_font_size'); 
	$css.= sao_builder_item_css($loadmore_css,$item.' .sao-load-more span ');
  

 
 
 	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}

function sao_grid_post($none_ajax=false,$option =false,$slider = false) { 
	$image_size = sao_option_value($option,'image_size');

   	$arge = array(
		'thumb'				=> $image_size,
		'post_title'		=> sao_option_value($option,'post_title'),
		'excerpt'			=> sao_option_value($option,'excerpt'),
		'title_limit'		=> sao_option_value($option,'title_limit'),
		'excerpt_limit'		=> sao_option_value($option,'excerpt_limit'),
		'meta'				=> sao_option_value($option,'meta'),
 	); 
  	
 


  	$query = sao_query($option);
	$output='';
 	if( $query->have_posts() ) : 
 	while ( $query->have_posts() ) : $query->the_post(); 

		$output.='<div class="sao-post-item  ">';
		$output.= sao_post_module_2($arge);
		$output.= '</div>';
		$output.='<div class="sao-row sao-line"><div class="sao-border-top"></div></div>';

	 endwhile;
 	endif; 
	if(!empty($none_ajax)){
  		return $output;
	}else{
		echo $output;
	}
}

add_action('wp_ajax_nopriv_sao_grid_post', 'sao_grid_post');
add_action('wp_ajax_sao_grid_post', 'sao_grid_post'); 

 
?>