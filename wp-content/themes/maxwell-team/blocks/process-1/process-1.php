<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['className']) ? $block['className'] : '';
$block_name = $block['name'];
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('process_1');
$text_color = $data['text_color'] ?? 'inherit';
$background_color = $data['background_color'] ?? "transparent";
$color_mode = $data['color_mode'] ?? 'dark';
$layout = $data['layout'] ?? 'left';
?>


<section class="py-28 bg-section-light">
    <div class="container mx-auto px-6 max-w-7xl grid lg:grid-cols-2 gap-24">
        <!-- RIGHT: sticky panel -->
        <aside class="hidden lg:block sticky top-32 self-start">
            <?php if ($data['top_title']): ?>
                <span class="text-sm font-semibold text-primary tracking-wider uppercase">
                    <?php echo $data['top_title']; ?>
                </span>
            <?php endif; ?>
            <?php echo _heading($data['title'], 'text-4xl font-bold text-foreground mt-4 mb-6 leading-tight'); ?>
            <?php if ($data['text']): ?>
                <div class="text-muted-foreground max-w-sm">
                    <?php echo apply_filters('the_content', $data['text']); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($data['link']) && $data['use_link'] == 'yes'): ?>
                <div class="mt-6">
                    <?php echo _link_1($data['link']); ?>
                </div>
            <?php endif; ?>
        </aside>
        <?php if ($data['process']): ?>
        <div class="relative">

            <!-- Vertical line -->
            <div class="absolute left-6 top-0 h-full w-px bg-border"></div>

            <div class="space-y-16">
                <?php foreach ($data['process'] as $key => $step): ?>
                <div class="relative flex gap-10">
                    <div class="relative z-10 w-12 h-12 rounded-full bg-primary text-primary-foreground flex items-center justify-center font-semibold">
                        <?php echo $key + 1; ?>
                    </div>
                    <div>
                        <?php if ($step['title']): ?>
                        <h3 class="text-2xl font-semibold text-foreground mb-3">
                            <?php echo $step['title']; ?>
                        </h3>
                        <?php endif; ?>

                        <?php if ($step['text']): ?>
                        <div class="text-muted-foreground max-w-md">
                            <?php echo $step['text']; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>