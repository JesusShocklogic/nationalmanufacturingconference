<?php
$footer_id = get_id_by_slug('footer');
$footer = get_field('footer_group', $footer_id);
?>

<style>
    footer {
        color: <?= $footer['text_color']; ?>;
        background-color: <?= $footer['background_color']; ?>;
    }

    footer a {
        color: <?= $footer['text_color']; ?>;
    }

    footer p {
        margin-bottom: 0;
    }
</style>

<footer>
    <div class="st-p" style="padding-bottom: 5vh;">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-11 pb-4 pb-lg-0 text-center col-lg-4 text-lg-left align-self-start order-1 order-lg-0">
                    <div>
                        <?= $footer['left_title']; ?>
                        <hr class="mx-auto ml-lg-0">
                    </div>
                    <div>
                        <?= $footer['left_content']; ?>
                    </div>
                </div>
                <div class="col-11 col-sm-8 pb-4 pb-lg-0 col-lg-4 align-self-center order-0 order-lg-1">
                    <div>
                        <?php $logo = $footer['logo']; //get_field('logo',$footer_id); 
                        ?>
                        <?php if (!empty($logo)) { ?>
                            <a href="<?= esc_url($footer['logo_link']['url']) ?>" target="<?php echo esc_attr($footer['logo_link']['target'] ? $footer['logo_link']['target'] : '_self') ?>">
                                <img class="d-block w-75 mx-auto img-fluid" src="<?= esc_url($logo['url']); ?>" alt="<?= esc_attr($logo['alt']); ?>" />
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-11 pb-4 pb-lg-0 text-center col-lg-4 text-lg-right align-self-start order-2 order-lg-2">
                    <div>
                        <?= $footer['right_title']; ?>
                        <hr class="mx-auto mr-lg-0">
                    </div>
                    <div>
                        <?= $footer['right_content']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<?php wp_footer(); ?>

<script>
    //standardising  all the buttons generated from the Gutenberg.
    // in case you doubt it... YES, This is Wordpress ;)
    let buttons = document.querySelectorAll(".wp-block-button__link");
    for (let i = 0; i < buttons.length; i++) {
        buttons[i].classList.add("btn");
        buttons[i].classList.add("dcolor_1_bg");
        buttons[i].classList.add("dcolor_2_color");
        buttons[i].classList.add("mt-5");
    }

    let iframes = document.getElementsByTagName('iframe');
    for (let i = 0; i < iframes.length; i++) {
        iframes[i].classList.add("container");
        iframes[i].classList.add("mx-auto");
        iframes[i].classList.add("d-flex");
        iframes[i].style.minHeight = '500px';
        iframes[i].style.border = '0';
        iframes[i].style.boxShadow = '4px 4px 10px #0000001A';
    }
</script>
</body>

</html>