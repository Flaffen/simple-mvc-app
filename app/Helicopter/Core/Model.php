<?php
namespace Helicopter\Core;

use Illuminate\Database\Capsule\Manager as Capsule;
use PDO;

class Model
{
	protected $pdo;
	protected $capsule;

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

		$this->capsule = new Capsule;

		$this->capsule->addConnection([
		    'driver'    => 'mysql',
		    'host'      => 'localhost',
		    'database'  => 'school',
		    'username'  => 'root',
		    'password'  => '',
		    'charset'   => 'utf8',
		    'collation' => 'utf8_unicode_ci',
		    'prefix'    => '',
		]);

		$this->capsule->setAsGlobal();

		$this->capsule->bootEloquent();
	}
}
