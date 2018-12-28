<?php
/********************************************************************
Sao Option Value
*********************************************************************/
function sao_option_value($option=false,$id=false,$def = false){
   	$option_id = !empty( $option[$id] ) ? $option[$id] : $def;
     $ajax_sao_evalue_id = (isset($_REQUEST[$id])) ? $_REQUEST[$id] : $option_id; 
	return $ajax_sao_evalue_id;
	
}
/********************************************************************
Sao Post Module 1
*********************************************************************/
function sao_post_module_1($arge=false) { 

		$thumb = !empty($arge['thumb']) ? $arge['thumb']:'full';
		$title = !empty($arge['post_title']) ? $arge['post_title']:'';
		$excerpt = !empty($arge['excerpt']) ? $arge['excerpt']:'';
		$title_limit = !empty($arge['title_limit']) ? $arge['title_limit']:'';
		$excerpt_limit = !empty($arge['excerpt_limit']) ? $arge['excerpt_limit']:'';
		$meta = !empty($arge['meta']) ? $arge['meta']:'';
 
 
		$thumbnail = has_post_thumbnail() ? ' has-post-thumbnail ':'';
		$output ='<div class="sao-post sao-post-module-1 '.esc_attr($thumbnail).'  ">';
		$output.='<div class="sao-post-warp">';
			$output.= sao_thumb($thumb);
			$output.='<div class="sao-details sao-auto-width-item">';
 				if($title == true) {
					$output.=sao_post_title($title_limit);
				}
				if($excerpt == true){
					$output.=sao_excerpt($excerpt_limit);
				}
				$output.= sao_meta($meta); 
 			$output.= '</div>';
		$output.= '</div>';		 
		$output.= '</div>';
		return $output;

}
/********************************************************************
Sao Post Module 2
*********************************************************************/
function sao_post_module_2($arge=false) { 

		$thumb = !empty($arge['thumb']) ? $arge['thumb']:'full';
		$title = !empty($arge['post_title']) ? $arge['post_title']:'';
		$excerpt = !empty($arge['excerpt']) ? $arge['excerpt']:'';
		$title_limit = !empty($arge['title_limit']) ? $arge['title_limit']:'';
		$excerpt_limit = !empty($arge['excerpt_limit']) ? $arge['excerpt_limit']:'';
		$meta = !empty($arge['meta']) ? $arge['meta']:'';
 
 
		$thumbnail = has_post_thumbnail() ? ' has-post-thumbnail ':'';
		$output ='<div class="sao-post sao-post-module-2 '.esc_attr($thumbnail).'  ">';
		$output.='<div class="sao-post-warp">';
			$output.= sao_thumb($thumb);
			$output.='<div class="sao-details sao-auto-width-item">';
 				if($title == true) {
					$output.=sao_post_title($title_limit);
				}
				if($excerpt == true){
					$output.=sao_excerpt($excerpt_limit);
				}
				$output.= sao_meta($meta); 
 			$output.= '</div>';
		$output.= '</div>';		 
		$output.= '</div>';
		return $output;

}
/********************************************************************
Sao Post Module 3
*********************************************************************/ 
function sao_post_module_3($arge=false) { 

		$thumb = !empty($arge['thumb']) ? $arge['thumb']:'full';
		$title = !empty($arge['post_title']) ? $arge['post_title']:'';
		$excerpt = !empty($arge['excerpt']) ? $arge['excerpt']:'';
		$title_limit = !empty($arge['title_limit']) ? $arge['title_limit']:'';
		$excerpt_limit = !empty($arge['excerpt_limit']) ? $arge['excerpt_limit']:'';
		$meta = !empty($arge['meta']) ? $arge['meta']:'';
 
 
		$thumbnail = has_post_thumbnail() ? ' has-post-thumbnail ':'';
		$output ='<div class="sao-post sao-post-module-3 '.esc_attr($thumbnail).'  ">';
		$output.='<div class="sao-post-container">';
		$output.='<div class="sao-post-warp">';
 			$output.= sao_thumb($thumb);
			$output.='<div class="sao-details sao-auto-width-item">';
 				if($title == true) {
					$output.=sao_post_title($title_limit);
				}
				if($excerpt == true){
					$output.=sao_excerpt($excerpt_limit);
				}
				$output.= sao_meta($meta); 
 			$output.= '</div>';
		$output.= '</div>';		 
		$output.= '</div>';		 
		$output.= '</div>';
		return $output;

}

/********************************************************************
 Post Title Box
*********************************************************************/ 
function sao_title_box($option){
  	if(!empty($option['title'])){
  		return '<div class="sao-title-box"><h4><span>'.esc_html($option['title']).'</span></h4></div>';
	}
}
/********************************************************************
Read More
*********************************************************************/ 
function sao_readmore() { 
	return '<div class="sao-readmore"><a href="'.the_permalink().'" class="sao-font-medium">'.esc_html(sao_t('read_more')).'</a></div>';
}
/********************************************************************
Post Load More
*********************************************************************/
function sao_load_more($option,$id= false){
 	global  $post;
   	$max_page= sao_query()->max_num_pages;
	if(!empty($option['load_more'])){
		$option['action']=$id;
		$option['post_status']='publish';
 		return '<div class="sao-load-more" ><span  data-page="2" data-max_page="'.esc_attr($max_page).'" >'.esc_html(sao_t('load_more')).'<i></i></span><div class="sao-data-json">'.json_encode($option).'</div></div>';
 	}
}
/********************************************************************
Post Query
*********************************************************************/
function sao_query($option=false,$build_query= false){
  	$page = (isset($_REQUEST['pageNumber'])) ? $_REQUEST['pageNumber'] : 1;
	$publish = (isset($_REQUEST['post_status'])) ? $_REQUEST['post_status'] : 'publish';
	$value = sao_option_value($option,'value','');
	
	if($value=='post_grid'){
			$number_default='3';
	}elseif($value== 'post_list'){
		$number_default='2';
	}else{
		$number_default='4';
	}
	
	$number = sao_option_value($option,'number',$number_default);
	$post_type = sao_option_value($option,'post_type');
	$sliders = sao_option_value($option,'sliders');
	$cats = sao_option_value($option,'cats');
	$multi_cats = sao_option_value($option,'multi_cats');
 	$orderby = sao_orderby();
	$date_query = sao_date_query();
  	$meta_key = sao_meta_key();	
	$args = array();
	$args['post_status'] =  $publish;
  	if(!$build_query== true &&  !empty($number)){
		$args['posts_per_page']=$number;
	}
	
	if($post_type=='slides'){
		
		$args['post_type'] = 'sao_slide';
 		$args['no_found_rows'] = 1;
		$args['taxonomy'] = 'sao_sliders';	
		$args['field'] = 'slug'; 
		if(!empty($sliders)){
			$args['terms']= array ($sliders);
		 } 
 	}else{
 
		if(!empty($cats)){
 			$args['cat']=$cats;
 		 } 

		 if(!empty($multi_cats)){
 			$key_multi = implode(", ", array_keys($multi_cats));
  			$args['cat']=$key_multi;
 		}

		if(!empty($orderby)){
 			$args['orderby']=$orderby;
 		}

		if( !empty($date_query)){
 			$args['date_query']=$date_query;
 		}

  		if(!empty($meta_key)){
 			$args['meta_key']= $meta_key;
 		}
 		
 		if(!$build_query== true){
 			$args['paged']=$page; 
 		}

	}

   	if($build_query== true){	
		$query=	'?'.http_build_query($args);
 	}else{ 
		$query = new WP_Query($args );
 	} 
 	return $query;
 	
}

function sao_slider_quray($sao_option_value){

	$args = array();
	$args['posts_per_page']='3';
	$args['post_type'] = 'sao_slide';
	$args['no_found_rows'] = 1;
	$args['field'] = 'id';
 
  
	if(!empty($sao_option_value['sliders'])){

		$args['tax_query']= array(
			array(
            'taxonomy' => 'sao_sliders',
            'terms' => $sao_option_value['sliders'],
            'field' => 'term_id',
        	)
		);

	}
	
	$query = new WP_Query($args );
	return $query;

} 

 
function sao_max_page($cats= false, $orderby=false){
 
  		$number = sao_option_value($option,'number','5');
 		$orderby = sao_orderby();
 		$date_query = sao_date_query();
   		$meta_key = sao_meta_key();	
 		$args = array();
 		$args['post_status'] =  'publish';

		if(!empty($number)){
			$args['posts_per_page']=$number;
		}
		if(!empty($cats)){
 			$args['cat']=$cats;
 		 } 
 
		if(!empty($orderby)){
 			$args['orderby']=$orderby;
 		}

  		if(!empty($date_query)){
 			$args['date_query']=$date_query;
 		}
		
  		if(!empty($meta_key)){
 			$args['meta_key']= $meta_key;
 		} 
		
		$query = new WP_Query($args );

	 	$max_page= $query->max_num_pages;
 		return $max_page;
}
 
function sao_query_page($build_query= false){

 		global $sao_option_value;
  		$page = !empty( $sao_option_value['page'] ) ? $sao_option_value['page'] : '';
 
		$args['post_type']= 'page';
		if(!empty($cats)){
			$args['p'] = $page;  
		}
  
		$query = new WP_Query($args );
 		return $query;
}

/********************************************************************
Post Date Query
*********************************************************************/ 
function sao_date_query($option=false,$custom = false){

	if(!empty($custom)){

		$orderby =   isset( $custom['orderby'] ) ? $custom['orderby'] : null;

	} else{
 		$orderby = sao_option_value($option,'orderby');

	} 
		
 	if($orderby =='rand-day' || $orderby =='last-comment-day'||$orderby =='most-comment-day'||$orderby =='views-day'||$orderby =='best-reviews-day'){
 			$date_query = array(array('after' => '1 day ago' )) ;
			
 	} elseif($orderby =='rand-week'|| $orderby =='last-comment-week'|| $orderby =='most-comment-week'|| $orderby =='views-week'|| $orderby =='best-reviews-day'){
			$date_query = array(array('after' => '1 week ago' )) ;


	} elseif( $orderby =='rand-month'|| $orderby =='last-comment-month'|| $orderby =='most-comment-month'|| $orderby =='views-day'|| $orderby =='best-reviews-month'){
			$date_query = array(array('after' => '1 month ago' )) ;


	} elseif( $orderby =='rand-year'|| $orderby =='last-comment-year'|| $orderby =='most-comment-year'|| $orderby =='views-year'|| $orderby =='best-reviews-year'){
			$date_query = array(array('after' => '1 year ago' )) ;

	}else{
		$date_query='';

	}
	return $date_query;
} 

/********************************************************************
Post Orderby
*********************************************************************/

function sao_orderby($option=false,$custom = false){
	if(!empty($custom)){
		$orderby = isset( $custom['orderby'] ) ? $custom['orderby'] : null;
	} else{
 		$orderby = sao_option_value($option,'orderby');
 	}
 	
	if( $orderby == 'rand'|| $orderby =='rand-day'|| $orderby =='rand-week'|| $orderby =='rand-month'|| $orderby =='rand-year'){
		$order='rand';
		
	}elseif( $orderby == 'most-comment'|| $orderby =='most-comment-day'|| $orderby =='most-comment-week'|| $orderby =='most-comment-month'|| $orderby =='most-comment-year'){
		$order='comment_count';

	}elseif( $orderby == 'views'|| $orderby =='views-day'|| $orderby =='views-week'|| $orderby =='views-month'|| $orderby =='views-year'
		|| $orderby == 'best-reviews'|| $orderby =='best-reviews-day'|| $orderby =='best-reviews-week'|| $orderby =='best-reviews-month'|| $orderby =='best-reviews-year'){
		$order='meta_value_num';								

	} else {
 		$order='';
	}

	return $order;

}
/********************************************************************
Post Meta Key
*********************************************************************/

function sao_meta_key($option=false,$custom = false){
	if(!empty($custom)){
		$orderby = isset( $custom['orderby'] ) ? $custom['orderby'] : null;
	} else{
		$orderby = sao_option_value($option,'orderby');
	}	

  	if( $orderby == 'views'|| $orderby =='views-day'|| $orderby =='views-week'|| $orderby =='views-month'|| $orderby =='views-year'){
		$meta_key='sao_views_count';

	} elseif($orderby == 'best-reviews'|| $orderby =='best-reviews-day'|| $orderby =='best-reviews-week'|| $orderby =='best-reviews-month'|| $orderby =='best-reviews-year'){
		$meta_key='sao_review_score';	

	} else{
		$meta_key='';			
 	}

	return $meta_key;

}


function sao_meta($option =false){ 
	global  $post,$smof_data;
  	$meta = get_post_meta( $post->ID );
 	$meta_category =!empty($option['meta_category']) ? $option['meta_category']:'' ;
	$meta_author = !empty($option['meta_author'] )? $option['meta_author']:'' ;
	$meta_date = !empty($option['meta_date'] )? $option['meta_date']:'' ;
 	$meta_comments =!empty( $option['meta_comments'])? $option['meta_comments']:'' ; 
	$categories = get_the_category();
 
	$output ='';  
	ob_start(); 
 	
 	if( (!empty($meta_category))|| !empty($meta_author) || !empty($meta_date) ||!empty($meta_view) || !empty($meta_comments)){ 
 
	echo '<ul class="sao-meta">';
     	if(!empty($meta_category )){  
 			echo '<li class="sao-cats sao-font-small"><a href="'.esc_url_raw( get_category_link( $categories[0] ) ).'">'.esc_html( $categories[0]->name ).'</a></li>';
		}  
		if( !empty($meta_author)){  	
			echo '<li class="sao-author sao-font-small">'.esc_html(sao_t('by')).' '.get_the_author_link().'</li>';
		}  
 
        if(!empty( $meta_date) ){  
			echo '<li class="sao-date sao-font-small">'.esc_html(get_the_time(get_option('date_format'))).'</li>';
		} 
 
		if(!empty($meta_comments)){ 
			echo '<li class="sao-comment sao-font-small">';
			comments_popup_link(sao_t('nocommentsyet'),sao_t('1').' '.sao_t('comment'),'%'.' '.sao_t('comments'), '', sao_t('commetsoff'));
			echo '</li>';
		  }
 	echo '</ul>';
	 
	} 
	return ob_get_clean(); 
} 
 
/********************************************************************
Sidebar
*********************************************************************/ 
function sao_sidebar(){ 

	global $sao_option_value;

 	$sidebar = !empty( $sao_option_value[ 'sidebar' ] ) ? $sao_option_value[ 'sidebar' ] : '';

     	if ( is_active_sidebar( $sidebar ) ) : 
			echo '<section class="sao-main-sidebar sao-sidebar  " >';
				dynamic_sidebar( sanitize_title($sidebar) ); 
			echo '</section>';

		endif;

 }



/********************************************************************
Thumb Post
*********************************************************************/
function sao_thumb(  $thumb , $category = false ) { 
 	global $post,$sao_option_value;
	$meta = get_post_meta( $post->ID );
	/*
	$post_type = sao_option_value($option,'post_type');

	if($post_type=='slides'){
 			$the_permalink = !empty($meta['reza_slide_link'][0]) ? $meta['reza_slide_link'][0] :''; 
	}else{
	}*/	
	$get_the_post_thumbnail = get_the_post_thumbnail($post->ID, $thumb );
	$the_permalink = get_permalink();

	$output ='';
  	if(has_post_thumbnail()){

	 
		$output.='<div class="sao-thumb">';
		$output.='<a class="sao-post-thumbnail" href="'.esc_url($the_permalink).'" >';
		 $output.= $get_the_post_thumbnail;
		$output.='</a>';
		$output.= '</div>';

 	 return $output;

	}

}

/********************************************************************
Post Title
*********************************************************************/ 
function sao_post_title($limit= false) {
	$the_title = strip_tags(get_the_title());

  	if ( !empty($limit) && strlen($the_title) > $limit){
 		 $content= mb_substr($the_title, 0,$limit).'...';
  	} else {
		$content= $the_title;
		$dots='';
	}
 	 $permalink = get_permalink();

 	return '<h3 class="sao-title sao-font-large"><a class="sao-font-large" href=" '.esc_url($permalink).'">'.esc_html($content).'</a></h3>';
	 
}

/********************************************************************
Post Excerpt
*********************************************************************/ 
function sao_excerpt($limit=false) {

  	$the_excerpt = strip_tags(get_the_excerpt());
  	if ( !empty($limit) && strlen($the_excerpt) > $limit){
 		 $content= mb_substr($the_excerpt, 0,$limit).'...';
	}else{
		$content= $the_excerpt;
 	}	return '<div class="sao-excerpt sao-font-medium">'.esc_html($content).'</div>';
}

/********************************************************************
Sao LightSlider
*********************************************************************/
function sao_lightslider($sao_evalue,$max_number,$item,$slider_options=false) {

 	$number = isset( $sao_evalue['number'] ) ? $sao_evalue['number'] : '5'; 
 
 	$slider_options["item"] = $item;
	$slider_options["slideMove"] = 1;
	$slider_options["slideMargin"] = 0;
 	$slider_options["controls"] = true;
	$slider_options["loop"] = true;
	$slider_options["auto"] = true;
 
 	if($number > $max_number){ 
  		return '<div class="sao-slider-options">'.json_encode($slider_options).'</div>';
	}

} 
?>
