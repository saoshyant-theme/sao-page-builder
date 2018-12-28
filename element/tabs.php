<?php

add_filter('sao_element_options', 'sao_tabs_options');
function sao_tabs_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Tabs','sao'),
 		'id'			=> 'tabs',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/tabs.jpg'
  	); 
   
 	$default=array(
		'a'.rand(100000000, 999999999)	=>  array( 
			'title' =>  "Tabs 1",
			'content' =>  "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa"
		 
			),
		'a'.rand(100000000, 999999999)	=> array( 
			'title' =>  "Tabs 2",
			'content' =>  "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa"
 			),
		'a'.rand(100000000, 999999999)	=> array( 
			'title' =>  "Tabs 3",
			'content' =>  "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa",
 			), 		 
		 
		 
		);

 	$option[]= array( 
		"name"			=> esc_html('tabs','sao'),
 		"id"			=> "tabs",
  		"desc"			=>  esc_html('Add tabs','sao'),
		"type"			=> "list",
		"default"		=> $default,
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
		"default"		=>  array( 
 			"background"		=> '#ffffff',
			"text"				=> '#666666',
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
		"name"			=> esc_html('Active Heading Color','sao'),
 		"id"			=> "heading_active_color",
 		"group"			=>  esc_html('Design','sao'),
		"default"		=>  array( 
 			"background"		=> '#ffffff',
			"text"				=> '#111111',
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
		"name"			=> esc_html('Content Color','sao'),
 		"id"			=> "content_color",
 		"group"			=>  esc_html('Design','sao'),
		"default"		=>  array( 
 			"background"		=> '#ffffff',
			"text"				=> '#666666',
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
 
add_filter('sao_builder_tabs', 'sao_tabs_config');
function sao_tabs_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css =''; 
	

 
	 


		$output.='<div  class="sao-tabs-warp sao-auto-width-item">'; 
			$count = 0;
			$count_2 = 0;
  			if(!empty($option['tabs'])){
				$output.= '<div class="sao-tabs-heading "  >';
  				foreach($option['tabs'] as $keys => $value) {

					$count++;
					$tabs_active = $count==1 ? 'sao-tabs-active' : ' sao-tabs-deactive';
 
					if(!empty($value['title'])) {
 						$output.= '<h3 data-key="'.esc_attr($keys).'" class="sao-tabs-heading-item '.esc_attr($tabs_active).'">';
						$output.= '<span class="sao-font-medium">'.esc_html($value['title']).'</span>';
 						$output.= '</h3>';
						 
  					}
					
				}
				$output.= '</div>';

				$output.= '<div class="sao-tabs-content-warp " >';
 
				foreach($option['tabs'] as $keys => $value) {
					$count_2++;
					$tabs_content_active = $count_2==1 ? 'sao-tabs-content-active' : ' sao-tabs-content-deactive';

 					if(!empty($value['title'])) {
					 
						if(!empty($value['content'])){
	
						$output.= '<div class="sao-tabs-content '.esc_attr($tabs_content_active).' sao-font-medium" data-key="'.esc_attr($keys).'"   >';
							$output.=  esc_html($value['content']);
  						$output.= '</div>';
						}
  					}
					
				}
				$output.= '</div>';
				
			}
				 
 
  		$output.= '</div>';



 	$item = '.sao-element-'.$key.' '; 
  
	//Tabs Css
	$tabs_css='';
	
 	if(!empty($option['radius']['size'])){
		$radius_unit = !empty($option['radius']['unit']) ? $option['radius']['unit'] : 'px';
		$radius_size = intval(isset($option['radius']['size'])) ? $option['radius']['size'].$radius_unit.' ': ' ';
		$tabs_css.= ' border-radius: '.$radius_size.'  '.$radius_size.' 0px 0px;';
		$css.= '.sao-element-'.$key.' .sao-tabs-heading h3  {'.$tabs_css.'}'; 
	}
 	$css.= sao_builder_item_css($tabs_css,$item.' .sao-tabs-heading h3 ');	
 		
	
	//Text Css
	if(!empty($option['border']['size'])){ 
			$border_unit = !empty($option['border']['unit']) ?$option['border']['unit'] : 'px';
 			$border_width = intval(isset($option['border']['size'])) ? $option['border']['size'].$border_unit.'' : '0';		
			$border_style = !empty($option['border']['style']) ? $option['border']['style']: '';		
			$border_color = !empty($option['border']['color']) ? $option['border']['color'] : '';		
			$css.= ' .sao-element-'.$key.' .sao-tabs-content-warp { border:'.$border_width.' '.$border_style.' '.$border_color.'; margin-top: -'.$border_width.';}';
			$css.= ' .sao-element-'.$key.' .sao-tabs-heading h3 { border-width:'.$border_width.' '.$border_width.' 0px '.$border_width.' !important; border-style:'.$border_style.';  border-color:'.$border_color.';}';
 	} 
 	//Headeing  Css
	$heading_css='';
	$heading_css.= sao_builder_color($option,'heading_color','text');  
	$heading_css.= sao_builder_background_color($option,'heading_color','background');  
	$css.= sao_builder_item_css($heading_css,$item.'  .sao-tabs-heading-item ');	
	
 	//Active Font Css
	$heading_active_css='';
	$heading_active_css.= sao_builder_color($option,'heading_active_color','text');  
	$heading_active_css.= sao_builder_background_color($option,'heading_active_color','background');  
	$css.= sao_builder_item_css($heading_active_css,$item.' .sao-tabs-active,'.$item. ' .sao-tabs-heading-item:hover');	
 	
 	//Title Font Css
	$title_css='';
	$title_css.= sao_builder_font_size($option,'title_font_size','text'); 
	$css.= sao_builder_item_css($title_css,$item.' .sao-tabs-heading-item ,'.$item.' .sao-tabs-heading-item span');	
 
 	//Content Css
 	$content_css='';
	$content_css.= sao_builder_color($option,'content_color','text');  
	$content_css.= sao_builder_background_color($option,'content_color','background'); 
	$css.= sao_builder_item_css($content_css,$item.' .sao-tabs-content-warp ');
		
 	//Content Font Css
	$content_font_css='';
	$content_font_css.= sao_builder_font_size($option,'content_font_size'); 
	$css.= sao_builder_item_css($content_font_css,$item.' .sao-tabs-content ');	
	  
  
	
	 
	 
 
  	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>