<?php

/**
 * Icons Columns Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'icons_columns_' . $block['id'];
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
$columns = count(get_field('items')) ?: '';
?>

<section id="<?php echo esc_attr($id); ?>" class="iconsColumns custom-paddings" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px;">

    <div class="container">
        <div class="row">

            <?php if( have_rows('items') ): ?>
                <?php while( have_rows('items') ): the_row(); 
                    $icon = get_sub_field('icono');
                    $heading = get_sub_field('titulo');
                    $content =get_sub_field('texto');
                ?>
                <div class="col-12 col-md-<?php echo $columns + 1; ?> iconsColumns__item">

                    <figure class="iconsColumns__item--icon">
                        <img src="<?php echo $icon["sizes"]["thumbnail"]; ?>" alt="<?php echo $icon["alt"]; ?>">
                    </figure>
                    <h2 class="heading"><?php echo $heading; ?></h2>
                    <div class="text">
                        <?php echo $content; ?>
                    </div>

                </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>

</section>