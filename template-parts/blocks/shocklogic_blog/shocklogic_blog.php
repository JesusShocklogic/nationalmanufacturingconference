<?php
$shocklogic_blog_group = get_field('shocklogic_blog_group');
$wp_query = get_query($shocklogic_blog_group);
$block_id = $block['id'];
$background = $shocklogic_blog_group['background_colour'];

if (isset($shocklogic_blog_group) && $shocklogic_blog_group != null) { ?>
	<div class="shocklogic_blog" id="<?= $block_id ?>">
		<div class="shocklogic_blog_wrapper">
			<div class="shocklogic_blog_wrapper_title">
				<?= $shocklogic_blog_group['title'] ?>
			</div>
			<div class="shocklogic_blog_wrapper_blog">
				<?php
				if ($wp_query->have_posts()) {
					$content = "";
					while ($wp_query->have_posts()) {
						$wp_query->the_post();
						$permalink = get_the_permalink();
						$title = get_the_title();
						$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : ""; ?>
						<div class="shocklogic_blog_wrapper_blog_single">
							<a href="<?= $permalink ?>">
								<div class="shocklogic_blog_wrapper_blog_single_image">
									<img src="<?= $image_url ?>" alt="">
								</div>
								<div class="shocklogic_blog_wrapper_blog_single_title title">
									<h3><?php the_title() ?></h3>
								</div>
							</a>
						</div>
				<?php
					}; //while
					wp_reset_query();
				} //if
				else {
					echo "No posts were found";
				}
				?>
			</div>

			<div class="shocklogic_blog_wrapper_bottom_text">
				<?= $shocklogic_blog_group['bottom_text'] ?>
			</div>
		</div>
	</div>
<?php
}
?>

<style>
	<?php
	$classes = <<<ITEM
	#$block_id{
		background-color: $background;
	}
	ITEM;

	echo $classes;

	?>
</style>