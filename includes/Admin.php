<?php

/**
 * @package  Foodlymentor
 */

namespace Inc;

class Admin
{
    public function __construct()
    {
        if (!is_admin()) {
            return;
        }
    }
}
