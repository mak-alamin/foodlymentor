<?php

/**
 * Menu Items Style Controls
 */

use Elementor\Controls_Manager;

$this->start_controls_section(
    'foodlymentor_more_menu_items_styles',
    [
        'label' => esc_html__('More Menu Items', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->color_typography_controls('more_menu_items', array(
    '.foodlymentor_cat_menu_list .more-menu-filter a',
));

$this->box_controls(
    'more_menu_items',
    array(
        '.foodlymentor_cat_menu_list .more-menu-filter a',
    )
);

$this->end_controls_section();
