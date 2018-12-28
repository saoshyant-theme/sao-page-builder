<?php
add_action('wp_ajax_nopriv_sao_builder_section', 'sao_builder_section');
add_action('wp_ajax_sao_builder_section', 'sao_builder_section');
function sao_builder_section($section_key=false,$section_value=false){
	
  	global $post;
 	if(!empty($_REQUEST['template_id'])){
		$template =	get_option( 'sao_'.$_REQUEST['row_id'].'_template');
 		$column = sao_options_array_row(urldecode($template[$_REQUEST['template_id']]['column']));
		$template_id = 'sao_new_section';
	}else{
		$column_json = get_post_meta($post->ID, 'sao_column', true);
		$column= sao_options_array_row($column_json);
		$template_id = '';
	}
 	if(!empty($_REQUEST['value'])){
		$value = array();
		$value['value'] = $_REQUEST['value'];
		 
   	}else{
	  $value = $section_value;
	}
	
	$key = !empty($_REQUEST['key']) ? $_REQUEST['key']: $section_key;
	$collapse = !empty($value['collapse']) ? $value['collapse']: 'show';
	
	
	if(!empty($_REQUEST['default'])){
		global $sao_options_column;
		$value_default=array();
		
		foreach ($sao_options_section as  $section):
		
			if(!empty($section)):
			foreach ($section as $option ):
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
	
   
	//Section
	echo '<li id="sao_section_'.esc_attr($key).'" class="sao_section_item sao_builder_section_item  sao_row_item '.esc_attr($template_id).'" data-collapse="'.esc_attr($collapse).'" data-key="'.esc_attr($key).'" data-value="'.esc_attr($value['value']).'"  data-option="'.esc_attr($value_option).'" >';
    	
		sao_section_value($key,$value); 
		echo '<div class="sao_row_content sao_section_content">';
		
			echo '<ul class="sao_column_list ">';
			   
				if (!empty($column)) :
				foreach($column as $column_key => $column_value) :
				
					if($column_value['child'] == $key){
						sao_builder_column($column_key,$column_value);
				}
		
				endforeach;
				endif;
				   
			echo '</ul>';
			
			echo '<div class="sao_row_bottom">';
				echo '<a class="sao_add_column sao_add_row">'.esc_html__('Add New Column','sao').'</a>';
				echo '<a class="sao_column_template_add sao_template_add" data-row="column"  data-name="'.esc_html__('Column','sao').'" ></a>';
			echo '</div>';
			
		echo '</div>';
        
	echo '</li>';
	if(!empty($_REQUEST['value'])){
		die(0);
	}
}

function sao_section_value($key,$value){
	 
	echo '<div class="sao_row_title sao_section_title">';
    	echo '<span class="sao_section_name sao_row_name">'.esc_html__('Section','sao').'</span>';
     	echo '<a class="sao_row_collapse sao_section_collapse "></a>';
      	echo '<a class="sao_row_remove sao_section_remove"></a>';
       	echo '<a class="sao_row_options sao_section_options"></a>';
      	echo '<a class="sao_row_duplicate sao_section_duplicate"></a>';
		echo '<a class="sao_row_template_save sao_template_save" data-row="section"   data-name="'.esc_html__('Section','sao').'"></a>';
	echo '</div>';
 
}
function sao_section_tabs(){

	global $sao_options_section;
	$tab= array();
	
	foreach ($sao_options_section as  $section) :
		foreach ($section as $option ) :
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

add_action('wp_ajax_sao_section_options', 'sao_section_options');
add_action('wp_ajax_nopriv_sao_section_options', 'sao_section_options');
function sao_section_options(){
	
	$value_id = !empty($_REQUEST['option'])?sao_options_decode(urldecode($_REQUEST['option'])):'';
 	global $sao_options_section;
 		 
	echo '<form id="sao_options_'.esc_attr($_REQUEST['key']).'" class="sao_options sao_options_section sao_active " data-key="'.esc_attr($_REQUEST['key']).'">';
	echo '<div class="sao_options_middle">';
		
		//Title
		echo '<div class="sao_options_title"><h3>'.esc_html__('Section Options','sao').'</h3><i class="sao_options_close"></i>';
			
			foreach ($sao_options_section as  $section_option):
 				echo'<div class="sao_title_tabs">';
					$array_tab = sao_section_tabs();
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
											
				echo'</div>';
 			endforeach;  
  
		echo '</div>';
		
		//Content
		echo '<ul class="sao_options_content">';
		echo '<div class="sao_options_container">';
					
			foreach ($sao_options_section as $section):
	
				$array_tab = sao_section_tabs();
				$count_container=0;
				foreach ($array_tab as  $key=> $tabs):
 
					$count_container++;
					if($count_container==1){
						$group_active = 'sao_layout_group_active';
					}else{
						$group_active = '';
					}  
							
					echo '<section class="sao_options_warp '.esc_attr($group_active).' " data-tab="'.esc_attr($key).'">';
						foreach ($section as $option ):
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

	die();
 
}

add_action('wp_ajax_sao_section_template_remove', 'sao_section_template_remove');
add_action('wp_ajax_nopriv_sao_section_template_remove', 'sao_section_template_remove'); 
function sao_section_template_remove() {
	
	$old_data =	get_option( 'sao_section_template');
	unset($old_data[$_REQUEST['key']]);
	
	update_option( 'sao_section_template', $old_data );
	die(0);
} 
 

 