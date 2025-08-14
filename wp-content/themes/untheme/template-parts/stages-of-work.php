<section class="stages-section" id="stages-section">
    <div class="fixed-container">


        <div class="stages-section__inner">

            <?php
            if ($sw_head = carbon_get_theme_option('crb_stages_heading')) {
            ?>
                <h2 class="title fromTop"><?php echo $sw_head ?></h2>
            <?php
            }
            ?>
            <?php if ($stages_items = carbon_get_theme_option('crb_stages_list')) {
            ?>

                <ul class="stages-list">
                    <?php
                    $i = 0;
                    foreach ($stages_items as $stages_item) {
                        $i++;
                    ?>
                        <li class="stages-item fromOpacity">
                            <div class="num-of-stages">
                                <span><?php echo '0' . $i; ?></span>
                            </div>
                            <div class="stage">
                                <h4><?php echo $stages_item['crb_stage_heading'] ?></h4>
                                <p><?php echo $stages_item['crb_stage_text'] ?></p>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            <?php
            }
            ?>
        </div>

        <div class="stages-section__cats">
            <?php
            $terms = get_terms(array(
                'taxonomy'   => 'service_category',
                'hide_empty' => false,
            ));

            if (!empty($terms) && !is_wp_error($terms)) {
                echo '<ul class="service-categories">';

                foreach ($terms as $term) {
                    // Получаем URL картинки из Carbon Fields
                    $image = carbon_get_term_meta($term->term_id, 'crb_category_image');
                    $image_url = wp_get_attachment_image_url($image, 'full'); 

                    // Получаем ссылку на категорию
                    $term_link = get_term_link($term);

                    echo '<li class="service-category-item">';

                    // Картинка (если есть)
                    if ($image_url) {
                        echo '<a href="' . esc_url($term_link) . '">';
                        echo '<img src="' . $image_url . '" alt="' . esc_attr($term->name) . '">';
                        echo '</a>';
                    } else {
                        echo '<a href="' . esc_url($term_link) . '">';
                        echo '<img src="/path/to/default-image.jpg" alt="' . esc_attr($term->name) . '">';
                        echo '</a>';
                    }

                    // Заголовок с ссылкой
                    echo '<h3><a href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a></h3>';

                    echo '</li>';
                }

                echo '</ul>';
            }
            ?>

        </div>

        <?php get_template_part('template-parts/contacts-section'); ?>


    </div>
</section>