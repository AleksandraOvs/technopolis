<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package untheme
 */

?>
<div class="fixed-container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-content">
		<?php the_content() ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
</div>