<?php
// THIS IS ADMIN SETTINGS (DASHBOARD SETTINGS)

//Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}

// Enqueue Scripts & Stylesheet
function flpvi_admin_enqueue(){
	wp_enqueue_style('flpvi-admin-css', plugins_url('/admin-assets/css/style.css',__FILE__), null, '1.0', 'all');
	wp_enqueue_style('flpvi-admin-tab-css', plugins_url('/admin-assets/css/tab.css',__FILE__), null, '1.0', 'all');
	wp_enqueue_script('flpvi-admin-js', plugins_url('/admin-assets/js/script.js',__FILE__), array('jquery'), '1.0', true);
	wp_enqueue_script('flpvi-admin-reset_scripts', plugins_url('/admin-assets/js/reset_scripts.js',__FILE__), array('jquery'), '1.0', true);
	wp_enqueue_style('fonteee-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3'); // Add Font Awesome stylesheet

	// Enqueue Select2 and Font Awesome
	wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
	wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
	// For icon and font familly
	// wp_enqueue_script('flpvi-admin-font_control', plugins_url('/admin-assets/js/font_control.js',__FILE__), array('jquery'), '1.0', true);
	// wp_enqueue_script('flpvi-admin-icon_control', plugins_url('/admin-assets/js/icon_control.js',__FILE__), array('jquery'), '1.0', true);

	// some cdn for the alert notification design
	if (isset($_GET['page']) && $_GET['page'] === 'flpvi_single_sk') {
		wp_enqueue_style('flpvi-reset-alert-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', null, '1.0', 'all');
		wp_enqueue_script('flpvi-reset-alert-jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('flpvi-reset-alert-scripts', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '1.0', true);
	}
}
add_action('admin_enqueue_scripts','flpvi_admin_enqueue');

//Settings page
function flpvi_menu_settings(){
	add_menu_page( 'Posts Archive Settings', 'Posts Archive', 'manage_options', 'flpvi_single_sk', 'flpvi_settings_cb', 'dashicons-analytics', 57 );
	add_action('admin_init','flpvi_settings');
}
add_action('admin_menu','flpvi_menu_settings');

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
	#################---#######111 Save or register settings start
	//***************---****** Settings start  (Tab)
	//------ General Settings Controls start
	register_setting( // Check Sale
		'flpvi-group',
		'flpvi-breadcrumb-check-gallery'
	);
	register_setting( // Check Sale
		'flpvi-group',
		'flpvi-sale-check-gallery'
	);
	register_setting( // Check featured
		'flpvi-group',
		'flpvi-featured-img-check-gallery'
	);
	register_setting( // Check gallery
		'flpvi-group',
		'flpvi-gallery-img-check-gallery'
	);
	register_setting( // Check Title
		'flpvi-group',
		'flpvi-title-check-gallery'
	);
	register_setting( // Check reg price
		'flpvi-group',
		'flpvi-reg-price-check-gallery'
	);
	register_setting( // Check sale price
		'flpvi-group',
		'flpvi-sale-price-check-gallery'
	);
	register_setting( // Check short description
		'flpvi-group',
		'flpvi-short-description-check-gallery'
	);
	register_setting( // Check categories
		'flpvi-group',
		'flpvi-categories-check-gallery'
	);
	register_setting( // Check tags
		'flpvi-group',
		'flpvi-tags-check-gallery'
	);
	register_setting( // Check quantity
		'flpvi-group',
		'flpvi-quantity-check-gallery'
	);
	register_setting( // Check add to cart
		'flpvi-group',
		'flpvi-addtocart-check-gallery'
	);
	register_setting( // Check description
		'flpvi-group',
		'flpvi-description-check-gallery'
	);

	// Related Posts General Settings Controls start
	register_setting( // Check related posts
		'flpvi-group',
		'flpvi-related-posts-check-gallery'
	);
	register_setting( // related posts top title
		'flpvi-group',
		'flpvi-relpro-toptile-check-gallery'
	);
	register_setting( // related posts image
		'flpvi-group',
		'flpvi-relpro-prodimg-check-gallery'
	);
	register_setting( // related posts img link
		'flpvi-group',
		'flpvi-relpro-imglnk-check-gallery'
	);
	register_setting( // related posts title
		'flpvi-group',
		'flpvi-relpro-prodtitle-check-gallery'
	);
	register_setting( // related posts title link
		'flpvi-group',
		'flpvi-relpro-titlelnk-check-gallery'
	);
	register_setting( // related posts price
		'flpvi-group',
		'flpvi-relpro-prodpric-check-gallery'
	);
	register_setting( // related posts button
		'flpvi-group',
		'flpvi-relpro-button-check-gallery'
	);
	// Related Posts General Settings Controls end
	//------ General Settings Controls end

	//------ Archive Settings start
	register_setting( // Use our style?
		'flpvi-group',
		'flpvi-lb-en-gallery'
	);
	register_setting( // Choose Preset
		'flpvi-group',
		'flpvi-button-position'
	);
	//------ Archive Settings end
	//***************---****** Settings end  (Tab)

	//***************---****** Save Style start  (Tab)
	//------ General style save start
	register_setting(
		'flpvi-group',
		'flpvi-button-fsize'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-bgc'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-hover-bgc'
	);
	register_setting(
		'flpvi-group',
		'flpvi-button-color'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-ps'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-margin'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-btype'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-bs'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-bors'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-bc'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-iconc'
	);
	//------ General style save end

	//------ Breadcrumb style save start
	register_setting(
		'flpvi-group',
		'flpvi-breadalign'
	);
	register_setting(
		'flpvi-group',
		'flpvi-text-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-text-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-breadcrumb-size-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-breadcrumb-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-breadcrumb-margin-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-breadcrumb-icon-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-fontfamilly'
	);
	//------ Breadcrumb style save end
	//***************---****** Save Style end  (Tab)
	#################---#######111 Save or register settings end

	#################---#######222 Section settings start
	add_settings_section(
		'flpvi-header-section-sk',
		'',
		'flpvi_header_section',
		'flpvi_single'
	);
	add_settings_section(
		'flpvi-tab-section-sk',
		'',
		'flpvi_tab_section',
		'flpvi_single'
	);
	//***************---****** All Settings Tab Sections Start
	add_settings_section( //------ Archive Settings Section  (Tab)
		'flpvi-settings-sk',
		'',
		'flpvi_settings_sk',
		'flpvi_single'
	);
	add_settings_section( //------ General Settings Section  (Tab)
		'flpvi-general-settings-sk',
		'',
		'flpvi_general_settings_sk',
		'flpvi_single'
	);
	add_settings_section( //------ General Settings Section [For Related producs] (Tab)
		'flpvi-general-relpro-settings-sk',
		'',
		'flpvi_general_relpro_settings_sk',
		'flpvi_single'
	);
	//***************---****** All Settings Tab Sections end

	//***************---****** All Style Section (Tab) Start
	add_settings_section( //------ general style
		'flpvi-general-style',
		'',
		'flpvi_general_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ breadcrumb style
		'flpvi-breadcrumb-style',
		'',
		'flpvi_breadcrumb_style_cb',
		'flpvi_single'
	);
	//***************---****** All Style Section (Tab) end
	add_settings_section(
		'flpvi-view-wrapper-style',
		'',
		'flpvi_view_wrapper',
		'flpvi_single'
	);
	add_settings_section(
		'flpvi-lb',
		'',
		'flpvi_lb_cb',
		'flpvi_single'
	);
	#################---#######222 Section settings end

	#################---#######333 Settings field start
	//***************---****** Settings inputs start (Tab)
	//------ Archive Settings start
	add_settings_field( // Use our style?
		'flpvi-lb-en-gallery',
		__('Use our style?','flexi-post-view'),
		'flpvi_lb_en_gallery_cb',
		'flpvi_single',
		'flpvi-settings-sk'
	);
	add_settings_field( // Choose Preset
		'flpvi-button-position',
		__('Choose Preset','flexi-post-view'),
		'flpvi_button_position_cb',
		'flpvi_single',
		'flpvi-settings-sk'
	);
	//------ Archive Settings start

	//------ General Settings Controls start
	add_settings_field( // Check breadcrumb
		'flpvi-breadcrumb-check-gallery',
		__('Breadcrumb?','flexi-post-view'),
		'flpvi_breadcrumb_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Sale
		'flpvi-sale-check-gallery',
		__('Check Sale','flexi-post-view'),
		'flpvi_sale_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check featured
		'flpvi-featured-img-check-gallery',
		__('Featured?','flexi-post-view'),
		'flpvi_featured_img_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check gallery
		'flpvi-gallery-img-check-gallery',
		__('Gallery?','flexi-post-view'),
		'flpvi_gallery_img_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Title
		'flpvi-title-check-gallery',
		__('Check Title','flexi-post-view'),
		'flpvi_title_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Reqular Price
		'flpvi-reg-price-check-gallery',
		__('Reqular Price','flexi-post-view'),
		'flpvi_reg_price_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Sale Price
		'flpvi-sale-price-check-gallery',
		__('Sale Price','flexi-post-view'),
		'flpvi_sale_price_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Short Description?
		'flpvi-short-description-check-gallery',
		__('Short Description?','flexi-post-view'),
		'flpvi_short_description_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Categories
		'flpvi-categories-check-gallery',
		__('Categories?','flexi-post-view'),
		'flpvi_categories_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Tags
		'flpvi-tags-check-gallery',
		__('Tags?','flexi-post-view'),
		'flpvi_tags_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check quantity
		'flpvi-quantity-check-gallery',
		__('Quantity Count','flexi-post-view'),
		'flpvi_quantity_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check add to cart
		'flpvi-addtocart-check-gallery',
		__('Add To Cart?','flexi-post-view'),
		'flpvi_addtocart_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check description
		'flpvi-description-check-gallery',
		__('Description?','flexi-post-view'),
		'flpvi_description_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	// Related Posts General Settings Controls start
	add_settings_field( // Check related posts
		'flpvi-related-posts-check-gallery',
		__('Related Posts','flexi-post-view'),
		'flpvi_related_products_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts Top Title
		'flpvi-relpro-toptile-check-gallery',
		__('Top Title','flexi-post-view'),
		'flpvi_relpro_toptile_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);

	add_settings_field( // Related Posts Image
		'flpvi-relpro-prodimg-check-gallery',
		__('Post Image','flexi-post-view'),
		'flpvi_relpro_prodimg_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts Image link
		'flpvi-relpro-imglnk-check-gallery',
		__('Image Link','flexi-post-view'),
		'flpvi_relpro_imglnk_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts Title
		'flpvi-relpro-prodtitle-check-gallery',
		__('Post Title','flexi-post-view'),
		'flpvi_relpro_prodtitle_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts Title link
		'flpvi-relpro-titlelnk-check-gallery',
		__('Title Link','flexi-post-view'),
		'flpvi_relpro_titlelnk_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts price
		'flpvi-relpro-prodpric-check-gallery',
		__('Post Price','flexi-post-view'),
		'flpvi_relpro_prodpric_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts button
		'flpvi-relpro-button-check-gallery',
		__('Button','flexi-post-view'),
		'flpvi_relpro_button_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	// Related Posts General Settings Controls end
	//------ General Settings Controls end
	//***************---****** Settings inputs end (Tab)

	//***************---****** Style inputs start (Tab)
	//------ General style controls start
	add_settings_field(
		'flpvi-button-fsize',
		__('Font Size','flexi-post-view'),
		'flpvi_button_fsize_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-bgc',
		__('Title Color','flexi-post-view'),
		'flpvi_btn_bgc_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-hover-bgc',
		__('Hover Title Color','flexi-post-view'),
		'flpvi_btn_hover_bgc_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-button-color',
		__('Text Color','flexi-post-view'),
		'flpvi_button_color_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-ps',
		__('Title Padding','flexi-post-view'),
		'flpvi_btn_ps_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-margin',
		__('Title Margin','flexi-post-view'),
		'flpvi_btn_margin_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-btype',
		__('Border Style','flexi-post-view'),
		'flpvi_btn_btype_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-bs',
		__('Border Size','flexi-post-view'),
		'flpvi_btn_bs_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-bors',
		__('Border Radius','flexi-post-view'),
		'flpvi_btn_bors',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-bc',
		__('Border Color','flexi-post-view'),
		'flpvi_btn_bc_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-iconc',
		__('Icon Color','flexi-post-view'),
		'flpvi_btn_iconc_cb',
		'flpvi_single',
		'flpvi-general-style'
	);
	//------ General style controls end

	//------ Breadcrumb style controls start
	add_settings_field(
		'flpvi-breadalign',
		__('Alignment','flexi-post-view'),
		'flpvi_breadalign_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-text-color-control',
		__('Font Color','flexi-post-view'),
		'flpvi_text_color_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-text-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_text_bgcolor_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-breadcrumb-size-control',
		__('Size','flexi-post-view'),
		'flpvi_breadcrumb_size_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-breadcrumb-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_breadcrumb_padding_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-breadcrumb-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_breadcrumb_margin_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-breadcrumb-icon-control',
		__('Icon','flexi-post-view'),
		'flpvi_breadcrumb_icon_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-fontfamilly',
		__('Font Familly','flexi-post-view'),
		'flpvi_fontfamilly_cb',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	//------ Breadcrumb style controls end
	//***************---****** Style inputs end (Tab)
	#################---#######333 Settings field end
}

/* Here custom settings functions registered  */

// This is admin header
function flpvi_header_section(){
	?>
	<div class="flpvi_the_class">
		<div class="flpvi_data flpvi_name"><a class="flpvi_au_title" href="https://bestwpdeveloper.com" target="_blank"><h2 class="flpvi_dashtitle"><?php _e('BEST WP DEVELOPER', 'flexi-post-view'); ?></h2></a></div>
		<div class="flpvi_data flpvi_demo">
			<div class="flpvi_the_author"><a class="flpvi_the_demo" href="https://bestwpdeveloper.com/posts-archive/" target="_blank"><?php _e('Go Demo', 'flexi-post-view'); ?></a></div>
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
			<div id="tab1" onClick="JavaScript:selectTab(1);" class="flpvi_active"><?php _e('Settings', 'flexi-post-view'); ?></div>
			<div id="tab2" onClick="JavaScript:selectTab(2);"><?php _e('Styles', 'flexi-post-view'); ?></div>
		</div>
		<div class="flpvi_save_btn"><?php submit_button(); ?></div>
		<div class="flpvi_save_btn"><input type="button" class="flpvi_settings_reset" onclick="checkReset();" value="Reset All" id="resetButton"></div>
	</div>
	<?php
}
#################---####### Settings start
//***************---****** Archive Sections start
function flpvi_settings_sk(){ //------ Section  (Tab)
	$tab = '<div id="tab1Content">';
	echo $tab.'<div class="flpvi_buttn_setting">'.__('Archive Settings','flexi-post-view').'</div>';
}
function flpvi_general_settings_sk(){  //------ Section  (Tab)
	echo '<div class="flpvi_buttn_setting">'.__('General Settings','flexi-post-view').'</div>';
}
function flpvi_general_relpro_settings_sk(){  //------ Section  (Tab)
	echo '<div class="flpvi_relpro_setting"><b>'.__('Related Posts','flexi-post-view').'</b></div>';
}
//***************---****** Archive Sections end

//***************---****** Archive Settings start
//Enable single post page
$flpvi_lb_en_gallery_value = sanitize_text_field(get_option('flpvi-lb-en-gallery','true'));
function flpvi_lb_en_gallery_cb(){
	global $flpvi_lb_en_gallery_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-lb-en-gallery" name="flpvi-lb-en-gallery" value="true" '.checked('true',$flpvi_lb_en_gallery_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;

}
// Post single page styles
$flpvi_button_position_value = sanitize_text_field( get_option('flpvi-button-position','woocommerce_before_shop_loop_item_title'));
function flpvi_button_position_cb(){
	global $flpvi_button_position_value;
	?>
	<select name="flpvi-button-position" class="flpvi-input" id="flpvi-button-position">
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
}
//***************---****** Archive Settings start

//***************---****** General Settings Controls start
//------ General style input start
// breadcrumb check
$flpvi_breadcrumb_check_value = sanitize_text_field(get_option('flpvi-breadcrumb-check-gallery','false'));
function flpvi_breadcrumb_check_cb(){
	global $flpvi_breadcrumb_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-breadcrumb-check-gallery" name="flpvi-breadcrumb-check-gallery" value="true" '.checked('true',$flpvi_breadcrumb_check_value,false).'><span class="toggle-slider"></span></label>';
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
// sale price check
$flpvi_sale_price_check_value = sanitize_text_field(get_option('flpvi-sale-price-check-gallery','true'));
function flpvi_sale_price_check_cb(){
	global $flpvi_sale_price_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="flpvi-sale-price-check-gallery" name="flpvi-sale-price-check-gallery" value="true" '.checked('true',$flpvi_sale_price_check_value,false).'><span class="toggle-slider"></span></label>';
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
// Related Posts General Settings Controls end
//***************---****** General Settings Controls end
#################---####### Settings end

#################---####### Settings field end
//***************---****** Style control section title start
function flpvi_general_style_cb(){
	$tab = '</div><div id="tab2Content">';
	echo $tab.'<div class="flpvi_buttn_setting" id="general">'.__('General Style Settings','flexi-post-view').'</div>';
	echo '<div>
		<a href="#general">'.__('General').'</a>
		<a href="#breadcrumb">'.__('Breadcrumb').'</a>
	</div>';
}
function flpvi_breadcrumb_style_cb(){
	echo '<div class="flpvi_buttn_setting" id="breadcrumb">'.__('Breadcrumb Style','flexi-post-view').'</div>';
}
//***************---****** Style control section title end

//***************---****** Style inputs start (Tab)
//Font size
$flpvi_button_fsize_value = sanitize_text_field(get_option('flpvi-button-fsize',14));
function flpvi_button_fsize_cb(){
	global $flpvi_button_fsize_value;
	echo  '<input type="number" class="flpvi-input" name="flpvi-button-fsize" id="flpvi-button-fsize" value="'.$flpvi_button_fsize_value.'">';
}

//Button Title Color
$flpvi_btn_bgc_value = sanitize_text_field(get_option('flpvi-btn-bgc','#8f8f8f'));
function flpvi_btn_bgc_cb(){
	global $flpvi_btn_bgc_value;
	echo '<input type="color" class="color-field" name="flpvi-btn-bgc" id="flpvi-btn-bgc" value="'.$flpvi_btn_bgc_value.'" >';
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
	echo '<input type="number" name="flpvi-btn-bs" value="'.$flpvi_btn_bs_value.'">';
}

// Border radius
$flpvi_btn_bors_value = sanitize_text_field(get_option('flpvi-btn-bors','4'));
function flpvi_btn_bors(){
	global $flpvi_btn_bors_value;
	echo '<input type="number" name="flpvi-btn-bors" value="'.$flpvi_btn_bors_value.'" >';
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
	echo '<input type="number" name="flpvi-breadcrumb-size-control" value="'.$flpvi_breadcrumb_size_value.'"  placeholder="0px"> px';
}
// padding
$flpvi_breadcrumb_padding_value = sanitize_text_field(get_option('flpvi-breadcrumb-padding-control','0px 0px 0px 0px'));
function flpvi_breadcrumb_padding_fld(){
	global $flpvi_breadcrumb_padding_value;
	echo '<div class="info-container">
		<input type="number" name="flpvi-breadcrumb-padding-control" value="'.$flpvi_breadcrumb_padding_value.'" placeholder="Four values allowed"> px
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$flpvi_breadcrumb_margin_value = sanitize_text_field(get_option('flpvi-breadcrumb-margin-control','0px 0px 0px 0px'));
function flpvi_breadcrumb_margin_fld(){
	global $flpvi_breadcrumb_margin_value;
	echo '<input type="number" name="flpvi-breadcrumb-margin-control" value="'.$flpvi_breadcrumb_margin_value.'"  placeholder="Four values allowed"> px';
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
    </>
<?php
}
//------ Breadcrumb style input end
//***************---****** Style inputs end (Tab)
#################---####### Settings field end
// Style end
// View wrapper Style
function flpvi_view_wrapper(){
	$tab = '</div><div id="tab4Content">';  //Begin Basic settings
	echo $tab.'<div class="flpvi_buttn_setting">'.__('View wrapper Style','flexi-post-view').'</div>';
}

//Lightbox Section callback
function flpvi_lb_cb(){
	echo '</div><div id="tab3Content">';
	echo '<div class="flpvi_buttn_setting">'.__('Image Settings','flexi-post-view').'</div>';
}


?>