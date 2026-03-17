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

$bg_class = '';
switch ($color_mode) {
    case 'dark':
        $bg_class = 'bg-surface';
        break;
    case 'light':
        $bg_class = 'bg-card';
        break;
    case 'dark_mode':
        $bg_class = 'bg-hero';
        break;
    default:
        $bg_class = 'bg-card';
        break;
}

?>
<?php echo _spacing_full('feature-solution',$blocks_id,$data['margin'], $data['padding']); ?>
<section id="<?php echo esc_attr($anchor); ?>" class="<?php echo $bg_class; ?> relative overflow-hidden feature-solution-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?>">
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle at 1px 1px, <?php echo $color_mode !== 'dark' ? 'rgb(255, 255, 255)' : 'rgb(0, 0, 0)'; ?> 1px, transparent 0px); background-size: 32px 32px;"></div>
    <div class="container mx-auto px-6 relative z-10" <?php echo _padding($data['padding']); ?>>
        <div>
            <div class="<?php echo _title_position($data['title_position'], $data['title_size']); ?>">
                <?php if ($data['top_title']): ?>
                    <span class="maxwell-top-title mb-4 block"><?php echo esc_html($data['top_title']); ?></span>
                <?php endif; ?>
                <?php echo _heading($data['title'], 'mb-4 ' . esc_attr($color_mode == 'dark_mode' ? 'text-white' : 'text-foreground') . ''); ?>

                <?php if ($data['text']): ?>
                    <div class="<?php echo esc_attr($color_mode == 'dark_mode' ? 'text-white/80' : 'text-muted-foreground'); ?> mb-12"><?php echo apply_filters('the_content', $data['text']); ?></div>
                <?php endif; ?>
            </div>

            <?php if ($data['solutions']): ?>
                <div class="grid <?php echo $grid_classes; ?>">
                    <?php foreach ($data['solutions'] as $solution): ?>
                        <div class="p-8 rounded-2xl <?php echo esc_attr($color_mode == 'dark_mode' ? 'bg-white/5 border border-white/10 hover:border-accent/50' : 'bg-card border-border hover:border-accent/50'); ?> <?php echo $layout == 'center' ? " flex flex-col items-center justify-center text-center " : "" ?> border transition-colors group">
                            <?php if ($solution['icon']): ?>
                                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-6 bg-accent/30 group-hover:bg-accent/80 transition-all">
                                    <?php echo maxwell_render_icon($solution['icon'], 'w-7 h-7 text-accent group-hover:text-white transition-colors'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($solution['title']): ?>
                                <h3 class=" font-bold <?php echo $box_title == "small" ? 'text-xl' : 'text-3xl'; ?> <?php echo esc_attr($color_mode == 'dark_mode' ? 'text-white' : 'text-gradient'); ?> mb-3">
                                    <?php echo esc_html($solution['title']); ?>
                                </h3>
                            <?php endif; ?>
                            <?php if ($solution['text']): ?>
                                <div class="<?php echo esc_attr($color_mode == 'dark_mode' ? 'text-white/80' : 'text-muted-foreground'); ?>">
                                    <?php echo apply_filters('the_content', $solution['text']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        
            <?php if ($data['bottom_text']): ?>
                <div class="<?php echo esc_attr($color_mode == 'dark_mode' ? 'text-white/80' : 'text-muted-foreground'); ?> text-center mx-auto mt-8 max-w-3xl"><?php echo apply_filters('the_content', $data['bottom_text']); ?></div>
            <?php endif; ?>
    </div>
</section>