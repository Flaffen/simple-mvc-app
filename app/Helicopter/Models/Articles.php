<?php
namespace Helicopter\Models;

use Helicopter\Core\DB;
use Helicopter\Models\Categories;

class Articles extends DB
{
	public function getAll()
	{
		return self::table('articles')->get();
	}

	public function getArticleById($id)
	{
		return self::table('articles')->where('id', $id)->first();
	}

	public function getArticlesByCatId($catId)
	{
		return self::table('articles')->where('category_id', $catId)->get();
	}

	public function addNewArticle($title, $text, $catId)
	{
		$cats = new Categories();
		$category = $cats->getCatById($catId);

		$rs = self::table('articles')->insert(
			['title' => $title, 'text' => $text, 'category_id' => $catId, 'category_name' => $category->name] 
		);

		if (!$rs) return false;

		return true;
	}
}