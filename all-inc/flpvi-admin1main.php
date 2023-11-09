<?php
// THIS IS ADMIN SETTINGS (DASHBOARD SETTINGS)

//Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}

// Enqueue Scripts & Stylesheet
function flpvi_admin_enqueue(){
	if (isset($_GET['page']) && $_GET['page'] === 'flpvi_single_sk') {
		// For demo install
		wp_enqueue_style('install-demo-style', plugins_url('/admin-assets/css/install-demo.css',__FILE__), null, '1.0', 'all');
		wp_enqueue_script('install-demo-script', plugins_url('/admin-assets/js/install-demo.js',__FILE__), array('jquery'), '1.0', true);
		// noUiSlider cdn
		wp_enqueue_style('flpvi-nouislider-style', plugins_url('/admin-assets/nouislider/nouislider.css',__FILE__), null, '1.0', 'all');
		wp_enqueue_script('flpvi-nouislider-script', plugins_url('/admin-assets/nouislider/nouislider.js',__FILE__), array('jquery'), '15.5.0', true);
		// For noUiSlider custom assets
		wp_enqueue_script('flpvi-admin-nouislider-custom-script', plugins_url('/admin-assets/js/nouislider-custom.js',__FILE__), array('jquery'), '1.0', true);
		wp_enqueue_style('flpvi-admin-nouislider-custom-style', plugins_url('/admin-assets/js/nouislider-custom.css',__FILE__), null, '1.0', 'all');
		// Tab assets
		wp_enqueue_style('flpvi-admin-css', plugins_url('/admin-assets/css/style.css',__FILE__), null, '1.0', 'all');
		wp_enqueue_style('flpvi-admin-tab-css', plugins_url('/admin-assets/css/tab.css',__FILE__), null, '1.0', 'all');
		wp_enqueue_script('flpvi-admin-js', plugins_url('/admin-assets/js/script.js',__FILE__), array('jquery'), '1.0', true);
		wp_enqueue_script('flpvi-admin-reset_scripts', plugins_url('/admin-assets/js/reset_scripts.js',__FILE__), array('jquery'), '1.0', true);
		// Add Font Awesome stylesheet
		wp_enqueue_style('fonteee-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3'); 
		// Enqueue Select2 and Font Awesome
		wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
		wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);

		// some cdn for the alert notification design
		wp_enqueue_style('flpvi-reset-alert-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', null, '1.0', 'all');
		wp_enqueue_script('flpvi-reset-alert-jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('flpvi-reset-alert-scripts', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '1.0', true);

		// For color-piker
		wp_enqueue_style('install-wheelcolorpicker-style', plugins_url('/admin-assets/wheelcolorpicker.css',__FILE__), null, '1.0', 'all');
		// wp_enqueue_script('flpvi-ajax-scripts', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('flpvi-wheelcolorpicker-scripts', plugins_url('/admin-assets/jquery.wheelcolorpicker.js',__FILE__), array('jquery'), '1.0', true);
	}
}
add_action('admin_enqueue_scripts','flpvi_admin_enqueue');

// For demo install
function flpvi_register_options()
{
	add_option('last_installed_section', '');
}
add_action('admin_init', 'flpvi_register_options');

//Settings page
function flpvi_menu_settings(){
	// 
		if(current_user_can('manage_options')){
			add_submenu_page(
				'edit.php',
				'Flexi Post View',
				'Flexi Post View',
				'manage_options',
				'flpvi_single_sk',
				'flpvi_settings_cb',
				12
			);
		}
		// 
	// add_menu_page( 'Flexi Post View Settings', 'Flexi Post View', 'manage_options', 'flpvi_single_sk', 'flpvi_settings_cb', 'dashicons-analytics', 57 );
	add_action('admin_init','flpvi_settings');
}
add_action('admin_menu','flpvi_menu_settings');
// For redirect
add_action( 'activated_plugin', function ( $plugin ) {
	if ( plugin_basename( __FILE__ ) == $plugin ) {
		wp_redirect( admin_url( 'admin.php?page=flpvi_single_sk' ) );
		die();
	}
} );
//Settings callback function
function flpvi_settings_cb(){
	// The save button for bottom save
	settings_errors(); ?>
	<div class="flpvi-main-settings">
		<form method="POST" action="options.php" class="flpvi-form">
			<?php settings_fields('flpvi-group'); ?>
			<?php do_settings_sections('flpvi_single'); ?>
			</div><div class="flpvi-save-btn"><?php submit_button(); ?></div>
		</form>
	</div>
<?php
}

// All custom settings and register all custom controls
function flpvi_settings(){
	include 'wp_controls.php';
}

/* Here custom settings functions registered  */

// This is admin header 
function flpvi_header_section(){
	?>
	<div class="flpvi_the_class">
		<div class="flpvi_data flpvi_name"><a class="flpvi_au_title" href="https://bestwpdeveloper.com" target="_blank"><h2 class="flpvi_dashtitle"><?php echo esc_html__('BEST WP DEVELOPER', 'flexi-post-view'); ?></h2></a></div>
		<div class="flpvi_data flpvi_demo">
			<div class="flpvi_the_author"><a class="flpvi_the_demo" href="https://bestwpdeveloper.com/flexi-post-view/" target="_blank"><?php echo esc_html__('Go Demo', 'flexi-post-view'); ?></a></div>
			<div class="flpvi_the_author"><a class="flpvi_the_author_a" href=""><?php echo esc_html__('Go License', 'flexi-post-view'); ?></a></div>
		</div>
	</div>
	<?php 
}

// Tab test one
function flpvi_tab_section(){
	?>
	<div class="flpvi_tab_items">
		<div class="flpvi_items">
			<div id="tab1" class="tab-btn active"><?php echo esc_html__('Settings', 'flexi-post-view'); ?></div>
			<div id="tab2" class="tab-btn"><?php echo esc_html__('Styles', 'flexi-post-view'); ?></div>
		</div>
		<div class="flpvi_save_btn"><?php submit_button(); ?></div>
		<div class="flpvi_save_btn"><input type="button" class="flpvi_settings_reset" onclick="checkReset(); resetSlider();" value="Reset All" id="resetButton"></div>
	</div>
	<?php
}
#################---####### Settings start
//***************---****** Archive Sections start
function flpvi_settings_sk(){ //------ Section  (Tab)
	$tab = '<div class="tab-content" id="tab1Content">';
	echo $tab.'<div class="flpvi_acc_items flpvi_acc1_view1">'.esc_html__('Archive Settings','flexi-post-view').'</div><div class="flpvi_acc1_view1_content">';
}
function flpvi_general_settings_sk(){  //------ Section  (Tab)
	echo '</div><div class="flpvi_acc_items flpvi_acc1_view2">'.esc_html__('General Settings','flexi-post-view').'</div><div class="flpvi_acc1_view2_content">';
}
function flpvi_general_relpro_settings_sk(){  //------ Section  (Tab)
	echo '</div><div class="flpvi_acc_items flpvi_acc1_view2">'.esc_html__('Related Posts Queries','flexi-post-view').'</div><div class="flpvi_acc1_view2_content">';
}
//***************---****** Archive Sections end

//***************---****** Archive Settings start
//Enable single post page
$flpvi_lb_en_gallery_value = sanitize_text_field(get_option('flpvi-enable-post-single-page','true'));
function flpvi_lb_en_gallery_cb(){
	global $flpvi_lb_en_gallery_value;
	echo '<label class="toggle-switch"><input type="checkbox" id="flpvi-enable-post-single-page" name="flpvi-enable-post-single-page" value="true" '.checked('true',$flpvi_lb_en_gallery_value,false).'><span class="toggle-slider"></span></label>';
}
// Post single page styles
function flpvi_button_position_cb(){
	echo '<div id="wpwrap">';
		echo '<div class="popup-button" title="'.esc_html__('Please check (Use our style?) option.','flexi-post-view').'">'.esc_html__('Go Templates','flexi-post-view').'</div>';
	echo '</div>';
	$sections = array(
		'style1' => 'Demo 1',
		'style2' => 'Demo 2',
		'style3' => 'Demo 3',
		'style4' => 'Demo 4',
		'style5' => 'Demo 5',
		'style6' => 'Demo 6',
		'style7' => 'Demo 7'
	);
	echo '<div class="popup-overlay" id="popupOverlay">';
		echo '<div class="popup-content">';
			echo '<span id="closePopup">'.esc_html__('Close','flexi-post-view').'</span>';
			echo '<span>Demo templates</span>';
			echo '<div class="grid-container">';
				foreach ($sections as $section_id => $section_title):
					echo '<section id="'.esc_attr($section_id).'">';
						echo '<h2>'.esc_html($section_title).'</h2>';
						echo '<button class="install-button" data-installed="false" onclick="simulateLoading(this)">';
								echo '<span class="loading-icon"></span>';
								echo '<span class="install-text">'.esc_html__('Install','flexi-post-view').'</span>';
								echo '<span class="uninstall-text">'.esc_html__('Uninstall','flexi-post-view').'</span>';
						echo '</button>';
						echo '<a class="flpvi-view-demo" href="bestwpdeveloper.com/flexi-post-view" target="_blank">'.esc_html__('View Demo', 'flexi-post-view').'</a>';
					echo '</section>';
				endforeach;
			echo '</div>';
			echo '<div id="installed-sections">';
			$lastInstalledSection = get_option('last_installed_section', '');
			echo '<div id="last-installed-section"></div>';// This is for installation massege
			echo '</div>';
		echo '</div>';
	echo '</div>';
	echo '<script>var LastInSave = "'.get_option('last_installed_section', '').'"</script>';
}
//***************---****** Archive Settings start

// Get all font here start
$all_fonts = [
	'' => 'Default',
	'Arial, sans-serif' => 'Arial',
	'Helvetica, sans-serif' => 'Helvetica',
	'Georgia, serif' => 'Georgia',
	'fantasy' => 'Fantasy',
	'Tahoma, sans-serif' => 'Tahoma',
	'Courier New, monospace' => 'Courier New',
	'Palatino, serif' => 'Palatino',
	'Garamond, serif' => 'Garamond',
	'Century Gothic, sans-serif' => 'Century Gothic',
	'Futura, sans-serif' => 'Futura',
	'Roboto, sans-serif' => 'Roboto',
	'Open Sans, sans-serif' => 'Open Sans',
	'Lato, sans-serif' => 'Lato',
	'Montserrat, sans-serif' => 'Montserrat',
	'Raleway, sans-serif' => 'Raleway',
	'Poppins, sans-serif' => 'Poppins',
	'Nunito, sans-serif' => 'Nunito',
	'Playfair Display, serif' => 'Playfair Display',
	'Quicksand, sans-serif' => 'Quicksand',
];
// Get all font here end

//***************---****** General Settings Controls start
//------ General style input start
// breadcrumb check
$flpvi_breadcrumb_check_value = sanitize_text_field(get_option('flpvi-breadcrumb-check-gallery','true'));
function flpvi_breadcrumb_check_cb(){
	global $flpvi_breadcrumb_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-breadcrumb-check-gallery" name="flpvi-breadcrumb-check-gallery" value="true" '.checked('true',$flpvi_breadcrumb_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// stock check
$flpvi_stock_check_value = sanitize_text_field(get_option('flpvi-stock-check-gallery','true'));
function flpvi_stock_check_cb(){
	global $flpvi_stock_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-stock-check-gallery" name="flpvi-stock-check-gallery" value="true" '.checked('true',$flpvi_stock_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// Sale check
$flpvi_sale_check_value = sanitize_text_field(get_option('flpvi-sale-check-gallery','true'));
function flpvi_sale_check_cb(){
	global $flpvi_sale_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-sale-check-gallery" name="flpvi-sale-check-gallery" value="true" '.checked('true',$flpvi_sale_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// featured check
$flpvi_featured_check_value = sanitize_text_field(get_option('flpvi-featured-check-gallery','true'));
function flpvi_featured_check_cb(){
	global $flpvi_featured_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-featured-check-gallery" name="flpvi-featured-check-gallery" value="true" '.checked('true',$flpvi_featured_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// featured check
$flpvi_featured_img_check_value = sanitize_text_field(get_option('flpvi-featured-img-check-gallery','true'));
function flpvi_featured_img_check_cb(){
	global $flpvi_featured_img_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-featured-img-check-gallery" name="flpvi-featured-img-check-gallery" value="true" '.checked('true',$flpvi_featured_img_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// gallery check
$flpvi_gallery_img_check_value = sanitize_text_field(get_option('flpvi-gallery-img-check-gallery','true'));
function flpvi_gallery_img_check_cb(){
	global $flpvi_gallery_img_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-gallery-img-check-gallery" name="flpvi-gallery-img-check-gallery" value="true" '.checked('true',$flpvi_gallery_img_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// Title check
$flpvi_title_check_value = sanitize_text_field(get_option('flpvi-title-check-gallery','true'));
function flpvi_title_check_cb(){
	global $flpvi_title_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-title-check-gallery" name="flpvi-title-check-gallery" value="true" '.checked('true',$flpvi_title_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// Reviews count check
$flpvi_revcntch_check_value = sanitize_text_field(get_option('flpvi-revcntch-check-gallery','true'));
function flpvi_revcntch_check_cb(){
	global $flpvi_revcntch_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-revcntch-check-gallery" name="flpvi-revcntch-check-gallery" value="true" '.checked('true',$flpvi_revcntch_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// regular price check
$flpvi_reg_price_check_value = sanitize_text_field(get_option('flpvi-reg-price-check-gallery','true'));
function flpvi_reg_price_check_cb(){
	global $flpvi_reg_price_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-reg-price-check-gallery" name="flpvi-reg-price-check-gallery" value="true" '.checked('true',$flpvi_reg_price_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// short description check
$flpvi_short_description_check_value = sanitize_text_field(get_option('flpvi-short-description-check-gallery','true'));
function flpvi_short_description_check_cb(){
	global $flpvi_short_description_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-short-description-check-gallery" name="flpvi-short-description-check-gallery" value="true" '.checked('true',$flpvi_short_description_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// categories check
$flpvi_categories_check_value = sanitize_text_field(get_option('flpvi-categories-check-gallery','true'));
function flpvi_categories_check_cb(){
	global $flpvi_categories_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-categories-check-gallery" name="flpvi-categories-check-gallery" value="true" '.checked('true',$flpvi_categories_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// tags check
$flpvi_tags_check_value = sanitize_text_field(get_option('flpvi-tags-check-gallery','false'));
function flpvi_tags_check_cb(){
	global $flpvi_tags_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-tags-check-gallery" name="flpvi-tags-check-gallery" value="true" '.checked('true',$flpvi_tags_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// quantity check
$flpvi_sku_check_value = sanitize_text_field(get_option('flpvi-sku-check-gallery','true'));
function flpvi_sku_check_cb(){
	global $flpvi_sku_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-sku-check-gallery" name="flpvi-sku-check-gallery" value="true" '.checked('true',$flpvi_sku_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// addtocart check
$flpvi_actions_check_value = sanitize_text_field(get_option('flpvi-actions-check-gallery','true'));
function flpvi_actions_check_cb(){
	global $flpvi_actions_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-actions-check-gallery" name="flpvi-actions-check-gallery" value="true" '.checked('true',$flpvi_actions_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// description check
$flpvi_description_check_value = sanitize_text_field(get_option('flpvi-description-check-gallery','true'));
function flpvi_description_check_cb(){
	global $flpvi_description_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-description-check-gallery" name="flpvi-description-check-gallery" value="true" '.checked('true',$flpvi_description_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}

// Related Posts General Settings Controls Start
// addtocart check
$flpvi_related_products_check_value = sanitize_text_field(get_option('flpvi-related-posts-check-gallery','true'));
function flpvi_related_products_check_cb(){
	global $flpvi_related_products_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-related-posts-check-gallery" name="flpvi-related-posts-check-gallery" value="true" '.checked('true',$flpvi_related_products_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$flpvi_relpro_toptile_check_value = sanitize_text_field(get_option('flpvi-relpro-toptile-check-gallery','true'));
function flpvi_relpro_toptile_check_cb(){
	global $flpvi_relpro_toptile_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-relpro-toptile-check-gallery" name="flpvi-relpro-toptile-check-gallery" value="true" '.checked('true',$flpvi_relpro_toptile_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$flpvi_relpro_prodimg_check_value = sanitize_text_field(get_option('flpvi-relpro-prodimg-check-gallery','true'));
function flpvi_relpro_prodimg_check_cb(){
	global $flpvi_relpro_prodimg_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-relpro-prodimg-check-gallery" name="flpvi-relpro-prodimg-check-gallery" value="true" '.checked('true',$flpvi_relpro_prodimg_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$flpvi_relpro_imglnk_check_value = sanitize_text_field(get_option('flpvi-relpro-imglnk-check-gallery','true'));
function flpvi_relpro_imglnk_check_cb(){
	global $flpvi_relpro_imglnk_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-relpro-imglnk-check-gallery" name="flpvi-relpro-imglnk-check-gallery" value="true" '.checked('true',$flpvi_relpro_imglnk_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$flpvi_relpro_prodtitle_check_value = sanitize_text_field(get_option('flpvi-relpro-prodtitle-check-gallery','true'));
function flpvi_relpro_prodtitle_check_cb(){
	global $flpvi_relpro_prodtitle_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-relpro-prodtitle-check-gallery" name="flpvi-relpro-prodtitle-check-gallery" value="true" '.checked('true',$flpvi_relpro_prodtitle_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$flpvi_relpro_titlelnk_check_value = sanitize_text_field(get_option('flpvi-relpro-titlelnk-check-gallery','true'));
function flpvi_relpro_titlelnk_check_cb(){
	global $flpvi_relpro_titlelnk_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-relpro-titlelnk-check-gallery" name="flpvi-relpro-titlelnk-check-gallery" value="true" '.checked('true',$flpvi_relpro_titlelnk_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$flpvi_relpro_prodpric_check_value = sanitize_text_field(get_option('flpvi-relpro-prodpric-check-gallery','true'));
function flpvi_relpro_prodpric_check_cb(){
	global $flpvi_relpro_prodpric_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-relpro-prodpric-check-gallery" name="flpvi-relpro-prodpric-check-gallery" value="true" '.checked('true',$flpvi_relpro_prodpric_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$flpvi_relpro_button_check_value = sanitize_text_field(get_option('flpvi-relpro-button-check-gallery','true'));
function flpvi_relpro_button_check_cb(){
	global $flpvi_relpro_button_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-relpro-button-check-gallery" name="flpvi-relpro-button-check-gallery" value="true" '.checked('true',$flpvi_relpro_button_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$flpvi_relpro_count_value = sanitize_text_field(get_option('flpvi-relpro-count-gallery', '3'));
function flpvi_relpro_count_cb(){
	global $flpvi_relpro_count_value;
	echo '<input type="text" name="flpvi-relpro-count-gallery" id="flpvi-relpro-count-gallery" value="'.esc_attr($flpvi_relpro_count_value).'" title="Just a number."  placeholder="3">';
}
$flpvi_relpro_excdpro_value = sanitize_text_field(get_option('flpvi-relpro-excdpro-gallery'));
function flpvi_relpro_excdpro_cb(){
	global $flpvi_relpro_excdpro_value;
	echo '<input type="text" name="flpvi-relpro-excdpro-gallery" id="flpvi-relpro-excdpro-gallery" value="'.esc_attr($flpvi_relpro_excdpro_value).'" title="Just post ID number."  placeholder="3, 4, 5">';
}
$flpvi_relpro_dsc_check_value = sanitize_text_field(get_option('flpvi-relpro-dsc-check-gallery','false'));
function flpvi_relpro_dsc_check_cb(){
	global $flpvi_relpro_dsc_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-relpro-dsc-check-gallery" name="flpvi-relpro-dsc-check-gallery" value="false" '.checked('true',$flpvi_relpro_dsc_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$flpvi_relpro_dscwordl_value = sanitize_text_field(get_option('flpvi-relpro-dscwordl-gallery', '10'));
function flpvi_relpro_dscwordl_cb(){
	global $flpvi_relpro_dscwordl_value;
	echo '<input type="text" name="flpvi-relpro-dscwordl-gallery" id="flpvi-relpro-dscwordl-gallery" value="'.esc_attr($flpvi_relpro_dscwordl_value).'" title="Just a number."  placeholder="10">';
}
$flpvi_relpro_dscind_value = sanitize_text_field(get_option('flpvi-relpro-dscind-gallery', '...'));
function flpvi_relpro_dscind_cb(){
	global $flpvi_relpro_dscind_value;
	echo '<input type="text" name="flpvi-relpro-dscind-gallery" id="flpvi-relpro-dscind-gallery" value="'.esc_attr($flpvi_relpro_dscind_value).'" title="Any Text."  placeholder="...">';
}
// Related Posts General Settings Controls end
//***************---****** General Settings Controls end
#################---####### Settings end

#################---####### Settings field end
//***************---****** Style control section title start
function flpvi_general_style_cb(){
	$tab = '</div></div><div class="tab-content" id="tab2Content" style="display: none;">';
	echo $tab.'<div class="flpvi_acc_items flpvi_acc2_view1" id="general">'.esc_html__('General Style Settings','flexi-post-view').'</div><div class="flpvi_acc2_view1_content">';
}
function flpvi_breadcrumb_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view2" id="breadcrumb">'.esc_html__('Breadcrumb Style','flexi-post-view').'</div><div class="flpvi_acc2_view2_content">';
}
function flpvi_breadcrumb_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.esc_html__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_stockornot_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Stock Or Not','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_stockornot_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.esc_html__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_salenote_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Sale Note','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_salenote_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.esc_html__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_featuredimg_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Post Images','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_galleryimgs_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.esc_html__('Gallery Imgs','flexi-post-view').'</b></div>';
}
function flpvi_producttitle_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Post Title','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_producttitle_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.esc_html__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_productprice_reg_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Post Price','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_productprice_sale_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.esc_html__('Sale Price','flexi-post-view').'</b></div>';
}
function flpvi_productshortdesc_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Short Description','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_variablesproduct_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Variable Post','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_productcategory_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Category','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_productcategory_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.esc_html__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_producttags_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Tags','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_producttags_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.esc_html__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_product_quantity_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Quantity','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_product_addtocart_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Add To Cart','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_product_descandrev_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Description & Review','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_related_product_styles_cb(){ // Related Posts Style Label
	echo '</div><div class="flpvi_relpro_styles" id="style"><b>'.esc_html__('Related Posts','flexi-post-view').'</b></div><div class="added_the_class_for_this_label">';
}
function flpvi_related_product_wrapper_styles_cb(){ 
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Wrapper','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
////////////////////////
function flpvi_relpro_featuredimg_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Post Images','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_relpro_producttitle_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Post Title','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_relpro_producttitle_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.esc_html__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_relpro_productprice_reg_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__('Post Price','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_relpro_productprice_sale_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.esc_html__('Sale Price','flexi-post-view').'</b></div>';
}
function flpvi_relpro_product_addtocart_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.esc_html__(' More View','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
//***************---****** Style control section title end 

//***************---****** Style inputs start (Tab)
//Font size
$flpvi_button_fsize_value = sanitize_text_field(get_option('flpvi-general-style-fsize',14));
function flpvi_button_fsize_cb(){
	global $flpvi_button_fsize_value;
	echo  '<input type="text" class="flpvi-input" name="flpvi-general-style-fsize" id="flpvi-general-style-fsize" value="'.esc_attr($flpvi_button_fsize_value).'">';
}

// Title Color
$flpvi_btn_bgc_value = sanitize_text_field(get_option('flpvi-general-title-clr','#8f8f8f'));
function flpvi_btn_bgc_cb(){
	global $flpvi_btn_bgc_value;
	echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-general-title-clr" id="flpvi-general-title-clr" value="'.esc_attr($flpvi_btn_bgc_value).'" >';
}

//Button Hover Title Color
$flpvi_btn_hover_bgc_value = sanitize_text_field(get_option('flpvi-btn-hover-bgc','#585858'));
function flpvi_btn_hover_bgc_cb(){
	global $flpvi_btn_hover_bgc_value;
	echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-btn-hover-bgc" value="'.esc_attr($flpvi_btn_hover_bgc_value).'" >';
}

//Button Color
$flpvi_button_color_value = sanitize_text_field(get_option('flpvi-button-color','white'));
function flpvi_button_color_cb(){
	global $flpvi_button_color_value;
	echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-button-color" value="'.esc_attr($flpvi_button_color_value).'" >';
}

//Button Padding
$flpvi_btn_ps_value = sanitize_text_field(get_option('flpvi-btn-ps','6px 8px'));
function flpvi_btn_ps_cb(){
	global $flpvi_btn_ps_value;
	echo '<input type="text" name="flpvi-btn-ps" value="'.esc_attr($flpvi_btn_ps_value).'" >';
}

//Button Margin
$flpvi_btn_margin_value = sanitize_text_field(get_option('flpvi-btn-margin',' '));
function flpvi_btn_margin_cb(){
	global $flpvi_btn_margin_value;
	echo '<input type="text" name="flpvi-btn-margin" value="'.esc_attr($flpvi_btn_margin_value).'" >';
}

//Border Type
$flpvi_btn_btype_value = sanitize_text_field(get_option('flpvi-btn-btype','solid'));
function flpvi_btn_btype_cb(){
	global $flpvi_btn_btype_value;
	echo '<input type="text" name="flpvi-btn-btype" value="'.esc_attr($flpvi_btn_btype_value).'" >';
}

//Border Size
$flpvi_btn_bs_value = sanitize_text_field(get_option('flpvi-btn-bs',' '));
function flpvi_btn_bs_cb(){
	global $flpvi_btn_bs_value;
	echo '<input type="text" name="flpvi-btn-bs" value="'.esc_attr($flpvi_btn_bs_value).'">';
}

// Border radius
$flpvi_btn_bors_value = sanitize_text_field(get_option('flpvi-btn-bors','4'));
function flpvi_btn_bors(){
	global $flpvi_btn_bors_value;
	echo '<input type="text" name="flpvi-btn-bors" value="'.esc_attr($flpvi_btn_bors_value).'" >';
}

//Border Color
$flpvi_btn_bc_value = sanitize_text_field(get_option('flpvi-btn-bc',' '));
function flpvi_btn_bc_cb(){
	global $flpvi_btn_bc_value;
	echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-btn-bc" value="'.esc_attr($flpvi_btn_bc_value).'" >';
}

//Button icon color
$flpvi_btn_iconc_value = sanitize_text_field(get_option('flpvi-btn-iconc','white'));
function flpvi_btn_iconc_cb(){
	global $flpvi_btn_iconc_value;
	echo '<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-btn-iconc" value="'.esc_attr($flpvi_btn_iconc_value).'" >';
}
//------ General style input start

//------ Breadcrumb style input start
// Alignment
$flpvi_breadalign_value = sanitize_text_field( get_option('flpvi-breadalign','woocommerce_before_shop_loop_item_title'));
function flpvi_breadalign_fld(){
	global $flpvi_breadalign_value;
	?>
	<select name="flpvi-breadalign" class="flpvi-input" id="flpvi-breadalign">
		<option value=""><?php echo esc_html__('Default','flexi-post-view'); ?></option>
		<?php $left = 'left'; ?>
		<option value="<?php echo esc_html($left) ?>" <?php selected($flpvi_breadalign_value,$left); ?>><?php echo esc_html__('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo esc_html($center) ?>" <?php selected($flpvi_breadalign_value,$center); ?>><?php echo esc_html__('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo esc_html($right) ?>" <?php selected($flpvi_breadalign_value,$right); ?>><?php echo esc_html__('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_text_color_value = sanitize_text_field(get_option('flpvi-text-color-control')); // add a default color using comma
function flpvi_text_color_fld(){
	global $flpvi_text_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-text-color-control" id="flpvi-text-color-control" value="'.esc_attr($flpvi_text_color_value).'" >';
}
// crnttext Color
$flpvi_crnttext_color_value = sanitize_text_field(get_option('flpvi-crnttext-color-control')); // add a default color using comma
function flpvi_crnttext_color_fld(){
	global $flpvi_crnttext_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-crnttext-color-control" id="flpvi-crnttext-color-control" value="'.esc_attr($flpvi_crnttext_color_value).'" >';
}
// BG Color
$flpvi_text_bgcolor_value = sanitize_text_field(get_option('flpvi-text-bgcolor-control'));
function flpvi_text_bgcolor_fld(){
	global $flpvi_text_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-text-bgcolor-control" id="flpvi-text-bgcolor-control" value="'.esc_attr($flpvi_text_bgcolor_value).'" >';
}
// Size
$flpvi_breadcrumb_size_value = sanitize_text_field(get_option('flpvi-breadcrumb-size-control'));
function flpvi_breadcrumb_size_fld(){
	global $flpvi_breadcrumb_size_value;
	echo '<input type="text" name="flpvi-breadcrumb-size-control" id="flpvi-breadcrumb-size-control" value="'.esc_attr($flpvi_breadcrumb_size_value).'" placeholder="0px">';
}
// padding
$flpvi_breadcrumb_padding_value = sanitize_text_field(get_option('flpvi-breadcrumb-padding-control'));
function flpvi_breadcrumb_padding_fld(){
	global $flpvi_breadcrumb_padding_value;
	echo '<input type="text" name="flpvi-breadcrumb-padding-control" id="flpvi-breadcrumb-padding-control" value="'.esc_attr($flpvi_breadcrumb_padding_value).'" placeholder="0px">';
}
// margin
$flpvi_breadcrumb_margin_value = sanitize_text_field(get_option('flpvi-breadcrumb-margin-control'));
function flpvi_breadcrumb_margin_fld(){
	global $flpvi_breadcrumb_margin_value;
	echo '<input type="text" name="flpvi-breadcrumb-margin-control" id="flpvi-breadcrumb-margin-control" value="'.esc_attr($flpvi_breadcrumb_margin_value).'"  placeholder="0px">';
}
// font familly
$flpvi_brdcmb_slctfntfmly_value = sanitize_text_field( get_option('flpvi-fontfamilly'));
function flpvi_fontfamilly_cb(){
	global $flpvi_brdcmb_slctfntfmly_value,$all_fonts;
    echo '<div class="wrap">';
		echo '<select id="flpvi-fontfamilly" name="flpvi-fontfamilly">';
			foreach($all_fonts as $font_slug => $font_title){
				echo '<option value="'.esc_attr($font_slug).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($font_slug)).'>'.esc_html($font_title).'</option>';
			}
		echo '</select>';
    echo '</div>';
}
// Breadcrumb hover style input
// Color
$flpvi_breadcrumb_hover_color_value = sanitize_text_field(get_option('flpvi-breadcrumb-hover-color-control')); // add a default color using comma
function flpvi_breadcrumb_hover_color_fld(){
	global $flpvi_breadcrumb_hover_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-breadcrumb-hover-color-control" id="flpvi-breadcrumb-hover-color-control" value="'.esc_attr($flpvi_breadcrumb_hover_color_value).'" >';
}
// BG Color
$flpvi_breadcrumb_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-breadcrumb-hover-bgcolor-control'));
function flpvi_breadcrumb_hover_bgcolor_fld(){
	global $flpvi_breadcrumb_hover_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-breadcrumb-hover-bgcolor-control" id="flpvi-breadcrumb-hover-bgcolor-control" value="'.esc_attr($flpvi_breadcrumb_hover_bgcolor_value).'" >';
}
// Size
$flpvi_breadcrumb_hover_size_value = sanitize_text_field(get_option('flpvi-breadcrumb-hover-size-control'));
function flpvi_breadcrumb_hover_size_fld(){
	global $flpvi_breadcrumb_hover_size_value;
	echo '<input type="text" name="flpvi-breadcrumb-hover-size-control" id="flpvi-breadcrumb-hover-size-control" value="'.esc_attr($flpvi_breadcrumb_hover_size_value).'"  placeholder="0px">';
}
//------ Breadcrumb style input end

//------ Stock or Not style input start
// Alignment
$flpvi_stockornotalign_value = sanitize_text_field( get_option('flpvi-stockornotalign','woocommerce_before_shop_loop_item_title'));
function flpvi_stockornotalign_fld(){
	global $flpvi_stockornotalign_value;
	?>
	<select name="flpvi-stockornotalign" class="flpvi-input" id="flpvi-stockornotalign">
		<option value=""><?php echo esc_html__('Default','flexi-post-view'); ?></option>
		<?php $left = 'left'; ?>
		<option value="<?php echo esc_html($left) ?>" <?php selected($flpvi_stockornotalign_value,$left); ?>><?php echo esc_html__('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo esc_html($center) ?>" <?php selected($flpvi_stockornotalign_value,$center); ?>><?php echo esc_html__('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo esc_html($right) ?>" <?php selected($flpvi_stockornotalign_value,$right); ?>><?php echo esc_html__('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_stockornot_color_value = sanitize_text_field(get_option('flpvi-stockornot-color-control')); // add a default color using comma
function flpvi_stockornot_color_fld(){
	global $flpvi_stockornot_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-stockornot-color-control" id="flpvi-stockornot-color-control" value="'.esc_attr($flpvi_stockornot_color_value).'" >';
}
// BG Color
$flpvi_stockornot_bgcolor_value = sanitize_text_field(get_option('flpvi-stockornot-bgcolor-control'));
function flpvi_stockornot_bgcolor_fld(){
	global $flpvi_stockornot_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-stockornot-bgcolor-control" id="flpvi-stockornot-bgcolor-control" value="'.esc_attr($flpvi_stockornot_bgcolor_value).'" >';
}
// Size
$flpvi_stockornot_size_value = sanitize_text_field(get_option('flpvi-stockornot-size-control'));
function flpvi_stockornot_size_fld(){
	global $flpvi_stockornot_size_value;
	echo '<input type="text" name="flpvi-stockornot-size-control" id="flpvi-stockornot-size-control" value="'.esc_attr($flpvi_stockornot_size_value).'"  placeholder="0px">';
}
// padding
$flpvi_stockornot_padding_value = sanitize_text_field(get_option('flpvi-stockornot-padding-control'));
function flpvi_stockornot_padding_fld(){
	global $flpvi_stockornot_padding_value;
	echo '<input type="text" name="flpvi-stockornot-padding-control" id="flpvi-stockornot-padding-control" value="'.esc_attr($flpvi_stockornot_padding_value).'" placeholder="0px">';
}
// margin
$flpvi_stockornot_margin_value = sanitize_text_field(get_option('flpvi-stockornot-margin-control'));
function flpvi_stockornot_margin_fld(){
	global $flpvi_stockornot_margin_value;
	echo '<input type="text" name="flpvi-stockornot-margin-control"  id="flpvi-stockornot-margin-control" value="'.esc_attr($flpvi_stockornot_margin_value).'"  placeholder="0px">';
}
// font familly
$flpvi_stockornot_slctfntfmly_value = sanitize_text_field( get_option('flpvi-stockornot-fontfamilly-control'));
function flpvi_stockornot_fontfamilly_fld(){
	global $flpvi_stockornot_slctfntfmly_value,$all_fonts;
    echo '<div class="wrap">';
		echo '<select id="flpvi-stockornot-fontfamilly-control" name="flpvi-stockornot-fontfamilly-control">';
			foreach($all_fonts as $font_slug => $font_title){
				echo '<option value="'.esc_attr($font_slug).'" '.selected(esc_attr($flpvi_stockornot_slctfntfmly_value),esc_attr($font_slug)).'>'.esc_html($font_title).'</option>';
			}
		echo '</select>';
    echo '</div>';
}

// Stock or Not hover style input
// Color
$flpvi_stockornot_hover_color_value = sanitize_text_field(get_option('flpvi-stockornot-hover-color-control')); // add a default color using comma
function flpvi_stockornot_hover_color_fld(){
	global $flpvi_stockornot_hover_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-stockornot-hover-color-control" id="flpvi-stockornot-hover-color-control" value="'.esc_attr($flpvi_stockornot_hover_color_value).'" >';
}
// BG Color
$flpvi_stockornot_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-stockornot-hover-bgcolor-control'));
function flpvi_stockornot_hover_bgcolor_fld(){
	global $flpvi_stockornot_hover_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-stockornot-hover-bgcolor-control" id="flpvi-stockornot-hover-bgcolor-control" value="'.esc_attr($flpvi_stockornot_hover_bgcolor_value).'" >';
}
// Size
$flpvi_stockornot_hover_size_value = sanitize_text_field(get_option('flpvi-stockornot-hover-size-control'));
function flpvi_stockornot_hover_size_fld(){
	global $flpvi_stockornot_hover_size_value;
	echo '<input type="text" name="flpvi-stockornot-hover-size-control" id="flpvi-stockornot-hover-size-control" value="'.esc_attr($flpvi_stockornot_hover_size_value).'"  placeholder="0px">';
}
//------ Stock or Not style input end

//------ Sale Note style inputs start
// Alignment
$flpvi_salenotealign_value = sanitize_text_field( get_option('flpvi-salenotealign','woocommerce_before_shop_loop_item_title'));
function flpvi_salenotealign_fld(){
	global $flpvi_salenotealign_value;
	?>
	<select name="flpvi-salenotealign" class="flpvi-input" id="flpvi-salenotealign">
		<option value=""><?php echo esc_html__('Default','flexi-post-view'); ?></option>
		<?php $left = 'left'; ?>
		<option value="<?php echo esc_html($left) ?>" <?php selected($flpvi_salenotealign_value,$left); ?>><?php echo esc_html__('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo esc_html($center) ?>" <?php selected($flpvi_salenotealign_value,$center); ?>><?php echo esc_html__('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo esc_html($right) ?>" <?php selected($flpvi_salenotealign_value,$right); ?>><?php echo esc_html__('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_salenote_color_value = sanitize_text_field(get_option('flpvi-salenote-color-control')); // add a default color using comma
function flpvi_salenote_color_fld(){
	global $flpvi_salenote_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-salenote-color-control" id="flpvi-salenote-color-control" value="'.esc_attr($flpvi_salenote_color_value).'" >';
}
// BG Color
$flpvi_salenote_bgcolor_value = sanitize_text_field(get_option('flpvi-salenote-bgcolor-control'));
function flpvi_salenote_bgcolor_fld(){
	global $flpvi_salenote_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-salenote-bgcolor-control" id="flpvi-salenote-bgcolor-control" value="'.esc_attr($flpvi_salenote_bgcolor_value).'" >';
}
// Size
$flpvi_salenote_size_value = sanitize_text_field(get_option('flpvi-salenote-size-control'));
function flpvi_salenote_size_fld(){
	global $flpvi_salenote_size_value;
	echo '<input type="text" name="flpvi-salenote-size-control" id="flpvi-salenote-size-control" value="'.esc_attr($flpvi_salenote_size_value).'"  placeholder="0px">';
}
// padding
$flpvi_salenote_padding_value = sanitize_text_field(get_option('flpvi-salenote-padding-control'));
function flpvi_salenote_padding_fld(){
	global $flpvi_salenote_padding_value;
	echo '<input type="text" name="flpvi-salenote-padding-control" id="flpvi-salenote-padding-control" value="'.esc_attr($flpvi_salenote_padding_value).'" placeholder="0px">';
}
// margin
$flpvi_salenote_margin_value = sanitize_text_field(get_option('flpvi-salenote-margin-control'));
function flpvi_salenote_margin_fld(){
	global $flpvi_salenote_margin_value;
	echo '<input type="text" name="flpvi-salenote-margin-control" id="flpvi-salenote-margin-control" value="'.esc_attr($flpvi_salenote_margin_value).'"  placeholder="0px">';
}

// Sale Note hover style inputs
// Color
$flpvi_salenote_hover_color_value = sanitize_text_field(get_option('flpvi-salenote-hover-color-control')); // add a default color using comma
function flpvi_salenote_hover_color_fld(){
	global $flpvi_salenote_hover_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-salenote-hover-color-control" id="flpvi-salenote-hover-color-control" value="'.esc_attr($flpvi_salenote_hover_color_value).'" >';
}
// BG Color
$flpvi_salenote_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-salenote-hover-bgcolor-control'));
function flpvi_salenote_hover_bgcolor_fld(){
	global $flpvi_salenote_hover_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-salenote-hover-bgcolor-control" id="flpvi-salenote-hover-bgcolor-control" value="'.esc_attr($flpvi_salenote_hover_bgcolor_value).'" >';
}
// Size
$flpvi_salenote_hover_size_value = sanitize_text_field(get_option('flpvi-salenote-hover-size-control'));
function flpvi_salenote_hover_size_fld(){
	global $flpvi_salenote_hover_size_value;
	echo '<input type="text" name="flpvi-salenote-hover-size-control" id="flpvi-salenote-hover-size-control" value="'.esc_attr($flpvi_salenote_hover_size_value).'"  placeholder="0px">';
}
//------ Sale Note style inputs end

//------ Featured img style inputs end
// Alignment
$flpvi_fetuimg_align_value = sanitize_text_field( get_option('flpvi-fetuimg-align','woocommerce_before_shop_loop_item_title'));
function flpvi_fetuimg_align_fld(){
	global $flpvi_fetuimg_align_value;
	?>
	<select name="flpvi-fetuimg-align" class="flpvi-input" id="flpvi-fetuimg-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo esc_html($left) ?>" <?php selected($flpvi_fetuimg_align_value,$left); ?>><?php echo esc_html__('Left','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo esc_html($right) ?>" <?php selected($flpvi_fetuimg_align_value,$right); ?>><?php echo esc_html__('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Border Check
$flpvi_fetuimg_border_check_value = sanitize_text_field(get_option('flpvi-fetuimg-border-control','false'));
function flpvi_fetuimg_border_fld(){
	global $flpvi_fetuimg_border_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-fetuimg-border-control" name="flpvi-fetuimg-border-control" value="true" '.checked('true',$flpvi_fetuimg_border_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// Border Typee
$flpvi_fetuimg_brdrtype_value = sanitize_text_field(get_option('flpvi-fetuimg-brdrtype-control'));
function flpvi_fetuimg_brdrtype_fld(){
	global $flpvi_fetuimg_brdrtype_value;
	echo'<input type="text" class="color-field" name="flpvi-fetuimg-brdrtype-control" id="flpvi-fetuimg-brdrtype-control" value="'.esc_attr($flpvi_fetuimg_brdrtype_value).'" >';
}
// Border color
$flpvi_fetuimg_border_clr_check_value = sanitize_text_field(get_option('flpvi-fetuimg-border-clr-control','false'));
function flpvi_fetuimg_border_clr_fld(){
	global $flpvi_fetuimg_border_clr_check_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-fetuimg-border-clr-control" id="flpvi-fetuimg-border-clr-control" value="'.esc_attr($flpvi_fetuimg_border_clr_check_value).'" >';
}
// Border radius
$flpvi_fetuimg_bdrrds_value = sanitize_text_field(get_option('flpvi-fetuimg-bdrrds-control'));
function flpvi_fetuimg_bdrrds_fld(){
	global $flpvi_fetuimg_bdrrds_value;
	echo '<input type="text" name="flpvi-fetuimg-bdrrds-control" value="'.esc_attr($flpvi_fetuimg_bdrrds_value).'"  placeholder="0px">';
}
// padding
$flpvi_fetuimg_padding_value = sanitize_text_field(get_option('flpvi-fetuimg-padding-control'));
function flpvi_fetuimg_padding_fld(){
	global $flpvi_fetuimg_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-fetuimg-padding-control" value="'.esc_attr($flpvi_fetuimg_padding_value).'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_fetuimg_margin_value = sanitize_text_field(get_option('flpvi-fetuimg-margin-control'));
function flpvi_fetuimg_margin_fld(){
	global $flpvi_fetuimg_margin_value;
	echo '<input type="text" name="flpvi-fetuimg-margin-control" value="'.esc_attr($flpvi_fetuimg_margin_value).'"  placeholder="Four values allowed">';
}
//------ Featured img style inputs end

//------ Gallery imgs style inputs end
// Border Check
$flpvi_gllimg_border_check_value = sanitize_text_field(get_option('flpvi-gllimg-border-control','false'));
function flpvi_gllimg_border_fld(){
	global $flpvi_gllimg_border_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-gllimg-border-control" name="flpvi-gllimg-border-control" value="true" '.checked('true',$flpvi_gllimg_border_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// Border color
$flpvi_gllimg_border_clr_check_value = sanitize_text_field(get_option('flpvi-gllimg-border-clr-control','false'));
function flpvi_gllimg_border_clr_fld(){
	global $flpvi_gllimg_border_clr_check_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-gllimg-border-clr-control" id="flpvi-gllimg-border-clr-control" value="'.esc_attr($flpvi_gllimg_border_clr_check_value).'" >';
}
// Border Typee
$flpvi_gllimg_brdrtype_value = sanitize_text_field(get_option('flpvi-gllimg-brdrtype-control'));
function flpvi_gllimg_brdrtype_fld(){
	global $flpvi_gllimg_brdrtype_value;
	echo'<input type="text" class="color-field" name="flpvi-gllimg-brdrtype-control" id="flpvi-gllimg-brdrtype-control" value="'.esc_attr($flpvi_gllimg_brdrtype_value).'" >';
}
// Border radius
$flpvi_gllimg_bdrrds_value = sanitize_text_field(get_option('flpvi-gllimg-bdrrds-control'));
function flpvi_gllimg_bdrrds_fld(){
	global $flpvi_gllimg_bdrrds_value;
	echo '<input type="text" name="flpvi-gllimg-bdrrds-control" value="'.esc_attr($flpvi_gllimg_bdrrds_value).'"  placeholder="0px">';
}
// padding
$flpvi_gllimg_padding_value = sanitize_text_field(get_option('flpvi-gllimg-padding-control'));
function flpvi_gllimg_padding_fld(){
	global $flpvi_gllimg_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-gllimg-padding-control" value="'.esc_attr($flpvi_gllimg_padding_value).'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_gllimg_margin_value = sanitize_text_field(get_option('flpvi-gllimg-margin-control'));
function flpvi_gllimg_margin_fld(){
	global $flpvi_gllimg_margin_value;
	echo '<input type="text" name="flpvi-gllimg-margin-control" value="'.esc_attr($flpvi_gllimg_margin_value).'"  placeholder="Four values allowed">';
}
//------ Gallery imgs style inputs end

//------ Post Title style input start
// Alignment
$flpvi_producttitle_align_value = sanitize_text_field( get_option('flpvi-producttitle-align','woocommerce_before_shop_loop_item_title'));
function flpvi_producttitle_align_fld(){
	global $flpvi_producttitle_align_value;
	?>
	<select name="flpvi-producttitle-align" class="flpvi-input" id="flpvi-producttitle-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo esc_html($left) ?>" <?php selected($flpvi_producttitle_align_value,$left); ?>><?php echo esc_html__('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo esc_html($center) ?>" <?php selected($flpvi_producttitle_align_value,$center); ?>><?php echo esc_html__('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo esc_html($right) ?>" <?php selected($flpvi_producttitle_align_value,$right); ?>><?php echo esc_html__('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_producttitle_color_value = sanitize_text_field(get_option('flpvi-producttitle-color-control')); // add a default color using comma
function flpvi_producttitle_color_fld(){
	global $flpvi_producttitle_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-producttitle-color-control" id="flpvi-producttitle-color-control" value="'.esc_attr($flpvi_producttitle_color_value).'" >';
}
// BG Color
$flpvi_producttitle_bgcolor_value = sanitize_text_field(get_option('flpvi-producttitle-bgcolor-control'));
function flpvi_producttitle_bgcolor_fld(){
	global $flpvi_producttitle_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-producttitle-bgcolor-control" id="flpvi-producttitle-color-bgcontrol" value="'.esc_attr($flpvi_producttitle_bgcolor_value).'" >';
}
// Size
$flpvi_producttitle_size_value = sanitize_text_field(get_option('flpvi-producttitle-size-control'));
function flpvi_producttitle_size_fld(){
	global $flpvi_producttitle_size_value;
	echo '<input type="text" name="flpvi-producttitle-size-control" value="'.esc_attr($flpvi_producttitle_size_value).'"  placeholder="0px">';
}
// padding
$flpvi_producttitle_padding_value = sanitize_text_field(get_option('flpvi-producttitle-padding-control'));
function flpvi_producttitle_padding_fld(){
	global $flpvi_producttitle_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-producttitle-padding-control" value="'.esc_attr($flpvi_producttitle_padding_value).'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_producttitle_margin_value = sanitize_text_field(get_option('flpvi-producttitle-margin-control'));
function flpvi_producttitle_margin_fld(){
	global $flpvi_producttitle_margin_value;
	echo '<input type="text" name="flpvi-producttitle-margin-control" value="'.esc_attr($flpvi_producttitle_margin_value).'"  placeholder="Four values allowed">';
}
// font familly
function flpvi_producttitle_fontfamilly_cb()
{
}
// Post Title hover style input
// Color
$flpvi_producttitle_hover_color_value = sanitize_text_field(get_option('flpvi-producttitle-hover-color-control')); // add a default color using comma
function flpvi_producttitle_hover_color_fld(){
	global $flpvi_producttitle_hover_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-producttitle-hover-color-control" id="flpvi-producttitle-hover-color-control" value="'.esc_attr($flpvi_producttitle_hover_color_value).'" >';
}
// BG Color
$flpvi_producttitle_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-producttitle-hover-bgcolor-control'));
function flpvi_producttitle_hover_bgcolor_fld(){
	global $flpvi_producttitle_hover_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-producttitle-hover-bgcolor-control" id="flpvi-producttitle-hover-color-bgcontrol" value="'.esc_attr($flpvi_producttitle_hover_bgcolor_value).'" >';
}
// Size
$flpvi_producttitle_hover_size_value = sanitize_text_field(get_option('flpvi-producttitle-hover-size-control'));
function flpvi_producttitle_hover_size_fld(){
	global $flpvi_producttitle_hover_size_value;
	echo '<input type="text" name="flpvi-producttitle-hover-size-control" value="'.esc_attr($flpvi_producttitle_hover_size_value).'"  placeholder="0px">';
}
//------ Post Title style input end

//------ Post Reg Price style input start
// Alignment
$flpvi_productregprice_align_value = sanitize_text_field( get_option('flpvi-productregprice-align','woocommerce_before_shop_loop_item_title'));
function flpvi_productregprice_align_fld(){
	global $flpvi_productregprice_align_value;
	?>
	<select name="flpvi-productregprice-align" class="flpvi-input" id="flpvi-productregprice-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo esc_html($left) ?>" <?php selected($flpvi_productregprice_align_value,$left); ?>><?php echo esc_html__('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo esc_html($center) ?>" <?php selected($flpvi_productregprice_align_value,$center); ?>><?php echo esc_html__('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo esc_html($right) ?>" <?php selected($flpvi_productregprice_align_value,$right); ?>><?php echo esc_html__('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_productregprice_color_value = sanitize_text_field(get_option('flpvi-productregprice-color-control')); // add a default color using comma
function flpvi_productregprice_color_fld(){
	global $flpvi_productregprice_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-productregprice-color-control" id="flpvi-productregprice-color-control" value="'.esc_attr($flpvi_productregprice_color_value).'" >';
}
// BG Color
$flpvi_productregprice_bgcolor_value = sanitize_text_field(get_option('flpvi-productregprice-bgcolor-control'));
function flpvi_productregprice_bgcolor_fld(){
	global $flpvi_productregprice_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-productregprice-bgcolor-control" id="flpvi-productregprice-color-bgcontrol" value="'.esc_attr($flpvi_productregprice_bgcolor_value).'" >';
}
// Size
$flpvi_productregprice_size_value = sanitize_text_field(get_option('flpvi-productregprice-size-control'));
function flpvi_productregprice_size_fld(){
	global $flpvi_productregprice_size_value;
	echo '<input type="text" name="flpvi-productregprice-size-control" value="'.esc_attr($flpvi_productregprice_size_value).'"  placeholder="0px">';
}
// padding
$flpvi_productregprice_padding_value = sanitize_text_field(get_option('flpvi-productregprice-padding-control'));
function flpvi_productregprice_padding_fld(){
	global $flpvi_productregprice_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-productregprice-padding-control" value="'.esc_attr($flpvi_productregprice_padding_value).'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_productregprice_margin_value = sanitize_text_field(get_option('flpvi-productregprice-margin-control'));
function flpvi_productregprice_margin_fld(){
	global $flpvi_productregprice_margin_value;
	echo '<input type="text" name="flpvi-productregprice-margin-control" value="'.esc_attr($flpvi_productregprice_margin_value).'"  placeholder="Four values allowed">';
}
// font familly
function flpvi_productregprice_fontfamilly_cb()
{
}
// Post Title hover style input
// Color
$flpvi_productregprice_hover_color_value = sanitize_text_field(get_option('flpvi-productregprice-hover-color-control')); // add a default color using comma
function flpvi_productregprice_hover_color_fld(){
	global $flpvi_productregprice_hover_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-productregprice-hover-color-control" id="flpvi-productregprice-hover-color-control" value="'.esc_attr($flpvi_productregprice_hover_color_value).'" >';
}
// BG Color
$flpvi_productregprice_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-productregprice-hover-bgcolor-control'));
function flpvi_productregprice_hover_bgcolor_fld(){
	global $flpvi_productregprice_hover_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-productregprice-hover-bgcolor-control" id="flpvi-productregprice-hover-color-bgcontrol" value="'.esc_attr($flpvi_productregprice_hover_bgcolor_value).'" >';
}
// Size
$flpvi_productregprice_hover_size_value = sanitize_text_field(get_option('flpvi-productregprice-hover-size-control'));
function flpvi_productregprice_hover_size_fld(){
	global $flpvi_productregprice_hover_size_value;
	echo '<input type="text" name="flpvi-productregprice-hover-size-control" value="'.esc_attr($flpvi_productregprice_hover_size_value).'"  placeholder="0px">';
}
//------ Post Reg Price style input end

//------ Post Sale Price style input start
// Color
$flpvi_productsaleprice_color_value = sanitize_text_field(get_option('flpvi-productsaleprice-color-control')); // add a default color using comma
function flpvi_productsaleprice_color_fld(){
	global $flpvi_productsaleprice_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-productsaleprice-color-control" id="flpvi-productsaleprice-color-control" value="'.esc_attr($flpvi_productsaleprice_color_value).'" >';
}
// BG Color
$flpvi_productsaleprice_bgcolor_value = sanitize_text_field(get_option('flpvi-productsaleprice-bgcolor-control'));
function flpvi_productsaleprice_bgcolor_fld(){
	global $flpvi_productsaleprice_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-productsaleprice-bgcolor-control" id="flpvi-productsaleprice-color-bgcontrol" value="'.esc_attr($flpvi_productsaleprice_bgcolor_value).'" >';
}
// Size
$flpvi_productsaleprice_size_value = sanitize_text_field(get_option('flpvi-productsaleprice-size-control'));
function flpvi_productsaleprice_size_fld(){
	global $flpvi_productsaleprice_size_value;
	echo '<input type="text" name="flpvi-productsaleprice-size-control" value="'.esc_attr($flpvi_productsaleprice_size_value).'"  placeholder="0px">';
}
// padding
$flpvi_productsaleprice_padding_value = sanitize_text_field(get_option('flpvi-productsaleprice-padding-control'));
function flpvi_productsaleprice_padding_fld(){
	global $flpvi_productsaleprice_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-productsaleprice-padding-control" value="'.esc_attr($flpvi_productsaleprice_padding_value).'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_productsaleprice_margin_value = sanitize_text_field(get_option('flpvi-productsaleprice-margin-control'));
function flpvi_productsaleprice_margin_fld(){
	global $flpvi_productsaleprice_margin_value;
	echo '<input type="text" name="flpvi-productsaleprice-margin-control" value="'.esc_attr($flpvi_productsaleprice_margin_value).'"  placeholder="Four values allowed">';
}
// Post sale price hover style input
// Color
$flpvi_productsaleprice_hover_color_value = sanitize_text_field(get_option('flpvi-productsaleprice-hover-color-control')); // add a default color using comma
function flpvi_productsaleprice_hover_color_fld(){
	global $flpvi_productsaleprice_hover_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-productsaleprice-hover-color-control" id="flpvi-productsaleprice-hover-color-control" value="'.esc_attr($flpvi_productsaleprice_hover_color_value).'" >';
}
// BG Color
$flpvi_productsaleprice_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-productsaleprice-hover-bgcolor-control'));
function flpvi_productsaleprice_hover_bgcolor_fld(){
	global $flpvi_productsaleprice_hover_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-productsaleprice-hover-bgcolor-control" id="flpvi-productsaleprice-hover-color-bgcontrol" value="'.esc_attr($flpvi_productsaleprice_hover_bgcolor_value).'" >';
}
// Size
$flpvi_productsaleprice_hover_size_value = sanitize_text_field(get_option('flpvi-productsaleprice-hover-size-control'));
function flpvi_productsaleprice_hover_size_fld(){
	global $flpvi_productsaleprice_hover_size_value;
	echo '<input type="text" name="flpvi-productsaleprice-hover-size-control" value="'.esc_attr($flpvi_productsaleprice_hover_size_value).'"  placeholder="0px">';
}
//------ Post Sale Price style input end

//------ Post Categories style input start
// Alignment
$flpvi_productcategory_align_value = sanitize_text_field( get_option('flpvi-productcategory-align','woocommerce_before_shop_loop_item_title'));
function flpvi_productcategory_align_fld(){
	global $flpvi_productcategory_align_value;
	?>
	<select name="flpvi-productcategory-align" class="flpvi-input" id="flpvi-productcategory-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo esc_html($left) ?>" <?php selected($flpvi_productcategory_align_value,$left); ?>><?php echo esc_html__('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo esc_html($center) ?>" <?php selected($flpvi_productcategory_align_value,$center); ?>><?php echo esc_html__('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo esc_html($right) ?>" <?php selected($flpvi_productcategory_align_value,$right); ?>><?php echo esc_html__('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_productcategory_color_value = sanitize_text_field(get_option('flpvi-productcategory-color-control')); // add a default color using comma
function flpvi_productcategory_color_fld(){
	global $flpvi_productcategory_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-productcategory-color-control" id="flpvi-productcategory-color-control" value="'.esc_attr($flpvi_productcategory_color_value).'" >';
}
// BG Color
$flpvi_productcategory_bgcolor_value = sanitize_text_field(get_option('flpvi-productcategory-bgcolor-control'));
function flpvi_productcategory_bgcolor_fld(){
	global $flpvi_productcategory_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-productcategory-bgcolor-control" id="flpvi-productcategory-color-bgcontrol" value="'.esc_attr($flpvi_productcategory_bgcolor_value).'" >';
}
// Size
$flpvi_productcategory_size_value = sanitize_text_field(get_option('flpvi-productcategory-size-control'));
function flpvi_productcategory_size_fld(){
	global $flpvi_productcategory_size_value;
	echo '<input type="text" name="flpvi-productcategory-size-control" value="'.esc_attr($flpvi_productcategory_size_value).'"  placeholder="0px">';
}
// padding
$flpvi_productcategory_padding_value = sanitize_text_field(get_option('flpvi-productcategory-padding-control'));
function flpvi_productcategory_padding_fld(){
	global $flpvi_productcategory_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-productcategory-padding-control" value="'.esc_attr($flpvi_productcategory_padding_value).'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_productcategory_margin_value = sanitize_text_field(get_option('flpvi-productcategory-margin-control'));
function flpvi_productcategory_margin_fld(){
	global $flpvi_productcategory_margin_value;
	echo '<input type="text" name="flpvi-productcategory-margin-control" value="'.esc_attr($flpvi_productcategory_margin_value).'"  placeholder="Four values allowed">';
}
// font familly
function flpvi_productcategory_fontfamilly_cb()
{
}
// Post Categories hover style input
// Color
$flpvi_productcategory_hover_color_value = sanitize_text_field(get_option('flpvi-productcategory-hover-color-control')); // add a default color using comma
function flpvi_productcategory_hover_color_fld(){
	global $flpvi_productcategory_hover_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-productcategory-hover-color-control" id="flpvi-productcategory-hover-color-control" value="'.esc_attr($flpvi_productcategory_hover_color_value).'" >';
}
// BG Color
$flpvi_productcategory_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-productcategory-hover-bgcolor-control'));
function flpvi_productcategory_hover_bgcolor_fld(){
	global $flpvi_productcategory_hover_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-productcategory-hover-bgcolor-control" id="flpvi-productcategory-hover-color-bgcontrol" value="'.esc_attr($flpvi_productcategory_hover_bgcolor_value).'" >';
}
// Size
$flpvi_productcategory_hover_size_value = sanitize_text_field(get_option('flpvi-productcategory-hover-size-control'));
function flpvi_productcategory_hover_size_fld(){
	global $flpvi_productcategory_hover_size_value;
	echo '<input type="text" name="flpvi-productcategory-hover-size-control" value="'.esc_attr($flpvi_productcategory_hover_size_value).'"  placeholder="0px">';
}
//------ Post Categories style input end

//------ Post Tags style input start
// Alignment
$flpvi_producttags_align_value = sanitize_text_field( get_option('flpvi-producttags-align','woocommerce_before_shop_loop_item_title'));
function flpvi_producttags_align_fld(){
	global $flpvi_producttags_align_value;
	?>
	<select name="flpvi-producttags-align" class="flpvi-input" id="flpvi-producttags-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo esc_html($left) ?>" <?php selected($flpvi_producttags_align_value,$left); ?>><?php echo esc_html__('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo esc_html($center) ?>" <?php selected($flpvi_producttags_align_value,$center); ?>><?php echo esc_html__('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo esc_html($right) ?>" <?php selected($flpvi_producttags_align_value,$right); ?>><?php echo esc_html__('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_producttags_color_value = sanitize_text_field(get_option('flpvi-producttags-color-control')); // add a default color using comma
function flpvi_producttags_color_fld(){
	global $flpvi_producttags_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-producttags-color-control" id="flpvi-producttags-color-control" value="'.esc_attr($flpvi_producttags_color_value).'" >';
}
// BG Color
$flpvi_producttags_bgcolor_value = sanitize_text_field(get_option('flpvi-producttags-bgcolor-control'));
function flpvi_producttags_bgcolor_fld(){
	global $flpvi_producttags_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-producttags-bgcolor-control" id="flpvi-producttags-color-bgcontrol" value="'.esc_attr($flpvi_producttags_bgcolor_value).'" >';
}
// Size
$flpvi_producttags_size_value = sanitize_text_field(get_option('flpvi-producttags-size-control'));
function flpvi_producttags_size_fld(){
	global $flpvi_producttags_size_value;
	echo '<input type="text" name="flpvi-producttags-size-control" value="'.esc_attr($flpvi_producttags_size_value).'"  placeholder="0px">';
}
// padding
$flpvi_producttags_padding_value = sanitize_text_field(get_option('flpvi-producttags-padding-control'));
function flpvi_producttags_padding_fld(){
	global $flpvi_producttags_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-producttags-padding-control" value="'.esc_attr($flpvi_producttags_padding_value).'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_producttags_margin_value = sanitize_text_field(get_option('flpvi-producttags-margin-control'));
function flpvi_producttags_margin_fld(){
	global $flpvi_producttags_margin_value;
	echo '<input type="text" name="flpvi-producttags-margin-control" value="'.esc_attr($flpvi_producttags_margin_value).'"  placeholder="Four values allowed">';
}
// font familly
function flpvi_producttags_fontfamilly_cb()
{
}
// Post Tags hover style input
// Color
$flpvi_producttags_hover_color_value = sanitize_text_field(get_option('flpvi-producttags-hover-color-control')); // add a default color using comma
function flpvi_producttags_hover_color_fld(){
	global $flpvi_producttags_hover_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-producttags-hover-color-control" id="flpvi-producttags-hover-color-control" value="'.esc_attr($flpvi_producttags_hover_color_value).'" >';
}
// BG Color
$flpvi_producttags_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-producttags-hover-bgcolor-control'));
function flpvi_producttags_hover_bgcolor_fld(){
	global $flpvi_producttags_hover_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-producttags-hover-bgcolor-control" id="flpvi-producttags-hover-color-bgcontrol" value="'.esc_attr($flpvi_producttags_hover_bgcolor_value).'" >';
}
// Size
$flpvi_producttags_hover_size_value = sanitize_text_field(get_option('flpvi-producttags-hover-size-control'));
function flpvi_producttags_hover_size_fld(){
	global $flpvi_producttags_hover_size_value;
	echo '<input type="text" name="flpvi-producttags-hover-size-control" value="'.esc_attr($flpvi_producttags_hover_size_value).'"  placeholder="0px">';
}
//------ Post Tags style input end

// -------------********************** Related Post Style start
//------ Featured img style inputs end
// Alignment
$flpvi_relpro_fetuimg_align_value = sanitize_text_field( get_option('flpvi-relpro-fetuimg-align','woocommerce_before_shop_loop_item_title'));
function flpvi_relpro_fetuimg_align_fld(){
	global $flpvi_relpro_fetuimg_align_value;
	?>
	<select name="flpvi-relpro-fetuimg-align" class="flpvi-relpro-input" id="flpvi-relpro-fetuimg-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo esc_html($left) ?>" <?php selected($flpvi_relpro_fetuimg_align_value,$left); ?>><?php echo esc_html__('Left','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo esc_html($right) ?>" <?php selected($flpvi_relpro_fetuimg_align_value,$right); ?>><?php echo esc_html__('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Border Check
$flpvi_relpro_fetuimg_border_check_value = sanitize_text_field(get_option('flpvi-relpro-fetuimg-border-control','false'));
function flpvi_relpro_fetuimg_border_fld(){
	global $flpvi_relpro_fetuimg_border_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-relpro-fetuimg-border-control" name="flpvi-relpro-fetuimg-border-control" value="true" '.checked('true',$flpvi_relpro_fetuimg_border_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// Border Typee
$flpvi_relpro_fetuimg_brdrtype_value = sanitize_text_field(get_option('flpvi-relpro-fetuimg-brdrtype-control'));
function flpvi_relpro_fetuimg_brdrtype_fld(){
	global $flpvi_relpro_fetuimg_brdrtype_value;
	echo'<input type="text" class="color-field" name="flpvi-relpro-fetuimg-brdrtype-control" id="flpvi-relpro-fetuimg-brdrtype-control" value="'.esc_attr($flpvi_relpro_fetuimg_brdrtype_value).'" >';
}
// Border color
$flpvi_relpro_fetuimg_border_clr_check_value = sanitize_text_field(get_option('flpvi-relpro-fetuimg-border-clr-control','false'));
function flpvi_relpro_fetuimg_border_clr_fld(){
	global $flpvi_relpro_fetuimg_border_clr_check_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-fetuimg-border-clr-control" id="flpvi-relpro-fetuimg-border-clr-control" value="'.esc_attr($flpvi_relpro_fetuimg_border_clr_check_value).'" >';
}
// Border radius
$flpvi_relpro_fetuimg_bdrrds_value = sanitize_text_field(get_option('flpvi-relpro-fetuimg-bdrrds-control'));
function flpvi_relpro_fetuimg_bdrrds_fld(){
	global $flpvi_relpro_fetuimg_bdrrds_value;
	echo '<input type="text" name="flpvi-relpro-fetuimg-bdrrds-control" value="'.esc_attr($flpvi_relpro_fetuimg_bdrrds_value).'"  placeholder="0px">';
}
// padding
$flpvi_relpro_fetuimg_padding_value = sanitize_text_field(get_option('flpvi-relpro-fetuimg-padding-control'));
function flpvi_relpro_fetuimg_padding_fld(){
	global $flpvi_relpro_fetuimg_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-relpro-fetuimg-padding-control" value="'.esc_attr($flpvi_relpro_fetuimg_padding_value).'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_relpro_fetuimg_margin_value = sanitize_text_field(get_option('flpvi-relpro-fetuimg-margin-control'));
function flpvi_relpro_fetuimg_margin_fld(){
	global $flpvi_relpro_fetuimg_margin_value;
	echo '<input type="text" name="flpvi-relpro-fetuimg-margin-control" value="'.esc_attr($flpvi_relpro_fetuimg_margin_value).'"  placeholder="Four values allowed">';
}
//------ Featured img style inputs end

//------ Post Title style input start
// Alignment
$flpvi_relpro_producttitle_align_value = sanitize_text_field( get_option('flpvi-relpro-producttitle-align','woocommerce_before_shop_loop_item_title'));
function flpvi_relpro_producttitle_align_fld(){
	global $flpvi_relpro_producttitle_align_value;
	?>
	<select name="flpvi-relpro-producttitle-align" class="flpvi-relpro-input" id="flpvi-relpro-producttitle-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo esc_html($left) ?>" <?php selected($flpvi_relpro_producttitle_align_value,$left); ?>><?php echo esc_html__('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo esc_html($center) ?>" <?php selected($flpvi_relpro_producttitle_align_value,$center); ?>><?php echo esc_html__('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo esc_html($right) ?>" <?php selected($flpvi_relpro_producttitle_align_value,$right); ?>><?php echo esc_html__('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_relpro_producttitle_color_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-color-control')); // add a default color using comma
function flpvi_relpro_producttitle_color_fld(){
	global $flpvi_relpro_producttitle_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-producttitle-color-control" id="flpvi-relpro-producttitle-color-control" value="'.esc_attr($flpvi_relpro_producttitle_color_value).'" >';
}
// BG Color
$flpvi_relpro_producttitle_bgcolor_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-bgcolor-control'));
function flpvi_relpro_producttitle_bgcolor_fld(){
	global $flpvi_relpro_producttitle_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-producttitle-bgcolor-control" id="flpvi-relpro-producttitle-color-bgcontrol" value="'.esc_attr($flpvi_relpro_producttitle_bgcolor_value).'" >';
}
// Size
$flpvi_relpro_producttitle_size_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-size-control'));
function flpvi_relpro_producttitle_size_fld(){
	global $flpvi_relpro_producttitle_size_value;
	echo '<input type="text" name="flpvi-relpro-producttitle-size-control" value="'.esc_attr($flpvi_relpro_producttitle_size_value).'"  placeholder="0px">';
}
// padding
$flpvi_relpro_producttitle_padding_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-padding-control'));
function flpvi_relpro_producttitle_padding_fld(){
	global $flpvi_relpro_producttitle_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-relpro-producttitle-padding-control" value="'.esc_attr($flpvi_relpro_producttitle_padding_value).'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_relpro_producttitle_margin_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-margin-control'));
function flpvi_relpro_producttitle_margin_fld(){
	global $flpvi_relpro_producttitle_margin_value;
	echo '<input type="text" name="flpvi-relpro-producttitle-margin-control" value="'.esc_attr($flpvi_relpro_producttitle_margin_value).'"  placeholder="Four values allowed">';
}
// font familly
function flpvi_relpro_producttitle_fontfamilly_cb()
{
}
// Post Title hover style input
// Color
$flpvi_relpro_producttitle_hover_color_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-hover-color-control')); // add a default color using comma
function flpvi_relpro_producttitle_hover_color_fld(){
	global $flpvi_relpro_producttitle_hover_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-producttitle-hover-color-control" id="flpvi-relpro-producttitle-hover-color-control" value="'.esc_attr($flpvi_relpro_producttitle_hover_color_value).'" >';
}
// BG Color
$flpvi_relpro_producttitle_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-hover-bgcolor-control'));
function flpvi_relpro_producttitle_hover_bgcolor_fld(){
	global $flpvi_relpro_producttitle_hover_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-producttitle-hover-bgcolor-control" id="flpvi-relpro-producttitle-hover-color-bgcontrol" value="'.esc_attr($flpvi_relpro_producttitle_hover_bgcolor_value).'" >';
}
// Size
$flpvi_relpro_producttitle_hover_size_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-hover-size-control'));
function flpvi_relpro_producttitle_hover_size_fld(){
	global $flpvi_relpro_producttitle_hover_size_value;
	echo '<input type="text" name="flpvi-relpro-producttitle-hover-size-control" value="'.esc_attr($flpvi_relpro_producttitle_hover_size_value).'"  placeholder="0px">';
}
//------ Post Title style input end

//------ Post Reg Price style input start
// Alignment
$flpvi_relpro_productregprice_align_value = sanitize_text_field( get_option('flpvi-relpro-productregprice-align','woocommerce_before_shop_loop_item_title'));
function flpvi_relpro_productregprice_align_fld(){
	global $flpvi_relpro_productregprice_align_value;
	?>
	<select name="flpvi-relpro-productregprice-align" class="flpvi-relpro-input" id="flpvi-relpro-productregprice-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo esc_html($left) ?>" <?php selected($flpvi_relpro_productregprice_align_value,$left); ?>><?php echo esc_html__('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo esc_html($center) ?>" <?php selected($flpvi_relpro_productregprice_align_value,$center); ?>><?php echo esc_html__('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo esc_html($right) ?>" <?php selected($flpvi_relpro_productregprice_align_value,$right); ?>><?php echo esc_html__('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_relpro_productregprice_color_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-color-control')); // add a default color using comma
function flpvi_relpro_productregprice_color_fld(){
	global $flpvi_relpro_productregprice_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-productregprice-color-control" id="flpvi-relpro-productregprice-color-control" value="'.esc_attr($flpvi_relpro_productregprice_color_value).'" >';
}
// BG Color
$flpvi_relpro_productregprice_bgcolor_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-bgcolor-control'));
function flpvi_relpro_productregprice_bgcolor_fld(){
	global $flpvi_relpro_productregprice_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-productregprice-bgcolor-control" id="flpvi-relpro-productregprice-color-bgcontrol" value="'.esc_attr($flpvi_relpro_productregprice_bgcolor_value).'" >';
}
// Size
$flpvi_relpro_productregprice_size_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-size-control'));
function flpvi_relpro_productregprice_size_fld(){
	global $flpvi_relpro_productregprice_size_value;
	echo '<input type="text" name="flpvi-relpro-productregprice-size-control" value="'.esc_attr($flpvi_relpro_productregprice_size_value).'"  placeholder="0px">';
}
// padding
$flpvi_relpro_productregprice_padding_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-padding-control'));
function flpvi_relpro_productregprice_padding_fld(){
	global $flpvi_relpro_productregprice_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-relpro-productregprice-padding-control" value="'.esc_attr($flpvi_relpro_productregprice_padding_value).'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_relpro_productregprice_margin_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-margin-control'));
function flpvi_relpro_productregprice_margin_fld(){
	global $flpvi_relpro_productregprice_margin_value;
	echo '<input type="text" name="flpvi-relpro-productregprice-margin-control" value="'.esc_attr($flpvi_relpro_productregprice_margin_value).'"  placeholder="Four values allowed">';
}
// font familly
function flpvi_relpro_productregprice_fontfamilly_cb()
{
}
// Post Title hover style input
// Color
$flpvi_relpro_productregprice_hover_color_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-hover-color-control')); // add a default color using comma
function flpvi_relpro_productregprice_hover_color_fld(){
	global $flpvi_relpro_productregprice_hover_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-productregprice-hover-color-control" id="flpvi-relpro-productregprice-hover-color-control" value="'.esc_attr($flpvi_relpro_productregprice_hover_color_value).'" >';
}
// BG Color
$flpvi_relpro_productregprice_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-hover-bgcolor-control'));
function flpvi_relpro_productregprice_hover_bgcolor_fld(){
	global $flpvi_relpro_productregprice_hover_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-productregprice-hover-bgcolor-control" id="flpvi-relpro-productregprice-hover-color-bgcontrol" value="'.esc_attr($flpvi_relpro_productregprice_hover_bgcolor_value).'" >';
}
// Size
$flpvi_relpro_productregprice_hover_size_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-hover-size-control'));
function flpvi_relpro_productregprice_hover_size_fld(){
	global $flpvi_relpro_productregprice_hover_size_value;
	echo '<input type="text" name="flpvi-relpro-productregprice-hover-size-control" value="'.esc_attr($flpvi_relpro_productregprice_hover_size_value).'"  placeholder="0px">';
}
//------ Post Reg Price style input end

//------ Related Post Sale Price style input start
// Color
$flpvi_relpro_productsaleprice_color_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-color-control')); // add a default color using comma
function flpvi_relpro_productsaleprice_color_fld(){
	global $flpvi_relpro_productsaleprice_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-productsaleprice-color-control" id="flpvi-relpro-productsaleprice-color-control" value="'.esc_attr($flpvi_relpro_productsaleprice_color_value).'" >';
}
// BG Color
$flpvi_relpro_productsaleprice_bgcolor_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-bgcolor-control'));
function flpvi_relpro_productsaleprice_bgcolor_fld(){
	global $flpvi_relpro_productsaleprice_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-productsaleprice-bgcolor-control" id="flpvi-relpro-productsaleprice-color-bgcontrol" value="'.esc_attr($flpvi_relpro_productsaleprice_bgcolor_value).'" >';
}
// Size
$flpvi_relpro_productsaleprice_size_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-size-control'));
function flpvi_relpro_productsaleprice_size_fld(){
	global $flpvi_relpro_productsaleprice_size_value;
	echo '<input type="text" name="flpvi-relpro-productsaleprice-size-control" value="'.esc_attr($flpvi_relpro_productsaleprice_size_value).'"  placeholder="0px">';
}
// padding
$flpvi_relpro_productsaleprice_padding_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-padding-control'));
function flpvi_relpro_productsaleprice_padding_fld(){
	global $flpvi_relpro_productsaleprice_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-relpro-productsaleprice-padding-control" value="'.esc_attr($flpvi_relpro_productsaleprice_padding_value).'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_relpro_productsaleprice_margin_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-margin-control'));
function flpvi_relpro_productsaleprice_margin_fld(){
	global $flpvi_relpro_productsaleprice_margin_value;
	echo '<input type="text" name="flpvi-relpro-productsaleprice-margin-control" value="'.esc_attr($flpvi_relpro_productsaleprice_margin_value).'"  placeholder="Four values allowed">';
}
// Related Post sale price hover style input
// Color
$flpvi_relpro_productsaleprice_hover_color_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-hover-color-control')); // add a default color using comma
function flpvi_relpro_productsaleprice_hover_color_fld(){
	global $flpvi_relpro_productsaleprice_hover_color_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-productsaleprice-hover-color-control" id="flpvi-relpro-productsaleprice-hover-color-control" value="'.esc_attr($flpvi_relpro_productsaleprice_hover_color_value).'" >';
}
// BG Color
$flpvi_relpro_productsaleprice_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-hover-bgcolor-control'));
function flpvi_relpro_productsaleprice_hover_bgcolor_fld(){
	global $flpvi_relpro_productsaleprice_hover_bgcolor_value;
	echo'<input type="text" class="color-field" data-wheelcolorpicker data-wcp-format="rgba" name="flpvi-relpro-productsaleprice-hover-bgcolor-control" id="flpvi-relpro-productsaleprice-hover-color-bgcontrol" value="'.esc_attr($flpvi_relpro_productsaleprice_hover_bgcolor_value).'" >';
}
// Size
$flpvi_relpro_productsaleprice_hover_size_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-hover-size-control'));
function flpvi_relpro_productsaleprice_hover_size_fld(){
	global $flpvi_relpro_productsaleprice_hover_size_value;
	echo '<input type="text" name="flpvi-relpro-productsaleprice-hover-size-control" value="'.esc_attr($flpvi_relpro_productsaleprice_hover_size_value).'"  placeholder="0px">';
}

// Rty noUiSlider woopm
$default_value = sanitize_text_field(get_option('flpvi-nouislider'));
function flpvi_try_nouislider_fld(){
  $default_value = 50; // Set your desired default value here.
  $slider_value = get_option('flpvi-nouislider', $default_value); // Get the saved value or use the default if not set.
  ?>
  <div class="woopm_noUi_Slider" id="flpvi-nouislider"></div>
  <input type="hidden" name="flpvi-nouislider" id="flpvi-nouislider-value" value="<?php echo esc_attr($slider_value); ?>" />
  <div class="noUi_Slider_Tooltips" id="flpvi-nouislider-tooltips"></div>
  <?php
}

//------ Related Post Sale Price style input end
// -------------********************** Related Post Style end
//***************---****** Style inputs end (Tab)
#################---####### Settings field end
// Style end

//Lightbox Section callback
function flpvi_lb_cb(){
	echo '</div>';
}
add_action('wp_ajax_update_last_installed_section', 'flpvi_update_last_installed_section');
function flpvi_update_last_installed_section() {
    $last_installed_section = sanitize_text_field($_POST['last_installed_section']);
    update_option('last_installed_section', $last_installed_section);
    wp_die();
}
?>