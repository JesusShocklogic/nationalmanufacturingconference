<?php
/*
* Template Name: Blog - Home
*/

get_header();
$blog_id = get_id_by_slug('blog');
?>

    <div>
        <?= get_header_banner($blog_id); ?>
    </div>

<?php
if ( have_posts() ) { ?>
    <div class="st-p" id="blogRow">
        <div class="container-fluid">
            <div class="row" id="main-blogRow">
                <div class="col-12">
                    <div class="title"><?= get_field('title',$blog_id); ?></div>
                </div>

                <?php
                while ( have_posts() ) {
                    the_post(); ?>

                    <div class="col-12 col-lg-6" style="padding: 10px 10px">
                        <a class="d-block overflow-hidden position-relative" id="BlogCard" href="<?php the_permalink();?>">
                            <img class="d-block w-100" src="<?= get_the_post_thumbnail_url()?>" alt="">
                            <div id="blogTitle"><h4 class="align-self-center w-100 text-center mb-0"><?php the_title(); ?></h4></div>
                        </a>
                    </div>

                    <?php
                }wp_reset_postdata(); // end while ?>
            </div>
        </div>
    </div>
    <?php
}//end if
else{
    //No content Found
} // end else
?>
<?php
get_footer();
?>