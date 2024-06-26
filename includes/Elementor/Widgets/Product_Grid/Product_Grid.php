<?php

/**
 * -------------------------------------------------
 * Product Grid Widget Class
 * 
 * @package  Foodlymentor
 * -------------------------------------------------
 */

namespace Inc\Elementor\Widgets\Product_Grid;

use Elementor\Widget_Base;

class Product_Grid extends Widget_Base
{
    use \Inc\Traits\Elementor\Controls;

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
        return ['product', 'shop', 'food', 'foodlymentor'];
    }

    public function get_style_depends()
    {
        return [
            'frontend-common',
            'widget-product-grid',
        ];
    }

    public function get_script_depends()
    {
        return [
            'widget-main',
            'widget-product-grid',
            'widget-product-cart',
        ];
    }

    protected function register_controls()
    {
        $this->require_control_files(__DIR__);
    }

    protected function render()
    {
        if (!function_exists('WC')) {
            return;
        }

        require_once __DIR__ . '/render.php';
    }

    /**
     * build_product_query
     * @param $settings
     * @return array
     */
    function build_product_query($settings, $cat = '')
    {
        $args = [
            'post_type' => 'product',
            'post_status'    => array('publish', 'pending', 'future'),
            'posts_per_page' => -1,
            'order' => (isset($settings['order']) ? $settings['order'] : 'desc'),
        ];

        if (!empty($cat)) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $cat,
                    'operator' => 'IN',
                ],
            ];
        }

        $args['meta_query'] = ['relation' => 'AND'];

        // Hide out of stock products
        // if (get_option('woocommerce_hide_out_of_stock_items') == 'yes') {
        $args['meta_query'][] = [
            'key' => '_stock_status',
            'value' => 'instock'
        ];
        // }

        return $args;
    }
}