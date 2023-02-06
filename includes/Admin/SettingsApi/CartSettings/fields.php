<?php

// Floating Cart Icon field
add_settings_field(
    'cart_icon_float',                    // ID
    'Floating Cart Icon',                 // Label
    [$callback, 'float_cart_icon'],       // callback
    'foodlymentor-settings',              // On which page
    'cart_settings_section',              // On which section
    array('')                             // Callback $args
);

// Register Floating Cart Icon field
register_setting(
    'foodly_cart_settings', // Option group
    'cart_icon_float',      // Option name
);

// Side Cart Activation field
add_settings_field(
    'activate_side_cart',                    // ID
    'Side Cart',                             // Label
    [$callback, 'activate_side_cart'],       // callback
    'foodlymentor-settings',                 // On which page
    'cart_settings_section',                 // On which section
    array('Activate Side Cart')              // Callback $args
);

// Register Side Cart Activation field
register_setting(
    'foodly_cart_settings', // Option group
    'activate_side_cart',   // Option name
);
