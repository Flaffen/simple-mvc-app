<?php
/**
 * Контроллер главной страницы панели администратора.
 *
 */

namespace Helicopter\Controllers;

use Helicopter\Core\AdminPanelController;
use Helicopter\Models\Admins;
use Helicopter\Models\Articles;
use Helicopter\Models\Categories;

class AdminDashboardController extends AdminPanelController 
{
	public function indexAction()
	{
		$cats = new Categories();
		$articles = new Articles();
		$admins = new Admins();
		
		$admin = $admins->getAdmin();
		$news = $articles->getAll();
		$categories = $cats->getAllMainCatsWithChildren();

		view($this->twig, 'admin-panel/index', array(
			'admin' => $admin,
			'articles' => $news,
			'categories' => $categories
		));
	}

	public function logoutAction()
	{
		unset($_SESSION['logged']);
		redirect('auth');
	}
}