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
        wp_enqueue_script('widget-main');

        add_action('wp_footer', [$this, 'inject_floating_cart_icon']);
        add_action('wp_footer', [$this, 'inject_side_cart']);
    }

    /**
     * Side Cart
     */
    public function inject_side_cart()
    {
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
