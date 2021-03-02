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
$type = get_field('tipo_de_bloque') ?: '';

$bg_image = get_field('imagen_de_fondo') ?: '';
$pre_title = get_field('pre_titulo') ?: '';
$title = get_field('titulo') ?: '';
$content = get_field('contenido') ?: '';
$btn_type = get_field('boton') ?: '';
$link = get_field('link') ?: '';
$form = get_field('formulario_contenido') ?: '';


// echo '<pre>';
// echo var_dump($form);
// echo '</pre>';

?>

<!-- Tabs block -->
<section id="<?php echo esc_attr($id); ?>" class="tabsBlock custom-paddings js-lazy-bg <?php echo $type; ?>" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px;--background-image: url(<?php echo $bg_image["url"]; ?>);" data-src="<?php echo $bg_image["url"]; ?>">
    <?php if ($type === 'center') : ?>
        <div class="container">

            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center tabsBlock__content">
                    <p class="subheading"><?php echo $pre_title; ?></p>
                    <h2 class="heading">
                        <?php echo $title; ?>
                    </h2>
                    <div class="text">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>

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
    <?php else : ?>
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6 tabsBlock__content">
                    <p class="subheading"><?php echo $pre_title; ?></p>
                    <h2 class="heading">
                        <?php echo $title; ?>
                    </h2>
                    <div class="text">
                        <?php echo $content; ?>
                    </div>

                        <?php if ($btn_type === 'link') : ?>

                            <?php if ($link) : ?>

                                <a class="btn-radio btn-purple" href="<?php echo $link["url"]; ?>" target="<?php echo $link["target"]; ?>"><?php echo $link["title"]; ?></a>

                            <?php endif; ?>

                        <?php else: 
                            $form_image = get_field('formulario_contenido')['imagen_formulario']["url"] ?: '';
                        ?>


                            <button class="btn-radio btn-purple js-lightbox">
                                Contactanos
                            </button>

                            <div class="lightbox lightbox--full js-lightbox-box">
                                <div class="lightbox--content js-lazy-bg" style="--background-image: url(<?php echo $form_image; ?>);" data-src="<?php echo $form_image; ?>">

                                    <div class="lightbox--content__text">
                                        <p class="subheading"><?php echo get_field('formulario_contenido')['pre_titulo']?></p>
                                        <h2 class="heading"><?php echo get_field('formulario_contenido')['titulo']?></h2>
                                        <div class="text">
                                            <?php echo get_field('formulario_contenido')['contenido']?>
                                        </div>

                                    </div>

                                    [contact-form-7 id="<?php echo get_field('formulario_contenido')['formulario'][0]; ?>"]
                                </div>
                                <button class="lightbox--content--close js-lightbox-close" aria-label="close lightbox">
                                    <svg viewBox="0 0 612 612">
                                        <path d="M415.338,196.662c-7.535-7.535-19.737-7.535-27.253,0l-82.181,82.18l-81.033-81.032c-7.478-7.478-19.584-7.478-27.042,0
                                            c-7.478,7.478-7.478,19.584,0,27.042l81.033,81.033l-81.587,81.587c-7.535,7.535-7.535,19.736,0,27.253s19.737,7.517,27.253,0
                                            l81.588-81.587l81.032,81.032c7.478,7.478,19.584,7.478,27.043,0c7.478-7.478,7.478-19.584,0-27.043l-81.033-81.032l82.181-82.18
                                            C422.873,216.399,422.873,204.179,415.338,196.662z M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306
                                            c168.988,0,306-137.012,306-306S475.008,0,306,0z M306,573.75C158.125,573.75,38.25,453.875,38.25,306
                                            C38.25,158.125,158.125,38.25,306,38.25c147.875,0,267.75,119.875,267.75,267.75C573.75,453.875,453.875,573.75,306,573.75z"/>
                                    </svg>
                                </button>
                            </div>

                    <?php endif; ?>


                </div>

                <div class="col-12 col-md-6">

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
                                    </div>
                                </div>

                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>


                    </div>

                </div>

            </div>
        </div>
    <?php endif; ?>
</section>