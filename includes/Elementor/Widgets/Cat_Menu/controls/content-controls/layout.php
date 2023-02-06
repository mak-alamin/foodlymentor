<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_cat_menu_layouts',
    [
        'label' => esc_html__('Layout', 'foodlymentor'),
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


$this->add_responsive_control(
    'foodlymentor_font_size_factor',
    [
        'label' => esc_html__('Adjust Menu', 'foodlymentor'),
        'type' => Controls_Manager::SLIDER,
        'size_units' => ['px'],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 100,
            ],
            'default' => [
                'unit' => 'px',
                'size' => 16,
            ],
        ],
        'separator' => 'before',
    ]
);
$this->end_controls_section();
