<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$block_name = $block['name'];
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('text_with_boxes');
?>

<section id="<?php echo esc_attr($anchor); ?>" class="py-20 md:py-24 bg-section-dark relative overflow-hidden text-with-boxes-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?>">
    <div class="absolute inset-0 opacity-[0.04]" style="background-image: linear-gradient(rgb(255, 255, 255) 1px, transparent 1px), linear-gradient(90deg, rgb(255, 255, 255) 1px, transparent 1px); background-size: 80px 80px;"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto">
            <?php if (!empty($data['top_title'])): ?>
                <span class="text-accent text-sm font-medium tracking-wider uppercase mb-4 block "><?php echo esc_html($data['top_title']); ?></span>
            <?php endif; ?>
            <?php echo _heading($data['title'], 'mb-8 text-primary-foreground') ?>
            <?php if (!empty($data['content'])): ?>
                <?php foreach ($data['content'] as $content): ?>
                    <?php if ($content['acf_fc_layout'] == 'text' && !empty($content['text'])): ?>
                        <div class="text-xl text-primary-foreground/80  leading-relaxed mb-10 max-w-3xl maxwell-content">
                            <?php echo apply_filters('the_content', $content['text']) ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($content['acf_fc_layout'] == 'items' && !empty($content['items'])): ?>
                        <div class="grid md:grid-cols-3 gap-6 mb-10">
                            <?php foreach ($content['items'] as $item): ?>
                                <div class="group flex items-center gap-4 p-5 rounded-xl bg-primary-foreground/5 border border-primary-foreground/10 hover:border-primary/50 hover:shadow-lg transition-all duration-300">
                                    <?php if ($item['icon']['subtype'] == 'svg+xml') : ?>
                                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:scale-110 transition-all">
                                            <?php echo maxwell_render_svg($item['icon']['url'], 'w-5 h-5 text-accent shrink-0 group-hover:text-white'); ?>
                                        </div>
                                    <?php else : ?>
                                        <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="<?php echo esc_attr($item['icon']['alt']); ?>" class="w-6 h-6 text-primary transition-colors">
                                    <?php endif; ?>
                                    <?php if (!empty($item['title'])): ?>
                                        <span class="text-primary-foreground  font-medium"><?php echo esc_html($item['title']); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>