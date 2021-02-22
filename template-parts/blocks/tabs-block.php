<?php

/**
 * Tabs Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'tabs_' . $block['id'];
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
// $image = get_field('background__image') ?: '';
// $title = get_field('titulo') ?: '';
// $content = get_field('contenido') ?: '';
?>

<!-- Tabs block -->
<section id="<?php echo esc_attr($id); ?>" class="tabsBlock custom-paddings" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px;">

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">

                <div class="tabsBlock__container js-accordion">


                <?php if( have_rows('tabs') ): ?>
                    <?php while( have_rows('tabs') ): the_row(); 
                        $icon = get_sub_field('icon');
                        $color = get_sub_field('icon_color');
                        $heading = get_sub_field('titulo');
                        $content =get_sub_field('content');
                        $link_title = get_sub_field('link')["title"];
                        $link_url = get_sub_field('link')["url"];
                        $link_target = get_sub_field('link')["target"];
                    ?>

                        <div class="tabsBlock__container--item">

                            <button class="tabsBlock__container--button">
                                <figure class="check-icon" style="background-color: <?php echo $color; ?>;">
                                    <img src="<?php echo $icon["sizes"]["icon"]; ?>" alt="">
                                </figure>
                                <?php echo $heading; ?>
                            </button>
                            <div class="tabsBlock__container--panel">

                                <div class="text">
                                    <?php echo $content; ?>
                                    <a href="<?php echo $link_url; ?>" class="btn-radio btn-purple" target="<?php echo $link_target; ?>">
                                        <?php echo $link_title; ?>
                                    </a>
                                </div>
                            </div>

                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>


                </div>

            </div>
        </div>
    </div>

</section>