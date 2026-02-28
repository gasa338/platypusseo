<?php

use SimplePie\Item;

$blocks_id = $block['id'];
$blocks_class = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('case_study');
$background_color = $data['background_color'] ?? '#fff';
$reverse = $data['revers'] ?? 'no';
$color_mode = $data['color_mode'] ?? 'dark';
$layout = $data['layout'] ?? 'default';
$layout_number = $data['layout_number'] ?? 'two';
?>
<?php echo _spacing_full('case-study',$blocks_id,$data['margin'], $data['padding']); ?>
<section id="<?php echo esc_attr($anchor); ?>" class="case-study-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); echo ' '._background($data['background']); ?>">
    <div class="container mx-auto px-6 <?php echo $layout_number === 'two' ? 'max-w-5xl' : ''; ?>">
        <?php if ($layout === 'horizontal') : ?>
            <div class="container mx-auto px-6">
                <div class="flex flex-col lg:flex-row gap-12">
                    <!-- Leva fiksna strana - header -->
                    <div class="lg:w-1/3 lg:sticky lg:top-24 lg:self-start">
                        <div class="max-w-2xl">
                            <?php if (!empty($data['top_title'])) : ?>
                                <span class="maxwell-top-title mb-4 block"><?php echo $data['top_title']; ?></span>
                            <?php endif; ?>

                            <?php echo _heading($data['title'], "mb-6"); ?>

                            <?php if (!empty($data['text'])) : ?>
                                <div class="text-lg mb-8"><?php echo apply_filters('the_content', $data['text']); ?></div>
                            <?php endif; ?>

                            <?php if (!empty($data['link'])) : ?>
                                <?php echo _link_1($data['link'], ''); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Desna strana - boxevi u parovima -->
                    <?php if (!empty($data['items'])) : ?>
                        <div class="lg:w-2/3">
                            <div class="flex flex-col gap-6">
                                <?php
                                $chunks = array_chunk($data['items'], 2);
                                foreach ($chunks as $chunk) :
                                ?>
                                    <div class="grid md:grid-cols-2 gap-6">
                                        <?php foreach ($chunk as $item) : ?>
                                            <div>
                                                <a class="group block h-full no-underline" href="<?php echo $item['link']['url']; ?>">
                                                    <div class="relative h-full rounded-2xl overflow-hidden bg-card border border-border hover:border-accent/30 transition-all duration-500">
                                                        <div class="relative h-48 overflow-hidden">
                                                            <?php if ($item['image']) : $image = get_image($item['image']); ?>
                                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                                            <?php endif; ?>
                                                            <div class="absolute inset-0 bg-gradient-to-t from-card via-transparent to-transparent"></div>
                                                            <div class="absolute top-4 right-4 w-10 h-10 rounded-full bg-background/80 backdrop-blur-sm flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right w-5 h-5  group-hover:text-primary transition-colors">
                                                                    <path d="M7 7h10v10"></path>
                                                                    <path d="M7 17 17 7"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div class="p-6">
                                                            <?php if ($item['title']) : ?>
                                                                <h3 class=" text-2xl font-bold mb-2 group-hover:text-primary transition-colors"><?php echo $item['title']; ?></h3>
                                                            <?php endif; ?>
                                                            <?php if ($item['main_text']) : ?>
                                                                <div class="mb-4 maxwell-content"><?php echo apply_filters('the_content', $item['main_text']); ?></div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php else : ?>
            <!-- Originalni vertikalni layout -->
            <!-- <div class="container mx-auto px-6"> -->
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-16">
                    <div class="max-w-2xl">
                        <?php if (!empty($data['top_title'])) : ?>
                            <span class="maxwell-top-title mb-4 block"><?php echo $data['top_title']; ?></span>
                        <?php endif; ?>
                        <?php echo _heading($data['title'], 'mb-6'); ?>
                        <?php if (!empty($data['text'])) : ?>
                            <p class="text-lg"><?php echo $data['text']; ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($data['link'])) : ?>                        
                        <?php echo _link_1($data['link'], ''); ?>
                    <?php endif; ?>
                </div>

                <?php if (!empty($data['items'])) : ?>
                    <div class="grid <?php echo $layout_number === 'two' ? 'md:grid-cols-2' : 'md:grid-cols-3'; ?> gap-6 ">
                        <?php foreach ($data['items'] as $item) : ?>
                            <div>
                                <a class="group block h-full no-underline" href="<?php echo $item['link']['url']; ?>">
                                    <div class="relative h-full rounded-2xl overflow-hidden bg-card border border-border hover:border-accent/30 transition-all duration-500">
                                        <div class="relative h-48 overflow-hidden">
                                            <?php if ($item['image']) : $image = get_image($item['image']); ?>
                                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                            <?php endif; ?>
                                            <div class="absolute inset-0 bg-gradient-to-t from-card via-transparent to-transparent"></div>
                                            <div class="absolute top-4 right-4 w-10 h-10 rounded-full bg-accent/80 backdrop-blur-sm flex items-center justify-center opacity-0 group-hover:opacity-100 group-hover:bg-accent transition-opacity duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right w-5 h-5  group-hover:text-primary transition-colors">
                                                    <path d="M7 7h10v10"></path>
                                                    <path d="M7 17 17 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="p-6">
                                            <?php if ($item['title']) : ?>
                                                <h3 class="text-2xl font-bold mb-2 group-hover:text-primary transition-colors"><?php echo $item['title']; ?></h3>
                                            <?php endif; ?>
                                            <?php if ($item['tag']) : ?>
                                                <div class="mb-3">
                                                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-accent text-primary-foreground">
                                                        <?php echo $item['tag']; ?>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($item['main_text']) : ?>
                                                <div class="mb-4 line-clamp-2"><?php echo $item['main_text']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <!-- </div> -->
        <?php endif; ?>
    </div>
</section>