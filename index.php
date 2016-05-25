<?php
require_once 'app/start.php';

$loader = new Twig_Loader_Filesystem('app/views/templates');

$twig = new Twig_Environment($loader);

$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . "Controller" : 'IndexController';
$actionName = isset($_GET['action']) ? $_GET['action'] . 'Action' : 'indexAction';

$class = 'Helicopter\Controllers\\' . $controllerName;
$controller = new $class($twig);

if (method_exists($controller, $actionName))
{
	$controller->$actionName($twig);
}
else
{
	die('Sorry. 404');
}