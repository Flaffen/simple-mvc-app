<?php
namespace Helicopter\Controllers;

use Helicopter\Core\Controller;
use Helicopter\Models\Articles;
use Helicopter\Models\Categories;

class IndexController extends Controller
{
	public function indexAction()
	{
		$articles = new Articles();
		$cats = new Categories();

		$categories = $cats->getAllMainCatsWithChildren();

		$news = $articles->getAll();
		view($this->twig, 'index', array('news' => $news, 'categories' => $categories));
	}
}