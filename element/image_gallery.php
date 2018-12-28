<?php

add_filter('sao_element_options', 'sao_image_gallery_options');
function sao_image_gallery_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Image Gallery','sao'),
 		'id'			=> 'image_gallery',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/image_gallery.jpg'
  	); 
   

	$option[]= array( 
		"name"			=> esc_html('Upload Image','sao'),
 		"id"			=> "image",
 		"type"			=> "gallery",
		"desc"			=>  esc_html('You can hold the control button "Ctrl" for Multi select image','sao'),

		 
 		   
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
 		"default"		=> array('size'=> '100'),
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
 		"default"		=> array('size'=> '100'),
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
		"name"			=> esc_html('Image Size','sao'),
 		"id"			=> "image_size",
 		"group"			=>  esc_html('Layout','sao'),
		"type"			=> "select",
		"options" 		=>	sao_all_image_sizes(),
 		 
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
		 		
			 
			 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 
 
add_filter('sao_builder_image_gallery', 'sao_image_gallery_config');
function sao_image_gallery_config( $args ) {
 
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
		$css.= '.sao-element-'.$key.' .sao-image-item  {'. $border_width.$border_style.$border_color.'}';
  	}  
	$css.= ' .sao-element-'.$key.' .sao-image-item {'.$image_css.'}';
	$alignment = !empty($option['alignment']) ?' sao_alignment_'.$option['alignment'] : '';
	$image_size = !empty($option['image_size']) ? $option['image_size']: 'full';
	
	 
  
 	//OutPut
     $output.='<div class="sao-image-gallery '.esc_attr($alignment).'">'; 
	$output.='<div class="sao-image">'; 
		if(!empty($option['image'])){
		foreach($option['image'] as $keys => $value) :
 			$output.='<div class="sao-image-item">'; 
					$full = wp_get_attachment_image_src($value, 'full');

					$output.='<a class="sao-image-warp" href="'.esc_url($full[0]).'">'; 
					$thumbnail = wp_get_attachment_image_src($value, $image_size);
					$output.= '<img  src="'.esc_url($thumbnail['0']).'"  width="'.esc_attr($thumbnail[1]).'" height="'.esc_attr($thumbnail[2]).'"  >'; 
			$output.= '</a>'; 
			$output.= '</div>'; 
		endforeach;
		} 
	$output.= '</div>'; 
	$output.='</div>';
	
	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>