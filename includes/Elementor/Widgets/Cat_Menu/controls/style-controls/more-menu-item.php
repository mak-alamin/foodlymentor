<?php

/**
 * More Menu Items Style Controls
 */

use Elementor\Controls_Manager;


$this->start_controls_section(
    'foodlymentor_more_button_styles',
    [
        'label' => esc_html__('More Button', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs('foodlymentor_more_button');

$this->start_controls_tab('foodlymentor_more_button_tabs_normal', ['label' => esc_html__('Normal', 'foodlymentor')]);

$this->color_typography_controls('more_button', array(
    '.foodlymentor_cat_menu_list .more-menu-filter button',
));

$this->box_controls(
    'more_button',
    array(
        '.foodlymentor_cat_menu_list .more-menu-filter button',
    )
);

$this->end_controls_tab();


$this->start_controls_tab('foodlymentor_more_button_tabs_active', ['label' => esc_html__('Active', 'foodlymentor')]);

$this->color_typography_controls('more_button_active', array(
    '.foodlymentor_cat_menu_list .more-menu-filter button.active',
));

$this->box_controls(
    'more_button_active',
    array(
        '.foodlymentor_cat_menu_list .more-menu-filter button.active',
    )
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();

$this->start_controls_section(
    'foodlymentor_more_menu_items_styles',
    [
        'label' => esc_html__('More Menu Items', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs('foodlymentor_more_menu_items');

$this->start_controls_tab('foodlymentor_more_menu_items_tabs_normal', ['label' => esc_html__('Normal', 'foodlymentor')]);

$this->color_typography_controls('more_menu_items', array(
    '.foodlymentor_cat_menu_list .more-menu-filter a',
));

$this->box_controls(
    'more_menu_items',
    array(
        '.foodlymentor_cat_menu_list .more-menu-filter a',
    )
);

$this->end_controls_tab();


$this->start_controls_tab('foodlymentor_more_menu_items_tabs_active', ['label' => esc_html__('Active', 'foodlymentor')]);

$this->color_typography_controls('more_menu_items_active', array(
    '.foodlymentor_cat_menu_list .more-menu-filter a.active',
));

$this->box_controls(
    'more_menu_items_active',
    array(
        '.foodlymentor_cat_menu_list .more-menu-filter a.active',
    )
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();
