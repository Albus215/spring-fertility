<?php
/**
 * Search-on-page section
 *
 * @var $search_title       string
 * @var $search_placeholder string
 * @var $search_not_found   string
 */
extract(wp_parse_args($args, [
	'search_title'       => 'What do you want to learn more about?',
	'search_placeholder' => 'Begin typing here or browse a category to find answers...',
	'search_not_found'   => 'Not found :(',
]), EXTR_OVERWRITE);

?>
<section id="o__sop" class="o__sop">
	<div class="container o__sop-container">
		<div class="row">
			<div class="col-md-4">
				<h3 class="o__sop-title"><?= $search_title ?></h3>
			</div>
			<div class="col-md-8">
				<form class="o__sop-form"
					  data-role="sop-form">
					<input class="o__sop-form-inp" type="text" autocomplete="false"
						   placeholder="<?= $search_placeholder ?>"
						   data-role="sop-input">
					<button class="o__sop-form-btn" type="submit"></button>
				</form>
			</div>
			<div class="col-md-12">
				<div class="o__sop-results"
					 data-role="sop-results">
					<span class="o__sop-results-x" data-role="sop-results-x">&times;</span>
					SHOWING <span class="o__sop-results-n" data-role="sop-results-n"></span> RESULTS FOR
					<span class="o__sop-results-t" data-role="sop-results-t"></span>:
				</div>
			</div>
		</div>
	</div>
	<div class="o__sop-separator"
		 data-role="sop-hide-on-search"></div>
</section>

<div class="o__sop-nf container"
	 data-role="sop-nf">
	<div class="row">
		<div class="col-sm-12">
			<h3 class="text-center"><?= $search_not_found ?></h3>
		</div>
	</div>
</div>
