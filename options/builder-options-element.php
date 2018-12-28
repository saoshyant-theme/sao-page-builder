<?php
/*********************************************************************************************
ELEMENT Options
*********************************************************************************************/
function sao_options_element() { 
 
	global $sao_options_element;
	
	$element=array();
 
		if(has_filter('sao_element_options')) {
			$sao_options_element = apply_filters('sao_element_options', $element);
		}
  				 
 
}
  
	add_action('init','sao_options_element');
 
add_action('wp_ajax_sao_element_perview', 'sao_element_perview');
add_action('wp_ajax_nopriv_sao_element_perview', 'sao_element_perview');
function sao_element_perview($val =false,$opt =false){
	
 	
	if(!empty($_REQUEST['default'])){
		$value = $val;
  		$option = $opt;
	}elseif(!empty($_REQUEST['value'])){
  		$value = $_REQUEST['value'];
   		$option = sao_options_decode( urldecode(sao_options_encode($_REQUEST['option'])));
	}else{
  		$value = $val;
  		$option = $opt;
 		 
	}	 
	$key =rand(100000000,999999999);
	$args['key'] = $key;
	$args['option'] = $option;
	
	if(has_filter('sao_builder_perview_'.$value)) {
		$filter =apply_filters('sao_builder_perview_'.$value, $args) ;	

		echo '<section  class="sao-element-'.esc_attr($key).' sao-element-item sao_element_'.esc_attr($value).' sao-auto-width ">';
			echo $filter['output'];
		
 		echo '</section>';
			echo '<style>';		
		echo $filter['css']; 					  						
		echo '</style>';		
		 	 					  						
	}elseif(has_filter('sao_builder_'.$value)) {
		$filter =apply_filters('sao_builder_'.$value, $args) ;	

		echo '<section  class="sao-element-'.esc_attr($key).' sao-element-item sao_element_'.esc_attr($value).' sao-auto-width ">';
			echo $filter['output'];
		
 		echo '</section>';
		echo '<style>';		
		echo $filter['css']; 					  						
		echo '</style>';		 					  						
	}
	if(!empty($_REQUEST['value'])){
		die(0);
	}
}
 
 
 
?>