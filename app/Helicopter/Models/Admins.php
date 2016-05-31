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