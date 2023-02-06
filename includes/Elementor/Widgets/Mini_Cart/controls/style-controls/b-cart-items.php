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
    array(
        'id' => 'cart_item',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_shopping_cart_content .woocommerce-mini-cart-item.mini_cart_item',
        ),
        'disable_controls' => array('alignment')
    )
);

$this->box_controls(
    array(
        'id' => 'cart_item',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_shopping_cart_content .woocommerce-mini-cart-item.mini_cart_item',
        )
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
    array(
        'id' => 'cart_subtotal',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_shopping_cart_content .woocommerce-mini-cart__total.total',
        ),
        'disable_controls' => array('alignment')
    )
);

$this->box_controls(
    array(
        'id' => 'cart_subtotal',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_shopping_cart_content .woocommerce-mini-cart__total.total',
        )
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
    array(
        'id' => 'cart_checkout_btn',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_mini_cart .button.wc-forward.checkout',
        ),
        'disable_controls' => array('alignment')
    )
);

$this->box_controls(
    array(
        'id' => 'cart_checkout_btn',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_mini_cart .button.wc-forward.checkout',
        ),
    )
);

$this->size_controls(
    array(
        'id' => 'cart_checkout_btn',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_mini_cart .button.wc-forward.checkout',
        ),
        'disable_controls' => array('height', 'max-height')
    )
);

$this->end_controls_section();
