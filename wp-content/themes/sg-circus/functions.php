<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage SG Circus
 * @since SG Circus 1.0
*/

/**
 * SG Circus setup.
 *
 * @since SG Circus 1.0
 */
 
define( 'SGWINDOWCHILD', 'SGCircus' );
  
function sgcircus_setup() {

	$defaults = sgwindow_get_defaults();

	load_child_theme_textdomain( 'sgcircus', get_stylesheet_directory() . '/languages' );
	
	$args = array(
		'default-image'          => get_stylesheet_directory_uri() . '/img/' . 'header.jpg',
		'header-text'            => true,
		'default-text-color'     => sgwindow_text_color( esc_attr( get_theme_mod('color_scheme') ), $defaults ['color_scheme'] ),
		'width'                  => absint( sgwindow_get_theme_mod( 'size_image' ) ),
		'height'                 => absint( sgwindow_get_theme_mod( 'size_image_height' ) ),
		'flex-height'            => true,
		'flex-width'             => true,
	);
	add_theme_support( 'custom-header', $args );
	
	remove_action( 'sgwindow_empty_sidebar_top-home', 'sgwindow_the_top_sidebar_widgets', 20 );
	remove_action( 'sgwindow_empty_column_2-portfolio-page', 'sgwindow_right_sidebar_portfolio', 20 );
	remove_action( 'admin_menu', 'sgwindow_admin_page' );
}
add_action( 'after_setup_theme', 'sgcircus_setup' );

/**
 * Enqueue parent and child scripts
 *
 * @package WordPress
 * @subpackage SG Circus
 * @since SG Circus 1.0
*/

function sgcircus_styles() {
    wp_enqueue_style( 'sgwindow-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'sgcircus-style', get_stylesheet_uri(), array( 'sgwindow-style' ) );
	
	wp_enqueue_style( 'sgcircus-colors', get_stylesheet_directory_uri() . '/css/scheme-' . esc_attr( sgwindow_get_theme_mod( 'color_scheme' ) ) . '.css', array( 'sgcircus-style', 'sgwindow-colors' ) );
}
add_action( 'wp_enqueue_scripts', 'sgcircus_styles' );

/**
 * Set defaults
 *
 * @package WordPress
 * @subpackage SG Circus
 * @since SG Circus 1.0
*/

function sgcircus_defaults( $defaults ) {

	$defaults['body_font'] = 'Open Sans';
	$defaults['heading_font'] = 'Alegreya Sans';
	$defaults['header_font'] = 'Allerta Stencil';
	$defaults['column_background_url'] = get_stylesheet_directory_uri() . '/img/back.jpg';
	$defaults['logotype_url'] =  get_stylesheet_directory_uri() . '/img/logo.png';
	$defaults['post_thumbnail_size'] = '730';
	
	$defaults['width_top_widget_area'] = '1100';
	$defaults['width_content_no_sidebar'] = '1360';	
	$defaults['width_content'] = '1100';
	$defaults['width_main_wrapper'] = '1100';
	$defaults['is_home_footer'] = '1';
	$defaults['front_page_style'] = '1';
	
	$defaults['layout_home'] = 'sidebar-right';
	$defaults['layout_blog_content'] = 'default';
	
	$defaults['width_column_1_left_rate'] = '30';
	$defaults['width_column_1_right_rate'] = '30';
	$defaults['width_column_1_rate'] = '24';
	$defaults['width_column_2_rate'] = '24';
	
	$defaults['single_style'] = 'content';

	$defaults['defined_sidebars']['home'] = array(
											'use' => '1', 
											'callback' => 'is_front_page', 
											'param' => '', 
											'title' => __( 'Home', 'sg-window' ),
											'sidebar-top' => '1',
											'sidebar-before-footer' => '1',
											'column-1' => '1',
											'column-2' => '1', 
											);

	$defaults['footer_text'] = '<a href="' . __( 'http://wordpress.org/', 'sgcircus' ) . '">' . __( 'Powered by WordPress', 'sgcircus' ). '</a> | ' . __( 'theme ', 'sgcircus' ) . '<a href="' .  __( 'http://wpblogs.ru/themes/blog/theme/sg-circus/', 'sgcircus') . '">SG Circus</a>';
	
	return $defaults;

}
add_filter( 'sgwindow_option_defaults', 'sgcircus_defaults' );

/** Set theme layout
 *
 * @since SG Circus 1.0
 */
function sgcircus_layout( $layout ) {
	
	foreach( $layout as $id => $layouts ) {
		if ( 'layout_home' == $layouts['name'] ) {

			$layout[ $id ]['content_val'] = 'default';
			$layout[ $id ]['val'] = 'right-sidebar';
			
		} elseif ( 'layout_blog' == $layouts['name'] ) {

			$layout[ $id ]['content_val'] = 'default';
			$layout[ $id ]['val'] = 'right-sidebar';

		} elseif ( 'layout_archive' == $layouts['name'] ) {

			$layout[ $id ]['content_val'] = 'default';
			$layout[ $id ]['val'] = 'right-sidebar';

		}
	}
	return $layout;
}
add_filter( 'sgwindow_layout', 'sgcircus_layout' );

/**
 * Add widgets to the top sidebar on the home page
 *
 * @since SG Circus 1.0
 */
function sgcircus_the_top_sidebar_widgets() {
	
	the_widget( 'sgwindow_image', 'title='.__('Our Services', 'sg-window').
								'&count=3'.
								'&columns=column-3'.
								'&is_background=1'.
								'&is_margin_0=1'.
								'&is_animate_0='.
								'&is_animate_1='.
								'&is_animate_2='.
								'&is_animate_once=1'.
								'&is_step='.
								'&is_link_0=1'.
								'&is_link_1=1'.
								'&is_link_2=1'.
								'&effect_id_0=effect-4'.
								'&effect_id_1=effect-4'.
								'&effect_id_2=effect-4'.
								'&image_link_0=' . get_template_directory_uri() . '/img/' . '1.jpg' . ''.
								'&image_link_1=' . get_template_directory_uri() . '/img/' . '2.jpg' . ''.
								'&image_link_2=' . get_template_directory_uri() . '/img/' . '3.jpg' . ''.
								'&title_0='.__('Title 1', 'sgcircus').'&text_0=' .
								'&title_1='.__('Title 2', 'sgcircus').
								'&title_2='.__('Title 3', 'sgcircus').
								'&text_0='.__('Description 1', 'sgcircus').
								'&text_1='.__('Description 2', 'sgcircus').
								'&text_2='.__('Description 3', 'sgcircus')
		);
}
add_action('sgwindow_empty_sidebar_top-home', 'sgcircus_the_top_sidebar_widgets', 20);

/**
 * Hook widgets into right sidebar at the front page
 *
 * @package WordPress
 * @subpackage SG Circus
 * @since SG Circus 1.0
*/

function sgcircus_home_right_column( $layouts ) {

	the_widget( 'WP_Widget_Search', 'title=' );
	the_widget( 'WP_Widget_Categories' );
	the_widget( 'WP_Widget_Tag_Cloud', 'title=' );
	the_widget( 'WP_Widget_Recent_Comments' );
	
}
add_action('sgwindow_empty_column_2-home', 'sgcircus_home_right_column', 20);

/**
 * Add widgets to the right sidebar on portfolio pages
 *
 * @since SG Circus 1.0
 */
function sgcircus_right_sidebar_portfolio() {

	the_widget( 'sgwindow_items_portfolio', 'title='.__('Recent Projects', 'sgcircus').
								'&count=8'.
								'&jetpack-portfolio-type=0'.
								'&columns=column-2'.
								'&is_background=1'.
								'&is_margin_0='.
								'&is_link=1'.
								'&effect_id_0=effect-1');
}
add_action('sgwindow_empty_column_2-portfolio-page', 'sgcircus_right_sidebar_portfolio', 20);

//admin page
require get_stylesheet_directory() . '/inc/admin-page.php';