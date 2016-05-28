<?php
require_once 'app/helpers/helpers.php';
require_once 'app/start.php';

$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . "Controller" : 'IndexController';
$actionName = isset($_GET['action']) ? $_GET['action'] . 'Action' : 'indexAction';

$class = 'Helicopter\Controllers\\' . $controllerName;
$controller = new $class($twig);

$controller->$actionName();