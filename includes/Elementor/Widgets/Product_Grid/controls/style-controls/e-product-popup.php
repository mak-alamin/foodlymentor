<?php

/**
 * Product Popup Style Controls
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_product_popup_styles',
    [
        'label' => esc_html__('Product Popup', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Main Popup Box
$this->add_control(
    'foodlymentor_product_popup_box_styles',
    [
        'label' => esc_html__('Main Popup Box', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::HEADING,
    ]
);

$this->box_controls(
    array(
        'id' => 'product_popup',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .modal-content',
        ),
        'disable_controls' => array('margin')
    )
);

$this->size_controls(
    array(
        'id' => 'product_popup',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .modal-content',
        ),
        'width_default' => [
            'unit' => '%',
            'size' => 50,
        ]
    )
);
// Main Popup Box ends

// Popup Title
$this->add_control(
    'foodlymentor_product_popup_title_styles',
    [
        'label' => esc_html__('Popup Title', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->box_controls(
    array(
        'id' => 'product_popup_title',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .modal-header .product-title',
        ),
    )
);

$this->color_typography_controls(
    array(
        'id' => 'product_popup_title',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .modal-header .product-title',
        )
    )
);
// Popup Title ends

// Modal body
$this->add_control(
    'foodlymentor_product_popup_body_styles',
    [
        'label' => esc_html__('Popup Body', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->box_controls(
    array(
        'id' => 'product_popup_body',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .modal-body',
        ),
    )
);
// Modal body ends

// Popup Image
$this->add_control(
    'foodlymentor_product_popup_image_styles',
    [
        'label' => esc_html__('Product Image', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->box_controls(
    array(
        'id' => 'product_popup_image',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .modal-content .product-img img',
        ),
    )
);

$this->size_controls(
    array(
        'id' => 'product_popup_image',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .modal-content .product-img img',
        ),
    )
); // Popup Image ends

// Popup Product Description
$this->add_control(
    'foodlymentor_product_popup_desc_styles',
    [
        'label' => esc_html__('Product Description', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->color_typography_controls(
    array(
        'id' => 'product_popup_desc',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .modal-body .product-desc',
        )
    )
); // Popup Product Description ends


// Popup Close Icon
$this->add_control(
    'foodlymentor_product_popup_close_icon_styles',
    [
        'label' => esc_html__('Popup Close Icon', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::HEADING,
        'separator' => 'before',
    ]
);

$this->color_typography_controls(
    array(
        'id' => 'product_popup_close_icon',
        'selectors' => array(
            '#foodlymentor_product_popup .modal-header .eicon-editor-close',
        ),
        'disable_controls' => array('alignment')
    )
);

$this->box_controls(
    array(
        'id' => 'product_popup_close_icon',
        'selectors' => array(
            '#foodlymentor_product_popup .modal-header .eicon-editor-close',
        ),
        'disable_controls' => array('margin')
    )
);

$this->position_controls(
    array(
        'id' => 'product_popup_close_icon',
        'selectors' => array(
            '#foodlymentor_product_popup .modal-header .eicon-editor-close',
        ),
    )
); // Popup Close Icon ends

$this->end_controls_section();
