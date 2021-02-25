<?php

/**
 * Contact Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact_' . $block['id'];
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
$contactForm = get_field('formulario')[0];

?>

<section id="<?php echo esc_attr($id); ?>" class="contact custom-paddings <?php echo esc_attr($className); ?>" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px;">
    <div class="container">
        <div class="row">
            <div class="col-12 contact__head">
                <h2 class="heading"><?php echo $title; ?></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 contact__info">

                <div class="text">
                    <?php echo $content; ?>
                </div>


                <ul class="contact__info--list">
                    <!-- Address -->
                    <?php if ( get_field('datos_de_contacto', 'options')['direccion']['direccion_completa'] ): ?>
                    <li>
                        <a href="<?php echo get_field('datos_de_contacto', 'options')['direccion']['url_del_mapa']; ?>" target="_blank">
                            <div class="icon">
                                <svg viewBox="0 0 512 512">
                                <path d="M256,0C148.477,0,61,87.477,61,195c0,69.412,21.115,97.248,122.581,231.01C201.194,449.229,221.158,475.546,244,506
                                    c2.833,3.777,7.279,6,12.001,6c4.722,0,9.167-2.224,12-6.002c22.708-30.29,42.585-56.507,60.123-79.638
                                    C429.834,292.209,451,264.292,451,195C451,87.477,363.523,0,256,0z M304.219,408.235c-14.404,18.998-30.383,40.074-48.222,63.789
                                    c-17.961-23.867-34.031-45.052-48.515-64.146C108.784,277.766,91,254.321,91,195c0-90.981,74.019-165,165-165s165,74.019,165,165
                                    C421,254.205,403.17,277.722,304.219,408.235z"/>
                                <path d="M256,90c-57.897,0-105,47.103-105,105c0,57.897,47.103,105,105,105c57.897,0,105-47.103,105-105
                                    C361,137.103,313.897,90,256,90z M256,270c-41.355,0-75-33.645-75-75s33.645-75,75-75c41.355,0,75,33.645,75,75
                                    S297.355,270,256,270z"/>
                                </svg>
                            </div>
                            <div class="content">
                                <h6 class="heading">Dirección</h6>
                                <?php echo get_field('datos_de_contacto', 'options')['direccion']['direccion_completa']; ?>
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>
                    <!-- Phone number -->
                    <?php if ( get_field('datos_de_contacto', 'options')['numero_de_telefono'] ): ?>
                    <li>
                        <a href="tel:<?php echo get_field('datos_de_contacto', 'options')['numero_de_telefono']; ?>" target="_blank">
                            <div class="icon">
                                <svg viewBox="0 0 405.333 405.333">
                                <path d="M373.333,266.88c-25.003,0-49.493-3.904-72.725-11.584c-11.328-3.904-24.171-0.896-31.637,6.699l-46.016,34.752
                                    c-52.779-28.16-86.571-61.931-114.389-114.368l33.813-44.928c8.512-8.533,11.563-20.971,7.915-32.64
                                    C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32
                                    c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z
                                    M384,373.333c0,5.888-4.8,10.667-10.667,10.667c-194.091,0-352-157.909-352-352c0-5.888,4.8-10.667,10.667-10.667h74.667
                                    c5.867,0,10.667,4.779,10.667,10.667c0,27.243,4.267,53.995,12.629,79.36c1.237,3.989,0.235,8.107-3.669,12.16l-38.827,51.413
                                    c-2.453,3.264-2.837,7.637-0.981,11.264c31.637,62.144,70.059,100.587,132.651,132.651c3.605,1.877,8.021,1.493,11.285-0.981
                                    l52.523-39.808c2.859-2.816,7.061-3.797,10.859-2.539c25.515,8.427,52.267,12.693,79.531,12.693
                                    c5.867,0,10.667,4.779,10.667,10.667V373.333z"/>
                                </svg>
                            </div>
                            <div class="content">
                                <h6 class="heading">Teléfono</h6>
                                <?php echo get_field('datos_de_contacto', 'options')['numero_de_telefono']; ?>
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- Whatsapp -->
                    <?php if ( get_field('datos_de_contacto', 'options')['whatsapp'] ): ?>
                    <li>
                        <a href="https://wa.me/57<?php echo str_replace(' ', '', get_field('datos_de_contacto', 'options')['whatsapp']); ?>" target="_blank">
                            <div class="icon">
                                <svg viewBox="0 0 30.667 30.667">
                                                    <path d="M30.667,14.939c0,8.25-6.74,14.938-15.056,14.938c-2.639,0-5.118-0.675-7.276-1.857L0,30.667l2.717-8.017
                                                        c-1.37-2.25-2.159-4.892-2.159-7.712C0.559,6.688,7.297,0,15.613,0C23.928,0.002,30.667,6.689,30.667,14.939z M15.61,2.382
                                                        c-6.979,0-12.656,5.634-12.656,12.56c0,2.748,0.896,5.292,2.411,7.362l-1.58,4.663l4.862-1.545c2,1.312,4.393,2.076,6.963,2.076
                                                        c6.979,0,12.658-5.633,12.658-12.559C28.27,8.016,22.59,2.382,15.61,2.382z M23.214,18.38c-0.094-0.151-0.34-0.243-0.708-0.427
                                                        c-0.367-0.184-2.184-1.069-2.521-1.189c-0.34-0.123-0.586-0.185-0.832,0.182c-0.243,0.367-0.951,1.191-1.168,1.437
                                                        c-0.215,0.245-0.43,0.276-0.799,0.095c-0.369-0.186-1.559-0.57-2.969-1.817c-1.097-0.972-1.838-2.169-2.052-2.536
                                                        c-0.217-0.366-0.022-0.564,0.161-0.746c0.165-0.165,0.369-0.428,0.554-0.643c0.185-0.213,0.246-0.364,0.369-0.609
                                                        c0.121-0.245,0.06-0.458-0.031-0.643c-0.092-0.184-0.829-1.984-1.138-2.717c-0.307-0.732-0.614-0.611-0.83-0.611
                                                        c-0.215,0-0.461-0.03-0.707-0.03S9.897,8.215,9.56,8.582s-1.291,1.252-1.291,3.054c0,1.804,1.321,3.543,1.506,3.787
                                                        c0.186,0.243,2.554,4.062,6.305,5.528c3.753,1.465,3.753,0.976,4.429,0.914c0.678-0.062,2.184-0.885,2.49-1.739
                                                        C23.307,19.268,23.307,18.533,23.214,18.38z" />
                                </svg>
                            </div>  
                            <div class="content">
                                <h6 class="heading">Whatsapp</h6>
                                <?php echo get_field('datos_de_contacto', 'options')['whatsapp']; ?>
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- Hours open -->
                    <?php if ( get_field('datos_de_contacto', 'options')['horario'] ): ?>
                    <li>
                        <div class="icon">
                            <svg viewBox="0 0 405.333 405.333">
                                <path d="M373.333,266.88c-25.003,0-49.493-3.904-72.725-11.584c-11.328-3.904-24.171-0.896-31.637,6.699l-46.016,34.752
                                    c-52.779-28.16-86.571-61.931-114.389-114.368l33.813-44.928c8.512-8.533,11.563-20.971,7.915-32.64
                                    C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32
                                    c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z
                                    M384,373.333c0,5.888-4.8,10.667-10.667,10.667c-194.091,0-352-157.909-352-352c0-5.888,4.8-10.667,10.667-10.667h74.667
                                    c5.867,0,10.667,4.779,10.667,10.667c0,27.243,4.267,53.995,12.629,79.36c1.237,3.989,0.235,8.107-3.669,12.16l-38.827,51.413
                                    c-2.453,3.264-2.837,7.637-0.981,11.264c31.637,62.144,70.059,100.587,132.651,132.651c3.605,1.877,8.021,1.493,11.285-0.981
                                    l52.523-39.808c2.859-2.816,7.061-3.797,10.859-2.539c25.515,8.427,52.267,12.693,79.531,12.693
                                    c5.867,0,10.667,4.779,10.667,10.667V373.333z"/>
                            </svg>
                        </div>
                        <div class="content">
                            <h6 class="heading">Horario</h6>
                            <?php echo get_field('datos_de_contacto', 'options')['horario']; ?>
                        </div>
                    </li>
                    <?php endif; ?>  
                </ul>

            </div>
        
            <div class="col-12 col-md-6 contact__form">
                <div class="contact__form--container">
                    [contact-form-7 id="<?php echo $contactForm; ?>"]
                </div>
            </div>
        </div>
    </div>
</section>