<?php

/**
 * Map Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'map_' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Custom paddings for blocks
if (get_field('desktop')['espaciado_superior']) {
    $pt_desktop = get_field('desktop')['espaciado_superior'];
} else {
    $pt_desktop = '0';
}
if (get_field('desktop')['espaciado_inferior']) {
    $pb_desktop = get_field('desktop')['espaciado_inferior'];
} else {
    $pb_desktop = '0';
}

if (get_field('mobile')['espaciado_superior']) {
    $pt_mobile = get_field('mobile')['espaciado_superior'];
} else {
    $pt_mobile = '0';
}
if (get_field('mobile')['espaciado_inferior']) {
    $pb_mobile = get_field('mobile')['espaciado_inferior'];
} else {
    $pb_mobile = '0';
}



// Load values and assign defaults.
$map = get_field('iframe') ?: '';
// $content = get_field('contenido') ?: '';
// $contactForm = get_field('formulario')[0];

?>

<section id="<?php echo esc_attr($id); ?>" class="mapBlock custom-paddings <?php echo esc_attr($className); ?>" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px;">
    <svg class="mapBlock__top" viewBox="0 0 1440.06 64.28"><path d="M1440.06,28.1l-60,14.06c-60,14.06-162,24.11-282,21.78-120-2.5-250-49-370-53.8s-254,36.13-376.15,38C232.5,59,0,0,0,0H1440.06Z" transform="translate(0 0)"/></svg>
    <?php echo $map; ?>

    <svg class="mapBlock__bottom" viewBox="0 0 1440 64.3"><path d="M.59,46.13l60-14.06c60-14.06,162-24.11,282-21.78,120,2.5,250,49,370,53.8s254-36.13,376.15-38c119.41-10.81,351.91,48.14,351.91,48.14H.59Z" transform="translate(-0.59 -9.95)"></path></svg>

</section>