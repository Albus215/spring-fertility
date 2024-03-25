<?php
/**
 * 404 Page
 */
get_header();

$page404txt = get_field('404_page_text', 'options');
?>

<main class="main  space-p-bottom-75 space-p-top-75">
	<div class="container text-center">
		<div class="space-p-top-25 text-center">
			<img class="img-responsive"
				 src="/wp-content/themes/spring-fertility/patterns/static/images/spring_404.jpg" alt="404">
		</div>
		<h3><strong><?= $page404txt ?></strong></h3>
	</div>
</main>

<?php
get_footer();
