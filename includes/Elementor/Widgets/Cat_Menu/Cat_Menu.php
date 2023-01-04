<?php

/**
 * ----------------------------------------------
 * Cat_Menu Widget Class
 * 
 * @package  Foodlymentor
 * ----------------------------------------------
 */

namespace Inc\Elementor\Widgets\Cat_Menu;

use Elementor\Widget_Base;

class Cat_Menu extends Widget_Base
{
    use \Inc\Traits\Elementor\Controls;

    protected $page_id;

    public function get_name()
    {
        return 'foodlymentor_cat_menu';
    }

    public function get_title()
    {
        return esc_html__('Category Menu', 'foodlymentor');
    }

    public function get_icon()
    {
        return 'eicon-navigation-horizontal';
    }

    public function get_categories()
    {
        return ['foodlymentor-widgets-elementor'];
    }

    public function get_keywords()
    {
        return ['product', 'shop', 'food', 'foodlymentor'];
    }

    protected function register_controls()
    {
        $this->require_control_files(__DIR__);
    }

    public function get_style_depends()
    {
        return [
            'frontend-common',
            'widget-cat-menu',
        ];
    }

    public function get_script_depends()
    {
        return ['widget-cat-menu'];
    }

    protected function render()
    {
        require_once __DIR__ . '/render.php';
    }
}
