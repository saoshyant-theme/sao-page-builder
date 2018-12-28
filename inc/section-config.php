<?php
function sao_section_config($post_id ) {
 	
 
 	$output='';
	$css='';
	$script='';
	$section_json = get_post_meta($post_id, 'sao_section', true);
  	$section= sao_options_array_row($section_json);
	
 	if(!empty($section)):
  	foreach($section as $section_key=> $section_value):
 		$section_option = sao_options_decode(urldecode($section_value['option']));
		 
		$section_id = !empty($section_option['section_id']) ? $section_option['section_id']:'sao-section-'.esc_attr($section_key);
		$custom_class = !empty($section_option['custom_class']) ? $section_option['custom_class']:'';
		$sticky_columns = !empty($section_option['sticky_columns']) ? ' sao-section-sticky ':'';
 	 
 		$output.='<div id="'.esc_attr($section_id).'" class="sao-section-'.esc_attr($section_key).' sao-section-item '.esc_attr($sticky_columns).'  '.esc_attr($custom_class).'">';
		
		$output.= sao_section_background($section_option);

  		$output.='<div class="sao-section-middle">';
 		$output.='<div class="sao-section-container">';
 			
			$columnss=sao_column_config($post_id,$section_key); 		 	  			
			$output.=!empty($columnss['output']) ? $columnss['output']:'';
			$css.=!empty($columnss['css']) ? $columnss['css']:'';
			$script.=!empty($columnss['script']) ? $columnss['script']:'';
			 
		$output.='</div>'; 		 	  			
 		$output.='</div>';
   		$output.='</div>'; 		 	  			



		//Syle
		$item = '.sao-section-'.esc_html($section_key);

		if(has_filter('sao_builder_section_width')) {
			$default_section_wdith = apply_filters('sao_builder_section_width','width');
		}else{
			$default_section_wdith ='1200px';
		}
		//Width
 		$section_width = isset( $section_option['width']) ?  $section_option['width']  : $default_section_wdith;
 		$css.= $item.' .sao-section-middle { max-width:'.$section_width.'; }';
 		$css.= '@media (max-width: '.$section_width.') {'.$item.' .sao-section-middle { width:100%; } }';
		
		//Boxed
		if(!empty($section_option['boxed'] )){
		$css.= $item.'{ 
			max-width:'.$section_width.' !important; 
			left: 50%;
			transform: translate(-50%, 0%);
			-webkit-transform: translate(-50%, 0%);
			-moz-transform: translate(-50%, 0%);
			-o-transform: translate(-50%, 0%);
			-ms-transform: translate(-50%,0%);
			}';
 		$css.= '@media (max-width: '.$section_width.') {'.$item.'{ width:100%  !important; } }';
		}
		if(!empty($section_option['gutter']['between'])){
		$section_gutter_unit = !empty($section_option['gutter']['unit']) ?$section_option['gutter']['unit'] : 'px';
 		$section_gutter_between =intval(isset( $section_option['gutter']['between'])) ?  $section_option['gutter']['between']/2 : '0';
 		$css.= $item.' .sao-column-item { padding:'.$section_gutter_between.$section_gutter_unit.'; }';
		}
		
		//Margin
		if(!empty($section_option['margin']['top'])|| !empty($section_option['margin']['left']) || !empty($section_option['margin']['bottom']) || !empty($section_option['margin']['right'])){
			$section_margin_unit = !empty($section_option['margin']['unit']) ?$section_option['margin']['unit'] : 'px';
			$section_margin_top = intval(isset($section_option['margin']['top'])) ? 'margin-top:'.$section_option['margin']['top'].$section_margin_unit.';': '';
			$section_margin_left = intval(isset($section_option['margin']['left'])) ? 'margin-left:'.$section_option['margin']['left'].$section_margin_unit.';' : '';
			$section_margin_bottom = intval(isset($section_option['margin']['bottom'])) ? 'margin-bottom:'.$section_option['margin']['bottom'].$section_margin_unit.';' : '';
			$section_margin_right = intval(isset($section_option['margin']['right'])) ? 'margin-right:'.$section_option['margin']['right'].$section_margin_unit.';' : '';
			$css.= $item.' {'.$section_margin_top.$section_margin_left.$section_margin_bottom.$section_margin_right.'}';
		}
		//Padding
		
 		if(!empty($section_option['padding']['top'])|| !empty($section_option['padding']['left']) || !empty($section_option['padding']['bottom']) || !empty($section_option['padding']['right'])){
			$section_padding_unit = !empty($section_option['padding']['unit']) ?$section_option['padding']['unit'] : 'px';
			$section_padding_top = intval(isset($section_option['padding']['top'])) ? 'padding-top:'.$section_option['padding']['top'].$section_padding_unit.';': '';
			$section_padding_left = intval(isset($section_option['padding']['left'])) ? 'padding-left:'.$section_option['padding']['left'].$section_padding_unit.';' : '';
			$section_padding_bottom = intval(isset($section_option['padding']['bottom'])) ? 'padding-bottom:'.$section_option['padding']['bottom'].$section_padding_unit.';' : '';
			$section_padding_right = intval(isset($section_option['padding']['right'])) ? 'padding-right:'.$section_option['padding']['right'].$section_padding_unit.';' : '';		
			$css.= $item.' .sao-section-container {'.$section_padding_top.$section_padding_left.$section_padding_bottom.$section_padding_right.'}';
		}
		//Border
		if(!empty($section_option['border']['top'])|| !empty($section_option['border']['left']) || !empty($section_option['border']['bottom']) || !empty($section_option['border']['right'])){
			$section_border_unit = !empty($section_option['border']['unit']) ?$section_option['border']['unit'] : 'px';
			$section_border_top = intval(isset($section_option['border']['top'])) ? 'border-top-width:'.$section_option['border']['top'].$section_border_unit.';': '';
			$section_border_left = intval(isset($section_option['border']['left'])) ? 'border-left-width:'.$section_option['border']['left'].$section_border_unit.';' : '';
			$section_border_bottom = intval(isset($section_option['border']['bottom'])) ? 'border-bottom-width:'.$section_option['border']['bottom'].$section_border_unit.';' : '';
			$section_border_right = intval(isset($section_option['border']['right'])) ? 'border-right-width:'.$section_option['border']['right'].$section_border_unit.';' : '';		
			$section_border_style =isset($section_option['border']['style']) ? 'border-style:'.$section_option['border']['style'].';' : '';		
			$section_border_color =isset($section_option['border']['color']) ? 'border-color:'.$section_option['border']['color'].';' : '';	
 			$css.= $item.' {border-width: 0px;'.$section_border_top.$section_border_left.$section_border_bottom.$section_border_right.$section_border_style.$section_border_color.'}';
		} 
		
		//Box Shadow
 		if(!empty($section_option['shadow']['horizontal']) || !empty($section_option['shadow']['vertical']) || !empty($section_option['shadow']['blur']) || !empty($section_option['shadow']['spread'])){
			$section_shadow_unit = !empty($section_option['shadow']['unit']) ?$section_option['shadow']['unit'] : 'px';
			$section_shadow_horizontal = intval(isset($section_option['shadow']['horizontal'])) ? $section_option['shadow']['horizontal'].$section_shadow_unit.' ': '0 ';
			$section_shadow_vertical = intval(isset($section_option['shadow']['vertical'])) ?  $section_option['shadow']['vertical'].$section_shadow_unit.' ' : '0 ';
			$section_shadow_blur = intval(isset($section_option['shadow']['blur'])) ?  $section_option['shadow']['blur'].$section_shadow_unit.' ' : '0 ';
			$section_shadow_spread = intval(isset($section_option['shadow']['spread'])) ?  $section_option['shadow']['spread'].$section_shadow_unit.' ' : '0 ';		
			$section_shadow_color = intval(isset($section_option['shadow']['color'])) ? $section_option['shadow']['color'].' ' : '';		
			$section_shadow_position = (isset($section_option['shadow']['position'])) ? $section_option['shadow']['position'] : '';		
			$css.= $item.' {box-shadow:'.$section_shadow_horizontal.$section_shadow_vertical.$section_shadow_blur.$section_shadow_spread.$section_shadow_color.$section_shadow_position.'}';
		}
		
 		//Radius
		if(!empty($section_option['radius']['top_left'])|| !empty($section_option['radius']['top_right']) || !empty($section_option['radius']['bottom_right']) || !empty($section_option['radius']['bottom_left'])){
			$section_radius_unit = !empty($section_option['radius']['unit']) ?$section_option['radius']['unit'] : 'px';
			$section_radius_top_left = intval(isset($section_option['radius']['top_left'])) ? $section_option['radius']['top_left'].$section_radius_unit.' ': '0 ';
			$section_radius_top_right = intval(isset($section_option['radius']['top_right'])) ? $section_option['radius']['top_right'].$section_radius_unit.' ' : '0 ';
			$section_radius_bottom_right = intval(isset($section_option['radius']['bottom_right'])) ? $section_option['radius']['bottom_right'].$section_radius_unit.' ' : '0 ';
			$section_radius_bottom_left = intval(isset($section_option['radius']['bottom_left'])) ? $section_option['radius']['bottom_left'].$section_radius_unit.' ' : '0 ';		
			$css.= $item.' {border-radius: '.$section_radius_top_left.$section_radius_top_right.$section_radius_bottom_right.$section_radius_bottom_left.'}';
		}
	
		//Parallax
		if(!empty($section_option['background_parallax'] ) && !empty($section_option['background_image'])){
			$css.= $item.' {
				background-image: url("'.esc_url($section_option['background_image']['url']).'");
				background-attachment: fixed;
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			}';
  		} 
		//Background Color
 		if(isset($section_option['background_color']['first'])){
  			$background_color = sao_builder_gradient_background_color($section_option,'background_color');
 			$css.= $item.'::before {left: 0;  content:"";position: absolute; height: 100%; z-index:0; width: 100%;   '.$background_color.' }';	 
 		}  
 
	endforeach;			
	endif;

	wp_reset_query(); 



	$return['css'] = $css;
	$return['output']= $output;
	$return['script']= $script;
	return $return;
	
}  
 

function sao_section_background($option) {
		$output ='';
		if (!empty($option['background_image']) && empty($option['background_parallax'])){
   		$background_url = !empty($option['background_image']['url']) ? $option['background_image']['url']:'';
   		$background_width = !empty($option['background_image']['width']) ? $option['background_image']['width']:'';
   		$background_height = !empty($option['background_image']['height']) ? $option['background_image']['height']:'';
			
   
		$output.='<div class="sao-section-background">';
		$output.='<img alt="background" src="'.esc_url( $background_url).'" width="'.esc_attr( $background_width).'" height="'.esc_attr( $background_height).'" />';			 
		$output.='</div>';
				
				
 	 } 	
	 return $output ;
 }
 
 
 