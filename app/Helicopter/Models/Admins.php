<?php
namespace Helicopter\Models;

use Helicopter\Core\DB;

class Admins extends DB
{
	public function getAdmin()
	{
		return self::table('admins')->first();
	}

	public function auth($login, $password)
	{
		if (empty(DB::table('admins')->where('login', $login)->get())) return false;
		if (empty(DB::table('admins')->where('password', $password)->get())) return false;

		return true;
	}
}