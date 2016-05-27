<?php
namespace Helicopter\Controllers;

use Helicopter\Core\Controller;
use Helicopter\Models\Users;

class AboutController extends Controller
{
	public function indexAction()
	{
		view($this->twig, 'templates/about', array('text' => 'test'));
	}

	public function otherAction()
	{
		$text = 'Hello, World!';
		d($text);
		//echo $this->twig->render('about.html', array('title' => 'other', 'text' => $text));
		view($this->twig, 'about.html', array('title' => 'other', 'text' => $text));
	}
}