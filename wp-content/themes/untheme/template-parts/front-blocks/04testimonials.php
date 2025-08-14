<?php
$reviews = carbon_get_theme_option('crb_feeds_list');
$block_heading = carbon_get_theme_option('crb_feed_heading');

if ($reviews):
?>

    <section class="reviews-slider">
        <div class="fixed-container">

            <div class="reviews-heading">
                <?php if ($block_heading): ?>
                    <h2 class="title fromOpacity"><?php echo esc_html($block_heading); ?></h2>
                <?php endif; ?>
                <div class="reviews-heading__controls">
                    <div class="slider-testim-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="26" viewBox="0 0 14 26" fill="none">
                            <path d="M13.8792 23.1711L11.815 25.2333L0.571885 13.9941C0.390651 13.814 0.246822 13.5998 0.148675 13.3639C0.0505276 13.1281 0 12.8751 0 12.6196C0 12.3641 0.0505276 12.1111 0.148675 11.8752C0.246822 11.6393 0.390651 11.4252 0.571885 11.2451L11.815 0L13.8773 2.06225L3.32479 12.6167L13.8792 23.1711Z" fill="#44B33E" />
                        </svg>
                    </div>
                    <div class="slider-testim-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="26" viewBox="0 0 14 26" fill="none">
                            <path d="M-5.81741e-05 23.1711L2.06413 25.2333L13.3073 13.9941C13.4885 13.814 13.6323 13.5998 13.7305 13.3639C13.8286 13.1281 13.8792 12.8751 13.8792 12.6196C13.8792 12.3641 13.8286 12.1111 13.7305 11.8752C13.6323 11.6393 13.4885 11.4252 13.3073 11.2451L2.06413 0L0.00188732 2.06225L10.5544 12.6167L-5.81741e-05 23.1711Z" fill="#44B33E" />
                        </svg>

                    </div>
                </div>
            </div>
            <div class="swiper-container testimonials-slider">
                <div class="swiper-wrapper">
                    <?php foreach (array_chunk($reviews, 5) as $review_group): ?>
                        <div class="swiper-slide testimonials-slide__slide">
                            <div class="review-group">
                                <?php foreach ($review_group as $review): ?>
                                    <div class="review-card">
                                        <h3 class="review-title"><?php echo esc_html($review['crb_feed_heading']); ?></h3>
                                        <div class="review-text"><?php echo wp_kses_post($review['crb_feed_text']); ?></div>
                                        <p class="review-sign"><?php echo esc_html($review['crb_feed_sign']); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </section>

<?php endif; ?>