<?php

/**
 * Hero slide Template.
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
$autoplay = get_field('tiempo') ?: '';
$position = get_field('posicion') ?: '';
?>


<!-- Slider hero -->
<section id="<?php echo esc_attr($id); ?>" class="sliderHero custom-paddings <?php echo esc_attr($className); ?> <?php echo $position; ?>" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px">
    <!-- Slider main container -->
    <div class="swiper-container sliderHero__swiper js-header-slide" data-autoplay="<?php echo $autoplay; ?>">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">

            <?php if( have_rows('slides') ): ?>
                <?php while( have_rows('slides') ): the_row(); 

                    $image = get_sub_field('bg_imagen');
                    $pre_heading = get_sub_field('pre_titulo');
                    $heading = get_sub_field('titulo');
                    $link_title = get_sub_field('link')["title"];
                    $link_url = get_sub_field('link')["url"];
                    $link_target = get_sub_field('link')["target"];
                    $opacity = get_sub_field('overlay_opacidad');
                
                ?>
                <div class="swiper-slide sliderHero__swiper--item" style="background-image: url( <?php echo $image["sizes"]["2048x2048"]; ?> );--custom-opacity: rgba(0,0,0,<?php echo $opacity; ?>)">
                    <div class="sliderHero__container">
                        <?php if ($pre_heading) : ?>
                            <p class="subheading js-header-slide-anim"><?php echo $pre_heading; ?></p>
                        <?php endif; ?>

                        <?php if ($heading) : ?>
                            <h2 class="heading js-header-slide-anim"><?php echo $heading; ?></h2>
                        <?php endif; ?>

                        <?php if ($link_url) : ?>
                            <a href="<?php echo $link_url; ?>" class="btn-bone js-header-slide-anim" target="<?php echo $link_target; ?>">
                                <span class="text">
                                    <?php echo $link_title; ?>
                                </span>
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev sliderHero__swiper--prev"></div>
        <div class="swiper-button-next sliderHero__swiper--next"></div>
    </div>

    <div class="sliderHero__wave">
        <svg viewBox="0 0 1440 192">
            <path class="st0" d="M0,128l60-32C120,64,240,0,360,5.3C480,11,600,85,720,96s240-43,360-53.3C1200,32,1320,64,1380,80l60,16v96h-60
              c-60,0-180,0-300,0s-240,0-360,0s-240,0-360,0s-240,0-300,0H0V128z" />
        </svg>
    </div>
</section>