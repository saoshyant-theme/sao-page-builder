<?php

add_filter('sao_element_options', 'sao_text_list_options');
function sao_text_list_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('List','sao'),
 		'id'			=> 'text_list',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/text_list.jpg'
  	); 
   
   
   
   
	$default=array(
		'a'.rand(100000000, 999999999)	=>  array( 
			'text' =>  "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa"
		 
			),
		'a'.rand(100000000, 999999999)	=> array( 
			'text' =>  "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa"
 			),
		'a'.rand(100000000, 999999999)	=> array( 
			'text' =>  "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa"
 			), 		 
		 
		 
		);

 
 	$option[]= array( 
		"name"			=> esc_html('List','sao'),
 		"id"			=> "list",
 		"default"		=> $default,
  		"desc"			=>  esc_html('Add List','sao'),
		"type"			=> "list",
 		"options"		=>  array(
			 array(
  				"name"		=>  esc_html('Text','sao'),
  				"id"		=> "text",
 				"type"		=> "textarea",
 			),
 			array(
  				"name"		=>  esc_html('Custom Icon','sao'),
  				"id"		=> "icon",
 				"type"		=> "icon",
				
 			),	
			 	
			array(
  				"name"		=>  esc_html('Icon Color','sao'),
  				"id"		=> "icon_color",
 				"type"		=> "color_rgba",
 				 
			),
			     
  		),
	);
 
 
 
	$option[]= array( 
		"name"			=> esc_html('Icon For all','sao'),
 		"id"			=> "icon",
 		"default"			=> "fa-angle-right",
  		"type"			=> "icon",
 		  
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
		"name"			=> esc_html('Text Color','sao'),
 		"id"			=> "text_color",
 		"group"			=>  esc_html('Design','sao'),
		"type"			=> "color_rgba", 
		
  	); 
	 
	$option[]= array( 
		"name"			=> esc_html('Icon Color','sao'),
 		"id"			=> "icon_color", 
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "color_rgba", 
		
  	); 	
	
	
	$option[]= array( 
		"name"			=> esc_html('Text Font Size','sao'),
 		"id"			=> "text_font_size",
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "multi_options",
		"default"		=>  array( 
 			"size"		=> '20',
			"unit"			=> 'px',
			), 	 	
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
		"name"			=> esc_html('Text Font Weight','sao'),
 		"id"			=> "text_font_weight",
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "select",
		"options"		=>  array( 
			"normal"		=> esc_html('Normal','sao'),
			"bold"			=> esc_html('Bold','sao'),
			) ,
		
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
 
	
	 
	 		
			
 	
	  
			 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
}  
add_filter('sao_builder_text_list', 'sao_text_list_config');
function sao_text_list_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css =''; 
 
		 
 
	$icon = !empty($option['icon']) ? $option['icon'] : '';



	$output.='<ul  class="sao-text-list sao-auto-width-item">'; 
  			if(!empty($option['list'])){
 				foreach($option['list'] as $keys => $value) {

					 $icon_item = !empty( $value['icon'] ) ? $value['icon'] : $icon;

					if(!empty($value['text'])) {
					$output.= '<li class=" sao-list-item-'.esc_attr($keys).' sao-font-medium   sao-text-warp sao-text ">';
						if(!empty($icon_item)) {
							$output.= '<i class="'.esc_attr($icon_item).'"  ></i>'; 
						}
					$output.= esc_html($value['text']);
					$output.= '</li>';
					$icon_item_css ='';
 			  		$icon_item_css.= sao_builder_color($value,'icon_color'); 
					$css.= sao_builder_item_css($icon_item_css,' .sao-element-'.esc_attr($key).' .sao-list-item-'.esc_attr($keys).' i:before');		
 	 
					}
					
				}
			}
				 
 
	$output.= '</ul>';


	//Text Css
	$text_css='';
	$item = '.sao-element-'.$key.' '; 
	//TexT Css 
	$text_css ='';
	$text_css.= sao_builder_color($option,'text_color'); 
	$text_css.= sao_builder_font_size($option,'text_font_size'); 
	$text_css.= sao_builder_font_weight($option,'text_font_weight'); 
	$css.= sao_builder_item_css($text_css,$item.' .sao-text-list  li');		
	
	
	//Icon Css 
	$icon_css ='';
	$icon_css.= sao_builder_color($option,'icon_color'); 
	$icon_css.= sao_builder_font_size($option,'icon_font_size'); 
	$css.= sao_builder_item_css($icon_css,$item.' .sao-text-list  li i');		
 	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>