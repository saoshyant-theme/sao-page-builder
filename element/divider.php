<?php

add_filter('sao_element_options', 'sao_divider_options');
function sao_divider_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Divider','sao'),
 		'id'			=> 'divider',
 		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/divider.jpg'
  	); 
   
 
 
 	
	$option[]= array( 
		"name"			=> esc_html('Divider','sao'),
		"id"			=> "divider",
		"type"			=> "multi_options",
		"options"		=>  array(
					array( 
						"name"			=>  esc_html('Size','sao'),
						"id"			=> "size",
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
				),	
		);	
	
	$option[]= array( 
		"name"			=> esc_html('Width','sao'),
		"id"			=> "width",
		"type"			=> "select",
		"options"		=>  array(
			"100%"			=> "100%",
			"90%"			=> "90%",
			"80%"			=> "80%",
			"70%"			=> "70%",
			"60%"			=> "60%",
			"50%"			=> "50%",
			"40%"			=> "40%",
			"30%"			=> "30%",
			"20%"			=> "20%",
			"10%"			=> "10%",
			),
 		);	
	
 
  
	$option[]= array( 
		"name"			=> esc_html('Padding','sao'),
 		"id"			=> "padding",
  		"desc"			=>  esc_html('Padding around the entire row,Default "0"','sao'),
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
  
			 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 




add_filter('sao_builder_divider', 'sao_divider_config');
function sao_divider_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css =''; 
	 
   
	$output ='<div class="sao-divider"></div>';

 	 //Details Css 
 	$divider_css='';
   	$details_css.= sao_builder_border_mini($option,'divider'); 
 	
 	if(!empty($option['width'])){ 
		$divider_css.= !empty($option['width']) ? 'width:'.$option['width'].' !important; margin: auto;' : '';
   	}
	
 	$css.= sao_builder_item_css($details_css,$item.' .sao-divider');
	
 
  	$css.=sao_element_padding( $key,$option); 
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>