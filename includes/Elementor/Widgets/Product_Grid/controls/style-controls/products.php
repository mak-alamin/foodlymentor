<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

$this->start_controls_section(
    'foodlymentor_product_grid_styles',
    [
        'label' => esc_html__('Products', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->add_responsive_control(
    'foodlymentor_product_grid_content_alignment',
    [
        'label' => __('Alignment', 'foodlymentor'),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
            'left' => [
                'title' => __('Left', 'foodlymentor'),
                'icon' => 'eicon-text-align-left',
            ],
            'center' => [
                'title' => __('Center', 'foodlymentor'),
                'icon' => 'eicon-text-align-center',
            ],
            'right' => [
                'title' => __('Right', 'foodlymentor'),
                'icon' => 'eicon-text-align-right',
            ],
        ],
        'default' => 'center',
        'toggle' => true,
        'selectors' => [
            '{{WRAPPER}} .foodlymentor-product-grid:not(.list) .woocommerce ul.products li.product' => 'text-align: {{VALUE}};',
        ],
        'conditions' => [
            'relation' => 'and',
            'terms' => [
                [
                    'name' => 'foodlymentor_product_grid_layout',
                    'operator' => '!=',
                    'value' => [
                        'list',
                    ],
                ],
            ],
        ],
    ]
);

$this->add_control(
    'foodlymentor_product_grid_background_color',
    [
        'label' => esc_html__('Content Background Color', 'foodlymentor'),
        'type' => Controls_Manager::COLOR,
        'default' => '#fff',
        'selectors' => [
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product, {{WRAPPER}} .foodlymentor-product-grid .icons-wrap.block-box-style' => 'background-color: {{VALUE}};',
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product.foodlymentor-product-list-preset-4 .product-details-wrap' => 'background-color: {{VALUE}};',
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product.foodlymentor-product-list-preset-3, {{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product.foodlymentor-product-list-preset-4'
            => 'background-color: transparent;',
        ],
        'conditions' => [
            'relation' => 'and',
            'terms' => [
                [
                    'name' => 'foodlymentor_product_grid_layout',
                    'operator' => 'in',
                    'value' => [
                        'grid',
                        'list',
                        'masonry',
                    ],
                ],
            ],
        ],
    ]
);

$this->add_control(
    'foodlymentor_product_grid_border_color',
    [
        'label' => esc_html__('Border Color', 'foodlymentor'),
        'type' => Controls_Manager::COLOR,
        'default' => '#ada8a8',
        'selectors' => [
            '{{WRAPPER}} .foodlymentor-product-grid .price-wrap, {{WRAPPER}} .foodlymentor-product-grid .title-wrap' => 'border-color: {{VALUE}};',
        ],
        'conditions' => [
            'relation' => 'and',
            'terms' => [
                [
                    'name' => 'foodlymentor_product_grid_layout',
                    'operator' => '!in',
                    'value' => [
                        'grid',
                        'masonry',
                    ],
                ],
            ],
        ],
    ]
);

$this->add_responsive_control(
    'foodlymentor_peoduct_grid_padding',
    [
        'label' => __('Padding', 'foodlymentor'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors' => [
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'conditions' => [
            'relation' => 'and',
            'terms' => [
                [
                    'name' => 'foodlymentor_product_grid_layout',
                    'operator' => '!=',
                    'value' => [
                        'list',
                    ],
                ],
            ],
        ],
    ]
);

$this->start_controls_tabs('foodlymentor_product_grid_tabs', [
    'conditions' => [
        'relation' => 'or',
        'terms' => [
            [
                'name' => 'foodlymentor_product_grid_layout',
                'operator' => 'in',
                'value' => [
                    'grid',
                    'mesonry',
                ]
            ],
        ]
    ],
]);

$this->start_controls_tab('foodlymentor_product_grid_tabs_normal', ['label' => esc_html__('Normal', 'foodlymentor')]);

$this->add_group_control(
    Group_Control_Border::get_type(),
    [
        'name' => 'foodlymentor_peoduct_grid_border',
        'fields_options' => [
            'border' => [
                'default' => 'solid',
            ],
            'width' => [
                'default' => [
                    'top' => '1',
                    'right' => '1',
                    'bottom' => '1',
                    'left' => '1',
                    'isLinked' => false,
                ],
            ],
            'color' => [
                'default' => '#eee',
            ],
        ],
        'selector' => '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product',
        'condition' => [],
    ]
);

$this->add_group_control(
    \Elementor\Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'foodlymentor_peoduct_grid_shadow',
        'label' => __('Box Shadow', 'foodlymentor'),
        'selector' => '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product',
    ]
);


$this->end_controls_tab();

$this->start_controls_tab('foodlymentor_product_grid_hover_styles', ['label' => esc_html__('Hover', 'foodlymentor')]);

$this->add_control(
    'foodlymentor_product_grid_hover_border_color',
    [
        'label' => esc_html__('Border Color', 'foodlymentor'),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product:hover' => 'border-color: {{VALUE}};',
        ],
        'condition' => [
            'foodlymentor_peoduct_grid_border_border!' => '',
        ],
    ]
);
$this->add_group_control(
    Group_Control_Box_Shadow::get_type(),
    [
        'name' => 'foodlymentor_product_grid_box_shadow_hover',
        'label' => __('Box Shadow', 'foodlymentor'),
        'selector' => '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product:hover',
    ]
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->add_control(
    'foodlymentor_peoduct_grid_border_radius',
    [
        'label' => esc_html__('Border Radius', 'foodlymentor'),
        'type' => Controls_Manager::DIMENSIONS,
        'selectors' => [
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
            '{{WRAPPER}} .foodlymentor-product-grid .woocommerce ul.products li.product woocommerce-loop-product__link img' => 'border-radius: {{TOP}}px {{RIGHT}}px 0 0;',
            '{{WRAPPER}} .foodlymentor-product-grid.list .woocommerce ul.products li.product .woocommerce-loop-product__link img' => 'border-radius: {{TOP}}px 0 0 {{LEFT}}px;',
        ],
    ]
);

$this->add_responsive_control(
    'foodlymentor_product_grid_image_width',
    [
        'label' => esc_html__('Image Width(%)', 'foodlymentor'),
        'type' => Controls_Manager::SLIDER,
        'range' => [
            '%' => [
                'max' => 50,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .foodlymentor-product-grid.list .foodlymentor-product-wrap .product-image-wrap' => 'width: {{SIZE}}%;',
        ],
        'condition' => [
            'foodlymentor_product_grid_layout' => 'list',
        ],
        'separator' => 'before',
    ]
);

$this->add_control(
    'foodlymentor_product_grid_details_heading',
    [
        'label' => __('Product Details', 'foodlymentor'),
        'type' => Controls_Manager::HEADING,
        'separator' => 'before',
        'conditions' => [
            'relation' => 'and',
            'terms' => [
                [
                    'name' => 'foodlymentor_product_grid_layout',
                    'operator' => 'in',
                    'value' => [
                        'grid',
                        'list',
                    ],
                ],
            ],
        ],
    ]
);

$this->add_responsive_control(
    'foodlymentor_product_grid_details_alignment',
    [
        'label' => __('Alignment', 'foodlymentor'),
        'type' => Controls_Manager::CHOOSE,
        'options' => [
            'left' => [
                'title' => __('Left', 'foodlymentor'),
                'icon' => 'eicon-text-align-left',
            ],
            'center' => [
                'title' => __('Center', 'foodlymentor'),
                'icon' => 'eicon-text-align-center',
            ],
            'right' => [
                'title' => __('Right', 'foodlymentor'),
                'icon' => 'eicon-text-align-right',
            ],
        ],
        'default' => 'center',
        'selectors' => [
            '{{WRAPPER}} .foodlymentor-product-grid .product-details-wrap' => 'text-align: {{VALUE}};',
        ],
        'conditions' => [
            'relation' => 'and',
            'terms' => [
                [
                    'name' => 'foodlymentor_product_grid_layout',
                    'operator' => '!=',
                    'value' => [
                        'list',
                    ],
                ],
            ],
        ],
    ]
);

$this->add_responsive_control(
    'foodlymentor_product_grid_inner_padding',
    [
        'label' => __('Padding', 'foodlymentor'),
        'type' => Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%'],
        'range' => [
            'px' => [
                'min' => 0,
                'max' => 100,
                'step' => 1,
            ],
            '%' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'default' => [
            'top' => '15',
            'right' => '15',
            'bottom' => '15',
            'left' => '15',
            'unit' => 'px',
            'isLinked' => true,
        ],
        'selectors' => [
            '{{WRAPPER}} .foodlymentor-product-grid.grid .foodlymentor-product-wrap .product-details-wrap, {{WRAPPER}} .foodlymentor-product-grid.masonry .foodlymentor-product-wrap .product-details-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'conditions' => [
            'relation' => 'and',
            'terms' => [
                [
                    'name' => 'foodlymentor_product_grid_layout',
                    'operator' => '!=',
                    'value' => [
                        'list',
                    ],
                ],
            ],
        ],
    ]
);

$this->add_responsive_control(
    'foodlymentor_product_list_padding',
    [
        'label' => esc_html__('Padding (PX)', 'foodlymentor'),
        'type' => Controls_Manager::SLIDER,
        'range' => [
            'px' => [
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .foodlymentor-product-grid.list .foodlymentor-product-list-preset-1 .foodlymentor-product-wrap .product-details-wrap, {{WRAPPER}} .foodlymentor-product-grid.list .foodlymentor-product-list-preset-4 .foodlymentor-product-wrap .product-details-wrap' => 'padding: {{SIZE}}px;',
            '{{WRAPPER}} .foodlymentor-product-grid.list .foodlymentor-product-list-preset-2 .foodlymentor-product-wrap' => 'padding: {{SIZE}}px;',
            '{{WRAPPER}} .foodlymentor-product-grid.list .foodlymentor-product-list-preset-2 .foodlymentor-product-wrap .product-details-wrap' => 'padding: 0 0 0 {{SIZE}}px;',
            '{{WRAPPER}} .foodlymentor-product-grid.list .foodlymentor-product-list-preset-3 .foodlymentor-product-wrap .product-details-wrap' => 'padding: 0 0 0 {{SIZE}}px;',
        ],
        'condition' => [
            'foodlymentor_product_grid_layout' => 'list',
        ],
    ]
);

$this->add_responsive_control(
    'foodlymentor_product_list_content_width',
    [
        'label' => esc_html__('Width (%)', 'foodlymentor'),
        'type' => Controls_Manager::SLIDER,
        'range' => [
            '%' => [
                'max' => 100,
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .foodlymentor-product-grid.list .foodlymentor-product-wrap .product-details-wrap' => 'width: {{SIZE}}%;',
        ],
        'condition' => [
            'foodlymentor_product_grid_layout' => 'list',
        ],
    ]
);

$this->end_controls_section();
