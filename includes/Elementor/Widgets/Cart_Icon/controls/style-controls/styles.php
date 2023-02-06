<?php

/**
 * Cart Icon Style Controls
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_cart_icon_styles',
    [
        'label' => esc_html__('Styles', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->color_typography_controls(array(
    'id' => 'cart_close_icon',
    'selectors' => array(
        '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product span.eicon-plus',
    ),
    'disable_controls' => array('alignment')
));

$this->box_controls(
    array(
        'id' => 'cart_close_icon',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product span.eicon-plus',
        ),
    )
);

$this->position_controls(
    array(
        'id' => 'cart_close_icon',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product span.eicon-plus',
        ),
    )
);

$this->end_controls_section();