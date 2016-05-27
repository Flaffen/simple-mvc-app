<?php
namespace Helicopter\Controllers;

use Helicopter\Core\Controller;
use Helicopter\Models\Articles;

class ViewController extends Controller 
{
	public function indexAction()
	{
		$id = $_GET['id'];

		$articles = new Articles();

		$new = $articles->getArticleById($id);

		view($this->twig, 'templates/single', array('new' => $new));
	}
}