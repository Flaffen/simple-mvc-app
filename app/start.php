<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

// Инициализация шаблонизатора TWIG.
$loader = new Twig_Loader_Filesystem('app/views');

$twig = new Twig_Environment($loader);

$function = new Twig_SimpleFunction('base_url', function() {
	return 'http://' . $_SERVER['SERVER_NAME'] . '/';
});

$show_childs = new Twig_SimpleFunction('base_url', function($object) {
	if (empty($object->childs)) { return; }
	
	
});

$twig->addFunction($function);