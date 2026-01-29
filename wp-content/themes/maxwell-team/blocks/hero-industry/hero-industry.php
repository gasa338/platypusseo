<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('hero_industry');

$bg_image = get_image($data['bg_image']);

$text_color = $data['text_color'] ?? '#ffffff';
$overlay_color = $data['overlay_color'] ?? 'rgba(0, 0, 0, 0.5)';
?>
<style>
    .hero-industry-<?php echo esc_attr($blocks_id); ?>,
    .hero-industry-<?php echo esc_attr($blocks_id); ?>p,
    .hero-industry-<?php echo esc_attr($blocks_id); ?>h2,
    .hero-industry-<?php echo esc_attr($blocks_id); ?>span {
        color: <?php echo $text_color ?> !important;
    }
</style>

<section class="py-24 bg-gradient-hero relative hero-industry-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?> " <?php echo _spacing($data['spacing']); ?>>
    <div class="container mx-auto px-6">
        <div class="max-w-4xl">
            <?php if (!empty($data['icon'])): ?>
                <div class="w-16 h-16 rounded-2xl bg-accent flex items-center justify-center mb-8">
                    <?php if (!empty($data['icon']['subtype'] == 'svg+xml')) : ?>
                        <?php echo maxwell_render_svg($data['icon']['url'], 'w-8 h-8 text-primary'); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url($data['icon']['url']); ?>" alt="<?php echo esc_attr($data['icon']['alt']); ?>" class="w-5 h-5 text-accent">
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($data['top_title'])): ?>
                <span class="text-primary text-sm font-medium tracking-wider uppercase mb-4 block"><?php echo $data['top_title']; ?></span>
            <?php endif; ?>
            <?php echo _heading($data['title'], 'font-display text-5xl md:text-6xl font-bold mb-6 text-foreground'); ?>
            <?php if (!empty($data['text'])): ?>
                <div class="text-xl text-muted-foreground mb-10 max-w-2xl"><?php echo apply_filters('the_content', $data['text']); ?></div>
            <?php endif; ?>
            <div class="flex flex-wrap gap-4">
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