<?php
/**
 * Cookies Popup
 */

$cPopupShow = boolval(get_field('cookies_policy_popup_show', 'options'));
$cPopupTxt = get_field('cookies_policy_popup_text', 'options');
$cPopupBtnLabel = get_field('cookies_policy_popup_button_label', 'options');
if (empty($cPopupBtnLabel)) $cPopupBtnLabel = __('Accept');
if (empty($cPopupTxt)) $cPopupTxt = __('This website uses Cookies');

if ($cPopupShow) :
	$cPopupHash = md5($cPopupTxt) . md5($cPopupBtnLabel);
	?>
	<div class="cookies-popup"
		 data-popup-hash="<?= $cPopupHash ?>">
		<p class="cookies-popup__txt">
			<?= $cPopupTxt ?>
			<br>
			<span class="cookies-popup__ok"><?= $cPopupBtnLabel ?></span>
		</p>
	</div>
<?php endif;
