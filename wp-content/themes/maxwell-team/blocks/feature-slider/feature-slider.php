<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('feature_slider');
// dd($data);
$bg_image = isset($data['bg_image']) ? get_image($data['bg_image']) : 0;

$text_color = $data['text_color'] ?? '#fff';
$overlay_color = $data['overlay_color'] ?? 'rgba(0, 0, 0, 0.5)';
$bg_color = $data['background_color'] ?? 'rgba(0, 0, 0, 0.5)';
$border_color = $data['border_color'] ?? 'rgba(0, 0, 0, 0.5)';
$link_color = $data['link_color'] ?? 'rgba(0, 0, 0, 0.5)';
?>
<style>
    .feature-slider-<?php echo esc_attr($blocks_id); ?>,
    .feature-slider-<?php echo esc_attr($blocks_id); ?>p,
    .feature-slider-<?php echo esc_attr($blocks_id); ?>h1,
    .feature-slider-<?php echo esc_attr($blocks_id); ?>h2,
    .feature-slider-<?php echo esc_attr($blocks_id); ?>h3,
    .feature-slider-<?php echo esc_attr($blocks_id); ?>span,
    .feature-slider-<?php echo esc_attr($blocks_id); ?>ul,
    .feature-slider-<?php echo esc_attr($blocks_id); ?>li {
        color: <?php echo esc_attr($text_color); ?> !important;
    }

    .feature-slider-<?php echo esc_attr($blocks_id); ?>.overlay {
        background-color: <?php echo esc_attr($overlay_color); ?> !important;
    }

    .feature-slider-<?php echo esc_attr($blocks_id); ?>.bg-color {
        background-color: <?php echo esc_attr($bg_color); ?> !important;
    }

    .feature-slider-<?php echo esc_attr($blocks_id); ?>.border-color {
        border-color: <?php echo esc_attr($border_color); ?> !important;
        background-color: <?php echo esc_attr($link_color); ?> !important;
    }

    .swiper-pagination-bullet {
        width: 8px;
        height: 8px;
        transition: all 0.3s ease;
    }

    .swiper-pagination-bullet-active {
        width: 32px !important;
        background-color: rgb(59 130 246) !important;
        /* primarna boja */
    }
</style>


<section class="py-24 bg-primary/5">
    <div class="container mx-auto px-6">
        <?php if (!empty($data['sliders'])): ?>
            <div class="relative">
                <div class="relative mb-12 flex flex-col md:flex-row justify-between items-start gap-8">
                    <div class="max-w-4xl md: max-w-md">
                        <?php if (!empty($data['top_title'])): ?>
                            <span class="text-primary text-sm font-medium tracking-wider uppercase mb-4 block"><?php echo esc_html($data['top_title']); ?></span>
                        <?php endif; ?>
                        <?php echo _heading($data['title'], 'font-display text-4xl md:text-5xl font-bold text-foreground'); ?>
                    </div>

                    <!-- Navigacioni dugmici IZNAD swiper-a -->
                    <div class="flex absolute bottom-0 right-0">
                        <div tabindex="0">
                            <button class="feature-slider-prev inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 border border-border bg-transparent text-foreground hover:bg-secondary hover:border-primary/50 h-10 w-10 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left w-5 h-5">
                                    <path d="m15 18-6-6 6-6"></path>
                                </svg>
                            </button>
                        </div>
                        <div tabindex="0">
                            <button class="feature-slider-next inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 border border-border bg-transparent text-foreground hover:bg-secondary hover:border-primary/50 h-10 w-10 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right w-5 h-5">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="feature-slider-swiper swiper">
                    <div class="swiper-wrapper">
                        <?php $counter = 1; ?>
                        <?php foreach ($data['sliders'] as $slide): ?>
                            <div class="swiper-slide">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 min-h-[400px]">
                                    <div class="lg:col-span-2 bg-card rounded-2xl p-8 md:p-12 border border-border relative overflow-hidden left-side">
                                        <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                                        <div class="relative z-10">
                                            <div class="flex items-center gap-4 mb-6">
                                                <div class="w-12 h-12 rounded-xl bg-accent flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-up w-6 h-6 text-primary">
                                                        <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                                        <polyline points="16 7 22 7 22 13"></polyline>
                                                    </svg>
                                                </div>
                                                <span class="text-sm text-muted-foreground"><?php echo $counter; ?> / <?php echo count($data['sliders']); ?></span>
                                            </div>
                                            
                                            <div>
                                                <?php if (!empty($slide['title'])): ?>
                                                    <h3 class="font-display text-3xl md:text-4xl font-bold mb-4 text-foreground"><?php echo $slide['title']; ?></h3>
                                                <?php endif; ?>
                                                <?php if (!empty($slide['text'])): ?>
                                                    <div class="text-lg text-muted-foreground mb-8 max-w-xl leading-relaxed"><?php echo apply_filters('the_content', $slide['text']); ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-row md:flex-col gap-6 right-side">
                                        <div class="flex-1 bg-card rounded-2xl p-6 border border-border flex flex-col justify-center">
                                            <div class="w-10 h-10 rounded-lg bg-accent flex items-center justify-center mb-4">
                                                <?php if ($slide['left_top']['icon']['subtype'] == 'svg+xml') : ?>
                                                    <?php echo maxwell_render_svg($slide['left_top']['icon']['url'], 'w-5 h-5 text-primary'); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo esc_url($slide['left_top']['icon']['url']); ?>" alt="<?php echo esc_attr($slide['left_top']['icon']['alt']); ?>" class="w-5 h-5 text-accent">
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($slide['left_top']['number'])): ?>
                                                <div class="font-display text-4xl font-bold text-gradient mb-2"><?php echo $slide['left_top']['number']; ?></div>
                                            <?php endif; ?>
                                            <?php if (!empty($slide['left_top']['text'])): ?>
                                                <div class="text-muted-foreground"><?php echo $slide['left_top']['text']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="flex-1 bg-primary rounded-2xl p-6 flex flex-col justify-center text-primary-foreground" style="opacity: 1; transform: none; box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px;">
                                            <div class="w-10 h-10 rounded-lg bg-primary-foreground/20 flex items-center justify-center mb-4">
                                                <?php if ($slide['left_bottom']['icon']['subtype'] == 'svg+xml') : ?>
                                                    <?php echo maxwell_render_svg($slide['left_bottom']['icon']['url'], 'w-5 h-5 text-primary-foreground'); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo esc_url($slide['left_bottom']['icon']['url']); ?>" alt="<?php echo esc_attr($slide['left_bottom']['icon']['alt']); ?>" class="w-5 h-5 text-primary-foreground">
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($slide['left_bottom']['number'])): ?>
                                                <div class="font-display text-4xl font-bold mb-2"><?php echo $slide['left_bottom']['number']; ?></div>
                                            <?php endif; ?>
                                            <?php if (!empty($slide['left_bottom']['text'])): ?>
                                                <div class="text-primary-foreground/80"><?php echo $slide['left_bottom']['text']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>

<script>
    (function() {
        // Selektuj sve Swiper kontejnere unutar feature-slider blokova
        var containers = document.querySelectorAll('.feature-slider-swiper');

        function initSwiper(container, index) {
            if (!container) return false;

            if (typeof Swiper === 'undefined') {
                console.error('Swiper nije učitana!');
                return false;
            }

            // Proveri da li već postoji swiper instance
            if (container.swiper) {
                return true;
            }

            // Pronađi navigacione elemente za ovaj konkretni slider
            var parent = container.closest('.relative');
            var nextEl = parent ? parent.querySelector('.feature-slider-next') : null;
            var prevEl = parent ? parent.querySelector('.feature-slider-prev') : null;

            var swiperInstance = new Swiper(container, {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                grabCursor: true,
                speed: 600,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: nextEl,
                    prevEl: prevEl,
                },
                on: {
                    init: function() {
                        console.log('Swiper ' + index + ' inicijalizovan');
                    }
                }
            });

            // Dodaj aktivnu klasu za paginaciju
            swiperInstance.on('paginationUpdate', function() {
                var bullets = paginationEl.querySelectorAll('.swiper-pagination-bullet');
                bullets.forEach(function(bullet, i) {
                    if (i === swiperInstance.realIndex) {
                        bullet.classList.add('swiper-pagination-bullet-active');
                        bullet.classList.remove('bg-primary/30');
                        bullet.classList.add('bg-primary');
                        bullet.style.width = '32px';
                    } else {
                        bullet.classList.remove('swiper-pagination-bullet-active');
                        bullet.classList.remove('bg-primary');
                        bullet.classList.add('bg-primary/30');
                        bullet.style.width = '8px';
                    }
                });
            });

            container.swiper = swiperInstance;
            return true;
        }

        function tryInitAll(attempt = 0) {
            if (attempt > 10) {
                console.log('Prekinuto nakon 10 pokušaja za sve Swipere');
                return;
            }

            var allInit = true;
            containers.forEach(function(container, index) {
                if (!initSwiper(container, index)) {
                    allInit = false;
                }
            });

            if (!allInit) {
                setTimeout(function() {
                    tryInitAll(attempt + 1);
                }, 300);
            } else {
                console.log('Svi swiperi su uspešno inicijalizovani');
            }
        }

        // Čekaj da se Swiper biblioteka učita
        function waitForSwiper() {
            if (typeof Swiper !== 'undefined') {
                // Čekaj da se DOM potpuno učita
                if (document.readyState === 'complete') {
                    setTimeout(tryInitAll, 100);
                } else {
                    window.addEventListener('load', function() {
                        setTimeout(tryInitAll, 100);
                    });
                }
            } else {
                setTimeout(waitForSwiper, 100);
            }
        }

        // Pokreni inicijalizaciju
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', waitForSwiper);
        } else {
            waitForSwiper();
        }
    })();
</script>