<?php

/**
 * Menu Items Style Controls
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_cat_menu_items_styles',
    [
        'label' => esc_html__('Menu Items', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->color_typography_controls('cat_menu_items', array(
    '.foodlymentor_cat_menu_list a',
));

$this->box_controls(
    'cat_menu_items',
    array(
        '.foodlymentor_cat_menu_list a',
    )
);

$this->end_controls_section();
