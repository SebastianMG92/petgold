<?php

/**
 * Gallery Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'gallery_' . $block['id'];
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
$type = get_field('tipo_galeria') ?: '';

$pre_title = get_field('pre_titulo') ?: '';
$title = get_field('titulo') ?: '';

?>

<!-- Tabs block -->

<section id="<?php echo esc_attr($id); ?>" class="galleryBlock js-gallery custom-paddings" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px;">
    <?php if ($type === 'images') : 
        $gallery = get_field('galeria');
    ?>
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6 galleryBlock__content">
                    <p class="subheading"><?php echo $pre_title; ?></p>
                    <h2 class="heading">
                        <?php echo $title; ?>
                    </h2>
                </div>
                <div class="col-12 col-md-6 galleryBlock__button">
                    <button class="btn btn-radio btn-purple js-gallery-btn">
                        Ver todo
                    </button>
                </div>

            </div>

            <div class="row">
                <div class="col-12 galleryBlock__gallery js-gallery-container js-lightbox-gallery">
                
                    <?php
                    // Check rows exists.
                    if( have_rows('galeria') ):
                        $count = 0;
                        // Loop through rows.
                        while( have_rows('galeria') ) : the_row();
                            // Load sub field value.
                            $image = get_sub_field('imagen');
                            $caption = get_sub_field('caption');
                            $hide = $count > 2 ? 'hidde': '';
                            $lazy = $count > 2 ? '': 'js-lazy-bg';

                        ?>
                            <div class="galleryBlock__gallery--container js-gallery-img <?php echo $hide; ?>">
                                <a href="<?php echo $image["url"]; ?>" class="galleryBlock__gallery--item js-lightbox-gallery-item">
                                    
                                    <div class="image <?php echo $lazy; ?>" style="--background-image: url(<?php echo $image["sizes"]["shop_single"]; ?>);" data-src="<?php echo $image["sizes"]["shop_single"]; ?>"></div>
    
                                    <div class="content">
                                        <svg viewBox="0 0 18.023 19.039">
                                            <path class="a" d="M11.267,12.457,17.5,18.5ZM.75,7.171A6.525,6.525,0,0,1,7.373.75a6.524,6.524,0,0,1,6.622,6.421,6.523,6.523,0,0,1-6.622,6.42A6.524,6.524,0,0,1,.75,7.171Z" transform="translate(0 0)"></path>
                                        </svg>
                                        <p><?php echo $caption; ?></p>
                                    </div>
    
                                </a>
                            </div>

                        <?php $count++; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
    
        </div>
        <?php else : ?>

        instagram
    <?php endif; ?>
</section>