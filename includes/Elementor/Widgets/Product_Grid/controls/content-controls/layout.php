<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_product_grid_layouts',
    [
        'label' => esc_html__('Layouts', 'foodlymentor'),
    ]
);

$this->add_control(
    'foodlymentor_product_grid_layout',
    [
        'label' => esc_html__('Layout', 'foodlymentor'),
        'type' => Controls_Manager::SELECT,
        'default' => 'grid',
        'options' => [
            'grid' => esc_html__('Grid', 'foodlymentor'),
            'list' => esc_html__('List', 'foodlymentor'),
        ]
    ]
);

$this->add_responsive_control(
    'foodlymentor_product_grid_column',
    [
        'label' => esc_html__('Columns', 'foodlymentor'),
        'type' => Controls_Manager::SELECT,
        'default' => '4',
        'options' => [
            '1' => esc_html__('1', 'foodlymentor'),
            '2' => esc_html__('2', 'foodlymentor'),
            '3' => esc_html__('3', 'foodlymentor'),
            '4' => esc_html__('4', 'foodlymentor'),
            '5' => esc_html__('5', 'foodlymentor'),
            '6' => esc_html__('6', 'foodlymentor'),
        ],
        'toggle' => true,
        'prefix_class' => 'foodlymentor-product-grid-column%s-',
        'condition' => [
            'foodlymentor_product_grid_layout!' => 'list',
        ],
    ]
);

$this->add_responsive_control(
    'foodlymentor_product_list_column',
    [
        'label' => esc_html__('Columns', 'foodlymentor'),
        'type' => Controls_Manager::SELECT,
        'default' => '2',
        'options' => [
            '1' => esc_html__('1', 'foodlymentor'),
            '2' => esc_html__('2', 'foodlymentor'),
        ],
        'toggle' => true,
        'prefix_class' => 'foodlymentor-product-list-column%s-',
        'condition' => [
            'foodlymentor_product_grid_layout' => 'list',
        ],
    ]
);

$this->end_controls_section();
