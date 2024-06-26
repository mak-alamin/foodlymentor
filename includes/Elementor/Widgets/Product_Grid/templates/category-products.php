<?php

$taxonomy     = 'product_cat';
$orderby      = 'name';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no  
$title        = '';
$empty        = 0;

$cat_args = array(
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title,
    'hide_empty'   => $empty
);

$all_categories = get_categories($cat_args);

foreach ($all_categories as $cat) {
    if ($cat->category_parent == 0) {
        $category_id = $cat->term_id;

        $args = $this->build_product_query($settings, $cat->slug);

        $query = new \WP_Query($args);

        if (!$query->have_posts()) {
            continue;
        }

        echo '<h3 class="category-text" id="' . $cat->slug . '"><a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a></h3>';

        printf('<ul class="products" data-layout-mode="%s">', esc_attr($settings["foodlymentor_product_grid_layout"]));

        foreach ($query->posts as $key => $post) {

            $product = wc_get_product($post->ID);

            $post_link = get_the_permalink($post->ID);

            echo '<li class="product" data-product_id="' . $post->ID . '">';

            echo '<a href="' . $post_link . '" class="product__img" />';
            echo get_the_post_thumbnail($post->ID);
            echo '</a>';

            echo '<a href="' . $post_link . '" class="product__desc">';

            echo '<h2 class="woocommerce-loop-product__title">' . mb_strimwidth($post->post_title, 0, 14, '...') . '</h2>';

            echo '<p class="woocommerce-loop-product__excerpt">' . mb_strimwidth($post->post_excerpt, 0, 30, '...') . '</p>';

            echo '<p class="woocommerce-loop-product__price">' . $product->get_price_html()  . '</p>';

            echo '<span class="eicon-plus"><span>';

            echo '</a>';

            echo '<div class="lds-dual-ring"></div>';

            echo '</li>';
        }
        wp_reset_postdata();

        echo '</ul>';
    }
}
