<?php

$this->page_id = get_the_ID();

$settings = $this->get_settings_for_display();

// normalize for load more fix
$settings['layout_mode']    = $settings["foodlymentor_product_grid_layout"];
$widget_id                  = $this->get_id();
$settings['foodlymentor_widget_id'] = $widget_id;

// render dom
$this->add_render_attribute('wrap', [
    'class'          => [
        "foodlymentor-product-grid",
        $settings['foodlymentor_product_grid_layout']
    ],
    'data-widget-id' => $widget_id,
    'data-page-id'   => $this->page_id,
    'data-nonce'     => wp_create_nonce('foodlymentor_product_grid'),
]);

?>

<div <?php $this->print_render_attribute_string('wrap'); ?>>
    <div class="woocommerce">
        <?php

        $found_posts = 0;

        $settings['foodlymentor_page_id'] = $this->page_id ? $this->page_id : get_the_ID();

        $product_show_style = $settings['foodlymentor_product_show_style'];

        if ($product_show_style == 'cat-products') {
            require_once __DIR__ . '/templates/category-products.php';
        } else {
            require_once __DIR__ . '/templates/only-products.php';
        }
        ?>
    </div>
</div>