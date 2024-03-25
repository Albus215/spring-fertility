<?php
?>
	<div class="o__blog-cats container">
		<ul>
			<?php
			wp_list_categories([
				'orderby' => 'name',
				'show_option_none' => '',
				'show_count' => false,
				'title_li' => false,
				'exclude' => [hide_pressreleases($args)],
			]);
			?>
		</ul>
	</div>
<?php
