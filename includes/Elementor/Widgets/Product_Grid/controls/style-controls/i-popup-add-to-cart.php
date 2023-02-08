<?php

/**
 * Product Popup Footer Style Controls
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_product_popup_addtocart_btn_styles',
    [
        'label' => esc_html__('Popup Add To Cart', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->box_controls(
    array(
        'id' => 'product_popup_addtocart_btn',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .modal-footer a.add_to_cart_button',
        ),
        'default_values' => [
            'bg' => '#0274be',
            'border_color' =>  '#0274be'
        ]
    )
);

$this->color_typography_controls(
    array(
        'id' => 'product_popup_addtocart_btn',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .modal-footer a.add_to_cart_button',
        ),
        'disable_controls' => array('alignment')
    )
);

$this->end_controls_section();
