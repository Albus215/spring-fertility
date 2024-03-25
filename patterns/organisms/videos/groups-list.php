<?php
$args = wp_parse_args($args, [
	'groups' => [],
]);
$groups = $args['groups'];

if (!empty($groups)) : ?>
	<section data-role="sop-term-section">
		<?php foreach ($groups as $groupNumber => $group) :
			if (!empty($group['category_posts'])) :
				$groupId = sanitize_title($group['category_title']);
				$categoryTitle = $group['category_title'];

				$categoryTitleWords = explode(' ', $categoryTitle);
				$categoryTitle = '<span style="color: #0A9BD6">' . $categoryTitleWords[0] . '</span> ' .
					implode(' ', array_slice($categoryTitleWords, 1));

				$groupClass = ($groupNumber + 1) % 2 === 0 ?
					'o__videos-list__group-even' :
					'o__videos-list__group-odd';
				?>
				<section class="clearfix o__videos-list__group <?= $groupClass ?>"
						 data-role="sop-term-group"
						 data-href="#<?= $groupId ?>">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h2 class="o__videos-list__group-title">
									<?= $categoryTitle ?>
								</h2>
							</div>
						</div>
						<div class="row o__videos-list__posts">
							<?php foreach ($group['category_posts'] as $post) : /** @var $post WP_Post */
								$postPermalink = get_permalink($post);
								$postThumbnailUrl = get_the_post_thumbnail_url($post);
								$postDescription = get_field('post_description', $post->ID);
								?>
								<div class="col-sm-6 col-xs-12"
									 data-role="sop-term">
									<article class="o__videos-list__post">
										<a class="o__videos-list__post-tmb" href="<?= $postPermalink ?>"
										   style="background-image: url(<?= $postThumbnailUrl ?>)"></a>
										<h4 class="o__videos-list__post-title">
											<a href="<?= $postPermalink ?>"
											   data-role="sop-term-title">
												<?= $post->post_title ?>
											</a>
										</h4>
										<p style="display: none"
										   data-role="sop-term-description">
											<?= $postDescription ?>
										</p>
									</article>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</section>
			<?php endif;
		endforeach; ?>
	</section>
<?php endif;
