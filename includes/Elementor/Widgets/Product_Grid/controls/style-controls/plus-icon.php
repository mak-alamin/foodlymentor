<?php

/**
 * Product Grid Plus Icon Style Controls
 */

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

$this->start_controls_section(
    'foodlymentor_product_grid_plus_icon_styles',
    [
        'label' => esc_html__('Plus Icon', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->box_controls(
    'product_plus_icon',
    array(
        '.foodlymentor-product-grid .woocommerce ul.products li.product span.eicon-plus',
    )
);

$this->end_controls_section();
