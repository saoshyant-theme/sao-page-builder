<?php
/*********************************************************************************************
Section Options
*********************************************************************************************/ 
add_action('init','sao_options_section');
function sao_options_section() { 
	global $sao_options_section;
	$section=array();
	
 	if(has_filter('sao_options_section')) {
		$sao_options_section = apply_filters('sao_options_section', $section);
	}
}

add_filter('sao_options_section', 'sao_options_section_array');
function sao_options_section_array( $section ) {
 	
 	$option= array();
 
	$option[]= array( 
		"name"			=> esc_html('Width Row','sao'),
 		"id"			=> "width",
 		"group"			=>  esc_html('Layout','sao'),
		"type"			=> "select",
 		"options"		=>  sao_array_options('width'),
	); 
	
	$option[]= array( 
		"name"			=> esc_html('Boxed Layout','sao'),
 		"id"			=> "boxed",
 		"group"			=>  esc_html('Layout','sao'),
		"type"			=> "checkbox",
 	); 	

	$option[]= array( 
		"name"			=> esc_html('Sticky Columns','sao'),
 		"id"			=> "sticky_columns",
 		"group"			=>  esc_html('Layout','sao'),
		"desc"			=>  esc_html('Sticky Columns is a floating box that stuck to the browsers top when you scroll ','sao'),
		"type"			=> "checkbox",
 	);
		
	$option[]= array( 
		"name"			=> esc_html('Gutter','sao'),
 		"id"			=> "gutter",
 		"group"			=>  esc_html('Layout','sao'),
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
		"name"			=> esc_html('Margin','sao'),  
 		"id"			=> "margin",
 		"group"			=>  esc_html('Layout','sao'),
		"desc"			=>  esc_html('Space the row,Default "0"','sao'),
 		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('margin'),						
 	); 	 
	
	$option[]= array( 
		"name"			=> esc_html('Padding','sao'),
 		"id"			=> "padding",
 		"group"			=>  esc_html('Layout','sao'),
		"desc"			=>  esc_html('Padding around the entire row,Default "0"','sao'),
		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('margin'),						
		 
	);
		
	$option[]= array( 
		"name"			=> esc_html('Background Image','sao'),
 		"id"			=> "background_image",
 		"group"			=>  esc_html('Design','sao'),
  		"type"			=> "image",
 	);	
	
	$option[]= array( 
		"name"			=> esc_html('Background Parallax','sao'),
 		"id"			=> "background_parallax",
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "checkbox",
 	);	
	

	$option[]= array( 
		"name"			=> esc_html('Background Color','sao'),
 		"id"			=> "background_color",
 		"group"			=>  esc_html('Design','sao'),
		"type"			=> "multi_options",
		"options"		=> array(
			array(
				"name"		=>  esc_html('First','sao'),
				"id"		=> "first",
				"type"		=> "color_rgba",
			),
			array(
				"name"		=>  esc_html('Second','sao'),
				"id"		=> "second",
				"type"		=> "color_rgba",
			),
			array(
				"name"		=>  esc_html('Third','sao'),
				"id"		=> "third",
				"type"		=> "color_rgba",
			),	
			array(
				"name"		=>  esc_html('Orientation','sao'),
				"id"		=> "orientation",
				"type"		=> "select",
				"options"	=> array(
					"horizontal"		=>  esc_html('horizontal  →','sao'),
					"vertical"			=>  esc_html('vertical  ↓','sao'),
					"diagonal"			=>  esc_html('diagonal  ↘','sao'),
					"diagonal-bottom"	=>  esc_html('diagonal  ↗','sao'),
					"radial"			=>  esc_html('radial  ○','sao'),
				),
			),						
	
		),
 	);		
	  
		
	$option[]= array( 
		"name"			=> esc_html('Border','sao'),
 		"id"			=> "border",
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('border'),						
	); 	
			
		
	$option[]= array( 
		"name"			=> esc_html('Box Shadow','sao'),
 		"id"			=> "shadow",
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('shadow'),						
			 
	); 	
	 	
	
	$option[]= array( 
		"name"			=> esc_html('Border Radius','sao'),
 		"id"			=> "radius",
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "multi_options",
		"options"		=>  sao_multi_array_options('radius'),						
	 
	); 	 		
			
		
	$option[]= array( 
		"name"			=> esc_html('Section ID','sao'),
 		"id"			=> "section_id",
 		"group"			=>  esc_html('Attribute','sao'),
		"desc"			=>  esc_html('Enter section ID ,','sao').'<a href="https://www.w3schools.com/tags/att_global_id.asp">'.esc_html('Learn more','sao').'</a>',
		"type"			=> "text",
		 
	);
	
	$option[]= array( 
		"name"			=> esc_html('Section Custom Class','sao'),
 		"id"			=> "custom_class",
 		"group"			=> esc_html('Attribute','sao'),
		"desc"			=> esc_html('Enter Class ,','sao'),
		"type"		=> "text",

	);	
	$section[]=$option;
    return $section;
} 
?>