<?php

function rockit_get_post_toc($content)
{

    $blocks = parse_blocks($content);

    $toc = [];

    foreach ($blocks as $block) {

        if ($block['blockName'] === 'core/heading') {

            $level = $block['attrs']['level'] ?? 2;

            if ($level > 2) continue;

            $text = wp_strip_all_tags($block['innerHTML']);

            $id = sanitize_title($text);

            $toc[] = [
                'title' => $text,
                'id' => $id,
                'level' => $level
            ];
        }
    }

    return $toc;
}

function rockit_add_heading_anchor($block_content, $block)
{

    if ($block['blockName'] !== 'core/heading') {
        return $block_content;
    }

    $level = $block['attrs']['level'] ?? 2;

    if ($level > 2) return $block_content;

    $text = wp_strip_all_tags($block_content);

    $id = sanitize_title($text);

    $block_content = preg_replace(
        '/<h([2-4])(.*?)>/',
        '<h$1 id="' . $id . '"$2 class="group scroll-mt-32">',
        $block_content
    );

    /* 
        $anchor = '<a href="#' . $id . '" class="ml-2 opacity-0 group-hover:opacity-100 text-gray-400 hover:text-gray-700 transition">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M14.851 11.923c-.179-.641-.521-1.246-1.025-1.749-1.562-1.562-4.095-1.563-5.657 0l-4.998 4.998c-1.562 1.563-1.563 4.095 0 5.657 1.562 1.563 4.096 1.561 5.656 0l3.842-3.841.333.009c.404 0 .802-.04 1.189-.117l-4.657 4.656c-.975.976-2.255 1.464-3.535 1.464-1.28 0-2.56-.488-3.535-1.464-1.952-1.951-1.952-5.12 0-7.071l4.998-4.998c.975-.976 2.256-1.464 3.536-1.464 1.279 0 2.56.488 3.535 1.464.493.493.861 1.063 1.105 1.672l-.787.784zm-5.703.147c.178.643.521 1.25 1.026 1.756 1.562 1.563 4.096 1.561 5.656 0l4.999-4.998c1.563-1.562 1.563-4.095 0-5.657-1.562-1.562-4.095-1.563-5.657 0l-3.841 3.841-.333-.009c-.404 0-.802.04-1.189.117l4.656-4.656c.975-.976 2.256-1.464 3.536-1.464 1.279 0 2.56.488 3.535 1.464 1.951 1.951 1.951 5.119 0 7.071l-4.999 4.998c-.975.976-2.255 1.464-3.535 1.464-1.28 0-2.56-.488-3.535-1.464-.494-.495-.863-1.067-1.107-1.678l.788-.785z"/></svg>
        </a>';

        $block_content = str_replace(
            '</h' . $level . '>',
            $anchor . '</h' . $level . '>',
            $block_content
        );
    */
    return $block_content;
}

add_filter('render_block', 'rockit_add_heading_anchor', 10, 2);

function rockit_render_toc($content)
{

    $toc = rockit_get_post_toc($content);

    if (!$toc) return;
?>

    <nav class="hidden lg:block sticky top-32">

        <h3 class="h3-responsive mb-4 font-semibold">Table of contents</h3>

        <ul class="space-y-2">

            <?php foreach ($toc as $item): ?>
                <?php
                $padding = '';
                if ($item['level'] == 3) $padding = 'pl-3';
                if ($item['level'] == 4) $padding = 'pl-6';
                ?>
                <li class="<?php echo $padding; ?>">
                    <a href="#<?php echo $item['id']; ?>" class="toc-link block transition no-underline">
                        <?php echo $item['title']; ?>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>
    </nav>
<?php
}
