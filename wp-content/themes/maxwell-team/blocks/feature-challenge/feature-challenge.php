<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$block_name = $block['name'];
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('features_challenge');
$text_color = $data['text_color'] ?? 'inherit';
$background_color = $data['background_color'] ?? "transparent";
?>
<style>
    /* Koristite istu klasu kao u HTML-u - cta-2- */
    .feature-challenge-<?php echo esc_attr($blocks_id); ?> {
        background-color: <?php echo esc_attr($background_color); ?> !important;
        color: <?php echo esc_attr($text_color); ?> !important;
    }
</style>

<section class="py-24 feature-challenge-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?>">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto" style="opacity: 1;">
            <?php if ($data['top_title']): ?>
                <span class="text-primary text-sm font-medium tracking-wider uppercase mb-4 block" style="opacity: 1; transform: none;"><?php echo esc_html($data['top_title']); ?></span>
            <?php endif; ?>
            <?php echo _heading($data['title'], 'font-display text-4xl font-bold mb-8 text-foreground'); ?>
            <?php if (!empty($data['text'])): ?>
                <div class="text-lg text-muted-foreground mb-12" style="opacity: 1; transform: none;"><?php echo apply_filters('the_content', $data['text']); ?></div>
            <?php endif; ?>
            <?php if (!empty($data['challenges'])): ?>
                <div class="grid md:grid-cols-2 gap-6">
                    <?php foreach ($data['challenges'] as $challenge): ?>
                        <div class="p-6 rounded-xl bg-card border border-border" style="opacity: 1; transform: none;">
                            <h3 class="font-semibold text-foreground mb-2"><?php echo esc_html($challenge['title']); ?></h3>
                            <p class="text-muted-foreground"><?php echo $challenge['text']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>