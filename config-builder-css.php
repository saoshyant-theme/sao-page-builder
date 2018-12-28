<?php


function sao_margin_horizontal( $key,$option) {
	$css="";
	if(!empty($option['margin']['top'])|| !empty($option['margin']['bottom'])){
		$unit = !empty($option['margin']['unit']) ?$option['margin']['unit'] : 'px';
		$margin_top = intval(isset($option['margin']['top'])) ? 'margin-top:'.$option['margin']['top'].$unit.';': '';
		$margin_bottom = intval(isset($option['margin']['bottom'])) ? 'margin-bottom:'.$option['margin']['bottom'].$unit.';' : '';
		$css.='.sao-element-'.$key.'  {'.$margin_top.$margin_bottom.'}';
	}
	return $css;
}

function sao_element_padding( $key,$option) {
	$css="";
	if(!empty($option['padding']['top']) || !empty($option['padding']['left']) || !empty($option['padding']['bottom']) || !empty($option['padding']['right']) ){
		$padding_unit = !empty($option['padding']['unit']) ?$option['padding']['unit'] : 'px';
		$padding_top = intval(isset($option['padding']['top'])) ? 'padding-top:'.$option['padding']['top'].$padding_unit.';': '';
		$padding_left = intval(isset($option['padding']['left'])) ? 'padding-left:'.$option['padding']['left'].$padding_unit.';' : '';
		$padding_bottom = intval(isset($option['padding']['bottom'])) ? 'padding-bottom:'.$option['padding']['bottom'].$padding_unit.';' : '';
		$padding_right = intval(isset($option['padding']['right'])) ? 'padding-right:'.$option['padding']['right'].$padding_unit.';' : '';		
		$css.='.sao-element-'.$key.' {'.$padding_top.$padding_left.$padding_bottom.$padding_right.'}';
	}
	return $css;
}

function sao_element_padding_item( $option,$id) {
	$css="";
	if(!empty($option[$id]['top']) || !empty($option[$id]['left'])  || !empty($option[$id]['bottom']) || !empty($option[$id]['right'])){
		$padding_unit = !empty($option[$id]['unit']) ?$option['padding']['unit'] : 'px';
		$padding_top = intval(isset($option[$id]['top'])) ? 'padding-top:'.$option[$id]['top'].$padding_unit.';': '';
		$padding_left = intval(isset($option[$id]['left'])) ? 'padding-left:'.$option[$id]['left'].$padding_unit.';' : '';
		$padding_bottom = intval(isset($option[$id]['bottom'])) ? 'padding-bottom:'.$option[$id]['bottom'].$padding_unit.';' : '';
		$padding_right = intval(isset($option[$id]['right'])) ? 'padding-right:'.$option[$id]['right'].$padding_unit.';' : '';		
		$css.=' '.$padding_top.$padding_left.$padding_bottom.$padding_right.' ';
	}
	return $css;
}
 


 function sao_builder_text_shadow( $option,$id) {
	$css="";
	if(!empty($option[$id])){
			$text_shadow_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
			$text_shadow_horizontal = intval(isset($option[$id]['horizontal'])) ? $option[$id]['horizontal'].$text_shadow_unit.' ': '0 ';
			$text_shadow_vertical = intval(isset($option[$id]['vertical'])) ?  $option[$id]['vertical'].$text_shadow_unit.' ' : '0 ';
			$text_shadow_blur = intval(isset($option[$id]['blur'])) ?  $option[$id]['blur'].$text_shadow_unit.' ' : '0 ';
			$text_shadow_color = isset($option[$id]['color']) ? $option[$id]['color'].' ' : '';		
			$css.=  ' text-shadow:'.$text_shadow_horizontal.$text_shadow_vertical.$text_shadow_blur.$text_shadow_color.'; ';
		}
	return $css;
}

function sao_builder_gradient_background_color( $option,$id,$id_2=false ) {
	$css='';
		
	if(!empty($id_2)){
		$background_color = !empty($option[$id][$id_2])?$option[$id][$id_2]:'';
		
	}else{
		$background_color = !empty($option[$id])?$option[$id]:'';
	}
	
	if(isset($background_color['first'])){
			$orientation = !empty($background_color['orientation'])? $background_color['orientation']:'';
			
		if($orientation == "horizontal"){
					$type = 'linear';
					$moz = 'left';
					$liner = 'to right';
				}elseif($orientation == "vertical"){
					$type = 'linear';
					$moz = 'top';
					$liner = 'to bottom';
					
				}elseif($orientation == "diagonal"){
					$type = 'linear';
					$moz = '-45deg';
					$liner = '135deg';
				}elseif($orientation == "diagonal"){
					$type = 'linear';
					$moz = '-45deg';
					$liner = '135deg';
				}elseif($orientation == "diagonal-bottom"){
					$type = 'linear';
					$moz = '45deg';
					$liner = '45deg';
				}elseif($orientation == "radial"){
					$type = 'radial';
					$moz = 'center, ellipse cover';
					$liner = 'ellipse at center';
				}else{
					$type = 'linear';
					$moz = '45deg';
					$liner = '45deg';						
				}
					
 			$css.= 'background-color: '.esc_html($background_color['first']).' !important;';
				
			if(!empty($background_color['second'])){
				
				if(!empty($background_color['third'])){
					$css.= ' background: -moz-'.$type.'-gradient('.$moz.', '.$background_color['first'].' 0%,'.$background_color['second'].' 50%, '.$background_color['third'].' 100%) !important;';
					$css.= ' background: -webkit-'.$type.'-gradient('.$moz.', '.$background_color['first'].' 0%,'.$background_color['second'].' 50%,'.$background_color['third'].' 100%) !important; '; 								
					$css.= ' background: '.$type.'-gradient('.$liner.', '.$background_color['first'].' 0%,'.$background_color['second'].' 50%,'.$background_color['third'].' 100%) !important;';
					
				} else{
					
  					$css.= ' background: -moz-'.$type.'-gradient('.$moz.', '.$background_color['first'].' 0%, '.$background_color['second'].' 100%) !important;';
					$css.= ' background: -webkit-'.$type.'-gradient('.$moz.', '.$background_color['first'].' 0%,'.$background_color['second'].' 100%) !important; '; 								
					$css.= ' background: '.$type.'-gradient('.$liner.', '.$background_color['first'].' 0%,'.$background_color['second'].' 100%) !important;';
				}
				 
			} 
	}
		
	return $css;
 
}
function sao_builder_border( $option,$id ) {
	$css="";

		if(!empty($option[$id]['top']) || !empty($option[$id]['left']) || !empty($option[$id]['bottom']) || !empty($option[$id]['right'])){
			$border_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
			$border_top = intval(isset($option[$id]['top'])) ? 'border-top-width:'.$option[$id]['top'].$border_unit.' !important;': '';
			$border_left = intval(isset($option[$id]['left'])) ? 'border-left-width:'.$option[$id]['left'].$border_unit.'  !important;' : '';
			$border_bottom = intval(isset($option[$id]['bottom'])) ? 'border-bottom-width:'.$option[$id]['bottom'].$border_unit.' !important;' : '';
			$border_right = intval(isset($option[$id]['right'])) ? 'border-right-width:'.$option[$id]['right'].$border_unit.' !important;' : '';		
			$border_style = isset($option[$id]['style']) ? 'border-style:'.$option[$id]['style'].' !important;' : '';		
			$border_color = isset($option[$id]['color']) ? 'border-color:'.$option[$id]['color'].' !important;' : '';	
			$css.=  ' border-width: 0px !important;'.$border_top.$border_left.$border_bottom.$border_right.$border_style.$border_color.'';
		} 
		
	return $css;	
}
function sao_builder_border_mini( $option,$id ) {
	$css="";

		if(!empty($option[$id]['size'])){ 
			$border_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
 			$border_width = intval(isset($option[$id]['size'])) ? 'border-width:'.$option[$id]['size'].$border_unit.' !important;' : '';		
			$border_style =  isset($option[$id]['style']) ? 'border-style:'.$option[$id]['style'].' !important;' : '';		
			$border_color =  isset($option[$id]['color']) ? 'border-color:'.$option[$id]['color'].' !important;' : '';		
			$css.= $border_width.$border_style.$border_color;
 		 
		} 
		
	return $css;	
}
function sao_builder_shadow( $option,$id ) {
		$css="";

		if(!empty($option[$id]['horizontal']) || !empty($option[$id]['vertical']) || !empty($option[$id]['blur']) || !empty($option[$id]['spread'])){
			$shadow_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
			$shadow_horizontal = intval(isset($option[$id]['horizontal'])) ? $option[$id]['horizontal'].$shadow_unit.' ': '0 ';
			$shadow_vertical = intval(isset($option[$id]['vertical'])) ?  $option[$id]['vertical'].$shadow_unit.' ' : '0 ';
			$shadow_blur = intval(isset($option[$id]['blur'])) ?  $option[$id]['blur'].$shadow_unit.' ' : '0 ';
			$shadow_spread = intval(isset($option[$id]['spread'])) ?  $option[$id]['spread'].$shadow_unit.' ' : '0 ';		
			$shadow_color = !empty($option[$id]['color']) ? $option[$id]['color'].' ' : '';		
			$shadow_position = !empty($option[$id]['position']) ? $option[$id]['position'] : '';		
			$css.=  ' box-shadow:'.$shadow_horizontal.$shadow_vertical.$shadow_blur.$shadow_spread.$shadow_color.$shadow_position.' !important;';
		}
	return $css;	
		
}
 
function sao_builder_radius( $option,$id ) {
		$css="";
		if(!empty($option[$id])){
			$radius_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
			$radius_top_left = intval(isset($option[$id]['top_left'])) ? $option[$id]['top_left'].$radius_unit.' ': '0 ';
			$radius_top_right = intval(isset($option[$id]['top_right'])) ? $option[$id]['top_right'].$radius_unit.' ' : '0 ';
			$radius_bottom_right = intval(isset($option[$id]['bottom_right'])) ? $option[$id]['bottom_right'].$radius_unit.' ' : '0 ';
			$radius_bottom_left = intval(isset($option[$id]['bottom_left'])) ? $option[$id]['bottom_left'].$radius_unit.' ' : '0 ';		
			$css.=  ' border-radius: '.$radius_top_left.$radius_top_right.$radius_bottom_right.$radius_bottom_left.' !important;';
		}
	return $css;	
}

function sao_builder_radius_mini( $option,$id ) {
		$css="";
		if(!empty($option[$id]['size'])){
			$radius_unit = !empty($option[$id]['unit']) ?$option[$id]['unit'] : 'px';
   			$radius_size = intval(isset($option[$id]['size'])) ? $option[$id]['size'].$radius_unit.' ' : '0 ';		
			$css.=' border-radius: '.$radius_size.'  !important;';
		}
	return $css;	
}


function sao_builder_font_size( $option,$id ) {
	$css="";
 	if(!empty($option[$id]['size'])){
		$text_font_size_unit = !empty($option[$id]['unit']) ? $option[$id]['unit'] : 'px';
		$css.= intval(isset($option[$id]['size'])) ? ' font-size:'.$option[$id]['size'].$text_font_size_unit.' !important;': ' ';
	}
	return $css;	
}

function sao_builder_icon_size( $option,$id ) {
	$css="";
 	if(!empty($option[$id])){
		$css.=  ' font-size:'.$option[$id].' !important;';
	}
	return $css;	
}

function sao_builder_font_weight( $option,$id ) {
	$css="";
 	if(!empty($option[$id])){
		$css.= ' font-weight: '.$option[$id].' !important;';
 
	}
	return $css;	
}

function sao_builder_line_height( $option,$id ) {
	$css="";
 	if(!empty($option[$id]['size'])){
		$text_line_height_unit = !empty($option[$id]['unit']) ? $option[$id]['unit'] : 'px';
		$css.= intval(isset($option[$id]['size'])) ? ' line-height:'.$option[$id]['size'].$text_line_height_unit.' !important;': ' ';
	}
	return $css;	
}

function sao_builder_text_decoration( $option,$id ) {
	$css="";
 	if(!empty($option[$id])){
 		$css.=  ' text-decoration:'.$option[$id].'  !important;';
 	}
	return $css;	
}
function sao_builder_font_style( $option,$id ) {
	$css="";
 	if(!empty($option[$id])){
 		$css.=  ' font-style:'.$option[$id].'  !important;';
 	}
	return $css;	
}
function sao_builder_text_transform( $option,$id ) {
	$css="";
 	if(!empty($option[$id])){
 		$css.=  ' text-transform:'.$option[$id].'  !important;';
 	}
	return $css;	
}



function sao_builder_color( $option,$id,$id_2 =false ) {
	$css=""; 
	
	if(!empty($id_2)){
		$color = !empty($option[$id][$id_2])? $option[$id][$id_2]:'' ;
		
	}else{
		$color = !empty($option[$id])?$option[$id]:'';
	}
	
	if(!empty($color)){
		
		$css.= 'color:'.esc_html($color).'  !important;';
	}
 
	return $css;	
}


function sao_builder_background_color( $option,$id,$id_2 =false ) {
	$css=""; 
	
	if(!empty($id_2)){
		$color = !empty($option[$id][$id_2])? $option[$id][$id_2]:'' ;
		
	}else{
		$color = !empty($option[$id])?$option[$id]:'';
	}
	
	if(!empty($color)){
		
		$css.= 'background:'.esc_html($color).'  !important;';
	}
 
	return $css;	
}




function sao_builder_item_css($id,$item ) {
	$css="";
	if(!empty($id)){
		$css= $item .' {'.$id.'}';
	}
  
	return $css;	
}
?>