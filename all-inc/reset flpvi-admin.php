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
	wp_enqueue_script('flpvi-admin-reset_scripts', plugins_url('/admin-assets/js/reset_scripts.js',__FILE__), array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts','flpvi_admin_enqueue');

//Settings page
function flpvi_menu_settings(){
	add_menu_page( 'Posts Archive Settings', 'Posts Archive', 'manage_options', 'flpvi_single_sk', 'flpvi_settings_cb', 'dashicons-analytics', 57 );
	add_action('admin_init','flpvi_settings');
}
add_action('admin_menu','flpvi_menu_settings');

//Settings callback function
function flpvi_settings_cb() {
	// The save button for bottom save
	settings_errors(); ?>
	<div class="flpvi-main-settings">
		<form method="POST" action="options.php" class="flpvi-form">
			<?php settings_fields('flpvi-group'); ?>
			<?php do_settings_sections('flpvi_single'); ?>
			<?php
				echo '</div><div class="flpvi-save-btn">';
				submit_button();
				echo '</div><input type="button" onclick="resetFields()" value="Reset" id="resetButton">';
			?>
		</form>
	</div>
	<script>
		function resetFields() {
			document.getElementById('flpvi-lb-en-gallery').checked = false;
			document.getElementById('flpvi-button-position').selectedIndex = 0;
			document.getElementById('flpvi-button-fsize').value = '14';
			document.getElementById('flpvi-button-color').value = '#ffffff';
		}
	</script>
<?php
}

// All custom settings and register all custom controls
function flpvi_settings() {
	// Single post page check
	register_setting(
		'flpvi-group',
		'flpvi-lb-en-gallery'
	);

	register_setting(
		'flpvi-group',
		'flpvi-button-position'
	);

	register_setting(
		'flpvi-group',
		'flpvi-button-fsize'
	);

	register_setting(
		'flpvi-group',
		'flpvi-button-color'
	);

	// Settings start
	// Presets style Settings start
	add_settings_field(
		'flpvi-lb-en-gallery',
		__('Use our style?', 'flexi-post-view'),
		'flpvi_lb_en_gallery_cb',
		'flpvi_single',
		'flpvi-settings-sk'
	);

	add_settings_field(
		'flpvi-button-position',
		__('Choose Preset', 'flexi-post-view'),
		'flpvi_button_position_cb',
		'flpvi_single',
		'flpvi-settings-sk'
	);

	add_settings_field(
		'flpvi-button-fsize',
		__('Font Size', 'flexi-post-view'),
		'flpvi_button_fsize_cb',
		'flpvi_single',
		'flpvi-settings-sk'
	);
	
	add_settings_field(
		'flpvi-button-color',
		__('Button Color', 'flexi-post-view'),
		'flpvi_button_color_cb',
		'flpvi_single',
		'flpvi-settings-sk'
	);

	add_settings_section(
		'flpvi-settings-sk',
		'',
		'flpvi_settings_sk',
		'flpvi_single'
	);
}

function flpvi_settings_sk() {
	$tab = '<div id="tab1Content">';
	echo $tab.'<h2 class="flpvi_buttn_setting">'.__('Archive Settings', 'flexi-post-view').'</h2>';
}

// Enable single post page
$flpvi_lb_en_gallery_value = sanitize_text_field(get_option('flpvi-lb-en-gallery', 'true'));

function flpvi_lb_en_gallery_cb() {
	global $flpvi_lb_en_gallery_value;
	$html = '<input type="checkbox" id="flpvi-lb-en-gallery" name="flpvi-lb-en-gallery" value="true" '.checked('true', $flpvi_lb_en_gallery_value, false).'>';
	echo $html;
}

$flpvi_button_position_value = sanitize_text_field(get_option('flpvi-button-position', 'woocommerce_before_shop_loop_item_title'));

function flpvi_button_position_cb() {
	global $flpvi_button_position_value;
	?>
	<select name="flpvi-button-position" class="flpvi-input" id="flpvi-button-position">
		<?php $default = 'default'; ?>
		<option value="<?php echo $default ?>" <?php selected($flpvi_button_position_value, $default); ?>><?php _e('Default', 'flexi-post-view'); ?></option>
		<?php $style2 = 'style2'; ?>
		<option value="<?php echo $style2 ?>" <?php selected($flpvi_button_position_value, $style2); ?>><?php _e('Style 2', 'flexi-post-view'); ?></option>
		<?php $style3 = 'style3'; ?>
		<option value="<?php echo $style3 ?>" <?php selected($flpvi_button_position_value, $style3); ?>><?php _e('Style 3', 'flexi-post-view'); ?></option>
		<?php $style4 = 'style4'; ?>
		<option value="<?php echo $style4 ?>" <?php selected($flpvi_button_position_value, $style4); ?>><?php _e('Style 4', 'flexi-post-view'); ?></option>
		<?php $style5 = 'style5'; ?>
		<option value="<?php echo $style5 ?>" <?php selected($flpvi_button_position_value, $style5); ?>><?php _e('Style 5', 'flexi-post-view'); ?></option>
	</select>
	<?php
}

$flpvi_button_fsize_value = sanitize_text_field(get_option('flpvi-button-fsize', 14));

function flpvi_button_fsize_cb() {
	global $flpvi_button_fsize_value;
	$html = '<input type="number" class="flpvi-input" name="flpvi-button-fsize" id="flpvi-button-fsize" value="'.$flpvi_button_fsize_value.'">';
	echo $html.'</br>';
	echo __('Button size (Text and Icon Size). Eg:- 13, 15, 20 Number', 'flexi-post-view');
}

$flpvi_button_color_value = sanitize_text_field(get_option('flpvi-button-color', 'white'));

function flpvi_button_color_cb() {
	global $flpvi_button_color_value;
	$html = '<input type="color" class="color-field" name="flpvi-button-color" id="flpvi-button-color" value="'.$flpvi_button_color_value.'" >';
	echo $html.'</br>';
	echo __('Select your color here.', 'flexi-post-view');
}



?>