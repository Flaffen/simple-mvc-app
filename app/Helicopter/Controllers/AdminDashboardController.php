<?php
namespace Helicopter\Controllers;

use Helicopter\Core\AdminPanelController;
use Helicopter\Models\Admins;

class AdminDashboardController extends AdminPanelController 
{
	// public function __construct($twig)
	// {
	// 	parent::__construct($twig);

	// 	if (!isset($_SESSION['logged']))
	// 	{
	// 		redirect('auth');
	// 	}
	// }

	public function indexAction()
	{
		$admins = new Admins();
		$admin = $admins->getAdmin();

		view($this->twig, 'admin-panel/index', array('admin' => $admin));
	}

	public function logoutAction()
	{
		unset($_SESSION['logged']);
		redirect('auth');
	}
}