<?php
// BTN CTA MOBILE
?>
<a class="btn-mobile-tel" href="tel:(415) 964-5618"></a>

<style type="text/css">
	.btn-mobile-tel {
		display: none;
	}

	@media (max-width: 732px) {
		.btn-mobile-tel {
			display: block!important;
			position: fixed;
			z-index: 50000000;
			width: 80px;
			height: 80px;
			right: 5px;
			bottom: 10px;
			background-color: transparent;
			background-repeat: no-repeat;
			background-size: contain;
			background-position: center center;
			background-image: url("/wp-content/themes/spring-fertility/patterns/static/images/icon_phone_mobile.png");
		}
		#chat-widget-container {
			display: none!important;
			visibility: hidden!important;
			opacity: 0!important;
			z-index: 0!important;
		}
	}
</style>
