<?php

add_filter('sao_element_options', 'sao_text_block_options');
function sao_text_block_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Text Block','sao'),
 		'id'			=> 'text_block',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/text_block.jpg'
  	); 
 
	$option[]= array( 
		"name"			=> "Content",
  		"id"			=> "content",
  		"default"		=> "<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim</p>",
		"type"			=> "editor", 
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

 
add_filter('sao_builder_text_block', 'sao_text_block_config');
function sao_text_block_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';
  	
	if(!empty($option['content'])){
	$output.= '<article class="sao_text_block ">';
 	$output.= wp_kses_post($option['content']);
	$output.='</article>';
	}
 		
 	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}


?>