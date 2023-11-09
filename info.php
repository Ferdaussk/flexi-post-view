<?php

function flpvi_relpro_relpro_relpro_relpro_button_position_cb() {
  global $flpvi_relpro_relpro_relpro_relpro_button_position_value;
  ?>
  <select name="flpvi-relpro-relpro-relpro-relpro-relpro-button-position" class="flpvi-relpro-relpro-relpro-relpro-relpro-input">
      <option value="woocommerce_before_shop_loop_item_title" <?php selected($flpvi_relpro_relpro_relpro_relpro_button_position_value, 'woocommerce_before_shop_loop_item_title'); ?>><?php _e('After post image', 'global-quick-view'); ?></option>
      <option value="woocommerce_shop_loop_item_title" <?php selected($flpvi_relpro_relpro_relpro_relpro_button_position_value, 'woocommerce_shop_loop_item_title'); ?>><?php _e('After post title', 'global-quick-view'); ?></option>
      <option value="woocommerce_after_shop_loop_item_title" <?php selected($flpvi_relpro_relpro_relpro_relpro_button_position_value, 'woocommerce_after_shop_loop_item_title'); ?>><?php _e('After post price', 'global-quick-view'); ?></option>
      <option value="woocommerce_after_shop_loop_item" <?php selected($flpvi_relpro_relpro_relpro_relpro_button_position_value, 'woocommerce_after_shop_loop_item'); ?>><?php _e('After post cart button', 'global-quick-view'); ?></option>
      <option value="image_hover" <?php selected($flpvi_relpro_relpro_relpro_relpro_button_position_value, 'image_hover'); ?>><?php _e('On Image hover', 'global-quick-view'); ?></option>
  </select>
  <p class="description imgh-alert"><?php echo __('Quick view button position.', 'global-quick-view'); ?></p>
  <?php
}



// Define the action and name of the reset button.
$action = 'reset';
$name = 'reset';
// Add the reset button to the form.
echo '<form method="post">
  <input type="hidden" name="action" value="' . esc_attr($action) . '" />
  <input type="submit" name="' . esc_attr($name) . '" value="Reset" class="button-secondary" />
</form>';





// A new related posts query
// The ChatGPT Title is "Related Posts Code" VVVV

// Get the upsell and cross-sell IDs
$upsell_ids = $post->get_upsell_ids();
$cross_sell_ids = $post->get_cross_sell_ids();

// Merge and limit upsell and cross-sell IDs
$related_ids = array_merge($upsell_ids, $cross_sell_ids);
$related_ids = array_slice($related_ids, 0, 1); // Limit the number of related posts to display

// IDs of posts to exclude from related posts
$exclude_ids = array(1, 2, 3); // Add the IDs of posts you want to exclude here

// Remove excluded IDs from the related_ids array
$related_ids = array_diff($related_ids, $exclude_ids);

// Define the maximum word length for the short description
$max_word_length = 20;

// Display related posts
if (!empty($related_ids)) {
    echo '<h2>' . esc_html__('Related Posts', PROJECT_ROOT) . '</h2>';
    echo '<ul class="post-list">';
    foreach ($related_ids as $related_id) {
        $related_product = wc_get_product($related_id);
        
        // Calculate sale percentage
        $regular_price = $related_product->get_regular_price();
        $sale_price = $related_product->get_sale_price();
        $sale_percentage = ($regular_price && $sale_price) ? round((($regular_price - $sale_price) / $regular_price) * 100) : 0;
        
        // Get the average rating for the post
        $average_rating = $related_product->get_average_rating();

        echo '<li>';
        echo '<span class="sale-percentage">' . $sale_percentage . '% OFF</span>'; // Display sale percentage
        
        echo '<a href="' . esc_url($related_product->get_permalink()) . '">';
        echo '<div class="post-image">' . $related_product->get_image() . '</div>';
        echo '<h3>' . $related_product->get_name() . '</h3>';

        // Get the short description and trim it if needed
        $short_description = $related_product->get_short_description();
        $words = explode(' ', $short_description);
        if (count($words) > $max_word_length) {
            $trimmed_description = implode(' ', array_slice($words, 0, $max_word_length)) . '...';
            echo '<p class="short-description">' . $trimmed_description . '</p>'; // Display trimmed short description with "..." indicator
        } else {
            echo '<p class="short-description">' . $short_description . '</p>'; // Display full short description
        }

        // Display the star rating
        if ($average_rating > 0) {
            echo '<div class="star-rating" title="' . sprintf(__('Rated %s out of 5', 'woocommerce'), $average_rating) . '">';
            woocommerce_template_loop_rating();
            echo '</div>';
        }

        echo '<span class="price">' . $related_product->get_price_html() . '</span>';
        echo '</a>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>' . esc_html__('No related posts found.', PROJECT_ROOT) . '</p>'; // The message should not show
}





echo '<select id="flpvi-fontfamilly" name="flpvi-fontfamilly">';
	echo '<option value="">'.esc_html__('Default u','flexi-post-view').'</option>';
	$Arial = 'Arial, sans-serif';
	echo '<option value="'.esc_attr($Arial).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Arial)).'>'.esc_html__('Arial','flexi-post-view').'</option>';
	$Helvetica = 'Helvetica, sans-serif';
	echo '<option value="'.esc_attr($Helvetica).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Helvetica)).'>'.esc_html__('Helvetica','flexi-post-view').'</option>';
	$Georgia = 'Georgia, serif';
	echo '<option value="'.esc_attr($Georgia).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Georgia)).'>'.esc_html__('Georgia','flexi-post-view').'</option>';
	$fantasy = 'fantasy';
	echo '<option value="'.esc_attr($fantasy).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($fantasy)).'>'.esc_html__('Fantasy','flexi-post-view').'</option>';
	$Tahoma = 'Tahoma, sans-serif';
	echo '<option value="'.esc_attr($Tahoma).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Tahoma)).'>'.esc_html__('Tahoma','flexi-post-view').'</option>';
	$Courier = 'Courier New, monospace';
	echo '<option value="'.esc_attr($Courier).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Courier)).'>'.esc_html__('Courier New','flexi-post-view').'</option>';
	$Palatino = 'Palatino, serif';
	echo '<option value="'.esc_attr($Palatino).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Palatino)).'>'.esc_html__('Palatino','flexi-post-view').'</option>';
	$Garamond = 'Garamond, serif';
	echo '<option value="'.esc_attr($Garamond).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Garamond)).'>'.esc_html__('Garamond','flexi-post-view').'</option>';
	$Century = 'Century Gothic, sans-serif';
	echo '<option value="'.esc_attr($Century).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Century)).'>'.esc_html__('Century Gothic','flexi-post-view').'</option>';
	$Futura = 'Futura, sans-serif';
	echo '<option value="'.esc_attr($Futura).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Futura)).'>'.esc_html__('Futura','flexi-post-view').'</option>';
	$Roboto = 'Roboto, sans-serif';
	echo '<option value="'.esc_attr($Roboto).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Roboto)).'>'.esc_html__('Roboto','flexi-post-view').'</option>';
	$Open_Sans = 'Open Sans, sans-serif';
	echo '<option value="'.esc_attr($Open_Sans).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Open_Sans)).'>'.esc_html__('Open Sans','flexi-post-view').'</option>';
	$Lato = 'Lato, sans-serif';
	echo '<option value="'.esc_attr($Lato).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Lato)).'>'.esc_html__('Lato','flexi-post-view').'</option>';
	$Montserrat = 'Montserrat, sans-serif';
	echo '<option value="'.esc_attr($Montserrat).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Montserrat)).'>'.esc_html__('Montserrat','flexi-post-view').'</option>';
	$Raleway = 'Raleway, sans-serif';
	echo '<option value="'.esc_attr($Raleway).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Raleway)).'>'.esc_html__('Raleway','flexi-post-view').'</option>';
	$Poppins = 'Poppins, sans-serif';
	echo '<option value="'.esc_attr($Poppins).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Poppins)).'>'.esc_html__('Poppins','flexi-post-view').'</option>';
	$Nunito = 'Nunito, sans-serif';
	echo '<option value="'.esc_attr($Nunito).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Nunito)).'>'.esc_html__('Nunito','flexi-post-view').'</option>';
	$Playfair = 'Playfair Display, serif';
	echo '<option value="'.esc_attr($Playfair).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Playfair)).'>'.esc_html__('Playfair Display','flexi-post-view').'</option>';
	$Quicksand = 'Quicksand, sans-serif';
	echo '<option value="'.esc_attr($Quicksand).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($Quicksand)).'>'.esc_html__('Quicksand','flexi-post-view').'</option>';
echo '</select>';
$all_fonts = [
	'Arial, sans-serif' => 'Arial',
	'Helvetica, sans-serif' => '',
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
	echo '<select>';
		foreach($all_fonts as $font_slug => $font_title){
			echo '<option value="'.esc_attr($font_slug).'" '.selected(esc_attr($flpvi_brdcmb_slctfntfmly_value),esc_attr($font_slug)).'>'.esc_html__($font_title,'flexi-post-view').'</option>';
		}
	echo '</select>';


?>

	<!-- Add to Cart button -->
	<button id="add-to-cart-btn" type="button">Add to Cart</button>
	
	<!-- View Cart button (initially hidden) -->
	<button id="view-cart-btn" type="button" style="display:none">View Cart</button>
	
	<script>
			document.addEventListener('DOMContentLoaded', function() {
				const addToCartButton = document.getElementById('add-to-cart-btn');
				const viewCartButton = document.getElementById('view-cart-btn');
				addToCartButton.addEventListener('click', function() {
					viewCartButton.style.display = 'block';
				});
			});
	</script>

	
<?php


function ferdaus_single_product_template($template) {
	if (is_singular('post')) {
		while (have_posts()){
			the_post();
			global $post;
		
		}
	}
	return $template;
}
add_filter('template_include', 'ferdaus_single_product_template', 99);
// i want to add in here




if($flpvi_featured_img_check_value==true){
	$featured_image_url = get_the_post_thumbnail_url($post->get_id(), 'full');
	echo '<div class="swiper-wrapper">';
		echo '<div class="swiper-slide featured_image_url">';
			if($featured_image_url){
				echo '<img src="' . esc_url($featured_image_url) . '" alt="Featured Image">';
			}else{
				echo '<img src="'.plugin_dir_url( __FILE__ ).'../all-inc/public-assets/image/bwd-placeholder.jpg'.'" alt="Featured Image">';
			}
		echo '</div>';
	echo '</div>';
	}
echo '</div>';
// Gallery images
if($flpvi_gallery_img_check_value==true){
echo '<div thumbsSlider="" class="swiper mySwiper">';
	echo '<div class="swiper-wrapper">';
		$gallery_images = $post->get_gallery_image_ids();
		foreach ($gallery_images as $image_id) {
			$gallery_image_url = wp_get_attachment_image_url($image_id, 'full');
			echo '<div class="swiper-slide gallery_image_url">';
				echo '<img src="' . esc_url($gallery_image_url) . '" alt="Gallery Image">';
			echo '</div>';
		}
	echo '</div>';
echo '</div>';
}
// hope you know it's post single page. how cani show all post gallery image gallery_image_url in featured image  featured_image_url