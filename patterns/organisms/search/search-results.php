<?php
$args = wp_parse_args( $args, [
	'posts_ids' => [],
] );
?>

<div class="o__search-results">
	<div class="container">
		<h2 class="o__search-results__title" style="padding-top: 30px">Search Results</h2>
		<p class="o__search-results__term">"<?php echo esc_html( urldecode( get_search_query() ) ); ?>"</p>

		<div class="row">
			<ul class="o__search-results__list col-md-8 col-md-offset-2">
				<?php if ( empty( $args['posts_ids'] ) ) : ?>
					<li>
						<h3 class="o__search-results__item-title">Your search has no results. Please try a different term</h3>
					</li>
				<?php else : ?>
					<?php foreach ( $args['posts_ids'] as $posts_id ) : ?>
						<li>
							<h3 class="o__search-results__item-title"><?php echo esc_html( get_the_title( $posts_id ) ); ?></h3>
							<a href="<?php echo esc_url( get_permalink( $posts_id ) ); ?>" class="o__search-results__item-link">Explore</a>
						</li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
