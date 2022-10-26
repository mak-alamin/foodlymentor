<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_product_grid_text_color_typography',
    [
        'label' => esc_html__('Colors & Typography', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Title Styles
$this->add_control(
    'foodlymentor_product_grid_title_heading',
    [
        'label' => __('Title', 'foodlymentor'),
        'type' => Controls_Manager::HEADING,
    ]
);

$this->color_typography_controls('product_grid_title', array(
    '.foodlymentor-product-grid .woocommerce ul.products li.product .woocommerce-loop-product__title',
));


// Description Styles
$this->add_control(
    'foodlymentor_product_grid_desc_heading',
    [
        'label' => __('Description', 'foodlymentor'),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->color_typography_controls('product_grid_desc', array(
    '.foodlymentor-product-grid .woocommerce ul.products li.product .woocommerce-loop-product__excerpt',
));

// Price Styles
$this->add_control(
    'foodlymentor_product_grid_price_heading',
    [
        'label' => __('Price', 'foodlymentor'),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->color_typography_controls('product_grid_price', array(
    '.foodlymentor-product-grid .woocommerce ul.products li.product .woocommerce-loop-product__price .woocommerce-Price-amount',
));

// Plus Icon Styles
$this->add_control(
    'foodlymentor_product_grid_plus_icon_heading',
    [
        'label' => __('Plus Icon', 'foodlymentor'),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->color_typography_controls('product_grid_plus_icon', array(
    '.foodlymentor-product-grid .woocommerce ul.products li.product span.eicon-plus',
));

$this->end_controls_section();
