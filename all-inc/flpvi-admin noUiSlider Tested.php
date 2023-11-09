<?php
// Enqueue Scripts & Stylesheet
function flpvi_admin_enqueue()
{
  wp_enqueue_style('nouislider', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css');
  wp_enqueue_script('nouislider', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js', array('jquery'), '15.5.0', true);
}
add_action('admin_enqueue_scripts', 'flpvi_admin_enqueue');

// Settings page
function flpvi_menu_settings()
{
  // I can add a condition for all main menu assets with the flpvi_single_sk value
  add_menu_page('Posts Archive Settings', 'Posts Archive', 'manage_options', 'flpvi_single_sk', 'flpvi_settings_cb', 'dashicons-visibility', 57);
  add_action('admin_init', 'flpvi_settings');
}
add_action('admin_menu', 'flpvi_menu_settings');

function flpvi_settings_cb()
{
  // The save button for bottom save
  settings_errors();
  ?>
  <div class="flpvi-main-settings">
    <form method="POST" action="options.php" class="flpvi-form">
      <?php settings_fields('flpvi-group'); ?>
      <?php do_settings_sections('flpvi_quickview'); ?>
      <?php
      echo '</div><div class="flpvi-save-btn">';
      submit_button();
      echo '</div>';
      echo '<div class="flpvi_save_btn"><input type="button" class="flpvi_settings_reset" onclick="resetSlider();" value="Reset All" id="resetButton"></div>';
      ?>
    </form>
  </div>
  <div id="tab1Content">
    <h2 class="flpvi_buttn_setting"><?php _e('Archive Settings', 'global-quick-view'); ?></h2>
    <?php
    // Output the noUi Slider
    flpvi_nouislider_cb();
    ?>
  </div>
  <?php
}

// All custom settings and register all custom controls
function flpvi_settings()
{
  register_setting(
    'flpvi-group',
    'flpvi-nouislider'
    // 'sanitize_flpvi_nouislider' // Add a callback for sanitizing the slider value
  );
  // Settings start
  add_settings_section(
    'flpvi-settings-sk',
    '',
    'flpvi_settings_sk',
    'flpvi_quickview'
  );
  add_settings_field(
    'flpvi-nouislider',
    __('noUi Slider', 'global-quick-view'),
    'flpvi_nouislider_cb', // Updated callback function for the noUiSlider
    'flpvi_quickview',
    'flpvi-settings-sk'
  );
}

function flpvi_settings_sk(){
  echo '<div class="nameFerdaus">ff</div>';
}

// Lightbox Section callback
function flpvi_nouislider_cb(){
  $default_value = 50; // Set your desired default value here.
  $slider_value = get_option('flpvi-nouislider', $default_value); // Get the saved value or use the default if not set.
  ?>
  <div class="noUi_Slider" id="flpvi-nouislider"></div>
  <input type="hidden" name="flpvi-nouislider" id="flpvi-nouislider-value" value="<?php echo esc_attr($slider_value); ?>" />
  <div class="noUi_Slider_Tooltips" id="flpvi-nouislider-tooltips"></div>
  <script>
    // Initialize the noUiSlider
    document.addEventListener('DOMContentLoaded', function() {
      var slider = document.getElementById('flpvi-nouislider');
      var sliderValue = document.getElementById('flpvi-nouislider-value');
      var sliderTooltips = document.getElementById('flpvi-nouislider-tooltips');
      var defaultValue = <?php echo esc_js($default_value); ?>; // Use the default value here.

      noUiSlider.create(slider, {
        start: [parseInt(sliderValue.value)], // Use the saved value or default value.
        step: 1,
        range: {
          'min': 0,
          'max': 100,
        },
        tooltips: {
          to: function(value) {
            return parseInt(value) + 'px';
          },
          from: function(value) {
            return parseInt(value);
          }
        }
      });

      // Update the hidden input value and tooltip on slider change
      slider.noUiSlider.on('update', function(values, handle) {
        sliderValue.value = values[handle];
        sliderTooltips.innerText = parseInt(values[handle]) + 'px';
      });

      // Reset the slider to its initial value
      function resetSlider() {
        slider.noUiSlider.set(defaultValue);
        sliderValue.value = defaultValue;
        sliderTooltips.innerText = defaultValue + 'px';
      }
      
      // Attach the reset function to the reset button
      document.getElementById('resetButton').addEventListener('click', resetSlider);
    });
  </script>
  <?php
}

// Test style css start
function flpvi_others_styles(){
  $slider_value = get_option('flpvi-nouislider', 50);
	global $flpvi_button_position_value,$flpvi_btn_bgc_value,$flpvi_relpro_productsaleprice_hover_bgcolor_value, $slider_value;
	$html = "<style>
	.ferdaus01010{
		color:{$flpvi_btn_bgc_value};
			}
			h2.entry-title{
				color:{$flpvi_relpro_productsaleprice_hover_bgcolor_value};
			}
			h2.entry-title{
				front-size:{$slider_value}px;
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
// add_action('wp_head','flpvi_others_styles',99);
// Test style css end

function sanitize_flpvi_nouislider($input) {
  return absint($input);
}
// just i want to echo this $slider_value in this flpvi_others_styles function