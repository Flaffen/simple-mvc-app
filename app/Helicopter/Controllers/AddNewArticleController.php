<?php
/**
 * Контроллер для добавления новой статьи.
 * 
 */

namespace Helicopter\Controllers;

use Helicopter\Core\AdminPanelController;
use Helicopter\Models\Articles;
use Helicopter\Models\Categories;

class AddNewArticleController extends AdminPanelController
{
	public function indexAction()
	{
		$cats = new Categories();
		$categories = $cats->getAll();
		
		// Если поля не были заполнены, отображать форму заполения полей. Иначе вызвать функцию добавления статьи.
		if (!isset($_POST['title']) && !isset($_POST['text']))
		{
			view($this->twig, 'admin-panel/add-new-post', array('categories' => $categories));
		}
		else
		{
			$this->addNewArticleAction();
		}
	}

	/**
	 * Добавление статьи.
	 *
	 */
	public function addNewArticleAction()
	{
		$articles = new Articles();

		$title = $_POST['title'];
		$text = $_POST['text'];
		$categoryId = $_POST['category'];

		$rs = $articles->addNewArticle($title, $text, $categoryId);

		if ($rs)
		{
			redirect('category/' . $categoryId);
		}
		else
		{
			redirect('addNewArticle');
		}
	}
}