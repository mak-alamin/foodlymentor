<?php

/**
 * Menu Items Style Controls
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_mini_cart_title_styles',
    [
        'label' => esc_html__('Cart Title', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->color_typography_controls('cart_title', array(
    '.foodlymentor_shopping_cart_content .cart-title',
));

$this->box_controls(
    'cart_title',
    array(
        '.foodlymentor_shopping_cart_content .cart-title',
    )
);

$this->end_controls_section();
