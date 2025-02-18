<?php
global $post;

$show_spacer = true;

$nav_class = 'home-navbar';
if (is_page_template('page-templates/ivf.php')
	|| is_page_template('page-templates/team.php')
	|| is_page_template('page-templates/egg-hunt.php')
	|| is_404()
	|| is_singular('team')
	|| is_search()) {
	$nav_class = 'white-nav';
}

if (is_page_template('page-templates/egg-hunt.php')) {
	$nav_class = 'white-nav egg-hunt-nav-menu';
}

if (is_tax('knowledge_topic')) {
	$show_spacer = false;
	$nav_class = 'white-nav white-nav-unfixed';
}

?>
<?php if ($show_spacer) : ?>
	<div class="navbar-default-spacer"></div>
<?php endif; ?>
<nav class="navbar navbar-default <?php echo esc_html($nav_class); ?>">
	<div class="container">

		<div class="navbar-header">
			<button type="button" id="mb-open-menu" class="navbar-toggle extramenu-open">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?= home_url() ?>">
				<img class="nvbar-white img-responsive"
					 src="<?php echo esc_html(get_field('general_options_logo', 'option')); ?>" alt="">
				<img class="nvbar-blue img-responsive"
					 src="<?php echo esc_html(get_field('general_options_logo_blue', 'option')); ?>" alt="">
			</a>
			<a class="navbar-top-info__search-icon" href="#search-toggle">
				<svg width="30px" height="20px" viewBox="10 5 26 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<path d="M6,15.985258 C6,21.4938575 10.4815725,25.970516 15.985258,25.970516 C18.5208845,25.970516 20.8402948,25.017199 22.6044226,23.4545455 L28.968059,29.8181818 C29.0859951,29.9361179 29.2383292,29.995086 29.3955774,29.995086 C29.5528256,29.995086 29.7051597,29.9361179 29.8230958,29.8181818 C30.0589681,29.5823096 30.0589681,29.2039312 29.8230958,28.968059 L23.4545455,22.6044226 C25.017199,20.8402948 25.970516,18.5257985 25.970516,15.985258 C25.970516,10.4766585 21.4889435,6 15.985258,6 C10.4815725,6 6,10.4766585 6,15.985258 Z M24.7665848,15.985258 C24.7665848,20.8255528 20.8255528,24.7665848 15.985258,24.7665848 C11.1449631,24.7665848 7.2039312,20.8255528 7.2039312,15.985258 C7.2039312,11.1449631 11.1449631,7.2039312 15.985258,7.2039312 C20.8255528,7.2039312 24.7665848,11.1400491 24.7665848,15.985258 Z"></path>
				</svg>
			</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php if (is_page_template('page-templates/egg-hunt.php')) :
				wp_nav_menu(['theme_location' => 'egg_hunt']);
			else :
				wp_nav_menu([
					'theme_location' => 'header_menu',
					'container' => false,
					'walker' => new \Spring\NavWalkerWithCustomSubmenu(),
				]);
			endif; ?>
		</div>
	</div>
</nav>
