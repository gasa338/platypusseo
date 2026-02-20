<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('service_1');
$text_color = $data['text_color'] ?? '';
$overlay_color = $data['overlay_color'] ?? '';
$bg_color = $data['background_color'] ?? '';
$border_color = $data['border_color'] ?? '';
$link_color = $data['link_color'] ?? '';

$lists_type = [
    'list-maxwell-dics',
    'list-maxwell-square',
    'list-maxwell-decimal',
    'list-maxwell-circle'
];
?>
<style>
    .service-1-<?php echo esc_attr($blocks_id); ?>,
    .service-1-<?php echo esc_attr($blocks_id); ?>p,
    .service-1-<?php echo esc_attr($blocks_id); ?>h1,
    .service-1-<?php echo esc_attr($blocks_id); ?>h2,
    .service-1-<?php echo esc_attr($blocks_id); ?>h3,
    .service-1-<?php echo esc_attr($blocks_id); ?>span,
    .service-1-<?php echo esc_attr($blocks_id); ?>ul,
    .service-1-<?php echo esc_attr($blocks_id); ?>li {
        color: <?php echo esc_attr($text_color); ?> !important;
    }

    .service-1-<?php echo esc_attr($blocks_id); ?>.overlay {
        background-color: <?php echo esc_attr($overlay_color); ?> !important;
    }

    .service-1-<?php echo esc_attr($blocks_id); ?>.bg-color {
        background-color: <?php echo esc_attr($bg_color); ?> !important;

    }

    .service-1-<?php echo esc_attr($blocks_id); ?>.border-color {
        border-color: <?php echo esc_attr($border_color); ?> !important;
    }
</style>

<section class="py-24 bg-section-light relative" id="services">
    <div class="absolute inset-0 opacity-50" style="background-image: radial-gradient(circle at 1px 1px, hsl(var(--primary) / 0.05) 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-2xl mb-16">
            <?php if (!empty($data['top_title'])) : ?>
                <span class="text-primary text-sm font-medium tracking-wider uppercase mb-4 block"><?php echo $data['top_title']; ?></span>
            <?php endif; ?>
            <?php echo _heading($data['title'], 'mb-6'); ?>
            <?php if (!empty($data['text'])) : ?>
                <div class="maxwell-content mb-2 text-muted-foreground text-lg"><?php echo apply_filters('the_content', $data['text']); ?></div>
            <?php endif; ?>
        </div>
        <div class="grid md:grid-cols-3 gap-6 no-underline">
            <?php foreach ($data['items'] as $item): ?>
                <?php if (!empty($item['link'])): ?>
                    <a class="group relative p-8 rounded-2xl bg-card border border-border hover:border-primary/50 hover:shadow-xl transition-all duration-500 no-underline" style="animation-delay: 0s;" href="<?php echo esc_url($item['link']['url']); ?>" title="<?php echo esc_attr($item['link']['title']); ?>">

                        <div class="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all">
                            <?php if (!empty($item['icon']['subtype'] == 'svg+xml')) : ?>
                                <?php echo maxwell_render_svg($item['icon']['url'], 'lucide lucide-search w-7 h-7 text-primary group-hover:text-white transition-colors'); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="<?php echo esc_attr($item['icon']['alt']); ?>" class="lucide lucide-search w-7 h-7 text-primary group-hover:text-white transition-colors">
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($item['title'])): ?>
                            <h3 class=" text-2xl font-semibold mb-4 group-hover:text-primary transition-colors"><?php echo $item['title']; ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($item['text'])): ?>
                            <div class="text-muted-foreground mb-6 leading-relaxed maxwell-content"><?php echo $item['text']; ?></div>
                        <?php endif; ?>
                        <?php if (!empty($item['list']) || !empty($item['link'])): ?>
                            <ul class="space-y-2 mb-8">
                                <?php foreach ($item['list'] as $list): ?>
                                    <li class="flex items-center gap-2 text-sm text-muted-foreground">
                                        <div class="w-1.5 h-1.5 rounded-full bg-primary"></div><?php echo $list['text']; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if (!empty($item['link'])): ?>
                            <span class="inline-flex items-center gap-2 text-primary font-medium group-hover:gap-3 transition-all"><?php echo $item['link']['title']; ?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right w-4 h-4">
                                    <path d="M7 7h10v10"></path>
                                    <path d="M7 17 17 7"></path>
                                </svg>
                            </span>
                        <?php endif; ?>
                    </a>
                <?php else: ?>
                    <div class="group relative p-8 rounded-2xl bg-card border border-border hover:border-primary/50 hover:shadow-xl transition-all duration-500" style="animation-delay: 0s;">

                        <div class="w-14 h-14 rounded-xl bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary group-hover:scale-110 transition-all">
                            <?php if (!empty($item['icon']['subtype'] == 'svg+xml')) : ?>
                                <?php echo maxwell_render_svg($item['icon']['url'], 'lucide lucide-search w-7 h-7 text-primary group-hover:text-white transition-colors'); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url($item['icon']['url']); ?>" alt="<?php echo esc_attr($item['icon']['alt']); ?>" class="lucide lucide-search w-7 h-7 text-primary group-hover:text-white transition-colors">
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($item['title'])): ?>
                            <h3 class=" text-2xl font-semibold mb-4 group-hover:text-primary transition-colors"><?php echo $item['title']; ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($item['text'])): ?>
                            <div class="text-muted-foreground mb-6 leading-relaxed maxwell-content"><?php echo $item['text']; ?></div>
                        <?php endif; ?>
                        <?php if (!empty($item['list']) || !empty($item['link'])): ?>
                            <ul class="space-y-2 mb-8">
                                <?php foreach ($item['list'] as $list): ?>
                                    <li class="flex items-center gap-2 text-sm text-muted-foreground">
                                        <div class="w-1.5 h-1.5 rounded-full bg-primary"></div><?php echo $list['text']; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <?php if (!empty($item['link'])): ?>
                            <span class="inline-flex items-center gap-2 text-primary font-medium group-hover:gap-3 transition-all"><?php echo $item['link']['title']; ?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right w-4 h-4">
                                    <path d="M7 7h10v10"></path>
                                    <path d="M7 17 17 7"></path>
                                </svg>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>