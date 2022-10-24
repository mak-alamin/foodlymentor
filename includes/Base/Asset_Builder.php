<?php

/**
 * @package  Foodlymentor
 */

namespace Inc\Base;

class Asset_Builder
{
    public function register()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_frontend_scripts']);

        add_action('admin_enqueue_scripts', [$this, 'register_admin_scripts']);
    }

    public function register_frontend_scripts()
    {
        $css_files = array_diff(scandir(FOODLYMENTOR_PLUGIN_DIR . '/assets/frontend/css'), array('.', '..'));

        $js_files = array_diff(scandir(FOODLYMENTOR_PLUGIN_DIR . '/assets/frontend/js'), array('.', '..'));

        foreach ($css_files as $key => $file) {
            wp_register_style(basename($file, '.css'), FOODLYMENTOR_ASSETS_URL . '/frontend/css/' . $file, array(), time(), 'all');
        }

        foreach ($js_files as $key => $file) {
            wp_register_script(basename($file, '.js'), FOODLYMENTOR_ASSETS_URL . '/frontend/js/' . $file, array('jquery'), time(), true);
        }
    }

    public function register_admin_scripts()
    {
        $css_files = array_diff(scandir(FOODLYMENTOR_PLUGIN_DIR . '/assets/admin/css'), array('.', '..'));

        $js_files = array_diff(scandir(FOODLYMENTOR_PLUGIN_DIR . '/assets/admin/js'), array('.', '..'));

        foreach ($css_files as $key => $file) {
            wp_register_style(basename($file, '.css'), FOODLYMENTOR_ASSETS_URL . '/admin/css/' . $file, array(), time(), 'all');
        }

        foreach ($js_files as $key => $file) {
            wp_register_script(basename($file, '.js'), FOODLYMENTOR_ASSETS_URL . '/admin/js/' . $file, array('jquery'), time(), true);
        }
    }
}
