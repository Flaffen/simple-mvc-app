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

	public function addNewCat($catName, $parentCatId)
	{
		self::table('categories')->insert(
			['name' => $catName, 'parent_id' => $parentCatId]
		);
	}

	public function getChildsByCatId($catId)
	{
		return self::table('categories')->where('parent_id', $catId)->get();
	}

	public function getAllMainCatsWithChildren()
	{
		$mains = self::table('categories')->where('parent_id', 0)->get();

		foreach ($mains as $item)
		{
			$children = $this->getChildsByCatId($item->ID);

			if (!empty($children))
			{
				$item->childs = $children;
			}
		}
		
		return $mains; 
	}
}