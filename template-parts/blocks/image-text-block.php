<?php

/**
 * Image Text Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'imageText_' . $block['id'];
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
$title = get_field('titulo') ?: '';
$pre_title = get_field('pre_titulo') ?: '';
$content = get_field('descripcion') ?: '';
$link = get_field('link') ?: '';
$image = get_field('imagen') ?: '';
$position = get_field('alineacion') ?: '';
?>

<section id="<?php echo esc_attr($id); ?>" class="imageText custom-paddings js-anim-parallax <?php echo esc_attr($className); ?> <?php echo $position; ?>" style="--pt-desktop:50px;--pb-desktop:50px; --pt-mobile:50px; --pb-mobile:0px">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-md-6 imageText__bg">
                <figure class="imageText__bg--img js-anim-parallax-item" data-depth=".2" >
                    <div class="js-preloader"></div>
                    <img class="js-lazy-image" data-src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                </figure>
            </div>

            <div class="col-12 col-md-6 imageText__content">
                <div class="imageText__content--info">
                    <p class="subheading"><?php echo $pre_title; ?></p>
                    <h2 class="heading"><?php echo $title; ?></h2>
                    <div class="text">
                        <?php echo $content; ?>
                    </div>
                    <?php if ($link) : ?>
                        <a class="btn-radio btn-purple" href="<?php echo $link["url"]; ?>" target="<?php echo $link["target"]; ?>"><?php echo $link["title"]; ?></a>
                    <?php endif; ?>
                        
                </div>
            </div>

        </div>
    </div>
</section>