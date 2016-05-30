<?php
// Подключение вспомогательных функций.
require_once 'app/helpers/helpers.php';
// Инициализация приложения. Загрузка ядра сайта, autoloader'а и т.д.
require_once 'app/start.php';

$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) . "Controller" : 'IndexController';
$actionName = isset($_GET['action']) ? $_GET['action'] . 'Action' : 'indexAction';

// Подключение контроллера и вызов нужного метода.
$class = 'Helicopter\Controllers\\' . $controllerName;
$controller = new $class($twig);

$controller->$actionName();