<?php
function sao_element_config($post_id,$column_key) {

	$output='';
	$css='';
	$script='';
	$element_json = get_post_meta($post_id, 'sao_element', true);
  	$element= sao_options_array_row($element_json);	
	
	if(!empty($element)):
	foreach($element as $element_key=> $element_value):  
		if($element_value['childern'] == $column_key){ 
			$element_option = sao_options_decode(urldecode($element_value['option']));
			$output.= '<aside  class="sao-element-'.esc_attr($element_key).' sao-element-item sao_element_'.esc_attr($element_value['value']).' sao-auto-width ">';
				$args['key'] = $element_key;
				$args['option'] = $element_option;
				if(has_filter('sao_builder_'.$element_value['value'])) {
					$filter =apply_filters('sao_builder_'.$element_value['value'], $args);
					$output.=!empty($filter['output'])?$filter['output']:'';
					$css.=!empty($filter['css'])?$filter['css']:'';
					$script.=!empty($filter['script'])?$filter['script']:'';
													 
				}
						
			$output.= '</aside>';
		} 
		
	endforeach;			
	endif;	
 
			 
	$return['css'] = $css;
	$return['output']= $output;
	$return['script']= $script;
  	return $return;				 
  
}  
 add_filter('sao_builder_color_box', 'sao_color_box_config');
function sao_color_box_config( $args) {
	$option = $args['option'];
	$output='';
	$css='';
	if(!empty($option['color'])){
		$output.= $option['color'];
	}	

	$css.='.sao-element-'.$args['key'].' {	background: '.$option['color'].';}';
	$return['css'] = $css;
	$return['output']= $output;
	
	
	return $return;			
}
 

?>