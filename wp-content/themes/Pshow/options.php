<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */
function optionsframework_option_name() {
	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */
function optionsframework_options() {

// 将所有页面（pages）加入数组
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = '选择页面：';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	$wp_editor_settings = array(
		'wpautop' => true, // 默认
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	

	$options = array();
	
	/*****基本设置*****/
	$options[] = array(
		'name' => __('主题设置', 'options_framework_theme'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('网站描述', 'options_framework_theme'),
		'desc' => __('一般不超过200字符', 'options_framework_theme'),
		'id' => 'pshow_description',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('网站关键词', 'options_framework_theme'),
		'desc' => sprintf( __( '两到三个即可，意义不大，以英文逗号(,)隔开。', 'options_framework_theme' ) ),
		'id' => 'pshow_keywords',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Meta', 'options_framework_theme'),
		'desc' => sprintf( __( '如：百度异步统计代码需要放这里。', 'options_framework_theme' ) ),
		'id' => 'pshow_meta',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('首页幻灯片', 'options_framework_theme'),
		'desc' => __('可单独设置一个分类目录，将其分类id填写下面，即可。建议不要超过5篇。', 'options_framework_theme'),
		'id' => 'pshow_slider',
		"class" => "mini",
		'type' => 'text');
		
	$options[] = array(
		'name' => __('首页分类展示', 'options_framework_theme'),
		'desc' => __('直接输入右侧分类ID号。需要展示几个输入几个ID号就可以，并英文逗号(,)隔开', 'options_framework_theme'),
		'id' => 'pshow_index',
		"class" => "mini",		
		'type' => 'text');
		
	$options[] = array(
		'name' => __('网站底部', 'options_framework_theme'),
		'desc' => sprintf( __( '可以填写，地图，说明或其他类型的统计代码，注意不要选择图片类型。', 'options_framework_theme' ) ),
		'id' => 'pshow_footer',
		'type' => 'textarea');
	
	$options[] = array(
		'name' => __('网站底部入驻链接', 'options_framework_theme'),
		'desc' => sprintf( __( '可以填写站内或站外链接，自行决定。', 'options_framework_theme' ) ),
		'id' => 'pshow_join',
		'type' => 'text');		

	$options[] = array(
		'name' => __('网站右边建议链接', 'options_framework_theme'),
		'desc' => sprintf( __( '直接填写链接地址就可以了。这是一个预留功能，后续会出现改变，大家先将就使用。', 'options_framework_theme' ) ),
		'id' => 'pshow_jianyi',
		'type' => 'text');

	


		
		
	return $options;
}