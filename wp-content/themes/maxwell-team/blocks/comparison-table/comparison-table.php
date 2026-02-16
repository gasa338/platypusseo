<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$block_name = $block['name'];
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('comparison_table');
?>
<style>
    /* Razmak između kolona */
    .table-wrapper {
        border-spacing: 8px 0;
        border-collapse: separate;
    }    
    
    thead tr th {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }
    
    /* Stil za svaku kolonu */
    tbody td {
        border-left: 1px solid rgb(226, 232, 240);
        border-right: 1px solid rgb(226, 232, 240);
        position: relative;
    }
    
    /* Zaobljene ivice na dnu kolone */
    tbody tr:last-child td {
        border-bottom-left-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }
    
    /* Plava pozadina za poslednju kolonu */
    tbody td:last-child {
        background-color: rgb(219, 234, 254); /* blue-100 */
    }
    
    /* Sticky prva kolona */
    tbody td:first-child {
        position: sticky;
        left: 0;
        z-index: 10;
        background-color: white;
    }
</style>

<section class="py-20 bg-background">
    <div class="container mx-auto px-4">

        <div class="w-full max-w-7xl mx-auto">

            <div class="max-w-4xl">
                <?php if ($data['top_title']): ?>
                    <span class="text-primary text-sm font-medium tracking-wider uppercase mb-4 block"><?php echo esc_html($data['top_title']); ?></span>
                <?php endif; ?>
                <?php echo _heading($data['title'], 'font-display text-4xl font-bold mb-8 text-foreground'); ?>
                <?php if (!empty($data['text'])): ?>
                    <div class="text-lg text-muted-foreground mb-12 maxwell-content"><?php echo apply_filters('the_content', $data['text']); ?></div>
                <?php endif; ?>
            </div>

            <div class="p-3 bg-white rounded-2xl shadow-xl">
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="table-wrapper w-full">
                        <!-- Table header -->
                        <thead class="text-[11px] md:text-[13px] text-slate-500/70">
                            <tr>
                                <?php foreach ($data['items'][0]['row'] as $key => $heading): ?>
                                    <?php if ($key === 0): var_dump($key); ?>
                                        <th class="px-3 md:px-5 py-2 first:pl-3 last:pr-3 bg-slate-100 first:sticky first:left-0 first:z-10">
                                            <div class="font-medium text-left"><?php echo esc_html($heading['name']); ?></div>
                                        </th>
                                    <?php else: ?>

                                        <th class="px-3 md:px-5 py-2 first:pl-3 last:pr-3 bg-[#1a3a52]  min-w-[140px] md:min-w-[200px]">
                                            <div class="font-semibold text-left text-white"><?php echo esc_html($heading['name']); ?></div>
                                        </th>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <tbody class="text-[10px] md:text-sm font-medium">
                            <?php foreach ($data['items'] as $key => $item):
                                if ($key !== 0) :
                            ?>
                                    <tr>
                                        <?php foreach ($item['row'] as $key_cell => $cell): ?>
                                            <?php if ($key_cell === 0): ?>
                                                <td class="px-3 md:px-5 py-3 min-w-[120px] md:min-w-[200px]">
                                                    <div class="text-slate-900 font-semibold"><?php echo esc_html($cell['name']); ?></div>
                                                </td>
                                            <?php else: ?>
                                                <td class="px-3 md:px-5 py-3">
                                                    <div class="flex items-center gap-1 md:gap-2">
                                                        <span class="text-slate-700"><?php echo esc_html($cell['name']); ?></span>
                                                        <?php if (!empty($cell['popup'])): ?>
                                                            <div class="tooltip-container">
                                                                <button class="info-btn pulse-soft flex-shrink-0 text-slate-400 hover:text-slate-600 transition-colors" onclick="toggleTooltip(event)">
                                                                    <svg class="w-3 h-3 md:w-4 md:h-4" fill="currentColor" viewBox="0 0 20 20">
                                                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                                    </svg>
                                                                </button>
                                                                <div class="tooltip absolute z-50 bg-gray-900 text-white text-xs rounded-lg p-3 w-48 md:w-64 bottom-full left-1/2 transform -translate-x-1/2 mb-2 shadow-xl">
                                                                    <div class="mb-1 font-semibold"><?php echo esc_html($cell['name']); ?></div>
                                                                    <div class="text-gray-300"><?php echo $cell['popup']; ?></div>
                                                                    <div class="absolute top-full left-1/2 transform -translate-x-1/2 -mt-1">
                                                                        <div class="border-8 border-transparent border-t-gray-900"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tr>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>

            <!-- Mobile scroll hint -->
            <div class="md:hidden mt-4 px-4 text-center text-xs text-gray-500">
                ← Swipe horizontally to see all columns →
            </div>
        </div>

    </div>
</section>

<script>
    // Close all tooltips when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.tooltip-container')) {
            document.querySelectorAll('.tooltip.show').forEach(tooltip => {
                tooltip.classList.remove('show');
            });
        }
    });

    function toggleTooltip(event) {
        event.stopPropagation();
        const button = event.currentTarget;
        const tooltip = button.nextElementSibling;

        // Close all other tooltips
        document.querySelectorAll('.tooltip.show').forEach(t => {
            if (t !== tooltip) {
                t.classList.remove('show');
            }
        });

        // Toggle current tooltip
        tooltip.classList.toggle('show');
    }
</script>