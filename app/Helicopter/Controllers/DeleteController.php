<?php
/**
 * Контроллер удаления статьи и категории.
 *
*/

namespace Helicopter\Controllers;

use Helicopter\Core\AdminPanelController;
use Helicopter\Models\Categories;
use Helicopter\Models\Articles;

class DeleteController extends AdminPanelController
{
    public function deleteArticleAction()
    {
        $articles = new Articles();
		$article_id = $_GET['id'];
		
		$articles->deleteArticleById($article_id);
		
		redirect('admin-dashboard');
    }
    
    public function deleteCategoryAction()
    {
        $catId = $_GET['id'];
        $cats = new Categories();
        
        $cats->deleteCategoryById($catId);
        
        redirect('admin-dashboard');
    }
}