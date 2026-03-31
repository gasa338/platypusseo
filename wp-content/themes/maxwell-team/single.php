<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mma-future
 */

get_header();
$post_id = get_the_ID();
?>
<div class="min-h-screen bg-background">

	<!-- Hero Section -->
	<section class="pt-32 pb-16 bg-hero relative overflow-hidden">

		<!-- background pattern -->
		<div class="absolute inset-0 opacity-5">
			<div class="absolute inset-0"
				style="background-image: radial-gradient(circle at 2px 2px, currentcolor 1px, transparent 0px); background-size: 40px 40px;">
			</div>
		</div>

		<div class="container mx-auto px-6 relative z-10">

			<div class="grid lg:grid-cols-2 items-center mx-auto">
				<div>
					<span class="inline-block px-4 py-1 bg-accent text-white font-medium rounded-full mb-6">
						SaaS SEO Audit
					</span>

					<!-- Title -->
					<h1 class="h1-responsive font-bold text-white mb-6 leading-tight">
						<?php the_title(); ?>
					</h1>

				</div>


				<!-- RIGHT: FEATURED IMAGE -->
				<?php if (has_post_thumbnail()) : ?>
					<div class="relative">
						<div class="aspect-video rounded-2xl overflow-hidden shadow-2xl">
							<?php the_post_thumbnail(
								'full',
								array(
									'class' => 'w-full h-full object-cover'
								)
							); ?>
						</div>
					</div>
				<?php endif; ?>

			</div>

		</div>

	</section>


	<section class="py-12 bg-background">
		<div class="container mx-auto px-6">
			<div class="max-w-xl mx-auto">
					<article class="prose prose-lg max-w-none maxwell-post-content">
						<?php
						while (have_posts()) :
							the_post();

							get_template_part('template-parts/content', 'page');

						endwhile; // End of the loop.
						?>

						<div class="flex flex-wrap gap-2 mt-8 pt-8 border-t border-border">
							<?php
							$tags = get_the_tags();
							if ($tags) {
								foreach ($tags as $tag) {
									echo '<a href="' . get_tag_link($tag->term_id) . '" class="px-4 py-1.5 bg-accent text-white rounded-full no-underline hover:opacity-90">' . $tag->name . '</a>';
								}
							}
							?>
						</div>
					</article>
			</div>
		</div>
	</section>
</div>

<?php
get_footer();
