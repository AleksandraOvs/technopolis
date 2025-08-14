<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package untheme
 */

?>

<?php if ($shortcode = carbon_get_theme_option('crb_order_shortcode')) {
?>

	<!-- <div class="hidden">
		<div class="popup-order" id="popup-order"> -->
	<?php //echo $popup_sale_short 

	echo do_shortcode(" $shortcode ");

	?>
	<?php //echo do_shortcode('[contact-form-7 id="72c1f3a" title="Contact form 1"]'); 
	?>
	<!-- </div>
	</div> -->
<?php
}
?>

<footer id="colophon" class="site-footer">
	<div class="fixed-container">
		<div class="site-info">
			<?php
			$footer_logo = get_theme_mod('footer_logo');
			$img = wp_get_attachment_image_src($footer_logo, 'full');
			if ($img) : echo '<img class="footer-logo-img" src="' . $img[0] . '" alt="">';
			endif;
			?>

			<?php if (is_active_sidebar('footer-info')) : ?>
				<ul class="footer-info">
					<?php dynamic_sidebar('footer-info'); ?>
				</ul>
			<?php endif; ?>
		</div><!-- .site-info -->

		<div class="site-footer__right">
			<?php if (is_active_sidebar('footer-sidebar1')) : ?>
				<ul class="footer-widget">
					<?php dynamic_sidebar('footer-sidebar1'); ?>
				</ul>
			<?php endif; ?>

			<?php //get_template_part('template-parts/contacts-block') 
			?>

			<?php if (is_active_sidebar('footer-sidebar2')) : ?>
				<ul class="footer-widget">
					<?php dynamic_sidebar('footer-sidebar2'); ?>
				</ul>
			<?php endif; ?>

			<div class="footer-right">
				<?php

				$contacts = carbon_get_theme_option('crb_contacts');

				$oh = carbon_get_theme_option('crb_oh_text');
				$oh_icon = carbon_get_theme_option('crb_oh_icon');

				$phone = carbon_get_theme_option('crb_tel_text');
				$phone_icon = carbon_get_theme_option('crb_tel_icon');
				$phone_link = carbon_get_theme_option('crb_tel_link');
				?>

				<?php
				if (!empty($phone_link)) {
					echo '<div class="phone"><a href="' . $phone_link . '">' . $phone . '</a></div>';
				}
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
				</ul>
			</div>


		</div>
	</div>

	<div class="footer-bottom">
		<div class="fixed-container">
			<div class="copyright">
				<div><span><?php bloginfo('name'); ?></span><span>&copy;</span><span><?php echo ', ' . date('Y') . 'г.'; ?></span></div>
				<p><?php bloginfo('description'); ?></p>
			</div>

			<a href="/privacy-policy">Политика конфиденциальности</a>
		</div>
	</div>

	<?php
	if (current_user_can('administrator')) {
	?>
		<div class="show-temp"><?php echo get_current_template(); ?> </div>
	<?php
	}
	?>

</footer><!-- #colophon -->
<?php get_template_part('template-parts/floating-buttons') ?>
<div class="arrow-up">
	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M7.24994 15.0001V2.81066L1.53022 8.53039C1.23732 8.82328 0.762563 8.82328 0.46967 8.53039C0.176777 8.2375 0.176777 7.76274 0.46967 7.46984L7.46967 0.469844L7.52631 0.418086C7.82089 0.177777 8.25561 0.19524 8.53022 0.469844L15.5302 7.46984L15.582 7.52648C15.8223 7.82107 15.8048 8.25579 15.5302 8.53039C15.2556 8.80499 14.8209 8.82246 14.5263 8.58215L14.4697 8.53039L8.74994 2.81066V15.0001C8.74994 15.4143 8.41416 15.7501 7.99994 15.7501C7.58573 15.7501 7.24994 15.4143 7.24994 15.0001Z" fill="#ded9e2" />
	</svg>

</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>