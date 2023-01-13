<?php
/*
* Template Name: Partners
*/

get_header();
?>

<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); ?>

        <!-- Section 1 -->
        <div>
            <?= get_header_banner(get_the_ID()); ?>
        </div>

        <!-- Section 2 -->
        <?php

        $cat_arg = [
            'post_type'         => 'partner',
            'post_status'      => 'publish',
            'order'         => 'DESC'
        ];

        $categories = get_categories($cat_arg); ?>

        <?php
        $cont = 1;

        foreach ($categories as $category) {
            //If the current category is UNCATEGORIZED then jump to the next one
            // Uccategorize category is with ID 1
            if ( $category->term_id == 1 ) {
                continue;
            }?>
            <div class="st-p bg-<?= $cont; ?>">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-center" id="partnerRow">

                        <?php
                        if ($cont == 1) $cont=2; else $cont=1;
                        $args = array(
                            'post_type'     => 'partner',
                            'post_status'   => 'publish',
                            'order'         => 'DESC',
                            'cat'           => $category->term_id
                        );

                        $wp_query = new WP_Query( $args );
                        if($wp_query->have_posts()){ ?>

                            <div class="col-12">
                                <h1 class="title text-center"><?= $category->name; ?></h1>
                            </div>

                            <?php
                            while ($wp_query->have_posts())
                            { $wp_query->the_post(); ?>

                                <div class="col-10 col-sm-6 col-md-4 col-lg-2">
                                    <img class="w-100 d-block img-fluid mx-auto" src="<?= get_the_post_thumbnail_url() ?>" alt="">
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-10">
                                    <?= get_the_content(); ?>
                                </div>
                                <div class="d-block w-100 py-5"></div>

                                <?php
                            }; wp_reset_query();
                        } ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <?php
    }wp_reset_postdata(); // end while
}//end if
else{
    //No content Found
} // end else
?>
<?php
get_footer();
?>