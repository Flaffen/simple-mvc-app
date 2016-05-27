<?php
namespace Helicopter\Controllers;

use Helicopter\Core\Controller;
use Helicopter\Models\Users;

class AuthController extends Controller
{
	public function __construct($twig)
	{
		parent::__construct($twig);

		if (isset($_SESSION['login']))
		{
			redirect('adminpanel');
		}
	}

	public function indexAction()
	{
		if (isset($_POST['login']) && isset($_POST['password']))
		{
			$users = new Users();

			$rs = $users->auth($_POST['login'], $_POST['password']);

			if ($rs)	
			{
				$_SESSION['logged'] = 1;
				
				redirect('adminpanel');
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