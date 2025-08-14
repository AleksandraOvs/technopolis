<?php
add_action( 'after_setup_theme', 'set_color_palette' );
 
function set_color_palette(){
	add_theme_support( 
		'editor-color-palette', 
		array(
			array(
				'name'  => 'White',
				'slug'  => 'white',
				'color'	=> '#fff',
			),

			array(
				'name'  => 'Black',
				'slug'  => 'black',
				'color'	=> '#000',
			),

			array(
				'name'  => 'Dark',
				'slug'  => 'dark',
				'color'	=> '#313131',
			),

			array(
				'name'  => 'Main',
				'slug'  => 'main',
				'color' => '#5B6ED1',
			),
			array(
				'name'  => 'Blue',
				'slug'  => 'blue',
				'color' => '#3F50B1',
			),
			array(
				'name'  => 'Light-accent',
				'slug'  => 'light-accent',
				'color' => '#DADEF2',
			),
			array(
				'name'	=> 'Light Grey',
				'slug'	=> 'light-grey',
				'color'	=> '#F1F3FF',
			),
		)
	);
}

add_theme_support( 'disable-custom-colors' );