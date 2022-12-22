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
        $addi_options =  str_replace('\"', '"', $_REQUEST['addi_options']);

        $cart_item_data['addi_options'] = json_decode($addi_options, true);

        return $cart_item_data;
    }


    function display_extra_data_on_cart($item_data, $cart_item)
    {
        // echo '<pre>';
        // print_r($cart_item);
        // echo '</pre>';


        // $item_data[] = array(
        //     'key'   => "Test",
        //     'value' => "Value",
        // );

        // return $item_data;

        if (isset($cart_item['addi_options']) && !empty($cart_item['addi_options'])) {

            foreach ($cart_item['addi_options'] as $key => $option) {
                $item_data[] = array(
                    'key'   => $option['name'],
                    'value' => $option['quantity'],
                );
            }
        }

        return $item_data;
    }
}
