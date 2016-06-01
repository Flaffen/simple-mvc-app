<?php
/**
 * Контроллер редактирования статьи и категории.
 *
*/

namespace Helicopter\Controllers;

use Helicopter\Core\AdminPanelController;
use Helicopter\Models\Articles;
use Helicopter\Models\Categories;

class EditController extends AddNewArticleController
{
    public function editArticleAction()
    {
        $articleId = $_GET['id'];
        $articles = new Articles();
        $new = $articles->getArticleById($articleId);
        
        if (!isset($_POST['title']) && !isset($_POST['text']))
        {
            view($this->twig, 'admin-panel/edit-article', array('article' => $new));
        }
        else
        {
            $title = $_POST['title'];
            $text = $_POST['text'];
            
            $articles->updateArticle($articleId, $title, $text);
            
            redirect('admin-dashboard');
        }
    }
    
    public function editCategoryAction()
    {
        $cats = new Categories();
        $catId = $_GET['id'];
        
        $category = $cats->getCatById($catId);
        $categories = $cats->getAll();
        
        if (!isset($_POST['name']) && !isset($_POST['parent-category-id']))
        {
            view($this->twig, 'admin-panel/edit-category', array('category' => $category, 'categories' => $categories));
        }
        else
        {
            $name = $_POST['name'];
            $parentCatId = $_POST['parent-category-id'];
            
            $cats->updateCategory($catId, $name, $parentCatId);
            
            redirect('admin-dashboard');
        }
    }
}
