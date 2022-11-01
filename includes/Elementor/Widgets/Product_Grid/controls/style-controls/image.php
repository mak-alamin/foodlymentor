<?php

/**
 * Product Image Style Controls
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

$this->start_controls_section(
    'foodlymentor_product_grid_image_styles',
    [
        'label' => esc_html__('Image Styles', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->box_controls(
    'product_image',
    array(
        '.foodlymentor-product-grid .woocommerce ul.products li.product .product__img img',
    )
);

$this->add_responsive_control(
    'foodlymentor_product_grid_image_width',
    [
        'label' => esc_html__('Image Width(%)', 'foodlymentor'),
        'type' => Controls_Manager::SLIDER,
        'size_units' => ['px', '%'],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 200,
                'step' => 1,
            ],
            '%' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .foodlymentor-product-grid .product .product__img img' => 'width: {{SIZE}}{{UNIT}};',
        ],
        'separator' => 'before',
    ]
);


$this->end_controls_section();
