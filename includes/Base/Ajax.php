<?php

/**
 * @package  Foodlymentor
 */

namespace Inc\Base;

class Ajax
{
    public function register()
    {
        add_action('wp_ajax_get_woo_product_data', [$this, 'get_woo_product_data']);
        add_action('wp_ajax_nopriv_get_woo_product_data', [$this, 'get_woo_product_data']);
    }

    function get_woo_product_data()
    {
        $product_id = intval($_REQUEST['product_id']);

        $product = wc_get_product($product_id);

        $product_info = [];

        $product_info['name'] = $product->get_name();

        $product_info['short_desc'] = $product->get_short_description();

        $product_info['add_to_cart_url'] = $product->add_to_cart_url();

        $product_info['add_to_cart_btn'] = do_shortcode('[add_to_cart id=' . $product_id . ']');

        wp_send_json($product_info);
    }
}
