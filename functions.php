<?php
add_action('after_setup_theme', 'uncode_language_setup');
function uncode_language_setup()
{
	load_child_theme_textdomain('uncode', get_stylesheet_directory() . '/languages');
}

function theme_enqueue_styles()
{
	$production_mode = function_exists('ot_get_option') ? ot_get_option('_uncode_production') : 'on';
	$resources_version = ($production_mode === 'on') ? null : rand();
	if ( function_exists('get_rocket_option') && ( get_rocket_option( 'remove_query_strings' ) || get_rocket_option( 'minify_css' ) || get_rocket_option( 'minify_js' ) ) ) {
		$resources_version = null;
	}
	$parent_style = 'uncode-style';
	$child_style = array('uncode-style');
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/library/css/style.css', array(), $resources_version);
	wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', $child_style, $resources_version);

	wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', '', '1.0', true);

	if(is_front_page()) {
	  wp_enqueue_script('typewriter-core', '//unpkg.com/typewriter-effect@2.3.1/dist/core', '', '1.0', true);
	  wp_enqueue_script('typewriter', get_stylesheet_directory_uri() . '/js/typewriter.js', '', '1.0', true);
	}

}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 100);
