<?php
/**
 * Custom Nav
 */
$args = wp_parse_args($args, [
	'nav' => [],
]);

$nav = $args['nav'];

?>
<header class="nav-main__box">
	<div class="container nav-main__container">
		<a class="nav-main__logo-box" href="<?= home_url() ?>">
			<span class="nav-main__logo" style="background-image: url(<?= $nav['logo']['url'] ?>)"></span>
		</a>

		<?php if (!empty($nav['links'])) : ?>
			<ul class="nav-main nav-main__primary">
				<?php foreach ($nav['links'] as $navItem) : if (empty($navItem['link']['url'])) continue; ?>
					<li class="nav-item">
						<a href="<?= $navItem['link']['url'] ?>"
						   target="<?= $navItem['link']['target'] ?>">
							<?= $navItem['link']['title'] ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if (!empty($nav['button']['url'])) : ?>
			<a class="nav-main__custom-btn"
			   href="<?= $nav['button']['url'] ?>" target="<?= $nav['button']['target'] ?>">
				<?= $nav['button']['title'] ?>
			</a>
		<?php endif; ?>

		<?php if (!empty($nav['links'])) : ?>
			<button data-mobile-nav-toggle
					class="nav-mobile__toggle"></button>
			<nav data-mobile-nav
				 class="nav-mobile">
				<ul class="nav-mobile__list">
					<?php foreach ($nav['links'] as $navItem) : if (empty($navItem['link']['url'])) continue; ?>
						<li class="nav-item">
							<a href="<?= $navItem['link']['url'] ?>"
							   target="<?= $navItem['link']['target'] ?>">
								<?= $navItem['link']['title'] ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		<?php endif; ?>

	</div>
</header>

<div class="nav-main__spacer"></div>

<style>
	.nav-main__logo-box {
		margin: 0 auto 0 0;
		justify-self: flex-start;
	}

	.nav-main.nav-main__primary {
		margin: 0 0 0 auto;
		justify-self: flex-end;
	}

	.nav-main.nav-main__primary + .nav-main__custom-btn {
		margin-left: 15px;
		margin-right: 15px;
	}
	.nav-mobile__toggle {

	}

	.nav-main__custom-btn {
		display: inline-block;
		margin-top: auto;
		margin-bottom: auto;
		justify-self: flex-end;
		align-self: center;

		text-decoration: none !important;
		text-transform: uppercase;
		font-weight: bold;
		line-height: 1;
		color: #20b2de;
		font-size: 16px;

		padding: 8px 12px 8px 12px;

		border: 2px solid #20b2de;
		border-radius: 6px;
		background: #fff;

		transition: .25s;
	}

	.nav-main__custom-btn:hover {
		background: #20b2de;
		color: #fff;
	}
</style>
