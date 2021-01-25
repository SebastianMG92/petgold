<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>



<?php if ( get_field('pagina_de_tienda_imagen', 'options') ) : $image = get_field('pagina_de_tienda_imagen', 'options'); ?>
<?php endif; ?>

<section class="subHeader" style="background-image: url(<?php echo $image['url']; ?>);">

	<div class="container">
		<div class="row">

			<div class="col-12 subHeader__breadcumbs">
					<?php custom_breadcrumbs(); ?>
			</div>

			<div class="col-12 subHeader__content">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="heading"><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>

				<div class="text">
					<?php
						/**
						 * Hook: woocommerce_archive_description.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action( 'woocommerce_archive_description' );
					?>
				</div>
			</div>
		</div>
	</div>


	<div class="subHeader__wave">
		<svg viewBox="0 0 1440 192">
		<path d="M0,128l60-32C120,64,240,0,360,5.3C480,11,600,85,720,96s240-43,360-53.3C1200,32,1320,64,1380,80l60,16v96h-60
			c-60,0-180,0-300,0s-240,0-360,0s-240,0-360,0s-240,0-300,0H0V128z"></path>
		</svg>
	</div>

</section>


<section class="productGrid">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-9 productGrid__container">

				<?php
					if ( woocommerce_product_loop() ) {

						/**
						 * Hook: woocommerce_before_shop_loop.
						 *
						 * @hooked woocommerce_output_all_notices - 10
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */
				?>
				<div class="productGrid__filter">
					<?php
						do_action( 'woocommerce_before_shop_loop' );
					?>
				</div>

				<div class="productGrid__grid">
					<?php
							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();


							/**
							 * Hook: woocommerce_after_shop_loop.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );



						} else {
							/**
							 * Hook: woocommerce_no_products_found.
							 *
							 * @hooked wc_no_products_found - 10
							 */
							do_action( 'woocommerce_no_products_found' );
						}
					?>
				</div>

			</div>

			<div class="col-12 col-lg-3">
				<?php
					/**
					 * Hook: woocommerce_sidebar.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );
				?>
			</div>
		</div>
	</div>
</section>

<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );



get_footer();
