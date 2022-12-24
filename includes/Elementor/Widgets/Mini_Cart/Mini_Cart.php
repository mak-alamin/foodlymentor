<?php

/**
 * @package  Foodlymentor
 */

namespace Inc\Elementor\Widgets\Mini_Cart;

class Mini_Cart extends \Elementor\Widget_Base
{

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

    protected function render()
    {
        echo  '<div class="foodlymentor_shopping_cart_content">';

        if (empty(WC()->cart)) {
            echo '<p>Cart is empty.</p>';
        } else {
            echo '<h2 class="cart-title">' .  _x('Your Order', 'foodlymentor') . '</h2>';

            echo woocommerce_mini_cart();

            // \WC_AJAX::get_refreshed_fragments();
        }

        echo '</div>';
    }
}
