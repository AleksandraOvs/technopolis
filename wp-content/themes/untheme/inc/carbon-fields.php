<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;



add_action('carbon_fields_register_fields', 'site_carbon');
function site_carbon()
{

    Container::make('theme_options', 'Contacts')

        ->set_page_menu_position(2)
        ->set_icon('dashicons-megaphone')
        ->add_tab(__('Контакты'), array(
            // Field::make("checkbox", "crb_show_on_footer", "Показывать ссылки в подвале")
            //     ->set_option_value('yes'),
            // Field::make('text', 'crb_header_link', 'Ссылка в шапке')
            //     ->set_width(50),
            // Field::make('text', 'crb_header_link_text', 'Текст ссылки в шапке')
            //     ->set_width(50),
            Field::make('image', 'crb_oh_icon', 'Opening hours icon')
                ->set_width(30),
            Field::make('rich_text', 'crb_oh_text', 'Opening hours text')
                ->set_width(70),

            Field::make('image', 'crb_tel_icon', 'Телефон')
                ->set_width(33),
            Field::make('text', 'crb_tel_text', 'Номер телефона')
                ->set_width(33),
            Field::make('text', 'crb_tel_link', 'Ссылка телефона')
                ->set_width(33),

            Field::make('complex', 'crb_contacts', 'Contacts item')

                ->add_fields(array(
                    Field::make('image', 'crb_contact_image', 'Contact icon')
                        ->set_width(25),
                    Field::make('text', 'crb_contact_name', 'Name of contact')
                        ->set_width(25),
                    Field::make('text', 'crb_contact_link_text', 'Link text')
                        ->set_width(25),
                    Field::make('text', 'crb_contact_link', 'Link')
                        ->set_width(25),
                )),
        ))

        ->add_tab(__('Код Я.карты'), array(
            Field::make('text', 'crb_fdb_map', 'Код Я.карты')
        ))

        ->add_tab(__('Floating buttons'), array(

            Field::make('text', 'crb_fb_first_link', 'Link of floating button#1')
                ->set_width(50),
            Field::make('text', 'crb_fb_first_link_text', 'Link text of floating button#1')
                ->set_width(50),


            Field::make('text', 'crb_fb_second_head', 'Heading of form')
                ->set_width(50),
            Field::make('rich_text', 'crb_fb_second_desc', 'Heading of form')
                ->set_width(50),
            Field::make('text', 'crb_fb_second_shortcode', 'Shortcode of floating button#2')
                ->set_width(50),
            Field::make('text', 'crb_fb_second_text', 'Button text of floating button#2')
                ->set_width(50),

        ));

    Container::make('theme_options', 'Отзывы')

        ->set_page_menu_position(2)
        ->set_icon('dashicons-admin-comments')
        ->add_fields(array(

            Field::make('text', 'crb_feed_heading', 'Block heading'),
            Field::make('complex', 'crb_feeds_list', 'Testimonials')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'crb_feed_heading', 'Testimonial heading'),
                    Field::make('rich_text', 'crb_feed_text', 'Testimonial text'),
                    Field::make('text', 'crb_feed_sign', 'Testimonial Sign'),
                ))
        ));

    Container::make('theme_options', 'Блоки сайта')

        ->set_page_menu_position(3)
        ->set_icon('dashicons-editor-ol')
        ->add_tab(__('Преимущества'), array(
            Field::make('text', 'crb_why_heading', 'Заголовок'),
            Field::make('rich_text', 'crb_why_description', 'Заголовок'),

            Field::make('complex', 'crb_why_items', 'Items')
                ->set_layout('grid')
                ->add_fields(array(
                    Field::make('image', 'crb_why_icon', 'Icon')
                        ->set_width(50),
                    Field::make('text', 'crb_why_text', 'Text')
                        ->set_width(50),
                )),
            Field::make('image', 'crb_why_img', 'Изображение для блока')
        ))


        ->add_tab(__('Этапы производства работ'), array(
            Field::make('text', 'crb_stages_heading', 'Block Heading'),
            Field::make('complex', 'crb_stages_list', 'Steps')
                ->set_layout('tabbed-vertical')
                ->add_fields(array(
                    Field::make('text', 'crb_stage_heading', 'Head of step')
                        ->set_width(30),
                    Field::make('rich_text', 'crb_stage_text', 'Text')
                        ->set_width(70),
                ))
        ));

    /*POST META*/

    Container::make('post_meta', 'Main page content')
        ->show_on_page(get_option('page_on_front'))

        ->add_tab(__('Hero Slider'), array(

            Field::make('complex', 'crb_hero_slides', 'Слайды первого экрана')
                ->add_fields(array(
                    // Field::make("checkbox", "crb_darker_pic", "Включить затемнение слайда")
                    //     ->set_option_value('yes'),
                    Field::make('image', 'crb_hero_img', 'Hero Picture')
                        ->set_width(50),
                    Field::make('image', 'crb_hero_img_mob', 'Hero Picture (mobile)')
                        ->set_width(50),
                    Field::make('rich_text', 'crb_hero_content_heading', 'Heading#1')
                        ->set_width(50),
                    Field::make('rich_text', 'crb_hero_content_desc', 'Hero description')
                        ->set_width(50),
                    Field::make('text', 'crb_hero_content_link', 'Ссылка')
                        ->set_width(50),
                    Field::make('text', 'crb_hero_content_link_text', 'Текст ссылки')
                        ->set_width(50),
                )),
        ))

        ->add_tab('Блок Услуги', array(

            Field::make('text', 'crb_services_head', 'Heading')
                ->set_width(50),
            Field::make('rich_text', 'crb_services_text', 'Text')
                ->set_width(50),
            Field::make('text', 'crb_services_link', 'Ссылка')
                ->set_width(50),
            Field::make('text', 'crb_services_link_text', 'Текст cсылки')
                ->set_width(50),
        ))

        ->add_tab(__('Фотогалерея'), array(
            Field::make('text', 'crb_gallery_heading', 'Заголовок'),
            Field::make('rich_text', 'crb_gallery_description', 'Заголовок'),

            Field::make('complex', 'crb_gallery_items', 'Слайды')

                ->add_fields(array(
                    Field::make('image', 'crb_gallery_item', 'Изображение')
                        ->set_width(50),
                    Field::make('text', 'crb_gallery_item_desc', 'Подпись')
                        ->set_width(50),
                )),
        ))

        ->add_tab(__('FAQ'), array(
            Field::make('text', 'crb_faq_head', 'FAQ heading'),
            Field::make('complex', 'crb_faq_items', 'Items')
                ->set_layout('tabbed-vertical')
                ->add_fields(array(
                    Field::make('text', 'crb_question', 'Question')
                        ->set_width(30),
                    Field::make('rich_text', 'crb_answer', 'Answer')
                        ->set_width(100),
                )),

            Field::make('text', 'crb_faq-block_heading', 'Form heading')
                ->set_width(33),
            Field::make('rich_text', 'crb_faq-block_description', 'Form description')
                ->set_width(33),
            Field::make('text', 'crb_faq-block_shortcode')
                ->set_width(33)
        ));

    Container::make('term_meta', 'Дополнительные поля категории')
        ->where('term_taxonomy', '=', 'service_category')
        ->add_fields(array(
            Field::make('image', 'crb_category_image', 'Изображение категории'),
        ));

    // Container::make('post_meta', 'Service Content')
    //     ->where('post_type', '=', 'page')
    //     ->add_fields(array(
    //         Field::make('rich_text', 'crb_service_description', 'Service description'),

    //         Field::make('text', 'crb_cc_heading', 'Section heading')
    //             ->set_width(50),
    //         Field::make('rich_text', 'crb_cc_desc', 'Section description')
    //             ->set_width(50),

    //         Field::make('complex', 'crb_color_chart', 'Color Chart')
    //             ->add_fields(array(
    //                 Field::make('color', 'crb_color', 'Set Color')
    //                     ->set_width(50),
    //                 Field::make('image', 'crb_color_pic', 'Set Pic Color')
    //                     ->set_width(50),
    //                 Field::make('text', 'crb_color_name', 'Color name')
    //                     ->set_width(50),
    //             ))
    //     ));

    Container::make('post_meta', 'Projects')
        ->show_on_post_type('portfolio')

        ->add_fields(array(
            Field::make('rich_text', 'crb_object_name', 'Название объекта')
                ->set_width(50),
            Field::make('rich_text', 'crb_object_works', 'Краткий перечень проведенных работ')
                ->set_width(50),

            Field::make('complex', 'crb_projects_pics', 'Project')
                ->set_layout('tabbed-vertical')
                ->add_fields(array(
                    Field::make('image', 'crb_project_image', 'Project Image')
                        ->set_width(33),
                    Field::make('rich_text', 'crb_project_image_desc', 'Image Description')
                        ->set_width(33),
                    Field::make('text', 'crb_project_image_alt', 'Image Alt')
                        ->set_width(33),
                ))
        ));
}
