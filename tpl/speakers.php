<?php
/*
* Template Name: Speakers
*/

get_header();
?>

<?php
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();

        $speakers = get_field('speakers_group');
        $categories = isset($speakers['speakers_categories']) ? $speakers['speakers_categories'] : false; ?>

        <!-- Section 1 -->
        <div>
            <?= get_header_banner(get_the_ID()); ?>
        </div>

        <!-- Section 2 -->
        <div class="st-p">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-12">
                        <?php the_content(); ?>
                    </div>
                </div>
                
                <div class="row pt-4">
                    <?php
                    if($categories){
                      foreach ($categories as $category) { ?>
                        <div class="col-12 ">
                            <div class="title"><?= $category['title'];?></div>
                        </div>
                        <div class="col-12">
                            <?php
                            set_query_var('category',$category['category']);
                            get_template_part('tpl/speakers','loop'); ?>
                        </div>
                        <?php
                        }  
                    }else{ ?>
                        <div class="col-12">
                            <?php
                            set_query_var('category',false);
                            get_template_part('tpl/speakers','loop'); ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>


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