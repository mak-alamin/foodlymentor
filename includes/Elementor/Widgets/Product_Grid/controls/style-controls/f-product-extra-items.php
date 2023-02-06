<?php

/**
 * Product Extra Items Controls
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_product_popup_extra_items',
    [
        'label' => esc_html__('Product Extra Items', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Extra Items Title
$this->add_control(
    'foodlymentor_product_extra_items_title_styles',
    [
        'label' => esc_html__('Extra Items Title', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::HEADING,
    ]
);

$this->color_typography_controls(
    array(
        'id' => 'product_extra_items_title',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .additional_options .addi_option h3',
        )
    )
);

$this->box_controls(
    array(
        'id' => 'product_extra_items_title',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .additional_options .addi_option h3',
        ),
    )
);
// Extra Items Title ends

// Extra Items
$this->add_control(
    'foodlymentor_product_extra_items_styles',
    [
        'label' => esc_html__('Extra Items', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->start_controls_tabs('foodlymentor_product_extra_items');

$this->start_controls_tab('foodlymentor_product_extra_items_tab_normal', ['label' => esc_html__('Normal', 'foodlymentor')]);

$this->color_typography_controls(
    array(
        'id' => 'product_extra_items',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .addi_option .option .extra_option_name',
        ),
        'disable_controls' => array('alignment')
    )
);

$this->box_controls(
    array(
        'id' => 'product_extra_items',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .addi_option .option',
        ),
    )
);

$this->end_controls_tab(); // Extra Items Normal ends

// Extra Items Active
$this->start_controls_tab('foodlymentor_product_extra_items_tab_active', ['label' => esc_html__('Active', 'foodlymentor')]);


$this->color_typography_controls(
    array(
        'id' => 'product_extra_items_active',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .addi_option .option.active .extra_option_name',
        ),
        'disable_controls' => array('alignment')
    )
);

$this->box_controls(
    array(
        'id' => 'product_extra_items_active',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .addi_option .option.active',
        ),
    )
);

$this->end_controls_tab(); // Extra Items Active ends

$this->end_controls_tabs(); // Extra Items ends


// Quantity Icons
$this->add_control(
    'foodlymentor_product_extra_items_qty_icons',
    [
        'label' => esc_html__('Quantity Icons', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->color_typography_controls(
    array(
        'id' => 'product_extra_items_qty_icon',
        'selectors' => array(
            '#foodlymentor_product_popup .addi_option .option .value-button',
        ),
        'disable_controls' => array('alignment')
    )
);

$this->box_controls(
    array(
        'id' => 'product_extra_items_qty_icon',
        'selectors' => array(
            '#foodlymentor_product_popup .addi_option .option .value-button',
        ),
        'disable_controls' => array('margin', 'padding')
    )
);

// Quantity Icons Width
$this->add_control(
    'foodlymentor_product_extra_items_qty_icon_width',
    [
        'label' => esc_html__('Icon Width', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px'],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ],
        ],
        'default' => [
            'unit' => 'px',
            'size' => 24,
        ],
        'selectors' => array(
            '#foodlymentor_product_popup .addi_option .option .value-button' => 'width:  {{SIZE}}{{UNIT}};',
        ),
    ]
);

// Quantity icons Height
$this->add_control(
    'foodlymentor_product_extra_items_qty_icon_height',
    [
        'label' => esc_html__('Icon Height', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'size_units' => ['px'],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ],
        ],
        'default' => [
            'unit' => 'px',
            'size' => 24,
        ],
        'selectors' => array(
            '#foodlymentor_product_popup .addi_option .option .value-button' => 'height:  {{SIZE}}{{UNIT}};',
        ),
    ]
);
// Quantity Icons ends

$this->end_controls_section();
