<?php

add_filter('sao_element_options', 'sao_button_options');
function sao_button_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Button','sao'),
 		'id'			=> 'button',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/button.jpg',
  	); 
   

	  
	
	
	$default=array(
		'a'.rand(100000000, 999999999)	=>  array( 
			'text' => esc_html('Button 1','sao'),
			'link' => "#",
			'text_color' =>  array( 
				'main' => "#ffffff",
				'icon' => "#ffffff",
 			),
			'background' =>  array( 
				'first' => "#ff0000",
 			),
			'border' =>  array( 
				'size' => "2",
				'style' => "solid",
 				'color' => "#ff0000",
 			)
			),
		'a'.rand(100000000, 999999999)	=> array( 
			'text' => esc_html('Button 2','sao'),
			'link' => "#",
			'text_color' =>  array( 
				'main' => "#ff0000",
				'icon' => "#ff0000",
 			),
 
			'border' =>  array( 
				'size' => "2",
 				'style' => "solid",
				'
				' => "#ff0000",
 			)
			),
 		 
		 
		 
		);

	$option[]= array( 
		"name"			=> esc_html('Button','sao'),
 		"id"			=> "button",
  		"desc"			=>  esc_html('Add Button','sao'),
		"type"			=> "list",
		"default"		=> $default,
 		"options"		=>  array(
			 array(
  				"name"		=>  esc_html('Text','sao'),
  				"id"		=> "text",
 				"type"		=> "text",
 			),
			array(
  				"name"		=>  esc_html('Link','sao'),
  				"id"		=> "link",
 				"type"		=> "text",
 			),
			
			array(
  				"name"		=>  esc_html('Icon','sao'),
  				"id"		=> "icon",
 				"type"		=> "icon",
				
 			),	
			
			array(
  				"name"		=>  esc_html('Open in new window','sao'),
  				"id"		=> "widows",
 				"type"		=> "checkbox",
				
 			),				
			array(
  				"name"		=>  esc_html('Text Color','sao'),
  				"id"		=> "text_color",
 				"type"		=> "multi_options",
 				"options"		=>	array(
					array(
						"name"		=>  esc_html('Main Text Color','sao'),
						"id"		=> "main",
						"type"		=> "color_rgba",
  					),array(
						"name"		=>  esc_html('Icon Color','sao'),
						"id"		=> "icon",
						"type"		=> "color_rgba",
  					),	
				
 				),
			),
			
			array(
  				"name"		=>  esc_html('Background Color','sao'),
  				"id"		=> "background",
 				"type"		=> "multi_options",
				"options"	=> array(
					array(
						"name"		=>  esc_html('First Color','sao'),
						"id"		=> "first",
						"type"		=> "color_rgba",
  					),array(
						"name"		=>  esc_html('Second Color','sao'),
						"id"		=> "second",
						"type"		=> "color_rgba",
  					
					),array(
						"name"		=>  esc_html('Orientation','sao'),
						"id"		=> "orientation",
						"type"		=> "select",
						"options"	=> array(
							"horizontal"		=>  esc_html('horizontal  →','sao'),
							"vertical"			=>  esc_html('vertical  ↓','sao'),
							"diagonal"			=>  esc_html('diagonal  ↘','sao'),
							"diagonal-bottom"	=>  esc_html('diagonal  ↗','sao'),
							),
					),
					
					
 				),
			),
			
			array( 
				"name"			=> esc_html('Border','sao'),
				"id"			=> "border",
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
								
			) ,
			
			 		
 		),
	);
	
	$option[]= array( 
		"name"			=> esc_html('Alignment','sao'),
 		"id"			=> "alignment",
 		"group"			=>  esc_html('Layout','sao'),
		"default"		=>  'center',
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
		"name"			=> esc_html('Button Padding','sao'),
 		"id"			=> "button_padding",
  		"group"			=>  esc_html('Layout','sao'),
		"default"		=>  array( 
			"top"			=> '10',
			"left"			=> '20',
			"bottom"		=> '10',
			"right"			=> '20',
 			), 
		
		"type"			=> "multi_options",
 		"options"		=>  sao_multi_array_options('margin'),						
 	); 
 
 	$option[]= array( 
		"name"			=> esc_html('Gutter','sao'),
 		"id"			=> "gutter",
		"group"			=>  esc_html('Layout','sao'),
		"default"		=>  array( 
 			"between"		=> '20',
			"unit"			=> 'px',
			), 
		
 		"desc"			=>  esc_html('Amount of space between Column,Default "0" ','sao'),
		"type"			=> "multi_options",
		"options"		=> array( 
			array( 
				"name"			=> esc_html('Between','sao'),			
  				"id"			=> "between",
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
		"name"			=> esc_html('Border Radius','sao'),
 		"id"			=> "radius",
 		"group"			=>  esc_html('Design','sao'),
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
		"name"			=> esc_html('Font Size','sao'),
 		"id"			=> "font_size",
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "multi_options",
		"default"		=>  	array( 
				"size"			=> 18,			
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
		"name"			=> esc_html('Font Weight','sao'),
 		"id"			=> "font_weight",
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "select",
		
		"options"		=>  array( 
			"normal"		=> esc_html('Normal','sao'),
			"bold"			=> esc_html('Bold','sao'),
			) ,
		
  	);		
	
	
	$option[]= array( 
		"name"			=> esc_html('Icon Size','sao'),
 		"id"			=> "icon_size",
		"default"		=>   array( 
				"size"			=> 25,			
  			),		
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

 


add_filter('sao_builder_button', 'sao_button_config');
function sao_button_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';
	$element_id =!empty($option['element_id'])?$option['element_id']:'';
	$custom_class =!empty($option['custom_class'])?$option['custom_class']:'';
	
 	$output ='';
  	 
 	 
	$alignment = !empty($option['alignment']) ?' sao_alignment_'.$option['alignment'] : '';
  
	$output.= '<aside class="sao-button-warp sao-auto-width-item '.esc_attr($alignment).'">'; 
 	$count=0;
 	if(!empty($option['button'])){
 	foreach($option['button'] as $keys => $value) :
		$count++;
		
  
		$link =  !empty($value['link'])  ? $value['link'] : '';		

 		$output.= '<a class="sao-button sao-font-medium sao-button-'.esc_attr($keys).'" href="'.esc_url($link ).'"  >'; 
				if(!empty($value['icon'])) {
 					$output.= '<i class="'.esc_attr($value['icon']).'"  ></i>'; 
				}
 				if(!empty($value['text'])) {
					$output.= esc_html($value['text']);  
				}
		$output.= '</a>'; 
		
		
		$item_button = '.sao-element-'.$key.' .sao-button-'.$keys; 

		  
		$button_css ='';
  		$button_css.= sao_builder_color($value ,'text_color','main');
 		
		 
  		 $button_css.= sao_builder_gradient_background_color($value,'background');
		 $button_css.= sao_builder_border_mini($value,'border');
	 
		if(!empty($option['gutter']['between'])&& $count > 1){
			$gutter_unit = !empty($option['gutter'] ['unit']) ?$option['gutter']['unit'] : 'px';
			$button_css.=  intval(isset($option['gutter']['between']))? ' margin-left:'.$option['gutter']['between'].$gutter_unit.' !important;': '';			
 			
 		} 
 		 
		$css.=sao_builder_item_css($button_css,$item_button);
		//Icon Css
		$icon_css='';
  		$icon_css.= sao_builder_color($value ,'text_color','icon'); 
		
		$css.=sao_builder_item_css($icon_css,$item_button.' i');
  
 		endforeach;
	}
  
	$output.= '</aside>'; 
	
	$item = '.sao-element-'.$key.' '; 

 
	//All Button
 	$all_button_css ='';
 	$all_button_css.= sao_element_padding_item($option,'button_padding'); 
 	$all_button_css.= sao_builder_radius_mini($option,'radius'); 
 	$all_button_css.= sao_builder_font_size($option,'font_size'); 
 	$all_button_css.= 'line-height:1em;'; 
 	$all_button_css.= sao_builder_font_weight($option,'font_weight');
  	$css.=sao_builder_item_css($all_button_css,$item.' .sao-button');
	
	
 	//ALL ICON
 	$all_icon_css ='';
 	$all_icon_css.= sao_builder_font_size($option,'icon_size'); 
 	$all_icon_css.= 'line-height:inherit;'; 	
	
 	$css.=sao_builder_item_css($all_icon_css,$item.' .sao-button i');
 
 
 
 
 	 $css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>