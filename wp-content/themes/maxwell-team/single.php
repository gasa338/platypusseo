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

				<!-- LEFT: TEXT CONTENT -->
				<div>

					<!-- Breadcrumbs -->
					<div class="flex items-center gap-2 text-accent/60 mb-6">
						<a class="hover:text-white transition-colors"
							href="<?php echo get_permalink(get_option('page_for_posts')); ?>">
							Blog
						</a>

						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
							viewBox="0 0 24 24" fill="none" stroke="currentColor"
							stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							class="w-4 h-4">
							<path d="m9 18 6-6-6-6"></path>
						</svg>

						<?php
						$categories = get_the_category();
						if (!empty($categories)) {
							echo '<span class="text-white">' . esc_html($categories[0]->name) . '</span>';
						}
						?>
					</div>

					<!-- Category -->
					<?php if (!empty($categories)) : ?>
						<span class="inline-block px-4 py-2 bg-accent text-white rounded-full font-medium mb-6">
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
							<?php echo get_avatar(
								get_the_author_meta('ID'),
								48,
								'',
								'',
								array('class' => 'w-12 h-12 rounded-full object-cover')
							); ?>

							<div>
								<p class="text-white font-medium"><?php the_author(); ?></p>
								<p class="text-white/60 text-sm">
									<?php echo get_the_date('F j, Y'); ?>
								</p>
							</div>
						</div>

						<div class="flex items-center gap-2 text-white/60">
							<svg xmlns="http://www.w3.org/2000/svg"
								width="24" height="24"
								viewBox="0 0 24 24"
								fill="none"
								stroke="currentColor"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round"
								class="w-4 h-4">
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
			<div class="max-w-4xl mx-auto">
				<div class="grid lg:grid-cols-[1fr_280px] gap-12">
					<article class="prose prose-lg max-w-none maxwell-post-content">
						<?php
						while (have_posts()) :
							the_post();

							get_template_part('template-parts/content', 'page');

						endwhile; // End of the loop.
						?>

						<div class="flex flex-wrap gap-2 mt-12 pt-8 border-t border-border"><span class="px-3 py-1 bg-secondary text-muted-foreground text-sm rounded-full">AI</span><span class="px-3 py-1 bg-secondary text-muted-foreground text-sm rounded-full">SEO</span><span class="px-3 py-1 bg-secondary text-muted-foreground text-sm rounded-full">Future of Search</span><span class="px-3 py-1 bg-secondary text-muted-foreground text-sm rounded-full">B2B Marketing</span><span class="px-3 py-1 bg-secondary text-muted-foreground text-sm rounded-full">Content Strategy</span></div>
					</article>
					<aside class="space-y-8">
						<div class="bg-card border border-border rounded-xl p-6 sticky top-28">
							<h3 class="font-semibold text-foreground mb-4 flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-share2 w-4 h-4">
									<circle cx="18" cy="5" r="3"></circle>
									<circle cx="6" cy="12" r="3"></circle>
									<circle cx="18" cy="19" r="3"></circle>
									<line x1="8.59" x2="15.42" y1="13.51" y2="17.49"></line>
									<line x1="15.41" x2="8.59" y1="6.51" y2="10.49"></line>
								</svg> Share Article</h3>
							<div class="flex gap-3"><button class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center hover:bg-primary hover:text-white transition-all group"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin w-4 h-4 text-primary group-hover:text-white transition-colors">
										<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
										<rect width="4" height="12" x="2" y="9"></rect>
										<circle cx="4" cy="4" r="2"></circle>
									</svg></button><button class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center hover:bg-primary hover:text-white transition-all group"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter w-4 h-4 text-primary group-hover:text-white transition-colors">
										<path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
									</svg></button><button class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center hover:bg-primary hover:text-white transition-all group"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook w-4 h-4 text-primary group-hover:text-white transition-colors">
										<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
									</svg></button><button class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center hover:bg-primary hover:text-white transition-all group"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bookmark w-4 h-4 text-primary group-hover:text-white transition-colors">
										<path d="m19 21-7-4-7 4V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16z"></path>
									</svg></button></div>
						</div>
						<div class="bg-card border border-border rounded-xl p-6">
							<?php
							// Uzmi podatke o autoru
							$author_id = get_the_author_meta('ID');
							$author_name = get_the_author();
							$author_first_name = get_the_author_meta('first_name');
							$author_last_name = get_the_author_meta('last_name');
							$full_name = $author_first_name . ' ' . $author_last_name;
							
        $author_avatar = get_avatar_url( $author_id, array( 'size' => 56 ) );
							$author_bio = get_the_author_meta('description');
							?>
							<h3 class="font-semibold text-foreground mb-4">About the Author</h3>
							<div class="flex items-center gap-3 mb-4">
								<img src="<?php echo $author_avatar; ?>" alt="<?php echo $full_name; ?>" class="w-14 h-14 rounded-full object-cover">
								<div>
									<p class="font-medium text-foreground"><?php echo $full_name; ?></p>
								</div>
							</div>
							<p class="text-muted-foreground text-sm"><?php echo $author_bio; ?></p>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</section>




</div>

<?php
get_sidebar();
get_footer();
