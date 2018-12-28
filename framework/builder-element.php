<?php
add_action('wp_ajax_nopriv_sao_builder_element', 'sao_builder_element');
add_action('wp_ajax_sao_builder_element', 'sao_builder_element');
function sao_builder_element($element_key=false,$element_value=false){
 
	if(!empty($_REQUEST['value'])){
		$value = array();
		$value['value'] = $_REQUEST['value'];
		$value['childern'] = $_REQUEST['childern'];
		 
  	}else{
	  $value= $element_value;
	}
 
	$key = !empty($_REQUEST['key']) ? $_REQUEST['key']: $element_key;
	 
	$collapse = !empty($value['collapse']) ? $value['collapse']: 'show';
	
	
	if(!empty($_REQUEST['default'])) {
		
			
				global $sao_options_element;
			
		$value_default = array();
		
		foreach ($sao_options_element as  $element) :
			if( $element['id'] == $_REQUEST['value']) {
				
				if(!empty($element['options'])) :
				foreach ($element['options'] as $option ):
				
					if(!empty($option['default']) && !empty($option['id'])){
						$value_default[$option['id']] = $option['default'];
					}
					
				endforeach;
				endif;
			}
				
		endforeach;

		$value_option =!empty($value_default)? sao_options_encode($value_default) :'';
		
  	}else{
 		$value_option = $value['option'];
	}
	
 	$template_id = !empty($_REQUEST['template_id']) ? 'sao_new_element':'';
	
	echo '<li id="sao_element_'.esc_attr($key).'" class="sao_element_item sao_builder_element_item '.$template_id.' sao_element_'.esc_attr($value['value']).' sao_row_item" data-key="'.esc_attr($key).'"  data-value="'.esc_attr($value['value']).'"  data-collapse="'.esc_attr($collapse).'" data-option="'.esc_attr($value_option).'"  data-childern="'.esc_attr($value['childern']).'">';
  		 sao_element_value($key,$value); 
	echo '<div class="sao_row_content sao_element_content">';
	
		echo '<aside class="sao_element_perview sao-element-item">';
		echo sao_element_perview($value['value'],sao_options_decode(urldecode($value_option)));
		echo '</aside>';
		
	echo '</div>';
	echo '</li>';
 
	  
 } 
function sao_element_value( $key,$value){

 	global $sao_options_element;
	
 
	echo '<div class="sao_row_title sao_element_title">';
		echo '<span class="sao_element_name sao_row_name">';
		 
			if(!empty($sao_options_element)):
			foreach ($sao_options_element as  $options):
				if($options['id'] == $value['value']){
					 if(!empty($options['name'])) echo esc_html($options['name']);
 				} 	
			endforeach;			
			endif;
         
        echo '</span>';
		echo '<a class="sao_row_collapse sao_element_collapse "></a>';
        echo '<a class="sao_row_remove sao_element_remove"></a>';
        echo '<a class="sao_row_options sao_element_options"></a>';
		echo '<a class="sao_row_duplicate sao_element_duplicate"></a>';
		echo '<a class="sao_row_template_save sao_template_save" data-row="element"></a>';

 	echo '</div>';	
	
}

add_action('wp_ajax_nopriv_sao_builder_element_list', 'sao_builder_element_list');
add_action('wp_ajax_sao_builder_element_list', 'sao_builder_element_list');
function sao_builder_element_list() {
	$template =	get_option( 'sao_'.$_REQUEST['row_id'].'_template');
  	$element = sao_options_array_row(urldecode($template[$_REQUEST['template_id']]['element']));
	
	if (!empty($element)) :
	foreach($element as $element_key => $element_value) : 
		sao_builder_element($element_key,$element_value);
	endforeach;
	endif;
 
	die(0);
} 
function sao_element_tabs(){

 	global $sao_options_element;
	
	$tab= array();
	foreach ($sao_options_element as  $element) :
 		if( $element['id']== $_REQUEST['value']) {
			if($element['options']):
			
			foreach ($element['options'] as $option ) :
				if(!empty($option['group'])){
					$dass = sanitize_title($option['group']);
					if(!array_key_exists($dass,$tab)){
						$tab[sanitize_title($option['group'])] = $option['group'];
					}
				}else{ 	
					$general = esc_html__('General','sao');
					$tab[sanitize_title($general)] = $general;
				}
		
			endforeach;
			endif;
		}
	endforeach;
	return  $tab;
	
}
 add_action('wp_ajax_sao_element_options', 'sao_element_options');
add_action('wp_ajax_nopriv_sao_element_options', 'sao_element_options');
function sao_element_options(){
	
	$value_id = !empty($_REQUEST['option'])?sao_options_decode(urldecode($_REQUEST['option'])):'';

 	global $sao_options_element;
 	
	echo '<form id="sao_options_'.esc_attr($_REQUEST['key']).'" class="sao_options sao_builder_options_element sao_options_element sao_active " data-key="'.esc_attr($_REQUEST['key']).'" data-value="'.esc_attr($_REQUEST['value']).'">';
	echo '<div class="sao_options_middle">';
		//Title
		echo '<div class="sao_options_title"><h3>'.esc_html__('Options','sao').'</h3><i class="sao_options_close"></i>';
			
			foreach ($sao_options_element as  $element):
				if( $element['id']== $_REQUEST['value']):
					echo '<div class="sao_title_tabs">';
						$array_tab = sao_element_tabs();
						$count_tab=0;
						
						foreach ($array_tab as  $key=> $tabs) :
							$count_tab++;
							if($count_tab==1){
								$tab_active = 'sao_layout_active';
							}else{
								$tab_active = '';
							}
							echo'<a class="sao_tab_'.esc_attr($key).' '.esc_attr($tab_active).'" data-id="'.esc_attr($key).'">'.esc_html($tabs).'</a>';
								
						endforeach;

					echo '</div>';
 				endif;
  			endforeach;
                                     
		echo '</div>';
		//Content
		echo '<ul class="sao_options_content">';
		echo '<div class="sao_options_container">';
							 
			foreach ($sao_options_element as  $element):
				if( $element['id']== $_REQUEST['value']) {
					$array_tab = sao_element_tabs();
					$count_container=0;
					
					foreach ($array_tab as  $key=> $tabs):
						$count_container++;
						if($count_container==1){
							$group_active = 'sao_layout_group_active';
						}else{
							$group_active = '';
						}
						
						echo '<section class="sao_options_warp '.esc_attr($group_active).' " data-tab="'.esc_attr($key).'">';
						
							if(!empty($element['options'])):
							foreach ($element['options'] as $option ) :
																	  
								$general = !empty($option['group']) ? sanitize_title($option['group']):sanitize_title(esc_html__('General','sao'));
		
								if($key == $general ){
									if(!empty($option['name']) && !empty($option['id'])  && !empty($option['type'])){
										$data_options = !empty( $option['options'] ) ?  $option['options']  : null;
										$desc = !empty( $option['desc'] ) ?  $option['desc']  : null;
										$placeholder = !empty( $option['placeholder'] ) ?  $option['placeholder']  : null;
										$fold = !empty( $option['fold'] ) ?  $option['fold']  : null;
										sao_options_function($value_id[$option['id']], $option['name'],$option['id'],$option['type'],$data_options,$desc,$placeholder,$fold );
									}
								}
	 
							endforeach;
							endif;
							
						echo '</section>';

					endforeach;
 				}
			endforeach;

		echo '</div>';
		echo '</ul>';
		
		//Bottom
        echo '<div class="sao_options_bottom">';
			echo '<div class="sao_options_cancel button">'.esc_html__('Cancel','sao').'</div>';
			echo '<div class="sao_options_update button-primary">'. esc_html__('Update','sao').'</div>';
		echo '</div>';
		
				 
	echo '</div>';
	echo '</form>';

	die(0);
}

  
function sao_model_element_tabs(){

 	global $sao_options_element;
	
	$tab= array();
	
	foreach ($sao_options_element as  $element):
		if(!empty($element['group'])){
			$dass = sanitize_title($element['group']);
			if(!array_key_exists($dass,$tab)){
				$tab[sanitize_title($element['group'])] = $element['group'];
			}
		}else{ 	
			$general = esc_html__('General','sao');
			$tab[sanitize_title($general)] = $general;
		}
	endforeach;
 	return  $tab;
	
}

function sao_model_element() {
	
 		global $sao_options_element;
	
	$count=0;
	
    echo '<div class="sao_model sao_model_element">';
	echo '<div class="sao_model_middle">';
		
		// Title
		echo '<div class="sao_model_title"><h3>'. esc_html__('Add Element','sao').'</h3><i class="sao_model_close"></i>';
                
			echo'<div class="sao_title_tabs">';
				$array_tab = sao_model_element_tabs();
				$count_tab=0;
				foreach ($array_tab as  $key=> $tabs):
						$count_tab++;
						if($count_tab==1){
							$tab_active = 'sao_layout_active';
						}else{
							$tab_active = '';
						}
						echo'<a class="sao_tab_'.esc_attr($key).' '.esc_attr($tab_active).'" data-id="'.esc_attr($key).'">'.esc_html($tabs).'</a>';
				endforeach;								
			echo'</div>';
				
		echo '</div>';
		//Content         
 		echo '<ul class="sao_model_content">';
			
			$array_tab = sao_model_element_tabs();
			$count_container=0;
			foreach ($array_tab as  $key=> $tabs) :
				$count_container++;
				if($count_container==1){
					$group_active = 'sao_layout_group_active';
				}else{
					$group_active = '';
				}
				
 			
				echo '<section class="sao_options_warp '.esc_attr($group_active).' " data-tab="'.esc_attr($key).'">';
					foreach ($sao_options_element as  $value): 
																						  
						$general = !empty($value['group']) ? sanitize_title($value['group']):sanitize_title(esc_html__('General','sao'));
						if($key == $general ){
							echo '<li class="sao_model_item" data-element="'.esc_attr($value['id']).'" >';
							echo '<img src="'.esc_url($value['img']).'" />';
										
								if(!empty($value['name'])){ 
									echo '<span>'.esc_html($value['name']).'</span>';
								}
										
							echo '</li>';
							echo '<div class="sao-row-1-8"></div>';
		
						}
							
					endforeach;
				echo '</section>';
				
			endforeach;
      
		echo '</ul>';
		//Bottom
		echo '<div class="sao_model_bottom">';
			echo '<div class="sao_model_add button-primary">'.esc_html__('Add','sao').'</div>';
		echo '</div>';
		
		
	echo '</div>';	
	echo '</div>';
  	
}
 