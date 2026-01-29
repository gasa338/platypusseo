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
