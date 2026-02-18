<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('hero_1');
// dd($data);
$bg_image = get_image($data['bg_image']);

$text_color = $data['text_color'] ?? '#fff';
$overlay_color = $data['overlay_color'] ?? 'rgba(0, 0, 0, 0.5)';
?>
<style>
    .hero-1-<?php echo esc_attr($blocks_id); ?>,
    .hero-1-<?php echo esc_attr($blocks_id); ?>p,
    .hero-1-<?php echo esc_attr($blocks_id); ?>h1,
    .hero-1-<?php echo esc_attr($blocks_id); ?>h2,
    .hero-1-<?php echo esc_attr($blocks_id); ?>h3,
    .hero-1-<?php echo esc_attr($blocks_id); ?>h4,
    .hero-1-<?php echo esc_attr($blocks_id); ?>h5,
    .hero-1-<?php echo esc_attr($blocks_id); ?>h6,
    .hero-1-<?php echo esc_attr($blocks_id); ?>span,
    .hero-1-<?php echo esc_attr($blocks_id); ?>ul,
    .hero-1-<?php echo esc_attr($blocks_id); ?>li {
        color: <?php echo esc_attr($text_color); ?> !important;
    }

    .hero-1-<?php echo esc_attr($blocks_id); ?>.overlay {
        background-color: <?php echo esc_attr($overlay_color); ?> !important;
    }
</style>



<section id="<?php echo esc_attr($anchor); ?>" class="relative hero-1-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?> " <?php echo _spacing($data['spacing']); ?>>
    <?php if ($bg_image): ?>
        <div class="absolute inset-0 overflow-hidden">
            <img class="w-full h-auto object-contain object-bottom-right" src="<?php echo esc_url($bg_image['url']); ?>" alt="<?php echo esc_attr($bg_image['alt']); ?>" srcset="<?php echo esc_attr($bg_image['srcset']); ?>" />
        </div>
    <?php endif; ?>

    <div class="overlay absolute inset-0 z-0"></div>

    <div class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-y-4 lg:items-center lg:grid-cols-2 xl:grid-cols-2">
            <div class="text-center xl:col-span-1 lg:text-left md:px-16 lg:px-0 xl:pr-20">
                <?php echo _heading($data['title'], 'font-display text-4xl md:text-5xl font-bold mb-8 text-foreground'); ?>
                <?php if ($data['text']): ?>
                    <div class="mt-2 sm:mt-6 break-words whitespace-normal maxwell-content"><?php echo apply_filters('the_content', $data['text']); ?></div>
                <?php endif; ?>

                <div class="mt-4 sm:mt-8">
                    <?php if ($data['link_1']): ?>
                        <?php _link_1($data['link_1']); ?>
                    <?php endif; ?>
                    <?php if ($data['link_2']): ?>
                        <?php _link_2($data['link_2']) ?>
                    <?php endif; ?>
                </div>

                <div class="mt-8 sm:mt-16">
                    <?php if ($data['clutch'] && $data['use_clutch'] == 'yes'): ?>
                        <div class="flex items-center justify-center lg:justify-start">
                            <?php echo $data['clutch']; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($data['quote'] && $data['use_quote'] == 'yes'): ?>
                        <?php if ($data['quote']['text']): ?>
                            <blockquote class="mt-6 text-sm maxwell-content">
                                <?php echo apply_filters('the_content', $data['quote']['text']); ?>
                            </blockquote>
                        <?php endif; ?>
                        <?php if ($data['quote']['avatar'] && $data['quote']['name']): ?>
                            <?php if (!$data['quote']['link']): ?>
                                <div class="flex items-center justify-center mt-3 lg:justify-start">
                                    <img class="flex-shrink-0 object-cover w-6 h-6 overflow-hidden rounded-full" src="<?php echo esc_url($data['quote']['avatar']['url']); ?>" alt="<?php echo esc_attr($data['quote']['avatar']['alt']); ?>" />
                                    <p class="ml-2 text-base font-bold text-gray-900 font-pj"><?php echo esc_html($data['quote']['name']); ?></p>
                                </div>
                            <?php else: ?>
                                <a href="<?php echo esc_url($data['quote']['link']['url']); ?>" target="<?php echo esc_attr($data['quote']['link']['target']); ?>" title="<?php echo esc_attr($data['quote']['name']); ?>">
                                    <div class="flex items-center justify-center mt-3 lg:justify-start">
                                        <img class="flex-shrink-0 object-cover w-6 h-6 overflow-hidden rounded-full" src="<?php echo esc_url($data['quote']['avatar']['url']); ?>" alt="<?php echo esc_attr($data['quote']['avatar']['alt']); ?>" />
                                        <p class="ml-2 text-base font-bold text-gray-900 font-pj"><?php echo esc_html($data['quote']['name']); ?></p>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($data['image']): ?>
                <div class="xl:col-span-1">
                    <?php $image_id = $data['image'];
                    $image = get_image($image_id); ?>
                    <img class="w-full mx-auto" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" srcset="<?php echo esc_attr($image['srcset']); ?>" />
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>