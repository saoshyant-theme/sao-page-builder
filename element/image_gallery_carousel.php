<?php

add_filter('sao_element_options', 'sao_image_gallery_carousel_options');
function sao_image_gallery_carousel_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Image Gallery Carousel','sao'),
 		'id'			=> 'image_gallery_carousel',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/image_carousel.jpg'
  	); 
   

	$option[]= array( 
		"name"			=> esc_html('Upload Image','sao'),
 		"id"			=> "image",
		"desc"			=>  esc_html('You can hold the control button "Ctrl" for Multi select image','sao'),
 		"type"			=> "gallery",
 		   
	);	  
	
	
	$option[]= array( 
		"name"			=> esc_html('Arrows','sao'),
 		"id"			=> "arrows",
 		"group"			=>  esc_html('Slider','sao'),
		"default"		=>  1,
 		"type"			=> "checkbox",
 	); 		
		
	
	$option[]= array( 
		"name"			=> esc_html('Auto Play','sao'),
 		"id"			=> "auto",
 		"group"			=>  esc_html('Slider','sao'),
  		"type"			=> "checkbox",
		"default"		=>  1,
	); 	 	  		 
		 
	
	$option[]= array( 
		"name"			=> esc_html('Animation Speed ,Default "5000"','sao'),
 		"id"			=> "speed",
 		"group"			=>  esc_html('Slider','sao'),
		"default"		=>  '1000',
 		"type"			=> "number",
   		
  	); 	 
	
	
	
	$option[]= array( 
		"name"			=> esc_html('Animation Pause Time','sao'),
 		"id"			=> "pause",
		"default"		=>  '5000',
 		"group"			=>  esc_html('Slider','sao'),
 		"type"			=> "number",
   		
  	); 	  	
  
 
 	$option[]= array( 
		"name"			=> esc_html('Item','sao'),
 		"id"			=> "thumb_item",
 		"default"		=>  5, 
 		"group"			=>  esc_html('Layout','sao'),
		"type"			=> "number",
  		
  	); 	  
 
 
	
	$option[]= array( 
		"name"			=> esc_html('Image Ratio','sao'),
 		"id"			=> "ratio",
 		"group"			=>  esc_html('Layout','sao'),
  		"default"		=>  'sao-ratio100',
		"type"			=> "select",
   		"options"		=>  sao_array_options('ratio4'),						
 		
  	); 	 
  

	$option[]= array( 
		"name"			=> esc_html('Image Size','sao'),
 		"id"			=> "image_size",
		"default"		=>  'large',
 		"group"			=>  esc_html('Layout','sao'),
		"type"			=> "select",
		"options" =>		sao_all_image_sizes(),
 		 
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
	 		  
			 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 
 

add_filter('sao_builder_image_gallery_carousel', 'sao_image_gallery_carousel_config');
function sao_image_gallery_carousel_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';
  	
 	$image =!empty( $option['image'])?$option['image']:'';
   
	$ratio = !empty($option['ratio']) ?$option['ratio'] : 'sao-ratio75';
  
 	//OutPut
		$image_size = !empty($option['image_size']) ? $option['image_size']: 'full';
		
    $output.='<div class="sao-slider sao-image-gallery   '.esc_attr($ratio).'  sao-carousel  sao-image-gallery-carousel   ">'; 
 	$output.= '<div class="sao-slider-list" >'; 
 	if(!empty($option['image'])){
 	foreach($option['image'] as  $value) :
		$output.='<div class="sao-image-item">'; 
 		$output.='<div class="sao-image-warp">'; 
		$full = wp_get_attachment_image_src($value, 'full');
 		$output.='<a class="sao-thumb"  href="'.esc_url($full[0]).'">'; 
		
			$thumb = wp_get_attachment_image_src($value,$image_size);
	 
			$output.= '<img  src="'.esc_url($thumb[0]).'"  width="'.esc_attr($thumb[1]).'" height="'.esc_attr($thumb[2]).'"  >'; 
 		$output.='</a>';
 		$output.='</div>';
 		$output.= '</div>'; 
 	endforeach;
	} 
 	
	$output.= '</div>'; 
	
 	
	$slider_options = array( 
   					
		"responsive"		=>  
 			array( 
				"breakpoint"		=> 1240,
				"settings"			=> 
					array( 
						"controls"		=> true,
					),
			),
			array( 
				"breakpoint"		=> 768,
				"settings"			=> 
					array( 
						"controls"		=> true,
					),
			),
			
 			
	); 	
	
	 
 	
 	$slider_options['speed']=  !empty($option['speed']) ? $option['speed'] : '2000';
	
 	$slider_options['pause']= !empty($option['pause']) ? $option['pause'] : '5000';
	
	
	$thumbItem = !empty($option['thumb_item']) ? $option['thumb_item'] : 4;

	$slider_options['pager']= false;	
	$slider_options['timer']= false;	
 	$slider_options['controls']=!empty($option['arrows']) ? $option['arrows'] : '';
	$slider_options['auto']=  !empty($option['auto']) ? $option['auto'] : '';
	
 	 $output.= sao_lightslider($thumbItem,$slider_options);

    $output.='</div>';
 	
  
 
	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>