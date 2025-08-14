<?php
$gallery_heading = carbon_get_the_post_meta('crb_gallery_heading');
$gallery_description = carbon_get_the_post_meta('crb_gallery_description');
$gallery_items = carbon_get_the_post_meta('crb_gallery_items');
?>

<?php if ($gallery_items): ?>
<section class="gallery-section">
    <div class="fixed-container">
    <?php if ($gallery_heading): ?>
        <h2><?= esc_html($gallery_heading); ?></h2>
    <?php endif; ?>

    <?php if ($gallery_description): ?>
        <div class="gallery-description">
            <?= apply_filters('the_content', $gallery_description); ?>
        </div>
    <?php endif; ?>

    <div class="gallery-slider swiper">
        <div class="swiper-wrapper">
            <?php
            // Группируем изображения по 4
            $chunks = array_chunk($gallery_items, 4);
            foreach ($chunks as $group): ?>
                <div class="swiper-slide">
                    <div class="gallery-slide-group">
                        <?php foreach ($group as $item): 
                            $image_url = wp_get_attachment_image_url($item['crb_gallery_item'], 'large');
                            $thumb_url = wp_get_attachment_image_url($item['crb_gallery_item'], 'medium');
                            $caption = esc_attr($item['crb_gallery_item_desc']);
                        ?>
                            <a class="gallery-thumb" data-fancybox="gallery" href="<?= esc_url($image_url); ?>" data-caption="<?= $caption; ?>">
                                <img src="<?= esc_url($thumb_url); ?>" alt="<?= $caption; ?>" />
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Навигация -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination"></div>
    </div>
    </div>
</section>
<?php endif; ?>