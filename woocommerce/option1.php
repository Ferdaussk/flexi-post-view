<?php 
/**
 * Custom Single Post Template
 *
 * Override this template by copying it to yourtheme/woocommerce/custom-single-post.php
 */

if (!defined('ABSPATH')) {
    exit;
}
get_header('shop');
$lastInstalledSection = get_option('last_installed_section');
if(empty($lastInstalledSection)){
    // echo '<div class="flpvi-install-check-notice">';
        echo '<h2 class="flpvi-install-check-notice">'.esc_html__('Please install a demo!! See how to install ', 'flexi-post-view').'<a href="#" target="_blank">'.esc_html__('here!!', 'flexi-post-view').'</a></h2>';
        // echo '<p class="flpvi-check-sub-notice">'.esc_html__('This text came from Flexi Post View plugin.', 'flexi-post-view').'</p>';
    // echo '</div>';
} else{
$flpvi_sale_check_value = get_option('flpvi-sale-check-gallery');
echo '<div class="flpvi-single-post-main '.esc_attr($lastInstalledSection).'">';
while (have_posts()) :
    the_post();
    global $post;
    // Breadcrumb check
    if($flpvi_breadcrumb_check_value==true){
        echo '<div class="breadcrumb_custome_class">';
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            } elseif ( !is_front_page() && !is_home() ) {
                echo '<p id="breadcrumbs"><a href="';
                echo get_option('home');
                echo '">Home';
                echo "</a> / ";
                if ( is_category() || is_single() ) {
                    the_category('title_li=');
                    if ( is_single() ) {
                        echo " / ";
                        the_title();
                    }
                } elseif ( is_page() ) {
                    echo the_title();
                }
                echo '</p>';
            }        
        echo '</div>';
    }
    echo '<div class="flpvi-single-post-wrapper">';
        echo '<div class="flpvi-feature-image-main">';
            echo '<div class="swiper mySwiper2">';
                echo '<div class="flpvi-wrapper-onsale-featured">';
                    echo '<div class="flpvi-featured">'.esc_html__('Featured', 'flexi-post-view').'</div>';
                echo '</div>';
                // Single/Featured Image
                if($flpvi_featured_img_check_value==true){
                echo '<div class="swiper-wrapper">';
                    echo '<div class="swiper-slide">';
                        if(has_post_thumbnail()){
                            echo get_the_post_thumbnail();
                        }else{
                            echo '<img src="'.plugin_dir_url( __FILE__ ).'../all-inc/public-assets/image/bwd-placeholder.jpg'.'" alt="Featured Image">';
                        }
                    echo '</div>';
                echo '</div>';
                }
            echo '</div>';
        echo '</div>';
        echo '<div class="flpvi-information-main">';
        // Post title
            if($flpvi_title_check_value==true){
                echo '<div class="flpvi-post-title">'.esc_html__(get_the_title(), 'flexi-post-view').'</div>'; 
            }
            if($flpvi_revcntch_check_value==true){
            echo '<div class="flpvi-post-rating">';
                echo '<div class="flpvi-rating-review">';
                echo '<span>Comments ('.get_comments_number($post->ID).')</span>';
                echo '</div>';
            echo '</div>';
            }
            // Description
            if($flpvi_short_description_check_value==true){
            echo '<div class="flpvi-post-description">';
                echo '<p>'.wp_trim_words(get_the_content(),10,'...').'</p>';
            echo '</div>';
            }
            echo '<div class="flpvi-post-meta">';
                // Categories
                if($flpvi_categories_check_value==true){
                echo '<div class="flpvi-category-wrapper flpvi-meta-gap">';
                    foreach((get_the_category()) as $category) { echo $category->cat_name; }
                echo '</div>';
                }
                echo '<a class="flpvi-single-buy-now flpvi-button" href="'.get_permalink().'">'.esc_html__('See Blogs', 'flexi-post-view').'</a>';
                // Tags
                if($flpvi_tags_check_value==true){
                echo '<div class="flpvi-tags-wrapper flpvi-meta-gap">';
                    echo get_the_tag_list();
                echo '</div>';
                }
            echo '</div>';
        echo '</div>';
    echo '</div>';
    // Desc and rev tab/section
    if($flpvi_description_check_value==true){
    echo '<div class="flpvi-des-rev-main">';
        echo '<p>'.the_content().'</p>';
    echo '</div>';
    }
    // Related posts
    if($flpvi_related_products_check_value==true){
    echo '<div class="flpvi-related-post-main">';
        if($flpvi_relpro_toptile_check_value==true){
            echo '<div class="flpvi-related-title">'.esc_html__('Related posts', 'flexi-post-view').'</div>';
        }
            echo '<div class="flpvi-related-post-slider">';
                echo '<div class="swiper related-mySwiper">';
                    echo '<div class="swiper-wrapper">';
                    $current_post_id = get_the_ID();
                    $args = array(
                        'numberposts' => '5',  // Display 5 posts (including the current one)
                        'orderby' => 'rand',
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'exclude' => array($current_post_id)  // Exclude the current post
                    );
                    $recent_posts = wp_get_recent_posts( $args );
                    if (!empty($recent_posts)) {
                    foreach( $recent_posts as $recent ){
                                echo '<div class="swiper-slide">';
                                    echo '<div class="flpvi-related-post-wrap">';
                                        echo '<div class="flpvi-related-block-inner">';
                                            if($flpvi_relpro_prodimg_check_value==true){
                                            echo '<div class="flpvi-related-image">';
                                            if(get_the_post_thumbnail($recent["ID"])){
                                                echo '<a href="' . get_permalink($recent["ID"]) . '">' . get_the_post_thumbnail($recent["ID"], 'thumbnail') . '</a>';
                                            }else{
                                                echo '<a href="' . get_permalink($recent["ID"]) . '"><img src="'.plugin_dir_url( __FILE__ ).'../all-inc/public-assets/image/bwd-placeholder.jpg'.'" alt="Featured Image"></a>';
                                            }
                                            echo '</div>';
                                            }
                                            if($flpvi_relpro_button_check_value==true){
                                            echo '<div class="flpvi-group-add-to-cart">';
                                                echo '<div class="flpvi-add-cart">';
                                                    echo '<a href="'.get_permalink($recent["ID"]).'">'.esc_html__('View', 'flexi-post-view').'</a>';
                                                echo '</div>';
                                            echo '</div>';
                                            }
                                        echo '</div>';
                                        echo '<div class="flpvi-related-content">';
                                            if($flpvi_relpro_prodtitle_check_value==true){
                                                echo '<div class="flpvi-related-caption">';
                                                    echo '<a href="' . esc_url(get_permalink($recent["ID"])) . '">' . $recent["post_title"]  . '</a>';
                                                echo '</div>';
                                            }
                                            if($flpvi_relpro_dsc_check_value==true){
                                            echo '<div class="flpvi-related-caption">';
                                                echo '<p class="flpvi-related-desc">' . wp_trim_words(get_the_content(),esc_html__($flpvi_relpro_dscwordl_value, 'flexi-post-view'),esc_html__($flpvi_relpro_dscind_value, 'flexi-post-view')) . '</p>';
                                            echo '</div>';
                                            }
                                            // if($flpvi_relpro_prodpric_check_value==true){
                                            //     $dfdf = get_the_category($recent->ID);
                                            //     echo '<div class="flpvi-price-code flpvi-related-price-code">' . $dfdf[0]->name . '</div>';
                                            // }
                                        echo '</div>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo '<p>' . esc_html__('No related posts found.', 'flexi-post-view') . '</p>'; 
                        }
                    // }
                echo '</div>';
                echo '<div class="swiper-button-next"><i class="fa-solid fa-chevron-right"></i></div>';
                echo '<div class="swiper-button-prev"><i class="fa-solid fa-chevron-left"></i></div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
    }
 endwhile; 
echo '</div>';
}
get_footer('shop');
 ?>