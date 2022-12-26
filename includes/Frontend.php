<?php

/**
 * @package  Foodlymentor
 */

namespace Inc;

class Frontend
{
    public function register()
    {
        wp_enqueue_style('frontend-common');
        wp_enqueue_script('widget-main');
    }
}
