<?php

/**
 * Hero Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero_slide_' . $block['id'];
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
$direction = get_field('contenido')['direccion'] ?: 'left';
$image = get_field('imagen')['imagen_de_fondo']["sizes"]["hero"] ?: '';
$sub_title = get_field('contenido')['sub_titulo'] ?: '';
$title = get_field('contenido')['titulo'] ?: '';
$text = get_field('contenido')['texto'] ?: '';
$type_btn = get_field('contenido')['tipo_de_boton'] ?: '';

// $position = get_field('posicion') ?: '';
?>


<section id="<?php echo esc_attr($id); ?>" class="hero custom-paddings js-lazy-bg <?php echo $direction; ?>" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px; --background-image: url(<?php echo $image; ?>);" data-src="<?php echo $image; ?>">

<?php /*
    echo '<pre>';
    var_dump($image);
    echo '</pre>';
    */
?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 align-self-center hero__content">

                <p class="subheading"><?php echo $sub_title; ?></p>
                <h2 class="heading"><?php echo $title; ?></h2>
                <div class="text">
                    <?php echo $text; ?>
                </div>

                <?php if ($type_btn === 'link') : ?>
                    <?php $link = get_field('contenido')['link']; ?>
                    <a href="<?php echo $link["url"]; ?>" class="btn-radio btn-purple" target="<?php echo $link["target"]; ?>">
                        <?php echo $link["title"]; ?>
                    </a>
                <?php else: ?>
                    lightbox
                <?php endif ?>

            </div>
        </div>
    </div>
    
    <div class="hero__wave">
        <svg viewBox="0 0 1440 192">
        <path class="st0" d="M0,128l60-32C120,64,240,0,360,5.3C480,11,600,85,720,96s240-43,360-53.3C1200,32,1320,64,1380,80l60,16v96h-60
            c-60,0-180,0-300,0s-240,0-360,0s-240,0-360,0s-240,0-300,0H0V128z"/>
        </svg>
    </div>
</section>
