<?php

return array(
    // Page Foodlymentor
    array(
        'page_title' => 'Foodlymentor',
        'menu_title' => 'Foodlymentor',
        'capability' => 'manage_options',
        'menu_slug' => 'foodlymentor',
        'callback' => array($this->pages_callbacks, 'dashboardPage'),
        'icon_url' => 'dashicons-food',
        'position' => 110,
        'subpages' => array(
            array(
                'page_title' => 'Foodlymentor | Dashboard',
                'menu_title' => 'Dashboard',
                'menu_slug' => 'foodlymentor',
                'callback' => array($this->pages_callbacks, 'dashboardPage'),
            ),
            array(
                'page_title' => 'Foodlymentor | Widgets',
                'menu_title' => 'Widgets',
                'menu_slug' => 'foodlymentor-widgets',
                'callback' => array($this->pages_callbacks, 'widgetsPage'),
            ),
            array(
                'page_title' => 'Foodlymentor | Settings',
                'menu_title' => 'Settings',
                'menu_slug' => 'foodlymentor-settings',
                'callback' => array($this->pages_callbacks, 'settingsPage'),
            ),
        ),
    ),
);
