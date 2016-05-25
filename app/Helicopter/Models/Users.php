<?php
namespace Helicopter\Models;

use Illuminate\Database\Capsule\Manager as Capsule;
use Helicopter\Core\Model;

class Users extends Model
{
	public function getAll()
	{
		// return $this->capsule->table('users')->get();
		return Capsule::select('select * from users where id = ?', array(1));

		// $stmt = $this->pdo->query('SELECT * FROM users');
		// $rs = array();

		// while ($row = $stmt->fetch())
		// {
		// 	$rs[] = $row;
		// }

		// return $rs;
	}
}