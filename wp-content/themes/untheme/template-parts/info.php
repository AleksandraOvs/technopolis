<?php
if ($info_slides = carbon_get_post_meta(get_the_ID(), 'crb_info_slides')) {
?>
    <section class="section-info">
        <div class="fixed-container">
            <div class="section-info__content toRight">
                <?php
                if ($heading = carbon_get_post_meta(get_the_ID(), 'crb_info_head')) {
                    echo '<h2 class="title">' . $heading . '</h2>';
                }
                ?>

                <?php
                if ($text_content = carbon_get_post_meta(get_the_ID(), 'crb_info_text')) {
                    echo '<div class="text">' . $text_content . '</div>';
                }
                ?>
            </div>

            <div class="section-info__slider">
                <div class="swiper info-slider">
                    <div class="swiper-wrapper">
                        <?php 
                            foreach ($info_slides as $info_slide){
                                $slide_img = wp_get_attachment_image_url($info_slide['crb_info_slide'], 'full');
                                ?>
                                    <div class="swiper-slide info-slider__slide">
                                        <img src="<?php echo $slide_img?>" alt="image slide">
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="slider-info-pagination"></div>
            </div>
        </div>
    </section>
<?php
}
?>