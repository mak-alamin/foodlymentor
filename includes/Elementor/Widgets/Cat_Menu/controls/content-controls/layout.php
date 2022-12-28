<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_cat_menu_layouts',
    [
        'label' => esc_html__('Main Layout', 'foodlymentor'),
    ]
);

$this->add_control(
    'foodlymentor_cat_menu_layout',
    [
        'label' => esc_html__('Layout', 'foodlymentor'),
        'type' => Controls_Manager::SELECT,
        'default' => 'horizontal',
        'options' => [
            'horizontal' => esc_html__('Horizontal', 'foodlymentor'),
            'vertical' => esc_html__('Vertical', 'foodlymentor'),
        ],
        'toggle' => true,
        'prefix_class' => 'foodlymentor-cat-menu-layout-',
    ]
);
$this->end_controls_section();
