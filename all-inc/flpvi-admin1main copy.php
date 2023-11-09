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
	add_menu_page( 'Flexi Post View Settings', 'Flexi Post View', 'manage_options', 'flpvi_single_sk', 'flpvi_settings_cb', 'dashicons-analytics', 57 );
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
		<div class="flpvi_data flpvi_name"><a class="flpvi_au_title" href="https://bestwpdeveloper.com" target="_blank"><h2 class="flpvi_dashtitle"><?php _e('BEST WP DEVELOPER', 'flexi-post-view'); ?></h2></a></div>
		<div class="flpvi_data flpvi_demo">
			<div class="flpvi_the_author"><a class="flpvi_the_demo" href="https://bestwpdeveloper.com/flexi-post-view/" target="_blank"><?php _e('Go Demo', 'flexi-post-view'); ?></a></div>
			<div class="flpvi_the_author"><a class="flpvi_the_author_a" href=""><?php _e('Go License', 'flexi-post-view'); ?></a></div>
		</div>
	</div>
	<?php 
}

// Tab test one
function flpvi_tab_section(){
	?>
	<div class="flpvi_tab_items">
		<div class="flpvi_items">
			<div id="tab1" class="tab-btn active"><?php _e('Settings', 'flexi-post-view'); ?></div>
			<div id="tab2" class="tab-btn"><?php _e('Styles', 'flexi-post-view'); ?></div>
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
	echo $tab.'<div class="flpvi_acc_items flpvi_acc1_view1">'.__('Archive Settings','flexi-post-view').'</div><div class="flpvi_acc1_view1_content">';
}
function flpvi_general_settings_sk(){  //------ Section  (Tab)
	echo '</div><div class="flpvi_acc_items flpvi_acc1_view2">'.__('General Settings','flexi-post-view').'</div><div class="flpvi_acc1_view2_content">';
}
function flpvi_general_relpro_settings_sk(){  //------ Section  (Tab)
	echo '</div><div class="flpvi_acc_items flpvi_acc1_view2">'.__('Related Posts Queries','flexi-post-view').'</div><div class="flpvi_acc1_view2_content">';
}
//***************---****** Archive Sections end

//***************---****** Archive Settings start
//Enable single post page
$flpvi_lb_en_gallery_value = sanitize_text_field(get_option('flpvi-enable-post-single-page','true'));
function flpvi_lb_en_gallery_cb(){
	global $flpvi_lb_en_gallery_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-enable-post-single-page" name="flpvi-enable-post-single-page" value="true" '.checked('true',$flpvi_lb_en_gallery_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;

}
// Post single page styles
$flpvi_button_position_value = sanitize_text_field( get_option('flpvi-select-preset-single-post','woocommerce_before_shop_loop_item_title'));
function flpvi_button_position_cb(){
	/*
	global $flpvi_button_position_value;
	?>
	<select name="flpvi-select-preset-single-post" class="flpvi-input" id="flpvi-select-preset-single-post">
		<?php $default = 'default'; ?>
		<option value="<?php echo $default ?>" <?php selected($flpvi_button_position_value,$default); ?>><?php _e('Default','flexi-post-view'); ?></option>
		<?php $style2 = 'style2'; ?>
		<option value="<?php echo $style2 ?>" <?php selected($flpvi_button_position_value,$style2); ?>><?php _e('Style 2','flexi-post-view'); ?></option>
		<?php $style3 = 'style3'; ?>
		<option value="<?php echo $style3 ?>" <?php selected($flpvi_button_position_value,$style3); ?>><?php _e('Style 3','flexi-post-view'); ?></option>
		<?php $style4 = 'style4'; ?>
		<option value="<?php echo $style4 ?>" <?php selected($flpvi_button_position_value,$style4); ?>><?php _e('Style 4','flexi-post-view'); ?></option>
		<?php $style5 = 'style5'; ?>
		<option value="<?php echo $style5 ?>" <?php selected($flpvi_button_position_value,$style5); ?>><?php _e('Style 5','flexi-post-view'); ?></option>
		</select>
	<?php
	*/
	?>
	<style>
        /* Styles for the popup overlay */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
						z-index: 9;
        }

        /* Styles for the popup content */
        .popup-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
				span#closePopup {
						border: 1px solid;
						padding: 0px 15px;
						cursor: pointer;
				}
    </style>
    <div id="wpwrap">
        <div class="popup-button">Click Me</div>
    </div>

    <!-- Popup Overlay and Content -->
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
            <?php
					$sections = array(
							'demo1' => 'Demo 1',
							'demo2' => 'Demo 2',
							'demo3' => 'Demo 3',
							'demo4' => 'Demo 4',
							'demo5' => 'Demo 5',
							'demo6' => 'Demo 6',
							'demo7' => 'Demo 7'
					);
					?>
					<div class="grid-container">
					<?php foreach ($sections as $section_id => $section_title): ?>
							<section id="<?php echo esc_attr($section_id); ?>">
									<h2><?php echo esc_html($section_title); ?></h2>
									<button class="install-button" data-installed="false" onclick="simulateLoading(this)">
											<span class="loading-icon"></span>
											<span class="install-text">Install</span>
											<span class="uninstall-text">Uninstall</span>
									</button>
							</section>
							<?php endforeach; ?>
					</div>
					<span id="closePopup">Close</span>
					<?php 
    echo '<div id="installed-sections">';
    echo '<h3>Update Installed Sections:</h3>';
    $lastInstalledSection = get_option('last_installed_section', '');
    echo '<p id="last-installed-section">' . esc_html($lastInstalledSection) . '</p>';
    echo '</div>';

    ?>
        </div>
    </div>
    <script>
        // Get references to the popup elements
        const popupButton = document.querySelector('.popup-button');
        const popupOverlay = document.getElementById('popupOverlay');
        const closePopupButton = document.getElementById('closePopup');

        // Function to open the popup
        popupButton.addEventListener('click', () => {
            popupOverlay.style.display = 'flex';
        });

        // Function to close the popup
        closePopupButton.addEventListener('click', () => {
            popupOverlay.style.display = 'none';
        });
    </script>
    <script>var LastInSave = "<?php echo get_option('last_installed_section', ''); ?>";</script>

	<?php
}
//***************---****** Archive Settings start

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
$flpvi_quantity_check_value = sanitize_text_field(get_option('flpvi-quantity-check-gallery','true'));
function flpvi_quantity_check_cb(){
	global $flpvi_quantity_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-quantity-check-gallery" name="flpvi-quantity-check-gallery" value="true" '.checked('true',$flpvi_quantity_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// addtocart check
$flpvi_addtocart_check_value = sanitize_text_field(get_option('flpvi-addtocart-check-gallery','true'));
function flpvi_addtocart_check_cb(){
	global $flpvi_addtocart_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-addtocart-check-gallery" name="flpvi-addtocart-check-gallery" value="true" '.checked('true',$flpvi_addtocart_check_value,false).'><span class="toggle-slider"></span></label>';
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
	echo '<input type="text" name="flpvi-relpro-count-gallery" id="flpvi-relpro-count-gallery" value="'.$flpvi_relpro_count_value.'" title="Just a number."  placeholder="3">';
}
$flpvi_relpro_excdpro_value = sanitize_text_field(get_option('flpvi-relpro-excdpro-gallery'));
function flpvi_relpro_excdpro_cb(){
	global $flpvi_relpro_excdpro_value;
	echo '<input type="text" name="flpvi-relpro-excdpro-gallery" id="flpvi-relpro-excdpro-gallery" value="'.$flpvi_relpro_excdpro_value.'" title="Just post ID number."  placeholder="3, 4, 5">';
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
	echo '<input type="text" name="flpvi-relpro-dscwordl-gallery" id="flpvi-relpro-dscwordl-gallery" value="'.$flpvi_relpro_dscwordl_value.'" title="Just a number."  placeholder="10">';
}
$flpvi_relpro_dscind_value = sanitize_text_field(get_option('flpvi-relpro-dscind-gallery', '...'));
function flpvi_relpro_dscind_cb(){
	global $flpvi_relpro_dscind_value;
	echo '<input type="text" name="flpvi-relpro-dscind-gallery" id="flpvi-relpro-dscind-gallery" value="'.$flpvi_relpro_dscind_value.'" title="Any Text."  placeholder="...">';
}
// Related Posts General Settings Controls end
//***************---****** General Settings Controls end
#################---####### Settings end

#################---####### Settings field end
//***************---****** Style control section title start
function flpvi_general_style_cb(){
	$tab = '</div></div><div class="tab-content" id="tab2Content" style="display: none;">';
	echo $tab.'<div class="flpvi_acc_items flpvi_acc2_view1" id="general">'.__('General Style Settings','flexi-post-view').'</div><div class="flpvi_acc2_view1_content">';
}
function flpvi_breadcrumb_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view2" id="breadcrumb">'.__('Breadcrumb Style','flexi-post-view').'</div><div class="flpvi_acc2_view2_content">';
}
function flpvi_breadcrumb_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_stockornot_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Stock Or Not','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_stockornot_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_salenote_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Sale Note','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_salenote_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_featuredimg_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Post Images','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_galleryimgs_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.__('Gallery Imgs','flexi-post-view').'</b></div>';
}
function flpvi_producttitle_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Post Title','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_producttitle_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_productprice_reg_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Post Price','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_productprice_sale_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.__('Sale Price','flexi-post-view').'</b></div>';
}
function flpvi_productshortdesc_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Short Description','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_variablesproduct_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Variable Post','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_productcategory_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Category','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_productcategory_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_producttags_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Tags','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_producttags_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_product_quantity_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Quantity','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_product_addtocart_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Add To Cart','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_product_descandrev_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Description & Review','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_related_product_styles_cb(){ // Related Posts Style Label
	echo '</div><div class="flpvi_relpro_styles" id="style"><b>'.__('Related Posts','flexi-post-view').'</b></div><div class="added_the_class_for_this_label">';
}
function flpvi_related_product_wrapper_styles_cb(){ 
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Wrapper','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
////////////////////////
function flpvi_relpro_featuredimg_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Post Images','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_relpro_producttitle_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Post Title','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_relpro_producttitle_hover_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','flexi-post-view').'</b></div>';
}
function flpvi_relpro_productprice_reg_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__('Post Price','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
function flpvi_relpro_productprice_sale_style_cb(){
	echo '<div class="flpvi_relpro_setting" id="breadcrumb"><b>'.__('Sale Price','flexi-post-view').'</b></div>';
}
function flpvi_relpro_product_addtocart_style_cb(){
	echo '</div><div class="flpvi_acc_items flpvi_acc2_view3" id="general">'.__(' More View','flexi-post-view').'</div><div class="flpvi_acc2_view3_content">';
}
//***************---****** Style control section title end 

//***************---****** Style inputs start (Tab)
//Font size
$flpvi_button_fsize_value = sanitize_text_field(get_option('flpvi-general-style-fsize',14));
function flpvi_button_fsize_cb(){
	global $flpvi_button_fsize_value;
	echo  '<input type="text" class="flpvi-input" name="flpvi-general-style-fsize" id="flpvi-general-style-fsize" value="'.$flpvi_button_fsize_value.'">';
}

// Title Color
$flpvi_btn_bgc_value = sanitize_text_field(get_option('flpvi-general-title-clr','#8f8f8f'));
function flpvi_btn_bgc_cb(){
	global $flpvi_btn_bgc_value;
	echo '<input type="color" class="color-field" name="flpvi-general-title-clr" id="flpvi-general-title-clr" value="'.$flpvi_btn_bgc_value.'" >';
}

//Button Hover Title Color
$flpvi_btn_hover_bgc_value = sanitize_text_field(get_option('flpvi-btn-hover-bgc','#585858'));
function flpvi_btn_hover_bgc_cb(){
	global $flpvi_btn_hover_bgc_value;
	echo '<input type="color" class="color-field" name="flpvi-btn-hover-bgc" value="'.$flpvi_btn_hover_bgc_value.'" >';
}

//Button Color
$flpvi_button_color_value = sanitize_text_field(get_option('flpvi-button-color','white'));
function flpvi_button_color_cb(){
	global $flpvi_button_color_value;
	echo '<input type="color" class="color-field" name="flpvi-button-color" value="'.$flpvi_button_color_value.'" >';
}

//Button Padding
$flpvi_btn_ps_value = sanitize_text_field(get_option('flpvi-btn-ps','6px 8px'));
function flpvi_btn_ps_cb(){
	global $flpvi_btn_ps_value;
	echo '<input type="text" name="flpvi-btn-ps" value="'.$flpvi_btn_ps_value.'" >';
}

//Button Margin
$flpvi_btn_margin_value = sanitize_text_field(get_option('flpvi-btn-margin',' '));
function flpvi_btn_margin_cb(){
	global $flpvi_btn_margin_value;
	echo '<input type="text" name="flpvi-btn-margin" value="'.$flpvi_btn_margin_value.'" >';
}

//Border Type
$flpvi_btn_btype_value = sanitize_text_field(get_option('flpvi-btn-btype','solid'));
function flpvi_btn_btype_cb(){
	global $flpvi_btn_btype_value;
	echo '<input type="text" name="flpvi-btn-btype" value="'.$flpvi_btn_btype_value.'" >';
}

//Border Size
$flpvi_btn_bs_value = sanitize_text_field(get_option('flpvi-btn-bs',' '));
function flpvi_btn_bs_cb(){
	global $flpvi_btn_bs_value;
	echo '<input type="text" name="flpvi-btn-bs" value="'.$flpvi_btn_bs_value.'">';
}

// Border radius
$flpvi_btn_bors_value = sanitize_text_field(get_option('flpvi-btn-bors','4'));
function flpvi_btn_bors(){
	global $flpvi_btn_bors_value;
	echo '<input type="text" name="flpvi-btn-bors" value="'.$flpvi_btn_bors_value.'" >';
}

//Border Color
$flpvi_btn_bc_value = sanitize_text_field(get_option('flpvi-btn-bc',' '));
function flpvi_btn_bc_cb(){
	global $flpvi_btn_bc_value;
	echo '<input type="color" class="color-field" name="flpvi-btn-bc" value="'.$flpvi_btn_bc_value.'" >';
}

//Button icon color
$flpvi_btn_iconc_value = sanitize_text_field(get_option('flpvi-btn-iconc','white'));
function flpvi_btn_iconc_cb(){
	global $flpvi_btn_iconc_value;
	echo '<input type="color" class="color-field" name="flpvi-btn-iconc" value="'.$flpvi_btn_iconc_value.'" >';
}
//------ General style input start

//------ Breadcrumb style input start
// Alignment
$flpvi_breadalign_value = sanitize_text_field( get_option('flpvi-breadalign','woocommerce_before_shop_loop_item_title'));
function flpvi_breadalign_fld(){
	global $flpvi_breadalign_value;
	?>
	<select name="flpvi-breadalign" class="flpvi-input" id="flpvi-breadalign">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($flpvi_breadalign_value,$left); ?>><?php _e('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($flpvi_breadalign_value,$center); ?>><?php _e('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($flpvi_breadalign_value,$right); ?>><?php _e('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_text_color_value = sanitize_text_field(get_option('flpvi-text-color-control')); // add a default color using comma
function flpvi_text_color_fld(){
	global $flpvi_text_color_value;
	echo'<input type="color" class="color-field" name="flpvi-text-color-control" id="flpvi-text-color-control" value="'.$flpvi_text_color_value.'" >';
}
// BG Color
$flpvi_text_bgcolor_value = sanitize_text_field(get_option('flpvi-text-bgcolor-control'));
function flpvi_text_bgcolor_fld(){
	global $flpvi_text_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-text-bgcolor-control" id="flpvi-text-color-bgcontrol" value="'.$flpvi_text_bgcolor_value.'" >';
}
// Size
$flpvi_breadcrumb_size_value = sanitize_text_field(get_option('flpvi-breadcrumb-size-control','0px 0px 0px 0px'));
function flpvi_breadcrumb_size_fld(){
	global $flpvi_breadcrumb_size_value;
	echo '<input type="text" name="flpvi-breadcrumb-size-control" value="'.$flpvi_breadcrumb_size_value.'"  placeholder="0px">';
}
// padding
$flpvi_breadcrumb_padding_value = sanitize_text_field(get_option('flpvi-breadcrumb-padding-control','0px 0px 0px 0px'));
function flpvi_breadcrumb_padding_fld(){
	global $flpvi_breadcrumb_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-breadcrumb-padding-control" value="'.$flpvi_breadcrumb_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_breadcrumb_margin_value = sanitize_text_field(get_option('flpvi-breadcrumb-margin-control','0px 0px 0px 0px'));
function flpvi_breadcrumb_margin_fld(){
	global $flpvi_breadcrumb_margin_value;
	echo '<input type="text" name="flpvi-breadcrumb-margin-control" value="'.$flpvi_breadcrumb_margin_value.'"  placeholder="Four values allowed">';
}
// icon
function flpvi_breadcrumb_icon_fld(){
	?>
	<div class="wrap">
			<select id="selected_icon" name="flpvi-breadcrumb-icon-control" style="width: 200px;">
					<!-- Icons will be dynamically populated using JavaScript -->
			</select>
	</div>
	<script>
			(function ($) {
					$(document).ready(function () {
							const iconSelect = $('#selected_icon');
							const iconPreview = $('#selected_icon_preview');

							// List of available icons and their classes
							const availableIcons = {
									'fa fa-adjust': 'Adjust Icon',
									'fa fa-align-center': 'Align Center Icon',
									'fa fa-align-justify': 'Align Justify Icon',
									// Add more icons here
							};

							// Function to populate the icon select control
							function populateIconSelect() {
									// Loop through available icons and create options
									Object.entries(availableIcons).forEach(([iconClass, iconName]) => {
											const optionText = `<i class="${iconClass}"></i> ${iconName}`;
											iconSelect.append($('<option>', {
													value: iconClass,
													html: optionText
											}));
									});
							}

							// Call the function to populate the icon select control
							populateIconSelect();

							// Initialize Select2
							iconSelect.select2({
									templateResult: formatIconOption
							});

							// Function to format the icon option in Select2
							function formatIconOption(iconClass) {
									if (!iconClass.id) {
											return iconClass.text;
									}
									const $option = $('<span>').html(iconClass.text);
									$option.prepend($(`<i class="${iconClass.id}"></i>`));
									return $option;
							}

							// Event listener for the icon select control
							iconSelect.on('change', function () {
									const selectedIcon = $(this).val();
									iconPreview.attr('class', selectedIcon);
							});

							// Set the initial value of the icon select control from the saved option
							const savedIcon = '<?php echo esc_attr(get_option("flpvi-breadcrumb-icon-control", "fa fa-adjust")); ?>';
							iconSelect.val(savedIcon).trigger('change');
					});
			})(jQuery);
	</script>
<?php
}
// font familly
function flpvi_fontfamilly_cb()
{
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="flpvi-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("flpvi-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php
}
// Breadcrumb hover style input
// Color
$flpvi_breadcrumb_hover_color_value = sanitize_text_field(get_option('flpvi-breadcrumb-hover-color-control')); // add a default color using comma
function flpvi_breadcrumb_hover_color_fld(){
	global $flpvi_breadcrumb_hover_color_value;
	echo'<input type="color" class="color-field" name="flpvi-breadcrumb-hover-color-control" id="flpvi-breadcrumb-hover-color-control" value="'.$flpvi_breadcrumb_hover_color_value.'" >';
}
// BG Color
$flpvi_breadcrumb_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-breadcrumb-hover-bgcolor-control'));
function flpvi_breadcrumb_hover_bgcolor_fld(){
	global $flpvi_breadcrumb_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-breadcrumb-hover-bgcolor-control" id="flpvi-breadcrumb-hover-color-bgcontrol" value="'.$flpvi_breadcrumb_hover_bgcolor_value.'" >';
}
// Size
$flpvi_breadcrumb_hover_size_value = sanitize_text_field(get_option('flpvi-breadcrumb-hover-size-control','0px 0px 0px 0px'));
function flpvi_breadcrumb_hover_size_fld(){
	global $flpvi_breadcrumb_hover_size_value;
	echo '<input type="text" name="flpvi-breadcrumb-hover-size-control" value="'.$flpvi_breadcrumb_hover_size_value.'"  placeholder="0px">';
}
//------ Breadcrumb style input end

//------ Stock or Not style input start
// Alignment
$flpvi_stockornotalign_value = sanitize_text_field( get_option('flpvi-stockornotalign','woocommerce_before_shop_loop_item_title'));
function flpvi_stockornotalign_fld(){
	global $flpvi_stockornotalign_value;
	?>
	<select name="flpvi-stockornotalign" class="flpvi-input" id="flpvi-stockornotalign">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($flpvi_stockornotalign_value,$left); ?>><?php _e('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($flpvi_stockornotalign_value,$center); ?>><?php _e('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($flpvi_stockornotalign_value,$right); ?>><?php _e('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_stockornot_color_value = sanitize_text_field(get_option('flpvi-stockornot-color-control')); // add a default color using comma
function flpvi_stockornot_color_fld(){
	global $flpvi_stockornot_color_value;
	echo'<input type="color" class="color-field" name="flpvi-stockornot-color-control" id="flpvi-stockornot-color-control" value="'.$flpvi_stockornot_color_value.'" >';
}
// BG Color
$flpvi_stockornot_bgcolor_value = sanitize_text_field(get_option('flpvi-stockornot-bgcolor-control'));
function flpvi_stockornot_bgcolor_fld(){
	global $flpvi_stockornot_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-stockornot-bgcolor-control" id="flpvi-stockornot-color-bgcontrol" value="'.$flpvi_stockornot_bgcolor_value.'" >';
}
// Size
$flpvi_stockornot_size_value = sanitize_text_field(get_option('flpvi-stockornot-size-control','0px 0px 0px 0px'));
function flpvi_stockornot_size_fld(){
	global $flpvi_stockornot_size_value;
	echo '<input type="text" name="flpvi-stockornot-size-control" value="'.$flpvi_stockornot_size_value.'"  placeholder="0px">';
}
// padding
$flpvi_stockornot_padding_value = sanitize_text_field(get_option('flpvi-stockornot-padding-control','0px 0px 0px 0px'));
function flpvi_stockornot_padding_fld(){
	global $flpvi_stockornot_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-stockornot-padding-control" value="'.$flpvi_stockornot_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_stockornot_margin_value = sanitize_text_field(get_option('flpvi-stockornot-margin-control','0px 0px 0px 0px'));
function flpvi_stockornot_margin_fld(){
	global $flpvi_stockornot_margin_value;
	echo '<input type="text" name="flpvi-stockornot-margin-control" value="'.$flpvi_stockornot_margin_value.'"  placeholder="Four values allowed">';
}

// Stock or Not hover style input
// Color
$flpvi_stockornot_hover_color_value = sanitize_text_field(get_option('flpvi-stockornot-hover-color-control')); // add a default color using comma
function flpvi_stockornot_hover_color_fld(){
	global $flpvi_stockornot_hover_color_value;
	echo'<input type="color" class="color-field" name="flpvi-stockornot-hover-color-control" id="flpvi-stockornot-hover-color-control" value="'.$flpvi_stockornot_hover_color_value.'" >';
}
// BG Color
$flpvi_stockornot_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-stockornot-hover-bgcolor-control'));
function flpvi_stockornot_hover_bgcolor_fld(){
	global $flpvi_stockornot_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-stockornot-hover-bgcolor-control" id="flpvi-stockornot-hover-color-bgcontrol" value="'.$flpvi_stockornot_hover_bgcolor_value.'" >';
}
// Size
$flpvi_stockornot_hover_size_value = sanitize_text_field(get_option('flpvi-stockornot-hover-size-control','0px 0px 0px 0px'));
function flpvi_stockornot_hover_size_fld(){
	global $flpvi_stockornot_hover_size_value;
	echo '<input type="text" name="flpvi-stockornot-hover-size-control" value="'.$flpvi_stockornot_hover_size_value.'"  placeholder="0px">';
}
//------ Stock or Not style input end

//------ Sale Note style inputs start
// Alignment
$flpvi_salenotealign_value = sanitize_text_field( get_option('flpvi-salenotealign','woocommerce_before_shop_loop_item_title'));
function flpvi_salenotealign_fld(){
	global $flpvi_salenotealign_value;
	?>
	<select name="flpvi-salenotealign" class="flpvi-input" id="flpvi-salenotealign">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($flpvi_salenotealign_value,$left); ?>><?php _e('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($flpvi_salenotealign_value,$center); ?>><?php _e('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($flpvi_salenotealign_value,$right); ?>><?php _e('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_salenote_color_value = sanitize_text_field(get_option('flpvi-salenote-color-control')); // add a default color using comma
function flpvi_salenote_color_fld(){
	global $flpvi_salenote_color_value;
	echo'<input type="color" class="color-field" name="flpvi-salenote-color-control" id="flpvi-salenote-color-control" value="'.$flpvi_salenote_color_value.'" >';
}
// BG Color
$flpvi_salenote_bgcolor_value = sanitize_text_field(get_option('flpvi-salenote-bgcolor-control'));
function flpvi_salenote_bgcolor_fld(){
	global $flpvi_salenote_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-salenote-bgcolor-control" id="flpvi-salenote-color-bgcontrol" value="'.$flpvi_salenote_bgcolor_value.'" >';
}
// Size
$flpvi_salenote_size_value = sanitize_text_field(get_option('flpvi-salenote-size-control','0px 0px 0px 0px'));
function flpvi_salenote_size_fld(){
	global $flpvi_salenote_size_value;
	echo '<input type="text" name="flpvi-salenote-size-control" value="'.$flpvi_salenote_size_value.'"  placeholder="0px">';
}
// padding
$flpvi_salenote_padding_value = sanitize_text_field(get_option('flpvi-salenote-padding-control','0px 0px 0px 0px'));
function flpvi_salenote_padding_fld(){
	global $flpvi_salenote_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-salenote-padding-control" value="'.$flpvi_salenote_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_salenote_margin_value = sanitize_text_field(get_option('flpvi-salenote-margin-control','0px 0px 0px 0px'));
function flpvi_salenote_margin_fld(){
	global $flpvi_salenote_margin_value;
	echo '<input type="text" name="flpvi-salenote-margin-control" value="'.$flpvi_salenote_margin_value.'"  placeholder="Four values allowed">';
}

// Sale Note hover style inputs
// Color
$flpvi_salenote_hover_color_value = sanitize_text_field(get_option('flpvi-salenote-hover-color-control')); // add a default color using comma
function flpvi_salenote_hover_color_fld(){
	global $flpvi_salenote_hover_color_value;
	echo'<input type="color" class="color-field" name="flpvi-salenote-hover-color-control" id="flpvi-salenote-hover-color-control" value="'.$flpvi_salenote_hover_color_value.'" >';
}
// BG Color
$flpvi_salenote_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-salenote-hover-bgcolor-control'));
function flpvi_salenote_hover_bgcolor_fld(){
	global $flpvi_salenote_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-salenote-hover-bgcolor-control" id="flpvi-salenote-hover-color-bgcontrol" value="'.$flpvi_salenote_hover_bgcolor_value.'" >';
}
// Size
$flpvi_salenote_hover_size_value = sanitize_text_field(get_option('flpvi-salenote-hover-size-control','0px 0px 0px 0px'));
function flpvi_salenote_hover_size_fld(){
	global $flpvi_salenote_hover_size_value;
	echo '<input type="text" name="flpvi-salenote-hover-size-control" value="'.$flpvi_salenote_hover_size_value.'"  placeholder="0px">';
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
		<option value="<?php echo $left ?>" <?php selected($flpvi_fetuimg_align_value,$left); ?>><?php _e('Left','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($flpvi_fetuimg_align_value,$right); ?>><?php _e('Right','flexi-post-view'); ?></option>
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
	echo'<input type="text" class="color-field" name="flpvi-fetuimg-brdrtype-control" id="flpvi-fetuimg-brdrtype-control" value="'.$flpvi_fetuimg_brdrtype_value.'" >';
}
// Border color
$flpvi_fetuimg_border_clr_check_value = sanitize_text_field(get_option('flpvi-fetuimg-border-clr-control','false'));
function flpvi_fetuimg_border_clr_fld(){
	global $flpvi_fetuimg_border_clr_check_value;
	echo'<input type="color" class="color-field" name="flpvi-fetuimg-border-clr-control" id="flpvi-fetuimg-border-clr-control" value="'.$flpvi_fetuimg_border_clr_check_value.'" >';
}
// Border radius
$flpvi_fetuimg_bdrrds_value = sanitize_text_field(get_option('flpvi-fetuimg-bdrrds-control','0px 0px 0px 0px'));
function flpvi_fetuimg_bdrrds_fld(){
	global $flpvi_fetuimg_bdrrds_value;
	echo '<input type="text" name="flpvi-fetuimg-bdrrds-control" value="'.$flpvi_fetuimg_bdrrds_value.'"  placeholder="0px">';
}
// padding
$flpvi_fetuimg_padding_value = sanitize_text_field(get_option('flpvi-fetuimg-padding-control','0px 0px 0px 0px'));
function flpvi_fetuimg_padding_fld(){
	global $flpvi_fetuimg_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-fetuimg-padding-control" value="'.$flpvi_fetuimg_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_fetuimg_margin_value = sanitize_text_field(get_option('flpvi-fetuimg-margin-control','0px 0px 0px 0px'));
function flpvi_fetuimg_margin_fld(){
	global $flpvi_fetuimg_margin_value;
	echo '<input type="text" name="flpvi-fetuimg-margin-control" value="'.$flpvi_fetuimg_margin_value.'"  placeholder="Four values allowed">';
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
	echo'<input type="color" class="color-field" name="flpvi-gllimg-border-clr-control" id="flpvi-gllimg-border-clr-control" value="'.$flpvi_gllimg_border_clr_check_value.'" >';
}
// Border Typee
$flpvi_gllimg_brdrtype_value = sanitize_text_field(get_option('flpvi-gllimg-brdrtype-control'));
function flpvi_gllimg_brdrtype_fld(){
	global $flpvi_gllimg_brdrtype_value;
	echo'<input type="text" class="color-field" name="flpvi-gllimg-brdrtype-control" id="flpvi-gllimg-brdrtype-control" value="'.$flpvi_gllimg_brdrtype_value.'" >';
}
// Border radius
$flpvi_gllimg_bdrrds_value = sanitize_text_field(get_option('flpvi-gllimg-bdrrds-control','0px 0px 0px 0px'));
function flpvi_gllimg_bdrrds_fld(){
	global $flpvi_gllimg_bdrrds_value;
	echo '<input type="text" name="flpvi-gllimg-bdrrds-control" value="'.$flpvi_gllimg_bdrrds_value.'"  placeholder="0px">';
}
// padding
$flpvi_gllimg_padding_value = sanitize_text_field(get_option('flpvi-gllimg-padding-control','0px 0px 0px 0px'));
function flpvi_gllimg_padding_fld(){
	global $flpvi_gllimg_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-gllimg-padding-control" value="'.$flpvi_gllimg_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_gllimg_margin_value = sanitize_text_field(get_option('flpvi-gllimg-margin-control','0px 0px 0px 0px'));
function flpvi_gllimg_margin_fld(){
	global $flpvi_gllimg_margin_value;
	echo '<input type="text" name="flpvi-gllimg-margin-control" value="'.$flpvi_gllimg_margin_value.'"  placeholder="Four values allowed">';
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
		<option value="<?php echo $left ?>" <?php selected($flpvi_producttitle_align_value,$left); ?>><?php _e('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($flpvi_producttitle_align_value,$center); ?>><?php _e('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($flpvi_producttitle_align_value,$right); ?>><?php _e('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_producttitle_color_value = sanitize_text_field(get_option('flpvi-producttitle-color-control')); // add a default color using comma
function flpvi_producttitle_color_fld(){
	global $flpvi_producttitle_color_value;
	echo'<input type="color" class="color-field" name="flpvi-producttitle-color-control" id="flpvi-producttitle-color-control" value="'.$flpvi_producttitle_color_value.'" >';
}
// BG Color
$flpvi_producttitle_bgcolor_value = sanitize_text_field(get_option('flpvi-producttitle-bgcolor-control'));
function flpvi_producttitle_bgcolor_fld(){
	global $flpvi_producttitle_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-producttitle-bgcolor-control" id="flpvi-producttitle-color-bgcontrol" value="'.$flpvi_producttitle_bgcolor_value.'" >';
}
// Size
$flpvi_producttitle_size_value = sanitize_text_field(get_option('flpvi-producttitle-size-control','0px 0px 0px 0px'));
function flpvi_producttitle_size_fld(){
	global $flpvi_producttitle_size_value;
	echo '<input type="text" name="flpvi-producttitle-size-control" value="'.$flpvi_producttitle_size_value.'"  placeholder="0px">';
}
// padding
$flpvi_producttitle_padding_value = sanitize_text_field(get_option('flpvi-producttitle-padding-control','0px 0px 0px 0px'));
function flpvi_producttitle_padding_fld(){
	global $flpvi_producttitle_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-producttitle-padding-control" value="'.$flpvi_producttitle_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_producttitle_margin_value = sanitize_text_field(get_option('flpvi-producttitle-margin-control','0px 0px 0px 0px'));
function flpvi_producttitle_margin_fld(){
	global $flpvi_producttitle_margin_value;
	echo '<input type="text" name="flpvi-producttitle-margin-control" value="'.$flpvi_producttitle_margin_value.'"  placeholder="Four values allowed">';
}
// font familly
function flpvi_producttitle_fontfamilly_cb()
{/**
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="flpvi-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("flpvi-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php */
}
// Post Title hover style input
// Color
$flpvi_producttitle_hover_color_value = sanitize_text_field(get_option('flpvi-producttitle-hover-color-control')); // add a default color using comma
function flpvi_producttitle_hover_color_fld(){
	global $flpvi_producttitle_hover_color_value;
	echo'<input type="color" class="color-field" name="flpvi-producttitle-hover-color-control" id="flpvi-producttitle-hover-color-control" value="'.$flpvi_producttitle_hover_color_value.'" >';
}
// BG Color
$flpvi_producttitle_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-producttitle-hover-bgcolor-control'));
function flpvi_producttitle_hover_bgcolor_fld(){
	global $flpvi_producttitle_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-producttitle-hover-bgcolor-control" id="flpvi-producttitle-hover-color-bgcontrol" value="'.$flpvi_producttitle_hover_bgcolor_value.'" >';
}
// Size
$flpvi_producttitle_hover_size_value = sanitize_text_field(get_option('flpvi-producttitle-hover-size-control','0px 0px 0px 0px'));
function flpvi_producttitle_hover_size_fld(){
	global $flpvi_producttitle_hover_size_value;
	echo '<input type="text" name="flpvi-producttitle-hover-size-control" value="'.$flpvi_producttitle_hover_size_value.'"  placeholder="0px">';
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
		<option value="<?php echo $left ?>" <?php selected($flpvi_productregprice_align_value,$left); ?>><?php _e('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($flpvi_productregprice_align_value,$center); ?>><?php _e('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($flpvi_productregprice_align_value,$right); ?>><?php _e('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_productregprice_color_value = sanitize_text_field(get_option('flpvi-productregprice-color-control')); // add a default color using comma
function flpvi_productregprice_color_fld(){
	global $flpvi_productregprice_color_value;
	echo'<input type="color" class="color-field" name="flpvi-productregprice-color-control" id="flpvi-productregprice-color-control" value="'.$flpvi_productregprice_color_value.'" >';
}
// BG Color
$flpvi_productregprice_bgcolor_value = sanitize_text_field(get_option('flpvi-productregprice-bgcolor-control'));
function flpvi_productregprice_bgcolor_fld(){
	global $flpvi_productregprice_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-productregprice-bgcolor-control" id="flpvi-productregprice-color-bgcontrol" value="'.$flpvi_productregprice_bgcolor_value.'" >';
}
// Size
$flpvi_productregprice_size_value = sanitize_text_field(get_option('flpvi-productregprice-size-control','0px 0px 0px 0px'));
function flpvi_productregprice_size_fld(){
	global $flpvi_productregprice_size_value;
	echo '<input type="text" name="flpvi-productregprice-size-control" value="'.$flpvi_productregprice_size_value.'"  placeholder="0px">';
}
// padding
$flpvi_productregprice_padding_value = sanitize_text_field(get_option('flpvi-productregprice-padding-control','0px 0px 0px 0px'));
function flpvi_productregprice_padding_fld(){
	global $flpvi_productregprice_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-productregprice-padding-control" value="'.$flpvi_productregprice_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_productregprice_margin_value = sanitize_text_field(get_option('flpvi-productregprice-margin-control','0px 0px 0px 0px'));
function flpvi_productregprice_margin_fld(){
	global $flpvi_productregprice_margin_value;
	echo '<input type="text" name="flpvi-productregprice-margin-control" value="'.$flpvi_productregprice_margin_value.'"  placeholder="Four values allowed">';
}
// font familly
function flpvi_productregprice_fontfamilly_cb()
{/**
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="flpvi-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("flpvi-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php */
}
// Post Title hover style input
// Color
$flpvi_productregprice_hover_color_value = sanitize_text_field(get_option('flpvi-productregprice-hover-color-control')); // add a default color using comma
function flpvi_productregprice_hover_color_fld(){
	global $flpvi_productregprice_hover_color_value;
	echo'<input type="color" class="color-field" name="flpvi-productregprice-hover-color-control" id="flpvi-productregprice-hover-color-control" value="'.$flpvi_productregprice_hover_color_value.'" >';
}
// BG Color
$flpvi_productregprice_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-productregprice-hover-bgcolor-control'));
function flpvi_productregprice_hover_bgcolor_fld(){
	global $flpvi_productregprice_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-productregprice-hover-bgcolor-control" id="flpvi-productregprice-hover-color-bgcontrol" value="'.$flpvi_productregprice_hover_bgcolor_value.'" >';
}
// Size
$flpvi_productregprice_hover_size_value = sanitize_text_field(get_option('flpvi-productregprice-hover-size-control','0px 0px 0px 0px'));
function flpvi_productregprice_hover_size_fld(){
	global $flpvi_productregprice_hover_size_value;
	echo '<input type="text" name="flpvi-productregprice-hover-size-control" value="'.$flpvi_productregprice_hover_size_value.'"  placeholder="0px">';
}
//------ Post Reg Price style input end

//------ Post Sale Price style input start
// Color
$flpvi_productsaleprice_color_value = sanitize_text_field(get_option('flpvi-productsaleprice-color-control')); // add a default color using comma
function flpvi_productsaleprice_color_fld(){
	global $flpvi_productsaleprice_color_value;
	echo'<input type="color" class="color-field" name="flpvi-productsaleprice-color-control" id="flpvi-productsaleprice-color-control" value="'.$flpvi_productsaleprice_color_value.'" >';
}
// BG Color
$flpvi_productsaleprice_bgcolor_value = sanitize_text_field(get_option('flpvi-productsaleprice-bgcolor-control'));
function flpvi_productsaleprice_bgcolor_fld(){
	global $flpvi_productsaleprice_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-productsaleprice-bgcolor-control" id="flpvi-productsaleprice-color-bgcontrol" value="'.$flpvi_productsaleprice_bgcolor_value.'" >';
}
// Size
$flpvi_productsaleprice_size_value = sanitize_text_field(get_option('flpvi-productsaleprice-size-control','0px 0px 0px 0px'));
function flpvi_productsaleprice_size_fld(){
	global $flpvi_productsaleprice_size_value;
	echo '<input type="text" name="flpvi-productsaleprice-size-control" value="'.$flpvi_productsaleprice_size_value.'"  placeholder="0px">';
}
// padding
$flpvi_productsaleprice_padding_value = sanitize_text_field(get_option('flpvi-productsaleprice-padding-control','0px 0px 0px 0px'));
function flpvi_productsaleprice_padding_fld(){
	global $flpvi_productsaleprice_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-productsaleprice-padding-control" value="'.$flpvi_productsaleprice_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_productsaleprice_margin_value = sanitize_text_field(get_option('flpvi-productsaleprice-margin-control','0px 0px 0px 0px'));
function flpvi_productsaleprice_margin_fld(){
	global $flpvi_productsaleprice_margin_value;
	echo '<input type="text" name="flpvi-productsaleprice-margin-control" value="'.$flpvi_productsaleprice_margin_value.'"  placeholder="Four values allowed">';
}
// Post sale price hover style input
// Color
$flpvi_productsaleprice_hover_color_value = sanitize_text_field(get_option('flpvi-productsaleprice-hover-color-control')); // add a default color using comma
function flpvi_productsaleprice_hover_color_fld(){
	global $flpvi_productsaleprice_hover_color_value;
	echo'<input type="color" class="color-field" name="flpvi-productsaleprice-hover-color-control" id="flpvi-productsaleprice-hover-color-control" value="'.$flpvi_productsaleprice_hover_color_value.'" >';
}
// BG Color
$flpvi_productsaleprice_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-productsaleprice-hover-bgcolor-control'));
function flpvi_productsaleprice_hover_bgcolor_fld(){
	global $flpvi_productsaleprice_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-productsaleprice-hover-bgcolor-control" id="flpvi-productsaleprice-hover-color-bgcontrol" value="'.$flpvi_productsaleprice_hover_bgcolor_value.'" >';
}
// Size
$flpvi_productsaleprice_hover_size_value = sanitize_text_field(get_option('flpvi-productsaleprice-hover-size-control','0px 0px 0px 0px'));
function flpvi_productsaleprice_hover_size_fld(){
	global $flpvi_productsaleprice_hover_size_value;
	echo '<input type="text" name="flpvi-productsaleprice-hover-size-control" value="'.$flpvi_productsaleprice_hover_size_value.'"  placeholder="0px">';
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
		<option value="<?php echo $left ?>" <?php selected($flpvi_productcategory_align_value,$left); ?>><?php _e('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($flpvi_productcategory_align_value,$center); ?>><?php _e('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($flpvi_productcategory_align_value,$right); ?>><?php _e('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_productcategory_color_value = sanitize_text_field(get_option('flpvi-productcategory-color-control')); // add a default color using comma
function flpvi_productcategory_color_fld(){
	global $flpvi_productcategory_color_value;
	echo'<input type="color" class="color-field" name="flpvi-productcategory-color-control" id="flpvi-productcategory-color-control" value="'.$flpvi_productcategory_color_value.'" >';
}
// BG Color
$flpvi_productcategory_bgcolor_value = sanitize_text_field(get_option('flpvi-productcategory-bgcolor-control'));
function flpvi_productcategory_bgcolor_fld(){
	global $flpvi_productcategory_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-productcategory-bgcolor-control" id="flpvi-productcategory-color-bgcontrol" value="'.$flpvi_productcategory_bgcolor_value.'" >';
}
// Size
$flpvi_productcategory_size_value = sanitize_text_field(get_option('flpvi-productcategory-size-control','0px 0px 0px 0px'));
function flpvi_productcategory_size_fld(){
	global $flpvi_productcategory_size_value;
	echo '<input type="text" name="flpvi-productcategory-size-control" value="'.$flpvi_productcategory_size_value.'"  placeholder="0px">';
}
// padding
$flpvi_productcategory_padding_value = sanitize_text_field(get_option('flpvi-productcategory-padding-control','0px 0px 0px 0px'));
function flpvi_productcategory_padding_fld(){
	global $flpvi_productcategory_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-productcategory-padding-control" value="'.$flpvi_productcategory_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_productcategory_margin_value = sanitize_text_field(get_option('flpvi-productcategory-margin-control','0px 0px 0px 0px'));
function flpvi_productcategory_margin_fld(){
	global $flpvi_productcategory_margin_value;
	echo '<input type="text" name="flpvi-productcategory-margin-control" value="'.$flpvi_productcategory_margin_value.'"  placeholder="Four values allowed">';
}
// font familly
function flpvi_productcategory_fontfamilly_cb()
{/**
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="flpvi-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("flpvi-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php */
}
// Post Categories hover style input
// Color
$flpvi_productcategory_hover_color_value = sanitize_text_field(get_option('flpvi-productcategory-hover-color-control')); // add a default color using comma
function flpvi_productcategory_hover_color_fld(){
	global $flpvi_productcategory_hover_color_value;
	echo'<input type="color" class="color-field" name="flpvi-productcategory-hover-color-control" id="flpvi-productcategory-hover-color-control" value="'.$flpvi_productcategory_hover_color_value.'" >';
}
// BG Color
$flpvi_productcategory_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-productcategory-hover-bgcolor-control'));
function flpvi_productcategory_hover_bgcolor_fld(){
	global $flpvi_productcategory_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-productcategory-hover-bgcolor-control" id="flpvi-productcategory-hover-color-bgcontrol" value="'.$flpvi_productcategory_hover_bgcolor_value.'" >';
}
// Size
$flpvi_productcategory_hover_size_value = sanitize_text_field(get_option('flpvi-productcategory-hover-size-control','0px 0px 0px 0px'));
function flpvi_productcategory_hover_size_fld(){
	global $flpvi_productcategory_hover_size_value;
	echo '<input type="text" name="flpvi-productcategory-hover-size-control" value="'.$flpvi_productcategory_hover_size_value.'"  placeholder="0px">';
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
		<option value="<?php echo $left ?>" <?php selected($flpvi_producttags_align_value,$left); ?>><?php _e('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($flpvi_producttags_align_value,$center); ?>><?php _e('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($flpvi_producttags_align_value,$right); ?>><?php _e('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_producttags_color_value = sanitize_text_field(get_option('flpvi-producttags-color-control')); // add a default color using comma
function flpvi_producttags_color_fld(){
	global $flpvi_producttags_color_value;
	echo'<input type="color" class="color-field" name="flpvi-producttags-color-control" id="flpvi-producttags-color-control" value="'.$flpvi_producttags_color_value.'" >';
}
// BG Color
$flpvi_producttags_bgcolor_value = sanitize_text_field(get_option('flpvi-producttags-bgcolor-control'));
function flpvi_producttags_bgcolor_fld(){
	global $flpvi_producttags_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-producttags-bgcolor-control" id="flpvi-producttags-color-bgcontrol" value="'.$flpvi_producttags_bgcolor_value.'" >';
}
// Size
$flpvi_producttags_size_value = sanitize_text_field(get_option('flpvi-producttags-size-control','0px 0px 0px 0px'));
function flpvi_producttags_size_fld(){
	global $flpvi_producttags_size_value;
	echo '<input type="text" name="flpvi-producttags-size-control" value="'.$flpvi_producttags_size_value.'"  placeholder="0px">';
}
// padding
$flpvi_producttags_padding_value = sanitize_text_field(get_option('flpvi-producttags-padding-control','0px 0px 0px 0px'));
function flpvi_producttags_padding_fld(){
	global $flpvi_producttags_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-producttags-padding-control" value="'.$flpvi_producttags_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_producttags_margin_value = sanitize_text_field(get_option('flpvi-producttags-margin-control','0px 0px 0px 0px'));
function flpvi_producttags_margin_fld(){
	global $flpvi_producttags_margin_value;
	echo '<input type="text" name="flpvi-producttags-margin-control" value="'.$flpvi_producttags_margin_value.'"  placeholder="Four values allowed">';
}
// font familly
function flpvi_producttags_fontfamilly_cb()
{/**
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="flpvi-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("flpvi-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php */
}
// Post Tags hover style input
// Color
$flpvi_producttags_hover_color_value = sanitize_text_field(get_option('flpvi-producttags-hover-color-control')); // add a default color using comma
function flpvi_producttags_hover_color_fld(){
	global $flpvi_producttags_hover_color_value;
	echo'<input type="color" class="color-field" name="flpvi-producttags-hover-color-control" id="flpvi-producttags-hover-color-control" value="'.$flpvi_producttags_hover_color_value.'" >';
}
// BG Color
$flpvi_producttags_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-producttags-hover-bgcolor-control'));
function flpvi_producttags_hover_bgcolor_fld(){
	global $flpvi_producttags_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-producttags-hover-bgcolor-control" id="flpvi-producttags-hover-color-bgcontrol" value="'.$flpvi_producttags_hover_bgcolor_value.'" >';
}
// Size
$flpvi_producttags_hover_size_value = sanitize_text_field(get_option('flpvi-producttags-hover-size-control','0px 0px 0px 0px'));
function flpvi_producttags_hover_size_fld(){
	global $flpvi_producttags_hover_size_value;
	echo '<input type="text" name="flpvi-producttags-hover-size-control" value="'.$flpvi_producttags_hover_size_value.'"  placeholder="0px">';
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
		<option value="<?php echo $left ?>" <?php selected($flpvi_relpro_fetuimg_align_value,$left); ?>><?php _e('Left','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($flpvi_relpro_fetuimg_align_value,$right); ?>><?php _e('Right','flexi-post-view'); ?></option>
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
	echo'<input type="text" class="color-field" name="flpvi-relpro-fetuimg-brdrtype-control" id="flpvi-relpro-fetuimg-brdrtype-control" value="'.$flpvi_relpro_fetuimg_brdrtype_value.'" >';
}
// Border color
$flpvi_relpro_fetuimg_border_clr_check_value = sanitize_text_field(get_option('flpvi-relpro-fetuimg-border-clr-control','false'));
function flpvi_relpro_fetuimg_border_clr_fld(){
	global $flpvi_relpro_fetuimg_border_clr_check_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-fetuimg-border-clr-control" id="flpvi-relpro-fetuimg-border-clr-control" value="'.$flpvi_relpro_fetuimg_border_clr_check_value.'" >';
}
// Border radius
$flpvi_relpro_fetuimg_bdrrds_value = sanitize_text_field(get_option('flpvi-relpro-fetuimg-bdrrds-control','0px 0px 0px 0px'));
function flpvi_relpro_fetuimg_bdrrds_fld(){
	global $flpvi_relpro_fetuimg_bdrrds_value;
	echo '<input type="text" name="flpvi-relpro-fetuimg-bdrrds-control" value="'.$flpvi_relpro_fetuimg_bdrrds_value.'"  placeholder="0px">';
}
// padding
$flpvi_relpro_fetuimg_padding_value = sanitize_text_field(get_option('flpvi-relpro-fetuimg-padding-control','0px 0px 0px 0px'));
function flpvi_relpro_fetuimg_padding_fld(){
	global $flpvi_relpro_fetuimg_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-relpro-fetuimg-padding-control" value="'.$flpvi_relpro_fetuimg_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_relpro_fetuimg_margin_value = sanitize_text_field(get_option('flpvi-relpro-fetuimg-margin-control','0px 0px 0px 0px'));
function flpvi_relpro_fetuimg_margin_fld(){
	global $flpvi_relpro_fetuimg_margin_value;
	echo '<input type="text" name="flpvi-relpro-fetuimg-margin-control" value="'.$flpvi_relpro_fetuimg_margin_value.'"  placeholder="Four values allowed">';
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
		<option value="<?php echo $left ?>" <?php selected($flpvi_relpro_producttitle_align_value,$left); ?>><?php _e('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($flpvi_relpro_producttitle_align_value,$center); ?>><?php _e('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($flpvi_relpro_producttitle_align_value,$right); ?>><?php _e('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_relpro_producttitle_color_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-color-control')); // add a default color using comma
function flpvi_relpro_producttitle_color_fld(){
	global $flpvi_relpro_producttitle_color_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-producttitle-color-control" id="flpvi-relpro-producttitle-color-control" value="'.$flpvi_relpro_producttitle_color_value.'" >';
}
// BG Color
$flpvi_relpro_producttitle_bgcolor_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-bgcolor-control'));
function flpvi_relpro_producttitle_bgcolor_fld(){
	global $flpvi_relpro_producttitle_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-producttitle-bgcolor-control" id="flpvi-relpro-producttitle-color-bgcontrol" value="'.$flpvi_relpro_producttitle_bgcolor_value.'" >';
}
// Size
$flpvi_relpro_producttitle_size_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-size-control','0px 0px 0px 0px'));
function flpvi_relpro_producttitle_size_fld(){
	global $flpvi_relpro_producttitle_size_value;
	echo '<input type="text" name="flpvi-relpro-producttitle-size-control" value="'.$flpvi_relpro_producttitle_size_value.'"  placeholder="0px">';
}
// padding
$flpvi_relpro_producttitle_padding_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-padding-control','0px 0px 0px 0px'));
function flpvi_relpro_producttitle_padding_fld(){
	global $flpvi_relpro_producttitle_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-relpro-producttitle-padding-control" value="'.$flpvi_relpro_producttitle_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_relpro_producttitle_margin_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-margin-control','0px 0px 0px 0px'));
function flpvi_relpro_producttitle_margin_fld(){
	global $flpvi_relpro_producttitle_margin_value;
	echo '<input type="text" name="flpvi-relpro-producttitle-margin-control" value="'.$flpvi_relpro_producttitle_margin_value.'"  placeholder="Four values allowed">';
}
// font familly
function flpvi_relpro_producttitle_fontfamilly_cb()
{/**
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="flpvi-relpro-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("flpvi-relpro-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php */
}
// Post Title hover style input
// Color
$flpvi_relpro_producttitle_hover_color_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-hover-color-control')); // add a default color using comma
function flpvi_relpro_producttitle_hover_color_fld(){
	global $flpvi_relpro_producttitle_hover_color_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-producttitle-hover-color-control" id="flpvi-relpro-producttitle-hover-color-control" value="'.$flpvi_relpro_producttitle_hover_color_value.'" >';
}
// BG Color
$flpvi_relpro_producttitle_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-hover-bgcolor-control'));
function flpvi_relpro_producttitle_hover_bgcolor_fld(){
	global $flpvi_relpro_producttitle_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-producttitle-hover-bgcolor-control" id="flpvi-relpro-producttitle-hover-color-bgcontrol" value="'.$flpvi_relpro_producttitle_hover_bgcolor_value.'" >';
}
// Size
$flpvi_relpro_producttitle_hover_size_value = sanitize_text_field(get_option('flpvi-relpro-producttitle-hover-size-control','0px 0px 0px 0px'));
function flpvi_relpro_producttitle_hover_size_fld(){
	global $flpvi_relpro_producttitle_hover_size_value;
	echo '<input type="text" name="flpvi-relpro-producttitle-hover-size-control" value="'.$flpvi_relpro_producttitle_hover_size_value.'"  placeholder="0px">';
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
		<option value="<?php echo $left ?>" <?php selected($flpvi_relpro_productregprice_align_value,$left); ?>><?php _e('Left','flexi-post-view'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($flpvi_relpro_productregprice_align_value,$center); ?>><?php _e('Center','flexi-post-view'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($flpvi_relpro_productregprice_align_value,$right); ?>><?php _e('Right','flexi-post-view'); ?></option>
	</select>
	<?php
}
// Color
$flpvi_relpro_productregprice_color_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-color-control')); // add a default color using comma
function flpvi_relpro_productregprice_color_fld(){
	global $flpvi_relpro_productregprice_color_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-productregprice-color-control" id="flpvi-relpro-productregprice-color-control" value="'.$flpvi_relpro_productregprice_color_value.'" >';
}
// BG Color
$flpvi_relpro_productregprice_bgcolor_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-bgcolor-control'));
function flpvi_relpro_productregprice_bgcolor_fld(){
	global $flpvi_relpro_productregprice_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-productregprice-bgcolor-control" id="flpvi-relpro-productregprice-color-bgcontrol" value="'.$flpvi_relpro_productregprice_bgcolor_value.'" >';
}
// Size
$flpvi_relpro_productregprice_size_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-size-control','0px 0px 0px 0px'));
function flpvi_relpro_productregprice_size_fld(){
	global $flpvi_relpro_productregprice_size_value;
	echo '<input type="text" name="flpvi-relpro-productregprice-size-control" value="'.$flpvi_relpro_productregprice_size_value.'"  placeholder="0px">';
}
// padding
$flpvi_relpro_productregprice_padding_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-padding-control','0px 0px 0px 0px'));
function flpvi_relpro_productregprice_padding_fld(){
	global $flpvi_relpro_productregprice_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-relpro-productregprice-padding-control" value="'.$flpvi_relpro_productregprice_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_relpro_productregprice_margin_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-margin-control','0px 0px 0px 0px'));
function flpvi_relpro_productregprice_margin_fld(){
	global $flpvi_relpro_productregprice_margin_value;
	echo '<input type="text" name="flpvi-relpro-productregprice-margin-control" value="'.$flpvi_relpro_productregprice_margin_value.'"  placeholder="Four values allowed">';
}
// font familly
function flpvi_relpro_productregprice_fontfamilly_cb()
{/**
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="flpvi-relpro-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("flpvi-relpro-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php */
}
// Post Title hover style input
// Color
$flpvi_relpro_productregprice_hover_color_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-hover-color-control')); // add a default color using comma
function flpvi_relpro_productregprice_hover_color_fld(){
	global $flpvi_relpro_productregprice_hover_color_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-productregprice-hover-color-control" id="flpvi-relpro-productregprice-hover-color-control" value="'.$flpvi_relpro_productregprice_hover_color_value.'" >';
}
// BG Color
$flpvi_relpro_productregprice_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-hover-bgcolor-control'));
function flpvi_relpro_productregprice_hover_bgcolor_fld(){
	global $flpvi_relpro_productregprice_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-productregprice-hover-bgcolor-control" id="flpvi-relpro-productregprice-hover-color-bgcontrol" value="'.$flpvi_relpro_productregprice_hover_bgcolor_value.'" >';
}
// Size
$flpvi_relpro_productregprice_hover_size_value = sanitize_text_field(get_option('flpvi-relpro-productregprice-hover-size-control','0px 0px 0px 0px'));
function flpvi_relpro_productregprice_hover_size_fld(){
	global $flpvi_relpro_productregprice_hover_size_value;
	echo '<input type="text" name="flpvi-relpro-productregprice-hover-size-control" value="'.$flpvi_relpro_productregprice_hover_size_value.'"  placeholder="0px">';
}
//------ Post Reg Price style input end

//------ Related Post Sale Price style input start
// Color
$flpvi_relpro_productsaleprice_color_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-color-control')); // add a default color using comma
function flpvi_relpro_productsaleprice_color_fld(){
	global $flpvi_relpro_productsaleprice_color_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-productsaleprice-color-control" id="flpvi-relpro-productsaleprice-color-control" value="'.$flpvi_relpro_productsaleprice_color_value.'" >';
}
// BG Color
$flpvi_relpro_productsaleprice_bgcolor_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-bgcolor-control'));
function flpvi_relpro_productsaleprice_bgcolor_fld(){
	global $flpvi_relpro_productsaleprice_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-productsaleprice-bgcolor-control" id="flpvi-relpro-productsaleprice-color-bgcontrol" value="'.$flpvi_relpro_productsaleprice_bgcolor_value.'" >';
}
// Size
$flpvi_relpro_productsaleprice_size_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-size-control','0px 0px 0px 0px'));
function flpvi_relpro_productsaleprice_size_fld(){
	global $flpvi_relpro_productsaleprice_size_value;
	echo '<input type="text" name="flpvi-relpro-productsaleprice-size-control" value="'.$flpvi_relpro_productsaleprice_size_value.'"  placeholder="0px">';
}
// padding
$flpvi_relpro_productsaleprice_padding_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-padding-control','0px 0px 0px 0px'));
function flpvi_relpro_productsaleprice_padding_fld(){
	global $flpvi_relpro_productsaleprice_padding_value;
	echo '<div class="info-container">
		<input type="text" name="flpvi-relpro-productsaleprice-padding-control" value="'.$flpvi_relpro_productsaleprice_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_relpro_productsaleprice_margin_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-margin-control','0px 0px 0px 0px'));
function flpvi_relpro_productsaleprice_margin_fld(){
	global $flpvi_relpro_productsaleprice_margin_value;
	echo '<input type="text" name="flpvi-relpro-productsaleprice-margin-control" value="'.$flpvi_relpro_productsaleprice_margin_value.'"  placeholder="Four values allowed">';
}
// Related Post sale price hover style input
// Color
$flpvi_relpro_productsaleprice_hover_color_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-hover-color-control')); // add a default color using comma
function flpvi_relpro_productsaleprice_hover_color_fld(){
	global $flpvi_relpro_productsaleprice_hover_color_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-productsaleprice-hover-color-control" id="flpvi-relpro-productsaleprice-hover-color-control" value="'.$flpvi_relpro_productsaleprice_hover_color_value.'" >';
}
// BG Color
$flpvi_relpro_productsaleprice_hover_bgcolor_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-hover-bgcolor-control'));
function flpvi_relpro_productsaleprice_hover_bgcolor_fld(){
	global $flpvi_relpro_productsaleprice_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="flpvi-relpro-productsaleprice-hover-bgcolor-control" id="flpvi-relpro-productsaleprice-hover-color-bgcontrol" value="'.$flpvi_relpro_productsaleprice_hover_bgcolor_value.'" >';
}
// Size
$flpvi_relpro_productsaleprice_hover_size_value = sanitize_text_field(get_option('flpvi-relpro-productsaleprice-hover-size-control','0px 0px 0px 0px'));
function flpvi_relpro_productsaleprice_hover_size_fld(){
	global $flpvi_relpro_productsaleprice_hover_size_value;
	echo '<input type="text" name="flpvi-relpro-productsaleprice-hover-size-control" value="'.$flpvi_relpro_productsaleprice_hover_size_value.'"  placeholder="0px">';
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
add_action('wp_ajax_update_last_installed_section', 'update_last_installed_section');
function update_last_installed_section() {
    $last_installed_section = sanitize_text_field($_POST['last_installed_section']);
    update_option('last_installed_section', $last_installed_section);
    wp_die();
}
?>