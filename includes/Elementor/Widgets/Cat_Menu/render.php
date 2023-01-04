<?php

$taxonomy     = 'product_cat';
$orderby      = 'name';
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no  
$title        = '';
$empty        = 0;

$args = array(
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title,
    'hide_empty'   => $empty
);

$all_categories = get_categories($args);

$settings = $this->get_settings_for_display();

$more_filter_html = '';

echo '<div class="foodlymentor_cat_menu_list">';

foreach ($all_categories as $key => $cat) {
    if ($key > 1) {
        $more_filter_html .= '<a href="#' . $cat->slug . '">' . $cat->name . '</a>';
        continue;
    }

    if ($cat->category_parent == 0) {
        echo '<a href="#' . $cat->slug . '">' . $cat->name . '</a>';
    }
}

echo '<div class="more-menu-filter dropdown">
<button class="dropbtn">' . _x('More...', 'woocommerce-food') . '</button>
<div id="moreDropdown" class="dropdown-content"> ' . $more_filter_html . ' </div>
</div>';

echo '</div>';
