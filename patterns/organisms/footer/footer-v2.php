<?php
/**
 * Footer V2
 */

$footerData = wp_parse_args($args);

$customFooterUse = get_field('layout_use_custom_footer');
$customFooter = [
	'show_contact_info'   => true,
	'show_signup_form'    => true,
	'show_locations_info' => true,
	'show_menus'          => true,
];
if ($customFooterUse) {
	if ($customFooter_field = get_field('layout_custom_footer')) {
		$customFooter['show_contact_info'] = !$customFooter_field['hide_contact_info'];
		$customFooter['show_signup_form'] = !$customFooter_field['hide_signup_form'];
		$customFooter['show_locations_info'] = !$customFooter_field['hide_locations_info'];
		$customFooter['show_menus'] = !$customFooter_field['hide_menus'];

		if (!empty($customFooter_field['contact_phone_link']) && !empty($customFooter_field['contact_phone_link']['url']))
			$footerData['contact_phone'] = $customFooter_field['contact_phone_link'];
		if (!empty($customFooter_field['contact_fax_link']) && !empty($customFooter_field['contact_fax_link']['url']))
			$footerData['contact_fax'] = $customFooter_field['contact_fax_link'];
		if (!empty($customFooter_field['contact_email_link']) && !empty($customFooter_field['contact_email_link']['url']))
			$footerData['contact_email'] = $customFooter_field['contact_email_link'];
	}
}


if ($customFooterUse) {

}

$customFooterShowContactInfo = $customFooterUse && $customFooter['hide_contact_info'] ? true : false;

?>
<footer class="footer-v2">

	<?php if ($customFooter['show_contact_info']) : ?>
		<section class="footer-v2__contact">
			<div class="container clearfix">
				<div class="footer-v2__contact-box">
					<div class="footer-v2__contact-title"><?= $footerData['contact_title'] ?></div>
					<?php if (!empty($footerData['contact_phone']['url']) && $footerData['contact_phone']['url'] !== '#') : ?>
						<div class="footer-v2__contact-p">
							<a href="<?= $footerData['contact_phone']['url'] ?>"
							   target="<?= $footerData['contact_phone']['target'] ?>">
								<?= $footerData['contact_phone']['title'] ?>
							</a>
						</div>
					<?php endif; ?>
					<?php if (!empty($footerData['contact_fax']['url']) && $footerData['contact_fax']['url'] !== '#') : ?>
						<div class="footer-v2__contact-f">
							<a href="<?= $footerData['contact_fax']['url'] ?>"
							   target="<?= $footerData['contact_fax']['target'] ?>">
								<?= $footerData['contact_fax']['title'] ?>
							</a>
						</div>
					<?php endif; ?>
					<?php if (!empty($footerData['contact_email']['url']) && $footerData['contact_email']['url'] !== '#') : ?>
						<div class="footer-v2__contact-e">
							<a href="<?= $footerData['contact_email']['url'] ?>"
							   target="<?= $footerData['contact_email']['target'] ?>">
								<?= $footerData['contact_email']['title'] ?>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($customFooter['show_signup_form']) : ?>
		<?php if (!empty($footerData['subscribe_form_code'])) : ?>
			<section class="footer-v2__subscribe">
				<div class="container clearfix footer-v2__subscribe-container">
					<div class="footer-v2__subscribe-row">
						<div class="footer-v2__subscribe-info the-content">
							<?= do_shortcode($footerData['subscribe_form_info']) ?>
						</div>
						<div class="footer-v2__subscribe-code">
							<?= do_shortcode($footerData['subscribe_form_code']) ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($customFooter['show_locations_info']) : ?>
		<section class="footer-v2__locs">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="footer-v2__locs-title"><?= $footerData['locations_title'] ?></h4>
				</div>
			</div>
			<div class="footer-v2__loc-list">
				<?php if (!empty($footerData['locations'])) :
				$locsCount = count($footerData['locations']);
				$locationsClass = '';
				if ($locsCount % 5 === 0) $locationsClass = 'footer-v2__loc-1-5';
				elseif ($locsCount % 6 === 0) $locationsClass = 'footer-v2__loc-1-6';
				elseif ($locsCount % 4 === 0) $locationsClass = 'footer-v2__loc-1-4';
				elseif ($locsCount % 3 === 0) $locationsClass = 'footer-v2__loc-1-3';
				else $locationsClass = 'footer-v2__loc-1-4';

				foreach ($footerData['locations'] as $footerLoc) : ?>
					<div class="footer-v2__loc <?= $locationsClass ?>">
						<div class="footer-v2__loc-box">
							<a class="footer-v2__loc-title"
							   href="<?= $footerLoc['title']['url'] ?>"
							   target="<?= $footerLoc['title']['target'] ?>">
								<?= $footerLoc['title']['title'] ?>
							</a>
							<div class="footer-v2__loc-txt">
								<div class="clearfix"><?= $footerLoc['text'] ?></div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</section>
	<?php endif; ?>

	<section class="footer-v2__common">
		<div class="container clearfix">

			<?php if ($customFooter['show_menus']) : ?>
				<div class="footer-v2__navs row">
					<?php if (has_nav_menu('footer_1')) :
						$footerMenuName_1 = get_term(get_nav_menu_locations()['footer_1'], 'nav_menu')->name; ?>
						<div class="footer-v2__nav col-md-3 col-sm-3 col-xs-6">
							<div class="footer-v2__nav-title"><?= $footerMenuName_1 ?></div>
							<?= wp_nav_menu([
								'theme_location' => 'footer_1',
								'container'      => '',
								'menu_class'     => 'footer-v2__nav-box',
								'echo'           => false,
								'fallback_cb'    => false,
								'before'         => '',
								'after'          => '',
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							]); ?>
						</div>
					<?php endif; ?>
					<?php if (has_nav_menu('footer_2')) :
						$footerMenuName_2 = get_term(get_nav_menu_locations()['footer_2'], 'nav_menu')->name; ?>
						<div class="footer-v2__nav col-md-3 col-sm-3 col-xs-6">
							<div class="footer-v2__nav-title"><?= $footerMenuName_2 ?></div>
							<?= wp_nav_menu([
								'theme_location' => 'footer_2',
								'container'      => '',
								'menu_class'     => 'footer-v2__nav-box',
								'echo'           => false,
								'fallback_cb'    => false,
								'before'         => '',
								'after'          => '',
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							]); ?>
						</div>
					<?php endif; ?>
					<?php if (has_nav_menu('footer_3')) :
						$footerMenuName_3 = get_term(get_nav_menu_locations()['footer_3'], 'nav_menu')->name; ?>
						<div class="footer-v2__nav col-md-3 col-sm-3 col-xs-6">
							<div class="footer-v2__nav-title"><?= $footerMenuName_3 ?></div>
							<?= wp_nav_menu([
								'theme_location' => 'footer_3',
								'container'      => '',
								'menu_class'     => 'footer-v2__nav-box',
								'echo'           => false,
								'fallback_cb'    => false,
								'before'         => '',
								'after'          => '',
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							]); ?>
						</div>
					<?php endif; ?>
					<?php if (has_nav_menu('footer_4')) :
						$footerMenuName_4 = get_term(get_nav_menu_locations()['footer_4'], 'nav_menu')->name; ?>
						<div class="footer-v2__nav col-md-3 col-sm-3 col-xs-6">
							<div class="footer-v2__nav-title"><?= $footerMenuName_4 ?></div>
							<?= wp_nav_menu([
								'theme_location' => 'footer_4',
								'container'      => '',
								'menu_class'     => 'footer-v2__nav-box',
								'echo'           => false,
								'fallback_cb'    => false,
								'before'         => '',
								'after'          => '',
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							]); ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if (!empty($footerData['socials'])) : ?>
					<div class="footer-v2__socials">
						<?php foreach ($footerData['socials'] as $footerSocial) : ?>
							<a class="footer-v2__social"
							   style="background-image: url(<?= $footerSocial['icon']['url'] ?>)"
							   href="<?= $footerSocial['link']['url'] ?>"
							   title="<?= $footerSocial['link']['title'] ?>"
							   target="<?= $footerSocial['link']['target'] ?>"></a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php if (!empty($footerData['bottom_text'])) : ?>
				<div class="footer-v2__bottom-txt">
					<?= str_replace('%YEAR%', date('Y'), $footerData['bottom_text']); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

</footer>

<script type="text/javascript">
	(function ($) {
		$('a[href^="tel:"]').click(function () {
			var telnumber = $(this).attr('href');
			gtag('event', 'click', {
				event_category: 'Phone Links',
				event_label: telnumber
			});
		});
	})(jQuery);
</script>

<style type="text/css">
	.footer-v2__loc-1-6 {
		width: 16.66667%;
	}

	@media (max-width: 81.25em) {
		.footer-v2__loc-1-6 {
			width: 33.33333%;
		}
	}

	@media (max-width: 61.24em) {
		.footer-v2__loc-1-6, .footer-v2__loc-1-5 {
			width: 33.33333%;
		}
	}

	@media (max-width: 46.24em) {
		.footer-v2__loc {
			padding: 30px 15px 15px 15px;
		}

		.footer-v2__loc-txt * {
			font-size: 12px !important;
		}

		.footer-v2__loc-1-6, .footer-v2__loc-1-5 {
			width: 50%;
		}

		.footer-v2__loc-1-4 {
			width: 50%;
		}

		.footer-v2__loc-1-3 {
			width: 50%;
		}
	}
</style>
