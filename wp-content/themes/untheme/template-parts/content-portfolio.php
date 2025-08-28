<div class="fixed-container">
    <?php
    // Получаем значения полей
    $object_name = carbon_get_post_meta(get_the_ID(), 'crb_object_name');
    $object_works = carbon_get_post_meta(get_the_ID(), 'crb_object_works');
    $projects = carbon_get_post_meta(get_the_ID(), 'crb_projects_pics');
    ?>
    <div class="project">

        <?php if ($projects): ?>
            <!-- Swiper container -->
            <div class="swiper project__slider">
                <div class="swiper-wrapper">
                    <?php foreach ($projects as $project): ?>
                        <div class="swiper-slide">
                            <?php if (!empty($project['crb_project_image'])): ?>
                                <?php
                                $project_img_full = wp_get_attachment_image_url($project['crb_project_image'], 'full');
                                $project_img_thumb = wp_get_attachment_image_url($project['crb_project_image'], 'medium_large'); // миниатюра для слайдера
                                ?>
                                <a href="<?php echo esc_url($project_img_full); ?>"
                                    data-fancybox="gallery"
                                    data-caption="<?php echo esc_attr($project['crb_project_image_desc']); ?>">
                                    <img src="<?php echo esc_url($project_img_thumb); ?>"
                                        alt="<?php echo esc_attr($project['crb_project_image_alt']); ?>">
                                </a>
                            <?php endif; ?>

                            <?php if (!empty($project['crb_project_image_desc'])): ?>
                                <p class="project__image-desc"><?php echo wp_kses_post($project['crb_project_image_desc']); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Optional navigation buttons -->
                <div class="slider-pagination"></div>
            </div>
        <?php endif; ?>

        <div style="margin-top: 40px;" class="accent-text">
            <h3>Выполненные работы:</h3>
            <?php if ($object_works): ?>
                <div class="project__works"><?php echo $object_works ?></div>
            <?php endif; ?>
        </div>



    </div>

    <?php if (trim(strip_tags(get_the_content()))): ?>
        <section>

            <?php the_content(); ?>

        </section>
</div>
<?php endif; ?>