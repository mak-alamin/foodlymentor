<?php

/**
 * @package  Foodlymentor
 */

namespace Inc;

class Frontend
{
    public function register()
    {
        wp_enqueue_style('frontend-common');
        wp_enqueue_style('widget-cart');
        wp_enqueue_script('widget-main');

        add_action('wp_footer', [$this, 'inject_floating_cart_icon']);
        add_action('wp_footer', [$this, 'inject_side_cart']);
    }

    /**
     * Side Cart
     */
    public function inject_side_cart()
    {
        $activated =  empty(get_option('activate_side_cart')) ? 0 : get_option('activate_side_cart');

        if (!$activated) {
            return;
        }

        wp_enqueue_script('widget-mini-cart');

        $cart_title = empty(get_option('foodlymentor_cart_title')) ? _x('Your Cart', 'foodlymentor') : get_option('foodlymentor_cart_title');

        $controls['cart_title'] = $cart_title;

        echo '<div class="foodlymentor_shopping_cart-side_cart">';

        echo '<div class="foodlymentor_shopping_cart_content">';

        echo '<span class="close-cart  eicon-close"></span>';

        foodlymentor_get_cart($controls);

        echo '</div></div>';
    }

    public function inject_floating_cart_icon()
    {
        $floating_option =  empty(get_option('cart_icon_float')) ? 'none' : get_option('cart_icon_float');

        if ($floating_option == 'none') {
            return;
        }

        echo '<div class="foodlymentor_floating_cart ' . $floating_option . '">';

        foodlymentor_get_cart_icon();

        echo '</div>';
    }
}
