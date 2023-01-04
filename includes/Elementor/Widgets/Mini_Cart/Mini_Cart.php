<?php

/**
 * -------------------------------
 * 
 * Mini_Cart Widget Class
 * 
 * @package  Foodlymentor
 * 
 * -------------------------------
 */

namespace Inc\Elementor\Widgets\Mini_Cart;

class Mini_Cart extends \Elementor\Widget_Base
{
    use \Inc\Traits\Elementor\Controls;

    public function get_name()
    {
        return 'foodlymentor_cart';
    }

    public function get_title()
    {
        return esc_html__('Mini Cart', 'foodlymentor');
    }

    public function get_icon()
    {
        return 'eicon-cart';
    }

    public function get_categories()
    {
        return ['foodlymentor-widgets-elementor'];
    }

    public function get_keywords()
    {
        return ['cart', 'shop', 'food', 'foodlymentor'];
    }

    public function get_style_depends()
    {
        return [
            'frontend-common',
            'widget-cart',
        ];
    }

    public function get_script_depends()
    {
        return [
            'widget-main',
            'widget-product-cart',
        ];
    }

    public function register_controls()
    {
        $this->require_control_files(__DIR__);
    }

    protected function render()
    {
        require_once __DIR__ . '/render.php';
    }
}
