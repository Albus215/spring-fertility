<?php
/**
 * The template for displaying the footer.
 *
 * @package Lean
 * @since 1.0.0
 */

use Lean\Load;

$hide_footer = get_field('layout_hide_footer_on_this_page');
?>

<?php do_action('lean/before_footer'); ?>
<?php if (empty($hide_footer)) :
	$footer = get_field('footer', 'spring_settings'); ?>
	<?php Load::organisms('btn-cta-mobile/btn-cta-mobile'); ?>
	<?php Load::organisms('footer/footer-v2', $footer); ?>
<?php else : ?>
	<style type="text/css">
		#chat-widget-container {
			display: none!important;
			visibility: hidden!important;
			opacity: 0!important;
			z-index: 0!important;
		}
	</style>
<?php endif; ?>
<?php wp_footer(); ?>
<?php do_action('lean/after_footer'); ?>

<script type="text/javascript">
	jQuery(window).on('load', function () {
		setTimeout(function () {
			(function (document, tag) {
				var script = document.createElement(tag);
				var element = document.getElementsByTagName('body')[0];
				script.src = 'https://acsbap.com/apps/app/assets/js/acsb.js';
				script.async = true;
				script.defer = true;
				(typeof element === 'undefined' ? document.getElementsByTagName('html')[0] : element).appendChild(script);
				script.onload = function () {
					acsbJS.init({
						statementLink: '',
						feedbackLink: '',
						footerHtml: '',
						hideMobile: false,
						hideTrigger: false,
						language: 'en',
						position: 'left',
						leadColor: '#146FF8',
						triggerColor: '#146FF8',
						triggerRadius: '50%',
						triggerPositionX: 'left',
						triggerPositionY: 'bottom',
						triggerIcon: 'default',
						triggerSize: 'medium',
						triggerOffsetX: 20,
						triggerOffsetY: 20,
						mobile: {
							triggerSize: 'small',
							triggerPositionX: 'left',
							triggerPositionY: 'bottom',
							triggerOffsetX: 0,
							triggerOffsetY: 0,
							triggerRadius: '0'
						}
					});
				};
			}(document, 'script'));
		}, 3000);
	});
</script>
<script type="text/javascript" src="/wp-content/themes/spring-fertility/patterns/organisms/js-paroller/jquery.paroller.js"></script>
<script type="text/javascript">
	if (jQuery(window).width() >= 1000) jQuery('[data-paroller-factor]').paroller();

	jQuery('[id^="show-block-"]').hide();
	jQuery('a[href^="#show-block-"]').on('click', function (event) {
		event.preventDefault();
		var blockToShow = jQuery(jQuery(this).attr('href'));
		if (blockToShow.length) {
			if (blockToShow.is(':hidden')) {
				blockToShow.show();
			} else {
				blockToShow.hide();
			}
		}
	});
</script>


<!--GEOLOCATION START-->
<script>
	(function(g,e,o,t,a,r,ge,tl,y){
		t=g.getElementsByTagName(e)[0];y=g.createElement(e);y.async=true;
		y.src='https://g594253005.co/gj.js?id=-McEhWdLL3gCIuSNSNBn&refurl='+g.referrer+'&winurl='+encodeURIComponent(window.location);
		t.parentNode.insertBefore(y,t);
	})(document,'script');
</script>
<!--GEOLOCATION END-->

</body>
</html>
