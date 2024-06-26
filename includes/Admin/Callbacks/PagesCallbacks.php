<?php

/**
 * @package  Foodlymentor
 */

namespace Inc\Admin\Callbacks;

class PagesCallbacks
{
    public function dashboardPage()
    {
        require_once FOODLYMENTOR_ADMIN_DIR . '/templates/pages/dashboard.php';
    }

    public function widgetsPage()
    {
        require_once FOODLYMENTOR_ADMIN_DIR . '/templates/pages/widgets.php';
    }

    public function settingsPage()
    {
        require_once FOODLYMENTOR_ADMIN_DIR . '/templates/pages/settings.php';
    }
}
