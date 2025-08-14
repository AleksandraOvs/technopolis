<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package untheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'untheme'); ?></a>

		<header id="masthead" class="site-header">
			<div class="header-main">
				<div class="fixed-container">
					<div class="site-branding">
						<?php
						$header_logo = get_theme_mod('header_logo');
						$img = wp_get_attachment_image_src($header_logo, 'full');
						if ($img) : echo '<a class="custom-logo-link" href="' . site_url() . '"><img src="' . $img[0] . '" alt=""></a>';
						endif;
						?>
						<?php
						if (is_front_page() && is_home()) :
						?>
							<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
							<!-- <p><?php //bloginfo('description'); 
									?></p> -->
						<?php
						else :
						?>
							<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
						<?php
						endif;
						?>

					</div>
					<div class="header-right">
						<?php get_template_part('template-parts/messengers') ?>
						<a href="#" class="menu-toggle">
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
						</a>
					</div>


					<!-- </div> -->

				</div>
			</div>

			<div class="header-bottom">
				<div class="fixed-container">
					<nav class="header-nav">

						<?php wp_nav_menu([
							'container' => false,
							'theme_location'  => 'main_menu',
							'walker' => new My_Custom_Walker_Nav_Menu,
							'depth'           => 2,
						]); ?>

						<?php //get_template_part('template-parts/contacts-block') 
						?>
					</nav>



					<div class="header-bottom__services">
						<?php wp_nav_menu([
							'container' => false,
							'theme_location'  => 'services',
							'walker' => new My_Custom_Walker_Nav_Menu,
							'depth'           => 2,
						]); ?>
					</div>

					<!-- <a href="#" class="toggle-services">
						<span>Услуги</span>
						<svg width="4" height="15" viewBox="0 0 4 15" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M0.25 1.75C0.25 0.921573 0.921573 0.25 1.75 0.25C2.57843 0.25 3.25 0.921573 3.25 1.75C3.25 2.57843 2.57843 3.25 1.75 3.25C0.921573 3.25 0.25 2.57843 0.25 1.75Z" fill="white" />
							<path d="M0.25 7.25C0.25 6.42157 0.921573 5.75 1.75 5.75C2.57843 5.75 3.25 6.42157 3.25 7.25C3.25 8.07843 2.57843 8.75 1.75 8.75C0.921573 8.75 0.25 8.07843 0.25 7.25Z" fill="white" />
							<path d="M0.25 12.75C0.25 11.9216 0.921573 11.25 1.75 11.25C2.57843 11.25 3.25 11.9216 3.25 12.75C3.25 13.5784 2.57843 14.25 1.75 14.25C0.921573 14.25 0.25 13.5784 0.25 12.75Z" fill="white" />
						</svg>

					</a> -->
				</div>
			</div>





		</header><!-- #masthead -->