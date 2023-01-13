<div class="row align-items-center justify-content-around" id="sponsorsRow">
    <?php
    $args = [
        'post_type'         => 'sponsors',
        'post_status'      => 'publish',
        'order'         => 'DESC'
    ];
    $wp_query = new WP_Query($args);
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            $data = get_field('data');
            $link = "#";
            $target = "";

            if ($data['click_behavior'] == "internal_page") {
                $link = get_the_permalink();
                $target = "_self";
            } elseif ($data['click_behavior'] == "external_page") {
                $link = $data["external_page_url"];
                $target = "_blank";
            }
    ?>

            <div class="col-10 col-md-4 col-lg-3">
                <a href="<?= $link ?>" target="<?= $target ?>">
                    <img class="w-100 d-block img-fluid mx-auto" src="<?= get_the_post_thumbnail_url() ?>" alt="">
                </a>
            </div>

    <?php
        }; //while
        wp_reset_query();
    } //if have post

    ?>
</div>