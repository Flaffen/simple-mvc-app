<?php
namespace Helicopter\Controllers;

use Helicopter\Core\Controller;
use Helicopter\Models\Admins;

class AdminPanelController extends Controller 
{
	public function __construct($twig)
	{
		parent::__construct($twig);

		if (!isset($_SESSION['logged']))
		{
			redirect('auth');
		}
	}

	public function indexAction()
	{
		$users = new Users();
		$admin = $users->getAdmin();

		view($this->twig, 'templates/admin-panel/index', array('admin' => $admin));
	}

	public function logoutAction()
	{
		unset($_SESSION['logged']);
		redirect('auth');
	}
}