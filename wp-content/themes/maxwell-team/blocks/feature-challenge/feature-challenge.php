<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$block_name = $block['name'];
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('features_challenge');
$text_color = $data['text_color'] ?? 'inherit';
$background_color = $data['background_color'] ?? "transparent";
$layout = $data['layout'] ?? 'default';
$layout_right = $data['layout_right'] ?? 'default';
?>
<style>
    /* Koristite istu klasu kao u HTML-u - cta-2- */
    .feature-challenge-<?php echo esc_attr($blocks_id); ?> {
        background-color: <?php echo esc_attr($background_color); ?> !important;
        color: <?php echo esc_attr($text_color); ?> !important;
    }
</style>

<section id="<?php echo esc_attr($anchor); ?>" class="py-24 feature-challenge-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?>">
    <div class="container mx-auto px-6">
        <div class="<?php echo esc_attr($layout == 'horizontal' ? 'max-w-7xl' : 'max-w-4xl'); ?> mx-auto">
            <?php if ($layout == 'horizontal'): ?>
                <!-- Horizontalni layout: Levo naslov i tekst, desno challenges -->
                <div class="grid <?php echo esc_attr($layout_right == 'one_column' ? 'md:grid-cols-2' : 'md:grid-cols-6'); ?> gap-12 items-start">
                    <!-- Leva kolona - naslov i tekst -->
                    <div class="<?php echo esc_attr($layout_right == 'one_column' ? '' : 'md:col-span-2'); ?>">
                        <?php if ($data['top_title']): ?>
                            <span class="text-primary font-medium tracking-wider uppercase mb-4 block"><?php echo esc_html($data['top_title']); ?></span>
                        <?php endif; ?>
                        <?php echo _heading($data['title'], 'mb-8'); ?>
                        <?php if (!empty($data['text'])): ?>
                            <div class="text-lg mb-12 maxwell-content"><?php echo apply_filters('the_content', $data['text']); ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Desna kolona - challenges -->
                    <?php if (!empty($data['challenges'])): ?>
                        <div class="<?php echo esc_attr($layout_right == 'one_column' ? '' : 'md:col-span-4'); ?>">
                            <div class="grid gap-6 <?php echo esc_attr($layout_right == 'one_column' ? 'md:grid-cols-1' : 'md:grid-cols-2'); ?> ">
                                <?php foreach ($data['challenges'] as $challenge): ?>
                                    <div class="group p-6 rounded-xl bg-card border border-border hover:border-primary/50 hover:shadow-lg transition-all duration-300">
                                        <div class="flex gap-4">
                                            <?php if (!empty($challenge['icon'])) : ?>
                                                <div class="flex-shrink-0">
                                                    <?php if ($challenge['icon']['subtype'] == 'svg+xml') : ?>
                                                        <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:scale-110 transition-all">
                                                            <?php echo maxwell_render_svg($challenge['icon']['url'], 'w-6 h-6 text-primary transition-colors group-hover:text-white'); ?>
                                                        </div>
                                                    <?php else : ?>
                                                        <img src="<?php echo esc_url($challenge['icon']['url']); ?>" alt="<?php echo esc_attr($challenge['icon']['alt']); ?>" class="w-6 h-6 text-primary transition-colors">
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="flex-1">
                                                <?php if (!empty($challenge['title'])) : ?>
                                                    <h3 class="text-lg font-semibold mb-2 group-hover:text-primary transition-colors"><?php echo esc_html($challenge['title']); ?></h3>
                                                <?php endif; ?>
                                                <?php if (!empty($challenge['text'])) : ?>
                                                    <div class="mb-4"><?php echo apply_filters('the_content', $challenge['text']); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <!-- Originalni vertikalni layout -->
                <div>
                    <?php if ($data['top_title']): ?>
                        <span class="text-primary text-sm font-medium tracking-wider uppercase mb-4 block"><?php echo esc_html($data['top_title']); ?></span>
                    <?php endif; ?>
                    <?php echo _heading($data['title'], 'mb-8'); ?>
                    <?php if (!empty($data['text'])): ?>
                        <div class="text-lg mb-12"><?php echo apply_filters('the_content', $data['text']); ?></div>
                    <?php endif; ?>
                </div>
                <?php if (!empty($data['challenges'])): ?>
                    <div class="grid md:grid-cols-2 gap-6">
                        <?php foreach ($data['challenges'] as $challenge): ?>
                            <div class="group p-6 rounded-xl bg-card border border-border hover:border-primary/50 hover:shadow-lg transition-all duration-300">
                                <div class="flex gap-4">
                                    <?php if (!empty($challenge['icon'])) : ?>
                                        <div class="flex-shrink-0">
                                            <?php if ($challenge['icon']['subtype'] == 'svg+xml') : ?>
                                                <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center shrink-0 group-hover:bg-primary group-hover:scale-110 transition-all">
                                                    <?php echo maxwell_render_svg($challenge['icon']['url'], 'w-6 h-6 text-primary transition-colors group-hover:text-white'); ?>
                                                </div>
                                            <?php else : ?>
                                                <img src="<?php echo esc_url($challenge['icon']['url']); ?>" alt="<?php echo esc_attr($challenge['icon']['alt']); ?>" class="w-6 h-6 text-primary transition-colors">
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="flex-1">
                                        <?php if (!empty($challenge['title'])) : ?>
                                            <h3 class="text-xl font-semibold mb-2 group-hover:text-primary transition-colors"><?php echo esc_html($challenge['title']); ?></h3>
                                        <?php endif; ?>
                                        <?php if (!empty($challenge['text'])) : ?>
                                            <div class="mb-4"><?php echo apply_filters('the_content', $challenge['text']); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section>