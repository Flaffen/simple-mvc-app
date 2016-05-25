<?php
namespace Helicopter\Controllers;

use Helicopter\Core\Controller;
use Helicopter\Models\Users;

class AboutController extends Controller
{
	public function indexAction()
	{
		echo $this->twig->render('about.html', array('title' => 'about', 'text' => 'about page'));
	}

	public function otherAction()
	{
		$UsersModel = new Users();

		$text = $UsersModel->getAll();

		echo $this->twig->render('about.html', array('title' => 'other', 'text' => $text));
	}
}