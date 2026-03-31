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
					<?php
					$categories = get_the_category();
					?>
					<?php if (!empty($categories)) : ?>
						<span class="inline-block px-4 py-1 bg-accent text-white font-medium rounded-full mb-6">
							<?php echo esc_html($categories[0]->name); ?>
						</span>
					<?php endif; ?>

					<!-- Title -->
					<h1 class="h1-responsive font-bold text-white mb-6 leading-tight">
						<?php the_title(); ?>
					</h1>

					<!-- Meta -->

					<div class="flex flex-wrap items-center gap-6">

						<div class="flex items-center gap-3">
							<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" title="Posts by <?php the_author(); ?>">
								<?php echo get_avatar(
									get_the_author_meta('ID'),
									48,
									'',
									'',
									array('class' => 'w-12 h-12 rounded-full object-cover')
								); ?>
							</a>


							<div>
								<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="text-xl text-white font-medium no-underline" rel="author" title="Posts by <?php the_author(); ?>"><?php the_author(); ?></a>
								<p class="text-white text-sm">
									<?php echo get_the_date('F j, Y'); ?>
								</p>
							</div>
						</div>

						<div class="flex items-center gap-2 text-white">
							<svg xmlns="http://www.w3.org/2000/svg"
								width="24" height="24"
								viewBox="0 0 24 24"
								fill="none"
								stroke="currentColor"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								class="w-4 h-4 text-accent">
								<circle cx="12" cy="12" r="10"></circle>
								<polyline points="12 6 12 12 16 14"></polyline>
							</svg>

							<span>
								<?php echo maxwell_estimated_reading_time(get_the_ID()); ?> min read
							</span>
						</div>

					</div>

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
			<div class="max-w-5xl mx-auto">
				<article class="prose prose-lg max-w-none maxwell-post-content">
					<?php
					while (have_posts()) :
						the_post();

						get_template_part('template-parts/content', 'simple');

					endwhile; // End of the loop.
					?>

				</article>
			</div>
		</div>

	</section>

	<?php
	get_footer();
