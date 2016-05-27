<?php
namespace Helicopter\Controllers;

use Helicopter\Core\Controller;
use Helicopter\Models\Articles;
use Helicopter\Models\Categories;

class CategoryController extends Controller
{
	public function indexAction()
	{
		$id = $_GET['id'];

		$articles = new Articles();
		$cats = new Categories();

		$category = $cats->getCatById($id);
		$news = $articles->getArticlesByCatId($id);

		view($this->twig, 'category', array('category' => $category, 'news' => $news));
	}
}