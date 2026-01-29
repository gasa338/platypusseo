<!-- Hero Sekcija -->
<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$block_name = $block['name'];
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('cta_2');
$text_color = $data['text_color'] ?? '#fff';
$background_color = $data['background_color'] ?? "#000";

$block_list = get_post_meta(get_the_ID(), '_acf_blocks_list', true);
?>
<style>
    /* Koristite istu klasu kao u HTML-u - cta-2- */
    .cta-2-<?php echo esc_attr($blocks_id); ?> {
        background-color: <?php echo esc_attr($background_color); ?> !important;
        color: <?php echo esc_attr($text_color); ?> !important;
    }
    
    .cta-2-<?php echo esc_attr($blocks_id); ?> *:not(a) {
        color: inherit !important;
    }
</style>

<section class="py-16 sm:py-20 lg:py-24 cta-2-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?>" id="<?php echo esc_attr($anchor); ?>">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <?php if (!empty($data['title'])) : ?>
                <?php print_heading($block_list, $block_name, $data['title'], 'h2-responsive mb-4'); ?>
            <?php endif; ?>
            <?php if (!empty($data['description'])) : ?>
                <div class="content-list-link mb-8 opacity-90 text-xl"><?php echo apply_filters('the_content', $data['description']); ?></div>
            <?php endif; ?>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <?php if (!empty($data['link_1'])) : ?>
                    <?php link_1($data['link_1']) ?>
                <?php endif; ?>
                <?php if (!empty($data['link_2'])) : ?>
                    <?php link_2($data['link_2']) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>