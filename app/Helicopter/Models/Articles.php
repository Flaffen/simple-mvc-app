<?php
namespace Helicopter\Models;

use Helicopter\Core\DB;

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
}