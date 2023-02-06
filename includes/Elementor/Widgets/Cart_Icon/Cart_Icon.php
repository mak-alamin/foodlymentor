<?php

/**
 * ----------------------------------------------
 * Cart_Icon Widget Class
 * 
 * @package  Foodlymentor
 * ----------------------------------------------
 */

namespace Inc\Elementor\Widgets\Cart_Icon;

use Elementor\Widget_Base;

class Cart_Icon extends Widget_Base
{
    use \Inc\Traits\Elementor\Controls;

    public function get_name()
    {
        return 'foodlymentor_cart_menu';
    }

    public function get_title()
    {
        return esc_html__('Cart Icon', 'foodlymentor');
    }

    public function get_icon()
    {
        return 'eicon-bag-medium';
    }

    public function get_categories()
    {
        return ['foodlymentor-widgets-elementor'];
    }

    public function get_keywords()
    {
        return ['cart', 'shop', 'food', 'foodlymentor'];
    }

    protected function register_controls()
    {
        $this->require_control_files(__DIR__);
    }

    public function get_style_depends()
    {
        return [
            'widget-cart-icon',
        ];
    }

    public function get_script_depends()
    {
        return ['widget-product-cart'];
    }

    protected function render()
    {
        foodlymentor_get_cart_icon();
    }
}