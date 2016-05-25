<?php
namespace Helicopter\Models;

use Helicopter\Core\Model;

class Users extends Model
{
	public function getAll()
	{
		$stmt = $this->pdo->query('SELECT * FROM users');
		$rs = array();

		while ($row = $stmt->fetch())
		{
			$rs[] = $row;
		}

		return $rs;
	}
}