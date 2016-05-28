<?php
namespace Helicopter\Core;

use Helicopter\Core\Controller;

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
}