<?php

add_filter('sao_element_options', 'sao_image_gallery_slider_options');
function sao_image_gallery_slider_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Image Gallery Slider','sao'),
 		'id'			=> 'image_gallery_slider',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/image_gallery_slider.jpg'
  	); 
   

	$option[]= array( 
		"name"			=> esc_html('Upload Image','sao'),
 		"id"			=> "image",
 		"type"			=> "gallery",
		"desc"			=>  esc_html('You can hold the control button "Ctrl" for Multi select image','sao'),
	);	 
	
	$option[]= array( 
		"name"			=> esc_html('Pager','sao'),
 		"id"			=> "pager",
		"default"		=>  1,
 		"group"			=>  esc_html('Slider','sao'),
  		 "fold"			=> array( "normal" => "layout"),
 		"type"			=> "checkbox",
 	); 		
	
	$option[]= array( 
		"name"			=> esc_html('Position Pager','sao'),
 		"id"			=> "pager_position",
 		"group"			=>  esc_html('Slider','sao'),
		"fold"			=> array( 1 => 'pager'  ),
 		"type"			=> "select",
		"options"		=> array( 
			"top" =>  esc_html('Top','sao'),
			"bottom" =>  esc_html('Bottom','sao')
		),
  		
  	); 	 	
	$option[]= array( 
		"name"			=> esc_html('Arrows','sao'),
 		"id"			=> "arrows",
 		"group"			=>  esc_html('Slider','sao'),
		"default"		=>  1,
 		"type"			=> "checkbox",
 	); 		
		
	$option[]= array( 
		"name"			=> esc_html('Timer','sao'),
 		"id"			=> "timer",
		"default"		=>  1,
 		"group"			=>  esc_html('Slider','sao'),
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
		"name"			=> esc_html('Slider Effect','sao'),
 		"id"			=> "effect",
 		"group"			=>  esc_html('Slider','sao'),
   		"fold"			=> array( "horizontal" => "layout" , "normal" => "layout"),
		"type"			=> "select",
    		"options"		=>  array( 
			"slide"			=> esc_html('Slide','sao'),
 			"fade"			=> esc_html('Fade','sao'),
		),
  	); 	 
  	 
	$option[]= array( 
		"name"			=> esc_html('Animation Speed ,Default "5000"','sao'),
 		"id"			=> "speed",
		"default"		=>  '1000',
 		"group"			=>  esc_html('Slider','sao'),
 		"type"			=> "number",
   	); 	 
	
	$option[]= array( 
		"name"			=> esc_html('Animation Pause Time','sao'),
 		"id"			=> "pause",
 		"group"			=>  esc_html('Slider','sao'),
		"default"		=>  '5000',
 		"type"			=> "number",
   		
  	); 	   	
	 

	  
	  
 
	$option[]= array( 
		"name"			=> esc_html('Layout','sao'),
 		"id"			=> "layout",
 		"group"			=>  esc_html('Layout','sao'),
		"default"		=>  'horizontal', 
		"type"			=> "radio_image",
   		"options"		=>  array( 
 			"normal"	=> plugin_dir_url( __DIR__ ).'assets/image/image.jpg',
 			"horizontal"	=> plugin_dir_url( __DIR__ ).'assets/image/image_gallery_slider.jpg',
			"vertical"		=> plugin_dir_url( __DIR__ ).'assets/image/image_gallery_slider_vertical.jpg',
 		),	 						
 		
  	); 	 
 	$option[]= array( 
		"name"			=> esc_html('Item','sao'),
 		"id"			=> "thumb_item",
 		"default"		=>  4, 
  		"fold"			=> array( 
			"horizontal" => "layout" ,
			 "vertical" => "layout"
		),
 		"group"			=>  esc_html('Layout','sao'),
		"type"			=> "number",
  		
  	); 	 
	
	 
	
	
	$option[]= array( 
		"name"			=> esc_html('Height','sao'),
 		"id"			=> "height",
		"default"		=>  '400',
 		"group"			=>  esc_html('Layout','sao'),
		"type"			=> "select",
   		"options"		=>  sao_array_options('height'),						
 		
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
 


add_filter('sao_builder_image_gallery_slider', 'sao_image_gallery_slider_config');
function sao_image_gallery_slider_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';
  	
 	$image =!empty( $option['image'])?$option['image']:'';
   
	$height = !empty($option['height']) ?$option['height'] : '400';
  
 	//OutPut
	$layout = !empty($option['layout']) ?$option['layout'] : '';
	if($layout =='horizontal'){
		$class= ' sao-horizontal-thumb sao-bottom-thumb ';
	}elseif($layout =='vertical'){
  		$class= ' sao-vertical-thumb sao-bottom-thumb ';
	
	}else{
  		$class= ' ';
	}
	
	
	$image_size = !empty($option['image_size']) ? $option['image_size']: 'full';
	$pager_position = !empty($option['pager_position']) ? ' sao-pager-'.$option['pager_position']: ' sao-pager-top';
 	  
		
    $output.='<div class="sao-slider sao-image-gallery '.esc_attr($class.$pager_position).' sao-image-gallery-slider  sao-'.esc_attr($height).'px ">'; 
 	$output.= '<div class="sao-slider-list" >'; 
 	if(!empty($option['image'])){
 	foreach($option['image'] as  $value) :
		$output.='<div class="sao-image-item">'; 
		
			$full = wp_get_attachment_image_src($value, 'full');
 		$output.='<a class="sao-thumb"  href="'.esc_url($full[0]).'">'; 
		
			$thumb = wp_get_attachment_image_src($value,$image_size);
	 
			$output.= '<img  src="'.esc_url($thumb[0]).'"  width="'.esc_attr($thumb[1]).'" height="'.esc_attr($thumb[2]).'"  >'; 
 		$output.='</a>';
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
	
	 
 	$slider_options['mode']= !empty($option['effect']) ? $option['effect'] : 'slide';
  	$slider_options['speed']= !empty($option['speed']) ? (int)$option['speed'] : 2000;
  	$slider_options['pause']= !empty($option['pause']) ? (int)$option['pause'] : 5000;;	
 	$slider_options['auto']= !empty($option['auto']) ? $option['auto'] :'';	
	
	
	$thumbItem = !empty($option['thumb_item']) ? (int)$option['thumb_item'] : 6;


 	if($layout == 'horizontal') {
		$slider_options['gallery']= true;
		$slider_options['gallery_thumb']= true;
  		$slider_options['thumbItem']= $thumbItem;
		
	}elseif($layout == 'vertical') {
 		 $slider_options['mode'] ='slide';
		$slider_options['gallery']= true;
		$slider_options['gallery_thumb']= true;
  		$slider_options['vertical']= true;
  		$slider_options['vThumbWidth']= 120;
  		$slider_options['verticalHeight']= (int)$height;
  		$slider_options['thumbItem']= (int)$thumbItem;
	}
	
	 
	$slider_options['pager']=  !empty($option['pager']) ? $option['pager'] : '';
  	$slider_options['controls']=!empty($option['arrows']) ? $option['arrows'] : '';
  	$slider_options['timer']= !empty($option['timer']) ? $option['timer'] : '';		
	
 	$output.= sao_lightslider('1',$slider_options);

    $output.='</div>';
 	
  
 
	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>