<?php

/**
 * More Menu Button, Items, Dropdown Style Controls
 */

use Elementor\Controls_Manager;

// More Button
$this->start_controls_section(
    'foodlymentor_more_button_styles',
    [
        'label' => esc_html__('More Button', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs('foodlymentor_more_button');

$this->start_controls_tab('foodlymentor_more_button_tabs_normal', ['label' => esc_html__('Normal', 'foodlymentor')]);

$this->color_typography_controls(
    array(
        'id' => 'more_button',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_cat_menu_list .more-menu-filter button',
        )
    )
);

$this->box_controls(
    array(
        'id' => 'more_button',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_cat_menu_list .more-menu-filter button',
        )
    )
);

$this->end_controls_tab();

$this->start_controls_tab('foodlymentor_more_button_tabs_active', ['label' => esc_html__('Active', 'foodlymentor')]);

$this->color_typography_controls(
    array(
        'id' => 'more_button_active',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_cat_menu_list .more-menu-filter button.active',
        )
    )
);

$this->box_controls(
    array(
        'id' => 'more_button_active',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_cat_menu_list .more-menu-filter button.active',
        )
    )
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();
// More Button ends


// More Menu Dropdown
$this->start_controls_section(
    'foodlymentor_more_dropdown_styles',
    [
        'label' => esc_html__('More Dropdown', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);


$this->box_controls(
    array(
        'id' => 'more_menu_dropdown',
        'selectors' => array(
            '{{WRAPPER}} #moreDropdown',
        )
    )
);

$this->end_controls_section();
// More Menu Dropdown ends

// More Menu Items
$this->start_controls_section(
    'foodlymentor_more_menu_items_styles',
    [
        'label' => esc_html__('More Menu Items', 'foodlymentor'),
        'tab' => Controls_Manager::TAB_STYLE,
    ]
);

$this->start_controls_tabs('foodlymentor_more_menu_items');

$this->start_controls_tab('foodlymentor_more_menu_items_tabs_normal', ['label' => esc_html__('Normal', 'foodlymentor')]);

$this->color_typography_controls(
    array(
        'id' => 'more_menu_items',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_cat_menu_list .more-menu-filter a',
        )
    )
);

$this->box_controls(
    array(
        'id' => 'more_menu_items',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_cat_menu_list .more-menu-filter a',
        )
    )
);

$this->end_controls_tab();


$this->start_controls_tab('foodlymentor_more_menu_items_tabs_active', ['label' => esc_html__('Active', 'foodlymentor')]);

$this->color_typography_controls(
    array(
        'id' => 'more_menu_items_active',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_cat_menu_list .more-menu-filter a.active',
        )
    )
);

$this->box_controls(
    array(
        'id' => 'more_menu_items_active',
        'selectors' => array(
            '{{WRAPPER}} .foodlymentor_cat_menu_list .more-menu-filter a.active',
        )
    )
);

$this->end_controls_tab();

$this->end_controls_tabs();

$this->end_controls_section();
// More Menu Items ends