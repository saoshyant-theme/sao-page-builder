<?php

add_filter('sao_element_options', 'sao_notification_box_options');
function sao_notification_box_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Notfifcation Box','sao'),
 		'id'			=> 'notification_box',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/notification.jpg'
  	); 
   
   $option[]= array( 
		"name"			=> esc_html('Icon','sao'),
 		"id"			=> "icon",
  		"default"		=> "fa-check-circle",
 		"type"			=> "icon",
		
 	);	  
  
	$option[]= array( 
		"name"			=> esc_html('Content','sao'),
 		"id"			=> "content",
  		"default"		=> 'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud',
 		"type"			=> "textarea",
 		  
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
		"default"		=>  array( 
 			"size"		=> '1',
			"style"				=> 'solid',
			"color"				=> '#cccccc',
			), 			
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
		"name"			=> esc_html('Icon Color','sao'),
 		"id"			=> "icon_color", 
  		"group"			=>  esc_html('Style Options','sao'),
 		"type"			=> "color_rgba", 
		
  	); 	
	
	$option[]= array( 
		"name"			=> esc_html('Content Color','sao'),
 		"id"			=> "content_color",
 		"group"			=>  esc_html('Design','sao'),
		"default"		=>  array( 
 			"background"		=> '#f2f2f2',
			"text"				=> '#333333',
			), 	
  		"type"			=> "multi_options",
		"options"		=> array(

			array( 
 				"name"			=> 	esc_html('Background','sao'),
 				"id"			=> "background",
  				"type"			=> "color_rgba",
  			),		
			 array( 
				"name"			=> esc_html('Text','sao'),			
  				"id"			=> "text",
				"type"			=> "color_rgba",
 			),
 	  
			),		
		
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
		"name"			=> esc_html('Content Font Size','sao'),
 		"id"			=> "content_font_size",
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




add_filter('sao_builder_notification_box', 'sao_notification_box_config');
function sao_notification_box_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';
	$icon  =!empty($option['icon'])? ' has-post-thumbnail ':'';
	
	
 
 

	$output.='<div class="sao-notification-box sao-icon-text '.esc_attr($icon).' sao-post ">'; 
     
	if(!empty($option['icon'])) { 
		$output.='<div class="sao-icon">';
  		
           $output.='<i  class="'.esc_attr($option['icon']).' sao-font-large  "></i>';
		  
		$output.='</div>';
	}  
        
	$output.='<div class="sao-details sao-auto-width-item">';
	 
		if(!empty($option['content'])){ 
			$output.='<div class="sao-excerpt  sao_text_block sao-font-medium">'.esc_html($option['content']) .'</div>';
       	}
		
      $output.='</div>';
    $output.='</div>';

 	$item = '.sao-element-'.$key.' '; 
	$notification_css='';
	
	$notification_css.= sao_builder_border_mini($option,'border'); 
	$notification_css.= sao_builder_radius_mini($option,'radius'); 
	$notification_css.= sao_builder_background_color($option,'content_color','background'); 
 	$css.= sao_builder_item_css($notification_css,$item.' .sao-notification-box');	
	
	//Content Css
	$content_css='';	
	$content_css.= sao_builder_color($option,'content_color','text'); 
	$content_css.= sao_builder_font_size($option,'content_font_size'); 
 	$css.= sao_builder_item_css($content_css,$item.' .sao-excerpt');
	
	//ICon Css
	$icon_css='';	
	$icon_css.= sao_builder_color($option,'icon_color'); 
	$icon_css.= sao_builder_font_size($option,'icon_font_size'); 
 	$css.= sao_builder_item_css($icon_css,$item.' .sao-icon i');	
	
 
	
	
  
 
  	$css.=sao_element_padding( $key,$option); 
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>