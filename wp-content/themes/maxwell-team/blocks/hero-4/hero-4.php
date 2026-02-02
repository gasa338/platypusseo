<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('hero_4');

$bg_image = get_image($data['background_image']);
// dd($bg_image);

$text_color = $data['text_color'] ?? '#ffffff';
$overlay_color = $data['overlay_color'] ?? 'rgba(0, 0, 0, 0.5)';
?>
<style>
    .hero-4-<?php echo esc_attr($blocks_id); ?>,
    .hero-4-<?php echo esc_attr($blocks_id); ?>p,
    .hero-4-<?php echo esc_attr($blocks_id); ?>h2,
    .hero-4-<?php echo esc_attr($blocks_id); ?>span {
        color: <?php echo $text_color ?> !important;
    }

    .overlay-<?php echo esc_attr($blocks_id); ?> {
        background-color: <?php echo $overlay_color ?> !important;
    }

    .block-editor__container img {
        height: 100% !important;
    }
</style>

<section id="<?php echo esc_attr($anchor); ?>" class="hero-4-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?> relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="<?php echo $bg_image['url']; ?>" alt="" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-hero"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary/5 rounded-full blur-3xl animate-pulse-glow"></div>
    <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-primary/3 rounded-full blur-3xl animate-pulse-glow" style="animation-delay: 1.5s;"></div>
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(hsl(var(--primary)) 1px, transparent 1px), linear-gradient(90deg, hsl(var(--primary)) 1px, transparent 1px); background-size: 60px 60px;"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center">

            <?php if ($data['use_top_title']) : ?>
            <?php if (!empty($data['top_title']) || !empty($data['icon'])) : ?>
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-accent border border-primary/20 mb-8 animate-fade-in">
                    <?php if (!empty($data['icon'])) : ?>
                        <?php if (!empty($data['icon']['subtype'] == 'svg+xml')) : ?>
                            <?php echo maxwell_render_svg($data['icon']['url'], 'w-4 h-4 text-accent'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url($data['icon']['url']); ?>" alt="<?php echo esc_attr($data['icon']['alt']); ?>" class="w-5 h-5 text-accent">
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if (!empty($data['top_title'])) : ?>
                        <span class="text-sm text-accent-foreground"><?php echo $data['top_title']; ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php endif; ?>

            <?php echo _heading($data['title'], 'font-display text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6 text-foreground text-center mb-6'); ?>
            <?php if (!empty($data['text'])): ?>
                <div class="maxwell-content mb-6 text-xl"><?php echo apply_filters('the_content', $data['text']); ?></div>
            <?php endif; ?>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <?php if (!empty($data['link_1'])): ?>
                    <?php echo _link_1($data['link_1']); ?>
                <?php endif; ?>
                <?php if (!empty($data['link_2'])): ?>
                    <?php echo _link_2($data['link_2']); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>