<?php
/**
* Plugin Name: AAA Flexi Post View
* Description: Empower your WordPress site with Flexi Post View, allowing effortless customization of single blog post pages via an intuitive dashboard.
* Plugin URI: https://bestwpdeveloper.com/shop/
* Version: 1.0
* Author: Best WP Developer
* Author URI: https://bestwpdeveloper.com/
* Text Domain: flexi-post-view
*/

//Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}
add_filter( 'plugin_action_links', 'flpvi_settings_plugin_action_link', 10, 2 );
function flpvi_settings_plugin_action_link($links, $file){
	if ( plugin_basename( __FILE__ ) == $file ) {
		$settings_link = '<a href="' . admin_url( 'admin.php?page=flpvi_single_sk' ) . '">'.esc_html__('Settings', 'flexi-post-view').'</a>';
		array_push( $links, $settings_link );
	}
	return $links;
}
//Load plugin text domain
function flpvi_load_txtdomain() {
	$domain = 'flexi-post-view';
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
	// load_textdomain( $domain, WP_LANG_DIR . '/'.$domain.'-' . $locale . '.mo' ); //wp-content languages
	load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' ); // Plugin Languages
}
add_action('plugins_loaded','flpvi_load_txtdomain');
include plugin_dir_path(__FILE__). 'flpvi-boots.php';
?>
