<?php
 

function sao_options_column() { 
	global $sao_options_column;
 
	$column=array();
	// Carousel Slider 1 Column
 	if(has_filter('sao_options_column')) {
		$sao_options_column = apply_filters('sao_options_column', $column);
	}
 				 
 
}
add_action('init','sao_options_column');


 
add_filter('sao_options_column', 'sao_options_column_1');
function sao_options_column_1( $column ) {
 	
 $option= array();
  
 
	$option[]= array( 
		"name"			=> esc_html('Padding','sao'),
 		"id"			=> "padding",
		"desc"			=>  esc_html('Padding around the entire row,Default "0"','sao'),
 		"group"			=>  esc_html('Layout','sao'),
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
		"name"			=> esc_html('Background Color','sao'),
 		"id"			=> "background_color",
 		"group"			=>  esc_html('Design','sao'),
		"type"		=> "multi_options",
		"options"	=> array(
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
	  
 
	$option[]=  array( 
		"name"			=> esc_html('Column in Desktop','sao'),
 		"id"			=> "desktop",
 		"desc"			=> esc_html('You can select Column in Desktop Devices,Resolution max 1199px and min 992px','sao'),
 		"group"			=> esc_html('Responsive','sao'),
 		"type"			=> "select",
		"options"		=>  sao_array_options('columns'),
  	);
	
	$option[]=  array( 
		"name"			=> esc_html('Column in Tablet','sao'),
 		"id"			=> "tablet",
 		"desc"			=> esc_html('You can select Column in Tabel Devices,Resolution max 991px and min 768px','sao'),
 		"group"			=> esc_html('Responsive','sao'),
 		"type"			=> "select",
		"options"		=>  sao_array_options('columns'),
  	);	
	
	$option[]=  array( 
		"name"			=> esc_html('Column in Fablet','sao'),
 		"id"			=> "phablet",
 		"desc"			=> esc_html('You can select Column in Phablet Devices ,Resolution max 767px and min 501px','sao'),
 		"group"			=> esc_html('Responsive','sao'),
 		"type"			=> "select",
		"options"		=>  sao_array_options('columns'),
  	);	
		
	$option[]=  array( 
		"name"			=> esc_html('Column in Phone','sao'),
 		"id"			=> "phone",
 		"desc"			=> esc_html('You can select Column in Phone Devices,Resolution max 500px','sao'),
 		"group"			=> esc_html('Responsive','sao'),
 		"type"			=> "select",
		"options"		=>  sao_array_options('columns'),
  	);	
		 
   
	$option[]= array( 
		"name"			=> esc_html('Column ID','sao'),
 		"id"			=> "column_id",
 		"group"			=>  esc_html('Attribute','sao'),
		"desc"			=>  esc_html('Enter Column ID ,','sao').'<a href="https://www.w3schools.com/tags/att_global_id.asp">'.esc_html('Learn more','sao').'</a>',
		"type"			=> "text",
		 
	);
	
	$option[]= array( 
		"name"			=> esc_html('Column Custom Class','sao'),
 		"id"			=> "custom_class",
 		"group"			=>  esc_html('Attribute','sao'),
		"desc"			=>  esc_html('Enter Class ,','sao'),
		"type"		=> "text",

	);	
  
	$column[]=$option;
    return $column;
} 
 

?>