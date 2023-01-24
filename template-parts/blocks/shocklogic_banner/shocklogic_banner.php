<?php

$shocklogic_banner_group = get_field('shocklogic_banner_group');
$spacing = $shocklogic_banner_group['banner_spacing'];
if (isset($shocklogic_banner_group) && $shocklogic_banner_group != null) { ?>
    <div class="shocklogic_banner <?= $spacing ?>">
        <div class="shocklogic_banner_wrapper">
            <?php
            //Content above banner
            if ($shocklogic_banner_group['content_above_banner']) { ?>
                <div class="shocklogic_banner_wrapper_content_top">
                    <?= $shocklogic_banner_group['content_above_banner'] ?>
                </div>
            <?php
            } ?>
            
            <?php
            //Content over banner
            if ($shocklogic_banner_group['content_over_banner']) { ?>
                <div class="shocklogic_banner_wrapper_content_over">
                    <?= $shocklogic_banner_group['content_over_banner'] ?>
                </div>
            <?php
            } ?>

            <div class="shocklogic_banner_wrapper_image">
                <img src="<?= ($shocklogic_banner_group['image']['url']) ?>" alt="">
            </div>

            <?php
            //Content over banner
            if ($shocklogic_banner_group['content_below_banner']) { ?>
                <div class="shocklogic_banner_wrapper_content_bottom">
                    <?= $shocklogic_banner_group['content_below_banner'] ?>
                </div>
            <?php
            } ?>
        </div>
    </div>
<?php
}
