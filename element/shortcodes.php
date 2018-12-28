<?php

add_filter('sao_element_options', 'sao_shortcodes_options');
function sao_shortcodes_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Shortcodes','sao'),
 		'id'			=> 'Shortcodes',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/shortcodes.jpg'
  	); 
 
	$option[]= array( 
		"name"			=> "Content",
  		"id"			=> "content",
		"desc"			=> esc_html('input ShortCode','sao'),

		"type"			=> "textarea", 
	);  
	   

	$option[]= array( 
		"name"			=> esc_html('Padding','sao'),
 		"id"			=> "padding",
  		"desc"			=>  esc_html('Padding around the entire ,Default "0"','sao'),
 		"group"			=>  esc_html('Layout','sao'),
 		"default"		=>  array( 
				"top"		=> 20,
				"left"		=> 20,
				"bottom"	=> 20,
				"right"		=> 20,
  						) ,  
 		"type"			=> "multi_options",
  		"options"		=>  sao_multi_array_options('margin'),						
		  
	);	
 
 	
			 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 

  

add_filter('sao_shortcodes', 'sao_shortcodes_config');
function sao_shortcodes_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
 
	if(!empty($option['content'])){
	$output.= '<article class="sao_shortcodes ">';
 	$output.=do_shortcode($option['content']);
	$output.='</article>';
	}
 	
		
 	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}


?>