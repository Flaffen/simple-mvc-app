<?php
/**
 * Модель для работы с таблицей категорий.
 *
 */

namespace Helicopter\Models;

use Helicopter\Core\DB;
use Helicopter\Models\Categories;

class Articles extends DB
{
	/**
	 * Выборка всех записей из таблицы articles
	 *
	 * @return object Массив объектов всех записей
	 */
	public function getAll()
	{
		return self::table('articles')->get();
	}
	
	/**
	 * Получение записи по её идентификатору
	 *
	 * @param integer $id Идентификатор статьи.
	 * @return object Поле статьи
	 */
	public function getArticleById($id)
	{
		return self::table('articles')->where('id', $id)->first();
	}

	/**
	 * Получение статей по идентификатору категории.
	 *
	 * @param integer $catId Идентификатор категории
	 * @return object Статьи категории $catId
	 */
	public function getArticlesByCatId($catId)
	{
		return self::table('articles')->where('category_id', $catId)->get();
	}

	/**
	 * Добавление новой статьи
	 *
	 * @param string $title Заголовок статьи.
	 * @param string $text Содержание статьи.
	 * @param integer $catId Идентификатор категории.
	 * @return boolean true|false В случае успешного добавления возвращает true, иначе false.
	 */
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
	
	/**
	 * Удаление статьи по её идентификатору.
	 *
	 * @param integer $id Идентификатор категории.
	 */
	public function deleteArticleById($id)
	{
		self::table('articles')->where('id', $id)->delete();
	}
	
	/**
	 * Обновление полей статьи.
	 *
	 * @param integer $articleId Идентификатор обновляемой статьи.
	 * @param string $title Новый заголовок.
	 * @param string $text Новое содержимое статьи.
	 */
	public function updateArticle($articleId, $title, $text)
	{
		self::table('articles')->where('id', $articleId)->update([
			'title' => $title,
			'text' => $text
		]);
	}
}