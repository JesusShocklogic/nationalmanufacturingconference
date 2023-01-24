<?php
if ($args['link']) {
    $link_url = esc_url($args['link']['url']);
    $link_title = esc_html($args['link']['title']);
    $link_target = $args['link']['target'] ? $args['link']['target'] : '_self';
    $link_target = esc_attr($link_target);
?>
    <style>
        .button_menu {
            background-color: <?= $args['button_background_colour'] ?>;
            color: <?= $args['button_text_colour'] ?>;
            min-width: <?= $args['button_minimal_width'] ? ($args['button_minimal_width'] . "px") : "auto"; ?>;
            margin-left: 20px;
        }

        .button_menu:hover {
            background-color: <?= $args['button_background_colour_hover'] ?>;
            color: <?= $args['button_text_colour_hover'] ?>;
        }
    </style>
    <div>
        <a class="btn button_menu" href="<?= $link_url ?>" target="<?= $link_target ?>"><?= $link_title ?></a>
    </div>
<?php
}
?>