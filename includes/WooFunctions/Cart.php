<?php

/**
 * -------------------------------------------------
 * WooFunctions Cart Class
 * 
 * @package  Foodlymentor
 * -------------------------------------------------
 */

namespace Inc\WooFunctions;

class Cart
{
    public function register()
    {
        add_filter('woocommerce_add_cart_item_data', [$this, 'add_extra_data_to_cart_item'], 10, 2);

        add_filter('woocommerce_get_item_data', [$this, 'display_extra_data_on_cart'], 10, 2);
    }


    function add_extra_data_to_cart_item($cart_item_data, $product_id)
    {
        $addi_options = json_decode(str_replace('\"', '"', $_REQUEST['addi_options']), true);

        $all_addi_options = get_post_meta($product_id, 'foodlymentor_addi_options', true);

        foreach ($addi_options as $key => $option) {
            $addi_options[$key]['price'] = $all_addi_options[$option['group_index']]['_options'][$option['index']]['price'];
        }

        // echo '<pre>';
        // print_r($addi_options);
        // print_r($all_addi_options);
        // echo '</pre>';
        // die();


        $cart_item_data['addi_options'] = $addi_options;

        return $cart_item_data;
    }


    function display_extra_data_on_cart($item_data, $cart_item)
    {
        if (isset($cart_item['addi_options']) && !empty($cart_item['addi_options'])) {
            foreach ($cart_item['addi_options'] as $key => $option) {
                $item_data[] = array(
                    'key'   => $option['name'],
                    'value' => $option['quantity'] . ' units (+ ' . get_woocommerce_currency_symbol() . intval($option['quantity']) * floatval($option['price']) . ' )',
                );
            }
        }

        return $item_data;
    }
}
