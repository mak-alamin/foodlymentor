<?php

namespace Inc\Traits\Elementor;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;

trait Controls
{
    public function box_controls($unique_id = '', $selectors = array(), $disable_controls = array())
    {
        $bg_selectors = array();
        $padding_selectors = array();

        foreach ($selectors as $key => $selector) {
            $bg_selectors['{{WRAPPER}} ' . $selector] = 'background-color: {{VALUE}};';

            $padding_selectors['{{WRAPPER}} ' . $selector] = 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};';
        }

        // Background Color
        $this->add_control(
            'foodlymentor_' . $unique_id . '_bg_color',
            [
                'label' => esc_html__('Background Color', 'foodlymentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => $bg_selectors,
            ]
        );

        // Padding
        $this->add_responsive_control(
            'foodlymentor_' . $unique_id . '_padding',
            [
                'label' => __('Padding', 'foodlymentor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => $padding_selectors,
            ]
        );

        // Border
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'foodlymentor_' . $unique_id . '_border',
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
    }
}
