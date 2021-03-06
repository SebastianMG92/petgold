<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package petgold
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="blogSingle">

			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-9 col-xxl-10 blogSingle__container">

						<?php
						while ( have_posts() ) :
							the_post();
						?>
							<div class="blogSingle__head">
								<?php 
									$categories_list = get_the_category_list( esc_html__( ', ', 'petgold' ) );
									printf( '<span class="cat-links">' . esc_html__( '%1$s', 'petgold' ) . '</span>', $categories_list );
								?>
	
								<?php the_title( '<h2 class="heading">', '</h2>' ); ?>
								<div class="blog-data">
									<?php
										petgold_posted_on();
									?> /
									<?php
										petgold_posted_by();
									?>
								</div>
	
								<figure class="blogPage__feed--item--image">
									<?php the_post_thumbnail( 'medium_large' ); ?>
								</figure>
	
								<div class="blogPage__feed--item--footer">
									<div class="share">
										<strong>Compartir: </strong>
										<button class="btn btn-share btn-green" data-sharer="facebook" data-hashtag="petgold" data-url="<?php echo get_permalink(); ?>" aria-label="Comparte en Facebook">
											<svg viewBox="0 0 167.657 167.657">
												<path d="M83.829,0.349C37.532,0.349,0,37.881,0,84.178c0,41.523,30.222,75.911,69.848,82.57v-65.081H49.626
													v-23.42h20.222V60.978c0-20.037,12.238-30.956,30.115-30.956c8.562,0,15.92,0.638,18.056,0.919v20.944l-12.399,0.006
													c-9.72,0-11.594,4.618-11.594,11.397v14.947h23.193l-3.025,23.42H94.026v65.653c41.476-5.048,73.631-40.312,73.631-83.154
													C167.657,37.881,130.125,0.349,83.829,0.349z"></path>
											</svg>
										</button>
										<button class="btn btn-share btn-green" data-sharer="twitter" data-title="<?php the_title(); ?>" data-hashtags="petgold" data-url="<?php echo get_permalink(); ?>" aria-label="Comparte en Twitter">
											<svg viewBox="0 0 512 512"><path d="m256 0c-141.363281 0-256 114.636719-256 256s114.636719 256 256 256 256-114.636719 256-256-114.636719-256-256-256zm116.886719 199.601562c.113281 2.519532.167969 5.050782.167969 7.59375 0 77.644532-59.101563 167.179688-167.183594 167.183594h.003906-.003906c-33.183594 0-64.0625-9.726562-90.066406-26.394531 4.597656.542969 9.277343.8125 14.015624.8125 27.53125 0 52.867188-9.390625 72.980469-25.152344-25.722656-.476562-47.410156-17.464843-54.894531-40.8125 3.582031.6875 7.265625 1.0625 11.042969 1.0625 5.363281 0 10.558593-.722656 15.496093-2.070312-26.886718-5.382813-47.140624-29.144531-47.140624-57.597657 0-.265624 0-.503906.007812-.75 7.917969 4.402344 16.972656 7.050782 26.613281 7.347657-15.777343-10.527344-26.148437-28.523438-26.148437-48.910157 0-10.765624 2.910156-20.851562 7.957031-29.535156 28.976563 35.554688 72.28125 58.9375 121.117187 61.394532-1.007812-4.304688-1.527343-8.789063-1.527343-13.398438 0-32.4375 26.316406-58.753906 58.765625-58.753906 16.902344 0 32.167968 7.144531 42.890625 18.566406 13.386719-2.640625 25.957031-7.53125 37.3125-14.261719-4.394531 13.714844-13.707031 25.222657-25.839844 32.5 11.886719-1.421875 23.214844-4.574219 33.742187-9.253906-7.863281 11.785156-17.835937 22.136719-29.308593 30.429687zm0 0"></path></svg>
										</button>
									</div>
								</div>
							</div>

							<div class="blogSingle__content">
								<?php the_content(); ?>
							</div>

							<?php 			
								the_post_navigation(
									array(
										'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Anterior:', 'petgold' ) . '</span> <span class="nav-title">%title</span>',
										'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Siguiente:', 'petgold' ) . '</span> <span class="nav-title">%title</span>',
									)
								);
							?>

							<script type="application/ld+json">
								{
									"@context": "https://schema.org",
									"@type": "Article",
									"mainEntityOfPage": {
										"@type": "WebPage",
										"@id": "<?php the_permalink(); ?>"
									},
									"headline": "<?php the_title(); ?>",
									"description": "<?php echo wp_strip_all_tags(get_the_excerpt()); ?>",
									"image": "<?php the_post_thumbnail_url(); ?>",
									"author": {
										"@type": "Person",
										"name": "<?php echo wp_strip_all_tags(get_field('post_author_name')); ?>"
									},
									"publisher": {
										"@type": "Organization",
										"name": "Blueprint Future",
										"logo": {
											"@type": "ImageObject",
											"url": "https://blueprintfuture.local/wp-content/uploads/2020/10/FUTURE.svg"
										}
									},
									"datePublished": "<?php the_date('Y-m-d'); ?>",
									"dateModified": "<?php the_modified_date('Y-m-d'); ?>"
								}
							</script>
						<?php 
							endwhile; // End of the loop.
						?>
					</div>

					<div class="col-12 col-lg-3 col-xxl-2">
						<?php get_sidebar( 'blog' ); ?>
					</div>
				</div>
			</div>

		</section>


		<section class="postRelations">

			<div class="container">
				<div class="row">
					<div class="col-12 postRelations__content">
						<h2 class="heading">Más populares</h2>
					</div>
				</div>

				<div class="row">

						<?php wpb_set_post_views(get_the_ID()); ?>
						<?php
							$args = array(
								'post_type'         => 'post',
								'post_status'       => 'publish',
								'meta_key' => 'wpb_post_views_count',
								'orderby' => 'meta_value_num',
								'order' => 'DESC',
								'posts_per_page'    => 3,
							);
							$popularpost = new WP_Query($args); ?>
							<?php if ($popularpost->have_posts()) : ?>

										<?php while ($popularpost->have_posts()) : $popularpost->the_post(); ?>
											<div class="col-12 col-md-4 postRelations__item">
												<?php
												$thumbnail_id = get_post_thumbnail_id();
												$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
												?>
												<a href="<?php the_permalink(); ?>" class="content">
													<figure class="image">
														<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'popular'); ?>" alt="<?php echo $alt; ?>">
													</figure>
													<div class="content">
														<h2 class="heading"><?php the_title(); ?></h2>
														<div class="text">
															<?php the_excerpt(); ?>
														</div>
													</div>
												</a>
											</div>
										<?php endwhile; ?>
							<?php endif;
						wp_reset_query(); ?>

				</div>
			</div>

		</section>

	</main><!-- #main -->

<?php
get_footer();
