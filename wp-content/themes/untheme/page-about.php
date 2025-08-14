<?php

/**
 * Template name: О нас
 */
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
                the_title('<h2 class="page-title">', '</h2>');
                ?>
            </div>

            <?php untheme_post_thumbnail(); ?>

        </header><!-- .page-header -->

        <?php get_template_part('template-parts/about') ?>
        <?php get_template_part('template-parts/messengers-block'); ?>
       

    </section>

    <section class="content">
        <?php the_content() ?>
    </section>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
