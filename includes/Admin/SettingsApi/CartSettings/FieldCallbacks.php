<?php

/**
 * @package  Foodlymentor
 */

namespace Inc\Admin\SettingsApi\CartSettings;

class FieldCallbacks
{
    /** 
     * Floating Cart Icon Callback
     */
    function float_cart_icon($args)
    {
        $option =  empty(get_option('cart_icon_float')) ? 'none' : get_option('cart_icon_float');

        $html = '<label for="cart_icon_float"> '  . $args[0] . '</label>';

        $html .= '<select id="cart_icon_float" name="cart_icon_float">';
        $html .= '<option value="none" ' . selected($option, 'none', false) . ' > None </option>';
        $html .= '<option value="top_left" ' . selected($option, 'top_left', false) . '> Top Left </option>';
        $html .= '<option value="top_right" ' . selected($option, 'top_right', false) . '> Top Right </option>';
        $html .= '<option value="bottom_left" ' . selected($option, 'bottom_left', false) . '> Bottom Left </option>';
        $html .= '<option value="bottom_right" ' . selected($option, 'bottom_right', false) . '> Bottom Right </option>';
        $html .= '</select>';

        echo $html;
    }

    /**
     * Activate Side Cart callback
     */
    function activate_side_cart($args)
    {
        $option =  empty(get_option('activate_side_cart')) ? 0 : get_option('activate_side_cart');

        $html = '<input type="checkbox" value="1" id="activate_side_cart" name="activate_side_cart" ' . checked($option, 1, false) . ' />';
        $html .= '<label for="activate_side_cart"> '  . $args[0] . '</label>';

        echo $html;
    }
}
