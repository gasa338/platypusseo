<?php

use SimplePie\Item;

$blocks_id = $block['id'];
$blocks_class = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('feature_4');
$background_color = $data['background_color'] ?? '#fff';
$reverse = $data['revers'] ?? 'no';
$color_mode = $data['color_mode'] ?? 'dark';
?>
<style>
</style>

<section id="<?php echo esc_attr($anchor); ?>" class="py-24 <?php echo esc_attr($color_mode == 'dark' ? 'bg-section-dark' : 'bg-background'); ?> relative overflow-hidden features-4-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?>" <?php echo _spacing($data['spacing']); ?>>
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle at 1px 1px, rgb(255, 255, 255) 1px, transparent 0px); background-size: 32px 32px;"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center lg:flex-row-reverse">
            <div class="<?php echo esc_attr($reverse == 'yes' ? 'order-1' : 'order-2'); ?>" style="opacity: 1; transform: none;">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-br from-primary/20 to-accent/20 rounded-3xl blur-2xl opacity-50"></div>
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-primary/30 rounded-full blur-xl"></div>
                    <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-accent/30 rounded-full blur-xl"></div>
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-border/50">
                        <?php if (!empty($data['image'])):  $image = get_image($data['image']); ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" srcset="<?php echo esc_attr($image['srcset']); ?>" class="w-full h-auto object-cover aspect-square">
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/20 via-transparent to-transparent"></div>
                    </div>
                    <div class="absolute -bottom-6 -right-6 bg-card border border-border rounded-xl p-4 shadow-xl" style="opacity: 1; transform: none;">
                        <div class="text-2xl font-bold text-primary">AI-Ready</div>
                        <div class="text-sm text-muted-foreground">Content Strategy</div>
                    </div>
                </div>
            </div>
            <div class="<?php echo esc_attr($reverse == 'yes' ? 'order-2' : 'order-1'); ?>" style="opacity: 1; transform: none;">
                <?php if (!empty($data['top_title'])): ?>
                    <span class="<?php echo esc_attr($color_mode == 'dark' ? 'text-accent' : 'text-primary'); ?> text-sm font-medium tracking-wider uppercase mb-4 block"><?php echo esc_html($data['top_title']); ?></span>
                <?php endif; ?>
                <?php echo _heading($data['title'], 'font-display text-4xl md:text-5xl font-bold mb-6 ' . esc_attr($color_mode == 'dark' ? 'text-white' : 'text-foreground')) ?>
                <?php if (!empty($data['text'])): ?>
                    <div class="<?php echo esc_attr($color_mode == 'dark' ? 'text-white/70' : 'text-muted-foreground'); ?> text-lg mb-10 leading-relaxed maxwell-content"><?php echo apply_filters('the_content', $data['text']); ?></div>
                <?php endif; ?>
                <?php if (!empty($data['features'])): ?>
                    <div class="grid sm:grid-cols-2 gap-6 mb-6">
                        <?php foreach ($data['features'] as $key => $value): ?>
                            <div class="flex gap-4" style="opacity: 1; transform: none;">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center shrink-0 <?php echo esc_attr($color_mode == 'dark' ? 'bg-white/10' : 'bg-primary/10'); ?>">
                                    <?php if (!empty($value['icon']['subtype'] == 'svg+xml')) : ?>
                                        <?php echo maxwell_render_svg($value['icon']['url'], 'w-6 h-6 ' . esc_attr($color_mode == 'dark' ? 'text-accent' : 'text-primary')); ?>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($value['icon']['url']); ?>" alt="<?php echo esc_attr($value['icon']['alt']); ?>" class="w-5 h-5 text-accent">
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <?php if (!empty($value['title'])): ?>
                                        <h3 class="font-semibold mb-1 <?php echo esc_attr($color_mode == 'dark' ? 'text-white' : 'text-foreground'); ?>"><?php echo esc_html($value['title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($value['text'])): ?>
                                        <p class="text-sm <?php echo esc_attr($color_mode == 'dark' ? 'text-white/70' : 'text-muted-foreground'); ?>"><?php echo esc_html($value['text']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>


                <?php if (!empty($data['link_1']) && $data['use_link_1'] == 'yes') : ?>
                    <?php echo _link_1($data['link_1']); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>