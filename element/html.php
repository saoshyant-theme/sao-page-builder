<?php

add_filter('sao_element_options', 'sao_html_options');
function sao_html_options( $element ) {
	$option = array();
	
 	$item = array(
 		'name'			=> 	esc_html('Html','sao'),
 		'id'			=> 'html',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/html.jpg'
  	); 
   
	 
	$option[]= array( 
		"name"			=> esc_html('Code','sao'),
 		"id"			=> "content",
  		"desc"			=> esc_html('input html Code','sao'),
 		"type"			=> "textarea",
 		  
	);
   
 	 
	$option[]= array( 
		"name"			=> esc_html('link Color','sao'),
 		"id"			=> "link_color", 
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "color_rgba", 
		
  	); 	
		
  	$option[]= array( 
		"name"			=> esc_html('Text Color','sao'),
 		"id"			=> "text_color", 
 		"group"			=>  esc_html('Design','sao'),
 		"type"			=> "color_rgba", 
		
  	); 	
		
	 
 	$item['options']=$option;
	$element[]=$item;
    return $element;
} 
 

add_filter('sao_builder_html', 'sao_html_config');
function sao_html_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';  
	 
 
  	
	//Title Css
   	
	if(!empty($option['content'])){
	$output.= '<article class="sao_html sao_text_block">';
 	$output.= wp_kses_post($option['content']);
	$output.='</article>';
	}
 		
 	//TexT Css 
		$item = '.sao-element-'.$key.'.sao-element-item .sao-content'; 

	$link ='';
	$link.= sao_builder_color($option,'link_color'); 
 	$css.= sao_builder_item_css($link,$item.'  a');	
	$text ='';
	$text.= sao_builder_color($option,'text_color'); 
 	$css.= sao_builder_item_css($text,$item.'  p,'.$item.' ,'.$item.'input,'.$item.' select,'.$item.'  textarea,'.$item.' .widget,'.$item.' *');	
	
	
 	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>