<?php
// Jedan hook za sve (frontend i editor)
add_action('enqueue_block_assets', function () {
    // CSS koji će se učitati i na frontendu i u editoru
    wp_add_inline_style('wp-block-library', '
        .maxwell-element-button {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 0.5rem !important;
            border-radius: 0.5rem !important;
            background-color: #EA603E !important;
            padding: 0.875rem 1.75rem !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            color: #ffffff !important;
            text-decoration: none !important;
            transition: opacity 0.2s !important;
        }

        .wp-block-button__link {
        display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            gap: 0.5rem !important;
            border-radius: 0.5rem !important;
            background-color: #EA603E !important;
            padding: 0.875rem 1.75rem !important;
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            color: #ffffff !important;
            text-decoration: none !important;
            transition: opacity 0.2s !important;
        }
            
        
        .wp-block-button {        
            border-radius: 0.5rem !important;
            background: #EA603E !important;
        }
        
        .wp-block-buttons {
            display: inline-flex !important;
            flex-wrap: wrap !important;
            gap: 0.5rem !important;
            align-items: center !important;
        }

        
        /* Preview stilova u editoru */
        .wp-block-paragraph {
            font-size: 16px !important;
            line-height: 1.5 !important;
            color: #666 !important;
            margin-bottom: 12px;
        }
    ');
});

// Vaš postojeći kod za modifikaciju HTML-a
add_filter('render_block', function ($block_content, $block) {
    if ($block['blockName'] === 'core/button') {
        $search = 'wp-block-button__link wp-element-button';
        $replace = 'maxwell-element-button inline-flex items-center justify-center gap-2 rounded-lg !bg-accent px-7 py-3.5 text-sm font-semibold text-accent-foreground hover:opacity-90 transition-opacity shadow-lg shadow-accent/20 no-underline';
        $block_content = str_replace($search, $replace, $block_content);
    }

    if ($block['blockName'] === 'core/buttons') {
        $search = 'wp-block-buttons is-layout-flex';
        $replace = 'wp-block-buttons is-layout-flex inline-flex flex-wrap gap-2 mb-4';
        $block_content = str_replace($search, $replace, $block_content);
    }

    return $block_content;
}, 10, 2);
