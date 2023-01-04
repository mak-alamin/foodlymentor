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

$this->start_controls_tabs('foodlymentor_cat_menu_items');

$this->start_controls_tab('foodlymentor_cat_menu_items_tabs_normal', ['label' => esc_html__('Normal', 'foodlymentor')]);

$this->color_typography_controls('cat_menu_items', array(
    '.foodlymentor_cat_menu_list a',
));

$this->box_controls(
    'cat_menu_items',
    array(
        '.foodlymentor_cat_menu_list a',
    )
);

$this->end_controls_tab();

$this->start_controls_tab('foodlymentor_cat_menu_items_tabs_active', ['label' => esc_html__('Active', 'foodlymentor')]);

$this->color_typography_controls('cat_menu_items_active', array(
    '.foodlymentor_cat_menu_list a.active',
));

$this->box_controls(
    'cat_menu_items_active',
    array(
        '.foodlymentor_cat_menu_list a.active',
    )
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();
