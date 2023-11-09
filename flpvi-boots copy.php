<?php
// Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}

// Plugin Admin Options
include plugin_dir_path(__FILE__).'all-inc/flpvi-admin.php';


// All enqueue scripts
function flpvi_enqueue_scripts(){
	global $flpvi_lb_title_value, // For the LightBox image title
			$flpvi_gl_anim_value,  // For animation
			$flpvi_button_position_value; // The image Hover effect

	wp_enqueue_style('flpvi-style-css', plugins_url('/all-inc/font-assets/css/flpvi-style.css',__FILE__), null, '1.0');
	wp_enqueue_script('flpvi-js', plugins_url('/all-inc/font-assets/js/flpvi-js-min.js',__FILE__), array('jquery'), '1.0', true);
	wp_enqueue_script('flpvi-just-js', plugins_url('/all-inc/font-assets/js/flpvi-js.js',__FILE__), array('jquery'), '1.0', true);
	wp_localize_script('flpvi-js','flpvi_localize',array(
		'adminurl' => admin_url().'admin-ajax.php',
		'prettyPhoto_title' => esc_attr($flpvi_lb_title_value),
		'modal_anim' => esc_attr($flpvi_gl_anim_value),
		'img_hover_btn'		=> esc_attr($flpvi_button_position_value)
		));
}
add_action('wp_enqueue_scripts','flpvi_enqueue_scripts');

// This scripts for wooproduct image popup (Assets from woocommerce plugin)
function flpvi_lightbox() {
	global $woocommerce , $flpvi_lb_enable_value; // Enable Lightbox
	wp_enqueue_script( 'wc-add-to-cart-variation' ); //Variable post Script
	if ( $flpvi_lb_enable_value ) {
	  wp_enqueue_script( 'prettyPhoto', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto.min.js', array( 'jquery' ), '1.0', true );
	  wp_enqueue_style( 'woocommerce_prettyPhoto_css', $woocommerce->plugin_url() . '/assets/css/prettyPhoto.css' );
	}
}
add_action( 'wp_footer', 'flpvi_lightbox' );

add_action( 'flpvi-images', 'woocommerce_show_product_sale_flash', 10 );
// The post images
function flpvi_product_image(){
	include(plugin_dir_path(__FILE__).'/wooc_functions/product_images/flpvi-post-image.php');
}
add_action('flpvi-images','flpvi_product_image',20);

// The post thumbnails
if($flpvi_lb_en_gallery_value){
	// function flpvi_product_thumbnails(){
	// 	include(plugin_dir_path(__FILE__).'/wooc_functions/product_images/flpvi-post-thumbnails.php');
	// }
	// add_action('flpvi_after_product_image','flpvi_product_thumbnails',5);
	
	add_filter('template_include', 'ferdaus_single_product_template', 99);
}

function ferdaus_single_product_template($template) {
	if (is_singular('post')) {
		$new_template = plugin_dir_path(__FILE__) . 'woocommerce/option1.php';
		if (file_exists($new_template)) {
			return $new_template;
		}
	}
	return $template;
}

// All summary hooks
add_action( 'flpvi-summary', 'woocommerce_template_single_title', 5 );
add_action( 'flpvi-summary', 'woocommerce_template_single_rating', 10 );
add_action( 'flpvi-summary', 'woocommerce_template_single_price', 15 );
add_action( 'flpvi-summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'flpvi-summary', 'woocommerce_template_single_add_to_cart', 25 );
add_action( 'flpvi-summary', 'woocommerce_template_single_meta', 30 );

// Quick View parent box
function flpvi_panel(){
	$html  = '<div class="flpvi-opac"></div>';
	$html .= '<div class="flpvi-panel">';
	$html .= '<div class="flpvi-preloader flpvi-opl">';
	$html .= '<div class="flpvi-speeding-wheel"></div>';
	$html .= '</div>';
	$html .= '<div class="flpvi-modal"></div>';
	$html .= '</div>';
	echo $html;
}
add_action('wp_footer','flpvi_panel');

// This is the quick view button
function flpvi_button(){
	global $flpvi_button_text_value , $flpvi_btn_icon_value;
	$html  = '<a class="flpvi-button" qv-id = "'.get_the_ID().'">';
	if($flpvi_btn_icon_value){
	$html .= '<span class="flpvi-btn-icon dashicons dashicons-visibility"></span>';
	}
	$html .= esc_attr__($flpvi_button_text_value,'posts-archive');
	$html .= '</a>';
	echo $html;
}

// Quick View button position settings
$flpvi_button_position_value = esc_attr($flpvi_button_position_value);
if($flpvi_button_position_value == 'woocommerce_after_shop_loop_item' || $flpvi_button_position_value == 'image_hover'){
	add_action('woocommerce_after_shop_loop_item','flpvi_button',11); // Quick View button
}
else{
	add_action($flpvi_button_position_value,'woocommerce_template_loop_product_link_close',11); //Closing WC link
	add_action($flpvi_button_position_value,'flpvi_button',11); // Quick View button
	add_action($flpvi_button_position_value,'woocommerce_template_loop_product_link_open',11); // Opening WC link
}

// Including Quick View/Ajax Template here
require_once plugin_dir_path(__FILE__).'/wooc_functions/flpvi-popup.php';

// All custom css stylesheet
function flpvi_styles(){
	global $flpvi_button_color_value , $flpvi_lb_img_width_value , $flpvi_btn_iconc_value , $flpvi_button_fsize_value,$flpvi_button_position_value,$flpvi_btn_bgc_value,$flpvi_btn_ps_value,$flpvi_btn_margin_value,$flpvi_btn_btype_value,$flpvi_btn_bs_value,$flpvi_btn_bc_value,$flpvi_lb_img_area_value,$flpvi_btn_bors_value, $flpvi_btn_hover_bgc_value,
	$flpvi_quick_view_wrapper_v, $flpvi_quick_view_title_v, $flpvi_quick_view_description_v, $flpvi_wrapper_padding, $flpvi_quick_view_wrapper_radius, $flpvi_summary_padding,
	$flpvi_quick_view_old_price_v, $flpvi_quick_view_new_price_v, $flpvi_quick_view_add_cart_b, $flpvi_quick_view_add_cart_c, $flpvi_quick_view_cart_radius, $flpvi_quick_view_cart_border_style, $flpvi_quick_view_slide_arrow_v;
	$html = "<style>
				a.flpvi-button{
					color: {$flpvi_button_color_value};
					background-color: {$flpvi_btn_bgc_value};
					padding: {$flpvi_btn_ps_value};
					margin: {$flpvi_btn_margin_value};
					font-size: {$flpvi_button_fsize_value}px;
					border: {$flpvi_btn_bs_value}px {$flpvi_btn_btype_value} {$flpvi_btn_bc_value};
					border-radius: {$flpvi_btn_bors_value}px;
				}
				a.flpvi-button:hover{
					background-color: {$flpvi_btn_hover_bgc_value};
				}
				.woocommerce div.post .flpvi-images  div.images{
					width: {$flpvi_lb_img_width_value}%;
				}
				.flpvi-btn-icon{
					color: {$flpvi_btn_iconc_value};
				}
				.flpvi-container{
					background-color: {$flpvi_quick_view_wrapper_v};
					border-radius: {$flpvi_quick_view_wrapper_radius};
				}
				.flpvi-main .product_title{
					color: {$flpvi_quick_view_title_v};
				}
				.flpvi-main del span.woocommerce-Price-amount.amount{
					color: {$flpvi_quick_view_old_price_v};
				}
				.flpvi-main ins span.woocommerce-Price-amount.amount{
					color: {$flpvi_quick_view_new_price_v};
				}
				.single-post div.post .woocommerce-post-details__short-description p, .single-post div.post .woocommerce-post-details__short-description p a{
					color: {$flpvi_quick_view_description_v};
				}
				.flpvi-images {
					padding: {$flpvi_wrapper_padding};
				}
				.flpvi-summary{
					padding: {$flpvi_summary_padding};
				}
				.flpvi-summary .single_add_to_cart_button, .flpvi-summary button {
					background: {$flpvi_quick_view_add_cart_b} !important;
					color: {$flpvi_quick_view_add_cart_c} !important;
					border-radius: {$flpvi_quick_view_cart_radius};
					border: {$flpvi_quick_view_cart_border_style};
				}
				.flpvi-chevron-left:before, .flpvi-chevron-right:before{
					color: {$flpvi_quick_view_slide_arrow_v};
				}
				";
	if($flpvi_button_position_value == 'image_hover'){
		$html .= 'a.flpvi-button{
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%,-50%);
			visibility: hidden;
		}
		.post:hover a.flpvi-button{
		    visibility: visible;
		    transform: translate(-50%,-50%);
		}';
	}

	if($img_area = $flpvi_lb_img_area_value){
		$desc_area = 100-$img_area-3; 
	}
	else{
		$img_area  = 48;
		$desc_area = 48; 
	}

	$html .= '.flpvi-images{
					width: '.$img_area.'%;
				}
				.flpvi-summary{
					width: '.$desc_area.'%;
				}';

	$html .= '</style>';
	echo $html;
}
add_action('wp_head','flpvi_styles',99);
?>