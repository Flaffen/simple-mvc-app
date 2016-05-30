<?php
/**
 * Модель для таблицы категорий.
 *
*/

namespace Helicopter\Models;

use Helicopter\Core\DB;

class Categories extends DB 
{
	/**
	 * Получение всех записей из таблицы категорий.
	 *
	 * @return arrray Массив объектов-записей.
	 */
	public function getAll()
	{
		return self::table('categories')->get();
	}

	/**
	 * Получение отдельной записи категории по её идентификатору.
	 *
	 * @return object Объект-запись.
	 */
	public function getCatById($id)
	{
		return self::table('categories')->where('id', $id)->first();
	}
	
	/**
	 * Добавление новой категории.
	 *
	 * @param string $catName Название новой категории.
	 * @param integer $parentCatId Идентификатор родительской категории.
	 */
	public function addNewCat($catName, $parentCatId)
	{
		self::table('categories')->insert(
			['name' => $catName, 'parent_id' => $parentCatId]
		);
	}

	/**
	 * Получение массива всех дочерних категорий по идентефикатору родительской категории.
	 *
	 * @param integer @catId Идентификатор родительской категории.
	 * @return array Массив записей-объектов, у которых ID родительской категории - $catId.
	 */
	public function getChildsByCatId($catId)
	{
		return self::table('categories')->where('parent_id', $catId)->get();
	}

	/**
	 * Получение всех категорий с их дочерними категориями.
	 *
	 * @return array Массив записей-объектов главных категорий.
	 */
	public function getAllMainCatsWithChildren()
	{
		$mainCats = self::table('categories')->where('parent_id', 0)->get();
		
		$rs = array();
		
		foreach ($mainCats as $category)
		{
			$rs[] = $this->deepGetChildsByObject($category);
		}
		
		return $mainCats;
	}
	
	/**
	 * Получение подкатегорий категории, получение подкатегорий подкатегории и т.д. Действует рекурсивно.
	 *
	 * @param object Объект, для которого нужно получить дочернии категории.
	 * @return object Объект со всеми дочерними категориями (в том числе и вложенными в дочерние подкатегории и т.д.).
	 */
	public function deepGetChildsByObject($obj)
	{
		$objectChilds = $this->getChildsByCatId($obj->ID);
		
		if (empty($objectChilds)) return $obj;
		
		$finalChildren = array();
		
		foreach ($objectChilds as $child)
		{
			$finalChildren[] = $this->deepGetChildsByObject($child);
		}
		
		$obj->childs = $finalChildren;
		
		return $obj;
	}
	
	/**
	 * Удаление категории по её идентификатору.
	 *
	 * @param integer $catId Идентификатор удаляемой категории.
	 */
	public function deleteCategoryById($catId)
	{
		self::table('categories')->where('ID', $catId)->delete();
	}
	
	/**
	 * Обновление полей категории.
	 *
	 * @param integer $catId Идентификатор обновляемой категории.
	 * @param string $name Новое имя обновляемой категории.
	 * @param integer $parentCatId Новый идентификатор родительской категории.
	 */
	public function updateCategory($catId, $name, $parentCatId)
	{
		self::table('categories')->where('id', $catId)->update([
			'name' => $name,
			'parent_id' => $parentCatId
		]);
	}
}