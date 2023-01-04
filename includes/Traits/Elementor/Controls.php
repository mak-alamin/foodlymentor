<?php

namespace Inc\Traits\Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;

trait Controls
{
    public function require_control_files($dir)
    {
        $content_controls = array_diff(scandir($dir . '/controls/content-controls'), array('.', '..'));

        $style_controls = array_diff(scandir($dir . '/controls/style-controls'), array('.', '..'));

        foreach ($content_controls as $key => $file) {
            require_once $dir . '/controls/content-controls/' . $file;
        }

        foreach ($style_controls as $key => $file) {
            require_once $dir . '/controls/style-controls/' . $file;
        }
    }

    /**
     * Color & Typography Controls
     * 
     * @return void
     */
    public function color_typography_controls($element_name = '', $selectors = array(), $disable_controls = array())
    {
        $color_selectors = array();
        $align_selectors = array();

        foreach ($selectors as $key => $selector) {
            $color_selectors['{{WRAPPER}} ' . $selector] = 'color: {{VALUE}};';
            $align_selectors['{{WRAPPER}} ' . $selector] = 'text-align: {{VALUE}};';
        }

        // Color
        $this->add_control(
            'foodlymentor_' . $element_name . '_color',
            [
                'label' => __('Text Color', 'foodlymentor'),
                'type' => Controls_Manager::COLOR,
                'size_units' => ['px', '%', 'em'],
                'selectors' => $color_selectors,
            ]
        );

        // Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'foodlymentor_' . $element_name . '_typography',
                'selector' => '{{WRAPPER}} ' . $selectors[0],
            ]
        );

        // Alignment
        if (!in_array('alignment', $disable_controls)) {
            $this->add_control(
                'foodlymentor_' . $element_name . '_alignment',
                [
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'label' => esc_html__('Alignment', 'foodlymentor'),
                    'options' => [
                        'left' => [
                            'title' => esc_html__('Left', 'foodlymentor'),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => esc_html__('Center', 'foodlymentor'),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => esc_html__('Right', 'foodlymentor'),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'selectors' => $align_selectors,
                ]
            );
        }
    }

    /**
     * CSS Box Style controls
     * 
     * @return void
     */
    public function box_controls($element_name = '', $selectors = array(), $disable_controls = array())
    {
        $bg_selectors = array();
        $padding_selectors = array();
        $margin_selectors = array();
        $border_radius_selectors = array();

        foreach ($selectors as $key => $selector) {
            $bg_selectors['{{WRAPPER}} ' . $selector] = 'background-color: {{VALUE}};';

            $padding_selectors['{{WRAPPER}} ' . $selector] = 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};';

            $margin_selectors['{{WRAPPER}} ' . $selector] = 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};';

            $border_radius_selectors['{{WRAPPER}} ' . $selector] = 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};';
        }

        // Background Color
        $this->add_control(
            'foodlymentor_' . $element_name . '_bg_color',
            [
                'label' => esc_html__('Background Color', 'foodlymentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => $bg_selectors,
            ]
        );

        // Padding
        $this->add_responsive_control(
            'foodlymentor_' . $element_name . '_padding',
            [
                'label' => __('Padding', 'foodlymentor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'em'],
                'selectors' => $padding_selectors,
            ]
        );

        // Margin
        $this->add_responsive_control(
            'foodlymentor_' . $element_name . '_margin',
            [
                'label' => __('Margin', 'foodlymentor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'em'],
                'selectors' => $margin_selectors,
            ]
        );

        // Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'foodlymentor_' . $element_name . '_border',
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
                'selector' => '{{WRAPPER}} ' . $selectors[0]
            ]
        );

        // Border Radius
        $this->add_responsive_control(
            'foodlymentor_' . $element_name . '_border_radius',
            [
                'label' => __('Border Radius', 'foodlymentor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'rem', 'em'],
                'selectors' => $border_radius_selectors,
            ]
        );
    }

    /**
     * --------------------------------
     * Size Controls
     * --------------------------------
     */
    public function size_controls($element_name = '', $selector = '', $disable_controls = array())
    {
        $this->add_control(
            'foodlymentor_' . $element_name . '_width',
            [
                'label' => esc_html__('Width', 'foodlymentor'),
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
                    ]
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        if (!in_array('height', $disable_controls)) {
            $this->add_control(
                'foodlymentor_' . $element_name . '_height',
                [
                    'label' => esc_html__('Height', 'foodlymentor'),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px', '%'],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} ' . $selector => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
        }
    }

    public function position_controls($element_name = '', $selector = '', $disable_controls = array())
    {
        $this->add_control(
            'foodlymentor_' . $element_name . '_top',
            [
                'label' => esc_html__('Vertical Offset', 'foodlymentor'),
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
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'foodlymentor_' . $element_name . '_left',
            [
                'label' => esc_html__('Horizontal Offset', 'foodlymentor'),
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
                    'unit' => '%',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}} ' . $selector => 'left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
    }
}
