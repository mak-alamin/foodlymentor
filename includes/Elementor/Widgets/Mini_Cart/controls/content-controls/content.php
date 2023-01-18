<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_cart_content',
    [
        'label' => esc_html__('Cart Content', 'foodlymentor'),
    ]
);

$this->add_control(
    'foodlymentor_cart_title',
    [
        'label' => esc_html__( 'Cart Title', 'foodlymentor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => esc_html__( 'Your Order', 'foodlymentor' ),
        'placeholder' => esc_html__( 'Type your title here', 'foodlymentor' ),
    ]
);

$this->end_controls_section();
