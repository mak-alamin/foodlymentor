<?php

/**
 * Product Popup Footer Quantity
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_product_popup_footer_qty_styles',
    [
        'label' => esc_html__('Popup Footer Quantity', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Decrease Icon
$this->add_control(
    'foodlymentor_product_popup_footer_decrease_qty_heading',
    [
        'label' => esc_html__('Decrease Icon', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::HEADING,
    ]
);

$this->color_typography_controls(
    array(
        'id' => 'product_popup_footer_decrease_qty',
        'selectors' => array(
            '#foodlymentor_product_popup .quantity i.qty_decrease',
        ),
        'disable_controls' => array('alignment')
    )
);

$this->box_controls(
    array(
        'id' => 'product_popup_footer_decrease_qty',
        'selectors' => array(
            '#foodlymentor_product_popup .quantity i.qty_decrease',
        ),
        'disable_controls' => array('margin')
    )
);

// Increase Icon
$this->add_control(
    'foodlymentor_product_popup_footer_increase_qty_heading',
    [
        'label' => esc_html__('Increase Icon', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->color_typography_controls(
    array(
        'id' => 'product_popup_footer_increase_qty',
        'selectors' => array(
            '#foodlymentor_product_popup .quantity i.qty_increase',
        ),
        'disable_controls' => array('alignment')
    )
);

$this->box_controls(
    array(
        'id' => 'product_popup_footer_increase_qty',
        'selectors' => array(
            '#foodlymentor_product_popup .quantity i.qty_increase',
        ),
        'disable_controls' => array('margin')
    )
);

// Input
$this->add_control(
    'foodlymentor_product_popup_footer_qty_input_heading',
    [
        'label' => esc_html__('Quantity Input', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->color_typography_controls(
    array(
        'id' => 'product_popup_footer_qty_input',
        'selectors' => array(
            '#foodlymentor_product_popup .quantity input',
        ),
        'disable_controls' => array('alignment')
    )
);

$this->box_controls(
    array(
        'id' => 'product_popup_footer_qty_input',
        'selectors' => array(
            '#foodlymentor_product_popup .quantity input',
        ),
    )
);

// Width Control
$this->add_control(
    'product_popup_footer_qty_input_max_width',
    [
        'label' => esc_html__('Input Max Width', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px', '%'],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 1000,
                'step' => 1,
            ],
            '%' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'default' => [
            'unit' => 'px',
            'size' => 100,
        ],
        'selectors' => array(
            '#foodlymentor_product_popup .quantity input' => 'max-width:  {{SIZE}}{{UNIT}};',
        ),
    ]
);


$this->end_controls_section();
