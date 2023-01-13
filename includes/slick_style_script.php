<?php

/*
 * Slick Slider Css
 */
function include_slick_style() {
    echo "<link rel='stylesheet' href='".get_template_directory_uri()."/css/slick/slick.css\n'>";
    echo "<link rel='stylesheet' href='".get_template_directory_uri()."/css/slick/slick-theme.css\n'>";
}
/*
 * Slick Slider Js
 */
function include_slick_script() {
    echo "<script src='".get_template_directory_uri()."/js/slick/slick.js'></script>";
}

/*
 * Slick Carousel Settings
 */
function include_slick_settings() {
    echo "
		<script>
		$('.slider-speakers-index').slick({
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 300000,
		  arrows: true,
		  responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            ]
		});
		</script>
	";
}