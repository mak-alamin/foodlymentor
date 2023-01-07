<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_product_grid_text_color_typography',
    [
        'label' => esc_html__('Grid Product Texts', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Title Styles
$this->add_control(
    'foodlymentor_product_grid_title_heading',
    [
        'label' => __('Product Title', 'foodlymentor'),
        'type' => Controls_Manager::HEADING,
    ]
);

$this->color_typography_controls(
    array(
        'id' => 'product_grid_title',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product .woocommerce-loop-product__title',
        )
    )
);


// Description Styles
$this->add_control(
    'foodlymentor_product_grid_desc_heading',
    [
        'label' => __('Product Description', 'foodlymentor'),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->color_typography_controls(
    array(
        'id' => 'product_grid_desc',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product .woocommerce-loop-product__excerpt',
        )
    )
);

// Price Styles
$this->add_control(
    'foodlymentor_product_grid_price_heading',
    [
        'label' => __('Price', 'foodlymentor'),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->color_typography_controls(array(
    'id' => 'product_grid_price',
    'selectors' => array(
        '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product .woocommerce-loop-product__price .woocommerce-Price-amount',
    ),
    'disable_controls' => array('alignment')
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

$this->color_typography_controls(array(
    'id' => 'product_grid_plus_icon',
    'selectors' => array(
        '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product span.eicon-plus',
    ),
    'disable_controls' => array('alignment')
));

$this->end_controls_section();
