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
        <header class="page-header">
            <div class="fixed-container">
                <ul class="breadcrumbs__list">
                    <?php echo site_breadcrumbs(); ?>
                </ul>
                <?php
               // the_title('<h2 class="page-title">', '</h2>');
                post_type_archive_title('<h2 class="page-title">', '</h2>');
                ?>
            </div>

            <?php untheme_post_thumbnail(); ?>

        </header><!-- .page-header -->
        <div class="content">
            <?php the_content() ?>
        </div>

        <div class="fixed-container _services-page">
            <?php
            $terms = get_terms(array(
                'taxonomy' => 'service_category',
                'hide_empty' => false,
            ));

            if (!empty($terms) && !is_wp_error($terms)) {
                echo '<div class="services-list">';

                // Выводим каждую категорию
                foreach ($terms as $term) {

                    $services = new WP_Query(array(
                        'post_type' => 'services',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'service_category',
                                'field'    => 'term_id',
                                'terms'    => $term->term_id,
                            ),
                        ),
                    ));

                    if ($services->have_posts()) {
            ?>
                        <div class="services-list__item__page fromOpacity">
                            <div class="services-list__item__content">
                                <div class="service-title">
                                    <?php
                                    $image_id = carbon_get_term_meta($term->term_id, 'crb_category_image');
                                    if ($image_id) {
                                        echo '<div class="category-image">' . wp_get_attachment_image($image_id, 'medium') . '</div>';
                                    }
                                    ?>
                                    <h4><?php echo esc_html($term->name); ?></h4>
                                </div>

                                <ul class="category-items">
                                    <?php while ($services->have_posts()) {
                                        $services->the_post(); ?>
                                        <li class="cat-item">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </li>
                                    <?php } // endwhile 
                                    ?>
                                </ul>
                            </div>


                            <a class="btn" href="<?php echo esc_url(get_term_link($term)); ?>">
                                Подробнее
                            </a>



                        </div>
                <?php
                        wp_reset_postdata();
                    }
                } // endforeach

                echo '</div>'; // .services-list
                ?>
            <?php
            } else {
                echo '<p>Nothing found</p>';
            }
            ?>
        </div>

        <?php get_template_part('template-parts/messengers-block'); ?>


    </section>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
