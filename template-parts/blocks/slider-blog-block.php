<?php

/**
 * Blog slider Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'blog_slide_' . $block['id'];
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
$posts = get_field('post_a_mostrar') ?: '';

$title = get_field('titulo') ?: '';
$autoplay = get_field('autoplay') ?: '';
?>


<!-- Product slider -->
<section id="<?php echo esc_attr($id); ?>" class="blogLates custom-paddings" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px">

    <div class="container">

        <div class="row">
            <div class="col-12 services__head">
                <h2 class="heading">
                    <?php echo $title; ?>
                </h2>
            </div>
        </div>

        <div class="row">


            <!-- Slider main container -->
            <div class="swiper-container js-slide-large" data-delay="<?php echo $autoplay; ?>">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->

                    <?php if( $posts ): ?>
                        <?php foreach( $posts as $post ): 
                            $permalink = get_permalink( $post->ID );
                            $title = get_the_title( $post->ID );

                            $thumbnail_id = get_post_thumbnail_id( $post->ID );
                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                        ?>

                            
                            <div class="swiper-slide">
                                <div class="blogLates__item">
                                    <a href="<?php echo $permalink; ?>" class="blogLates__item--image">
                                        <img class="swiper-lazy" data-src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt="<?php echo $alt; ?>">
                                        <div class="swiper-lazy-preloader"></div>
                                        <div class="blogLates__item--date">

                                            <span class="date"><?php echo get_the_date( "j", $post->ID); ?></span>
                                            <span class="month">
                                                <?php echo get_the_date( "M", $post->ID); ?>
                                            </span>
                                        </div>
                                    </a>
                                    <div class="blogLates__item--data">

                                        <?php $author = get_the_author($post->ID); ?>
                                        <span class="autor">
                                            <svg viewBox="0 0 512 512">
                                                <path d="M256,288.389c-153.837,0-238.56,72.776-238.56,204.925c0,10.321,8.365,18.686,18.686,18.686h439.747
                                                    c10.321,0,18.686-8.365,18.686-18.686C494.56,361.172,409.837,288.389,256,288.389z M55.492,474.628
                                                    c7.35-98.806,74.713-148.866,200.508-148.866s193.159,50.06,200.515,148.866H55.492z" />
                                                                    <path d="M256,0c-70.665,0-123.951,54.358-123.951,126.437c0,74.19,55.604,134.54,123.951,134.54s123.951-60.35,123.951-134.534
                                                    C379.951,54.358,326.665,0,256,0z M256,223.611c-47.743,0-86.579-43.589-86.579-97.168c0-51.611,36.413-89.071,86.579-89.071
                                                    c49.363,0,86.579,38.288,86.579,89.071C342.579,180.022,303.743,223.611,256,223.611z" />
                                            </svg>
                                            By <?php echo $author; ?>
                                        </span>

                                        <span class="comments">
                                            <svg viewBox="0 -39 512 512">
                                                <path d="m492.328125 433.679688c-4.574219 0-9.070313-1.605469-12.671875-4.648438l-109.15625-78.855469h-351.746094c-10.339844 0-18.753906-8.414062-18.753906-18.753906v-312.667969c0-10.339844 8.414062-18.753906 18.753906-18.753906h474.492188c10.339844 0 18.753906 8.414062 18.753906 18.753906v395.257813c0 7.957031-4.746094 15.078125-12.089844 18.140625-2.457031 1.027344-5.03125 1.527344-7.582031 1.527344zm-106.09375-109.148438 95.765625 69.183594v-363.714844h-452v290.175781h344.210938c4.445312 0 8.65625 1.535157 12.023437 4.355469zm0 0" />
                                                <path d="m420.742188 100.351562h-329.738282c-8.285156 0-15-6.714843-15-15 0-8.285156 6.714844-15 15-15h329.738282c8.285156 0 15 6.714844 15 15 0 8.285157-6.714844 15-15 15zm0 0" />
                                                <path d="m420.742188 160.351562h-329.738282c-8.285156 0-15-6.714843-15-15 0-8.285156 6.714844-15 15-15h329.738282c8.285156 0 15 6.714844 15 15 0 8.285157-6.714844 15-15 15zm0 0" />
                                                <path d="m420.726562 220.351562h-329.742187c-8.28125 0-15-6.714843-15-15 0-8.285156 6.71875-15 15-15h329.742187c8.28125 0 15 6.714844 15 15 0 8.285157-6.71875 15-15 15zm0 0" />
                                                <path d="m176.3125 280.351562h-84.308594c-8.28125 0-15-6.714843-15-15 0-8.285156 6.71875-15 15-15h84.308594c8.28125 0 15 6.714844 15 15 0 8.285157-6.71875 15-15 15zm0 0" />
                                            </svg>
                                            2
                                        </span>

                                        <?php $cat = get_the_category($post->ID); ?>
                                        <a class="category" href="<?php echo get_category_link( $cat[0]->term_id )?>">
                                            <svg viewBox="0 0 512 512">

                                                <path d="M176.792,0H59.208C26.561,0,0,26.561,0,59.208v117.584C0,209.439,26.561,236,59.208,236h117.584
                                                        C209.439,236,236,209.439,236,176.792V59.208C236,26.561,209.439,0,176.792,0z M196,176.792c0,10.591-8.617,19.208-19.208,19.208
                                                        H59.208C48.617,196,40,187.383,40,176.792V59.208C40,48.617,48.617,40,59.208,40h117.584C187.383,40,196,48.617,196,59.208
                                                        V176.792z" />


                                                <path d="M452,0H336c-33.084,0-60,26.916-60,60v116c0,33.084,26.916,60,60,60h116c33.084,0,60-26.916,60-60V60
                                                    C512,26.916,485.084,0,452,0z M472,176c0,11.028-8.972,20-20,20H336c-11.028,0-20-8.972-20-20V60c0-11.028,8.972-20,20-20h116
                                                    c11.028,0,20,8.972,20,20V176z" />


                                                <path d="M176.792,276H59.208C26.561,276,0,302.561,0,335.208v117.584C0,485.439,26.561,512,59.208,512h117.584
                                                        C209.439,512,236,485.439,236,452.792V335.208C236,302.561,209.439,276,176.792,276z M196,452.792
                                                        c0,10.591-8.617,19.208-19.208,19.208H59.208C48.617,472,40,463.383,40,452.792V335.208C40,324.617,48.617,316,59.208,316h117.584
                                                        c10.591,0,19.208,8.617,19.208,19.208V452.792z" />


                                                <path d="M452,276H336c-33.084,0-60,26.916-60,60v116c0,33.084,26.916,60,60,60h116c33.084,0,60-26.916,60-60V336
                                                        C512,302.916,485.084,276,452,276z M472,452c0,11.028-8.972,20-20,20H336c-11.028,0-20-8.972-20-20V336c0-11.028,8.972-20,20-20
                                                        h116c11.028,0,20,8.972,20,20V452z" />


                                            </svg>
                                            <?php echo $cat[0]->cat_name; ?>
                                        </a>
                                    </div>
                                    <div class="blogLates__item--content">
                                        <h3 class="heading">
                                            <?php echo $title; ?>
                                        </h3>
                                        <?php
                                            $excerpt = get_the_excerpt($post->ID);
                                            
                                            $excerpt = substr($excerpt, 0, 150);
                                            $result = substr($excerpt, 0, strrpos($excerpt, ' '));
                                        ?>
                                        <div class="text">
                                            <?php echo $result; ?>
                                        </div>
                                        <a href="<?php echo $permalink; ?>" class="btn-arrow btn-purple">
                                            Ver más
                                            <svg viewBox="0 0 512 512">
                                                <path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068
                                                    c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557
                                                    l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104
                                                    c0.006-0.006,0.011-0.013,0.018-0.019C513.968,262.339,513.943,249.635,506.134,241.843z"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

    </div>

</section>