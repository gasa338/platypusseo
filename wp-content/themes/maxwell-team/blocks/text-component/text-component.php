<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('text_component');

$color_mode = $data['color_mode'] ?? 'light';
$layout = $data['layout'] ?? 'vertical';
?>

<section class="py-24 text-component-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?> <?php echo esc_attr($color_mode == 'dark' ? 'bg-section-dark' : 'bg-background'); ?>" <?php echo _spacing($data['spacing']); ?>>
  <div class="container mx-auto px-6">
    <?php if ($layout === 'horizontal') : ?>
      <div class="grid grid-cols-1 md:grid-cols-6 gap-12 max-w-7xl mx-auto">
        <div class="md:col-span-2">
          <?php if ($data['top_title']): ?>
            <span class="text-primary font-body text-sm font-semibold tracking-widest uppercase mb-4 block"><?php echo $data['top_title']; ?></span>
          <?php endif; ?>
          <?php echo _heading($data['title'], 'mb-10 '. esc_attr($color_mode == 'dark' ? 'text-white' : 'text-foreground')); ?>
        </div>
        <div class="md:col-span-4">
          <?php if ($data['text']): ?>
            <div class="text-lg <?php echo esc_attr($color_mode == 'dark' ? 'text-white/70' : 'text-muted-foreground'); ?> text-left maxwell-content">
              <?php echo apply_filters('the_content', $data['text']); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    <?php else: ?>
      <div class="max-w-4xl mx-auto text-center">
        <?php if ($data['top_title']): ?>
          <span class="text-primary font-body text-sm font-semibold tracking-widest uppercase mb-4 block"><?php echo $data['top_title']; ?></span>
        <?php endif; ?>
        <?php echo _heading($data['title'], 'mb-10 '. esc_attr($color_mode == 'dark' ? 'text-white' : 'text-foreground')); ?>
        <?php if ($data['text']): ?>
          <div class="text-lg <?php echo esc_attr($color_mode == 'dark' ? 'text-white/70' : 'text-muted-foreground'); ?> text-left maxwell-content">
            <?php echo apply_filters('the_content', $data['text']); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</section>