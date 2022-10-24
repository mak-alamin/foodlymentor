<?php

/**
 * @package  Foodlymentor
 */

namespace Inc\Elementor;

use Inc\Elementor\Widgets\Mini_Cart\Mini_Cart;
use Inc\Elementor\Widgets\Product_Grid\Product_Grid;

class InitWidgets
{
    public function register()
    {
        add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories']);

        add_action('elementor/widgets/register', [$this, 'register_widgets']);

        // add_filter('woocommerce_add_to_cart_fragments', [$this, 'woo_cart_count_fragments'], 10, 1);

        // add_filter('woocommerce_add_to_cart_fragments', [$this, 'woo_cart_content_fragments'], 10, 1);
    }

    function add_elementor_widget_categories($elements_manager)
    {
        $elements_manager->add_category(
            'foodlymentor-widgets-elementor',
            [
                'title' => esc_html__('Foodlymentor Widgets', 'foodlymentor'),
                'icon' => 'fa fa-plug',
            ]
        );
    }

    function register_widgets($widgets_manager)
    {
        $widgets_manager->register(new Mini_Cart());
        $widgets_manager->register(new Product_Grid());
    }

    function woo_cart_count_fragments($fragments)
    {
        $fragments['span.exfd-cart-num'] = '<span class="exfd-cart-num">' . WC()->cart->get_cart_contents_count() . '</span>';

        return $fragments;
    }

    function woo_cart_content_fragments($fragments)
    {
        ob_start(); ?>
        <div class="exfd-cart-mini"><?php woocommerce_mini_cart(); ?></div>
<?php
        $fragments['div.exfd-cart-mini'] = ob_get_contents();
        ob_get_clean();
        return $fragments;
    }
}
