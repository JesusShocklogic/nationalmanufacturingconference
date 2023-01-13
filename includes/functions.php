<?php

include("change_login_logo.php");
include("id_by_slug.php");
include("custom_menu.php");
include("slick_style_script.php");
include("timezone.php");
include("query.php");

// Adding excerpt for page, posts
add_post_type_support('page', 'excerpt');
add_post_type_support('post', 'excerpt');

/*
 * Removing the admin bar
 */
add_filter('show_admin_bar', '__return_false');

/*
 * Adding Feature Image
 */
add_theme_support('post-thumbnails');

/*
 * Printing the CSS files
 */
function include_styles()
{
	echo "<link rel='stylesheet' href='" . get_template_directory_uri() . "/css/bootstrap.css'>\n";
	echo "<link rel='stylesheet' href='" . get_template_directory_uri() . "/css/gutenberg.css'>\n";
	echo "<link rel='stylesheet' href='" . get_template_directory_uri() . "/style.css'>\n";
}
add_action('wp_head', 'include_styles');

/*
 * Printing the JS fles
 */
function include_scripts()
{
	echo "<script src='" . get_template_directory_uri() . "/js/jquery-3.4.1.min.js'></script>";
	echo "<script src='" . get_template_directory_uri() . "/js/popper.min.js'></script>";
	echo "<script src='" . get_template_directory_uri() . "/js/bootstrap.min.js'></script>";
}
add_action('wp_footer', 'include_scripts');

/*
 * Printing buttons ACF Depending
 */
function print_button($field, $id)
{

	$link = get_field($field, $id);
	if ($link) :
		$link_url = $link['url'];
		$link_title = $link['title'];
		$link_target = $link['target'] ? $link['target'] : '_self';
?>
		<a class="btn px-4 py-2" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
<?php endif;
}



/*
 * Get Header Banner
 */
function get_header_banner($id)
{

	$settings = get_id_by_slug('settings');
	$facebook = get_field('facebook_link', $settings);
	$twitter = get_field('twitter_link', $settings);
	$hashtag = get_field('hashtag', $settings);

	$socialMediaColor = get_field('social_media_icons', $settings);

	$header_banner = "";
	$header_banner .= <<<ITEM
		<style>
			.social-media-icons * {
			    color: $socialMediaColor;
			}
		</style>
ITEM;
	$header_banner .= "<div class='position-relative social-media-icons'>
                <div id='socialRow' class='position-absolute w-100 d-flex align-items-center justify-content-end' style='right: 3.1vw;'>
                    <span id='animate'><a href='" . $facebook['url'] . "' target='" . $facebook['target'] . "'><i class='fab fa-facebook-f'></i></a></span>
                    <span id='animate'><a href='" . $twitter['url'] . "' target='" . $twitter['target'] . "'><i class='fab fa-twitter'></i></a></span>
                    <span style='z-index: 1;'><a href='" . $hashtag['url'] . "' target='" . $hashtag['target'] . "' style='text-decoration: none;'>" . $hashtag['title'] . "</a></span>
                </div>
            </div>";

	$header = get_field('header_group', $id);
	if ($header) {
		$banner = $header['banner'];
		$banner_top_layer = $header['banner_top_layer'];
		$banner_top_opacity = $header['banner_top_opacity'];
		$title = $header['title'];
		$subtitle = $header['subtitle'];
		$position = $header['banner_position'];
	}

	if (!empty($banner)) {

		if ($position == "background") {


			$header_banner .= "
                <div class='position-relative'>
                    <div id='banner_overlay' style='position: absolute;
                        width: 100%;
                        height: 100%;
                        background: " . $banner_top_layer . ";
                        opacity: " . $banner_top_opacity . ";
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;'>

                    </div>
                    <div class='st-p'
                    style='background-image: url(" . $banner . ");
                        background-repeat: no-repeat;
                        background-size: cover;
                        background-position: center center'
                >
                        <div class='container-fluid'>
                            <div class='row justify-content-center justify-content-lg-start banner-p'>
                                <div class='col-12 text-center col-lg-6 text-md-left banner_title'>
                                    " . $title . "
                                </div>
                                <div class='col-12 text-center col-lg-7 text-md-left banner_subtitle'>
                                    " . $subtitle . "
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
		} //if banner is background

		if ($position == "content") {
			$header_banner .= <<<ITEM
                <div>
                    <div>
                        <img src="$banner" alt="" style="width: 100%;">
                    </div>
                </div>
ITEM;
		}
	} // if there is a banner
	return $header_banner;
}