<?php

/**
 * @package  Foodlymentor
 */

namespace Inc\Elementor\Widgets\Product_Grid;

use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Plugin;
use Elementor\Widget_Base;

class Product_Grid extends Widget_Base
{
    protected $page_id;

    public function get_name()
    {
        return 'foodlymentor_product_grid';
    }

    public function get_title()
    {
        return esc_html__('Products', 'foodlymentor');
    }

    public function get_icon()
    {
        return 'eicon-products';
    }

    public function get_categories()
    {
        return ['foodlymentor-widgets-elementor'];
    }

    public function get_keywords()
    {
        return ['product', 'shop'];
    }

    public function get_style_depends()
    {
        return [
            'widget-product-grid',
        ];
    }

    public function get_script_depends()
    {
        return [
            'widget-product-grid',
        ];
    }

    protected function register_controls()
    {
        // Content Controls
        $this->init_content_controls();


        // Style Controls
        $this->init_style_controls();
    }

    protected function render()
    {
        if (!function_exists('WC')) {
            return;
        }

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
            'id'             => 'foodlymentor-product-grid',
            'data-widget-id' => $widget_id,
            'data-page-id'   => $this->page_id,
            'data-nonce'     => wp_create_nonce('foodlymentor_product_grid'),
        ]);

?>

        <div <?php $this->print_render_attribute_string('wrap'); ?>>
            <div class="woocommerce">
                <?php

                $found_posts                    = 0;

                $settings['foodlymentor_page_id'] = $this->page_id ? $this->page_id : get_the_ID();

                $query                    = new \WP_Query($args);

                if ($query->have_posts()) {
                    $found_posts        = $query->found_posts;
                    $max_page           = ceil($found_posts / absint($args['posts_per_page']));
                    $args['max_page']   = $max_page;
                    $args['total_post'] = $found_posts;

                    printf('<ul class="products" data-layout-mode="%s">', esc_attr($settings["foodlymentor_product_grid_layout"]));

                    foreach ($query->posts as $key => $product) {
                        echo '<li class="product"><h2>' . $product->post_title . '</h2></li>';
                    }
                    wp_reset_postdata();

                    echo '</ul>';
                } else {
                    _e('<p class="no-posts-found">No posts found!</p>', 'foodlymentor');
                }
                ?>
            </div>
        </div>
<?php
    }

    /**
     * build_product_query
     * @param $settings
     * @return array
     */
    public function build_product_query($settings)
    {
        $args = [
            'post_type' => 'product',
            'post_status'    => array('publish', 'pending', 'future'),
            'posts_per_page' => -1,
            'order' => (isset($settings['order']) ? $settings['order'] : 'desc'),
        ];

        // if (!empty($settings['foodlymentor_product_grid_categories'])) {
        //     $args['tax_query'] = [
        //         [
        //             'taxonomy' => 'product_cat',
        //             'field' => 'slug',
        //             'terms' => $settings['foodlymentor_product_grid_categories'],
        //             'operator' => 'IN',
        //         ],
        //     ];
        // }

        // $args['meta_query'] = ['relation' => 'AND'];

        // if (get_option('woocommerce_hide_out_of_stock_items') == 'yes') {
        //     $args['meta_query'][] = [
        //         'key' => '_stock_status',
        //         'value' => 'instock'
        //     ];
        // }

        return $args;
    }


    protected function init_content_controls()
    {
        require_once __DIR__ . '/controls/content-controls/layout.php';
    }

    protected function init_style_controls()
    {
        require_once __DIR__ . '/controls/style-controls/products.php';
    }
}
