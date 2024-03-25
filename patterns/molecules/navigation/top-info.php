<?php
global $post;

if (has_nav_menu('top_info_menu')) : ?>
	<nav class="navbar navbar-top-info">
		<div class="container">
			<?php wp_nav_menu([
				'theme_location' => 'top_info_menu',
				'container' => false,
				'walker' => new \Spring\NavWalkerWithIcons(),
			]) ?>
		</div>
	</nav>
	<div class="navbar-top-info__search container">
		<form action="<?php echo esc_url( get_home_url() ); ?>" class="navbar-top-info__search-form">
			<input type="text" name="s" class="navbar-top-info__search-input" placeholder="Search...">
			<button type="submit" class="navbar-top-info__search-btn"></button>
		</form>
	</div>
<?php endif;
