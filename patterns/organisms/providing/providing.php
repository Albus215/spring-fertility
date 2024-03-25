<?php

/**
 * Providing our patients
 */

use \Spring\Modules\EventbriteEvents\EventbriteEvents;
use Lean\Load;

$args = wp_parse_args($args, [
    'id_label'  => '',
    'background_image'  => '',
    'background_color'  => '',
    'title'  => '',
    'title_list'  => '',
    'provide_list'  => [],
    'block_list'  => [],
]);
$div_bg =   $args['background_image']['url'];
$div_bg_color = $args['background_color']
?>

<section <?php if ($args['id_label']) {
                echo 'id="' . $args['id_label'] . '"';
            } ?> class="providing" style="<? if ($div_bg) { ?>background:top center / cover no-repeat url('<?= esc_url($div_bg); ?>'); <?php } ?>
            <? if ($div_bg_color) { ?>background:center / cover <?= $div_bg_color; ?>; <?php } ?>">
    <div class="container">

        <div class="providing__title">
            <?= wp_kses_post($args['title']); ?>
        </div>
        <div class="providing__list-wrapper">
            <div class="providing__list-title">
                <?= wp_kses_post($args['title_list']); ?>
            </div>
            <?php if ($args['provide_list']) :  ?>
                <div class="providing__list-block">
                    <ul>
                        <?php foreach ($args['provide_list'] as $item) : ?>
                            <li class="providing__list-item">
                                <?php if (!empty($item['use_link'])) : ?>
                                    <a href="<?= $item['url'] ?>" target="<?= $item['new_tab'] ? '_blank' : '' ?>">
                                        <?= esc_html($item['item']); ?>
                                    </a>
                                <?php else : ?>
                                    <?= esc_html($item['item']); ?>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($args['block_list']) : ?>
            <div class="providing__block-wrapper">
                <?php foreach ($args['block_list'] as $block) : ?>
                    <div class="providing__block-item">
                        <div class="providing__block-img">
                            <img src="<?= $block['image']['url']; ?>" alt="<?= $block['image']['alt']; ?>">
                        </div>
                        <?= wp_kses_post($block['description']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>