<?php
/**
 * Simple Links List
 */
$args = wp_parse_args($args, [
	'title'        => '',
	'links_groups' => [],
]);

if (!empty($args['links_groups'])) :
	$linksGroupsArray = array_chunk($args['links_groups'], ceil(count($args['links_groups']) / 2));
	?>
	<section class="container clearfix o-lgl__wrap">
		<?php if (!empty($args['title'])) : ?>
			<div class="row">
				<div class="col-sm-12 o-lgl__title">
					<h2 class="text-center"><?php echo $args['title']; ?></h2>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<?php foreach ($linksGroupsArray as $linksGroupKey => $linksGroups) : ?>
				<div class="col-sm-6 o-lgl__group-wrap">
					<?php foreach ($linksGroups as $linksGroup) :
						$linksGroupId = $linksGroupKey . dechex(rand(10000, 99999)); ?>
						<p class="o-lgl__group-title"
						   data-toggle="collapse" aria-expanded="false"
						   data-target="#<?php echo $linksGroupId; ?>">
							<?php echo $linksGroup['title']; ?>
						</p>
						<div class="o-lgl__group-links collapse"
							 id="<?= $linksGroupId ?>">
							<?php foreach ($linksGroup['links'] as $linkObj) : /** @var $post WP_Post */
								$link = $linkObj['link']; ?>
								<a class="o-lgl__link"
								   href="<?php echo $link['url']; ?>"
								   target="<?php echo $link['target']; ?>">
									<?php echo $link['title']; ?>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
<?php endif;
