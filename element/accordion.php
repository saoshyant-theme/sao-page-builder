<?php

add_filter('sao_element_options', 'sao_accordion_options');
function sao_accordion_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Accordion','sao'),
 		'id'			=> 'accordion',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/accordion.jpg'
  	); 
   
 	$default=array(
		'a'.rand(100000000, 999999999)	=>  array( 
			'title' =>  "Accordion 1",
			'content' =>  "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa"
		 
			),
		'a'.rand(100000000, 999999999)	=> array( 
			'title' =>  "Accordion 2",
			'content' =>  "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa"
 			),
		'a'.rand(100000000, 999999999)	=> array( 
			'title' =>  "Accordion 3",
			'content' =>  "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa",
 			), 		 
		 
		 
		);

 
 	$option[]= array( 
		"name"			=> esc_html('Accordion','sao'),
 		"id"			=> "accordion",
		"default"		=> $default,

		"type"			=> "list",
 		"options"		=>  array(
			 array(
  				"name"		=>  esc_html('Title','sao'),
  				"id"		=> "title",
 				"type"		=> "text",
 			),
			 array(
  				"name"		=>  esc_html('Content','sao'),
  				"id"		=> "content",
 				"type"		=> "textarea",
 			),	 
 			 		
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
		"name"			=> esc_html('Heading Color','sao'),
 		"id"			=> "heading_color",
 		"group"			=>  esc_html('Design','sao'),
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
		"name"			=> esc_html('Active Heading Color','sao'),
 		"id"			=> "heading_active_color",
 		"group"			=>  esc_html('Design','sao'),
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
		"name"			=> esc_html('Content Color','sao'),
 		"id"			=> "content_color",
 		"group"			=>  esc_html('Design','sao'),
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
		"name"			=> esc_html('Title Font Size','sao'),
 		"id"			=> "title_font_size",
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
		"name"			=> esc_html('Font Weight Title','sao'),
 		"id"			=> "title_font_weight",
  		"group"			=>  esc_html('Typography','sao'),
		"type"			=> "select",
		"options"		=>  array( 
			"normal"		=> esc_html('Normal','sao'),
			"bold"			=> esc_html('Bold','sao'),
			) ,
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

 

add_filter('sao_builder_accordion', 'sao_accordion_config');
function sao_accordion_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';
 
  
 	$output.='<div  class="sao-accordion-warp sao-auto-width-item ">'; 
  			if(!empty($option['accordion'])){
 				foreach($option['accordion'] as $keys => $value) {

 
					if(!empty($value['title'])) {
					$output.= '<div class="sao-accordion-item sao-accordion-deactive   sao-accordion-item-'.esc_attr($keys).'  ">';
						$output.= '<h3 data-id="'.esc_attr($keys).'">';
						$output.= '<span class="sao-font-medium">'.esc_html($value['title']).'</span>';
						$output.= '<i class="sao-accordion-icon sao-font-medium"></i>';
						$output.= '</h3>';
						if(!empty($value['content'])){
						$output.= '<div class="sao-accordion-content sao-font-medium" data-id="'.esc_attr($keys).'" >';
							$output.=  esc_html($value['content']);
  						$output.= '</div>';
						}
  					$output.= '</div>';
 	 
					}
					
				}
			}
  
	$output.= '</div>';
   
   

 	$item = '.sao-element-'.$key.' '; 
  
	//Accordion Css
	$accordion_css='';
	$accordion_css.= sao_builder_radius_mini($option,'radius');  
	$accordion_css.= sao_builder_border_mini($option,'border');  
	$css.= sao_builder_item_css($accordion_css,$item.' .sao-accordion-item ');	
 	
	//Heading
	$heading_css='';
	$heading_css.= sao_builder_color($option,'heading_color','text');  
	$heading_css.= sao_builder_background_color($option,'heading_color','background');  
	$css.= sao_builder_item_css($heading_css,$item.' .sao-accordion-item  h3 ');	
 	
	//Heading
	$heading_active_css='';
	$heading_active_css.= sao_builder_color($option,'heading_active_color','text');  
	$heading_active_css.= sao_builder_background_color($option,'heading_active_color','background');  
	$css.= sao_builder_item_css($heading_active_css,$item.' div.sao-accordion-item.sao-accordion-active h3,'.$item.' div.sao-accordion-item.sao-accordion-deactive h3:hover ');	
 	
	 
	//Title
	$title_css='';
	$title_css.= sao_builder_font_size($option,'title_font_size');  
	$css.= sao_builder_item_css($title_css,$item.' .sao-accordion-item  h3 span,'.$item.' .sao-accordion-item  h3 i');	
	  
	//Content
 	$content_css='';
	$content_css.= sao_builder_color($option,'content_color','text');  
	$content_css.= sao_builder_background_color($option,'content_color','background');  
	$content_css.= sao_builder_font_size($option,'content_font_size','background');  
	$css.= sao_builder_item_css($content_css,$item.'  .sao-accordion-item  .sao-accordion-content ');	
 		
	 
 	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>