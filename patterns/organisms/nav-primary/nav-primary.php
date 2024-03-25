<?php
/**
 * Nav Primary
 */
$nav = get_field('main_nav', 'spring_settings');

if (!function_exists('spring_nav_item_class')) {
	function spring_nav_item_class($navItem = [])
	{
		$navItemClass = 'nav-item';
		if ($navItem['is_current']) $navItemClass .= ' nav-item-cur';

		if (!empty($navItem['img'])) $navItemClass .= ' nav-item-imglink';

		if (!empty($navItem['sub_links']) || !empty($navItem['sub_imglinks'])) $navItemClass .= ' nav-item-has-sub';

		if (!empty($navItem['sub_links']) && !empty($navItem['sub_imglinks'])) $navItemClass .= ' nav-item-has-sub-mixed';
		elseif (!empty($navItem['sub_links'])) $navItemClass .= ' nav-item-has-sub-links';
		elseif (!empty($navItem['sub_imglinks']))
			$navItemClass .= ' nav-item-has-sub-imglinks nav-item-has-sub-imglinks-' . count($navItem['sub_imglinks']);

		return !empty($navItem['class']) ? ($navItemClass . ' ' . $navItem['class']) : $navItemClass;
	}
}
if (!function_exists('spring_nav_format')) {
	function spring_nav_format($navRaw)
	{
		$spring_nav_current_url = trailingslashit(get_permalink());
		$nav = [];
		foreach ($navRaw as $navRawItem) {
			$navItem = [
				'url'          => $navRawItem['link']['url'],
				'target'       => $navRawItem['link']['target'],
				'title'        => $navRawItem['link']['title'],
				'class'        => $navRawItem['class'],
				'is_current'   => false,
				'sub_links'    => [],
				'sub_imglinks' => [],
			];
			if (trailingslashit($navItem['url']) == $spring_nav_current_url) $navItem['is_current'] = true;
			if ( // -- Sub Links
				($navRawItem['submenu'] === 'links' || $navRawItem['submenu'] === 'mixed') &&
				!empty($navRawItem['submenu_links'])
			) {
				foreach ($navRawItem['submenu_links'] as $navRawSubItem) {
					$navSubItem = [
						'url'        => $navRawSubItem['link']['url'],
						'target'     => $navRawSubItem['link']['target'],
						'title'      => $navRawSubItem['link']['title'],
						'class'      => '',
						'is_current' => trailingslashit($navRawSubItem['link']['url']) == $spring_nav_current_url,
					];
					if ($navSubItem['is_current']) $navItem['is_current'] = true;
					$navSubItem['class'] = spring_nav_item_class($navSubItem);
					$navItem['sub_links'][] = $navSubItem;
				}
			}
			if ( // -- Sub Img-Links
				($navRawItem['submenu'] === 'image-links' || $navRawItem['submenu'] === 'mixed') &&
				!empty($navRawItem['submenu_image_links'])
			) {
				foreach ($navRawItem['submenu_image_links'] as $navRawSubItem) {
					$navSubItem = [
						'url'        => $navRawSubItem['link']['url'],
						'target'     => $navRawSubItem['link']['target'],
						'title'      => $navRawSubItem['link']['title'],
						'img'        => $navRawSubItem['image'],
						'class'      => '',
						'is_current' => trailingslashit($navRawSubItem['link']['url']) == $spring_nav_current_url,
					];
					if ($navSubItem['is_current']) $navItem['is_current'] = true;
					$navSubItem['class'] = spring_nav_item_class($navSubItem);
					$navItem['sub_imglinks'][] = $navSubItem;
				}
			}
			$navItem['class'] = spring_nav_item_class($navItem);
			$nav[] = $navItem;
		}
		return $nav;
	}
}


$navLogo = $nav['logo'];
$navLogoUrl = home_url('/');
if (!empty($nav['primary_nav'])) $navPrimary = spring_nav_format($nav['primary_nav']);
if (!empty($nav['secondary_nav'])) $navSecondary = spring_nav_format($nav['secondary_nav']);

?>

<header class="nav-main__box">
	<div class="container nav-main__container">

		<a class="nav-main__logo-box" href="<?= $navLogoUrl ?>">
			<span class="nav-main__logo" style="background-image: url(<?= $navLogo['url'] ?>)"></span>
		</a>

		<?php if (!empty($navPrimary)) : ?>
			<ul class="nav-main nav-main__primary">
				<?php foreach ($navPrimary as $navItem) : ?>
					<li class="<?= $navItem['class'] ?>">
						<a href="<?= $navItem['url'] ?>"
						   target="<?= $navItem['target'] ?>">
							<?= $navItem['title'] ?>
						</a>
						<?php if (!empty($navItem['sub_links']) || !empty($navItem['sub_imglinks'])) : ?>
							<div class="nav-item-sub">
								<?php if (!empty($navItem['sub_imglinks'])) : ?>
									<ul class="nav-item-sub-imglinks">
										<?php foreach ($navItem['sub_imglinks'] as $subNavItem) : ?>
											<li class="<?= $subNavItem['class'] ?>">
												<a href="<?= $subNavItem['url'] ?>"
												   target="<?= $subNavItem['target'] ?>">
														<span class="nav-item-img"
															  style="background-image: url(<?= spring_tmb_acf($subNavItem['img'], 'thumbnail', 'thumbnail') ?>)"></span>
													<span class="nav-item-title"><?= $subNavItem['title'] ?></span>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
								<?php if (!empty($navItem['sub_links'])) : ?>
									<ul class="nav-item-sub-links">
										<?php foreach ($navItem['sub_links'] as $subNavItem) : ?>
											<li class="<?= $subNavItem['class'] ?>">
												<a href="<?= $subNavItem['url'] ?>"
												   target="<?= $subNavItem['target'] ?>">
													<?= $subNavItem['title'] ?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<button data-search-bar-toggle
				class="nav-main__search-toggle"></button>
		<form action="<?php echo esc_url(get_home_url()); ?>" class="nav-main__search">
			<input type="text" name="s" class="nav-main__search-inp" placeholder="Search...">
			<button type="submit" class="nav-main__search-btn"></button>
		</form>

		<?php if (!empty($navPrimary)) : ?>
			<button class="nav-main__secondary-toggle"></button>
			<ul class="nav-main nav-main__secondary">
				<?php foreach ($navSecondary as $navItem) : ?>
					<li class="<?= $navItem['class'] ?>">
						<a href="<?= $navItem['url'] ?>"
						   target="<?= $navItem['target'] ?>">
							<?= $navItem['title'] ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<button data-mobile-nav-toggle
				class="nav-mobile__toggle"></button>
		<nav data-mobile-nav
			 class="nav-mobile">
			<form action="<?php echo esc_url(get_home_url()); ?>" class="nav-mobile__search">
				<input type="text" name="s" class="nav-mobile__search-inp" placeholder="Search...">
				<button type="submit" class="nav-mobile__search-btn"></button>
			</form>
			<ul class="nav-mobile__list">
				<?php if (!empty($navPrimary)) : ?>
					<?php foreach ($navPrimary as $navItem) : ?>
						<li class="<?= $navItem['class'] ?>">
							<a href="<?= $navItem['url'] ?>"
							   target="<?= $navItem['target'] ?>">
								<?= $navItem['title'] ?>
							</a>
							<?php if (!empty($navItem['sub_links']) || !empty($navItem['sub_imglinks'])) : ?>
								<div class="nav-item-sub">
									<?php if (!empty($navItem['sub_imglinks'])) : ?>
										<ul class="nav-item-sub-imglinks">
											<?php foreach ($navItem['sub_imglinks'] as $subNavItem) : ?>
												<li class="<?= $subNavItem['class'] ?>">
													<a href="<?= $subNavItem['url'] ?>"
													   target="<?= $subNavItem['target'] ?>">
														<span class="nav-item-img"
															  style="background-image: url(<?= spring_tmb_acf($subNavItem['img'], 'thumbnail', 'thumbnail') ?>)"></span>
														<span class="nav-item-title"><?= $subNavItem['title'] ?></span>
													</a>
												</li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
									<?php if (!empty($navItem['sub_links'])) : ?>
										<ul class="nav-item-sub-links">
											<?php foreach ($navItem['sub_links'] as $subNavItem) : ?>
												<li class="<?= $subNavItem['class'] ?>">
													<a href="<?= $subNavItem['url'] ?>"
													   target="<?= $subNavItem['target'] ?>">
														<?= $subNavItem['title'] ?>
													</a>
												</li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php if (!empty($navSecondary)) : ?>
					<?php foreach ($navSecondary as $navItem) : ?>
						<li class="<?= $navItem['class'] ?>">
							<a href="<?= $navItem['url'] ?>"
							   target="<?= $navItem['target'] ?>">
								<?= $navItem['title'] ?>
							</a>
						</li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</nav>

	</div>
</header>

<div class="nav-main__spacer"></div>

