<section class="section-services">
    <div class="fixed-container">
        <?php
        $terms = get_terms(array(
            'taxonomy' => 'service_category',
            'hide_empty' => false,
        ));

        if (!empty($terms) && !is_wp_error($terms)) {
            echo '<div class="services-list">';

            echo '<div class="services-list__item fromOpacity">';
            // Заголовок и текст из мета
            echo '<div class="accent-text">';
            if ($service_heading = carbon_get_post_meta(get_the_ID(), 'crb_services_head')) {
                echo '<h3 class="title">' . esc_html($service_heading) . '</h3>';
            }

            if ($service_text = carbon_get_post_meta(get_the_ID(), 'crb_services_text')) {
                echo '<div class="accent-description-description">' . wp_kses_post($service_text) . '</div>';
            }

            if ($service_link = carbon_get_post_meta(get_the_ID(), 'crb_services_link')) {
             ?>
                <a class="btn" href="<?php echo $service_link ?>">
                    <?php
                if ($service_link_text = carbon_get_post_meta(get_the_ID(), 'crb_services_link_text')){
                    echo $service_link_text;
                }else {
                    echo 'Перейти';
                }
                ?>
            </a>
                <?php
            }

            echo '</div>';
            echo '</div>';

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
                    <div class="services-list__item fromOpacity">
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
</section>