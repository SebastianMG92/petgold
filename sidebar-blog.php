<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package petgold
 */

?>
<aside class="sidebar sidebar-blog">
	<section class="widget widget_recent">
		<h2 class="heading">Recientes:</h2>
		<ul id="slider-id" class="recent-post">
			<?php
			$recent_posts = wp_get_recent_posts(array(
				'numberposts' => 3, // Number of recent posts thumbnails to display
				'post_status' => 'publish' // Show only the published posts
			));
			foreach( $recent_posts as $post_item ) : ?>
				<li class="recent-post-item">
					<a href="<?php echo get_permalink($post_item['ID']) ?>">
						<?php echo get_the_post_thumbnail($post_item['ID'], 'full'); ?>
						<p class="slider-caption-class"><?php echo $post_item['post_title'] ?></p>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
	<?php if ( is_active_sidebar( 'sidebar-blog' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-blog' ); ?>
	<?php endif; ?>
</aside>