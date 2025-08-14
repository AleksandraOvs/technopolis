<?php

add_action('init', 'register_post_types');

function register_post_types()
{

	register_post_type('services', [
		'label'  => null,
		'labels' => [
			'name'               => 'Услуги', // основное название для типа записи
			'singular_name'      => 'Услуга', // название для одной записи этого типа
			'add_new'            => 'Добавить услугу', // для добавления новой записи
			'add_new_item'       => 'Добавление услуги', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактировать', // для редактирования типа записи
			'new_item'           => 'Новая услуга', // текст новой записи
			'view_item'          => 'Перейти', // для просмотра записи этого типа.
			'search_items'       => 'Искать услугу', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Услуги', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		'show_in_nav_menus'   =>  true, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => false, // $post_type. C WP 4.7
		'menu_position'       => 2,
		'menu_icon'           => 'dashicons-hammer',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => true,
		'supports'            => ['title', 'thumbnail', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		//'taxonomies'          => false,
		'has_archive'         => true,
		//'rewrite'             => true,
		'rewrite' => [
			'slug' => 'services',
			'with_front' => false,
		],
		'query_var'           => 'services',
	]);

	register_post_type('portfolio', [
		'label'  => null,
		'labels' => [
			'name'               => 'Наши реализованные проекты', // основное название для типа записи
			'singular_name'      => 'Проект', // название для одной записи этого типа
			'add_new'            => 'Добавить проект', // для добавления новой записи
			'add_new_item'       => 'Проект', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактировать проект', // для редактирования типа записи
			'new_item'           => 'Новый проект', // текст новой записи
			'view_item'          => 'Перейти на страницу проекта', // для просмотра записи этого типа.
			'search_items'       => 'Искать', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Проекты', // название меню
		],
		'description'            => '',
		'public'                 => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => false, // $post_type. C WP 4.7
		'menu_position'       => 3,
		'menu_icon'           => 'dashicons-format-gallery',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => true,
		'supports'            => ['title', 'thumbnail', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		//'taxonomies'          => ['post_tag'],
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => 'portfolio',
	]);
}

function register_category_taxonomies() {
    register_taxonomy('service_category', array('services'), array(
        'labels' => array(
            'name'              => 'Категории услуг',
            'singular_name'     => 'Категория услуги',
            'search_items'      => 'Поиск категорий',
            'all_items'         => 'Все категории',
            'edit_item'         => 'Редактировать категорию',
            'update_item'       => 'Обновить категорию',
            'add_new_item'      => 'Добавить новую категорию',
            'new_item_name'     => 'Название новой категории',
            'menu_name'         => 'Категории услуг',
        ),
        'hierarchical'      => true, // как рубрики
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'service-category'),
        'show_in_rest'      => true, // включить поддержку Gutenberg
    ));

	register_taxonomy('projects_category', array('portfolio'), array(
        'labels' => array(
            'name'              => 'Категории проектов',
            'singular_name'     => 'Категория проекта',
            'search_items'      => 'Поиск категорий',
            'all_items'         => 'Все категории',
            'edit_item'         => 'Редактировать категорию',
            'update_item'       => 'Обновить категорию',
            'add_new_item'      => 'Добавить новую категорию',
            'new_item_name'     => 'Название новой категории',
            'menu_name'         => 'Категории проектов',
        ),
        'hierarchical'      => true, // как рубрики
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'projects-category'),
        'show_in_rest'      => true, // включить поддержку Gutenberg
    ));
}
add_action('init', 'register_category_taxonomies');