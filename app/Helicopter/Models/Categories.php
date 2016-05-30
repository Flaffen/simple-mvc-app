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
		$cats = self::table('categories')->where('parent_id', 0)->get();
		
		foreach ($cats as $category)
		{
			$children = $this->getChildsByCatId($category->ID);
			
			if (!empty($children))
			{
				foreach ($children as $child)
				{
					$childrenForChild = $this->getChildsByCatId($child->ID);
					
					if (!empty($childrenForChild))
					{
						$child->childs = $childrenForChild;	
					}
				}
			}
			
			$category->childs = $children;
		}
		
		//$cats = self::table('categories')->get();
		//
		//// $mains = self::table('categories')->where('parent_id', 0)->get();
		//
		//foreach ($cats as $item)
		//{
		//	$children = $this->getChildsByCatId($item->ID);
		//	
		//	if (!empty($children))
		//	{
		//		foreach ($children as $child)
		//		{
		//			$child->children = $this->getChildsByCatId($child->ID);
		//		}
		//		
		//		$item->children = $children;
		//	}
		//}
		
		//echo "<pre>";
		//print_r($cats);
		//echo "</pre>";
		//die();
		
		return $cats; 
	}
	
	public function testObjectFunction($object)
	{
		if (empty($object->childs)) return $object;
		
		return testObjectFunction($object->childs);
	}
	
	public function getSubCatsForSubCat($subCatId)
	{
		return self::table('categories')->where('parent_id', $subCatId)->get();
	}
	
	public function deleteCategoryById($catId)
	{
		self::table('categories')->where('ID', $catId)->delete();
	}
	
	public function updateCategory($catId, $name, $parentCatId)
	{
		self::table('categories')->where('id', $catId)->update([
			'name' => $name,
			'parent_id' => $parentCatId
		]);
	}
}