<?php

/**
 * Menu Items Style Controls
 */

use Elementor\Controls_Manager;

// Cart items
$this->start_controls_section(
    'foodlymentor_cart_item_styles',
    [
        'label' => esc_html__('Cart item', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->color_typography_controls(
    'cart_item',
    array(
        '.foodlymentor_shopping_cart_content .woocommerce-mini-cart-item.mini_cart_item',
    ),
    array('alignment') // disable
);

$this->box_controls(
    'cart_item',
    array(
        '.foodlymentor_shopping_cart_content .woocommerce-mini-cart-item.mini_cart_item',
    )
);

$this->end_controls_section();


// Subtotal
$this->start_controls_section(
    'foodlymentor_cart_subtotal_styles',
    [
        'label' => esc_html__('Subtotal', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->color_typography_controls(
    'cart_subtotal',
    array(
        '.foodlymentor_shopping_cart_content .woocommerce-mini-cart__total.total',
    ),
    array('alignment') // disable
);

$this->box_controls(
    'cart_subtotal',
    array(
        '.foodlymentor_shopping_cart_content .woocommerce-mini-cart__total.total',
    )
);

$this->end_controls_section();

// Checkout Button
$this->start_controls_section(
    'foodlymentor_cart_checkout_btn_styles',
    [
        'label' => esc_html__('Checkout Button', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->color_typography_controls(
    'cart_checkout_btn',
    array(
        '.foodlymentor_mini_cart .button.wc-forward.checkout',
        '.foodlymentor_mini_cart .woocommerce-mini-cart__buttons.buttons'
    ),
);

$this->box_controls(
    'cart_checkout_btn',
    array(
        '.foodlymentor_mini_cart .button.wc-forward.checkout',
    )
);

$this->size_controls(
    'cart_checkout_btn',
    '.foodlymentor_mini_cart .button.wc-forward.checkout',
    array('height') // disable
);

$this->end_controls_section();
