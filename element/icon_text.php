<?php

add_filter('sao_element_options', 'sao_icon_text_options');
function sao_icon_text_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Icon & Text','sao'),
 		'id'			=> 'icon_text',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/icon_text.jpg'
  	); 
   
	
	$option[]= array( 
		"name"			=> esc_html('Icon','sao'),
 		"id"			=> "icon",
  		"default"		=> "fa-check-circle",
 		"type"			=> "icon",
 	);	
	$option[]= array( 
		"name"			=> esc_html('Title','sao'),
 		"default"		=> 'Lorem ipsum dolor sit amet',
 		"id"			=> "title",
 		"type"			=> "text",
 		  
	);
	$option[]= array( 
		"name"			=> esc_html('The Details','sao'),
 		"id"			=> "details",
  		"default"		=> 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud',
 		"type"			=> "textarea",
 		  
	);
 
	
	$option[]= array( 
		"name"			=> esc_html('Link','sao'),
 		"id"			=> "link",
   		"type"			=> "text",
 		  
	); 
 
 	$option[]= array( 
		"name"			=> esc_html('Padding','sao'),
 		"id"			=> "padding",
  		"group"			=>  esc_html('Layout','sao'),
		"default"		=>  array( 
			"top"			=> '20',
			"left"			=> '20',
			"bottom"		=> '20',
			"right"			=> '20',
 			), 
		
		"type"			=> "multi_options",
 		"options"		=>  sao_multi_array_options('margin'),						
 	);
 	
	$option[]= array( 
		"name"			=> esc_html('Icon Color','sao'),
 		"id"			=> "icon_color", 
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
		"name"			=> esc_html('Icon Size','sao'),
 		"id"			=> "icon_font_size",
					
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
	 
	 		
					
 	
	  
			 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 




add_filter('sao_builder_icon_text', 'sao_icon_text_config');
function sao_icon_text_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css =''; 
	$icon  =!empty($option['icon'])? ' has-post-thumbnail ':'';
	
 

     $output.='<div class="sao-icon-text  '.esc_attr($icon).' sao-post sao-text-item">'; 
     
	if(!empty($option['icon'])) { 
		$output.='<div class="sao-icon  ">';
		
		if(!empty($option['link'])){ 
			$output.='<a class="sao-icon-a" href="'.esc_url($option['link']).'">';
		}
		
           $output.='<i  class="'.esc_attr($option['icon']).' sao-font-large  "></i>';
		   
		if(!empty($option['link'])){ 
			$output.='</a>';
		}
		$output.='</div>';
	}  
        
	$output.='<div class="sao-details sao-auto-width-item">';
	
		if(!empty($option['title'])){
		$output.='<h3 class="sao-title sao-font-large">';
		
		if(!empty($option['link'])){
		$output.='<a href="'.esc_url($option['link']).'">';
		} 
		
		$output.=esc_html($option['title']); 
		
		if(!empty($option['link'])){ 
		$output.='</a>';
		}
		$output.='</h3>';
		} 
		if(!empty($option['details'])){ 
			$output.='<div class="sao-excerpt sao-font-medium">'.esc_html($option['details']).'</div>';
       	}
		
      $output.='</div>';
    $output.='</div>';
 	   
	   
	$item = '.sao-element-'.$key.' '; 
	
	//Icon Css 
	$icon_css ='';
	$icon_css.= sao_builder_color($option,'icon_color'); 
	$icon_css.= sao_builder_font_size($option,'icon_font_size'); 
	$css.= sao_builder_item_css($icon_css,$item.' .sao-icon i,'.$item.' .sao-icon i::before');	
 	
	//Title Css 
	$title_css ='';
	$title_css.= sao_builder_color($option,'title_color'); 
	$title_css.= sao_builder_font_size($option,'title_font_size'); 
	$title_css.= sao_builder_font_weight($option,'title_font_weight');
 	$css.= sao_builder_item_css($title_css,$item.' .sao-title ,'.$item.' .sao-title a');
	 
	//Details Css 
	$details_css ='';
	$details_css.= sao_builder_color($option,'details_color'); 
	$details_css.= sao_builder_font_size($option,'details_font_size'); 
	$css.= sao_builder_item_css($details_css,$item.' .sao-excerpt');

 	   
  	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>