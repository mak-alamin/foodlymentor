<?php

$args = $this->build_product_query($settings);
$query = new \WP_Query($args);

if ($query->have_posts()) {
    printf('<ul class="products" data-layout-mode="%s">', esc_attr($settings["foodlymentor_product_grid_layout"]));

    foreach ($query->posts as $key => $post) {

        $product = wc_get_product($post->ID);

        $post_link = get_the_permalink($post->ID);

        echo '<li class="product">';

        echo '<a href="' . $post_link . '" data-product_id="' . $post->ID . '" class="product__img" />';
        echo get_the_post_thumbnail($post->ID);
        echo '</a>';

        echo '<a href="' . $post_link . '" data-product_id="' . $post->ID . '" class="product__desc">';

        echo '<h2 class="woocommerce-loop-product__title">' . $post->post_title . '</h2>';

        echo '<p class="woocommerce-loop-product__excerpt">' . $post->post_excerpt . '</p>';

        echo '<p class="woocommerce-loop-product__price">' . $product->get_price_html()  . '</p>';

        echo '<span class="eicon-plus"><span>';

        echo '</a>';

        echo '</li>';
    }
    wp_reset_postdata();

    echo '</ul>';
} else {
    _e('<p class="no-posts-found">No products found!</p>', 'foodlymentor');
}
