<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package untheme
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="page-section _services-archive">


        <?php if (have_posts()) : ?>

            <header class="page-header">
                <div class="fixed-container">
                    <ul class="breadcrumbs__list">
                        <?php echo site_breadcrumbs(); ?>
                    </ul>
                    <?php

                    the_archive_title('<h2 class="page-title">', '</h2>');

                    ?>
                </div>
            </header><!-- .page-header -->

            <div class="page-section__content">
                <div class="fixed-container">
                    <h3 class="archive-description">
                        The leading seamless gutter company in your area!
                    </h3>

                    <ul class="archive-list">

                        <?php
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post();
                            echo '<li class="archive-list__item">';
                            untheme_post_thumbnail();
                        ?>
                            <div class="archive-item__title">
                                <?php the_title('<h3 class="entry-title">', '</h3>');
                                ?>
                                <a href="<?php echo esc_url(get_permalink()) ?> " rel="bookmark">
                                    <svg class="go-to-page-arrow" xmlns="http://www.w3.org/2000/svg" width="15" height="10" viewBox="0 0 15 10" fill="none">
                                        <path d="M10.769 9.20703L14.9761 5.00003L10.769 0.79303L10.0619 1.50015L13.0619 4.50006L-5.07068e-05 4.50006L-5.07505e-05 5.50006L13.0618 5.50006L10.0619 8.4999L10.769 9.20703Z" fill="#DDC44E" />
                                    </svg>
                                    <span>go to page</span></a>

                            </div>
                    <?php


                            echo '</li>';
                        endwhile;

                        echo '</ul>';

                        the_posts_navigation();

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif;
                    ?>
                </div>
            </div>
    </section>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();