<?php
defined('ABSPATH') || exit;
get_header();
?>

<main id="primary" class="site-main">
	<section class="page-section">
		<header class="page-header">
			<div class="fixed-container">
				<ul class="breadcrumbs__list">
					<?php echo site_breadcrumbs(); ?>
				</ul>
				<?php
				post_type_archive_title('<h2 class="page-title">', '</h2>');
				?>
			</div>

		</header><!-- .page-header -->

		<div class="fixed-container">

			<?php
			$all_terms = get_terms(array(
				'taxonomy'   => 'projects_category',
				'hide_empty' => false,
			));

			//print_r($all_terms);

			$terms = array();

			if (! empty($all_terms) && ! is_wp_error($all_terms)) {
				foreach ($all_terms as $term) {

					$count = new WP_Query(array(
						'post_type'      => 'portfolio',
						'posts_per_page' => 1,
						'tax_query'      => array(
							array(
								'taxonomy' => 'projects_category',
								'field'    => 'term_id',
								'terms'    => $term->term_id,
							),
						),
						'post_status'    => 'publish',
						'fields'         => 'ids',
					));

					if ($count->have_posts()) {
						$terms[] = $term;
					}
					wp_reset_postdata();
				}
			}
			?>

			<?php if (! empty($terms)) : ?>
				<ul id="category-filter">
					<li><a href="#" class="active" data-term="all">Показать все</a></li>
					<?php foreach ($terms as $term) : ?>
						<li><a href="#" data-term="<?php echo esc_attr($term->term_id); ?>"><?php echo esc_html($term->name); ?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<div id="works-list" class="content-inner">
				<?php if (have_posts()): ?>
					<?php while (have_posts()): the_post(); ?>

						<?php get_template_part('template-parts/project-item'); ?>

					<?php endwhile; ?>
				<?php else: ?>
					<p><?php esc_html_e('No works found.', 'textdomain'); ?></p>
				<?php endif; ?>
			</div>
		</div>

	</section>
</main><!-- #main -->
<?php get_footer(); ?>