<?php

use SimplePie\Item;

$blocks_id = $block['id'];
$blocks_class = isset($block['className']) ? $block['className'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('feature_4');
$background_color = $data['background_color'] ?? '#fff';
$reverse = $data['reverse'] ?? 'no';
$color_mode = $data['color_mode'] ?? 'dark';
?>

<section class="py-24 bg-section-light <?php echo $blocks_class; ?>">
    <div class="container mx-auto px-6">
        <div style="opacity: 1;"><span class="text-primary text-sm font-medium tracking-wider uppercase mb-4 block text-center" style="opacity: 1; transform: none;">Why Us</span>
            <h2 class=" text-4xl md:text-5xl font-bold mb-16 text-center" style="opacity: 1; transform: none;">Consistent Results <span class="text-primary">Across Industries</span></h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center p-8 rounded-2xl bg-card border border-border hover:border-primary/30 transition-colors" style="opacity: 1; transform: none;">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-6"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-8 h-8 text-primary">
                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                            <polyline points="16 7 22 7 22 13"></polyline>
                        </svg></div>
                    <div class=" text-4xl font-bold text-gradient mb-3">340%</div>
                    <p class="text-muted-foreground">Average traffic increase across all clients</p>
                </div>
                <div class="text-center p-8 rounded-2xl bg-card border border-border hover:border-primary/30 transition-colors" style="opacity: 1; transform: none;">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-6"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users w-8 h-8 text-primary">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg></div>
                    <div class=" text-4xl font-bold text-gradient mb-3">180%</div>
                    <p class="text-muted-foreground">Average increase in qualified leads</p>
                </div>
                <div class="text-center p-8 rounded-2xl bg-card border border-border hover:border-primary/30 transition-colors" style="opacity: 1; transform: none;">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-6"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award w-8 h-8 text-primary">
                            <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path>
                            <circle cx="12" cy="8" r="6"></circle>
                        </svg></div>
                    <div class=" text-4xl font-bold text-gradient mb-3">45%</div>
                    <p class="text-muted-foreground">Average reduction in customer acquisition cost</p>
                </div>
                <div class="text-center p-8 rounded-2xl bg-card border border-border hover:border-primary/30 transition-colors" style="opacity: 1; transform: none;">
                    <div class="w-16 h-16 rounded-2xl bg-primary/10 flex items-center justify-center mx-auto mb-6"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-column w-8 h-8 text-primary">
                            <path d="M3 3v16a2 2 0 0 0 2 2h16"></path>
                            <path d="M18 17V9"></path>
                            <path d="M13 17V5"></path>
                            <path d="M8 17v-3"></path>
                        </svg></div>
                    <div class=" text-4xl font-bold text-gradient mb-3">12x</div>
                    <p class="text-muted-foreground">Average return on SEO investment</p>
                </div>
            </div>
        </div>
    </div>
</section>