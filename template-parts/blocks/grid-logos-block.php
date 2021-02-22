<?php

/**
 * Grid Logos Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'grid_logos_' . $block['id'];
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
$pretitle = get_field('pre_titulo') ?: '';
$title = get_field('titulo') ?: '';
$content = get_field('texto') ?: '';
$grid_size = get_field('columnas') ?: '';


?>



<section id="<?php echo esc_attr($id); ?>" class="gridLogos custom-paddings <?php echo esc_attr($className); ?>" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px;">
    
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 gridLogos__head text-center">
                <?php if ($pretitle): ?>
                    <p class="subheading"><?php echo $pretitle; ?></p>
                <?php endif; ?>
                <?php if ($title): ?>
                    <h2 class="heading"><?php echo $title; ?></h2>
                <?php endif; ?>
                <?php if ($content): ?>
                    <div class="text">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
            </div>


            <div class="col-12 gridLogos__container">
            
                <?php if( have_rows('logos') ): ?>
                        <?php while( have_rows('logos') ): the_row(); 
                            $logo = get_sub_field('logo');
                            $link_title = get_sub_field('link')["title"];
                            $link_url = get_sub_field('link')["url"];
                            $link_target = get_sub_field('link')["target"];
                        ?>
                            <a href="<?php echo $link_url; ?>" class="gridLogos__container--item grid-<?php echo $grid_size; ?>">
                                <figure class="gridLogos__container--image">
                                    <div class="js-preloader"></div>
                                    <img class="js-lazy-image" data-src="<?php echo $logo["sizes"]["thumbnail"]; ?>" alt="<?php echo $logo["alt"]; ?>">
                                </figure>
                            </a>
                        <?php endwhile; ?>
                <?php endif; ?>
            
            </div>
        </div>
    </div>
</section>