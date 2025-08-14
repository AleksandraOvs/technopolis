<?php
$feed_description = carbon_get_theme_option('crb_feed_description');
$feeds = carbon_get_theme_option('crb_feeds_list');
$feeds_img = carbon_get_theme_option('crb_feed_image');

?>

<section class="section testimonials-image">

    <?php if ($feed_description) : ?>
        <div class="fixed-container">
            <?php if (!empty($feeds_img)) {
                $feeds_img_url = wp_get_attachment_image_url($feeds_img, 'full');
                echo '<img src="' . $feeds_img_url . '" alt="Отзывы MarketingPro" />';
            }
            ?>

            <div class="testimonials-description toleft">
                <?php echo apply_filters('the_content', $feed_description); ?>
            </div>
        </div>
    <?php endif;
    ?>
</section>


<section class="testimonials-block">

    <div class="fixed-container _feeds-container">
        <?php if (!empty($feeds)) : ?>
            <!-- Swiper -->
            <div class="swiper testimonials-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($feeds as $feed) : ?>
                        <div class="swiper-slide testimonial-item">
                            <?php if (!empty($feed['crb_feed_heading'])) : ?>
                                <h3 class="testimonial-heading">
                                    <?php echo esc_html($feed['crb_feed_heading']); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if (!empty($feed['crb_feed_text'])) : ?>
                                <div class="testimonial-text">
                                    <?php echo apply_filters('the_content', $feed['crb_feed_text']); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($feed['crb_feed_sign'])) : ?>
                                <div class="testimonial-caption">
                                    <?php echo esc_html($feed['crb_feed_sign']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Навигация -->
                <div class="testimonials-swiper-button-prev">
                    <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.13395 1.05997L6.07295 -2.86102e-05L0.29395 5.77697C0.200796 5.86954 0.126867 5.97961 0.0764193 6.10086C0.0259713 6.22211 0 6.35214 0 6.48347C0 6.6148 0.0259713 6.74483 0.0764193 6.86608C0.126867 6.98733 0.200796 7.0974 0.29395 7.18997L6.07295 12.97L7.13295 11.91L1.70895 6.48497L7.13395 1.05997Z" fill="black" />
                    </svg>

                </div>
                <div class="testimonials-swiper-button-next">
                    <svg width="8" height="13" viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M-3.91006e-05 1.05997L1.06096 -2.86102e-05L6.83996 5.77697C6.93312 5.86954 7.00704 5.97961 7.05749 6.10086C7.10794 6.22211 7.13391 6.35214 7.13391 6.48347C7.13391 6.6148 7.10794 6.74483 7.05749 6.86608C7.00704 6.98733 6.93312 7.0974 6.83996 7.18997L1.06096 12.97L0.000960827 11.91L5.42496 6.48497L-3.91006e-05 1.05997Z" fill="black" />
                    </svg>

                </div>

                <div class="testimonials-swiper-pagination"></div>
            </div>
        <?php endif; ?>
    </div>


</section>