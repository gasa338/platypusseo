<!-- Hero Sekcija -->
<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$block_name = $block['name'];
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('text_column');
$text_color = $data['text_color'] ?? '#fff';
$background_color = $data['background_color'] ?? "#000";
?>


<section id="<?php echo esc_attr($anchor); ?>" class="bg-background overflow-hidden text-column-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?>" <?php echo _padding($data['padding']); ?>``>
  <div class="container mx-auto px-6 max-w-6xl">

    <!-- Intro -->
    <div class="max-w-3xl mb-12">
      <?php echo _heading($data['title'], 'mb-8'); ?>
      <?php if (!empty($data['text'])): ?>
        <div class="text-xl text-muted-foreground leading-relaxed">
          <?php echo apply_filters('the_content', $data['text']); ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Framework -->
    <div class="grid lg:grid-cols-2 gap-x-20 gap-y-16">

      <!-- Criteria -->
      <div>
        <div class="flex items-center gap-4 mb-8">
          <?php if (!empty($data['left_icon'])): ?>
          <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10">
            <?php if ($data['left_icon']['subtype'] == 'svg+xml') : ?>
              <?php echo maxwell_render_svg($data['left_icon']['url'], 'h-5 w-5 text-primary'); ?>
            <?php else : ?>
              <img src="<?php echo esc_url($data['left_icon']['url']); ?>" alt="<?php echo esc_attr($data['left_icon']['alt']); ?>" class="h-5 w-5 text-primary">
            <?php endif; ?>
          </div>
          <?php endif; ?>
          <?php if (!empty($data['left_title'])): ?>
          <h3 class="text-2xl font-bold">
            <?php echo $data['left_title']; ?>
          </h3>
          <?php endif; ?>
        </div>

        <div class="space-y-6 pl-14 maxwell-content">
          <?php echo apply_filters('the_content', $data['left_text']); ?>
        </div>
      </div>

      <!-- Implications -->
      <div class="pt-1">
        <div class="flex items-center gap-4 mb-8">
          <?php if (!empty($data['right_icon'])): ?>
          <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10">
            <!-- Decision / constraint icon -->
            <?php if ($data['right_icon']['subtype'] == 'svg+xml') : ?>
              <?php echo maxwell_render_svg($data['right_icon']['url'], 'h-5 w-5 text-primary'); ?>
            <?php else : ?>
              <img src="<?php echo esc_url($data['right_icon']['url']); ?>" alt="<?php echo esc_attr($data['right_icon']['alt']); ?>" class="w-5 h-5 text-primary">
            <?php endif; ?>
          </div>
          <?php endif; ?>
          
          <?php if (!empty($data['right_title'])): ?>
          <h3 class="text-2xl font-bold">
            <?php echo $data['right_title']; ?>
          </h3>
          <?php endif; ?>
        </div>

        <div class="space-y-6 pl-14 maxwell-content">
          <?php echo apply_filters('the_content', $data['right_text']); ?>
        </div>
      </div>

    </div>

    <!-- Closing statement -->
    <?php if (!empty($data['bottom_text'])): ?>
    <div class="mt-12 pt-12 border-t border-border maxwell-content">
        <?php echo apply_filters('the_content', $data['bottom_text']); ?>
    </div>
    <?php endif; ?>

  </div>
</section>