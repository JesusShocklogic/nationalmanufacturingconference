<?php
$shocklogic_vertical_item_list_group = get_field('shocklogic_vertical_item_list_group');
if (isset($shocklogic_vertical_item_list_group) && $shocklogic_vertical_item_list_group != null) { ?>
    <div class="shocklogic_vertical_item_list">
        <div class="shocklogic_vertical_item_list_wrapper">
            <!-- Background -->
            <div class="shocklogic_vertical_item_list_wrapper_background">
                <?php
                if ($shocklogic_vertical_item_list_group['general_background_select'] == "iframe") { ?>
                    <div class="shocklogic_vertical_item_list_wrapper_background_iframe">
                        <?= $shocklogic_vertical_item_list_group['general_background_iframe'] ?>
                    </div>
                <?php
                } elseif ($shocklogic_vertical_item_list_group['general_background_select'] == "image") { ?>
                    <div class="shocklogic_vertical_item_list_wrapper_background_image">
                        <img src="<?= $shocklogic_vertical_item_list_group['general_background_image']['url'] ?>" alt="">
                    </div>
                <?php
                }
                ?>
            </div>

            <!-- content-->
            <?php
            if ($options = $shocklogic_vertical_item_list_group['options']) { ?>
                <!-- Options Tab -->
                <div class="shocklogic_vertical_item_list_wrapper_options">
                    <div class="list-group" id="list-tab" role="tablist">
                        <?php
                        foreach ($options as $key => $option) {
                            $active = ($key == 0) ? "active" : "";

                            if ($option['option_select'] == "link") {
                                $link = $option['link']; ?>
                                <a class="list-group-item list-group-item-action" href="<?= $option['link']['url'] ?>" target="<?= $option['link']['target'] ?>">
                                    <img src="<?= $option['icon']['url'] ?>" alt="">
                                    <span><?= $option['title'] ?></span>
                                </a>
                            <?php

                            } else { ?>
                                <a class="list-group-item list-group-item-action <?= $active ?>" id="list-<?= $key ?>-list" data-bs-toggle="list" href="#list-<?= $key ?>" role="tab" aria-controls="list-<?= $key ?>">
                                    <img src="<?= $option['icon']['url'] ?>" alt="">
                                    <span><?= $option['title'] ?></span>
                                </a>
                            <?php
                            } ?>
                        <?php
                        } //foreach 
                        ?>
                    </div>
                </div>

                <!-- Content Tabs-->
                <div class="shocklogic_vertical_item_list_wrapper_content">
                    <div class="tab-content" id="nav-tabContent">
                        <?php
                        foreach ($options as $key => $option) {
                            $active = ($key == 0) ? "show active" : ""; ?>
                            <div class="tab-pane fade <?= $active ?>" id="list-<?= $key ?>" role="tabpanel" aria-labelledby="list-<?= $key ?>-list">
                                <?php
                                if ($option['option_select'] == "iframe") { ?>
                                    <div class="shocklogic_vertical_item_list_wrapper_content_iframe">
                                        <?= $option['iframe'] ?>
                                    </div>
                                <?php } ?>

                                <?php
                                if ($option['option_select'] == "image") { ?>
                                    <div class="shocklogic_vertical_item_list_wrapper_content_image">
                                        <img src="<?= $option['image']['url'] ?>" alt="">
                                    </div>
                                <?php } ?>

                                <?php
                                if ($option['option_select'] == "video") { ?>
                                    <div class="shocklogic_vertical_item_list_wrapper_content_video">
                                        <video src="<?= $option['video'] ?>" autoplay muted loop></video>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php
            } // if
            ?>
        </div>
    </div>
<?php
}
