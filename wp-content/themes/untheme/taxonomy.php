<?php

/**
 * Шаблон для отображения архивов таксономий (taxonomy.php)
 * Срабатывает, если нет более специфичного файла, например taxonomy-{taxonomy}.php
 */

get_header();
?>

<main id="primary" class="site-main taxonomy-archive">

    <header class="page-header">
        <div class="fixed-container">
            <ul class="breadcrumbs__list">
                <?php echo site_breadcrumbs(); ?>
            </ul>
            <?php
            single_term_title('<h2 class="page-title">', '</h2>');
            ?>
            <?php
            // Описание термина (если задано в админке)
            $term_description = term_description();
            if (! empty($term_description)) {
                echo '<div class="taxonomy-description">' . $term_description . '</div>';
            }
            ?>
        </div>

        <?php //untheme_post_thumbnail(); 
        ?>

    </header><!-- .page-header -->

    <?php if (have_posts()) : ?>

        <section class="taxonomy-posts-list">
            <div class="fixed-container">
                <ul class="services-items">
                    <?php
                    while (have_posts()) :
                        the_post();
                    ?>

                        <li class="services-items__name">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>

                    <?php endwhile; ?>
                </ul>
            </div>
        </section><!-- .taxonomy-posts-list -->

        <?php

        // the_posts_pagination(
        //     array(
        //         'prev_text' => '&laquo; Предыдущие',
        //         'next_text' => 'Следующие &raquo;',
        //     )
        // );
        ?>

    <?php else : ?>

        <p>Записей не найдено.</p>

    <?php endif; ?>

</main><!-- #primary -->

<?php
get_footer();
