<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('hero_industry');

$color_scheme = $data['color_mode'] ?? 'light';
?>

<section class="py-24 relative hero-industry-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?> <?php echo esc_attr($color_scheme == 'dark' ? 'bg-section-dark' : ''); ?>" <?php echo _spacing($data['spacing']); ?>>
    <?php if ($color_scheme == 'dark'): ?>
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 1px 1px, rgb(255, 255, 255) 1px, transparent 0px); background-size: 32px 32px;"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 1px 1px, rgb(0, 0, 0) 1px, transparent 0px); background-size: 32px 32px;"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-accent/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-primary/20 rounded-full blur-3xl"></div>
    <?php endif; ?>

    <div class="container mx-auto px-6 relative z-10">
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
            <?php echo _heading($data['title'], 'mb-6' . ($color_scheme == 'dark' ? ' text-white/80' : ' text-white')); ?>
            <?php if (!empty($data['text'])): ?>
                <div class="text-xl mb-10 <?php echo esc_attr($color_scheme == 'dark' ? 'text-white/80' : 'text-white'); ?>"><?php echo apply_filters('the_content', $data['text']); ?></div>
            <?php endif; ?>
            <div class="flex flex-wrap gap-4">
                <?php if (!empty($data['link_1'])): ?>
                    <?php echo _link_1($data['link_1']); ?>
                <?php endif; ?>
                <?php if (!empty($data['link_2'])): ?>
                    <?php
                    if ($color_scheme == 'dark') :
                        echo _link_6($data['link_2']);
                    else :
                        echo _link_2($data['link_2']);
                    endif;
                    ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>