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
<section id="<?php echo esc_attr($id); ?>" class="productSlider custom-paddings js-product-tabs js-anim-parallax <?php echo esc_attr($className); ?> <?php echo $position; ?>" style="--pt-desktop:<?php echo $pt_desktop; ?>px;--pb-desktop:<?php echo $pb_desktop; ?>px; --pt-mobile:<?php echo $pt_desktop; ?>px; --pb-mobile:<?php echo $pb_mobile; ?>px">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-md-5 productSlider__bg">
                <figure class="productSlider__bg--img js-anim-parallax-item" data-depth=".2" >
                    <div class="js-preloader"></div>
                    <img class="js-lazy-image" data-src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>">
                </figure>

                <svg data-depth=".4" class="js-anim-parallax-item productSlider__bg--dec" height="512" viewBox="0 0 512.009 512.009" width="512"><g><circle cx="256" cy="316.005" r="10"/><path d="m510.496 181.295c-5.521-26.906-27.35-48.563-54.319-53.891-40.66-8.031-77.884 19.6-83.466 58.601h-233.423c-4.867-33.878-34.085-60-69.288-60-38.598 0-70 31.402-70 70 0 17.582 6.544 34.389 18.422 47.32 6.523 7.11 6.523 18.249.004 25.355-11.882 12.936-18.426 29.743-18.426 47.325 0 38.598 31.402 70 70 70 35.203 0 64.421-26.122 69.288-60h71.713c5.522 0 10-4.478 10-10s-4.478-10-10-10h-81.001c-5.522 0-10 4.478-10 10 0 27.57-22.43 50-50 50s-50-22.43-50-50c0-12.558 4.672-24.56 13.158-33.799 13.479-14.692 13.479-37.71-.004-52.406-8.482-9.236-13.154-21.238-13.154-33.795 0-27.57 22.43-50 50-50s50 22.43 50 50c0 5.522 4.478 10 10 10h252c5.519 0 10-4.478 10-10 0-30.619 27.708-55.412 60.303-48.979 18.866 3.727 34.74 19.472 38.602 38.288 3.341 16.292-1.055 32.507-12.063 44.49-13.48 14.692-13.48 37.71.004 52.406 11.004 11.979 15.399 28.194 12.059 44.485-3.861 18.817-19.735 34.563-38.601 38.289-32.594 6.435-60.304-18.359-60.304-48.979 0-5.522-4.478-10-10-10h-80.999c-5.522 0-10 4.478-10 10s4.478 10 10 10h71.71c5.589 39.051 42.844 66.619 83.467 58.601 26.969-5.327 48.797-26.984 54.318-53.892 4.646-22.658-1.521-45.269-16.918-62.029-6.523-7.11-6.523-18.249-.004-25.355 15.401-16.766 21.569-39.376 16.922-62.035z"/></g></svg>
                <svg data-depth=".3" class="js-anim-parallax-item productSlider__bg--dec" height="512" viewBox="0 0 512.09 512.09" width="512"><g><circle cx="376.09" cy="196.049" r="10"/><path d="m472.09 216.049c-.791 0-1.579.03-2.365.076-14.398-37.934-44.579-73.749-84.38-100.006 5.978-42.806-26.884-80.07-69.255-80.07-29.016 0-54.802 17.943-65.171 44.443-49.719 1.282-98.342 22.088-134.402 57.697-.043.042-.084.086-.126.128l-23.627-23.627c6.717-1.79 12.878-5.313 17.926-10.361 15.626-15.625 15.63-40.934 0-56.562-15.632-15.632-40.93-15.642-56.569-.003-8.11 8.104-12.362 19.127-11.634 30.822-11.064-.689-22.363 3.172-30.803 11.604-15.582 15.595-15.582 40.971.003 56.569 15.597 15.596 40.974 15.597 56.572 0 5.15-5.151 8.589-11.37 10.337-17.95l24.286 24.286c-27.719 33.567-42.792 74.554-42.792 117.334v5.62h-1.28c-32.378 0-58.72 26.342-58.72 58.72 0 28.825 20.634 53.189 49.066 57.934l9.925 1.654c5.448.908 10.6-2.773 11.507-8.22.908-5.448-2.772-10.6-8.22-11.507l-9.922-1.654c-18.749-3.128-32.356-19.197-32.356-38.206 0-21.351 17.37-38.73 38.72-38.73h61.509c-.149 1.656-.23 3.323-.23 5 0 30.327 24.673 55.01 55 55.01s55-24.683 55-55.01c0-1.677-.08-3.344-.23-5h76.459c-.149 1.656-.23 3.323-.23 5 0 30.327 24.673 55.01 55 55.01s55-24.673 55-55c0-1.677-.08-3.344-.23-5h56.23c22.056 0 40-17.944 40-40s-17.942-40.001-39.998-40.001zm-403.829-154.139c7.82-7.82 20.466-7.821 28.287 0 7.81 7.809 7.813 20.467 0 28.278-7.818 7.818-20.459 7.823-28.285.001-.001-.001-.005-.004-.006-.006-7.813-7.807-7.82-20.455.004-28.273zm-14.142 70.708c-7.8 7.798-20.49 7.798-28.285.003-7.794-7.801-7.794-20.494-.006-28.288 7.798-7.791 20.486-7.796 28.29-.004 0 0 .001.001.001.001 7.792 7.8 7.797 20.492 0 28.288zm25.971 137.811c0-91.037 76.788-164.669 166.21-169.728-.134 1.775-.21 3.558-.21 5.348 0 18.691 7.279 36.27 20.496 49.498 3.901 3.904 10.233 3.913 14.142.006 3.907-3.904 3.91-10.235.006-14.142-9.443-9.452-14.644-22.01-14.644-35.362 0-27.73 22.511-50 50-50 31.909 0 56.38 29.614 48.458 62.509-1.009 4.19.78 8.556 4.44 10.833 38.651 24.043 67.974 57.519 81.666 92.864-11.399 7.189-18.564 19.778-18.564 33.795 0 7.283 1.966 14.112 5.381 20h-357.381zm130 30.62c0 19.299-15.701 35-35 35s-35-15.701-35-35c0-1.686.125-3.354.359-5h69.281c.235 1.646.36 3.315.36 5zm186 0c0 19.299-15.701 35-35 35s-35-15.711-35-35.01c0-1.686.125-3.354.359-5l69.281.01c.235 1.646.36 3.315.36 5zm76-25c-11.028 0-20-8.972-20-20 0-11.37 9.202-20 20-20 11.028 0 20 8.972 20 20s-8.972 20-20 20z"/><circle cx="105.091" cy="392.049" r="10"/><path d="m157.61 456.049c-5.523 0-10 4.477-10 10s4.477 10 10 10c23.423 0 42.48-19.057 42.48-42.48 0-20.853-14.928-38.476-35.496-41.904l-13.441-2.24c-5.445-.907-10.6 2.772-11.508 8.22s2.772 10.6 8.22 11.508l13.441 2.24c10.884 1.814 18.784 11.141 18.784 22.176 0 12.396-10.084 22.48-22.48 22.48z"/></g></svg>
                <svg data-depth=".1" class="js-anim-parallax-item productSlider__bg--dec" height="512" viewBox="0 0 511.922 511.922" width="512"><g><circle cx="291.005" cy="220.913" r="10"/><path d="m199.017 383.609c-.002.002-.004.004-.006.006-15.582 15.595-15.582 40.971.006 56.572 15.595 15.581 40.97 15.582 56.572-.006 15.582-15.596 15.582-40.971-.006-56.573-15.596-15.581-40.971-15.581-56.566.001zm42.43 42.43c-7.8 7.793-20.493 7.795-28.288.006-7.794-7.801-7.794-20.494 0-28.294 7.801-7.788 20.49-7.787 28.281 0 7.795 7.801 7.795 20.494.007 28.288z"/><path d="m71.736 256.329c-.002.002-.004.004-.006.006-15.582 15.596-15.582 40.971.006 56.572 15.595 15.582 40.97 15.581 56.572-.006 15.582-15.596 15.582-40.971-.006-56.572-15.594-15.581-40.969-15.582-56.566 0zm42.431 42.43c-7.801 7.794-20.494 7.793-28.288.006-7.793-7.8-7.794-20.49-.003-28.291 7.801-7.792 20.492-7.791 28.285-.003 7.794 7.801 7.794 20.493.006 28.288z"/><circle cx="390.005" cy="202.913" r="10"/><path d="m498.929 12.995c-15.58-15.592-40.636-17.377-58.33-4.117l-269.978 204.92c-38.654-38.533-101.87-39.335-141.307.113-39.083 39.072-39.088 102.335-.001 141.423 28.056 28.055 68.576 35.795 103.478 23.752-11.99 34.62-4.552 75.172 23.801 103.517 39.071 39.082 102.334 39.091 141.413.002 39.346-39.336 38.767-102.558.11-141.303l73.039-96.227c3.339-4.399 2.479-10.672-1.919-14.011-4.398-3.338-10.672-2.48-14.011 1.919l-78.555 103.494c-3.244 4.273-2.537 10.346 1.602 13.76 1.927 1.589 3.803 3.299 5.594 5.099 31.263 31.255 31.271 81.863-.002 113.127-31.255 31.264-81.863 31.272-113.128-.002-31.261-31.252-31.272-81.855-.006-113.119.003-.003 84.857-84.867 84.857-84.867 2.364-2.364 3.39-5.753 2.734-9.032l-15.47-77.36 209.792-159.238c9.731-7.293 23.548-6.312 32.145 2.292 8.597 8.59 9.58 22.407 2.323 32.09l-77.496 102.1c-3.339 4.399-2.479 10.672 1.919 14.011 4.398 3.338 10.672 2.48 14.011-1.919l77.533-102.149c13.225-17.645 11.439-42.701-4.148-58.275zm-342.334 328.196c-31.198 31.188-81.952 31.189-113.139.001-31.264-31.264-31.274-81.872.001-113.139 31.257-31.266 81.866-31.269 113.136 0 1.797 1.797 3.509 3.679 5.088 5.593 3.414 4.14 9.485 4.846 13.76 1.602l49.702-37.725 12.517 62.593z"/></g></svg>
            </div>

            <div class="col-12 col-md-7 productSlider__content">
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
                                        // Woo data
                                        $product = wc_get_product($dog_product->ID);

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
                                                <div>
                                                    <a class="productSlider__product--link" href="<?php echo $permalink; ?>">
                                                        <figure class="productSlider__product--img">
                                                            <img data-src="<?php echo get_the_post_thumbnail_url($dog_product->ID);?>" class="swiper-lazy" alt="<?php echo $alt; ?>">
                                                            <div class="swiper-lazy-preloader"></div>
                                                        </figure>
                                                    </a>
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
                                                        <a href="<?php echo $permalink; ?>" class="productSlider__product--link">
                                                            <h3 class="heading"><?php echo $title; ?></h3>
                                                            <?php if($product->product_type == 'variable') : ?>
                                                                <p class="price"><?php echo wc_price($product->get_price_including_tax(1,$product->get_price())); ?></p> 
                                                            <?php else : ?>
            
                                                                <p class="price"><?php echo wc_price($product->get_price_including_tax(1,$product->get_price())); ?></p> 
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="productSlider__product--cart">
                                                    <?php echo do_shortcode("[add_to_cart_form id=" . $dog_product->ID . "]"); ?> 
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
                                        // Woo data
                                        $product = wc_get_product($cat_product->ID);

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
                                                <div>
                                                    <a class="productSlider__product--link" href="<?php echo $permalink; ?>">
                                                        <figure class="productSlider__product--img">
                                                            <img data-src="<?php echo get_the_post_thumbnail_url($cat_product->ID);?>" class="swiper-lazy" alt="<?php echo $alt; ?>">
                                                            <div class="swiper-lazy-preloader"></div>
                                                        </figure>
                                                    </a>
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
                                                        <a href="<?php echo $permalink; ?>" class="productSlider__product--link">
                                                            <h3 class="heading"><?php echo $title; ?></h3>
                                                            <?php if($product->product_type == 'variable') : ?>
                                                                <p class="price"><?php echo wc_price($product->get_price_including_tax(1,$product->get_price())); ?></p> 
                                                            <?php else : ?>
                                                                <p class="price"><?php echo wc_price($product->get_price_including_tax(1,$product->get_price())); ?></p> 
                                                            <?php endif; ?> 
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                                <div class="productSlider__product--cart">
                                                    <?php echo do_shortcode("[add_to_cart_form id=" . $cat_product->ID . "]"); ?> 
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