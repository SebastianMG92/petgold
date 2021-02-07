<?php

/**
 * Cards Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cards_' . $block['id'];
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
$image = get_field('background__image') ?: '';
$title = get_field('titulo') ?: '';
$content = get_field('contenido') ?: '';
?>



<section id="<?php echo esc_attr($id); ?>" class="categoryCards custom-paddings js-lazy-bg <?php echo esc_attr($className); ?>" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px; --background-image: url(<?php echo $image["url"]; ?>);" data-src="<?php echo $image["url"]; ?>">
    <div class="container">

        <div class="row">
            <div class="col-12 categoryCards__heading">
                <h2 class="heading"><?php echo $title; ?></h2>
                <?php if($content):?>
                    <div class="text">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row justify-content-center js-anim-fadeIn-stagger">

            <?php if( have_rows('cards') ): ?>
                <?php while( have_rows('cards') ): the_row(); 
                    $image_card = get_sub_field('image');
                    $icon = get_sub_field('icono_image');
                    $color = get_sub_field('color_fondo');
                    $heading = get_sub_field('titulo');
                    $content_card =get_sub_field('content');
                    $link_title = get_sub_field('link')["title"];
                    $link_url = get_sub_field('link')["url"];
                    $link_target = get_sub_field('link')["target"];
                ?>
                    <div class="col-12 col-md-6 col-lg-3 js-anim-fadeIn-stagger-item">
                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>" class="categoryCards__card">
                            <figure class="categoryCards__card--image">
                                <div class="swiper-lazy-preloader"></div>
                                <img class="js-lazy-image" data-src="<?php echo $image_card["sizes"]["medium"]; ?>" alt="<?php echo $image_card["alt"]; ?>">
                                <svg viewBox="0 0 1440 192" fill="<?php echo $color; ?>">
                                    <path d="M0,0c0,0,192.7,149.5,720,169.2c424.3,15.8,720-59.9,720-59.9V192h-60c-60,0-180,0-300,0s-240,0-360,0s-240,0-360,0
                                            s-240,0-300,0H0V0z" />
                                </svg>
                            </figure>
                            <div class="categoryCards__card--content" style="background-color: <?php echo $color; ?>;">
                                <div>
                                    <figure class="icon">
                                        <img src="<?php echo $icon["sizes"]["icon"]; ?>" alt="<?php echo $icon["alt"]; ?>">
                                    </figure>
                                    <h3 class="heading">
                                        <?php echo $heading; ?>
                                    </h3>
                                    <div class="text">
                                        <?php echo $content_card; ?>
                                    </div>
                                </div>
                                <span class="btn-arrow btn-white" >
                                    <?php echo $link_title; ?>
                                    <svg viewBox="0 0 512 512">
                                        <path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068
                                                    c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557
                                                    l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104
                                                    c0.006-0.006,0.011-0.013,0.018-0.019C513.968,262.339,513.943,249.635,506.134,241.843z" />
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>

    </div>
</section>