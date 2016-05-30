<?php
/**
 * Контроллер страницы добавления новой категории.
 *
 */

namespace Helicopter\Controllers;

use Helicopter\Core\AdminPanelController;
use Helicopter\Models\Categories;

class AddNewCategoryController extends AdminPanelController
{
	public function indexAction()
	{
		$cats = new Categories();
		$categories = $cats->getAll();

		if (!isset($_POST['category-name']) && !isset($_POST['parent-category-id']))
		{
			view($this->twig, 'admin-panel/add-new-category', array('categories' => $categories));
		}
		else
		{
			$this->addNewCategoryAction();
		}
	}

	public function addNewCategoryAction()
	{
		$cats = new Categories();

		$catName = $_POST['category-name'];
		$parentCatId = $_POST['parent-category-id'];

		$cats->addNewCat($catName, $parentCatId);
		redirect('index');
	}
}