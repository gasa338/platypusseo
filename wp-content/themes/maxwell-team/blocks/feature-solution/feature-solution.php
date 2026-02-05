<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['className']) ? $block['className'] : '';
$block_name = $block['name'];
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('feature_solution');
$text_color = $data['text_color'] ?? 'inherit';
$background_color = $data['background_color'] ?? "transparent";
$color_mode = $data['color_mode'] ?? 'dark';
$layout = $data['layout'] ?? 'left';
$box_title = $data['box_title'] ?? 'small';

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
    .feature-solution-<?php echo esc_attr($blocks_id); ?> {
        background-color: <?php echo esc_attr($background_color); ?> !important;
        color: <?php echo esc_attr($text_color); ?> !important;
    }
</style>

<section id="<?php echo esc_attr($anchor); ?>" class="py-24 <?php echo esc_attr($color_mode == 'dark' ? 'bg-section-dark' : 'bg-background'); ?> relative overflow-hidden feature-solution-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?>" <?php echo _spacing($data['spacing']); ?>>
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle at 1px 1px, <?php echo $color_mode == 'dark' ? 'rgb(255, 255, 255)' : 'rgb(0, 0, 0)'; ?> 1px, transparent 0px); background-size: 32px 32px;"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div style="opacity: 1;">
            <div class="<?php echo _title_position($data['title_position'], $data['title_size']); ?>">
            <?php if ($data['top_title']): ?>
                <span class="<?php echo esc_attr($color_mode == 'dark' ? 'text-accent' : 'text-primary'); ?> text-sm font-medium tracking-wider uppercase mb-4 block text-center" style="opacity: 1; transform: none;"><?php echo esc_html($data['top_title']); ?></span>
            <?php endif; ?>
            <?php echo _heading($data['title'], 'font-display text-4xl md:text-5xl font-bold mb-8 ' . esc_attr($color_mode == 'dark' ? 'text-white' : 'text-foreground') . ' text-center'); ?>

            <?php if ($data['text']): ?>
                <div class="<?php echo esc_attr($color_mode == 'dark' ? 'text-white/70' : 'text-muted-foreground'); ?> text-lg text-center max-w-2xl mx-auto mb-16" style="opacity: 1; transform: none;"><?php echo apply_filters('the_content', $data['text']); ?></div>
            <?php endif; ?>
            </div>

            <?php if ($data['solutions']): ?>
                <div class="grid <?php echo $grid_classes; ?>">
                    <?php foreach ($data['solutions'] as $solution): ?>
                        <div class="p-8 rounded-2xl <?php echo esc_attr($color_mode == 'dark' ? 'bg-white/5 border-white/10 hover:border-accent/50' : 'bg-card/50 border-border hover:border-primary/50'); ?> <?php echo $layout == 'center' ? " flex flex-col items-center justify-center text-center " : "" ?> border transition-colors group">
                            <?php if ($solution['icon']): ?>
                                <div class="w-14 h-14 rounded-xl <?php echo esc_attr($color_mode == 'dark' ? 'bg-accent/20 group-hover:bg-accent/30' : 'bg-primary/10 group-hover:bg-primary/20'); ?> flex items-center justify-center mb-6 transition-colors">
                                    <?php if (!empty($solution['icon']['subtype'] == 'svg+xml')) : ?>
                                        <?php echo maxwell_render_svg($solution['icon']['url'], 'w-7 h-7 ' . esc_attr($color_mode == 'dark' ? 'text-accent' : 'text-primary')); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($solution['icon']['url']); ?>" alt="<?php echo esc_attr($solution['icon']['alt']); ?>" class="w-5 h-5 <?php echo esc_attr($color_mode == 'dark' ? 'text-accent' : 'text-primary'); ?>">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($solution['title']): ?>
                                <h3 class="font-display font-bold <?php echo $box_title == "small" ? 'text-xl' : 'text-4xl'; ?> <?php echo esc_attr($color_mode == 'dark' ? 'text-white' : 'text-gradient'); ?> mb-3">
                                    <?php echo esc_html($solution['title']); ?>
                                </h3>
                            <?php endif; ?>
                            <?php if ($solution['text']): ?>
                                <div class="<?php echo esc_attr($color_mode == 'dark' ? 'text-white/70' : 'text-muted-foreground'); ?>">
                                    <?php echo $solution['text']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>