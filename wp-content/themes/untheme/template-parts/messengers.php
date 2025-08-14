<?php

$contacts = carbon_get_theme_option('crb_contacts');

$oh = carbon_get_theme_option('crb_oh_text');
$oh_icon = carbon_get_theme_option('crb_oh_icon');

$phone = carbon_get_theme_option('crb_tel_text');
$phone_icon = carbon_get_theme_option('crb_tel_icon');
$phone_link = carbon_get_theme_option('crb_tel_link');
?>
<ul class="contacts-list">

    <?php
    if (!empty($oh)) {
        echo '<li class="contacts-list__item">';
        if (!empty($oh_icon)) {
            $oh_icon_url = wp_get_attachment_image_url($oh_icon, 'full');

            echo '<div class="contact-icon"><img class="contacts-list__item__img" src="' . $oh_icon_url . '" /></div>';
        }

        echo '<span>' . $oh . '</span>';
        echo '</li>';
    }
    ?>
    <?php
    if (!empty($contacts)) {
        foreach ($contacts as $contact) {
            $contact_icon_url = wp_get_attachment_image_url($contact['crb_contact_image'], 'full');
            echo '<li class="contacts-list__item">';
            echo '<a class="contact-link" href="' . $contact['crb_contact_link'] . '"><img class="contacts-list__item__img" src="' . $contact_icon_url . '" alt="' . $contact['crb_contact_name'] . '"/></a>';
            echo '</li>';
        }
    }
    ?>

    <?php
    if (!empty($phone_link)) {
        echo '<li class="contacts-list__item _phone"><a href="'.$phone_link.'">';
        if (!empty($phone_icon)) {
            $phone_icon_url = wp_get_attachment_image_url($phone_icon, 'full');

            echo '<div class="contact-icon"><img class="contacts-list__item__img" src="' . $phone_icon_url . '" /></div>';
        }

        echo '<span>' . $phone . '</span>';
        echo '</a></li>';
    }
    ?>
</ul>