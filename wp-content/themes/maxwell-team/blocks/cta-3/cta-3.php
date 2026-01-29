<!-- Hero Sekcija -->
<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$block_name = $block['name'];
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('cta_3');
$text_color = $data['text_color'] ?? '#fff';
$background_color = $data['background_color'] ?? "#000";
?>
<style>
    /* Koristite istu klasu kao u HTML-u - cta-2- */
    .cta-3-<?php echo esc_attr($blocks_id); ?> {
        background-color: <?php echo esc_attr($background_color); ?> !important;
        color: <?php echo esc_attr($text_color); ?> !important;
    }

    .cta-3-<?php echo esc_attr($blocks_id); ?>*:not(a) {
        color: inherit !important;
    }
</style>

<section class="py-24 bg-section-dark relative overflow-hidden cta-3-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?> " <?php echo _spacing($data['spacing']); ?>>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 1px 1px, rgb(255, 255, 255) 1px, transparent 0px); background-size: 32px 32px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-accent/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-primary/20 rounded-full blur-3xl"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <?php echo _heading($data['title'], 'font-display text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-white text-center'); ?>
            <?php if (!empty($data['text'])) : ?>
                <div class="text-lg md:text-xl text-white/70 mb-10"><?php echo apply_filters('the_content', $data['text']); ?></div>
            <?php endif; ?>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <?php if (!empty($data['link_1'])) : ?>
                    <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap ring-offset-background transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 font-semibold glow-primary hover:scale-105 h-14 rounded-xl px-10 text-lg group bg-white text-primary hover:bg-white/90"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-5 h-5">
                        <path d="M8 2v4"></path>
                        <path d="M16 2v4"></path>
                        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                        <path d="M3 10h18"></path>
                    </svg>Book Strategy Call<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-5 h-5 transition-transform group-hover:translate-x-1">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg></button>
                <?php endif; ?>
                <?php if (!empty($data['link_2'])) : ?>
                    <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium ring-offset-background transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border bg-transparent h-14 rounded-xl px-10 text-lg border-white/30 text-white hover:bg-white/10 hover:border-white/50">Download Media Kit</button>
                <?php endif; ?>
            </div>
            <?php if (!empty($data['bottom_text'])) : ?>
                <p class="text-lg md:text-xl text-white/70 mt-10"><?php echo $data['bottom_text']; ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>