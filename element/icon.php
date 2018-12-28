<?php

add_filter('sao_element_options', 'sao_icon_options');
function sao_icon_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Icon','sao'),
 		'id'			=> 'icon',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/icon.jpg'
  	); 
 
	$option[]= array( 
		"name"			=> "Icon",
  		"id"			=> "icon",
  		"default"		=> "fa-check-circle",
 		"type"			=> "icon", 
	);  

 
  
	$option[]= array( 
		"name"			=> esc_html('Alignment','sao'),
 		"id"			=> "alignment",
		"default"		=>  'center',
 		"group"			=>  esc_html('Layout','sao'),
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
		"name"		=>  esc_html('Icon Color','sao'),
		"id"		=> "color",
  		"group"			=>  esc_html('Design','sao'),
		"type"		=> "color_rgba",
	);
	
	
 	
	$option[]= array( 
		"name"			=> esc_html('Icon Size','sao'),
 		"id"			=> "icon_size",
  		"group"			=>  esc_html('Typography','sao'),
		"default"		=>  array( 
 			"size"		=> '80',
			"unit"			=> 'px',
		), 
		
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
add_filter('sao_builder_icon', 'sao_icon_config');
function sao_icon_config( $args ) {
 
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css =''; 
  
 
	 
	$alignment = !empty($option['alignment']) ?' sao_alignment_'.$option['alignment'] : '';

	if($option['icon']){
		$output.= '<div class="sao-icon '.esc_attr($alignment).'" >';
		  $output.= '<i class="'.esc_attr($option['icon']).'"></i>'; 
		$output.= '</div>';
	}
	//Css
	$item = '.sao-element-'.$key.' '; 
	$icon_css =''; 
	$icon_css.= sao_builder_font_size($option,'icon_size'); 
	$icon_css.= 'line-height:1em;'; 
	$icon_css.= sao_builder_color($option,'color'); 
	$css.=sao_builder_item_css($icon_css,$item.' .sao-icon i');

 	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}


?>