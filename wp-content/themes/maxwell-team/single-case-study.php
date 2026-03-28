<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mma-future
 */

get_header();

?>

<main id="primary" class="site-main">
	<div class="container mx-auto">
		<?php
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', 'simple');

		endwhile; // End of the loop.
		?>

	</div>
</main>

<?php
get_footer();
