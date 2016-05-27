<?php
namespace Helicopter\Models;

use Helicopter\Core\DB;

class Users extends DB
{
	public function getAll()
	{
		return self::table('users')->get();
	}

	public function getAdmin()
	{
		return self::table('users')->where('login', 'admin')->get();
	}

	public function auth($login, $password)
	{
		if (empty(DB::table('users')->where('login', $login)->get())) return false;
		if (empty(DB::table('users')->where('password', $password)->get())) return false;

		return true;
	}
}