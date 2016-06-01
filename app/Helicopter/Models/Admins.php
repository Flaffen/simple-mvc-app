<?php
/**
 * Модель для таблицы администраторов.
 *
*/

namespace Helicopter\Models;

use Helicopter\Core\DB;

class Admins extends DB
{
	/**
	 * Получить запись-администратора.
	 *
	 * @return object Объект-администратор.
	 */
	public function getAdmin()
	{
		return self::table('admins')->first();
	}

	/**
	 * Аутентификация для получения доступа к привелегиям администратора.
	 *
	 * @param string $login Логин
	 * @param string @password Пароль
	 *
	 * @return boolean true|false True в случае если авторизация прошла успешно, иначе false.
	 */
	public function auth($login, $password)
	{
		if (empty(DB::table('admins')->where('login', $login)->get())) return false;
		if (empty(DB::table('admins')->where('password', $password)->get())) return false;

		return true;
	}
	
	/**
	 * Обновлене пароля администратора.
	 *
	 * @param string $oldPass Старый пароль
	 * @param string $newPass Новый пароль
	 *
	 * @return boolean true|false. True в случае если пароль был успешно изменён, false в случае если старый пароль неверен.
	 */
	public function updatePassword($oldPass, $newPass)
	{
		$dbPass = self::table('admins')->select('password')->where('login', 'admin')->first()->password;
		
		if ($oldPass !== $dbPass) return false;
		
		self::table('admins')->where('password', $dbPass)->update([
			'password' => $newPass														  
		]);
		
		return true;
	}
}