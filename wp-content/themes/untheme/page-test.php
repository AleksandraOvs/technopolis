<?php

/**
 * Template name: Test page
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-section">
		<div class="fixed-container">
			<h2>Произвольные типы записей:</h2>
			-----
			<h2>Категории произвольных записей:</h2>
			<?php get_template_part('template-parts/categories-decor') ?>
		</div>
	</section>
</main><!-- #main -->

<?php
get_footer();
