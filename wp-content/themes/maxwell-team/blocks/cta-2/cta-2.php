<!-- Hero Sekcija -->
<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$block_name = $block['name'];
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('cta_2');
$text_color = $data['text_color'] ?? '#fff';
$background_color = $data['background_color'] ?? "#000";

$block_list = get_post_meta(get_the_ID(), '_acf_blocks_list', true);
?>
<style>
    /* Koristite istu klasu kao u HTML-u - cta-2- */
    .cta-2-<?php echo esc_attr($blocks_id); ?> {
        background-color: <?php echo esc_attr($background_color); ?> !important;
        color: <?php echo esc_attr($text_color); ?> !important;
    }

    .cta-2-<?php echo esc_attr($blocks_id); ?>*:not(a) {
        color: inherit !important;
    }
</style>

<?php echo _spacing_full('cta-2', $blocks_id, $data['margin'], $data['padding']); ?>
<section id="<?php echo esc_attr($anchor); ?>" class="cta-2-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?>">
    <div class="container mx-auto px-6">
        <div class="relative rounded-3xl bg-hero overflow-hidden px-8 py-16 sm:px-16 sm:py-20 text-center">
            <div class="absolute top-8 left-8 w-24 h-24 rounded-full border border-primary-foreground/10"></div>
            <div class="absolute bottom-8 right-12 w-16 h-16 rounded-full border border-primary-foreground/5"></div>
            <div class="absolute top-1/3 right-1/4 w-2 h-2 rounded-full bg-accent"></div>
            <div class="relative z-10 max-w-xl mx-auto">
                <?php echo _heading($data['title'], 'mb-4') ?>
                <?php if (!empty($data['text'])): ?>
                    <div class="text-primary-foreground/60 mb-8 leading-relaxed"><?php echo apply_filters('the_content', $data['text']); ?></div>
                <?php endif; ?>
                <?php if (!empty($data['link'])): ?>
                    <a href="<?php echo esc_url($data['link']['url']); ?>" class="inline-flex items-center justify-center gap-2 rounded-lg bg-accent px-8 py-3.5 text-sm font-semibold text-accent-foreground hover:opacity-90 transition-opacity shadow-lg shadow-accent/20"><?php echo esc_html($data['link']['title']); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right w-4 h-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>