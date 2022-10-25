<?php

$this->page_id = get_the_ID();

$settings = $this->get_settings_for_display();

// normalize for load more fix
$settings['layout_mode']    = $settings["foodlymentor_product_grid_layout"];
$widget_id                  = $this->get_id();
$settings['foodlymentor_widget_id'] = $widget_id;

$args = $this->build_product_query($settings);

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

        $query = new \WP_Query($args);

        if ($query->have_posts()) {
            $found_posts        = $query->found_posts;
            $max_page           = ceil($found_posts / absint($args['posts_per_page']));
            $args['max_page']   = $max_page;
            $args['total_post'] = $found_posts;

            printf('<ul class="products" data-layout-mode="%s">', esc_attr($settings["foodlymentor_product_grid_layout"]));

            // echo '<pre>';
            // print_r($query->posts);
            // echo '</pre>';
            // die();

            foreach ($query->posts as $key => $product) {
                echo '<li class="product">';

                echo '<a href="#" data-product_id="' . $product->ID . '">';
                echo get_the_post_thumbnail($product->ID);
                echo '</a>';

                echo '<a href="#" data-product_id="' . $product->ID . '">';

                echo '<div class="product__desc">';

                echo '<h2 class="woocommerce-loop-product__title">' . $product->post_title . '</h2>';

                echo '<p class="woocommerce-loop-product__excerpt">' . $product->post_excerpt . '</p>';

                echo '</div>';

                echo '</a>';

                echo '</li>';
            }
            wp_reset_postdata();

            echo '</ul>';
        } else {
            _e('<p class="no-posts-found">No posts found!</p>', 'foodlymentor');
        }
        ?>
    </div>
</div>