<?php
$heading = carbon_get_theme_option('crb_why_heading');
$description = carbon_get_theme_option('crb_why_description');
$why_items = carbon_get_theme_option('crb_why_items');
$why_image = carbon_get_theme_option('crb_why_img');
?>

<section class="section-why">
    <div class="fixed-container">
        <div class="section-why__left">
            <div class="accent-text">
                <?php
                if (!empty($heading)) {
                    echo '<h3 class="title fromTop">' . $heading . '</h3>';
                }
                ?>
                <?php
                if (!empty($description)) {
                    echo '<div class="accent-description fromTop">' . $description . '</div>';
                }
                ?>
            </div>

            <?php
            if (!empty($why_image)) {
                $why_image_url = wp_get_attachment_image_url($why_image, 'full');

                echo '<img class="why-image" src="' . $why_image_url . '" />';
            }
            ?>
        </div>

        <div class="section-why__right">
            <?php if (!empty($why_items)) { ?>

                <ul class="why-list">
                    <?php
                    foreach ($why_items as $why_item) {
                        $why_item_icon = wp_get_attachment_image_url($why_item['crb_why_icon'], 'full');
                        echo '<li class="fromTop">';
                        echo '<div class="why-list__icon"><img src="' . $why_item_icon . '" alt="Why Choose Our Gutter Experts" /></div>';
                        if (!empty($why_item['crb_why_text'])) {
                            echo '<p>' . $why_item['crb_why_text'] . '</p>';
                        }
                        echo '</li>';
                    }
                    ?>
                </ul>


            <?php } ?>
        </div>

    </div>
</section>