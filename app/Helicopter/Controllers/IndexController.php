<?php
namespace Helicopter\Controllers;

use Helicopter\Core\Controller;

class IndexController extends Controller
{
	public function indexAction()
	{
		echo $this->twig->render('index.html', array('name' => 'Stepan'));
	}

	public function testAction()
	{
		echo 'Hello from test Action!';
	}
}