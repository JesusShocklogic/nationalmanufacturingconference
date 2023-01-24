<?php
wp_enqueue_style("social-icon-widget");
?>

<div class="shocklogic_social_media_bar">
    <div class="shocklogic_social_media_bar_container">
        <?php
        if ($args['icons']) {
            foreach ($args['icons'] as $key => $icon) { ?>
                <div class="shocklogic_social_media_bar_container_image">
                    <a href="<?= $icon['link'] ?>" target="_blank">
                        <img src="<?= $icon['icon']['url'] ?>" alt="">
                    </a>
                </div>
        <?php
            } //foreach
        } //if
        ?>
    </div>
</div>