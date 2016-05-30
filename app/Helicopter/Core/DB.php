<?php
/**
 * Главный класс для работы с базой данных
 *
 */

namespace Helicopter\Core;

use Illuminate\Database\Capsule\Manager as Capsule;

// Инициализация Eloquent ORM.
$capsule = new Capsule;

$capsule->addConnection([
	'driver' => 'mysql',
	'host' => '127.0.0.1',
	'database' => 'blog',
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix' => ''
]);

$capsule->bootEloquent();
$capsule->setAsGlobal();

class DB extends Capsule {}