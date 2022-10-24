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
        return ['cart', 'shop'];
    }

    protected function render()
    {
        // echo '<pre>';
        // print_r(WC());
        // echo '</pre>';
        // die();

        echo  '<div class="widget_shopping_cart_content">';

        if (empty(WC()->cart)) {
            echo '<p>Cart is empty.</p>';
        } else {
            echo woocommerce_mini_cart();

            // WC_AJAX::get_refreshed_fragments();
        }

        echo '</div>';
    }
}
