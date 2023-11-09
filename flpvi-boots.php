<?php
// Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}
// Plugin Admin Options
include plugin_dir_path(__FILE__).'all-inc/flpvi-admin1main.php';
// include plugin_dir_path(__FILE__).'all-inc/flpvi-admin.php';

// Blog single
function flpvi_custom_single_post_template($template) {
    if (is_singular('post')) {
        // $new_template = plugin_dir_path(__FILE__) . 'single-post-template.php';
        $new_template = plugin_dir_path(__FILE__) . 'woocommerce/option1.php';
        if (file_exists($new_template)) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('template_include', 'flpvi_custom_single_post_template', 99);

// Blog single

// All custom css stylesheet
function flpvi_styles(){
	global $flpvi_button_position_value,$flpvi_btn_bgc_value,
	$flpvi_text_color_value,$flpvi_crnttext_color_value,$flpvi_text_bgcolor_value,$flpvi_breadcrumb_size_value,$flpvi_breadcrumb_padding_value,$flpvi_breadcrumb_margin_value,$flpvi_brdcmb_slctfntfmly_value,
	$flpvi_breadcrumb_hover_color_value,$flpvi_breadcrumb_hover_bgcolor_value,$flpvi_breadcrumb_hover_size_value,$flpvi_breadalign_value,
	$flpvi_stockornot_color_value,$flpvi_stockornot_bgcolor_value,$flpvi_stockornot_size_value,$flpvi_stockornot_padding_value,$flpvi_stockornot_margin_value,$flpvi_stockornot_slctfntfmly_value,
	$flpvi_stockornot_hover_color_value,$flpvi_stockornot_hover_bgcolor_value,$flpvi_stockornot_hover_size_value,$flpvi_stockornotalign_value;
	$slider_value = get_option('flpvi-nouislider', 50);
	// $slider_value = get_option('flpvi-text-color-control', 50);
	$html = "<style>
		.ferdaus01010{
			color:{$flpvi_btn_bgc_value};
		}
		h2.entry-title{
			font-size:{$slider_value}px;
		}
		.breadcrumb_custome_class .woocommerce-breadcrumb a{
			color:{$flpvi_text_color_value};
			background:{$flpvi_text_bgcolor_value};
			font-size:{$flpvi_breadcrumb_size_value};
			padding:{$flpvi_breadcrumb_padding_value};
			margin:{$flpvi_breadcrumb_margin_value};
			font-family:{$flpvi_brdcmb_slctfntfmly_value};
		}
		.breadcrumb_custome_class .woocommerce-breadcrumb:hover a{
			color:{$flpvi_breadcrumb_hover_color_value};
			background:{$flpvi_breadcrumb_hover_bgcolor_value};
			font-size:{$flpvi_breadcrumb_hover_size_value};
		}
		.breadcrumb_custome_class .woocommerce-breadcrumb{
			color:{$flpvi_crnttext_color_value};
		}
		.breadcrumb_custome_class{
			text-align:{$flpvi_breadalign_value}
		}
		.flpvi-stock-available span{
			color:{$flpvi_stockornot_color_value};
			background:{$flpvi_stockornot_bgcolor_value};
			font-size:{$flpvi_stockornot_size_value};
			padding:{$flpvi_stockornot_padding_value};
			margin:{$flpvi_stockornot_margin_value};
			font-family:{$flpvi_stockornot_slctfntfmly_value};
		}
		.flpvi-stock-available:hover span{
			color:{$flpvi_stockornot_hover_color_value};
			background:{$flpvi_stockornot_hover_bgcolor_value};
			font-size:{$flpvi_stockornot_hover_size_value};
		}
		.flpvi-stock-available .stock-bottom{
			justify-content:{$flpvi_stockornotalign_value}
		}
	";
	if($flpvi_button_position_value == 'image_hover'){
		$html .= 'a.className{
			top: 50%;
		}
		.post:hover a.className{
			visibility: visible;
		}';
	}

	$html .= '</style>';
	echo $html;
}
add_action('wp_head','flpvi_styles',99);


// View font awesome for public
function name_fucntion_flpvi(){
	wp_enqueue_style('flpvi_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3'); // Add Font Awesome stylesheet
	wp_enqueue_style('flpvi_10_swiper', plugin_dir_url( __FILE__ ) . 'all-inc/public-assets/css/cdn.jsdelivr.net_npm_swiper@10_swiper-bundle.min.css', array(), '1.0');
	wp_enqueue_style('flpvi_all_min', plugin_dir_url( __FILE__ ) . 'all-inc/public-assets/css/all.min.css', array(), '1.0');
	wp_enqueue_style('flpvi_main', plugin_dir_url( __FILE__ ) . 'all-inc/public-assets/css/main.css', array(), '1.0');

	wp_enqueue_script('flpvi_10_swiper', plugin_dir_url( __FILE__ ) . 'all-inc/public-assets/js/cdn.jsdelivr.net_npm_swiper@10_swiper-bundle.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('flpvi_main', plugin_dir_url( __FILE__ ) . 'all-inc/public-assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'name_fucntion_flpvi');
?>
 