<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$block_name = $block['name'];
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('feature_solution');
$text_color = $data['text_color'] ?? 'inherit';
$background_color = $data['background_color'] ?? "transparent";


$grid_columns = $data['column_number'] ?? 'two';
$grid_classes = '';
switch ($grid_columns) {
    case 'two':
        $grid_classes = 'md:grid-cols-2 gap-8';
        break;
    case 'three':
        $grid_classes = 'md:grid-cols-3 gap-8';
        break;
    case 'four':
        $grid_classes = 'md:grid-cols-4 gap-4';
        break;
    case 'five':
        $grid_classes = 'md:grid-cols-5 gap-4';
        break;
    default:
        $grid_classes = 'md:grid-cols-2 gap-8';
        break;
}


?>
<style>
    /* Koristite istu klasu kao u HTML-u - cta-2- */
    .feature-solution-<?php echo esc_attr($blocks_id); ?> {
        background-color: <?php echo esc_attr($background_color); ?> !important;
        color: <?php echo esc_attr($text_color); ?> !important;
    }
</style>

<section class="py-24 bg-section-dark relative overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle at 1px 1px, rgb(255, 255, 255) 1px, transparent 0px); background-size: 32px 32px;"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div style="opacity: 1;">
            <?php if ($data['top_title']): ?>
                <span class="text-accent text-sm font-medium tracking-wider uppercase mb-4 block text-center" style="opacity: 1; transform: none;"><?php echo esc_html($data['top_title']); ?></span>
            <?php endif; ?>
            <?php echo _heading($data['title'], 'font-display text-4xl md:text-5xl font-bold mb-8 text-white text-center'); ?>

            <?php if ($data['text']): ?>
                <div class="text-white/70 text-lg text-center max-w-2xl mx-auto mb-16" style="opacity: 1; transform: none;"><?php echo apply_filters('the_content', $data['text']); ?></div>
            <?php endif; ?>

            <?php if ($data['solutions']): ?>
                <div class="grid <?php echo $grid_classes; ?>">
                    <?php foreach ($data['solutions'] as $solution): ?>
                        <div class="p-8 rounded-2xl bg-white/5 border border-white/10 hover:border-accent/50 transition-colors group" style="opacity: 1; transform: none;">
                            <?php if ($solution['icon']): ?>
                                <div class="w-14 h-14 rounded-xl bg-accent/20 flex items-center justify-center mb-6 group-hover:bg-accent/30 transition-colors">
                                    <?php if (!empty($solution['icon']['subtype'] == 'svg+xml')) : ?>
                                        <?php echo maxwell_render_svg($solution['icon']['url'], 'w-7 h-7 text-accent'); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($solution['icon']['url']); ?>" alt="<?php echo esc_attr($solution['icon']['alt']); ?>" class="w-5 h-5 text-accent">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($solution['title']): ?>
                                <h3 class="font-display text-xl font-bold text-white mb-3"><?php echo esc_html($solution['title']); ?></h3>
                            <?php endif; ?>
                            <?php if ($solution['text']): ?>
                                <div class="text-white/70"><?php echo $solution['text']; ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>