<?php

add_filter('sao_element_options', 'sao_image_options');
function sao_image_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Image','sao'),
 		'id'			=> 'image',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/image.jpg'
  	); 
   

	$option[]= array( 
		"name"			=> esc_html('Upload Image','sao'),
 		"id"			=> "image",
 		"type"			=> "image",
 		   
	);	
	$option[]= array( 
		"name"			=> esc_html('Link','sao'),
 		"id"			=> "link",
 		"type"			=> "text",
 		  
	);
	  
 
		
	
	$option[]= array( 
		"name"			=> esc_html('Width','sao'),
 		"id"			=> "width",
 		"group"			=>  esc_html('Layout','sao'),
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
		"name"			=> esc_html('Height','sao'),
 		"id"			=> "height",
 		"group"			=>  esc_html('Layout','sao'),
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
		"name"			=> esc_html('Alignment','sao'),
 		"id"			=> "alignment",
 		"group"			=>  esc_html('Layout','sao'),
		"default"		=>  'center',
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
		"name"			=> esc_html('Border','sao'),
		"id"			=> "border",
 		"group"			=>  esc_html('Design','sao'),
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
		"name"			=> esc_html('Box Shadow','sao'),
 		"id"			=> "shadow",
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('shadow'),						
 	); 	
	 		  
			 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 

 
add_filter('sao_builder_image', 'sao_image_config');
function sao_image_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';
  	
 	$image =!empty( $option['image'])?$option['image']:'';
	$image_css='';
	if(!empty($option['width']['size'])){
		$width_unit = !empty($option['width']['unit']) ? $option['width']['unit'] : 'px';
		$image_css.= intval(isset($option['width']['size'])) ? ' width:'.$option['width']['size'].$width_unit.'; ': ' ';
  	}
	
 	if(!empty($option['height']['size'])){
		$height_unit = !empty($option['height']['unit']) ? $option['height']['unit'] : 'px';
		$image_css.= intval(isset($option['height']['size'])) ?  ' height:'.$option['height']['size'].$height_unit.' ;': ' ';
  	}		
 
	$image_css.= sao_builder_border_mini($option,'border');  
	$image_css.= sao_builder_shadow($option,'shadow');  
  	$css.= sao_builder_item_css($image_css,'.sao-element-'.$key.' img');	 

	 
	$alignment = !empty($option['alignment']) ?' sao_alignment_'.$option['alignment'] : '';
  
 	//OutPut
    $output.='<div class="sao-image '.esc_attr($alignment).'">'; 
   
 	if(!empty($option['link'])){ 
		$output.= '<a href="'.esc_url($option['link']).'">';
	}
	$image = $option['image'];
 
	if(!empty($image['url'])){
		$alt = !empty($image['alt'])?$image['alt']:'';
		$width = !empty($image['width'])?$image['width']:'';
		$height = !empty($image['height'])?$image['height']:'';
		
 		$output.= '<img src="'.esc_url($image['url']).'" width="'.esc_attr($width).'" height="'.esc_attr($height).'" alt="'.esc_attr($alt).'">'; 
	}
	
 	if(!empty($option['link'])){ 
		$output.= '</a>';
	}	
	
    $output.='</div>';
	
	
  
 
  	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>