<?php
/**
 * Контроллер настроек администратора.
 *
*/

namespace Helicopter\Controllers;

use Helicopter\Core\AdminPanelController;
use Helicopter\Models\Admins;

class SettingsController extends AdminPanelController
{
    public function indexAction()
    {
        $admins = new Admins();
        $admin = $admins->getAdmin();
        
        if (!isset($_POST['old-password']) && !isset($_POST['new-password']))
        {
            view($this->twig, 'admin-panel/settings', array('admin' => $admin));
        }
        else
        {
            $oldPassword = $_POST['old-password'];
            $newPassword = $_POST['new-password'];
            
            if ($admins->updatePassword($oldPassword, $newPassword))
            {
                redirect('admin-dashboard');
            }
            else
            {
                redirect('admin-dashboard/settings');
            }
        }
    }
}