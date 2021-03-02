<?php

/**
 * Template name: Footer single
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package petgold
 */

get_header();
?>


	<main id="primary" class="site-main">

		<?php
			while ( have_posts() ) :
				the_post(); ?>
				
				<?php the_content(); ?>

			<?php
			endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer('simple');
