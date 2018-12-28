<?php
function sao_column_config($post_id,$section_key) {

	$output='';
	$css='';
	$script='';
	$column_json = get_post_meta($post_id, 'sao_column', true);
  	$column= sao_options_array_row($column_json);	
	
	$main_count=0;
	$desktop_count=0;
	$tablet_count=0;
	$phablet_count=0;
	$phone_count=0;
			
	$main_res= rand(100000000,999999999);
	$desktop_res= rand(100000000,999999999);
	$tablet_res= rand(100000000,999999999);
	$phablet_res= rand(100000000,999999999);
	$phone_res= rand(100000000,999999999);
 	if(!empty($column)):
	foreach($column as $column_key=> $column_value):  
		if($column_value['child'] == $section_key){
			 
			$column_option = sao_options_decode(urldecode($column_value['option']));
			$item = '.sao-column-'.esc_html($column_key);

 			$column_id = !empty($column_option['section_id']) ? $column_option['column_id']:'sao-column-'.esc_attr($column_key);
			$custom_class = !empty($column_option['custom_class']) ? $column_option['custom_class']:'';
			$column_main = !empty( $column_value['value']) ? $column_value['value'] : '';
			$column_desktop = !empty( $column_option['desktop']) ? $column_option['desktop'] : $column_main;
					
			if($column_main =='1_1'){
				$tablet_default = '1_1';
				
			}elseif($column_main =='1_2'||$column_main =='1_4'||$column_main =='3_4' ){
				$tablet_default = '1_1';
	
			}elseif($column_main =='1_3' || $column_main =='1_5'|| $column_main =='2_5' ||$column_main =='1_6' ){
				$tablet_default = '1_3';
				
			}elseif($column_main =='2_3' || $column_main =='3_5'|| $column_main =='4_5' ||$column_main =='5_6'){
				$tablet_default = '2_3';
			}
			$column_tablet = !empty( $column_option['tablet']) ? $column_option['tablet'] : $tablet_default;
			$column_phablet = !empty( $column_option['phablet']) ? $column_option['phablet'] : $tablet_default;
			$column_phone = !empty( $column_option['phone']) ? $column_option['phone'] : '1_1';
 	
			$main_count += sao_column_count($column_main);
			$desktop_count += sao_column_count($column_desktop);
			$tablet_count += sao_column_count($column_tablet);
			$phablet_count += sao_column_count($column_phablet);
			$phone_count += sao_column_count($column_phone);
					
					$responsive = 'sao_column_'.esc_attr($column_main).' sao_desktop_'.esc_attr($column_desktop).' sao_tablet_'.esc_attr($column_tablet).' sao_phablet_'.esc_attr($column_phablet).'  sao_phone_'.esc_attr($column_phone);
						
			$responsive_last=''; 

			if($main_count>=99 && $main_count<=101){
				$responsive_last.=' sao-column-main-last ';
			} 
					
			if($desktop_count>=99 && $desktop_count<=101){
				$responsive_last.=' sao-column-desktop-last ';
			} 
					
			if($tablet_count>=99 && $tablet_count<=101){
				$responsive_last.=' sao-column-tablet-last ';
			} 
					
			if($phablet_count>=99 && $phablet_count<=101){
				$responsive_last.=' sao-column-phablet-last ';
			} 
					
			if($phone_count>=99 && $phone_count<=101){
				$responsive_last.=' sao-column-phone-last ';
			} 
						
 							
			$output.= '<div id="'.esc_attr($column_id ).'" class="sao-column-'.esc_attr($column_key).' sao-column-item  '.esc_attr($responsive).' '.esc_attr($custom_class ).' '.esc_attr($responsive_last).'" 
			data-column="'.esc_attr($main_res).'" 
			data-desktop="'.esc_attr($desktop_res).'" 
			data-tablet="'.esc_attr($tablet_res).'" 
			data-phablet="'.esc_attr($phablet_res).'" 
			data-phone="'.esc_attr($phone_res).'" 
			>';
			$output.= '<aside class="sao-column-warp">';
			
				$output.= sao_column_background($column_option);
				$output.= '<div class="sao-column-container">';
						
							$element =sao_element_config($post_id,$column_key);
  							$output.=!empty($element['output'])?$element['output']:'';
						  	$css.=!empty($element['css'])?$element['css']:'';
						  	$script.=!empty($element['script'])?$element['script']:'';
  								
				$output.= '</div>';
			$output.= '</aside>';
			$output.= '</div>';
 
			if($main_count>=99 && $main_count<=101){
				$main_res = rand(100000000,999999999);
				$main_count=0;
			}
				
			if($desktop_count>=99 && $desktop_count<=101){
				$desktop_res = rand(100000000,999999999);
				$desktop_count=0;
			}
				
			if($tablet_count>=99 && $tablet_count<=101){
				$tablet_res = rand(100000000,999999999);
				$tablet_count=0;
			}
				
			if($phablet_count>=99 && $phablet_count<=101){
				$phablet_res = rand(100000000,999999999);
				$phablet_count=0;
			}

			if($phone_count>=99 && $phone_count<=101){
				$phone_res = rand(100000000,999999999);
				$phone_count=0;
			}				

		}
 					

		//Padding
		if(!empty($column_option['padding'])){
			$column_padding_unit = !empty($column_option['padding']['unit']) ?$column_option['padding']['unit'] : 'px';
			$column_padding_top = intval(isset($column_option['padding']['top'])) ? 'padding-top:'.$column_option['padding']['top'].$column_padding_unit.';': '';
			$column_padding_left = intval(isset($column_option['padding']['left'])) ? 'padding-left:'.$column_option['padding']['left'].$column_padding_unit.';' : '';
			$column_padding_bottom = intval(isset($column_option['padding']['bottom'])) ? 'padding-bottom:'.$column_option['padding']['bottom'].$column_padding_unit.';' : '';
			$column_padding_right = intval(isset($column_option['padding']['right'])) ? 'padding-right:'.$column_option['padding']['right'].$column_padding_unit.';' : '';		
			$css.= $item.' .sao-column-container {'.$column_padding_top.$column_padding_left.$column_padding_bottom.$column_padding_right.'}';
		}
		
		//Border
		if(!empty($column_option['border'])){
			$column_border_unit = !empty($column_option['border']['unit']) ?$column_option['border']['unit'] : 'px';
			$column_border_top = intval(isset($column_option['border']['top'])) ? 'border-top-width:'.$column_option['border']['top'].$column_border_unit.';': '';
			$column_border_left = intval(isset($column_option['border']['left'])) ? 'border-left-width:'.$column_option['border']['left'].$column_border_unit.';' : '';
			$column_border_bottom = intval(isset($column_option['border']['bottom'])) ? 'border-bottom-width:'.$column_option['border']['bottom'].$column_border_unit.';' : '';
			$column_border_right = intval(isset($column_option['border']['right'])) ? 'border-right-width:'.$column_option['border']['right'].$column_border_unit.';' : '';		
			$column_border_style = isset($column_option['border']['style']) ? 'border-style:'.$column_option['border']['style'].';' : '';		
			$column_border_color = isset($column_option['border']['color']) ? 'border-color:'.$column_option['border']['color'].';' : '';	
			$css.= $item.' .sao-column-warp {border-width: 0px;'.$column_border_top.$column_border_left.$column_border_bottom.$column_border_right.$column_border_style.$column_border_color.'}';
		} 
			
		//Box Shadow
		if(!empty($column_option['shadow'])){
			$column_shadow_unit = !empty($column_option['shadow']['unit']) ?$column_option['shadow']['unit'] : 'px';
			$column_shadow_horizontal = intval(isset($column_option['shadow']['horizontal'])) ? $column_option['shadow']['horizontal'].$column_shadow_unit.' ': '0 ';
			$column_shadow_vertical = intval(isset($column_option['shadow']['vertical'])) ?  $column_option['shadow']['vertical'].$column_shadow_unit.' ' : '0 ';
			$column_shadow_blur = intval(isset($column_option['shadow']['blur'])) ?  $column_option['shadow']['blur'].$column_shadow_unit.' ' : '0 ';
			$column_shadow_spread = intval(isset($column_option['shadow']['spread'])) ?  $column_option['shadow']['spread'].$column_shadow_unit.' ' : '0 ';		
			$column_shadow_color = isset($column_option['shadow']['color']) ? $column_option['shadow']['color'].' ' : '';		
			$column_shadow_position = isset($column_option['shadow']['position']) ? $column_option['shadow']['position'] : '';		
			$css.= $item.' .sao-column-warp {box-shadow:'.$column_shadow_horizontal.$column_shadow_vertical.$column_shadow_blur.$column_shadow_spread.$column_shadow_color.$column_shadow_position.'}';
		}
				
		//Radius
		if(!empty($column_option['radius'])){
			$column_radius_unit = !empty($column_option['radius']['unit']) ?$column_option['radius']['unit'] : 'px';
			$column_radius_top_left = intval(isset($column_option['radius']['top_left'])) ? $column_option['radius']['top_left'].$column_radius_unit.' ': '0 ';
			$column_radius_top_right = intval(isset($column_option['radius']['top_right'])) ? $column_option['radius']['top_right'].$column_radius_unit.' ' : '0 ';
			$column_radius_bottom_right = intval(isset($column_option['radius']['bottom_right'])) ? $column_option['radius']['bottom_right'].$column_radius_unit.' ' : '0 ';
			$column_radius_bottom_left = intval(isset($column_option['radius']['bottom_left'])) ? $column_option['radius']['bottom_left'].$column_radius_unit.' ' : '0 ';		
			$css.= $item.' .sao-column-warp {border-radius: '.$column_radius_top_left.$column_radius_top_right.$column_radius_bottom_right.$column_radius_bottom_left.'}';
		}
					
			
		if(isset($column_option['background_color']['first'])){
	//Background Color
   			$background_color = sao_builder_gradient_background_color($column_option,'background_color');
  	 
  
					 
			$css.= $item.' .sao-column-warp::before {left: 0;  content:"";position: absolute; height: 100%; z-index:0; width: 100%;'.$background_color.'}';
		}  
 	endforeach;			
	endif;	
 
			 
	$return['css'] = $css;
	$return['output']= $output;
	$return['script']= $script;
  	return $return;		
}  
 

function sao_column_count($value) {
	
	if($value =='1_1'){
		return 100;
		
 	}elseif($value=='1_2'){
		return 50;

 	}elseif($value=='1_3'){
		return 33.331;

 	} elseif($value=='2_3'){
		return 66.661;

 	} elseif($value=='3_4'){
		return 75;		

 	} elseif($value=='1_4'){
		return 25;		

 	} elseif($value=='1_5'){
		return 20;

 	} elseif($value=='2_5'){
		return 40;

 	} elseif($value=='3_5'){
		return 60;

 	} elseif($value=='4_5'){
		return 80;		

	} elseif($value=='1_6'){
		return 16.661;

	} elseif($value=='5_6'){
		return 83.331;

	} 
        
}

function sao_column_background($option) {
	$output ='';
	if (!empty($option['background_image'])){
   		$background_url = !empty($option['background_image']['url']) ? $option['background_image']['url']:'';
   		$background_width = !empty($option['background_image']['width']) ? $option['background_image']['width']:'';
   		$background_height = !empty($option['background_image']['height']) ? $option['background_image']['height']:'';
			
		$output.='<div class="sao-column-background">';
		$output.='<img alt="background" src="'.esc_url( $background_url).'" width="'.esc_attr( $background_width).'" height="'.esc_attr( $background_height).'" />';			 
		$output.='</div>';
				
 	 } 	
	 return $output ;
 }
