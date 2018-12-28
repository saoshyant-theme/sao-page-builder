<?php
add_filter('sao_element_options', 'sao_widgets_options');
function sao_widgets_options( $element ) {
	$option = array();
	 
 	$item = array(
 		'name'			=> 	esc_html('Widgets','sao'),
 		'id'			=> 'widgets',
		'img'			=>  plugin_dir_url( __DIR__ ).'assets/image/widgets.jpg'
  	); 
   	$option[]= array( 
		"name"			=> esc_html('Choose Widget area','sao'),
 		"id"			=> "widgets",
  		"type"			=> "select",
		"options"		=>  sao_array_options('sidebars'),						
 	); 
	 
	
 	$option[]= array( 
		"name"			=> esc_html('Padding','sao'),
 		"id"			=> "padding",
  		"group"			=>  esc_html('Layout','sao'),
		"default"		=>  array( 
			"top"			=> '0',
			"left"			=> '0',
			"bottom"		=> '0',
			"right"			=> '0',
 			), 
		
		"type"			=> "multi_options",
 		"options"		=>  sao_multi_array_options('margin'),						
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

add_filter('sao_builder_perview_widgets', 'sao_builder_perview_widgets');
function sao_builder_perview_widgets( $args ) {

	
	$key = $args['key'];
		$output='';
		$css='';

		$output ='<img src="'.plugin_dir_url( __DIR__ ).'assets/image/widgets.jpg">'; 
		$css.= '.sao-element-'.$key.' {text-align: center;}'; 
  	$return['css']= $css;
	$return['output']= $output;
	return $return;
}
add_filter('sao_builder_widgets', 'sao_widgets_config');
function sao_widgets_config( $args ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css =''; 
 
	ob_start(); 
   	$widgets = !empty( $option[ 'widgets' ] ) ? $option[ 'widgets' ] : '';
	
	if ( is_active_sidebar( $widgets ) ) : 
		echo '<section class="sao-custom-widget sao-sidebar" >';
		dynamic_sidebar( sanitize_title($widgets) ); 
		echo '</section>';
	endif;
		
	$output.=ob_get_clean();  	
	
 
 	//Title Box Css
 	$item = 'body .sao-element-'.$key.'.sao-element-item .sao-custom-widget.sao-sidebar'; 
	//TexT Css 
	$link ='';
	$link.= sao_builder_color($option,'link_color'); 
 	$css.= sao_builder_item_css($link,$item.' a');	
	$text ='';
	$text.= sao_builder_color($option,'text_color'); 
 	$css.= sao_builder_item_css($text,$item.'  p,'.$item.' ,'.$item.'input,'.$item.' select,'.$item.'  textarea,'.$item.' .widget,'.$item.' *');	
 	
 	$css.=sao_element_padding( $key,$option); 
 	
   	$return['output']= $output;
  	$return['css']= $css;
	
	return $return;	
}
 
?>