<?php
/**
 * @var $menuItems array
 */
$args = wp_parse_args($args, [
	'menu_items' => [],
]);
$menuItems = $args['menu_items'];

if (!empty($menuItems)) : ?>
	<nav data-role="nav-secondary" id="navbar-secondary-videos" class="o__videos-nav o__videos-nav-w-images">
		<ul class="o__videos-nav-list">
			<?php foreach ($menuItems as $menuItem) :
				if ($menuItem['type'] === 'topic') :
					$title = $menuItem['topic']->name;
					$url = sanitize_title($menuItem['topic']->name);
					?>
					<li class="o__videos-nav-item">
						<a href="#<?= $url ?>" style="background-image: url(<?= $menuItem['image']['url'] ?>)">
							<?= $title ?>
						</a>
					</li>
				<?php else : ?>
					<li class="o__videos-nav-item">
						<a href="<?= $menuItem['link']['url'] ?>" target="<?= $menuItem['link']['target'] ?>"
						   style="background-image: url(<?= $menuItem['image']['url'] ?>)">
							<?= $menuItem['link']['title'] ?>
						</a>
					</li>
				<?php endif;
			endforeach; ?>
		</ul>
	</nav>
	<div class="o__videos-nav-spacer o__videos-nav-spacer-w-images" data-role="nav-secondary-spacer"></div>
<?php
endif;
