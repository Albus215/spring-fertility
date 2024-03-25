<?php
use Lean\Load;

get_header();

$qobj = get_queried_object();

$kb_posts = new WP_Query( array(
	'posts_per_page' => 50,
	'orderby' => 'ID',
	'order'   => 'ASC',
	'post_type' => 'knowledge',
	'tax_query' => array(
		array(
			'taxonomy' => 'knowledge_topic',
			'field' => 'slug',
			'terms' => $qobj->slug,
		),
	),
) );

?>

<div class="mtop50 container">
	<div class="row">
		<div class="col-sm-3 knowledge-side">
		<?php
			Load::organism( 'knowledge-sidebar/knowledge-sidebar', [
				'subjects' => [],
			] );
		?>
		</div>
		<div class="col-sm-8 js-knowledge-faq-content">

			<h2><?php echo esc_html( $qobj->name ); ?></h2>
<?php
			if ( strpos( $qobj->name, 'FAQ' ) !== false ) :

				Load::organism( 'knowledge-faq/knowledge-faq', [
					'taxp_id' => $qobj->term_id,
					'taxp_slug' => $qobj->slug,
					'kb_posts' => $kb_posts,
				] );

			else :

				Load::organism( 'knowledge-content/knowledge-content', [
					'kb_posts' => $kb_posts,
					'title' => $qobj->name,
				] );

			endif;
?>

		</div>
	</div>
</div>

<?php
get_footer();
