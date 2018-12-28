<?php
add_action('wp_ajax_nopriv_sao_builder_column', 'sao_builder_column');
add_action('wp_ajax_sao_builder_column', 'sao_builder_column');
function sao_builder_column($column_key=false,$column_value=false){
  	global $post,$sao_options_column;
	
  	if(!empty($_REQUEST['template_id'])){
		$template =	get_option( 'sao_'.$_REQUEST['row_id'].'_template');
 		$element = sao_options_array_row(urldecode($template[$_REQUEST['template_id']]['element']));
		$template_id ='sao_new_column';
	}else{
		$element_json = get_post_meta($post->ID, 'sao_element', true);  
		$element= sao_options_array_row($element_json);
		$template_id ='';
		
	}
 	if(!empty($_REQUEST['value'])){
		$value = array();
		$value['value'] = $_REQUEST['value'];
		$value['child'] = $_REQUEST['child'];
 		
  	}else{
	  $value= $column_value;
	}
  
 
	$key = !empty($_REQUEST['key']) ? $_REQUEST['key']: $column_key;
 	$collapse = !empty($value['collapse']) ? $value['collapse']: 'show';

	if(!empty($_REQUEST['default'])){
		
		$value_default=array();
		foreach ($sao_options_column as  $column):
		
			if(!empty($column)):
			foreach ($column as $option ):
				if(!empty($option['default']) && !empty($option['id'])){
					$value_default[$option['id']] = $option['default'];
				}
			endforeach;
			endif;	
			
		endforeach;
		
 		$value_option =!empty($value_default)? sao_options_encode($value_default) :'';
 	}else{
 		$value_option =$value['option'];
	}
	
   	 
    
	echo '<li id="sao_column_'.esc_attr($key).'" class="sao_column_item sao_builder_column_item sao_column_'.esc_attr($value['value']).' '.esc_attr($template_id).' sao_row_item"  data-collapse="'.esc_attr($collapse).'" data-key="'.esc_attr($key).'" data-value="'.esc_attr($value['value']).'"  data-option="'.esc_attr($value_option).'"  data-child="'.esc_attr($value['child']).'">';
		sao_column_value($key,$value); 
		echo '<div class="sao_row_content sao_column_content">';
		
			echo '<ul class="sao_element_list">';
				
				if (!empty($element)) :
				foreach($element as $element_key => $element_value) :
					
					if($element_value['childern'] == $key){  
						sao_builder_element($element_key,$element_value);
					}
				endforeach;
				endif;  
							   
			echo '</ul>';
				
			echo '<div class="sao_row_bottom">';
				echo '<a class="sao_add_element sao_add_row">'.esc_html__('Add New Element','sao').'</a>';
				echo '<a class="sao_element_template_add sao_template_add"  data-row="element" data-name="'.esc_html__('Element','sao').'"></a>';
			echo '</div>';
				
		echo '</div>';
	echo '</li> ';
    
          

}
 
function sao_column_value($key,$value ) {
	
	$value_name = !empty($value['value'])?$value['value']:'';
	
	echo '<div class="sao_row_title sao_column_title">';
	
		echo '<span class="sao_column_name sao_row_name">';	
 			if($value_name == '1_1') echo esc_html('1/1');
			if($value_name == '1_2') echo esc_html('1/2');
			if($value_name == '1_3') echo esc_html('1/3');
			if($value_name == '1_4') echo esc_html('1/4');
			if($value_name == '1_5') echo esc_html('1/5');
			if($value_name == '1_6') echo esc_html('1/6');
			if($value_name == '2_3') echo esc_html('2/3');
			if($value_name == '3_4') echo esc_html('3/4');
			if($value_name == '2_5') echo esc_html('2/5');
			if($value_name == '3_5') echo esc_html('3/5');
			if($value_name == '4_5') echo esc_html('4/5');
			if($value_name == '5_6') echo esc_html('5/6');
		echo '</span>';
		
 		echo '<a class="sao_row_change sao_column_change "></a>';
  		echo '<a class="sao_row_collapse sao_column_collapse "></a>';
		echo '<a class="sao_row_remove sao_column_remove"></a>';
        echo '<a class="sao_row_options sao_column_options"></a>';
        echo '<a class="sao_row_duplicate sao_column_duplicate"></a>';  
		echo '<a class="sao_row_template_save  sao_template_save" data-row="column" data-name="'.esc_html__('Column','sao').'" ></a>';
    
 	echo '</div>';
   
}

function sao_column_tabs(){

	global $sao_options_column;
	$tab= array();
	foreach ($sao_options_column as  $column):
		foreach ($column as $option ) :
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
	endforeach;
	return  $tab;

}

add_action('wp_ajax_sao_column_options', 'sao_column_options');
add_action('wp_ajax_nopriv_sao_column_options', 'sao_column_options');
function sao_column_options() {
	
	$value_id = !empty($_REQUEST['option']) ? sao_options_decode(urldecode($_REQUEST['option'])):'';
	global $sao_options_column;
	 
	echo '<form id="sao_options_'.esc_attr($_REQUEST['key']).'" class="sao_options sao_options_column sao_active " data-key="'.esc_attr($_REQUEST['key']).'">';
	echo '<div class="sao_options_middle">';
	
		// Title
		echo '<div class="sao_options_title"><h3>'.esc_html__('Options','sao').'</h3><i class="sao_options_close"></i>';
                	 
			foreach ($sao_options_column as  $column_option) :
				echo'<div class="sao_title_tabs">';
					$array_tab = sao_column_tabs();
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
			endforeach;		
                 
		echo '</div>';
		
		//Content
		echo '<ul class="sao_options_content">';
		echo '<div class="sao_options_container">';
							 
			foreach ($sao_options_column as $column) :
				$array_tab = sao_column_tabs();
				$count_container=0;
				
				foreach ($array_tab as  $key=> $tabs) :
					$count_container++;
					if($count_container==1){
						$group_active = 'sao_layout_group_active';
					}else{
						$group_active = '';
					}  
					
					echo '<section class="sao_options_warp '.$group_active.' " data-tab="'.$key.'">';
						foreach ($column as $option ) :
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
					echo '</section>';
 				endforeach; 
											
 			endforeach; 
		echo '</div>';
		echo '</ul>';
		
		//Bottom
		echo '<div class="sao_options_bottom">';
			echo '<div class="sao_options_cancel button">'.esc_html__('Cancel','sao').'</div>';
			echo '<div class="sao_options_update button-primary">'.esc_html__('Update','sao').'</div>';
		echo '</div>';
		
		
	echo '</div>';
	echo '</form>';
     
}
function sao_model_column() {
	$columns = array(
   		'1_1'				=> '1/1', 
 		'1_2'				=> '1/2', 
 		'1_3'				=> '1/3', 
 		'1_4'				=> '1/4', 
		'1_5'				=> '1/5', 
		'1_6'				=> '1/6', 
 		'2_3'				=> '2/3', 
		'3_4'				=> '3/4', 
		'2_5'				=> '2/5', 
		'3_5'				=> '3/5', 
		'4_5'				=> '4/5', 
		'5_6'				=> '5/6', 
 	);
	
	
	echo '<div class="sao_model sao_model_column">';
	echo '<div class="sao_model_middle">';
		//Title
		echo '<div class="sao_model_title"><h3>'.esc_html__('Add New Column','sao').'</h3><i class="sao_model_close"></i></div>';
		//Content
		echo '<ul class="sao_model_content">';
		
 			foreach ($columns as $id => $name ) :
 				echo '<li class="sao_model_item sao_model_'.esc_attr($id).'"  data-column="'.esc_attr($id).'">';
 					echo '<div class="sao-col-warp">';
						echo '<div class="sao-col-border sao_column_'.esc_attr($id).'"></div>';
					echo '</div>';
 					 echo '<span>'.esc_html($name).'</span>';
				echo '</li>';
 			endforeach;
			
		echo '</ul>';
		//Bottom
		echo '<div class="sao_model_bottom">';
			echo '<div class="sao_model_add button-primary">'.esc_html__('Add','sao').'</div>';
 		echo '</div>';
		
	echo '</div>';
	echo '</div>';
   	 
}
 
 
add_action('wp_ajax_nopriv_sao_builder_column_list', 'sao_builder_column_list');
add_action('wp_ajax_sao_builder_column_list', 'sao_builder_column_list');
function sao_builder_column_list() {
	 
	$template =	get_option( 'sao_'.$_REQUEST['row_id'].'_template');
  	$column = sao_options_array_row(urldecode($template[$_REQUEST['template_id']]['column']));
	
	if (!empty($column)) :
	foreach($column as $column_key => $column_value) : 
		sao_builder_column($column_key,$column_value);
	endforeach;
	endif;
 
	die(0);
}
 

