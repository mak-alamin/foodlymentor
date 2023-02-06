<?php

/**
 * Product Popup Footer Style Controls
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_product_popup_footer_styles',
    [
        'label' => esc_html__('Popup Footer', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

// Popup Footer
$this->box_controls(
    array(
        'id' => 'product_popup_footer',
        'selectors' => array(
            '#foodlymentor_product_popup.modal-container .modal-footer',
        ),
    )
); // Popup Footer ends


$this->end_controls_section();
