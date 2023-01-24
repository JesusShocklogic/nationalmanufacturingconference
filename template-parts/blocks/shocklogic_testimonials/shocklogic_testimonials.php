<?php
$shocklogic_testimonials_group = get_field('shocklogic_testimonials_group');
$testimonials = $shocklogic_testimonials_group['testimonials'];
$block_id = $block['id'];
$background = $shocklogic_testimonials_group['background_colour'];

if (isset($shocklogic_testimonials_group) && $shocklogic_testimonials_group != null) { ?>
	<div class="shocklogic_testimonials" id="<?= $block_id ?>">
		<div class="shocklogic_testimonials_wrapper">
			<div class="shocklogic_testimonials_wrapper_title">
				<?= $shocklogic_testimonials_group['title'] ?>
			</div>
			<div class="shocklogic_testimonials_wrapper_testimonials">
				<?php
				if ($testimonials) {
					foreach ($testimonials as $key => $testimonial) { ?>
						<div class="shocklogic_testimonials_wrapper_testimonials_testimonial">
							<?= $testimonial['testimonial'] ?>
						</div>
				<?php

					}
				} //if
				?>
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