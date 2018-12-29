jQuery(function($) {
 	jQuery(document).ready(function($) {
		"use strict";
	/***********************************************
	Auto Width Builder Wrap
	************************************************/
	function auto_width_builder_warp(items){
  		$('.sao-auto-width'+ items).each(function() {
			var widths = $(this).width();
	 
			if (1400 < widths ){
				$(this).addClass('sao-1920'+ items);
			
			}else if (1200 < widths && widths <= 1400){
				$(this).addClass('sao-1400'+ items);
			
			}else if (1000 < widths && widths <= 1200){
				$(this).addClass('sao-1200'+ items);
			
			}else if (800 < widths && widths <= 1000){
				$(this).addClass('sao-1000'+ items);
			
			}else if (600 < widths && widths <= 800){
				$(this).addClass('sao-800'+ items);
				 
			}else if (500 < widths && widths <= 600){
				$(this).addClass('sao-600'+ items);
						
			}else if (400 < widths && widths <= 500){
				$(this).addClass('sao-500'+ items);
							
			}else if (300 < widths && widths <= 400){
				$(this).addClass('sao-400'+ items);
	 
			} else if (250 < widths && widths <= 300){
				$(this).addClass('sao-300'+ items);
				
			}else if (200 < widths && widths <= 250){
				$(this).addClass('sao-250'+ items);
				
			}else if ( 150 < widths && widths <= 200){
				$(this).addClass('sao-200'+ items);
				
			}else if ( 150 > widths ){
				$(this).addClass('sao-150'+ items);
				
			}		
 		});
	}
	/***********************************************
	Remove Auto Width Builder Warp
	************************************************/
 
 	function remove_add_error_loading(){
			var output ='';
 			output ='<div class="sao-errored">';
			output+= sao_text.error;
  			output+= '</div>';
		 $('.sao-mouse-wait').append(output);
		  setTimeout(function(){ $('.sao-mouse-wait').remove() }, 2500);
 	}
	
	$(document).ajaxError(function( event, jqxhr, settings, thrownError ) {
		remove_add_error_loading();
	  });
	   
	 
	/***********************************************
	Remove Auto Width Builder Warp
	************************************************/
 	function remove_auto_width_builder_warp(items ){
		$('.sao-auto-width'+ items).each(function() {
			var widths = $(this).width();
			$('.sao-auto-width'+ items).each(function(index, block) {
				$(this).removeClass('sao-1920'+ items).removeClass('sao-1400'+ items).removeClass('sao-1200'+ items).removeClass('sao-1000'+ items).removeClass('sao-800'+ items).removeClass('sao-600'+ items).removeClass('sao-500'+ items).removeClass('sao-400'+ items).removeClass('sao-300'+ items).removeClass('sao-250'+ items).removeClass('sao-200'+ items).removeClass('sao-150'+ items);
 			});
		
 		});
	}
	
	/***********************************************
	Switch Page Builder
	************************************************/
 	$('.add_sao_page_builder').on("click",'.switch_sao_page_builder',function(){
		$(this).parent().removeClass('sao_default_editor').addClass('sao_page_builder');
		$('body.wp-admin').addClass('sao-hide-wp-editor');
		$('#sao_builder_metabox').addClass('sao-show-page-builder');
		$('#sao_show_page_builder').attr('value',1);
	});
	
	$('.add_sao_page_builder').on("click",'.switch_sao_default_editor',function(){
		$(this).parent().removeClass('sao_page_builder').addClass('sao_default_editor');
		$('body.wp-admin').removeClass('sao-hide-wp-editor');
		$('#sao_builder_metabox').removeClass('sao-show-page-builder');
		$('#sao_show_page_builder').attr('value','');
 		
	});	
	
	if($('.add_sao_page_builder').hasClass('sao_page_builder')){
		$('body.wp-admin').addClass('sao-hide-wp-editor');
 		$('#sao_builder_metabox').addClass('sao-show-page-builder');
 	}else{
		$('body.wp-admin').removeClass('sao-hide-wp-editor');
		$('#sao_builder_metabox').removeClass('sao-show-page-builder');		
	}
	
	/***********************************************
	Full Screen Page Builder
	************************************************/
	$(document).on("click",'.sao_full_screen_page_builder ',function(){
		$(this).parent().addClass('sao_full_builder');
 		$('body').addClass('sao_overflow_hidden');
	});
		
	$(document).on("click",'.sao_full_screen_close',function(){
		$(this).parent().removeClass('sao_full_builder');
		$('body').removeClass('sao_overflow_hidden');
	});

	/***********************************************
	Radio Select Label
	************************************************/
 	$(document).on("click",'.sao_radio_selected label',function(){
		$(this).parent().parent().find('[checked]').each(function() {
			$(this).removeAttr("checked");
		});
		$(this).find('input').attr("checked","checked");
	});
	
	/***********************************************
	Slider Item	
	************************************************/
   	function sao_slider_item(){ 

		$('.sao-slider').each(function(index, block) {
			$(this).show();
			var data_slider =  $(this).find('.sao-slider-options').html();
			$(this).show().find('.sao-slider-options').prev('.sao-slider-list').sao_lightSlider(jQuery.parseJSON(data_slider));
		});
				
		$('.sao-image-item,.sao-image-item .sao-thumb,.sao-slider-thumb,.sao-post-module-1 .sao-thumb,.sao-post-module-2 .sao-thumb,.sao-post-module-3 .sao-thumb').each(function(index, block) {
 	  		var width_img = $(this).find('img').attr('width');
 	  		var height_img = $(this).find('img').attr('height');
 			var ratio_img = width_img/height_img;		    
 	  		var width = $(this).width();
 	  		var height = $(this).height();
 			var ratio = width/height;
 			if(ratio_img <= ratio ){
				$(this).find('img').css("width" ,"100.1%").css("min-width" ,"auto").css("height" ,"auto").css("min-height" ,"100.1%");		
 			}else{
				$(this).find('img').css("width" ,"auto").css("min-width" ,"100.1%").css("height" ,"100.1%").css("min-height" ,"auto");		
 			}
		}); 	

	}
		
	sao_slider_item();
	remove_auto_width_builder_warp();
	remove_auto_width_builder_warp('-item');
	auto_width_builder_warp('');   
	auto_width_builder_warp('-item');	
		
	/***********************************************
	Fold Hide
	************************************************/
 	function sao_fold_hide(items){ 

 		$('.sao_options').find('.sao_options_fold').each(function() {
			var show;
			$(this).find('.sao_options_fold_item').each(function() {
				var data_name = $(this).attr('data-name'); 			
				var data_value = $(this).attr('data-value');
				var type = $('[name="'+data_name+'"]').attr('type');
				if(type == 'radio'){
					var checked = $('[name="'+data_name+'"][value="'+data_value+'"]').attr('checked');
					if( checked == 'checked' ){
						show = 'checked';
					}
				}else{
					var val =$('[name="'+data_name+'"]').val();
						if(data_value == val){
						show = 'checked';
					}
				}
 
			});
			
			if( show == 'checked' ){
				$(this).parent().attr('data-active','show');
			}else{
				$(this).parent().attr('data-active','hide');
			}
 		});	
 
		$('.sao_options_fold_item').each(function() {
			var data_name = $(this).attr('data-name');
			var actives  = $('[name="'+data_name+'"]').parents(items).attr('data-active');
			if(	 actives == 'hide' ){
				$(this).parent().parent().attr('data-active','hide');
			}
 		});
		 
 		
		$(document).on("click",function() {
			$('.sao_options').find('.sao_options_fold').each(function() {
				var show;
				$(this).find('.sao_options_fold_item').each(function() {
				var data_name = $(this).attr('data-name'); 			
				var data_value = $(this).attr('data-value');
				var type = $('[name="'+data_name+'"]').attr('type');
					if(type == 'radio'){
					var checked = $('[name="'+data_name+'"][value="'+data_value+'"]').attr('checked');
						if( checked == 'checked' ){
								show = 'checked';
						}
					}else{
						var val =$('[name="'+data_name+'"]').val();
						if(data_value == val){
							show = 'checked';
						}
						
					}
										
				});
					if( show == 'checked' ){
						$(this).parent().attr('data-active','show');
					}else{
						$(this).parent().attr('data-active','hide');
					}
			 });	
	 
	 
			$('.sao_options_fold_item').each(function() {
				var data_name = $(this).attr('data-name');
				var actives  = $('[name="'+data_name+'"]').parents(items).attr('data-active');
				if(	 actives == 'hide' ){
					$(this).parent().parent().attr('data-active','hide');
				}
 			});
		});
		 
  	}
	
	/***********************************************
	Sortable Tabs
	************************************************/
  	function sao_sortable_tabs(){ 
		$('.sao_options_tabs .sao_options_setting ').sortable({
			opacity: 0.6,
			stop: function() {}
		}); 
	
		$('.sao_options_list .sao_options_setting ').sortable({
			opacity: 0.6,
			stop: function() {}
			}); 	
								
		$('.sao_gallery_list').sortable({
			opacity: 0.6,
			stop: function() {}
		}); 
		$(".sao_list_item").each(function() { 
			var val =$(this).find('.sao_list_options_item input,.sao_list_options_item textarea').val();               // When the email is changed
			$(this).find('.sao_title_list').html(val);                 // copy it over to the mail
		});		
								
	}
 
 
	/***********************************************
	Editor Hander
	************************************************/
 	function sao_add_hander(classs = false){ 
 
		$(classs).find('.sao-editor-hander').each(function() {
		var initID_editor  = 'initialize';
			var preInitSaved = null ;
 			var id_name = $(this).attr('data-id');
			  
 			/*
			Plugin Name: Ajax Editor
			Author: Harmeet Sembhi
			Author URI: http://www.themefossil.com
			Description: Load WP Using AJAX Request
			Version: 1.0
			Text Domain: ajax_editor
			*/
			
			if( !preInitSaved ) {
				preInitSaved = jQuery.extend(true, {}, tinyMCEPreInit);

				preInitSaved.mceInit[initID_editor].selector = '#placeholder';
				preInitSaved.mceInit['placeholder'] = preInitSaved.mceInit[initID_editor];
				delete preInitSaved.mceInit[initID_editor];

				preInitSaved.qtInit[initID_editor].id_name = 'placeholder';
				preInitSaved.qtInit['placeholder'] = preInitSaved.qtInit[initID_editor];
				delete preInitSaved.qtInit[initID_editor];
			}
 				 

					var rebuilder = jQuery.extend(true, {}, preInitSaved);

					rebuilder.mceInit['placeholder'].selector = '#' + id_name;
					rebuilder.mceInit[id_name] = rebuilder.mceInit['placeholder'];
					delete rebuilder.mceInit['placeholder'];

					rebuilder.qtInit['placeholder'].id_name = id_name;
					rebuilder.qtInit[id_name] = rebuilder.qtInit['placeholder'];
					delete rebuilder.qtInit['placeholder'];

					var init = rebuilder.mceInit[id_name];

					var $wrap = tinymce.$( '#wp-' + id_name + '-wrap' );

					if ( ( $wrap.hasClass( 'tmce-active' ) || ! rebuilder.qtInit.hasOwnProperty( id_name ) ) && ! init.wp_skip_init ) {

						tinymce.init( init );

						if ( ! window.wpActiveEditor ) {
							window.wpActiveEditor = id_name;
						}
					}

					if ( typeof quicktags !== 'undefined' ) {
				 
						quicktags( rebuilder.qtInit );

						if ( ! window.wpActiveEditor ) {
							window.wpActiveEditor = id_name;
						}

						QTags( {'id': id_name } );
                		QTags._buttonsInit();
					}
					 
 		});

 	};
	

	/***********************************************
	Remove Hander
	************************************************/
 	function sao_remove_hander(){ 
 		$('.sao-editor-hander').each(function() {
			var id_name = $(this).attr('data-id');
			tinymce.execCommand('mceRemoveEditor', false, id_name);
  		});
  	} 
	/***********************************************
	List Colllapse
	************************************************/
	function sao_list_collapse(){ 
		$(document).on("click",'.sao_list_item.sao_list_item_show .sao_list_options_item_title, .sao_list_item.sao_list_item_show  .sao_list_collapse',function(){
			$(this).parents('.sao_list_item').removeClass('sao_list_item_show').addClass('sao_list_item_hide');
 			 
		});
		
		$(document).on('click', '.sao_list_item.sao_list_item_hide .sao_list_options_item_title, .sao_list_item.sao_list_item_hide  .sao_list_collapse', function(e){
			$(this).parents('.sao_options_setting').find('.sao_list_item').each( function(index, element) {
					$(this).removeClass('sao_list_item_show').addClass('sao_list_item_hide');
			});
			$(this).parents('.sao_list_item').removeClass('sao_list_item_hide').addClass('sao_list_item_show');
 		});
		 	  
	}
	
	sao_list_collapse();
	
	/***********************************************
	Output Online
 	************************************************/
	function sao_output_online() {
		 var section =  [];
		 var column =  [];
		 var element =  [];
		$('.sao_builder_section_item').each(function() {
			var key = $(this).attr('data-key');
			var option = $(this).attr('data-option');
			var value = $(this).attr('data-value');
			var collapse = $(this).attr('data-collapse');
			 
			var section_key  = {};
			  section_key[key] = {'value' : value  , 'option':option,'collapse':collapse};
			 section.push(section_key); 
 		});
		
		$('.sao_builder_column_item').each(function() {
			var key = $(this).attr('data-key');
			var child = $(this).attr('data-child');
			var option = $(this).attr('data-option');
			var value = $(this).attr('data-value');
			var collapse = $(this).attr('data-collapse');
 			var column_key  = {};
			  column_key[key] = {'value' : value  ,'child' : child  , 'option':option,'collapse':collapse};
			 column.push(column_key); 
 		});
		
		$('.sao_builder_element_item').each(function() {
			var key = $(this).attr('data-key');
			var childern = $(this).attr('data-childern');
			var option = $(this).attr('data-option');
			var value = $(this).attr('data-value');
			var collapse = $(this).attr('data-collapse');
		 
 			var element_key  = {};
			  element_key[key] = {'value' : value  ,'childern' : childern  , 'option':option,'collapse':collapse,};
			 element.push(element_key); 
			 
 		});
		
				
 				
 		$('#sao_section').val( JSON.stringify(section));
 		$('#sao_column').val(  JSON.stringify(column));
 		$('#sao_element').val( JSON.stringify(element));
 	}
	sao_output_online();
	
  
 	 
	 
  	/***********************************************
	Sortable Child
 	************************************************/
	function sao_sortable() {
		
		$('.sao_section_list').sortable({
			opacity: 0.6,
			update: function() {
  				sao_output_online();
 			}			
		});
		
 		$('.sao_column_list').sortable({
			opacity: 0.6,
			connectWith: ".sao_column_list",
			update: function() {
 				var key = $(this).parents('.sao_section_item ').data('key');
				$(this).find('.sao_column_item').attr('data-child',key);
				sao_output_online();
			}
		}); 
				
		 
		$('.sao_element_list').sortable({
			opacity: 0.6,
			connectWith: ".sao_element_list",
			update: function() {
				var key = $(this).parents('.sao_column_item ').data('key');
				$(this).find('.sao_element_item').attr('data-childern',key);
				sao_output_online();
			}
		});
		
	};
	sao_sortable();
	/***************************************************
	Section
	***************************************************/
	/* Add Section*/
 	$('.sao_builder').on('click', '.sao_add_section', function(e) {
		
		$('body').append('<div class="sao-mouse-wait"></div>');
  		var data_key = Math.floor(Math.random() * 9999999999);
		
  		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_builder_section',
				key : data_key,
				value :  'section',
				default :  '1',
			},
			success:function(data) {
 				if(data.length){
					$('.sao_builder_list').append(data);
 					$('.sao_model').hide();
					$( ".sao_builder_list,.sao_element_list,.sao_column_list" ).sortable({ disabled: false }); 
					sao_sortable();
 					$('.sao-mouse-wait').remove();
  					sao_output_online();
   				} else{
					remove_add_error_loading();
  				}
   			} 
		});
  	});	
	
	/* Section Options*/
	$('.sao_builder').on('click', ".sao_section_options", function(e) {
		
 		$('body').append('<div class="sao-mouse-wait"></div>');
		
  		var data_key = $(this).parents('.sao_section_item').attr('data-key');
  		var data_option = $(this).parents('.sao_section_item').attr('data-option');
 		var data_this = $(this);
		
   		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_section_options',
 				option :  data_option,
 				key :  data_key,
			},
			success:function(data) {
 				if( data.length){
					$('body').append(data);
					$(".sao-color").cs_wpColorPicker();
					$('body').addClass('sao-body-panel');
 					$(".sao-mouse-wait").remove(); 
					sao_add_hander('#sao_options_' +data_key);
					sao_sortable_tabs();					
					sao_fold_hide(".sao_options_item");	
				}else{
					remove_add_error_loading(); 	
				}
   			} 
		});
  	});		
	
	/* Section Options Update*/
	$(document).on('click', '.sao_options_section .sao_options_update ', function(e) {

		$('.sao-editor-hander').each( function() {
			var data_attr =  $(this).attr('data-id');
			var tinymce = tinyMCE.get(data_attr).getContent();
			$(this).find('textarea.wp-editor-area').val(tinymce);
		});		

		$('body').append('<div class="sao-mouse-wait"></div>');
		
		var data_option = $(this).parents('.sao_options').serializeJSON();
  		var data_key = $(this).parents('.sao_options').attr('data-key');
  		var data_this = $(this);
  		
  		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_options_encode',
 				option :  data_option,
			},
			success:function(data) {
 					if( data.length){
						$('#sao_section_'+data_key).attr('data-option',data);
						$('.sao-mouse-wait').remove(); 
						sao_remove_hander();
						$('body').removeClass('sao-body-panel');
						$(data_this).parents('.sao_options').remove();
						sao_output_online();
					}else{
						remove_add_error_loading(); 	
					}
    			} 
		});  
	});  
	
	function sao_duplicate(row,key,adress) {	
		$(adress).attr('data-key',key).attr('id',"sao_"+row+"_"+ key);
 	}
		
	/* Section Duplicate*/
	jQuery(document).on("click",".sao_section_duplicate",function(){
		
 	    var duplicate = $(this).parents(".sao_section_item").addClass('sao_duplicate').clone();
		$(this).parents('.sao_duplicate').removeClass('sao_duplicate');
		$(this).parents(".sao_section_item").after(duplicate);
 		var section_key = Math.floor(Math.random() * 9999999999);
  		sao_duplicate('section',section_key,'.sao_duplicate');
		
 		$('.sao_duplicate').find('.sao_column_item').each(function(index, element) {
 			var column_key = Math.floor(Math.random() * 9999999999);
	  		 $(this).attr('data-child',section_key);
 	  		 sao_duplicate('column',column_key,this);
			 
			$(this).find('.sao_element_item').each(function(index, element) {
 				var element_key = Math.floor(Math.random() * 9999999999);
	  		 $(this).attr('data-childern',column_key);
 	  		 	sao_duplicate('element',element_key,this);
 			});			 
 		});
		$('.sao_duplicate').removeClass('sao_duplicate');
		sao_sortable();
		sao_output_online();
		
		sao_slider_item();
	
     });	 
 
	/***************************************************
	Column
	***************************************************/
	// Column Select
	$('.sao_builder').on('click', '.sao_add_column', function(e) {
		$('.sao_model_column').attr('data-child', $(this).parents('.sao_section_item').data('key')).css("display","table");
		$( ".sao_section_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: true });
		$('body').addClass('sao-body-panel');
	});	
	
	// Add Column 
	$('.sao_model_column').on('click', '.sao_model_add', function(e) {

 		$('body').append('<div class="sao-mouse-wait"></div>');
		var data_key = Math.floor(Math.random() * 9999999999);
		var data_child = $(this).parents('.sao_model_column').data('child');
		var data_value = $('.sao_model_column').find('.selected').data('column');
 
   		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_builder_column',
				key : data_key,
				child :  data_child,
				value :  data_value,
				default :  '1',
 			},
			success:function(data) {
 				if( data.length){
 					$('#sao_section_'+data_child+' .sao_column_list').append(data);
					$('.sao-mouse-wait').remove(); 
					$('.sao_model').hide();
					 $('body').removeClass('sao-body-panel');
 					$( ".sao_builder_list,.sao_element_list,.sao_column_list" ).sortable({ disabled: false });  					
					sao_sortable();
					sao_output_online();
				}else{
					remove_add_error_loading();
				}
				
	

   			}  
		});  
	});  
		
	//Column Options		
	$('.sao_builder').on('click', '.sao_column_options', function(e) {
 	 
		$('body').append('<div class="sao-mouse-wait"></div>');
  		var column_item = $(this).parents('.sao_column_item');
  		var data_key = $(this).parents('.sao_column_item').attr('data-key');
  		var data_option = $(this).parents('.sao_column_item').attr('data-option');
 		var data_this = $(this);
 	 
		
   		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_column_options',
 				option :  data_option,
 				key :  data_key,
			},
			success:function(data) {
 				if( data.length){
					$('body').append(data);
					$(".sao-color").cs_wpColorPicker();
					$(".sao-mouse-wait").remove(); 
					sao_add_hander('#sao_options_' + data_key);
					sao_sortable_tabs();
					$('body').addClass('sao-body-panel');		
 					sao_fold_hide(".sao_options_item");
				}else{
					remove_add_error_loading();
				}
				 
   			} 
		});
  	});				
		
	// Column Update	
	$(document).on('click', '.sao_options_column .sao_options_update', function(e) {
		
		$('.sao-editor-hander').each( function() {
			var data_attr =  $(this).attr('data-id');
			var tinymce = tinyMCE.get(data_attr).getContent();
			$(this).find('textarea.wp-editor-area').val(tinymce);
		});
		
		
		$('body').append('<div class="sao-mouse-wait"></div>');
  		var column_item = $(this).parents('.sao_column_item');		
  		var data_key = $(this).parents('.sao_options').attr('data-key');		
		

		var data_option = $(this).parents('.sao_options').serializeJSON();
		var data_this = $(this);
   		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_options_encode',
 				option :  data_option,
 			},
			success:function(data) {
 				if( data.length){
					$('#sao_column_'+data_key).attr('data-option',data);
					$('.sao-mouse-wait').remove(); 
					sao_remove_hander();
					$('body').removeClass('sao-body-panel');			
 					$(data_this).parents('.sao_options').remove();
					sao_output_online();
					sao_slider_item();
				}else{
				remove_add_error_loading();
				}

   			} 
		}); 
  	});  
		
	// Column Duplicate	
	jQuery(document).on("click",".sao_column_duplicate",function(){
  
	   var duplicate = $(this).parents(".sao_column_item").addClass('sao_duplicate').clone();
		$(this).parents('.sao_duplicate').removeClass('sao_duplicate');
		$(this).parents(".sao_column_item").after(duplicate);
 		var column_key = Math.floor(Math.random() * 9999999999);
  		sao_duplicate('column',column_key,'.sao_duplicate');
		
 		$('.sao_duplicate').find('.sao_element_item').each(function(index, element) {
			var element_key = Math.floor(Math.random() * 9999999999);
			$(this).attr('data-childern',column_key);
			sao_duplicate('element',element_key,this);
		});	 
 		 
		$('.sao_duplicate').removeClass('sao_duplicate');
		sao_sortable();
		sao_output_online();
		sao_slider_item();
     });	 
	 
	
	/***************************************************
	Element
	***************************************************/	 
	// Element Select
	$('.sao_builder').on('click', '.sao_add_element', function(e) {
		$('.sao_model_element').attr('data-childern', $(this).parents('.sao_column_item').data('key')).css("display","table");
		 $('body').addClass('sao-body-panel');
		$( ".sao_section_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: true });
	}); 
		
	// Add Elements	
	$('.sao_builder_main .sao_model_element').on('click', '.sao_model_add', function(e) {
		$('body').append('<div class="sao-mouse-wait"></div>');
 	 
			var data_action	= 'sao_builder_element';
 
 

		var data_key = Math.floor(Math.random() * 9999999999);
		var data_childern = $(this).parents('.sao_model_element').attr('data-childern');
		var data_value = $('.sao_model_element').find('.selected').attr('data-element');
 		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : data_action,
				key : data_key,
				childern :  data_childern,
				value :  data_value,
				default :  '1',
 			},
			success:function(data) {
 				if( data.length){
					$('#sao_column_'+data_childern+' .sao_element_list').append(data);
 					$('.sao_model').hide();
					$('.sao-mouse-wait').remove(); 
					$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: false }); 
					sao_sortable();
					$('body').removeClass('sao-body-panel'); 

					sao_output_online();
					remove_auto_width_builder_warp();
					remove_auto_width_builder_warp('-item');
    				auto_width_builder_warp('');   
    				auto_width_builder_warp('-item');	
					sao_slider_item();
 				}else{
				remove_add_error_loading();
				}  
   			} 
		});  
	}); 		
  	 
	//Elements Options
 	$('.sao_builder_main').on('click','.sao_element_options', function() {
		
  		$('body').append('<div class="sao-mouse-wait"></div>');
 		var data_key = $(this).parents('.sao_element_item').attr('data-key');
		var data_value = $(this).parents('.sao_element_item').attr('data-value');
		var data_element = $(this).parents('.sao_element_item');
		var data_option = $(this).parents('.sao_element_item').attr('data-option');
		var data_this = $(this);
  
  		 
		var data_action	= 'sao_element_options';

		// Ajax Call
		$.ajax({
			url: builder_js.ajaxurl,
			data: {
				action: data_action,
				value :  data_value, 
				key :  data_key,  
				option :  data_option 
			},
			success: function(data) {
 					if( data.length){
						$('body').append(data);
						$(".sao-color").cs_wpColorPicker();
						$('.sao-mouse-wait').remove(); 
 						sao_add_hander('#sao_options_' +data_key);
						sao_sortable_tabs();		
  						$('body').addClass('sao-body-panel');
						sao_fold_hide( '.sao_options_item');
 
					}else{
						remove_add_error_loading();
					}
			} 
		});
	});	
 
	//Elements Update
	$(document).on('click', '.sao_builder_options_element .sao_options_update', function(e) {
		$('.sao-editor-hander').each( function() {
			var data_attr =  $(this).attr('data-id');
			var tinymce = tinyMCE.get(data_attr).getContent();
			$(this).find('textarea.wp-editor-area').val(tinymce);
		});
 		
		$('body').append('<div class="sao-mouse-wait"></div>');
 		var data_option= $(this).parents('.sao_options').serializeJSON();
		var data_key = $(this).parents('.sao_options').attr('data-key');
		var data_this = $(this);
		var data_value = $(this).parents('.sao_options').attr('data-value');
		 
		$.ajax({
 			url: builder_js.ajaxurl,
 			data : {
				action : 'sao_options_encode',
 				 option:  data_option,
			},
			success:function(data) {
 				if( data.length){
 					$('#sao_element_'+data_key).attr('data-option',data);
					sao_remove_hander();
					$(data_this).parents('.sao_options').remove();
					$('.sao-mouse-wait').remove(); 		
					sao_output_online();	
					$('body').removeClass('sao-body-panel'); 

				}else{
					remove_add_error_loading();
				}
					
					
			} 
		});  
   		$.ajax({
 			url: builder_js.ajaxurl,
 			data : {
				action : 'sao_element_perview',
 				 option:  data_option,
 				 value:  data_value,
 			},
			success:function(data) {
				if(data.length){
					$('#sao_element_'+data_key+' .sao_element_perview').html('').append(data);
					remove_auto_width_builder_warp();
					remove_auto_width_builder_warp('-item');
					auto_width_builder_warp('');   
					auto_width_builder_warp('-item');	
					sao_slider_item();
				}else{
					remove_add_error_loading();
				}
			} 
		});  
 	}); 
 
	//Elements duplicate
	jQuery(document).on("click",".sao_element_duplicate",function(){
   
   		var duplicate = $(this).parents(".sao_element_item").addClass('sao_duplicate').clone();
		$(this).parents('.sao_duplicate').removeClass('sao_duplicate');
		$(this).parents(".sao_element_item").after(duplicate);
 		var element_key = Math.floor(Math.random() * 9999999999);
  		sao_duplicate('element',element_key,'.sao_duplicate');
 		$('.sao_duplicate').removeClass('sao_duplicate');
		sao_sortable();
		sao_output_online();

	}); 		 
	
	$(".sao_model_element").each( function() {
		$(this).find("li:first").addClass('selected');
		$(this).find("li:first input").attr('checked','checked');
	});
		  
	$('.sao_model').on("click",".sao_model_item", function() {
		$(this).parents('.sao_model_content').find('.selected').removeClass('selected');
		$(this).addClass('selected');
	}); 
		
	/***************************************************
	Template
	***************************************************/
	//Template Save
	function sao_find_template_save(row,id) {
		var section =  [];
		var column =  [];
		var element =  [];
		if(row == 'section'){
			$(id + '.sao_section_item').each(function() {
				var key = $(this).attr('data-key');
				var option = $(this).attr('data-option');
				var value = $(this).attr('data-value');
				var collapse = $(this).attr('data-collapse');
				var section_key  = {}
				section_key[key] = {'value' : value  , 'option':option,'collapse':collapse}
				 section.push(section_key); 
			});
   			return encodeURIComponent(JSON.stringify(section));
		};
		
		if(row == 'column'){
			$(id +'.sao_column_item').each(function() {
				var key = $(this).attr('data-key');
				var child = $(this).attr('data-child');
				var option = $(this).attr('data-option');
				var value = $(this).attr('data-value');
				var collapse = $(this).attr('data-collapse');
				var column_key  = {}
				  column_key[key] = {'value' : value  ,'child' : child  , 'option':option,'collapse':collapse}
				 column.push(column_key); 
			});
   			return encodeURIComponent(JSON.stringify(column));
		};
		if(row == 'element'){
			$(id +'.sao_element_item').each(function() {
				var key = $(this).attr('data-key');
				var childern = $(this).attr('data-childern');
				var option = $(this).attr('data-option');
				var value = $(this).attr('data-value');
				var collapse = $(this).attr('data-collapse');
	
				var element_key  = {}
				  element_key[key] = {'value' : value  ,'childern' : childern  , 'option':option,'collapse':collapse}
				 element.push(element_key); 
			});
   			return encodeURIComponent(JSON.stringify(element));
		};
 	};
	
	
	//Click Template Save
	$('.sao_builder').on('click', '.sao_template_save', function(e) {
		
 		$('body').append('<div class="sao-mouse-wait"></div>');
		$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: true });
		var data_row = $(this).attr('data-row');
		var data_name = $(this).attr('data-name');
		
		var data_this = $(this);
 		
   		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_template_option_save',
 				row :  data_row,
 				name :  data_name,
			},
			success:function(data) {
				$(data_this).parent().append(data);
				$('.sao-mouse-wait').remove(); 	
				$('body').addClass('sao-body-panel'); 
			} 
		});
  	});			 
	
	
	//Option Full Save
	$('.sao_builder').on('click', '.sao_options_full_save', function(e) {
		var data_key = Math.floor(Math.random() * 9999999999);
 		var data_id = 'full';
		var data_this = $(this).parents('.sao_options');
		var data_rowname = $(this).attr('data-rowname');
 		var data_name = data_this.find('[name="save_template_name"]').val();
		var data_section = sao_find_template_save('section','');
		var data_column = sao_find_template_save('column','');
 		var data_element = sao_find_template_save('element','');
		if(data_name){
			$('body').append('<div class="sao-mouse-wait"></div>');
  			$.ajax({
				url: builder_js.ajaxurl,
				type: 'POST',
				data : {
					action : 'sao_template_save',
					section : data_section,
					column : data_column,
					element : data_element,
					name : data_name, 
					rowname : data_rowname, 
					key : data_key,
					id : data_id,
					
				},
				success:function(data) {
 						$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: false });
						$('.sao_options').remove();
						$('.sao-mouse-wait').remove(); 
						sao_output_online();
						$('body').removeClass('sao-body-panel'); 
				 
				} 

			});	
			}else{
			$('.sao_options_massage').text('').append(sao_text.empty);
		}
   	 });	
	
	//Section Save
	$('.sao_builder').on('click', '.sao_options_section_save', function(e) {
		var data_key = Math.floor(Math.random() * 9999999999);
 		var data_id = 'section';
		var data_this = $(this).parents('.sao_options');
 
		var data_this_section = $(this).parents('.sao_section_item').attr("id");
  		var data_name = data_this.find('[name="save_template_name"]').val();
		var data_section = sao_find_template_save('section','#'+data_this_section);
		var data_column = sao_find_template_save('column','#'+data_this_section+' ');
 		var data_element = sao_find_template_save('element','#'+data_this_section+' ');
		console.log(data_section);
		if(data_name){
			$('body').append('<div class="sao-mouse-wait"></div>');
 			$.ajax({
				url: builder_js.ajaxurl,
				type: 'POST',
				data : {
					action : 'sao_template_save',
					section : data_section,
					column : data_column,
					element : data_element,
					name : data_name, 
					key : data_key,
					id : data_id,
  				},
				success:function(data) {
 						$('body').addClass('sao-body-panel');
						$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: false });
						$('.sao_options').remove();
						$('.sao-mouse-wait').remove(); 
						sao_output_online();
						$('body').removeClass('sao-body-panel'); 

 					 	
				} 
			 });	
			
		}else{
			$('.sao_options_massage').text('').append(sao_text.empty);
		}
   	 });	
	 
	 // Columns Save 
	$('.sao_builder').on('click', '.sao_options_column_save', function(e) {
		var data_key = Math.floor(Math.random() * 9999999999);
 		var data_id = 'column';
 
		var data_this = $(this).parents('.sao_options');
		var data_this_column = $(this).parents('.sao_column_item').attr("id");
  		var data_name = data_this.find('[name="save_template_name"]').val();
 		var data_column = sao_find_template_save('column','#'+data_this_column);
 		var data_element = sao_find_template_save('element','#'+data_this_column+' ');
 		if(data_name){
			$('body').append('<div class="sao-mouse-wait"></div>');
  			$.ajax({
				url: builder_js.ajaxurl,
				type: 'POST',
				data : {
					action : 'sao_template_save',
					  column : data_column,
					  element : data_element,
					  name : data_name, 
					 key : data_key,
					 id : data_id,
 					// option :  data_option,
				},
				success:function(data) {
  						$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: false });
						$('.sao_options').remove();
						$('.sao-mouse-wait').remove(); 
						sao_output_online(); 
						$('body').removeClass('sao-body-panel'); 

 						 
							
				} 
			 });	
		
		}else{
			$('.sao_options_massage').text('').append(sao_text.empty);
		}
   	 });	 
	 
	 //Elements Save
	$('.sao_builder').on('click', '.sao_options_element_save', function(e) {
		var data_key = Math.floor(Math.random() * 9999999999);
 
 		var data_id = 'element';
		var data_this = $(this).parents('.sao_options');
 		
		var data_this_element = $(this).parents('.sao_element_item').attr("id");
  		var data_name = data_this.find('[name="save_template_name"]').val();
  		var data_element = sao_find_template_save('element','#'+data_this_element);
 		if(data_name){
		$('body').append('<div class="sao-mouse-wait"></div>');
 		
		 
  		$.ajax({
 			url: builder_js.ajaxurl,
 			type: 'POST',
 			data : {
				action : 'sao_template_save',
				element : data_element,
				name : data_name, 
				 key : data_key,
				id : data_id,
 
 			},
			success:function(data) {
  					$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: false });
					$('.sao_options').remove();
					$('.sao-mouse-wait').remove(); 
					sao_output_online();
					$('body').removeClass('sao-body-panel'); 

				 
     			} 
    	 });	
		
		}else{
			$('.sao_options_massage').text('').append(sao_text.empty);
		}
   	 });		 	 
	 
	 
	 //Template ADD
	$('.sao_builder_main').on('click', '.sao_template_add', function(e) {
		var data_row = $(this).attr('data-row');
		var data_this = $(this);
		var data_name = $(this).attr('data-name');
 		$('body').append('<div class="sao-mouse-wait"></div>');
		
		$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: true });
 		
   		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_template_options',
				id : data_row,
				name : data_name,
			},
			success:function(data) {
 				if( data.length){
					$(data_this).parent().append(data);
					$('.sao-mouse-wait').remove(); 
					remove_auto_width_builder_warp();
					remove_auto_width_builder_warp('-item');
					auto_width_builder_warp('');   
					auto_width_builder_warp('-item');	
					sao_slider_item();
					$('body').addClass('sao-body-panel');
					
				}else{
					remove_add_error_loading();
				}
  			} 
		});
  	});				 
	
	// Full Template ADD Select
	$(document).on('click', '.sao_template_item', function(e) {
		$(this).parent().find('.selected').removeClass('selected');
		$(this).addClass("selected");
  	});
	 
	$('.sao_builder_main').on('click', '.sao_full_template_add_options,.sao_section_template_add_options', function(e) {
		var data_id = $('.sao_template_item.selected').attr('data-id');
		var data_row = $(this).parents('.sao_model_template').attr('data-row');
		
		 
  		$('body').append('<div class="sao-mouse-wait"></div>');
  		
   		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_builder_section_list',
				template_id : data_id,
				row_id : data_row,
 			},
			success:function(data) {

 				if( data.length){
					
					$('.sao_section_list').append( data);
						
					jQuery(".sao_new_section").each(function(index, element) {
						var section_key = Math.floor(Math.random() * 9999999999);
						sao_duplicate('section',section_key,this);
						
						$(this).find('.sao_builder_column_item').each(function(index, element) {
							
							var column_key = Math.floor(Math.random() * 9999999999);
							 $(this).attr('data-child',section_key);
							 sao_duplicate('column',column_key,this);
				 
							$(this).find('.sao_builder_element_item').each(function(index, element) {
								var element_key = Math.floor(Math.random() * 9999999999);
							 $(this).attr('data-childern',column_key);
								sao_duplicate('element',element_key,this);
							});			 
						});
						
						
						$(this).removeClass('sao_new_section');
				 
					  });	 
						 
					$('.sao-mouse-wait').remove(); 
					$('.sao_model_template').remove();
					$(".sao-color").wpColorPicker();					
					$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: false });
					sao_sortable();
					$('body').removeClass('sao-body-panel');
					sao_output_online();
					remove_auto_width_builder_warp();
					remove_auto_width_builder_warp('-item');
					auto_width_builder_warp('');   
					auto_width_builder_warp('-item');	
					sao_slider_item();		
				}else{
					remove_add_error_loading();
				}	
			 	 
			} 
		});
		
		
	});		
	
	
	
	$('.sao_slider_meta').on('click', '.sao_full_template_add_options,.sao_section_template_add_options', function(e) {
		var data_id = $('.sao_template_item.selected').attr('data-id');
		var data_row = $(this).parents('.sao_model_template').attr('data-row');
		
		 
  		$('body').append('<div class="sao-mouse-wait"></div>');
  		
   		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_builder_column_list',
				template_id : data_id,
				row_id : data_row,
 			},
			success:function(data) {

 				if( data.length){
					$('.sao_column_list').append( data);
						
						jQuery(".sao_new_column").each(function(index, element) {
					 
							var column_key = Math.floor(Math.random() * 9999999999);
							 sao_duplicate('column',column_key,this);
				 
							$(this).find('.sao_element_item').each(function(index, element) {
								var element_key = Math.floor(Math.random() * 9999999999);
							 $(this).attr('data-childern',column_key);
								sao_duplicate('element',element_key,this);
							});			 
						
						
						$(this).removeClass('sao_new_column');
				 
				 
					  });	 
						 
					$('.sao-mouse-wait').remove(); 
					$('.sao_model_template').remove();
					$(".sao-color").wpColorPicker();	
					$('body').removeClass('sao-body-panel');
				
					$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: false });
					sao_sortable();
					sao_output_online();
					remove_auto_width_builder_warp();
					remove_auto_width_builder_warp('-item');
					auto_width_builder_warp('');   
					auto_width_builder_warp('-item');	
					sao_slider_item();	
				
				}else{
					remove_add_error_loading();
				}					
			 	 
			} 
		});
		
		
	});		
	
	// Columns Template ADD Select
	$('.sao_builder').on('click', '.sao_column_template_add_options', function(e) {
		var data_key= $('.sao_section_item').attr('data-key');
		var data_id = $('.sao_template_item.selected').attr('data-id');
		var data_row = $(this).parents('.sao_model_template').attr('data-row');
		var  section_item = $(this).parents('.sao_section_item');
		
  		$('body').append('<div class="sao-mouse-wait"></div>');
  		
   		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_builder_column_list',
				template_id : data_id,
				row_id : data_row,
 			},
			success:function(data) {
 				if( data.length){
				
				$(section_item).find('.sao_column_list').append( data);
						
						jQuery(".sao_new_column").each(function(index, element) {
					 
							var column_key = Math.floor(Math.random() * 9999999999);
							 $(this).attr('data-child',data_key);
							 sao_duplicate('column',column_key,this);
				 
							$(this).find('.sao_element_item').each(function(index, element) {
								var element_key = Math.floor(Math.random() * 9999999999);
							 $(this).attr('data-childern',column_key);
								sao_duplicate('element',element_key,this);
							});			 
						
						
						$(this).removeClass('sao_new_column');
				 
					 });	 
					$('body').removeClass('sao-body-panel');

					$('.sao-mouse-wait').remove(); 
					$('.sao_model_template').remove();
					$(".sao-color").wpColorPicker();					
					$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: false });
					sao_sortable();
					sao_output_online();
					remove_auto_width_builder_warp();
					remove_auto_width_builder_warp('-item');
					auto_width_builder_warp('');   
					auto_width_builder_warp('-item');	
					sao_slider_item();	
				}else{
					remove_add_error_loading();
				}			
			} 
		});
		
		
	});		
	
	
	// Element Template ADD Select
	$('.sao_builder').on('click', '.sao_element_template_add_options', function(e) {
		var data_key= $('.sao_column_item').attr('data-key');
		var data_id = $('.sao_template_item.selected').attr('data-id');
		var data_row = $(this).parents('.sao_model_template').attr('data-row');
		var  column_item = $(this).parents('.sao_column_item');
		
		 
  		$('body').append('<div class="sao-mouse-wait"></div>');
  		
   		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_builder_element_list',
				template_id : data_id,
				row_id : data_row,
 			},
			success:function(data) {
 				if( data.length){
					
					$(column_item).find('.sao_element_list').append( data);
					jQuery(".sao_new_element").each(function(index, element) {
						var element_key = Math.floor(Math.random() * 9999999999);
						$(this).attr('data-childern',data_key);
						sao_duplicate('element',element_key,this);
						$(this).removeClass('sao_new_element');
				 
					 });	 
						 
					$('.sao-mouse-wait').remove(); 
					$('.sao_model_template').remove();
					$( ".sao_builder_list,.sao_column_list,.sao_element_list" ).sortable({ disabled: false });
					sao_sortable();
					sao_output_online();
					remove_auto_width_builder_warp();
					 remove_auto_width_builder_warp('-item');
					auto_width_builder_warp('');   
					auto_width_builder_warp('-item');	
					sao_slider_item();	
					$('body').removeClass('sao-body-panel');
				}else{
				remove_add_error_loading();
				}					 	 
			} 
		});
		
	});		
	
	//Template Remove	
	$(document).on('click', '.sao_template_remove', function(e) {
 		var data_template = $(this).parent();
		var data_key = data_template.attr('data-id');
		var data_row = $(this).parents('.sao_model_template').attr('data-row');

		$('body').append('<div class="sao-mouse-wait"></div>');
 		var txt;
		var r = confirm(sao_text.agree);

 	  	if (r == true) {
	
			$.ajax({
				url: builder_js.ajaxurl,
				type: 'POST',
				data : {
					action : 'sao_template_remove',
					 key : data_key,
					 id : data_row,
					  
				},
				success:function(data) { 
 					if( data.length){
						$(data_template).remove();
						$('.sao-mouse-wait').remove(); 
					}else{
					remove_add_error_loading();
					}
						
				} 
			 });	
			
		}
   	 });	 
 
		
	/*
		Dropdown with Multiple checkbox select with jQuery - May 27, 2013
		(c) 2013 @ElmahdiMahmoud
		license: http://www.opensource.org/licenses/mit-license.php
	*/
	/****************************************************
	Multi Select
	*****************************************************/
		
	$(document).on('click','.sao_dropdown dt a', function() {
		$(this).parents('.sao_dropdown').find("ul").slideToggle('fast');
	});
		
	$(document).on('click','.dropdown dd ul li a', function() {
		$(".sao_dropdown dd ul").hide();
	});
		
	function getSelectedValue(id) {
	  return $("#" + id).find("dt a span.value").html();
	}
		
	$(document).bind('click', function(e) {
		var $clicked = $(e.target);
		if (!$clicked.parents().hasClass("sao_dropdown")) $(".sao_dropdown dd ul").hide();
	});
		
	$(document).on('click','.sao_mutliSelect input[type="checkbox"]', function() {
 		var title = $(this).next().text(),title = $(this).next().text() + ",";
		var id = $(this).next().attr('sao-id');
		if ($(this).is(':checked')) {
			var html = '<span sao-id="' + id + '">' + title + '</span>';
			$(this).parents('.sao_dropdown').find('.sao_multiSel').append(html);
			$(this).parents('.sao_dropdown').find(".sao_hida").hide();
		} else {
			$(this).parents('.sao_dropdown').find('span[sao-id="' + id + '"]').remove();
			var ret =  $(this).parents('.sao_dropdown').find(".sao_hida");
			$(this).parents('.sao_dropdown').find('.sao_dropdown dt a').append(ret);
		
		}
	}); 
		
	/****************************************************
	Gallery Item
	*****************************************************/
	function sao_gallery_item(name,img_value,value) {
		return '<input  type="hidden" class="sao_attachment_'+img_value+'" name="'+ name+'['+img_value+']" 	value="'+value+'">';		 
 	}
	
	$(document).on( 'click', '.sao_image_remove',function(event) {
		$(this).parent().remove();
	});
		
			
	/****************************************************
	Image Upload
	*****************************************************/	 
	$(document).on( 'click', '.sao_image_upload',function(event) {
		var data_this= $(this);
		var name= $(this).attr('data-name');
		var imageFrame;
		event.preventDefault();
  		var options, attachment;
		var sao_options_upload = data_this.parents('.sao_options_image');
		var $self = $(event.target);
		var $div = $self.closest(sao_options_upload);
			
 		if ( imageFrame ) {
			imageFrame.open();
			return;
		}
		$('body').addClass('sao-body-panel');	
 		imageFrame = wp.media({
			title: sao_text.choose,
			multiple: false,
			library: {
				type: 'image'
			},
			button: {
				text:sao_text.uploader_button
			}
		});
			
 		imageFrame.on( 'select', function() {
			var	selection = imageFrame.state().get('selection');
			if ( ! selection )
				return;
 				selection.each( function( attachment ) {
				console.log(attachment);
				var url = attachment.attributes.sizes.medium.url;
				
 				var data = '<div class="sao_image_item"  >';
				data_this.parent().find('.sao_image_item').remove();
				data+=sao_gallery_item(name,'medium',attachment.attributes.sizes.medium.url);
				data+=sao_gallery_item(name,'url',attachment.attributes.sizes.full.url);
				data+=sao_gallery_item(name,'title',attachment.attributes.title);
				data+=sao_gallery_item(name,'caption',attachment.attributes.caption);
				data+=sao_gallery_item(name,'alt',attachment.attributes.alt);
				data+=sao_gallery_item(name,'description',attachment.attributes.description);
				data+=sao_gallery_item(name,'width',attachment.attributes.sizes.full.width);
				data+=sao_gallery_item(name,'height',attachment.attributes.sizes.full.height);
				data+='<span class="sao_image_remove"></span><img  src="'+url+'"/>';
				data+='</div>';
			$('body').removeClass('sao-body-panel');

 				$(data_this).parent().append(data);
			});
		});
			
 		imageFrame.open();
	});
 		 
	/****************************************************
	Gallaery Image Upload
	*****************************************************/	 
	$(document).on( 'click', '.sao_add_image',function(event) {
		var that= $(this);
		var data_name= $(this).attr('data-name');
		var imageFrame;
		event.preventDefault();
		var options, attachment;
		var sao_options_upload = that.parents('.sao_options_gallery');
		var $self = $(event.target);
		var $div = $self.closest(sao_options_upload);
		$('body').addClass('sao-body-panel');	
		if ( imageFrame ) {
			imageFrame.open();
			return;
		}
		
		imageFrame = wp.media({
			title: sao_text.choose,
			multiple: true,
			library: {
				type: 'image'
			},
			button: {
					text:sao_text.uploader_button
			}
		});
			
		imageFrame.on( 'select', function() {
			var	selection = imageFrame.state().get('selection');
				
				if ( ! selection )
				return;
				
 				selection.each( function( attachment ) {
					console.log(attachment);
 					sao_gallery_item
					var url = attachment.attributes.sizes.thumbnail.url;
  					var key = 'a'+Math.floor(Math.random() * 9999999999);
 					var id = attachment.attributes.id;
 					var name = data_name+'['+key+']';
 					var data = '<div class="sao_gallery_item" id-key="sao_gallery_' + key +'" >';
  					data+='<input  type="hidden" class="sao_attachment_'+key+'" name="'+ name+'" 	value="'+id+'">'; 
 					data+='<span class="sao_image_remove"></span><img  src="'+url+'"/>';
 					data+='</div>';
					$('body').removeClass('sao-body-panel');
    					that.next().append(data);
				} );
			});
			
 			imageFrame.open();
		});
 		 		 
		 
		 
 		 
	/****************************************************
	Checkbox  
	*****************************************************/		 
	jQuery(document).on("click",'.sao_options [type="checkbox"]',function(){
		if($(this).is(':checked')) {
			$(this).val(1);
		}else{
			$(this).val('');
		}
	});
	/****************************************************
	Options Close  
	*****************************************************/	  
	$(document).on('click', '.sao_options_cancel,.sao_options_close', function(e) {
		sao_remove_hander();
 		$(this).parents('.sao_options').remove();
		$('body').removeClass('sao-body-panel');
  	});
		 
	/****************************************************
	Collapse  
	*****************************************************/		 
	jQuery(document).on("click",'.sao_section_item[data-collapse="show"] .sao_section_collapse',function(){
  		$(this).parents('.sao_section_item').attr('data-collapse','hide');
		sao_output_online();
     });
	 
	jQuery(document).on("click",'.sao_section_item[data-collapse="hide"] .sao_section_collapse',function(){
  		$(this).parents('.sao_section_item').attr('data-collapse','show');
		sao_output_online();
     });
	 
	jQuery(document).on("click",'.sao_column_item[data-collapse="show"] .sao_column_collapse',function(){
  		$(this).parents('.sao_column_item').attr('data-collapse','hide');
		sao_output_online();
     });
	 
	jQuery(document).on("click",'.sao_column_item[data-collapse="hide"] .sao_column_collapse',function(){
  		$(this).parents('.sao_column_item').attr('data-collapse','show');
		sao_output_online();
     });
	 	jQuery(document).on("click",'.sao_element_item[data-collapse="show"] .sao_element_collapse',function(){
  		$(this).parents('.sao_element_item').attr('data-collapse','hide');
		sao_output_online();
     });
	 
	jQuery(document).on("click",'.sao_element_item[data-collapse="hide"] .sao_element_collapse',function(){
  		$(this).parents('.sao_element_item').attr('data-collapse','show');
		sao_output_online();
     });
	 
	/****************************************************
	Change Columns
	*****************************************************/	
 	$(document).on("click",".sao_change_column .sao_model_item", function() {
		$(this).parent().find('.selected').removeClass('selected');
		$(this).addClass('selected');
		var data_column = $(this).attr('data-column');
		var data_text = $(this).find('span').html();
		$(this).parents('.sao_column_item').removeClass('sao_column_1_1').removeClass('sao_column_1_2').removeClass('sao_column_1_3').removeClass('sao_column_2_3').removeClass('sao_column_3_4').removeClass('sao_column_1_4').removeClass('sao_column_1_5').removeClass('sao_column_2_5').removeClass('sao_column_3_5').removeClass('sao_column_4_5').removeClass('sao_column_1_6');
		$(this).parents('.sao_column_item').attr('data-value',data_column).addClass('sao_column_'+data_column);
		$(this).parents('.sao_column_item').find('.sao_column_name').html('').html(data_text);
		sao_output_online();
		sao_slider_item();
		remove_auto_width_builder_warp();
		remove_auto_width_builder_warp('-item');
		auto_width_builder_warp('');   
		auto_width_builder_warp('-item');	
	}); 
	
	jQuery(document).on("click",".sao_column_change",function(){
	var column_item =	$(this).parents('.sao_column_item').find('.sao_change_column_warp');
		if( column_item.hasClass('sao_change_column_warp')){
			column_item.remove();
		}else{
			var output ='';
			output ='<div class="sao_change_column_warp" ><div class="sao_change_column"   >';
			output+= '<div class="sao_model_title">'+sao_text.change_column+'<i class="sao_change_column_close"></i></div>';
			output+= '<div class="sao_model_content" >';
 			output+= $('.sao_model_column .sao_model_content').html();
			output+= '</div></div></div>';
 			$(this).parent().parent().append(output);
 		} 
		sao_slider_item();	
   });
   
	jQuery(document).on("click",".sao_change_column_close",function(){
		$(this).parent().parent().remove();
		
	});
   
   
	/****************************************************
	Icons
	*****************************************************/	
	jQuery(document).on("click",".sao_icon_close",function(){
 		jQuery('body').removeClass('sao-active-icon');
		$(this).parents('.sao_icon').remove();
	
	}); 		 
	jQuery(document).on("click",".sao_builder_choose_icon",function(){
		jQuery('body').addClass('sao-active-icon');
		
		$('body').append('<div class="sao-mouse-wait"></div>');
  		var get = $(this).parent().attr('id-icon');
 		var data_this = $(this);
		$.ajax({
 			url: builder_js.ajaxurl,
			data : {
				action : 'sao_icon_picker',
				id : get,
			},
			success:function(data) {
 				if( data.length){
					
					jQuery('body').append(data); 
					$('.sao-mouse-wait').remove(); 
				}else{
					remove_add_error_loading();
				}
   			} 
		});  			  
   	});
	 	 
	jQuery(document).on("click",".sao_icon ul li",function(){
		$(this).parents('.sao_icon').find('.sao_icon_item').removeClass('selected');
		$(this).addClass('selected');
	});
		 
	// Set Icon	 
	jQuery(document).on("click",".sao_set_icon",function(){
			
		var icon = $(this).parents('.sao_icon').find('.selected').data('icon');
		var id =   $(this).parents('.sao_icon').data('id');
		var set = $('.sao_menu_icon[id-icon="'+id+'"]');
		$(set).find('.sao-menu-icon ').remove();
		$(set).find('input').attr('value',icon);
		$(set).append('<i class="fa sao-menu-icon '+icon+'"><a  class="sao_builder_remove_icon" ></a></i>');
 		$(this).parents('.sao_icon').remove();
		jQuery('body').removeClass('sao-active-icon');
 	}); 
		
	jQuery(document).on("click",".sao_builder_remove_icon",function(){
		$(this).parents('.sao_menu_icon').find('input').val('');
		$(this).parent().remove();
	}); 
	
	/****************************************************
	Title Tabs
	*****************************************************/	
	jQuery(document).on("click" ,'.sao_title_tabs a' ,function(){
		$(this).parent().find('.sao_layout_active').removeClass('sao_layout_active');
		$(this).addClass('sao_layout_active');
		var value = $(this).attr('data-id');
		$(this).parents('.sao_options_middle,.sao_model_middle').find('.sao_layout_group_active').removeClass('sao_layout_group_active');
		$(this).parents('.sao_options_middle,.sao_model_middle').find('[data-tab="'+value+'"]').addClass('sao_layout_group_active');
 			
	});
		 
  
			
	$(document).on('click', '.sao_model_close', function(e) {
		$( ".sao_builder_list,.sao_element_list,.sao_column_list" ).sortable({ disabled: false });
		$('.sao_model').hide();
		$('body').removeClass('sao-body-panel');
	
	});
	/****************************************************
	Tabs
	*****************************************************/
	$(document).on('click', '.sao_add_tab', function(e) {
		$('body').append('<div class="sao-mouse-wait"></div>');
		var data_key = 'a'+Math.floor(Math.random() * 9999999999);
		var data_option = $(this).attr('data-option');
		var data_id = $(this).attr('data-id');
		var data_this = $(this);
		$.ajax({
			url: builder_js.ajaxurl,
			data : {
				action : 'sao_options_function_tabs_item',
				key_tabs : data_key,
				option_tabs :  data_option,
				id_tabs :  data_id,
			},
			success:function(data) {
 				if( data.length){
					$(data_this).parent().find('.sao_options_setting').append(data);
					$(".sao-color").cs_wpColorPicker();
					$('.sao-mouse-wait').remove(); 
				}else{
					remove_add_error_loading();
				}
			} 
		}); 
			 
	});
		
   
	/****************************************************
	Add List
	*****************************************************/	
	$(document).on('click', '.sao_add_list', function(e) {
		$('body').append('<div class="sao-mouse-wait"></div>');
 		var data_key = 'a' + Math.floor(Math.random() * 9999999999);
		var data_option = $(this).attr('data-option');
		var data_id = $(this).attr('data-id');
		var data_this = $(this);
 		$.ajax({
			url: builder_js.ajaxurl,
			data : {
				action : 'sao_options_function_list_item',
				key_list : data_key,
				option_list :  data_option,
				id_list :  data_id,
			},
			success:function(data) {
 				if( data.length){
					$(data_this).parents('.sao_options_list').find('.sao_list_item').each( function(index, element) {
						$(this).removeClass('sao_list_item_show').addClass('sao_list_item_hide');
					});
	
					$(data_this).parent().find('.sao_options_setting').append(data);
					sao_add_hander('#sao_' + data_key);
					$(".sao-color").cs_wpColorPicker();
						 
					sao_list_collapse();
					$('.sao-mouse-wait').remove();
										 
					$(".sao_list_item").on('change keyup mousedown ',function() { 
						var val = $(this).find('input,textarea').val();       
						$(this).find('.sao_title_list').html('').html(val);                
					});
											
					sao_fold_hide('.sao_list_options_item');
				}else{
					remove_add_error_loading();
				}
			} 
		});  
			 
	});		
		  
 
			  
	/****************************************************
	Remove Row
	*****************************************************/	
	$(document).on('click', '.sao_remove_tab', function(e) {
		$(this).parents('.sao_tab_item').remove();
			 
	});
	$(document).on('click', '.sao_remove_list', function(e) {
		$(this).parents('.sao_list_item').remove();
 	});
		
 	// Row Remove
	$(document).on('click', '.sao_section_remove', function(e) {
		e.preventDefault();
		$(this).parents('.sao_section_item').animate({ opacity: 0 }, 200, function() {
			$(this).remove();
			sao_output_online();
		});
			
	});
		
	$(document).on('click', '.sao_column_remove', function(e) {
		e.preventDefault();
		$(this).parents('.sao_column_item').animate({ opacity: 0 }, 200, function() {
			$(this).remove();
			sao_output_online();
		});
	});	  
	$(document).on('click', '.sao_element_item a.sao_element_remove', function(e) {
		e.preventDefault();
		$(this).parents('.sao_element_item').animate({ opacity: 0 }, 200, function() {
			$(this).remove();
			sao_output_online();
 		});
	});
	 
		
	/****************************************************
	options tabs
	*****************************************************/	
	$('.sao_options_tabs .sao_options_setting ').sortable({
		opacity: 0.6,
		stop: function() {}
	}); 
		
				
	   $('.sao_options_list .sao_options_setting ').sortable({
		  opacity: 0.6,
		  stop: function() {}
		}); 	
		 
	/****************************************************
	S Model Select
	*****************************************************/	
	$(".sao_model_item .sao-col-warp,.sao_model_item img").click(function(){
			$(this).prev().attr('checked',true);
	});
	
	
	/****************************************************
	S Model Select
	*****************************************************/	
	$(document).on('click','.sao_background_color_first',function(){
			$(this).parent().find('.wp-color-picker').val();
	});
	
		 
	
	
	});
});
 