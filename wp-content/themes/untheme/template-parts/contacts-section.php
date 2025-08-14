<section class="contacts-section">
    <div class="fixed-container">
        <h3 class="title">Контакты</h3>

        <div class="contacts-section__inner">
            <div class="contacts-section__left">
                <h4>Свяжитесь с нами любым удобным способом:</h4>

                <?php
                $contacts = carbon_get_theme_option('crb_contacts');
                if (!empty($contacts)) {
                    echo '<ul class="contacts-list">';
                    foreach ($contacts as $contact) {

                        $contact_img_url = wp_get_attachment_image_url($contact['crb_contact_image'], 'full');

                        echo '<li class="contacts-list__item">';
                        echo '<a class="contact-link" href="' . $contact['crb_contact_link'] . '"><div class="contact-icon"><img class="contacts-list__item__img" src="' . $contact_img_url . '" alt="' . $contact['crb_contact_name'] . '"/></div>' . $contact['crb_contact_name'] . '</a>';
                        echo '</li>';
                    }

                    $phone = carbon_get_theme_option('crb_tel_text');
                    $phone_icon = carbon_get_theme_option('crb_tel_icon');
                    $phone_link = carbon_get_theme_option('crb_tel_link');

                    if (!empty($phone_link)) {
                        echo '<li class="contacts-list__item _phone"><a href="' . $phone_link . '">';
                        if (!empty($phone_icon)) {
                            $phone_icon_url = wp_get_attachment_image_url($phone_icon, 'full');

                            echo '<div class="contact-icon"><img class="contacts-list__item__img" src="' . $phone_icon_url . '" /></div>';
                        }

                        echo '<span>' . $phone . '</span>';
                        echo '</a></li>';
                    }

                    echo '</ul>';
                }
                ?>
            </div>
            <?php
            if ($map_code = carbon_get_theme_option('crb_fdb_map')) {
            ?>
                <div class="contacts-section__right">
                    <div class="map">
                        <?php echo $map_code ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>