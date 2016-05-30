<?php
namespace Helicopter\Controllers;

use Helicopter\Core\AdminPanelController;

class SettingsController extends AdminPanelController
{
    public function indexAction()
    {
        view($this->twig, 'admin-panel/settings');
    }
}