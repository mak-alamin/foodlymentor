<?php

/**
 * Product Grid Plus Icon Style Controls
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_product_grid_plus_icon_styles',
    [
        'label' => esc_html__('Grid Product Plus Icon', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->color_typography_controls(array(
    'id' => 'product_grid_plus_icon',
    'selectors' => array(
        '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product span.eicon-plus',
    ),
    'disable_controls' => array('alignment')
));

$this->box_controls(
    array(
        'id' => 'product_grid_plus_icon',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product span.eicon-plus',
        ),
    )
);

$this->position_controls(
    array(
        'id' => 'product_grid_plus_icon',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product span.eicon-plus',
        ),
    )
);

$this->end_controls_section();
