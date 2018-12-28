<?php

add_filter('sao_element_options', 'sao_post_list_options');
function sao_post_list_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Post List','sao'),
 		'id'			=> 'post_list',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/post_list.jpg'
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
 add_filter('sao_builder_perview_post_list', 'sao_builder_perview_post_list');
 
 
function sao_builder_perview_post_list( $args ) {
 	$key = $args['key'];
		$output='';
		$css='';
		$output ='<img src="'.plugin_dir_url( __DIR__ ).'assets/image/post_list.jpg">'; 
		$css.= '.sao-element-'.$key.' {text-align: center;}'; 
  	$return['css']= $css;
	$return['output']= $output;
 	
	return $return;	
}
	
	
add_filter('sao_builder_post_list', 'sao_post_list_config');
function sao_post_list_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css =''; 
	$ratio = !empty($option['ratio']) ?$option['ratio'] : 'sao-ratio75';
 
	$column_main = !empty($option['column'])?$option['column']:''; 

	$column_desktop = $column_main;
	$column_tablet = round($column_main/2);
	$column_phablet = 1;
	$column_phone = 1;
	$responsive = 'sao_post_column_1_'.$column_main.' sao_post_desktop_1_'.$column_desktop.' sao_post_tablet_1_'.$column_tablet.' sao_post_phablet_1_'.$column_phablet.'  sao_post_phone_1_'.$column_phone;

	//Text Css
 		$output.='<aside class="'.esc_attr($ratio).' '.esc_attr($responsive).' sao-post-list-warp">'; 
  		$output.= sao_title_box($option);	
			$output.='<div class="sao-post-list"  >';
				$output.= sao_list_post(1,$option);
			$output.='</div>';
 			$output.= sao_load_more($option,'sao_list_post');		
  		$output.= '</aside>';			
  
 
 	//Title Box Css
 	$item = 'body .sao-element-'.$key.'.sao-element-item ';
	//TexT Css 
	$title_box_css ='';
	$title_box_css.= sao_builder_color($option,'title_box_color'); 
	$title_box_css.= sao_builder_font_size($option,'title_box_font_size'); 
 	$css.= sao_builder_item_css($title_box_css,$item.' .sao-title-box span');	
	  
	//Post Background
	$background_css ='';
	$background_css.= sao_builder_background_color($option,'background_color' ); 
  	$css.= sao_builder_item_css($background_css,$item.' .rd-list-warp.rd-boxid .rd-post-list');
	
		 
	if(!empty($option['border_color'])){
		$css.= 
			$item.' .rd-list-warp.rd-boxid .rd-post-list::before,'
			.$item.' .rd-list-warp.rd-boxid .rd-post-list::after,'
			.$item.' .rd-list-warp.rd-boxid .rd-post-item::before,'
			.$item.' .rd-list-warp.rd-boxid .rd-post-item::after,'
			 .$item.' .rd-load-more span::before
			{border-color:'.$option['border_color'].' !important; }';
	}
	
	//Title Css
	$title_color_css ='';
	$title_color_css.= sao_builder_color($option,'title_color' ); 
  	$css.= sao_builder_item_css($title_color_css,$item.' .rd-title a  ,'.$item.'  .rd-title,'.$item.'  .rd-meta li.rd-author a');
 	$title_font_size_css='';
 	$title_font_size_css.= sao_builder_font_size($option,'title_font_size' ); 
  	$css.= sao_builder_item_css($title_font_size_css,$item.' .rd-title a  ,'.$item.'  .rd-title');
	 	 
	 
	//excerpt  Css 
	$excerpt_css ='';
	$excerpt_css.= sao_builder_color($option,'excerpt_color'); 
	$excerpt_css.= sao_builder_font_size($option,'excerpt_font_size'); 
	$css.= sao_builder_item_css($excerpt_css,$item.' .rd-excerpt,'.$item.' .rd-load-more span');
  
	//Meta Css 
	$meta_css ='';
	$meta_css.= sao_builder_color($option,'meta_color'); 
 	$meta_css.= sao_builder_font_size($option,'meta_font_size'); 
	$css.= sao_builder_item_css($meta_css,$item.' .rd-meta li,'.$item.' .rd-meta li a,'.$item.' .rd-category a,'.$item.' .rd-category');

  
 
 	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}

function sao_list_post($none_ajax=false,$option =false,$slider = false) { 
 	$arge = array(
		'thumb'				=> sao_option_value($option,'image_size'),
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
		$output.= sao_post_module_1($arge);
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

add_action('wp_ajax_nopriv_sao_list_post', 'sao_list_post');
add_action('wp_ajax_sao_list_post', 'sao_list_post'); 

 
?>