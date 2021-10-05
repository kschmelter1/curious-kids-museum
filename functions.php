<?php
require_once 'includes/client_role.php';

function compulse_enqueue_scripts() {
	$style_name = 'compulse';

	wp_register_style( 'Swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css' );
	wp_enqueue_style('Swiper');
	wp_register_script( 'Swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js', null, null, true );
	wp_enqueue_script('Swiper');

	wp_register_style('lightgallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/css/lightgallery.css');
	wp_enqueue_style('lightgallery');

	wp_enqueue_script('lightgalleryjs', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lightgallery.min.js', null, null, true );

	wp_register_style($style_name, get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style($style_name);

	wp_enqueue_script('vendor', get_stylesheet_directory_uri() . '/js/vendor.js', array(), '', true);
	wp_enqueue_script('app', get_stylesheet_directory_uri() . '/js/app.js', array(), '1.1.0', true);

    if ( is_page( 176 ) ) {
        $all_urls = get_field( 'membership_payment_urls' );
        $urls = [];

        foreach ( $all_urls as $url ) {
            $urls[ $url['name'] ] = $url['url'];
        }

        wp_localize_script( 'app', 'membershipPaymentUrls', $urls );
    }
}
add_action('wp_enqueue_scripts', 'compulse_enqueue_scripts');


register_nav_menus( array(
    'primary' => 'Primary Menu',
		'footer' => 'Footer Menu',
		'quicklinks' => 'Quick Links Menu',
) );


require_once 'bs4Navwalker.php';

add_theme_support( 'title-tag' );

//Advanced Custom Fields Options page
if( function_exists('acf_add_options_page') ) {

	$option_page = acf_add_options_page(array(
		'page_title' => 'Site Options',
		'menu_slug' => 'options',
		'position' => '2.5',
		'post_id' => 'options',
		'icon_url' => 'dashicons-smiley'
	));

	$alert_page = acf_add_options_page(array(
		'page_title' => 'Alerts',
		'menu_slug' => 'alerts',
		'position' => '2.7',
		'post_id' => 'alerts',
		'icon_url' => 'dashicons-megaphone'
	));

}

function clean_phone($num) {
	return preg_replace('/\D+/', '', $num);
}

function make_id($str) {
 	return str_replace(' ', '-', strtolower($str));
 // return: convert-spaces-to-dash-and-lowercase-with-php
}

function a_target($link) {
	if ($link['target']) {return 'target="_blank"';} else {return;}
}

function print_img($img, $size = null) {
	if ($size) {$url = $img['sizes'][$size];} else {$url = $img['url'];}
	$output = '<img class="img-fluid" src="'.$url.'" alt="'.$img['alt'].'">';
	return $output;
}


function btn_outline_yellow($url, $title, $target){
	$output = '<a class="btn btn-outline-yellow" href="'.$url.'" ';
	if ($target == "_blank") {$output .= 'target="_blank" ';}
	$output .=  '><div class="animation">
	<svg class="yellow-outline" width="132px" height="46px" viewBox="0 0 132 46" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" stroke="#FFD500" stroke-width="2" fill="transparent">

	      <path d="M9.57364823,5.03714342 L1.26525428,38.3476397 L131.000005,44.5510432 L131.000005,5.03714342 Z" transform="translate(66.000003, 23.244142) scale(-1, 1) translate(-66.000003, -23.244142) "></path>

	</svg>
	</div>';
	$output .= '<span>'.$title.'</span></a>';
	return $output;
}

//[ck-hours]
function display_hours(){
	ob_start(); //Creates a buffer to prevent output being placed before rest of page content
	get_template_part( 'templates/schema','hours' );
	return ob_get_clean();
}
add_shortcode( 'ck-hours', 'display_hours' );
