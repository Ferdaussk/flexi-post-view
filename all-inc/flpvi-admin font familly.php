<?php
/**
 * Plugin Name: Posts Archive 2
 * Description: Posts Archive plugin is a post single page for enabling customers to have a quick look at the post without visiting the post page.
 * Plugin URI: https://bestwpdeveloper.com/shop/
 * Version: 1.0
 * Author: Best WP Developer
 * Author URI: https://bestwpdeveloper.com/
 * Text Domain: posts-archive2
 */

//Exit if accessed directly
if(!defined('ABSPATH')){
    return;
}

// Enqueue Scripts & Stylesheet
function flpvi_admin_enqueue(){
    wp_enqueue_style('flpvi-admin-css', plugins_url('/admin-assets/css/style.css',__FILE__), null, '1.0', 'all');
    wp_enqueue_style('flpvi-admin-tab-css', plugins_url('/admin-assets/css/tab.css',__FILE__), null, '1.0', 'all');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3'); // Add Font Awesome stylesheet
    wp_enqueue_script('flpvi-admin-js', plugins_url('/admin-assets/js/script.js',__FILE__), array('jquery'), '1.0', true);
    wp_enqueue_script('flpvi-icon-select', plugins_url('/admin-assets/js/icon-select.js',__FILE__), array('jquery'), '1.0', true); // Include icon-select.js
}
add_action('admin_enqueue_scripts','flpvi_admin_enqueue');

//Settings page
function flpvi_menu_settings(){
    add_menu_page( 'Posts Archive Settings', 'Posts Archive', 'manage_options', 'flpvi_single_sk', 'flpvi_settings_cb', 'dashicons-visibility', 57 );
    add_action('admin_init','flpvi_settings');
}
add_action('admin_menu','flpvi_menu_settings');

function flpvi_settings_cb() {
    // The save button for bottom save
    settings_errors(); ?>
    <div class="flpvi-main-settings">
        <form method="POST" action="options.php" class="flpvi-form">
            <?php settings_fields('flpvi-group'); ?>
            <?php do_settings_sections('flpvi_quickview'); ?>
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
            document.getElementById('flpvi-button-position').value = 'default';
            document.getElementById('flpvi-button-fsize').value = '14';
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
        'flpvi-fontfamilly' // Changed the name to match the font family field
    );

    // Settings start
    // Presets style Settings start
    add_settings_field(
        'flpvi-lb-en-gallery',
        __('Use our style?', 'global-quick-view'),
        'flpvi_lb_en_gallery_cb',
        'flpvi_quickview',
        'flpvi-settings-sk'
    );

    add_settings_field(
        'flpvi-button-position',
        __('Choose Preset', 'global-quick-view'),
        'flpvi_button_position_cb',
        'flpvi_quickview',
        'flpvi-settings-sk'
    );

    add_settings_field(
        'flpvi-button-fsize',
        __('Font Size', 'global-quick-view'),
        'flpvi_button_fsize_cb',
        'flpvi_quickview',
        'flpvi-settings-sk'
    );
    add_settings_field(
        'flpvi-fontfamilly',
        __('Font Family', 'global-quick-view'),
        'flpvi_fontfamilly_cb',
        'flpvi_quickview',
        'flpvi-settings-sk'
    );

    add_settings_section(
        'flpvi-settings-sk',
        '',
        'flpvi_settings_sk',
        'flpvi_quickview'
    );
}

function flpvi_settings_sk() {
    $tab = '<div id="tab1Content">';
    echo $tab.'<h2 class="flpvi_buttn_setting">'.__('Archive Settings', 'global-quick-view').'</h2>';
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
    <select name="flpvi-button-position" class="flpvi-input">
        <?php $default = 'default'; ?>
        <option value="<?php echo $default ?>" <?php selected($flpvi_button_position_value, $default); ?>><?php _e('Default', 'global-quick-view'); ?></option>
        <?php $style2 = 'style2'; ?>
        <option value="<?php echo $style2 ?>" <?php selected($flpvi_button_position_value, $style2); ?>><?php _e('Style 2', 'global-quick-view'); ?></option>
        <?php $style3 = 'style3'; ?>
        <option value="<?php echo $style3 ?>" <?php selected($flpvi_button_position_value, $style3); ?>><?php _e('Style 3', 'global-quick-view'); ?></option>
        <?php $style4 = 'style4'; ?>
        <option value="<?php echo $style4 ?>" <?php selected($flpvi_button_position_value, $style4); ?>><?php _e('Style 4', 'global-quick-view'); ?></option>
        <?php $style5 = 'style5'; ?>
        <option value="<?php echo $style5 ?>" <?php selected($flpvi_button_position_value, $style5); ?>><?php _e('Style 5', 'global-quick-view'); ?></option>
    </select>
    <?php
}

$flpvi_button_fsize_value = sanitize_text_field(get_option('flpvi-button-fsize', 14));

function flpvi_button_fsize_cb() {
    global $flpvi_button_fsize_value;
    $html = '<input type="number" class="flpvi-input" name="flpvi-button-fsize" value="'.$flpvi_button_fsize_value.'">';
    echo $html.'</br>';
    echo __('Button size (Text and Icon Size). Eg:- 13, 15, 20 Number', 'global-quick-view');
}

// add here the icon select option

// Lightbox Section callback
function flpvi_fontfamilly_cb(){
	// Enqueue Select2 and Font Awesome
	wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
	wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
	?>
	<div class="wrap">
			<h1>Font Family Control</h1>
			<label for="selected_font">Select a Font Family:</label>
			<select id="selected_font" name="flpvi-fontfamilly" style="width: 200px;">
					<!-- Font families will be dynamically populated using JavaScript -->
			</select>
			<div id="font_preview" style="font-size: 24px; margin-top: 20px;">
					Font Family Preview Text
			</div>
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

add_action('admin_menu','flpvi_menu_settings');
