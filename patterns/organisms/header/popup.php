<?php
/**
 * Header Popup
 */

$popupShow = get_field('header_popup_show', 'options');
$popupTxt = get_field('header_popup_text', 'options');
$popupClass = ' header-popup__shift';
$popupBtn = wp_parse_args(get_field('header_popup_button', 'options'), [
	'url'    => '',
	'title'  => '',
	'target' => '',
]);

if ($popupShow) :
	$popupHash = md5($popupTxt) . md5($popupBtn['title'] . $popupBtn['url'] . $popupClass);
	?>
	<div class="header-popup <?= $popupClass ?>"
		 data-popup-hash="<?= $popupHash ?>">
		<div class="header-popup__box">
				<span class="header-popup__txt">
					<?= $popupTxt ?>
				</span>
			<?php if (!empty($popupBtn['url'])) : ?>
				<a class="header-popup__btn"
				   href="<?= $popupBtn['url'] ?>"
				   target="<?= $popupBtn['target'] ?>">
					<?= $popupBtn['title'] ?>
				</a>
			<?php endif; ?>
			<a class="header-popup__x"></a>
		</div>
	</div>
<?php endif;
