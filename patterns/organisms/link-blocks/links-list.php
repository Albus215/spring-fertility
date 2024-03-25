<?php
/**
 * Simple Links List
 */
$args = wp_parse_args($args, [
	'title' => '',
	'links' => [],
]);

if (!empty($args['links'])) :
	$linksArray = array_chunk($args['links'], 2);
	?>
	<section class="container clearfix o-ll__wrap">
		<?php if (!empty($args['title'])) : ?>
			<div class="row">
				<div class="col-sm-12 o-ll__title">
					<h2 class="text-center"><?php echo $args['title']; ?></h2>
				</div>
			</div>
		<?php endif; ?>
		<?php foreach ($linksArray as $links) : ?>
			<div class="row">
				<?php if (!empty($links[0])) :
					$link = $links[0]['link']; ?>
					<div class="col-sm-6 o-ll__link-wrap">
						<a class="o-ll__link"
						   href="<?php echo $link['url']; ?>"
						   target="<?php echo $link['target']; ?>">
							<?php echo $link['title']; ?>
						</a>
					</div>
				<?php endif; ?>
				<?php if (!empty($links[1])) :
					$link = $links[1]['link']; ?>
					<div class="col-sm-6 o-ll__link-wrap">
						<a class="o-ll__link"
						   href="<?php echo $link['url']; ?>"
						   target="<?php echo $link['target']; ?>">
							<?php echo $link['title']; ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</section>
<?php endif;
