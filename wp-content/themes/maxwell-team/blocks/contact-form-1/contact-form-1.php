<!-- Hero Sekcija -->
<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('contact_form_1');
?>

<section class="py-16 sm:py-20 lg:py-24 cta-2-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?>" id="<?php echo esc_attr($anchor); ?>">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-6 gap-12 max-w-7xl mx-auto">
            <div class="lg:col-span-2">
                <?php echo _heading($data['title'], ' mb-6'); ?>
                <?php if (!empty($data['data'])) : ?>
                    <div class="space-y-6">
                        <?php foreach ($data['data'] as $item): ?>
                            <div class="flex items-start gap-4 px-6 py-4 rounded-xl bg-accent/20 border border-accent/80 transition-transform duration-300 group">
                                <?php if (!empty($item['icon'])): ?>
                                    <div class="w-18 h-18 rounded-lg bg-accent flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:scale-105 transition-all">
                                        <?php
                                        if (!empty($item['icon']['subtype'] == 'svg+xml')) {
                                            echo maxwell_render_svg($item['icon']['url'], 'w-16 h-16 rounded-md p-2 text-white shrink-0 group-hover:text-white');
                                        } else {
                                        ?>
                                            <img src="<?php echo $item['icon']['url']; ?>" alt="<?php echo $item['icon']['alt']; ?>" class="w-20 h-20">
                                        <?php } ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($item['text'])) : ?>
                                    <div class="content-list-link ul">
                                        <?php echo apply_filters('the_content', $item['text']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="lg:col-span-4 bg-white rounded-2xl p-8 border border-border/50 shadow-lg">
                <?php if (!empty($data['form_title'])) : ?>
                    <h2 class="text-3xl mb-6"><?php echo esc_html($data['form_title']); ?></h2>
                <?php endif; ?>
                <?php if (!empty($data['form_text'])) : ?>
                    <div class="mb-8"><?php echo apply_filters('the_content', $data['form_text']); ?></div>
                <?php endif; ?>
                <?php echo do_shortcode('[contact-form-7 id="' . $data['choose_form'] . '"]'); ?>
            </div>
        </div>
    </div>
</section>