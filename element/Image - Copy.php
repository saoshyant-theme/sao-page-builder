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
		"name"			=> esc_html('Element ID','sao'),
 		"id"			=> "element_id",
		"desc"			=>  esc_html('Enter Column ID ,','sao').'<a href="https://www.w3schools.com/tags/att_global_id.asp">'.esc_html('Learn more','sao').'</a>',
		"type"			=> "text",
		 
	);
	
	$option[]= array( 
		"name"			=> esc_html('Element Custom Class','sao'),
 		"id"			=> "custom_class",
		"desc"			=>  esc_html('Enter Class ,','sao'),
		"type"		=> "text",

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
		"name"			=> esc_html('Margin','sao'),
 		"id"			=> "margin",
 		"group"			=>  esc_html('Style Options','sao'),
 		"group"			=>  esc_html('Layout','sao'),
 		"type"			=> "multi_options",

		 "default"		=>  array( 
			"top"			=> '0',
			"bottom"		=> '20',
			"unit"			=> 'px',
			), 
 	 
   		"options"		=>  sao_multi_array_options('margin_horizontal'),						
 	); 
	 
	 
	 		 
	 
	$option[]= array( 
		"name"			=> esc_html('Border','sao'),
		"id"			=> "border",
 		"group"			=>  esc_html('Style Options','sao'),
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
 		"group"			=>  esc_html('Style Options','sao'),
 		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('shadow'),						
 	); 	
	 		  
			 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 

add_filter('sao_builder_perview_image', 'sao_image_perview');
function sao_image_perview( $option ) {
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
 
	$alignment = !empty($option['alignment']) ?' sao_alignment_'.$option['alignment'] : '';
 
	if(!empty($option['border']['size'])){ 
		$border_unit = !empty($option['border']['unit']) ?$option['border']['unit'] : 'px';
		$border_width = intval(isset($option['border']['size'])) ? ' border-width:'.$option['border']['size'].$border_unit.';' : '';		
		$border_style = !empty($option['border']['style']) ? 'border-style:'.$option['border']['style'].';': '';		
		$border_color = !empty($option['border']['color']) ? 'border-color:'.$option['border']['color'].';' : '';		
		$image_css.=  $border_width.$border_style.$border_color;
  	} 
	if(!empty($option['shadow'])){
			$shadow_unit = !empty($option['shadow']['unit']) ?$option['shadow']['unit'] : 'px';
			$shadow_horizontal = intval(isset($option['shadow']['horizontal'])) ? $option['shadow']['horizontal'].$shadow_unit.' ': '0 ';
			$shadow_vertical = intval(isset($option['shadow']['vertical'])) ?  $option['shadow']['vertical'].$shadow_unit.' ' : '0 ';
			$shadow_blur = intval(isset($option['shadow']['blur'])) ?  $option['shadow']['blur'].$shadow_unit.' ' : '0 ';
			$shadow_spread = intval(isset($option['shadow']['spread'])) ?  $option['shadow']['spread'].$shadow_unit.' ' : '0';		
			$shadow_color = intval(isset($option['shadow']['color'])) ? $option['shadow']['color'].' ' : '';		
			$shadow_position = intval(isset($option['shadow']['position'])) ? $option['shadow']['position'] : '';		
			$image_css.= ' box-shadow:'.$shadow_horizontal.$shadow_vertical.$shadow_blur.$shadow_spread.$shadow_color.$shadow_position;
	}	
 	$alignment = !empty($option['alignment']) ?' sao_alignment_'.$option['alignment'] : '';
  
 	//OutPut
    echo '<div class="sao-image '.$alignment.'">'; 
   
 	if(!empty($option['link'])){ 
		echo '<a href="'.esc_url($option['link']).'">';
	}
	$image = $option['image'];
 
	if(!empty($image['url'])){
		$alt = !empty($image['alt'])?$image['alt']:'';
		$width = !empty($image['width'])?$image['width']:'';
		$height = !empty($image['height'])?$image['height']:'';
		
 		echo '<img src="'.esc_url($image['url']).'" width="'.$width.'" height="'.$height.'" alt="'.$alt.'" style="'.$image_css.'">'; 
	}
	
 	if(!empty($option['link'])){ 
		echo'</a>';
	}	
	
    echo '</div>';
	
  
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
 
	$alignment = !empty($option['alignment']) ?' sao_alignment_'.$option['alignment'] : '';
 
	if(!empty($option['border']['size'])){ 
		$border_unit = !empty($option['border']['unit']) ?$option['border']['unit'] : 'px';
		$border_width = intval(isset($option['border']['size'])) ? ' border-width:'.$option['border']['size'].$border_unit.';' : '';		
		$border_style = !empty($option['border']['style']) ? 'border-style:'.$option['border']['style'].';': '';		
		$border_color = !empty($option['border']['color']) ? 'border-color:'.$option['border']['color'].';' : '';		
		$image_css.=  $border_width.$border_style.$border_color;
  	} 
	if(!empty($option['shadow'])){
			$shadow_unit = !empty($option['shadow']['unit']) ?$option['shadow']['unit'] : 'px';
			$shadow_horizontal = intval(isset($option['shadow']['horizontal'])) ? $option['shadow']['horizontal'].$shadow_unit.' ': '0 ';
			$shadow_vertical = intval(isset($option['shadow']['vertical'])) ?  $option['shadow']['vertical'].$shadow_unit.' ' : '0 ';
			$shadow_blur = intval(isset($option['shadow']['blur'])) ?  $option['shadow']['blur'].$shadow_unit.' ' : '0 ';
			$shadow_spread = intval(isset($option['shadow']['spread'])) ?  $option['shadow']['spread'].$shadow_unit.' ' : '0';		
			$shadow_color = intval(isset($option['shadow']['color'])) ? $option['shadow']['color'].' ' : '';		
			$shadow_position = intval(isset($option['shadow']['position'])) ? $option['shadow']['position'] : '';		
			$image_css.= ' box-shadow:'.$shadow_horizontal.$shadow_vertical.$shadow_blur.$shadow_spread.$shadow_color.$shadow_position;
	}	
	$css.= ' .sao-element-'.$key.' img {'.$image_css.'}';
	$alignment = !empty($option['alignment']) ?' sao_alignment_'.$option['alignment'] : '';
  
 	//OutPut
    $output.='<div class="sao-image '.$alignment.'">'; 
   
 	if(!empty($option['link'])){ 
		$output.= '<a href="'.esc_url($option['link']).'">';
	}
	$image = $option['image'];
 
	if(!empty($image['url'])){
		$alt = !empty($image['alt'])?$image['alt']:'';
		$width = !empty($image['width'])?$image['width']:'';
		$height = !empty($image['height'])?$image['height']:'';
		
 		$output.= '<img src="'.esc_url($image['url']).'" width="'.$width.'" height="'.$height.'" alt="'.$alt.'">'; 
	}
	
 	if(!empty($option['link'])){ 
		$output.= '</a>';
	}	
	
    $output.='</div>';
	
	
  
 
 	$css.=sao_margin_horizontal( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>