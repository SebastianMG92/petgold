<?php
/**
 * petgold functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package petgold
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.1' );
}

if ( ! function_exists( 'petgold_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function petgold_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on petgold, use a find and replace
		 * to change 'petgold' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'petgold', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Menu principal', 'petgold' ),
				'footer-menu' => esc_html__( 'Menu footer', 'petgold' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'petgold_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'petgold_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function petgold_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'petgold_content_width', 640 );
}
add_action( 'after_setup_theme', 'petgold_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function petgold_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Woocommerce sidebar', 'petgold' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'petgold' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="heading">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog sidebar', 'petgold' ),
			'id'            => 'sidebar-blog',
			'description'   => esc_html__( 'Add widgets here.', 'petgold' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="heading">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'petgold_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function petgold_scripts() {
	wp_enqueue_style( 'petgold-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'petgold-style', 'rtl', 'replace' );
	wp_enqueue_style( 'petgold-style-main', get_template_directory_uri() . '/dist/bundle.css', '',  _S_VERSION);

	// wp_enqueue_script( 'petgold-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	// wp_enqueue_script('petgold-ajax-js', get_bloginfo('stylesheet_directory') . '/js/ajax-add-to-cart.js', array('jquery'),'1.0' );
	wp_enqueue_script( 'petgold-js-main', get_template_directory_uri() . '/dist/bundle.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'petgold_scripts' );


function reef_corporate_theme_setup() {
	add_image_size( 'slider', 1920, 600, true ); 
	add_image_size( 'hero', 1920, 800, true ); 
	add_image_size( 'icon', 50, 50, true ); 
};
add_action( 'after_setup_theme', 'reef_corporate_theme_setup' );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Opciones generales',
		'menu_title'	=> 'Opciones generales',
		'menu_slug' 	=> 'opciones-generales-petgold',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'opciones-generales-petgold',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'opciones-generales-petgold',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Tienda',
		'menu_title'	=> 'Tienda',
		'parent_slug'	=> 'opciones-generales-petgold',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Blog',
		'menu_title'	=> 'Blog',
		'parent_slug'	=> 'opciones-generales-petgold',
	));
	
}

/**
 * Implement the Custom Blocks.
 */
require get_template_directory() . '/inc/custom-blocks.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Implement the Custom breadcrumbs.
 */
require get_template_directory() . '/inc/custom-breadcrumbs.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// add woocommerce child theme support
function woocommerce_support () {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action ('after_setup_theme', 'woocommerce_support');

// Breadcumbs
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);


// Add ajax add to cart
add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
// add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
        
// function woocommerce_ajax_add_to_cart() {

// 	$product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
// 	$quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
// 	$variation_id = absint($_POST['variation_id']);
// 	$passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
// 	$product_status = get_post_status($product_id);

// 	if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

// 		do_action('woocommerce_ajax_added_to_cart', $product_id);

// 		if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
// 			wc_add_to_cart_message(array($product_id => $quantity), true);
// 		}

// 		WC_AJAX :: get_refreshed_fragments();
// 	} else {

// 		$data = array(
// 			'error' => true,
// 			'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

// 		echo wp_send_json($data);
// 	}

// 	wp_die();
// }

// Color picker
global $client_colors;
$client_colors = array(
    "00acb0",
    "ae3088",
    "88256a",
);
array_push($client_colors, "FFFFFF", "000000");

function change_acf_color_picker() {

    global $parent_file;
    global $client_colors;
    $client_colors_acf = array();

    foreach ( $client_colors as $value ) {
      $client_colors_acf[] = '#'.$value;
    }

    $client_colors_acf_jquery = json_encode($client_colors_acf);

    echo "<script>
    (function($){
      acf.add_action('ready append', function() {
        acf.get_fields({ type : 'color_picker'}).each(function() {
          $(this).iris({
            color: $(this).find('.wp-color-picker').val(),
            mode: 'hsv',
            palettes: ".$client_colors_acf_jquery.",
            change: function(event, ui) {
              $(this).find('.wp-color-result').css('background-color', ui.color.toString());
              $(this).find('.wp-color-picker').val(ui.color.toString());
            }
          });
        });
      });
    })(jQuery);
  </script>";
}
add_action( 'acf/input/admin_head', 'change_acf_color_picker' );


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


// Most visited post filter
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Add variations to all loops of woocommerce
// function handsome_bearded_guy_select_variations() {
// 	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
// 	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_single_add_to_cart', 30 );
// }
// add_action( 'woocommerce_before_shop_loop', 'handsome_bearded_guy_select_variations' );


// Show the cheapest price
// add_filter('woocommerce_variable_price_html','shop_variable_product_price', 10, 2 );

// function shop_variable_product_price( $price, $product ){
//     $variation_min_reg_price = $product->get_variation_regular_price('min', true);

//     if(!empty($variation_min_reg_price)) {
//         $price = woocommerce_price( $variation_min_reg_price );
//     }
//     else {
//         $price = woocommerce_price( $product->regular_price );
//     }

//     return $price;
// }


/*
Disable Variable Product Price Range: 
*/
add_filter('woocommerce_variable_sale_price_html', 'shop_variable_product_price', 10, 2);
add_filter('woocommerce_variable_price_html','shop_variable_product_price', 10, 2 );
function shop_variable_product_price( $price, $product ){
    $variation_min_reg_price = $product->get_variation_regular_price('min', true);
    $variation_min_sale_price = $product->get_variation_sale_price('min', true);
    if ( $product->is_on_sale() && !empty($variation_min_sale_price)){
        if ( !empty($variation_min_sale_price) )
            $price = '<del class="strike">' .  wc_price($variation_min_reg_price) . '</del>
        <ins class="highlight">' .  wc_price($variation_min_sale_price) . '</ins>';
    } else {
        if(!empty($variation_min_reg_price))
            $price = '<ins class="highlight">'.wc_price( $variation_min_reg_price ).'</ins>';
        else
            $price = '<ins class="highlight">'.wc_price( $product->regular_price ).'</ins>';
    }
    return $price;
}

