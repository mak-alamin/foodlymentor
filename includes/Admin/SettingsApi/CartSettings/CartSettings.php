<?php

/**
 * @package  Foodlymentor
 */

namespace Inc\Admin\SettingsApi\CartSettings;

class CartSettings
{
    public function register()
    {
        add_action('admin_init', [$this, 'register_settings']);
    }

    public function register_settings()
    {
        // Cart section
        add_settings_section(
            'cart_settings_section',          // ID 
            'Cart',                           // Title
            [$this, 'cart_options_callback'], // Callback for description
            'foodlymentor-settings'           // On which Page
        );

        $callback = new FieldCallbacks();

        require_once __DIR__ . '/fields.php';
    }

    /** 
     * Cart Section callback for description 
     */
    function cart_options_callback()
    {
        echo '<p>Manage cart options.</p>';
    }
}
