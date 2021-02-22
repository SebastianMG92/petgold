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
$id = 'hero_' . $block['id'];
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
                <?php
                    // echo '<pre>';
                    // var_dump($image);
                    // echo '<pre>';
                ?>
                <div class="swiper-slide sliderHero__swiper--item">
                    
                    <a href="<?php echo $link_url; ?>" class="sliderHero__image" style="--custom-opacity: rgba(0,0,0,<?php echo $opacity; ?>)">
                        <img class="swiper-lazy" data-src="<?php echo $image["sizes"]["slider"]; ?>" alt="<?php echo $image["alt"]; ?>">
                        <div class="swiper-lazy-preloader"></div>
                    </a>
                    <div class="sliderHero__container">
                        <?php if ($pre_heading) : ?>
                            <p class="subheading js-header-slide-anim"><?php echo $pre_heading; ?></p>
                        <?php endif; ?>

                        <?php if ($heading) : ?>
                            <h2 class="heading js-header-slide-anim"><?php echo $heading; ?></h2>
                        <?php endif; ?>

                        <?php if ($link_url && $link_title) : ?>
                            <a href="<?php echo $link_url; ?>" class="btn-radio btn-purple js-header-slide-anim" target="<?php echo $link_target; ?>">
                                <?php echo $link_title; ?>
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
    <svg class="sliderHero__wave" viewBox="0 0 1440 64.3"><path d="M.59,46.13l60-14.06c60-14.06,162-24.11,282-21.78,120,2.5,250,49,370,53.8s254-36.13,376.15-38c119.41-10.81,351.91,48.14,351.91,48.14H.59Z" transform="translate(-0.59 -9.95)"/></svg>
</section>