<?php

/**
 * Category Text Style Controls
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_product_grid_category_text_styles',
    [
        'label' => esc_html__('Category Text', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->color_typography_controls(array(
    'id' => 'product_grid_category_text',
    'selectors' => array(
        '{{WRAPPER}} .foodlymentor-product-grid .woocommerce .category-text a',
    )
));

$this->box_controls(
    array(
        'id' => 'product_grid_category_text',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce .category-text',
        )
    )
);

$this->end_controls_section();
