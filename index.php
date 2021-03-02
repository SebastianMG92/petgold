<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package petgold
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
			$image = get_field('imagen_blog', 'options');
		?>
			<section class="subHeader js-anim-parallaxBg">
				<div class="subHeader__bg js-anim-parallaxBg-item" style="background-image: url(<?php echo $image['url']; ?>);"></div>
				
					<div class="container">
						<div class="row">

							<div class="col-12 subHeader__breadcumbs">
								<?php custom_breadcrumbs(); ?>
							</div>

							<div class="col-12 subHeader__content">
								<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
									<h1 class="heading"><?php single_post_title(); ?></h1>
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
					<svg viewBox="0 0 1440 64.3"><path d="M.59,46.13l60-14.06c60-14.06,162-24.11,282-21.78,120,2.5,250,49,370,53.8s254-36.13,376.15-38c119.41-10.81,351.91,48.14,351.91,48.14H.59Z" transform="translate(-0.59 -9.95)"/></svg>
				</div>

			</section>


			<section class="blogPage">

				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-9 col-xxl-10 blogPage__feed">
							<?php
								endif;

								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

								the_posts_navigation(    array(
									'prev_text' => __('Anterior', 'theme_textdomain'),
									'next_text' => __('Siguiente', 'theme_textdomain'),
								));
							?>
						</div>

						<div class="col-12 col-lg-3 col-xxl-2">
							<?php get_sidebar( 'blog' ); ?>
						</div>
					</div>
				</div>
			

			
			</section>
			
		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php

get_footer();
