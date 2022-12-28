<?php

/**
 * ----------------------------------------------
 * Cat_Menu Widget Class
 * 
 * @package  Foodlymentor
 * ----------------------------------------------
 */

namespace Inc\Elementor\Widgets\Cat_Menu;

use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

class Cat_Menu extends Widget_Base
{
    use \Inc\Traits\Elementor\Controls;

    protected $page_id;

    public function get_name()
    {
        return 'foodlymentor_cat_menu';
    }

    public function get_title()
    {
        return esc_html__('Category Menu', 'foodlymentor');
    }

    public function get_icon()
    {
        return 'eicon-navigation-horizontal';
    }

    public function get_categories()
    {
        return ['foodlymentor-widgets-elementor'];
    }

    public function get_keywords()
    {
        return ['product', 'shop', 'food', 'foodlymentor'];
    }

    protected function register_controls()
    {
        $content_controls = array_diff(scandir(__DIR__ . '/controls/content-controls'), array('.', '..'));

        $style_controls = array_diff(scandir(__DIR__ . '/controls/style-controls'), array('.', '..'));

        foreach ($content_controls as $key => $file) {
            require_once __DIR__ . '/controls/content-controls/' . $file;
        }

        foreach ($style_controls as $key => $file) {
            require_once __DIR__ . '/controls/style-controls/' . $file;
        }
    }

    public function get_style_depends()
    {
        return [
            'frontend-common',
            'widget-cat-menu',
        ];
    }

    public function get_script_depends()
    {
        return ['widget-cat-menu'];
    }

    protected function render()
    {
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

        echo '<script>';
        echo 'function foodlymentorCatMenuDropDown() {
            document.getElementById("moreDropdown").classList.toggle("show");
          }';
        echo '</script>';

        echo '<div class="more-menu-filter dropdown">
        <button onclick="foodlymentorCatMenuDropDown()" class="dropbtn">' . _x('More...', 'woocommerce-food') . '</button>
        <div id="moreDropdown" class="dropdown-content"> ' . $more_filter_html . ' </div>
      </div>';

        echo '</div>';
    }
}
