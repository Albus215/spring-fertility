<?php
use Lean\Load;

?>

<div class="nav-extramenu">
	<div class="extramenu-close"></div>

	<a class="nav-ext-login visible-xs" target="_blank"
		href="<?php echo esc_url( get_field( 'contact_loginurl', 'option' ) ); ?>">
		<?php echo esc_html( get_field( 'contact_login_cta', 'option' ) ); ?>
	</a>


	<div id="nav-ext-menu" class="navext-menu visible-xs">

		<?php
			wp_nav_menu( array(
				'theme_location' => 'header_menu',
			));
		?>

	</div>

	<?php
		wp_nav_menu( array(
			'theme_location' => 'more_menu',
		));
	?>

	<div class="visible-xs nav-ext-btncall">

		<a href="tel:<?php echo esc_html( get_field( 'contact_phone', 'option' ) ); ?>">
			CALL US
		</a>			

	</div>

</div>
