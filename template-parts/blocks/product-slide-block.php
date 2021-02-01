<?php

/**
 * Product slide Template.
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
$dog_products = get_field('elije_productos_perro') ?: '';
$cat_products = get_field('elije_productos_gato') ?: '';

$title = get_field('titulo') ?: '';
$content = get_field('descripcion') ?: '';
$image = get_field('imagen') ?: '';
$position = get_field('alineacion') ?: '';
?>


<!-- Product slider -->
<section id="<?php echo esc_attr($id); ?>" class="productSlider custom-paddings js-product-tabs <?php echo esc_attr($className); ?> <?php echo $position; ?>" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-md-6 productSlider__bg">
                <figure class="productSlider__bg--img">
                    <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                </figure>
            </div>

            <div class="col-12 col-md-6 productSlider__content">
                <div class="productSlider__content--info">
                    <h2 class="heading"><?php echo $title; ?></h2>
                    <div class="text">
                        <?php echo $content; ?>
                    </div>
                </div>

                <div class="productSlider__swiper">

                    <div class="productSlider__swiper--select">
                        <button class="btn-pet js-products-tabs-tab" data-type="dog">
                            <svg viewBox="0 0 512 512">
                                <path d="m467.534 112.088c-23.073-29.237-57.683-64.088-91.534-64.088-10.27 0-20.622 7.034-34.594 20.191-19.785-8.821-63.312-20.191-85.406-20.191-22.113 0-65.64 11.378-85.406 20.191-13.972-13.157-24.324-20.191-34.594-20.191-33.851 0-68.461 34.851-91.534 64.088-17.192 21.785-44.466 62.743-44.466 79.912 0 32.247 1.043 46.724 27.2 81.6 19.966 26.621 22.082 65.4 35.475 86.458 8.763 13.779 21.977 19.27 37.206 15.464 15.176-3.794 25.03-16.588 29.396-38.087 16.89 23.263 14.047 36.937 15.162 44.849 1.123 30.142 52.694 81.716 111.561 81.716 58.77 0 110.436-51.52 111.561-81.715 1.109-7.873-1.828-21.567 15.148-44.913 4.463 22.044 16.021 39.329 38.588 39.329 42.297 0 35.241-65.418 63.502-103.1 26.157-34.876 27.2-49.353 27.2-81.6.001-17.17-27.273-58.128-44.465-79.913zm-211.534 231.912c-8.33 0-18.196-12.575-22.268-20.516 11.83-4.646 32.698-4.648 44.535 0-4.071 7.941-13.937 20.516-22.267 20.516zm-.001 63.962c10.396 7.852 23.978 12.591 37.934 14.341-25.229 12.909-50.609 12.923-75.867 0 13.955-1.75 27.538-6.489 37.933-14.341zm203.201-153.562c-25.193 33.589-29.058 82.236-38.207 90.281-5.711-.52-7.822-17.966-8.331-23.682-2.622-29.497 3.338-71.64 3.338-96.999 0-43.279-32.313-108.404-33.689-111.155-3.952-7.904-13.564-11.106-21.466-7.156-7.904 3.952-11.107 13.563-7.156 21.466 8.431 16.862 30.311 67.13 30.311 96.845 0 16.692-3.052 43.399-3.821 69.035-8.651 7.456-44.179 40.656-44.179 82.965 0 19.833-55.647 19.892-65.865.533-.43-.816-1.023-1.751-1.658-2.544 24.039-7.67 43.523-37.929 43.523-53.989 0-42.948-112-42.948-112 0 0 16.054 19.418 46.297 43.523 53.989-.627.782-1.22 1.713-1.658 2.543-10.253 19.418-65.865 19.266-65.865-.532 0-42.309-35.528-75.509-44.179-82.965-.741-24.706-3.821-52.753-3.821-69.035 0-29.642 21.882-79.961 30.311-96.845 3.952-7.903.748-17.514-7.156-21.466-7.903-3.952-17.515-.748-21.466 7.156-1.376 2.751-33.689 67.876-33.689 111.155 0 25.372 5.958 67.523 3.337 96.999-.508 5.716-2.619 23.161-8.331 23.682-9.245-8.129-12.925-56.572-38.207-90.281-20.578-27.437-20.797-34.916-20.8-61.529 1.856-7.371 17.018-35.5 39.828-63.768 24.049-29.805 47.328-47.966 62.735-49.051 4.727 2.375 14.519 11.658 22.124 19.262 6.059 6.06 15.832 6.27 22.146.462 7.95-5.427 55.776-19.776 77.168-19.776s69.218 14.349 77.168 19.776c6.307 5.801 16.08 5.604 22.146-.462 13.201-13.201 19.307-17.838 22.126-19.262 15.407 1.087 38.685 19.249 62.732 49.051 22.81 28.268 37.972 56.397 39.828 63.768-.002 26.613-.222 34.092-20.8 61.529z" />
                                <circle cx="180" cy="212" r="20" />
                                <circle cx="332" cy="212" r="20" />
                            </svg>
                            Para mi perro
                        </button>
                        <button class="btn-pet js-products-tabs-tab" data-type="cat">
                            <svg viewBox="0 0 512.283 512.283">
                                <path d="m510.772 325.501c0-7.61-6.028-39.526-23.445-74.359 4.631-59.524 10.609-205.483-32.539-246.585-3.938-3.753-9.514-5.244-14.801-3.966-57.878 14.01-105.409 54.996-127.823 110.304-37.807-8.896-74.552-9.077-111.582-.113-.592.143-28.855-86.24-127.795-110.191-5.288-1.278-10.862.215-14.801 3.966-51.367 48.935-32.32 245.237-32.704 245.944 0 1.335-18.276 30.641-23.824 75.456-5.559 40.645 6.564 69.17 6.564 70.184 33.266 92.617 149.442 116 248.12 116 98.616 0 215.014-23.421 248.12-116 0-.1 12.197-31.593 6.51-70.64zm-72.914-291.132c26.207 42.998 19.972 171.353 19.884 171.252-31.873-39.878-72.602-68.749-114.935-85.098 18.044-42.454 53.425-73.131 95.051-86.154zm-362.946-.001c41.669 13.032 76.98 43.738 94.993 85.996-42.572 16.315-83.278 45.291-115.001 84.806-1.419-42.162-1.894-134.925 20.008-170.802zm343.22 413.254c-79.273 43.603-244.647 43.636-323.98 0-19.47-10.71-34.4-23.91-44.73-39.48h46.72c8.836 0 16-7.163 16-16s-7.164-16-16-16h-60.67c-2.553-10.385-3.58-21.471-3.29-32h63.96c8.836 0 16-7.163 16-16s-7.164-16-16-16h-59.84c16.3-70.929 78.144-141.59 158.969-166.718 129.529-40.208 255.676 57.775 280.712 166.718h-59.84c-8.837 0-16 7.163-16 16s7.163 16 16 16h63.96c.29 10.52-.735 21.607-3.29 32h-60.67c-8.837 0-16 7.163-16 16s7.163 16 16 16h46.72c-10.331 15.569-25.261 28.77-44.731 39.48z" />
                                <path d="m344.142 388.142c-8.837 0-16 7.163-16 16 0 15.439-12.561 28-28 28-12.707 0-23.457-8.512-26.866-20.131 26.835-13.22 41.102-56.091 22.366-74.678-11.077-10.991-27.099-9.075-43.606-9.213-12.731-.09-25.905-.202-35.394 9.213-18.945 18.796-4.197 61.592 22.366 74.678-3.409 11.619-14.159 20.131-26.866 20.131-15.439 0-28-12.561-28-28 0-8.837-7.164-16-16-16s-16 7.163-16 16c0 54.645 67.135 80.525 104 40.735 36.846 39.769 104 13.95 104-40.735 0-8.837-7.163-16-16-16zm-72.002-27.726c-.151 11.286-9.587 23.726-15.998 23.726s-15.847-12.439-15.998-23.726c3.783-.455 28.554-.415 31.996 0z" />
                                <path d="m180.142 296.142c15.44 0 28-12.56 28-28s-12.56-28-28-28-28 12.56-28 28 12.56 28 28 28z" />
                                <path d="m332.142 240.142c-15.44 0-28 12.56-28 28s12.56 28 28 28 28-12.56 28-28-12.56-28-28-28z" />
                            </svg>
                            Para mi gato
                        </button>
                    </div>

                    <div class="productSlider__swiper--slideContent js-products-tabs-slide" data-type="dog">
                        <!-- Slider main container -->
                        <div class="swiper-container js-product-slide productSlider__swiper--slide">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">

                                <?php if( $dog_products ): ?>
                                    <?php foreach( $dog_products as $dog_product ): 

                                        global $woocommerce; 
                                        $currency = get_woocommerce_currency_symbol();
                                        $price = get_post_meta( $dog_product->ID, '_regular_price', true);
                                        $sale = get_post_meta( $dog_product->ID, '_sale_price', true);

                                        $permalink = get_permalink( $dog_product->ID );
                                        $title = get_the_title( $dog_product->ID );

                                        $thumbnail_id = get_post_thumbnail_id( $dog_product->ID );
                                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                    ?>
                                        <!-- Slides -->
                                        <div class="swiper-slide">
                                            <div class="productSlider__product">
                                                <figure class="productSlider__product--img">
                                                    <img data-src="<?php echo get_the_post_thumbnail_url($dog_product->ID);?>" class="swiper-lazy" alt="<?php echo $alt; ?>">
                                                    <div class="swiper-lazy-preloader"></div>
                                                </figure>
                                                <div class="productSlider__product--content">
                                                    <?php if (!empty( get_the_terms( $dog_product->ID, 'product_cat' ) ) ) : ?>
                                                        <?php 
                                                            $terms = get_the_terms($dog_product->ID, 'product_cat');
                                                            $separator = ', ';
                                                            $output = '';
                                                            $output .= "<a href=" . get_term_link( $terms[0] ) . ">" . esc_html( $terms[0]->name ) . "</a>" . $separator;?>
                                                            <span class="category">
                                                                <?php echo trim( $output, $separator ); ?>
                                                                </span>
                                                        <?php else: ?>
                                                            <span class="category">
                                                                <a href="#"></a>
                                                            </span>
                                                    <?php endif; ?>
                                                    <h3 class="heading"><?php echo $title; ?></h3>
                                                    <?php if($sale) : ?>
                                                        <p class="price"><del><?php echo $currency; echo $price; ?></del> <?php echo $currency; echo $sale; ?></p>
                                                    <?php else : ?>
                                                        <?php
                                                        $product = new WC_Product($dog_product->ID); ?>
                                                        <p class="price"><?php echo wc_price($product->get_price_including_tax(1,$product->get_price())); ?></p>  
                                                    <?php endif; ?>

                                                    <a href="<?php echo $permalink; ?>" class="btn-radio btn-purple">
                                                        Añadir al carrito
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination js-product-slide-pagination"></div>

                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev js-product-slide-prev"></div>
                        <div class="swiper-button-next js-product-slide-next"></div>
                    </div>

                    <div class="productSlider__swiper--slideContent js-products-tabs-slide" data-type="cat">
                        <!-- Slider main container -->
                        <div class="swiper-container js-product-slide productSlider__swiper--slide">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <?php if( $cat_products ): ?>
                                    <?php foreach( $cat_products as $cat_product ): 

                                        global $woocommerce; 
                                        $currency = get_woocommerce_currency_symbol();
                                        $price = get_post_meta( $cat_product->ID, '_regular_price', true);
                                        $sale = get_post_meta( $cat_product->ID, '_sale_price', true);

                                        $permalink = get_permalink( $cat_product->ID );
                                        $title = get_the_title( $cat_product->ID );

                                        $thumbnail_id = get_post_thumbnail_id( $cat_product->ID );
                                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                    ?>
                                        <!-- Slides -->
                                        <div class="swiper-slide">
                                            <div class="productSlider__product">
                                                <figure class="productSlider__product--img">
                                                    <img data-src="<?php echo get_the_post_thumbnail_url($cat_product->ID);?>" class="swiper-lazy" alt="<?php echo $alt; ?>">
                                                    <div class="swiper-lazy-preloader"></div>
                                                </figure>
                                                <div class="productSlider__product--content">
                                                    <?php if (!empty( get_the_terms( $cat_product->ID, 'product_cat' ) ) ) : ?>
                                                        <?php 
                                                            $terms = get_the_terms($cat_product->ID, 'product_cat');
                                                            $separator = ', ';
                                                            $output = '';
                                                            $output .= "<a href=" . get_term_link( $terms[0] ) . ">" . esc_html( $terms[0]->name ) . "</a>" . $separator;?>
                                                            <span class="category">
                                                                <?php echo trim( $output, $separator ); ?>
                                                                </span>
                                                        <?php else: ?>
                                                            <span class="category">
                                                                <a href="#"></a>
                                                            </span>
                                                    <?php endif; ?>
                                                    <h3 class="heading"><?php echo $title; ?></h3>
                                                    <?php if($sale) : ?>
                                                        <p class="price"><del><?php echo $currency; echo $price; ?></del> <?php echo $currency; echo $sale; ?></p>
                                                    <?php else : ?>
                                                        <?php
                                                        $product = new WC_Product($cat_product->ID); ?>
                                                        <p class="price"><?php echo wc_price($product->get_price_including_tax(1,$product->get_price())); ?></p>  
                                                    <?php endif; ?>

                                                    <a href="<?php echo $permalink; ?>" class="btn-radio btn-purple">
                                                        Añadir al carrito
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination js-product-slide-pagination"></div>

                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev js-product-slide-prev"></div>
                        <div class="swiper-button-next js-product-slide-next"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>