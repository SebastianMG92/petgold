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

        // Grid logos
        acf_register_block_type(array(
            'name'              => 'grid-logos-block',
            'title'             => __('Grid logos'),
            'description'       => __('Grid logos'),
            'render_template'   => 'template-parts/blocks/grid-logos-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'logos', 'grid' ),
        ));

        // Hero block
        acf_register_block_type(array(
            'name'              => 'hero-block',
            'title'             => __('Hero'),
            'description'       => __('Hero'),
            'render_template'   => 'template-parts/blocks/hero-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'hero' ),
        ));

        // Icons columns
        acf_register_block_type(array(
            'name'              => 'icons-columns-block',
            'title'             => __('Icons columns'),
            'description'       => __('Icons columns'),
            'render_template'   => 'template-parts/blocks/icons-columns-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'icons' ),
        ));

        // Tabs block
        acf_register_block_type(array(
            'name'              => 'tabs-block',
            'title'             => __('Tabs'),
            'description'       => __('Tabs'),
            'render_template'   => 'template-parts/blocks/tabs-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'tabs' ),
        ));

        // Text block
        acf_register_block_type(array(
            'name'              => 'text-block',
            'title'             => __('Text'),
            'description'       => __('Text'),
            'render_template'   => 'template-parts/blocks/text-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'text' ),
        ));

        // Image dec text
        acf_register_block_type(array(
            'name'              => 'image-text-block',
            'title'             => __('Image and text'),
            'description'       => __('Image and text'),
            'render_template'   => 'template-parts/blocks/image-text-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'text' ),
        ));

        // Contact
        acf_register_block_type(array(
            'name'              => 'contact-block',
            'title'             => __('Contact'),
            'description'       => __('Contact'),
            'render_template'   => 'template-parts/blocks/contact-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'text' ),
        ));

        // Map
        acf_register_block_type(array(
            'name'              => 'map-block',
            'title'             => __('Map'),
            'description'       => __('Map'),
            'render_template'   => 'template-parts/blocks/map-block.php',
            'category'          => 'petgold',
            'icon'              => 'admin-comments',
            'mode'              => 'preview',
            'keywords'          => array( 'text' ),
        ));

    }
}




add_action('acf/init', 'custom_blocks');
