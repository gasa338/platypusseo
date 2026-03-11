<?php

/**
 * Get the URL, alt and srcset of an image by its ID.
 *
 * @param int $image_id The ID of the image.
 * @return array An array containing the URL, alt and srcset of the image.
 *     - string 'url' The URL of the image.
 *     - string 'alt' The alt text of the image.
 *     - string 'srcset' The srcset of the image.
 */
function get_image($image_id): array
{
    return [
        'url' => wp_get_attachment_url($image_id),
        'alt' => get_post_meta($image_id, '_wp_attachment_image_alt', TRUE),
        'srcset' => wp_get_attachment_image_srcset($image_id),
    ];
}


/**
 * Renders an SVG image.
 *
 * This function takes an URL or path to an SVG image and returns the SVG content
 * with optional classes and aria-label added.
 *
 * @param string $svg_url The URL or path to the SVG image.
 * @param string $classes Optional. The classes to add to the SVG element.
 * @param string $aria_label Optional. The aria-label attribute for the SVG element.
 * @return string The SVG content with optional classes and aria-label added.
 */
function maxwell_render_svg($svg_url, $classes = '', $aria_label = '')
{
    // Check if the URL is empty
    if (empty($svg_url)) {
        return '';
    }

    // Check if the URL is valid
    if (!filter_var($svg_url, FILTER_VALIDATE_URL)) {
        return '';
    }

    // If the URL is local, convert it to a file path
    $wp_upload_dir = wp_upload_dir();
    $site_url = site_url();

    $file_path = str_replace($site_url, ABSPATH, $svg_url);

    // If the file exists, get its content
    if (file_exists($file_path)) {
        $svg_content = file_get_contents($file_path);
    } else {
        // If it's not a local file, try to get it via wp_remote_get
        $response = wp_remote_get($svg_url);

        if (is_wp_error($response)) {
            return '';
        }

        $svg_content = wp_remote_retrieve_body($response);
    }


    // Check if the content is an SVG
    if (strpos($svg_content, '<svg') === false) {
        return '';
    }

    // Add classes if provided
    if (!empty($classes)) {
        $svg_content = preg_replace(
            '/<svg([^>]*)>/',
            '<svg$1 class="' . esc_attr($classes) . '">',
            $svg_content
        );
    }

    // Add focusable="false" for IE
    $svg_content = str_replace('<svg', '<svg focusable="false"', $svg_content);

    return $svg_content;
}

function _heading($data, $class = '')
{
    // Validacija i osnovne vrednosti
    $text = isset($data['text']) ? $data['text'] : '';
    if (empty($text)) {
        return '';
    }
    $tag = isset($data['tag']) ? $data['tag'] : 'h2';

    // Tailwind klase za align
    $align_classes = [
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right'
    ];

    $align = isset($data['align']) ? $data['align'] : 'left';
    $tailwind_class = isset($align_classes[$align]) ? $align_classes[$align] : 'text-left';

    // Osnovna klasa
    $class = "{$tag}-responsive {$tailwind_class} {$class}";

    // Inline style za custom veličine
    $style = '';

    if (isset($data['use_custom_size']) && $data['use_custom_size']) {
        $styles = [];

        // Desktop veličina (osnovna)
        if (isset($data['size_desktop']) && is_numeric($data['size_desktop'])) {
            $styles[] = "font-size: {$data['size_desktop']}px;";
        }

        if (isset($data['size_tablet']) && is_numeric($data['size_tablet'])) {
            $styles[] = "@media (max-width: 1024px) { font-size: {$data['size_tablet']}px !important; }";
        }

        if (isset($data['size_mobile']) && is_numeric($data['size_mobile'])) {
            $styles[] = "@media (max-width: 768px) { font-size: {$data['size_mobile']}px !important; }";
        }

        if (!empty($styles)) {
            $media_queries = implode(' ', $styles);
            $style = ' style="' . $media_queries . '"';
            return "<{$tag} class=\"{$class}\"{$style}>{$text}</{$tag}>";
        }
    }

    // Kreiranje HTML-a bez custom size
    return "<{$tag} class=\"{$class}\">{$text}</{$tag}>";
}

function _spacing($data)
{
    // Desktop veličina (osnovna)
    if (isset($data['desktop']) && is_numeric($data['desktop'])) {
        $styles[] = "margin-bottom: {$data['desktop']}px;";
    }

    if (isset($data['tablet']) && is_numeric($data['tablet'])) {
        $styles[] = "@media (max-width: 1024px) { margin-bottom: {$data['tablet']}px !important; }";
    }

    if (isset($data['mobile']) && is_numeric($data['mobile'])) {
        $styles[] = "@media (max-width: 768px) { margin-bottom: {$data['mobile']}px !important; }";
    }

    if (!empty($styles)) {
        $media_queries = implode(' ', $styles);
        $style = ' style="' . $media_queries . '"';
        return $style;
    }
    return '';
}

function _padding($data)
{
    // Desktop veličina (osnovna)
    if (isset($data['desktop']) && is_numeric($data['desktop'])) {
        $styles[] = "padding-bottom: {$data['desktop']}px; padding-top: {$data['desktop']}px;";
    }

    if (isset($data['tablet']) && is_numeric($data['tablet'])) {
        $styles[] = "@media (max-width: 1024px) { padding-bottom: {$data['tablet']}px !important; padding-top: {$data['tablet']}px !important; }";
    }

    if (isset($data['mobile']) && is_numeric($data['mobile'])) {
        $styles[] = "@media (max-width: 768px) { padding-bottom: {$data['mobile']}px !important; padding-top: {$data['mobile']}px !important; }";
    }

    if (!empty($styles)) {
        $media_queries = implode(' ', $styles);
        $style = ' style="' . $media_queries . '"';
        return $style;
    }
    return '';
}

/**
 * Postavlja poziciju i širinu naslova
 * @param string $position - 'left' ili 'center'
 * @param string $width - 'small', 'medium' ili 'large'
 * @return string Tailwind klase za pozicioniranje i širinu
 */
function _title_position($position = 'left', $width = 'medium')
{
    // Mapiranje pozicija na Tailwind klase
    $positionClasses = [
        'left' => 'text-left mr-auto',
        'center' => 'md:text-center md:mx-auto flex flex-col items-start md:items-center justify-center'
    ];

    // Mapiranje širina na Tailwind klase
    $widthClasses = [
        'small' => 'max-w-2xl',
        'medium' => 'max-w-3xl',
        'large' => 'max-w-5xl'
    ];

    // Validacija parametara
    $validPositions = ['left', 'center'];
    $validWidths = ['small', 'medium', 'large'];

    if (!in_array($position, $validPositions)) {
        $position = 'left';
    }

    if (!in_array($width, $validWidths)) {
        $width = 'medium';
    }

    // Kombinovanje klasa
    return $positionClasses[$position] . ' ' . $widthClasses[$width];
}

function populate_cf7_forms_in_acf($field)
{
    // Proveri da li je to polje koje želimo da popunimo
    if ($field['name'] === 'choose_form' || $field['_name'] === 'choose_form') {

        // Resetuj choices array
        $field['choices'] = array();

        // Dodaj praznu opciju
        $field['choices'][''] = '— Izaberite formu —';

        // Preuzmi sve CF7 forme
        $forms = get_posts(array(
            'post_type' => 'wpcf7_contact_form',
            'numberposts' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
            'post_status' => 'publish'
        ));

        // Popuni choices sa formama
        foreach ($forms as $form) {
            $field['choices'][$form->ID] = $form->post_title . ' (ID: ' . $form->ID . ')';
        }

        // Opsionalno: dodaj poruku ako nema formi
        if (empty($forms)) {
            $field['choices'][''] = 'Nema dostupnih Contact Form 7 formi';
            $field['disabled'] = true;
        }

        // Opsionalno: postavi defaultnu vrednost
        // $field['default_value'] = '';
    }

    return $field;
}
add_filter('acf/load_field/name=choose_form', 'populate_cf7_forms_in_acf');

function _background($data)
{
    if (empty($data)) {
        return '';
    }

    switch ($data) {
        case 'dark':
            $bg_class = 'bg-surface';
            break;
        case 'light':
            $bg_class = 'bg-card';
            break;
        case 'dark_mode':
            $bg_class = 'bg-hero';
            break;
        default:
            $bg_class = 'bg-card';
            break;
    }

    return $bg_class;
}



function _spacing_full($block_name, $block_id, $data_margin, $data_padding)
{
    $block_class = $block_name . '-' . $block_id;
    $styles = [];

    // DESKTOP
    $desktop = [];

    if (isset($data_margin['desktop']) && is_numeric($data_margin['desktop'])) {
        $desktop[] = "margin-bottom: {$data_margin['desktop']}px;";
    }

    if (isset($data_padding['desktop']) && is_numeric($data_padding['desktop'])) {
        $desktop[] = "padding-top: {$data_padding['desktop']}px;";
        $desktop[] = "padding-bottom: {$data_padding['desktop']}px;";
    }

    if (!empty($desktop)) {
        $styles[] = ".{$block_class} { " . implode(' ', $desktop) . " }";
    }

    // TABLET
    $tablet = [];

    if (isset($data_margin['tablet']) && is_numeric($data_margin['tablet'])) {
        $tablet[] = "margin-bottom: {$data_margin['tablet']}px;";
    }

    if (isset($data_padding['tablet']) && is_numeric($data_padding['tablet'])) {
        $tablet[] = "padding-top: {$data_padding['tablet']}px;";
        $tablet[] = "padding-bottom: {$data_padding['tablet']}px;";
    }

    if (!empty($tablet)) {
        $styles[] = "@media (max-width: 1024px) { .{$block_class} { " . implode(' ', $tablet) . " } }";
    }

    // MOBILE
    $mobile = [];

    if (isset($data_margin['mobile']) && is_numeric($data_margin['mobile'])) {
        $mobile[] = "margin-bottom: {$data_margin['mobile']}px;";
    }

    if (isset($data_padding['mobile']) && is_numeric($data_padding['mobile'])) {
        $mobile[] = "padding-top: {$data_padding['mobile']}px;";
        $mobile[] = "padding-bottom: {$data_padding['mobile']}px;";
    }

    if (!empty($mobile)) {
        $styles[] = "@media (max-width: 768px) { .{$block_class} { " . implode(' ', $mobile) . " } }";
    }

    return '<style>' . implode("\n", $styles) . '</style>';
}


/**
 * Helper function for estimated reading time
 */
function maxwell_estimated_reading_time($post_id)
{
    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // 200 words per minute

    return $reading_time;
}

// add_action('admin_head', 'custom_admin_post_title_style');

function custom_admin_post_title_style()
{
    global $post_type;

    // Proveravamo da li smo na stranici za uređivanje posta (single bloga)
    if ($post_type == 'post') {
        echo '
        <style>
            /**
 * Post Content Styles
 * Prilagođeni CSS za WordPress editor sadržaj
 */
.is-root-container,
.is-desktop-preview,
.is-layout-flow,
.wp-block-post-content-is-layout-flow,
.wp-block-post-content,
.has-global-padding,
.block-editor-block-list__layout {
    max-width: 1200px !important;
    width: 1200px !important;
}

/* Post content wrapper */
.post-content {
    width: 1200px !important;
    word-wrap: break-word;
    line-height: 1.7;
}

/* Headings */
.post-content h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-top: 3rem;
    margin-bottom: 1.5rem;
    color: var(--foreground, #1a1a1a);
}

.post-content h2 {
    font-size: 2rem;
    font-weight: 700;
    margin-top: 2.5rem;
    margin-bottom: 1.25rem;
    color: var(--foreground, #1a1a1a);
}

.post-content h3 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: var(--foreground, #1a1a1a);
}

.post-content h4 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
    color: var(--foreground, #1a1a1a);
}

/* Paragraphs */
.post-content p {
    margin-bottom: 1.5rem;
    color: var(--muted-foreground, #4a4a4a);
    font-size: 1.125rem;
}

/* Lists */
.post-content ul,
.post-content ol {
    margin: 1.5rem 0;
    padding-left: 1.5rem;
    color: var(--muted-foreground, #4a4a4a);
}

.post-content ul {
    list-style-type: disc;
}

.post-content ol {
    list-style-type: decimal;
}

.post-content li {
    margin-bottom: 0.75rem;
    font-size: 1.125rem;
    line-height: 1.6;
}

.post-content li strong,
.post-content li b {
    color: var(--foreground, #1a1a1a);
    font-weight: 600;
}

/* Blockquotes */
.post-content blockquote {
    margin: 2rem 0;
    padding: 1.5rem 2rem;
    border-left: 4px solid var(--primary, #2563eb);
    background-color: var(--section-light, #f3f4f6);
    font-style: italic;
    border-radius: 0 8px 8px 0;
}

.post-content blockquote p {
    margin-bottom: 0.5rem;
    font-size: 1.25rem;
    color: var(--foreground, #1a1a1a);
}

.post-content blockquote cite {
    display: block;
    margin-top: 1rem;
    font-size: 1rem;
    font-style: normal;
    color: var(--muted-foreground, #6b7280);
}

/* Images */
.post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    margin: 2rem 0;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.post-content figure {
    margin: 2rem 0;
}

.post-content figcaption {
    text-align: center;
    font-size: 0.875rem;
    color: var(--muted-foreground, #6b7280);
    margin-top: 0.5rem;
}

/* Links */
.post-content a {
    color: var(--primary, #2563eb);
    text-decoration: underline;
    text-decoration-thickness: 1px;
    text-underline-offset: 2px;
    transition: color 0.2s ease;
}

.post-content a:hover {
    color: var(--primary-dark, #1d4ed8);
    text-decoration-thickness: 2px;
}

/* Tables */
.post-content table {
    width: 100%;
    margin: 2rem 0;
    border-collapse: collapse;
    border: 1px solid var(--border, #e5e7eb);
    border-radius: 8px;
    overflow: hidden;
}

.post-content th {
    background-color: var(--section-light, #f3f4f6);
    padding: 1rem;
    text-align: left;
    font-weight: 600;
    color: var(--foreground, #1a1a1a);
    border-bottom: 2px solid var(--border, #e5e7eb);
}

.post-content td {
    padding: 1rem;
    border-bottom: 1px solid var(--border, #e5e7eb);
    color: var(--muted-foreground, #4a4a4a);
}

.post-content tr:last-child td {
    border-bottom: none;
}

/* Code blocks */
.post-content pre {
    margin: 2rem 0;
    padding: 1.5rem;
    background-color: var(--section-dark, #1f2937);
    border-radius: 8px;
    overflow-x: auto;
    color: #f3f4f6;
    font-size: 0.875rem;
    line-height: 1.6;
}

.post-content code {
    font-size: 0.875rem;
    background-color: var(--section-light, #f3f4f6);
    padding: 0.2rem 0.4rem;
    border-radius: 4px;
    color: var(--primary, #2563eb);
}

.post-content pre code {
    background-color: transparent;
    padding: 0;
    color: inherit;
}

/* WordPress specific classes */
.post-content .wp-block-quote {
    margin: 2rem 0;
    padding: 1.5rem 2rem;
    border-left: 4px solid var(--primary, #2563eb);
    background-color: var(--section-light, #f3f4f6);
}

.post-content .wp-block-pullquote {
    margin: 2rem 0;
    padding: 2rem;
    text-align: center;
    border-top: 2px solid var(--primary, #2563eb);
    border-bottom: 2px solid var(--primary, #2563eb);
    background-color: var(--section-light, #f3f4f6);
}

.post-content .wp-block-pullquote p {
    font-size: 1.5rem;
    font-style: italic;
    color: var(--foreground, #1a1a1a);
}

.post-content .wp-block-button {
    margin: 2rem 0;
}

.post-content .wp-block-button__link {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    background-color: var(--primary, #2563eb);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    transition: background-color 0.2s ease;
}

.post-content .wp-block-button__link:hover {
    background-color: var(--primary-dark, #1d4ed8);
}

/* Separator */
.post-content hr {
    margin: 3rem 0;
    border: none;
    border-top: 1px solid var(--border, #e5e7eb);
}

/* Gallery */
.post-content .wp-block-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
    margin: 2rem 0;
}

.post-content .wp-block-gallery img {
    margin: 0;
    width: 100%;
    height: 200px;
    object-fit: cover;
}

/* Custom classes for lists styling */
.post-content .list-bold {
    list-style: none;
    padding-left: 0;
}

.post-content .list-bold li {
    margin-bottom: 1rem;
}

.post-content .list-bold li strong {
    display: block;
    margin-bottom: 0.25rem;
    color: var(--foreground, #1a1a1a);
}

/* Responsive */
@media (max-width: 768px) {
    .post-content h1 {
        font-size: 2rem;
    }
    
    .post-content h2 {
        font-size: 1.75rem;
    }
    
    .post-content h3 {
        font-size: 1.35rem;
    }
    
    .post-content p,
    .post-content li {
        font-size: 1rem;
    }
    
    .post-content blockquote {
        padding: 1rem 1.5rem;
    }
    
    .post-content blockquote p {
        font-size: 1.125rem;
    }
}
        </style>
        ';
    }
}



function maxwell_related_posts($post_id = null, $posts_per_page = 2) {

    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $categories = wp_get_post_categories($post_id);

    if (empty($categories)) {
        return;
    }

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => $posts_per_page,
        'post__not_in'   => [$post_id],
        'category__in'   => $categories,
        'orderby'        => 'rand'
    ];

    $query = new WP_Query($args);

    if ($query->have_posts()) {

        echo '<div class="related-posts grid grid-cols-1 md:grid-cols-2 gap-8">';

        while ($query->have_posts()) {
            $query->the_post();

            get_template_part('template-parts/content', 'blog_card');
        }

        echo '</div>';
    }

    wp_reset_postdata();
}