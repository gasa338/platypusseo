<?php
$blocks_id = $block['id'];
$blocks_class = isset($block['class']) ? $block['class'] : '';
$block_name = $block['name'];
$anchor = isset($block['anchor']) ? $block['anchor'] : $blocks_id;
$data = get_field('comparison_table');
?>
<style>

    /* Pulsirajući efekat */
        @keyframes pulse-soft {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.6;
            }
        }

        .pulse-soft {
            animation: pulse-soft 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
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
        background-color: hsl(var(--primary));
        color: white;
        border-left: 1px solid hsl(var(--primary-dark));
        border-right: 1px solid hsl(var(--primary-dark));
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

        <div class="w-full max-w-5xl mx-auto">

            <div class="max-w-4xl">
                <?php if ($data['top_title']): ?>
                    <span class="text-primary font-medium tracking-wider uppercase mb-4 block"><?php echo esc_html($data['top_title']); ?></span>
                <?php endif; ?>
                <?php echo _heading($data['title'], 'font-display text-4xl mb-8'); ?>
                <?php if (!empty($data['text'])): ?>
                    <div class="mb-12 maxwell-content"><?php echo apply_filters('the_content', $data['text']); ?></div>
                <?php endif; ?>
            </div>

            <div class="p-3 bg-white rounded-2xl shadow-xl">
                <!-- Table -->
                <div class="overflow-x-auto py-3">
                    <table class="table-wrapper w-full">
                        <!-- Table header -->
                        <thead>
                            <tr>
                                <?php foreach ($data['items'][0]['row'] as $key => $heading): ?>
                                    <?php if ($key === 0):?>
                                        <th class="px-3 md:px-3 py-2 first:pl-3 last:pr-3 bg-primary text-white first:sticky first:left-0 first:z-10">
                                            <div class="font-medium text-left"><?php echo esc_html($heading['name']); ?></div>
                                        </th>
                                    <?php else: ?>

                                        <th class="px-3 md:px-3 py-2 first:pl-3 last:pr-3 bg-primary text-white min-w-[140px] md:min-w-[200px]">
                                            <div class="font-semibold text-left"><?php echo esc_html($heading['name']); ?></div>
                                        </th>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data['items'] as $key => $item):
                                if ($key !== 0) :
                            ?>
                                    <tr>
                                        <?php foreach ($item['row'] as $key_cell => $cell): ?>
                                            <?php if ($key_cell === 0): ?>
                                                <td class="px-3 md:px-3 py-3 min-w-[120px] md:min-w-[200px]">
                                                    <div class=""><?php echo esc_html($cell['name']); ?></div>
                                                </td>
                                            <?php else: ?>
                                                <td class="px-3 md:px-3 py-3">
                                                    <div class="flex items-center gap-1 md:gap-2">
                                                        <span class=""><?php echo esc_html($cell['name']); ?></span>
                                                        <?php if (!empty($cell['popup'])): ?>
                                                            <div class="tooltip-container">
                                                                <button class="info-btn pulse-soft flex-shrink-0 text-slate-400 hover:text-slate-600 transition-colors">
                                                                    <svg class="w-3 h-3 md:w-4 md:h-4" fill="currentColor" viewBox="0 0 20 20">
                                                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                                    </svg>
                                                                </button>
                                                                <div class="tooltip absolute z-50 bg-gray-900 text-white text-xs rounded-lg p-3 w-48 md:w-64 bottom-full left-1/2 transform -translate-x-1/2 mb-2 shadow-xl invisible">
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
            <div class="md:hidden mt-4 px-4 text-center text-xs">
                ← Swipe horizontally to see all columns →
            </div>
        </div>

    </div>
</section>

<script>
    /**
     * Upravljanje tooltip/popup menijima za tabelu
     * - Samo jedan tooltip može biti otvoren istovremeno
     * - Klik na dugme otvara/zatvara pripadajući tooltip
     * - Klik van bilo kog tooltipa zatvara sve
     * - Radi sa tvojom specifičnom HTML strukturom (info-btn dugmad + .tooltip)
     */
    (function() {
        'use strict';

        // Zatvara sve tooltipove (uklanja 'visible' klasu, dodaje 'invisible')
        function closeAllTooltips() {
            document.querySelectorAll('.tooltip.visible').forEach(tooltip => {
                tooltip.classList.remove('visible');
                tooltip.classList.add('invisible');
            });
        }

        // Glavna toggle funkcija za dugmad
        function toggleTooltip(event) {
            // Sprečavamo da se klik prenese na document.click handler
            event.stopPropagation();

            const button = event.currentTarget;

            // Pronalazimo parent .tooltip-container, pa unutar njega .tooltip
            // Ovo je robusnije od nextElementSibling jer struktura može varirati
            const container = button.closest('.tooltip-container');

            // Ako nema kontejnera, ne možemo ništa
            if (!container) return;

            const tooltip = container.querySelector('.tooltip');

            // Ako tooltip ne postoji u ovom kontejneru, izlazimo
            if (!tooltip) return;

            // Provjeravamo da li je trenutni tooltip već vidljiv
            const isVisible = tooltip.classList.contains('visible');

            // Prvo ZATVORI sve druge tooltipove (ali ne diraj trenutni ako ćemo ga otvoriti)
            document.querySelectorAll('.tooltip.visible').forEach(t => {
                if (t !== tooltip) {
                    t.classList.remove('visible');
                    t.classList.add('invisible');
                }
            });

            // Sada upravljamo trenutnim tooltipom
            if (!isVisible) {
                // Otvaramo ga: uklanjamo invisible, dodajemo visible
                tooltip.classList.remove('invisible');
                tooltip.classList.add('visible');
            } else {
                // Zatvaramo ga: uklanjamo visible, dodajemo invisible
                tooltip.classList.remove('visible');
                tooltip.classList.add('invisible');
            }
        }

        // ---- Inicijalizacija ----

        // 1. Postavljamo click listener na document za zatvaranje pri kliku van tooltipa
        document.addEventListener('click', function(event) {
            // Ako klik nije unutar .tooltip-container, zatvori sve
            if (!event.target.closest('.tooltip-container')) {
                closeAllTooltips();
            }
        });

        // 2. Pronalazimo sva info-btn dugmad i dodajemo im toggle funkcionalnost
        const infoButtons = document.querySelectorAll('.info-btn');

        infoButtons.forEach(button => {
            // Uklanjamo prethodne listener (čisto da ne bi dupliralo ako se skripta više puta pokrene)
            button.removeEventListener('click', toggleTooltip);
            // Dodajemo novi listener
            button.addEventListener('click', toggleTooltip);
        });

        // 3. Sprečavamo da klik na sam tooltip (sadržaj) zatvori tooltip
        //    Ovo omogućava da korisnik klikne na tekst unutar tooltipa bez zatvaranja
        document.querySelectorAll('.tooltip').forEach(tooltip => {
            tooltip.addEventListener('click', function(e) {
                e.stopPropagation(); // Ne dozvoljavamo da se klik prenese na document
            });
        });

        // 4. Ako unutar tooltipa postoje linkovi ili dugmad, 
        //    možeš dodatno kontrolisati njihovo ponašanje
        document.querySelectorAll('.tooltip a, .tooltip button').forEach(clickable => {
            clickable.addEventListener('click', function(e) {
                // Zadržavamo propagaciju samo ako želimo da klik na link ne zatvori tooltip
                // (link će i dalje raditi, ali tooltip ostaje otvoren)
                e.stopPropagation();

                // Opciono: ako želiš da se tooltip ipak zatvori nakon klika na link,
                // možeš pozvati closeAllTooltips() ovdje
                // closeAllTooltips();
            });
        });

        // Opciono: Ako se tvoj sadržaj dinamički učitava (npr. kroz AJAX),
        // treba ponovo pokrenuti inicijalizaciju. U tom slučaju, možeš koristiti 
        // observer ili eksportovati funkciju koju pozoveš nakon promjene DOM-a.
        // Primjer jednostavne re-inicijalizacije:
        window.reinitTooltips = function() {
            // Ponovo pronađi sva dugmad i dodaj listener
            document.querySelectorAll('.info-btn').forEach(button => {
                button.removeEventListener('click', toggleTooltip);
                button.addEventListener('click', toggleTooltip);
            });

            // Ponovo dodaj zaštitu na tooltipove
            document.querySelectorAll('.tooltip').forEach(tooltip => {
                tooltip.removeEventListener('click', e => e.stopPropagation());
                tooltip.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });
        };

    })();
</script>