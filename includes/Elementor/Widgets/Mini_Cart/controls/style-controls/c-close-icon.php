<?php

/**
 * Close Icon Style Controls
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_cart_close_icon_styles',
    [
        'label' => esc_html__('Close Icon', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

  // Color
  $this->add_control(
    'foodlymentor_cart_close_icon_color',
    [
        'label' => __('Icon Color', 'foodlymentor'),
        'type' => Controls_Manager::COLOR,
        'selectors' =>array(
            '{{WRAPPER}} .foodlymentor_shopping_cart_content span.close-cart',
        )
    ]
);

$this->box_controls(
    array(
        'id' => 'cart_close_icon',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_shopping_cart_content span.close-cart',
        ),
        'disable_controls' => array('padding', 'margin')
    )
);

$this->size_controls(
    array(
        'id' => 'cart_close_icon',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_shopping_cart_content span.close-cart',
        ),
        'disable_controls' => array('max-width', 'max-height'),
        'dafault_unit' => 'px',
        'dafault_width' => 30,
        'dafault_height' => 30,
    )
);

$this->position_controls(
    array(
        'id' => 'cart_close_icon',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_shopping_cart_content span.close-cart',
        ),
    )
);

$this->end_controls_section();