<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('text_component');

$color_scheme = $data['color_mode'] ?? 'light';
?>

<section class="py-24 bg-background">
  <div class="container mx-auto px-6">
    <div class="max-w-3xl mx-auto text-center"> 
    <?php if ($data['top_title']): ?>
      <span class="text-primary font-body text-sm font-semibold tracking-widest uppercase mb-4 block"><?php echo $data['top_title']; ?></span>
    <?php endif; ?>
      <?php _heading($data['title'], 'font-display text-3xl md:text-4xl lg:text-5xl font-bold mb-10 text-foreground leading-tight'); ?>
      <?php if ($data['text']): ?>
      <div class="text-lg text-muted-foreground text-left maxwell-content">
        <?php echo apply_filters('the_content', $data['text']); ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>