<li class="archive-list__item">
    <?php
    if (has_post_thumbnail()) {
    ?>
        <a href="#project-popup" data-fancybox><?php the_post_thumbnail() ?></a>
    <?php

    }
    ?>

    
    <div style="display: none; width: 500px;" id="project-popup">
        <?php
        $project_pics = carbon_get_post_meta(get_the_ID(), 'crb_projects_pics');
        ?>

        <div class="project-content">
            <?php the_content() ?>
            <?php
            if (!empty($project_pics)) {
            ?>
                <div class="swiper project-slider">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($project_pics as $pic) {
                            $pic = wp_get_attachment_image_url($pic['crb_project_image'], 'full');
                            $pic_desc = $pic['crb_project_image_desc'];
                            $pic_alt = $pic['crb_project_image_alt'];
                        ?>
                            <div class="swiper-slide project-slider__slide">
                                <img src="<?php echo $pic ?>" alt="<?php echo $pic_alt ?>">

                                <?php
                                if (!empty($pic_desc)) {
                                    echo '<div class="project-pic-desc">' . $pic_desc . '</div>';
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</li>