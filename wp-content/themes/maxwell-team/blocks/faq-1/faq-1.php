<!-- Hero Sekcija -->
<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('faq_1');
?>
<style>
    .faq-1-<?php echo esc_attr($blocks_id); ?> {
        background-color: <?php echo $data['background_color'] ?? "#ffffff" ?>;
    }
</style>
<section class="py-8 sm:py-12 lg:py-18 faq-1-<?php echo esc_attr($blocks_id); ?> <?php echo esc_attr($blocks_class); ?>" id="<?php echo esc_attr($anchor); ?>">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">

        <div class="max-w-2xl mx-auto text-center">
            <?php if (!empty($data['top_title'])) : ?>
                <p class="maxwell-top-title"><?php echo $data['top_title']; ?></p>
                <?php endif; ?>
                <?php if (!empty($data['title'])) : ?>
                    <h2 class="h2-responsive"><?php echo $data['title']; ?></h2>
                <?php endif; ?>
                <?php if (!empty($data['description'])) : ?>
                    <div class="mx-auto mt-4"><?php echo apply_filters('the_content', $data['description']); ?></div>
                <?php endif; ?>
        </div>

        <div class="max-w-3xl mx-auto mt-8 space-y-4 md:mt-16 accordion-container-<?php echo $blocks_id; ?>">
            <?php if (!empty($data['items'])) : ?>
                <?php foreach ($data['items'] as $key => $item) : ?>
                    <div class="accordion-item transition-all duration-200 bg-white border-b border-gray-200 shadow-sm rounded-xl cursor-pointer hover:bg-gray-50">
                        <button type="button" class="accordion-button flex items-center justify-between w-full px-4 py-5 sm:p-6">
                            <div class="flex justify-between items-center w-full">
                                <span class="text-left text-lg font-semibold text-primary"><?php echo $item['question']; ?></span>
                                <svg class="w-6 h-6 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                        </button>
                        <div class="<?php echo $key === 0 ? '' : 'hidden'; ?> accordion-content px-4 pb-5 sm:px-6 sm:pb-6 content-list-link">
                            <?php echo apply_filters('the_content', $item['answer']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if (!empty($data['bottom_text'])) : ?>
            <div class="text-center mt-9 content-list-link">
                <?php echo apply_filters('the_content', $data['bottom_text']); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    const accordionItems = document.querySelectorAll('.accordion-container-<?php echo $blocks_id; ?> .accordion-item');
    accordionItems.forEach((item, index) => {
        const button = item.querySelector('button');
        const content = item.querySelector('.accordion-content');
        const icon = button.querySelector('svg');

        // Dodaj event listener na klik
        button.addEventListener('click', function() {
            const isCurrentlyOpen = !content.classList.contains('hidden');

            // Zatvori sve ostale accordion iteme
            accordionItems.forEach((otherItem, otherIndex) => {
                if (otherIndex !== index) {
                    const otherContent = otherItem.querySelector('.accordion-content');
                    const otherIcon = otherItem.querySelector('svg');
                    otherContent.classList.add('hidden');
                    otherIcon.classList.remove('rotate-180');
                }
            });

            // Toggle trenutni accordion
            if (isCurrentlyOpen) {
                content.classList.add('hidden');
                if (icon) icon.classList.remove('rotate-180');
            } else {
                content.classList.remove('hidden');
                if (icon) icon.classList.add('rotate-180');
            }
        });
    });
</script>