<?php

/**
 * Providing our patients
 */

use \Spring\Modules\EventbriteEvents\EventbriteEvents;
use Lean\Load;

$args = wp_parse_args($args, [
    'title'  => '',
    'repeater'  => [],
]);

$key = 1;
?>

<section class="faq-accordion">
    <div class="container">
        <?php $title = $args['title'];
        if ($title) :?>
            <div class="faq-accordion__title col-lg-offset-3 col-md-offset-2 col-lg-6 col-md-8 col-sm-12"><?= $title; ?></div>
        <?php endif; ?>
        <?php if ($args['repeater']) :  ?>
            <?php foreach ($args['repeater'] as $item) : ?>
                <article class="o__rfaq-post">
                    <h4 class="o__rfaq-post-title" data-toggle="collapse" aria-expanded="false" data-target="#theBlock<?= $key; ?>">
                        <?= esc_html($item['title']); ?>
                    </h4>
                    <div class="o__rfaq-post-content collapse" id="theBlock<?= $key; ?>" data-role="sop-term-description">
                        <?= wp_kses_post($item['description']); ?>
                    </div>
                </article>
            <?php $key++;
            endforeach; ?>
        <?php endif; ?>

    </div>
</section>