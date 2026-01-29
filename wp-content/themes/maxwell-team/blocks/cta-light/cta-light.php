<!-- Hero Sekcija -->
<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('cta_light');
$bg_image = get_image($data['background_image']);
?>

<section class="py-24">
    <div class="container mx-auto px-6 text-center">
        <?php echo _heading($data['title'], 'font-display text-4xl font-bold mb-6 text-foreground') ?>
        <?php if ($data['text']) : ?>
            <div class="text-lg text-muted-foreground mb-10 max-w-2xl mx-auto"><?php echo apply_filters('the_content', $data['text']); ?></div>
        <?php endif; ?>
        <?php if ($data['link']) : ?>
            
            <?php echo _link_1($data['link']); ?>
        <?php endif; ?>
    </div>
</section>