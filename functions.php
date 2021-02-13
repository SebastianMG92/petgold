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
	wp_enqueue_script('petgold-ajax-js', get_bloginfo('stylesheet_directory') . '/js/ajax-add-to-cart.js', array('jquery'),'1.0' );
	wp_enqueue_script( 'petgold-js-main', get_template_directory_uri() . '/dist/bundle.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'petgold_scripts' );


function reef_corporate_theme_setup() {
	add_image_size( 'slider', 1920, 600, true ); 
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

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

// Add to cart button for external

function add_to_cart_form_shortcode( $atts ) {
	if ( empty( $atts ) ) {
		return '';
	}

	if ( ! isset( $atts['id'] ) && ! isset( $atts['sku'] ) ) {
		return '';
	}

	$args = array(
		'posts_per_page'      => 1,
		'post_type'           => 'product',
		'post_status'         => 'publish',
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => 1,
	);

	if ( isset( $atts['sku'] ) ) {
		$args['meta_query'][] = array(
			'key'     => '_sku',
			'value'   => sanitize_text_field( $atts['sku'] ),
			'compare' => '=',
		);

		$args['post_type'] = array( 'product', 'product_variation' );
	}

	if ( isset( $atts['id'] ) ) {
		$args['p'] = absint( $atts['id'] );
	}

	$single_product = new WP_Query( $args );

	$preselected_id = '0';


	if ( isset( $atts['sku'] ) && $single_product->have_posts() && 'product_variation' === $single_product->post->post_type ) {

		$variation = new WC_Product_Variation( $single_product->post->ID );
		$attributes = $variation->get_attributes();

		$preselected_id = $single_product->post->ID;


		$args = array(
			'posts_per_page'      => 1,
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => 1,
			'no_found_rows'       => 1,
			'p'                   => $single_product->post->post_parent,
		);

		$single_product = new WP_Query( $args );
	?>
		<script type="text/javascript">
			jQuery( document ).ready( function( $ ) {
				var $variations_form = $( '[data-product-page-preselected-id="<?php echo esc_attr( $preselected_id ); ?>"]' ).find( 'form.variations_form' );
				<?php foreach ( $attributes as $attr => $value ) { ?>
					$variations_form.find( 'select[name="<?php echo esc_attr( $attr ); ?>"]' ).val( '<?php echo esc_js( $value ); ?>' );
				<?php } ?>
			});
		</script>
	<?php
	}

	$single_product->is_single = true;
	ob_start();
	global $wp_query;

	$previous_wp_query = $wp_query;

	$wp_query          = $single_product;

	wp_enqueue_script( 'wc-single-product' );
	while ( $single_product->have_posts() ) {
		$single_product->the_post()
		?>
		<div class="single-product" data-product-page-preselected-id="<?php echo esc_attr( $preselected_id ); ?>">
			<?php woocommerce_template_single_add_to_cart(); ?>
		</div>
		<?php
	}

	$wp_query = $previous_wp_query;

	wp_reset_postdata();
	return '<div class="woocommerce">' . ob_get_clean() . '</div>';
}
add_shortcode( 'add_to_cart_form', 'add_to_cart_form_shortcode' );



// Add ajax add to cart
add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
        
function woocommerce_ajax_add_to_cart() {

	$product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
	$quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
	$variation_id = absint($_POST['variation_id']);
	$passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
	$product_status = get_post_status($product_id);

	if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

		do_action('woocommerce_ajax_added_to_cart', $product_id);

		if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
			wc_add_to_cart_message(array($product_id => $quantity), true);
		}

		WC_AJAX :: get_refreshed_fragments();
	} else {

		$data = array(
			'error' => true,
			'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

		echo wp_send_json($data);
	}

	wp_die();
}



//Hide Price Range for WooCommerce Variable Products
add_filter( 'woocommerce_variable_sale_price_html', 
'lw_variable_product_price', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 
'lw_variable_product_price', 10, 2 );

function lw_variable_product_price( $v_price, $v_product ) {

// Product Price
$prod_prices = array( $v_product->get_variation_price( 'min', true ), 
                            $v_product->get_variation_price( 'max', true ) );
$prod_price = $prod_prices[0]!==$prod_prices[1] ? sprintf(__('From: %1$s', 'woocommerce'), 
                       wc_price( $prod_prices[0] ) ) : wc_price( $prod_prices[0] );

// Regular Price
$regular_prices = array( $v_product->get_variation_regular_price( 'min', true ), 
                          $v_product->get_variation_regular_price( 'max', true ) );
sort( $regular_prices );
$regular_price = $regular_prices[0]!==$regular_prices[1] ? sprintf(__('From: %1$s','woocommerce')
                      , wc_price( $regular_prices[0] ) ) : wc_price( $regular_prices[0] );

if ( $prod_price !== $regular_price ) {
$prod_price = '<del>'.$regular_price.$v_product->get_price_suffix() . '</del> <ins>' . 
                       $prod_price . $v_product->get_price_suffix() . '</ins>';
}
return $prod_price;
}