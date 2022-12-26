<?php

/**
 * -------------------------------------------------
 * Cart Class for WooHooks 
 * 
 * @package  Foodlymentor
 * -------------------------------------------------
 */

namespace Inc\WooHooks;

class Cart
{
    public function register()
    {
        add_filter('woocommerce_add_cart_item_data', [$this, 'add_extra_data_to_cart_item'], 10, 2);

        add_filter('woocommerce_get_item_data', [$this, 'display_extra_data_on_cart'], 10, 2);

        add_action('woocommerce_before_calculate_totals', [$this, 'add_additionals_price']);
    }

    function add_additionals_price($cart_object)
    {
        foreach ($cart_object->get_cart() as $hash => $value) {
            if (isset($value['addi_options']) && !empty(isset($value['addi_options']))) {

                $price = $value['data']->get_price();

                $extra_price = 0;

                foreach ($value['addi_options'] as $key => $option) {
                    $extra_price += intval($option['quantity']) * floatval($option['price']);
                }

                $new_price = $price + $extra_price;

                $value['data']->set_price($new_price);
            }
        }
    }

    function add_extra_data_to_cart_item($cart_item_data, $product_id)
    {
        $addi_options = json_decode(str_replace('\"', '"', $_REQUEST['addi_options']), true);

        $all_addi_options = get_post_meta($product_id, 'foodlymentor_addi_options', true);

        foreach ($addi_options as $key => $option) {
            $addi_options[$key]['price'] = $all_addi_options[$option['group_index']]['_options'][$option['index']]['price'];

            $addi_options[$key]['unit'] = $all_addi_options[$option['group_index']]['_options'][$option['index']]['unit'];
        }

        $cart_item_data['addi_options'] = $addi_options;

        return $cart_item_data;
    }

    function display_extra_data_on_cart($item_data, $cart_item)
    {
        if (isset($cart_item['addi_options']) && !empty($cart_item['addi_options'])) {
            $item_data[] = array(
                'key'   => '+ ' . _x('Additionals', 'foodlymentor'),
                'value' => ''
            );

            foreach ($cart_item['addi_options'] as $key => $option) {
                $item_data[] = array(
                    'key'   => $option['name'],
                    'value' => $option['quantity'] . ' ' . $option['unit'] . ' (+ ' . get_woocommerce_currency_symbol() . intval($option['quantity']) * floatval($option['price']) . ' )',
                );
            }
        }

        return $item_data;
    }
}
