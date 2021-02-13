<?php

/**
 * checks Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'checks_' . $block['id'];
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
$content = get_field('contenido') ?: '';
$layout = get_field('tipo_de_layout') ?: '';


?>



<section id="<?php echo esc_attr($id); ?>" class="services custom-paddings <?php echo esc_attr($className); ?>" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px;">
    <div class="container">

        <div class="row">
            <div class="col-12 services__head">
                <h2 class="heading">
                    <?php echo $title; ?>
                </h2>
                <div class="text">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>

        <div class="row">

            <?php
                if ($layout === 'con_imagen') :
                $image = get_field('imagen') ?: '';
            ?>
                <?php if( have_rows('checks_left') ): ?>
                    <div class="col-12 col-lg-3 services__column js-anim-fadeIn-stagger">
                        <?php while( have_rows('checks_left') ): the_row(); 
                            $heading = get_sub_field('titulo');
                            $content_check = get_sub_field('contenido');
                            $color = get_sub_field('color');
                            $link_title = get_sub_field('link')["title"];
                            $link_url = get_sub_field('link')["url"];
                            $link_target = get_sub_field('link')["target"];
                        ?>
                                <a href="<?php echo $link_url; ?>" class="services__column--item js-anim-fadeIn-stagger-item">
                                    <div class="check-icon" style="background-color: <?php echo $color; ?>;">
                                        <svg viewBox="0 0 426.667 426.667">
                                            <path d="M421.876,56.307c-6.548-6.78-17.352-6.968-24.132-0.42c-0.142,0.137-0.282,0.277-0.42,0.42L119.257,334.375
                                    l-90.334-90.334c-6.78-6.548-17.584-6.36-24.132,0.42c-6.388,6.614-6.388,17.099,0,23.713l102.4,102.4
                                    c6.665,6.663,17.468,6.663,24.132,0L421.456,80.44C428.236,73.891,428.424,63.087,421.876,56.307z" />
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <h3 class="heading"><?php echo $heading; ?></h3>
                                        <div class="text">
                                            <?php echo $content_check; ?>
                                        </div>
                                    </div>
                                </a>
            
                            <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <div class="col-12 col-lg-6 services__image">
                    <figure>
                        <img class="js-lazy-image" data-src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                    </figure>
                </div>
                
                <?php if( have_rows('checks_right') ): ?>
                    <div class="col-12 col-lg-3 services__column js-anim-fadeIn-stagger">
                        <?php while( have_rows('checks_right') ): the_row(); 
                            $heading = get_sub_field('titulo');
                            $content_check = get_sub_field('contenido');
                            $color = get_sub_field('color');
                            $link_title = get_sub_field('link')["title"];
                            $link_url = get_sub_field('link')["url"];
                            $link_target = get_sub_field('link')["target"];
                        ?>
                            <?php
                            /*
                                echo '<pre>';
                                var_dump($image);
                                echo '</pre>';
                            */
                            ?>
                                <a href="<?php echo $link_url; ?>" class="services__column--item js-anim-fadeIn-stagger-item" target="<?php echo $link_target; ?>">
                                    <div class="check-icon" style="background-color: <?php echo $color; ?>;">
                                        <svg viewBox="0 0 426.667 426.667">
                                            <path d="M421.876,56.307c-6.548-6.78-17.352-6.968-24.132-0.42c-0.142,0.137-0.282,0.277-0.42,0.42L119.257,334.375
                                    l-90.334-90.334c-6.78-6.548-17.584-6.36-24.132,0.42c-6.388,6.614-6.388,17.099,0,23.713l102.4,102.4
                                    c6.665,6.663,17.468,6.663,24.132,0L421.456,80.44C428.236,73.891,428.424,63.087,421.876,56.307z" />
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <h3 class="heading"><?php echo $heading; ?></h3>
                                        <div class="text">
                                            <?php echo $content_check; ?>
                                        </div>
                                    </div>
                                </a>
            
                            <?php endwhile; ?>
                    </div>
                <?php endif; ?>



            <?php else:?>
                hola
            <?php endif; ?>

        </div>
    </div>
</section>