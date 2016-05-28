<?php
namespace Helicopter\Controllers;

use Helicopter\Core\Controller;
use Helicopter\Models\Admins;

class AuthController extends Controller
{
	public function __construct($twig)
	{
		parent::__construct($twig);

		if (isset($_SESSION['login']))
		{
			redirect('admin-dashboard');
		}
	}

	public function indexAction()
	{
		if (isset($_POST['login']) && isset($_POST['password']))
		{
			$admins = new Admins();

			$rs = $admins->auth($_POST['login'], $_POST['password']);

			if ($rs)	
			{
				$_SESSION['logged'] = 1;
				
				redirect('admin-dashboard');
			}
			else
			{
				view($this->twig, 'form');
			}
		}
		else
		{
			view($this->twig, 'form');
		}
	}
}