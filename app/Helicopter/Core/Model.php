<?php
namespace Helicopter\Core;

use PDO;

class Model
{
	protected $pdo;

	public function __construct()
	{
		$dbconfig = array(
			'dbhost' => 'localhost',
			'dbname' => 'school',
			'dbuser' => 'root',
			'dbpassword' => ''
		);

		$dsn = "mysql:host={$dbconfig['dbhost']};dbname={$dbconfig['dbname']}";

		$opt = array(
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);

		$this->pdo = new PDO($dsn, $dbconfig['dbuser'], $dbconfig['dbpassword'], $opt);
	}
}
