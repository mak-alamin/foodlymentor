<?php

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_product_grid_layouts',
    [
        'label' => esc_html__('Main Layout', 'foodlymentor'),
    ]
);

$this->add_control(
    'foodlymentor_product_show_style',
    [
        'label' => esc_html__('Show Products', 'foodlymentor'),
        'type' => Controls_Manager::SELECT,
        'default' => 'only-products',
        'options' => [
            'only-products' => esc_html__('Only Products', 'foodlymentor'),
            'cat-products' => esc_html__('Cat Products', 'foodlymentor'),
        ]
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

/**
 * Box Layout
 */

$this->start_controls_section(
    'foodlymentor_product_grid_box_layouts',
    [
        'label' => esc_html__('Box Layout', 'foodlymentor'),
    ]
);

$this->add_responsive_control(
    'foodlymentor_product_grid_elements_hr_alignment',
    [
        'label' => esc_html__('Horizontal Alignment', 'foodlymentor'),
        'type' => Controls_Manager::SELECT,
        'default' => 'default',
        'options' => [
            'default' => esc_html__('Default', 'foodlymentor'),
            'space-between' => esc_html__('Space Between', 'foodlymentor'),
            'space-around' => esc_html__('Space Around', 'foodlymentor'),
            'space-evenly' => esc_html__('Space Evenly', 'foodlymentor'),
        ],
        'toggle' => true,
        'prefix_class' => 'foodlymentor-product-grid-elements%s-',
    ]
);

$this->add_responsive_control(
    'foodlymentor_product_image_position',
    [
        'label' => esc_html__('Image Position', 'foodlymentor'),
        'type' => Controls_Manager::SELECT,
        'default' => 'left',
        'options' => [
            'left' => esc_html__('Left', 'foodlymentor'),
            'right' => esc_html__('Right', 'foodlymentor'),
            'top' => esc_html__('Top', 'foodlymentor'),
            'bottom' => esc_html__('Bottom', 'foodlymentor'),
        ],
        'toggle' => true,
        'prefix_class' => 'foodlymentor-product-img%s-',
    ]
);

$this->end_controls_section();
