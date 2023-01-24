<?php
$shocklogic_single_iframe_group = get_field('shocklogic_single_iframe_group');

if (isset($shocklogic_single_iframe_group) && $shocklogic_single_iframe_group != null) {
    $width = $shocklogic_single_iframe_group['width'];
    $block_width = $shocklogic_single_iframe_group['block_width']; ?>

    <div class="shocklogic_single_iframe <?= $block_width ?>">
        <div class="shocklogic_single_iframe_wrapper">
            <?php
            // Text above the iframe
            if ($shocklogic_single_iframe_group['text_above_iframe']) { ?>
                <div class="shocklogic_single_iframe_wrapper_text_above">
                    <?= $shocklogic_single_iframe_group['text_above_iframe']; ?>
                </div>
            <?php
            }
            ?>

            <?php
            // Iframe
            ?>
            <div class="shocklogic_single_iframe_wrapper_iframe <?= $width ?>">
                <?= $shocklogic_single_iframe_group['iframe'] ?>

                <?php
                //Text over the iframe
                if ($shocklogic_single_iframe_group['text_over_iframe']) { ?>
                    <div class="shocklogic_single_iframe_wrapper_iframe_text">
                        <?= $shocklogic_single_iframe_group['text_over_iframe']; ?>
                    </div>
                <?php
                }
                ?>
            </div>

            <?php
            //Text below the iframe
            if ($shocklogic_single_iframe_group['text_below_iframe']) { ?>
                <div class="shocklogic_single_iframe_wrapper_text_below">
                    <?= $shocklogic_single_iframe_group['text_below_iframe']; ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

<?php
}
