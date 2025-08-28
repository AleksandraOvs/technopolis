<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package untheme
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-section">
		<header class="page-header">
			<?php

			if (has_post_thumbnail()) {
				the_post_thumbnail();
			} else {
				echo '<img src="' . get_bloginfo("template_url") . '/images/svg/placeholder.svg" />';
			}
			?>
			<div class="fixed-container">
				<ul class="breadcrumbs__list">
					<?php echo site_breadcrumbs(); ?>
				</ul>
				<?php
				the_title('<h1 class="page-title">', '</h1>');
				?>
			</div>
		</header><!-- .page-header -->

		<div class="page-section__content">

			<?php
			while (have_posts()) :
				the_post();

				get_template_part('template-parts/content', get_post_type());

			// If comments are open or we have at least one comment, load up the comment template.
			// if (comments_open() || get_comments_number()) :
			// 	comments_template();
			// endif;

			endwhile; // End of the loop.
			?>
		</div>

		</div>

	</section>

	<?php get_template_part('template-parts/contacts-section'); ?>
</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
