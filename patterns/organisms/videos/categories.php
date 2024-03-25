<?php
/**
 * @var $categories WP_Term[]
 */
$args = wp_parse_args($args, [
	'categories' => [],
]);
$categories = $args['categories'];

if (!empty($categories)) : ?>
	<nav data-role="nav-secondary" id="navbar-secondary-videos" class="o__videos-nav">
		<ul class="o__videos-nav-list">
			<li class="o__videos-nav-item">
				<a href="#all-videos">All</a>
			</li>
			<?php foreach ($categories as $category) :
				$categoryId = sanitize_title($category->name);
				?>
				<li class="o__videos-nav-item">
					<a href="#<?= $categoryId ?>"><?= $category->name ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>
	<div class="o__videos-nav-spacer" data-role="nav-secondary-spacer"></div>
<?php
endif;
