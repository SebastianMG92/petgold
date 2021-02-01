<?php

function custom_blocks() {

    // Check function exists.
    if( function_exists('acf_register_block') ) {

        // register a hero slider block.
        acf_register_block_type(array(
            'name'              => 'hero-slide',
            'title'             => __('Hero slide'),
            'description'       => __('Slider principal'),
            'render_template'   => 'template-parts/blocks/hero-slide-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'hero', 'slider' ),
        ));
        
        // register a product slide block.
        acf_register_block_type(array(
            'name'              => 'product-slide',
            'title'             => __('Product slide'),
            'description'       => __('Slider de productos'),
            'render_template'   => 'template-parts/blocks/product-slide-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'product', 'slider' ),
        ));

        // Cards block
        acf_register_block_type(array(
            'name'              => 'cards-block',
            'title'             => __('Cards block'),
            'description'       => __('Bloque de cartas'),
            'render_template'   => 'template-parts/blocks/cards-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'cards' ),
        ));

        // Checks block
        acf_register_block_type(array(
            'name'              => 'checks-block',
            'title'             => __('Checks block'),
            'description'       => __('Bloque de checks'),
            'render_template'   => 'template-parts/blocks/checks-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'cards' ),
        ));

        // Blog slide block
        acf_register_block_type(array(
            'name'              => 'slide-blog-block',
            'title'             => __('Slide blog'),
            'description'       => __('Slider blog'),
            'render_template'   => 'template-parts/blocks/slider-blog-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'slider', 'blog' ),
        ));

    }
}




add_action('acf/init', 'custom_blocks');
