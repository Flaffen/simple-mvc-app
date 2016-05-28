<?php
namespace Helicopter\Controllers;

use Helicopter\Core\AdminPanelController;
use Helicopter\Models\Articles;

class EditArticleController extends AdminPanelController
{
	public function indexAction()
	{
		$articles = new Articles();
		$news = $articles->getAll();

		view($this->twig, 'admin-panel/edit', array('articles' => $news));
	}

	public function editAction()
	{
		$id = $_GET['id'];
		$articles = new Articles();

		$new = $articles->getArticleById($_GET['id']);

		view($this->twig, 'admin-panel/edit-single', array('article' => $new));
	}
}