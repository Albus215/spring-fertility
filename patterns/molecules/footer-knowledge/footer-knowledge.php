
<div class="row footer-links">
	<div class="col-sm-4 col-md-3 col-md-offset-1">
		<h5 id="start-a-family">
			<?php echo esc_html( get_field( 'general_options_footer_left_title', 'option' ) ); ?>
		</h5>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'footer_left',
			));
		?>
		<h5 id="plan-your-future">
			<?php echo esc_html( get_field( 'general_options_footer_center_title', 'option' ) ); ?>
		</h5>
		<?php
		wp_nav_menu( array(
			'theme_location' => 'footer_center',
		));
		?>
	</div>

	<div class="col-sm-8 col-md-6 col-md-offset-1 footer-more-info-menu">
		<h5 id="more-information">
			<?php echo esc_html( get_field( 'general_options_footer_right_title', 'option' ) ); ?>
		</h5>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'footer_right',
			));
		?>
	</div>
</div>
