<?php
namespace Helicopter\Models;

use Helicopter\Core\DB;

class Categories extends DB 
{
	public function getAll()
	{
		return self::table('categories')->get();
	}

	public function getCatById($id)
	{
		return self::table('categories')->where('id', $id)->first();
	}
}