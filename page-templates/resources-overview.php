<?php
/**
 * Template Name: Resources Overview
 */

use Lean\Load;
use \Spring\Modules\Knowledge\ResourceManager;

if (!function_exists('spring_first_word_color')) {
	function spring_first_word_color($title, $color = '#0A9BD6')
	{
		$titleWords = explode(' ', $title);
		return (count($titleWords) > 1) ?
			'<span style="color: ' . $color . '">' . $titleWords[0] . '</span> ' . implode(' ', array_slice($titleWords, 1)) :
			$title;
	}
}

get_header();

$cta = get_field('cta');
$menu = get_field('page_menu');
$rManager = new ResourceManager();
$resourcesTree = $rManager->getResourcesTree();

Load::organisms('resources-faq/hero-simple', ['title' => get_the_title(),]);
?>

<?php
Load::organism('resources-faq/menu', ['menu_items' => $menu]);
Load::organism('search-on-page/search-section');
?>

<?php
$titleTests = 'Tests';
$titleTreatments = 'Treatments';

if (!empty($resourcesTree)) :
	foreach ($resourcesTree as $mainTopic) : /** @var $mainTopicTerm WP_Term */
		$mainTopicTerm = $mainTopic['topic'];
		$mainTopicId = 'topic-' . $mainTopicTerm->term_id;
		$mainTopicHref = sanitize_title($mainTopicTerm->name);
		?>
		<section class="o__rfaq-topic" data-href="#<?= $mainTopicHref ?>"
				 data-role="sop-term-section">
			<section class="o__rfaq-subtopics">
				<div class="container clearfix">
					<h2 class="o__rfaq-topic-title"><?= spring_first_word_color($mainTopicTerm->name) ?></h2>
					<div class="row o__rfaq-block-list">
						<?php
						$subtopicLists = array_chunk(
							$mainTopic['subtopics'],
							ceil(count($mainTopic['subtopics']) / 2)
						);
						foreach ($subtopicLists as $subtopicList) : ?>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<?php foreach ($subtopicList as $subtopic) : /** @var $subtopicTerm WP_Term */
									$subtopicTerm = $subtopic['topic'];
									$subtopicId = 'subtopic-' . $mainTopicTerm->term_id . '-' . $subtopicTerm->term_id;
									if (!empty($subtopic['posts'])) : ?>
										<section class="o__rfaq-block"
												 data-role="sop-term-group">
											<h3 class="o__rfaq-block-title"
												data-toggle="collapse" aria-expanded="false"
												data-target="#<?= $subtopicId ?>">
												<?= $subtopicTerm->name ?>
											</h3>
											<div class="o__rfaq-block-content collapse"
												 id="<?= $subtopicId ?>">
												<?php foreach ($subtopic['posts'] as $post) : /** @var $post WP_Post */
													$postId = 'topic-post-' . $mainTopicTerm->term_id . '-' . $post->ID;
													?>
													<article class="o__rfaq-post"
															 data-role="sop-term">
														<h4 class="o__rfaq-post-title"
															data-toggle="collapse" aria-expanded="false"
															data-target="#<?= $postId ?>"
															data-role="sop-term-title">
															<?= $post->post_title ?>
														</h4>
														<div class="o__rfaq-post-content collapse"
															 id="<?= $postId ?>"
															 data-role="sop-term-description">
															<?= $post->post_content ?>
														</div>
													</article>
												<?php endforeach; ?>
											</div>
										</section>
									<?php endif;
								endforeach; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>

			<?php if (!empty($mainTopic['tests'])) :
				$testsContainerId = $mainTopicId . '-tests';
				$testImg = get_field('kb_topic_test_sectioin_background_image', $mainTopicTerm);
				?>
				<section class="o__rfaq-tests" data-role="sop-hide-on-search"
						 data-href="#<?= $mainTopicHref ?>-tests">
					<div class="container o__rfaq-tests-wrap">
						<h2 class="o__rfaq-topic-title"><?= $titleTests ?></h2>
						<div class="row o__rfaq-block-list">
							<div class="col-md-6 col-xs-12 o__rfaq-block">
								<select class="o__rfaq-test-list" id="<?= $testsContainerId ?>"
										data-role="menu-accordion">
									<?php foreach ($mainTopic['tests'] as $testKey => $test) : /** @var $test WP_Post */
										$testId = 'topic-test-' . $mainTopicTerm->term_id . '-' . $test->ID; ?>
										<option <?= !$testKey ? 'selected' : '' ?> value="#<?= $testId ?>">
											<?= $test->post_title ?>
										</option>
									<?php endforeach; ?>
								</select>
								<img class="o__rfaq-tests-img"
									 src="<?= $testImg['url'] ?>"
									 alt="<?= $testImg['alt'] ?>">
							</div>
							<div class="col-md-6 col-xs-12">
								<?php foreach ($mainTopic['tests'] as $testKey => $test) : /** @var $test WP_Post */
									$testId = 'topic-test-' . $mainTopicTerm->term_id . '-' . $test->ID;
									$testContent = get_field('page_content', $test->ID);
									?>
									<div class="o__rfaq-block-content <?= !$testKey ? 'active' : '' ?>"
										 id="<?= $testId ?>" data-role="menu-accordion-item">
										<div class="space-p-bottom-25">
											<?= $test->post_content ?>
											<?php if (!empty($testContent['left_column']) || !empty($testContent['right_column'])) : ?>
												<p class="space-p-top-25">
													<a class="btn"
													   href="<?= get_permalink($test) ?>" target="_blank">
														<?= __('Learn More') ?>
													</a>
												</p>
											<?php endif; ?>
										</div>
									</div>
								<?php endforeach; ?>
								<img class="o__rfaq-tests-img-mobile"
									 src="<?= $testImg['url'] ?>"
									 alt="<?= $testImg['alt'] ?>">
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>

			<?php if (!empty($mainTopic['treatments'])) : ?>
				<section class="o__rfaq-treatments"
						 data-role="sop-term-group" data-href="#<?= $mainTopicHref ?>-treatments">
					<div class="container clearfix">
						<h2 class="o__rfaq-topic-title"><?= $titleTreatments ?></h2>
						<div class="row o__rfaq-block-list">
							<?php
							$treatmentLists = array_chunk(
								$mainTopic['treatments'],
								ceil(count($mainTopic['treatments']) / 2)
							);
							foreach ($treatmentLists as $treatmentList) : ?>
								<div class="col-md-6 col-sm-12 col-xs-12 ">
									<?php foreach ($treatmentList as $treatment) : /** @var $treatment WP_Post */
										$treatmentId = 'topic-treatment-' . $mainTopicTerm->term_id . '-' . $treatment->ID;
										?>
										<article class="o__rfaq-block"
												 data-role="sop-term">
											<h3 class="o__rfaq-block-title"
												data-toggle="collapse" aria-expanded="false"
												data-target="#<?= $treatmentId ?>"
												data-role="sop-term-title">
												<?= $treatment->post_title ?>
											</h3>
											<div class="o__rfaq-block-content collapse"
												 id="<?= $treatmentId ?>"
												 data-role="sop-term-description">
												<?= $treatment->post_content ?>
											</div>
										</article>
									<?php endforeach; ?>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</section>
			<?php endif; ?>

		</section>

	<?php endforeach;
endif; ?>

	<section class="container-fluid o__videos-cta"
			 style="background-image: url(<?= $cta['background_image']['url'] ?>)">
		<div class="row">
			<div class="col-lg-12">
				<?= do_shortcode($cta['content']) ?>
			</div>
		</div>
	</section>
<?php

get_footer();


