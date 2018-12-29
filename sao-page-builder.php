<?php
/*
Plugin Name: Sao Page Bulider
Description: Drag and drop page builder for WordPress 
Author: Saoshyant-Theme
Version: 1.0

*/ 
/*********************************************************************************************
Registers Custom Slider Post Type
*********************************************************************************************///
//include   
include_once plugin_dir_path(__FILE__) . 'options/builder-array.php';
include_once plugin_dir_path(__FILE__) . 'options/builder-options-section.php';
include_once plugin_dir_path(__FILE__) . 'options/builder-options-column.php';
include_once plugin_dir_path(__FILE__) . 'options/builder-options-element.php';

include_once plugin_dir_path(__FILE__) . 'framework/builder.php';
include_once plugin_dir_path(__FILE__) . 'framework/builder-section.php';
include_once plugin_dir_path(__FILE__) . 'framework/builder-column.php';
include_once plugin_dir_path(__FILE__) . 'framework/builder-element.php'; 
include_once plugin_dir_path(__FILE__) . 'framework/builder-options-functions.php';
include_once plugin_dir_path(__FILE__) . 'framework/builder-code.php';
include_once plugin_dir_path(__FILE__) . 'framework/builder-template.php';

include_once plugin_dir_path(__FILE__) . 'inc/section-config.php';
include_once plugin_dir_path(__FILE__) . 'inc/column-config.php';
include_once plugin_dir_path(__FILE__) . 'inc/element-config.php';
include_once plugin_dir_path(__FILE__) . 'inc/post-functions.php';
include_once plugin_dir_path(__FILE__) . 'config-builder-css.php';
  
  
//Element
include_once plugin_dir_path(__FILE__) . 'element/text.php';
include_once plugin_dir_path(__FILE__) . 'element/text_block.php';
include_once plugin_dir_path(__FILE__) . 'element/button.php';
include_once plugin_dir_path(__FILE__) . 'element/icon.php';
include_once plugin_dir_path(__FILE__) . 'element/icon_text.php';
include_once plugin_dir_path(__FILE__) . 'element/icon_text_2.php';
include_once plugin_dir_path(__FILE__) . 'element/text_list.php';
include_once plugin_dir_path(__FILE__) . 'element/accordion.php';
include_once plugin_dir_path(__FILE__) . 'element/tabs.php';
 
include_once plugin_dir_path(__FILE__) . 'element/image.php';
include_once plugin_dir_path(__FILE__) . 'element/image_gallery.php';
include_once plugin_dir_path(__FILE__) . 'element/image_gallery_slider.php';
include_once plugin_dir_path(__FILE__) . 'element/image_gallery_carousel.php';
include_once plugin_dir_path(__FILE__) . 'element/post_list.php';
include_once plugin_dir_path(__FILE__) . 'element/post_grid.php';
include_once plugin_dir_path(__FILE__) . 'element/post_featured.php';
include_once plugin_dir_path(__FILE__) . 'element/notification_box.php';
include_once plugin_dir_path(__FILE__) . 'element/divider.php';
include_once plugin_dir_path(__FILE__) . 'element/widgets.php';
include_once plugin_dir_path(__FILE__) . 'element/html.php';
include_once plugin_dir_path(__FILE__) . 'element/shortcodes.php';
 
  
/********************************************************************
Style Method
*********************************************************************/
add_action( 'wp_enqueue_scripts', 'sao_styles_method' );
function sao_styles_method() {
	wp_enqueue_style('sao_builder_css',plugin_dir_url(__FILE__). 'assets/css/style.css'); 
	wp_enqueue_script( 'lightslider', plugin_dir_url(__FILE__) . 'assets/js/lightslider.js', array( 'jquery'),'','',true);  
    wp_register_script('sao_builder_script',plugin_dir_url(__FILE__) .'assets/js/script.js', array( 'jquery')); 
	
	$array = array( 'ajaxurl' => admin_url( 'admin-ajax.php'  ));
	wp_localize_script( 'sao_builder_script', 'builder_js', $array  );	
	wp_enqueue_script( 'sao_builder_script' );
	wp_enqueue_style( 'sao_font_awesomes', plugin_dir_url(__FILE__).'assets/css/font-awesome.min.css',array() );
 
} 
/********************************************************************
Page Builder Config
*********************************************************************/
add_filter('the_content','sao_page_builder_config');
function sao_page_builder_config($content){
	global $post;
	$sao_show_page_builder = get_post_meta($post->ID, 'sao_show_page_builder',false);
	if(!empty($sao_show_page_builder)){
		return  sao_builder_config(1);
	}else{
		return $content;
	}

}
/********************************************************************
Sao Builder Config
*********************************************************************/
add_action( 'wp_enqueue_scripts', 'sao_builder_config' ); 
function sao_builder_config($out = false) {
	if( is_singular()) {
		global $post;
 	 	
	global $post;
 
	$section = sao_section_config($post->ID);

	if(!empty($out)){
		return !empty($section['output'])?$section['output']:'';
 	}else{
		
		$css= !empty($section['css'])?$section['css']:'';
		$script= !empty($section['script'])?$section['script']:'';
 		wp_add_inline_style( 'sao_builder_css',$css );
 		wp_add_inline_script( 'sao_builder_script','jQuery(document).ready(function(){'.$script.'});');
	}
	}  
}
 

/********************************************************************
Admin Builder Enqueue
*********************************************************************/
add_action('admin_enqueue_scripts', 'sao_builder_enqueue');
function sao_builder_enqueue($hook) {
 
	wp_register_script('sao_builder', plugin_dir_url(__FILE__) .'assets/js/builder.js', array('jquery', 'jquery-ui-sortable','jquery-ui-droppable') ,'1.0', true );
	wp_enqueue_style('sao_builder', plugin_dir_url(__FILE__) .'assets/css/builder.css');
	wp_enqueue_script( 'lightslider', plugin_dir_url(__FILE__) . 'assets/js/lightslider.js', array( 'jquery'));  
 	wp_enqueue_script('sao_builder_script',plugin_dir_url(__FILE__) .'assets/js/script.js', array( 'jquery')); 
 
	wp_enqueue_style('sao_builder_css',plugin_dir_url(__FILE__). 'assets/css/style.css'); 
	wp_enqueue_style( 'sao_font_awesomes', plugin_dir_url(__FILE__).'assets/css/font-awesome.min.css',array() );
	
	$array = array( 'ajaxurl' => admin_url( 'admin-ajax.php'  ));
	wp_localize_script( 'sao_builder', 'builder_js', $array  );	
	
 	wp_enqueue_media();
	wp_enqueue_script('jquery-ui-slider');
   	wp_enqueue_style('jquery-ui-custom-admin',  plugin_dir_url(__FILE__) .'/assets/css/jquery-ui-custom.css');
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script( 'serializejson', plugin_dir_url(__FILE__) .'/assets/js/jquery.serializejson.min.js' ); 
 
	wp_enqueue_script( 'cs-wp-color-picker',plugin_dir_url(__FILE__) .'/assets/js/cs-wp-color-picker.min.js',  array( 'wp-color-picker' ), '1.0.0', true ); 
	wp_localize_script('sao_builder', 'sao_text', array(
		'choose'				=>	esc_html__('Choose Image','sao'), 
 		'remove'				=>	esc_html__('Remove','sao'),
		'uploader_button'		=>	esc_html__('Use This Image','sao'), 
		'empty'				=>	esc_html__('Name is empty!','sao'), 
		'change_column'		=>	esc_html__('Change the Column','sao'), 
		'retry'				=>	esc_html__('Name already exist!','sao'), 
		'agree'				=>	esc_html__('Do you agree?','sao'), 
		'error'				=>	esc_html__('Error','sao'), 
		 
	));
 
   	wp_enqueue_script( 'sao_builder' );

}
 

function sao_serialize_code($in,$code) { 
	preg_match_all('/\[('.$code.'_\d+)(_\d+)?(?: (attr_[^"]*)="([^"]*)")?\](.+(?=\[\/\1\2?\]))?/',$in,$out,PREG_SET_ORDER);
 	foreach($out as $sc){
		if(!empty($sc[1]) && ($parent_i=array_search($sc[1],array_column($out,1)))!==false){
        // store child data in parent's content array
        $shortcodes[$sc[1]]=['name'=>$sc[1].$sc[2],'key'=>!empty($sc[4])? $sc[4]:'' ,'value'=> !empty($sc[5])? $sc[5]:'' ];
    	}
	}
	$shortcod = !empty($shortcodes)? $shortcodes:'';
	return  $shortcod;
}
  
/********************************************************************
sao translate
*********************************************************************/
function sao_t($id) {
	global $smof_data;
	$t = !empty( $smof_data['sao_t_'.$id]) ?  $smof_data['sao_t_'.$id]  : sao_translation($id);
	return esc_html($t);
} 
/********************************************************************
sao translate
*********************************************************************/
function sao_translation($id= false) {
switch( $id ) {
	case '1':		$val=esc_html__('1', 'sao'); break;
	case 'commetsoff':		$val=esc_html__('Comments Off', 'sao'); break;
	case 'by':				$val=esc_html__('By', 'beyshop'); break;
	case 'load_more':		$val=esc_html__('Load more', 'sao'); break;
 	case 'nocommentsyet':	$val=esc_html__('No Comments Yet', 'sao'); break;
	case 'commentalready':case 'comment':	$val=esc_html__('Comment', 'sao'); break;
	case 'commentsalready':case 'comments': $val=esc_html__('Comments', 'sao'); break;
	case 'commentsclosed':	$val=esc_html__('Comments are Closed.', 'sao'); break;
 	case 'nocommentsyet':	$val=esc_html__('No Comments Yet', 'beyshop'); break;

   	 default:$val='';

 	}

	return  $val;

 } 

require plugin_dir_path(__FILE__).'plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://raw.githubusercontent.com/saoshyant-theme/plugin/master/sao-page-builder.json',
	__FILE__, 
	'sao-page-builder'
);
?>